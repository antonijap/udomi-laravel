<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Ad;
use App\Boost;
use App\AdPhotos;
use App\User;
use Image;
use Carbon\Carbon;
use App\Classes\Fileuploader;
use File;


class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(Ad $ad)
  {

    $original = $ad->photos;

    foreach($ad->photos as $file) {
      $appendedFiles[] = array(
        "is_primary" => $file['is_primary'],
        "name" => $file['name'],
        "type" => $file['type'],
        "size" => $file['size'],
        "file" => '/' . $file['filename'],
        "data" => array(
          "url" => '/' . $file['filename']
        )
      );
    }

    usort($appendedFiles, function($a, $b) {
        return $b['is_primary'] <=> $a['is_primary'];
    });

    // return $appendedFiles;

    $appendedFiles = json_encode($appendedFiles);
    return view('dashboard.edit')->with('ad', $ad)->with('photos', $appendedFiles);

  }

  public function update(Ad $ad, UploadRequest $request)
  {
    if (request('castration') == '') {
      $castration = 'off';
    } else {
      $castration = 'on';
    }

    if (request('sterilization') == '') {
      $sterilization = 'off';
    } else {
      $sterilization = 'on';
    }

    if (request('invalidity') == '') {
      $invalidity = 'off';
    } else {
      $invalidity = 'on';
    }

    if (request('vaccines') == 'on') {
      $vaccines = 1;
    } else {
      $vaccines = 0;
    }

    if (request('chip') == 'on') {
      $chip = 1;
    } else {
      $chip = 0;
    }

    $this->validate(request(), [
      'name' => 'required|min:2',
      'description' => 'required|min:32|max:1000',
      'sex' => 'required',
      'age' => 'required',
      'location' => 'required',
      'type' => 'required',
    ]);

    Ad::find($ad['id'])->update([
      'name' => request('name'),
      'description' => request('description'),
      'sex' => request('sex'),
      'age' => request('age'),
      'location' => request('location'),
      'user_id' => auth()->id(),
      'type' => request('type'),
      'castration' => $castration,
      'sterilization' => $sterilization,
      'vaccines' => $vaccines,
      'chip' => $chip,
      'invalidity' => $invalidity
    ]);

    // $images = public_path() . '/images/';
    // $path = $images . $ad->user->username . '/';
    $path = storage_path('/app/public/' . $ad->user->username . '/');

    $appendedFiles = [];
    foreach ($ad->photos as $photo) {
      $appendedFiles[] = array(
        "name" => $photo['name'],
        "type" => $photo['type'],
        "size" => $photo['size'],
        "file" => $photo['filename'],
        "data" => array(
          "url" => '/' . $photo['filename']
        )
      );
    }

    $FileUploader = new FileUploader('files', array(
      'uploadDir' => $path,
      'title' => 'name',
      'required' => true,
      'editor' => array(
            'maxWidth' => 600,
            'maxHeight' => 1000,
            'crop' => false,
            'quality' => 90
          ),
      'files' => $appendedFiles
    ));

    $upload = $FileUploader->upload();
    $newPhotoTitles = [];

    // Upload new photos
    if($upload['isSuccess'] && count($upload['files']) > 0) {
      $fileList = $FileUploader->getFileList();
      foreach ($fileList as $photo) {
        // Check if photos exist and avoid them
        $existingPhoto = [];
        $existingPhoto = AdPhotos::where('filename', $photo['file'])->get();
        if ($existingPhoto->isEmpty()) {
          // Upload new photos
          AdPhotos::create([
            'ad_id' => $ad->id,
            'filename' => 'storage/' . $ad->user->username . '/' . $photo['name'],
            'name' => $photo['title'],
            'size' => $photo['size'],
            'type' => $photo['type']
          ]);
          $newPhotoTitles[] = $photo['title'];
        }
      }
    }

    if($upload['hasWarnings']) {
      $warnings = $upload['warnings'];
      echo $warnings;
    };

    // Scan for all photos
    $photosSurvivedPotentialRemoving = $FileUploader->getListInput();
    $photos = [];

    foreach ($photosSurvivedPotentialRemoving['values'] as $photo) {
      if (!is_null($photo)) {
        if (AdPhotos::where('filename', substr($photo['file'], 1))->count() > 0) {
          $photos[] = AdPhotos::where('filename', substr($photo['file'], 1))->first();
        } else {
          foreach ($newPhotoTitles as $title) {
            $photos[] = AdPhotos::where('name', $title)->first();
          }
        }
      }
    }

    $toggle = true;
    foreach (array_unique($photos) as $value) {
      if ($toggle) {
        // List contains reordered images, apply isPrimary = true on first
        $makePrimary = AdPhotos::where('filename', $value['filename'])->first();
        $makePrimary->is_primary = true;
        $makePrimary->save();
        $toggle = false;
      } else {
        // Then remove isPrimary on all others
        $other = AdPhotos::where('filename', $value['filename'])->first();
        $other->is_primary = false;
        $other->save();
      }
    }

    // Extract removed photos and do model and storage cleanup
    $removedPhotos = $ad->photos->diff(array_filter($photos));

    foreach ($removedPhotos as $key => $value) {
      AdPhotos::where('id', $value['id'])->first()->delete();
      $path = public_path() . '/';
      unlink($path . $value['filename']);
    }

    session()->flash('message', 'Oglas uspješno ažuriran.');
    return redirect('/dashboard');
  }

  public function markAdopted(Ad $ad)
  {
    Ad::where('id', $ad->id)->update(['is_adopted' => 1]);
    $ads = auth()->user()->ads->sortByDesc('updated_at');
    return redirect('/dashboard')->with('ads', $ads);
  }

  public function restore(Ad $ad)
  {
    Ad::where('id', $ad->id)
    ->update(['is_adopted' => 0]);

    $ads = auth()->user()->ads->sortByDesc('created_at');
    return redirect('/dashboard')->with('ads', $ads);
  }

  public function delete(Ad $ad)
  {

    foreach ($ad->photos as $photo) {
      AdPhotos::where('id', $photo->id)->delete();

      $path = public_path() . '/' . $ad->username . $photo->filename;
      unlink($path);
    }

    Ad::where('id', $ad->id)->delete();

    $ads = auth()->user()->ads->sortByDesc('created_at');
    return redirect('/dashboard')->with('ads', $ads);
  }

  public function boost(Ad $ad)
  {
    Ad::where('id', $ad->id)
    ->update(['created_at' => Carbon::now()]);

    Boost::where('user_id', $ad->user->id)
    ->update(['created_at' => Carbon::now()]);

    $ads = auth()->user()->ads->sortByDesc('created_at');
    return redirect('/dashboard')->with('ads', $ads);
  }

}
