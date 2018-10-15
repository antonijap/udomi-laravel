<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Ad;
use App\AdPhotos;
use App\User;
use Image;
use Carbon\Carbon;
use App\Classes\Fileuploader;
use File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use App\Mail\PotentialAdoption;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use SEO;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'filter', 'contact', 'about', 'demo', 'search']);
    }

    public function about()
    {
      return view('about');
    }

    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->where('is_adopted', 0)->paginate(21);
        return view('index')->with('ads', $ads);
    }

    public function new()
    {
        return view('new');
    }

    public function create(UploadRequest $request)
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

        $name = request('name');

        $slug = str_replace(' ', '-', strtolower($name));

        $this->validate(request(), [
            'name' => 'required|min:2|max:15',
            'description' => 'required|min:32|max:1000',
            'sex' => 'required',
            'age' => 'required',
            'location' => 'required',
            'type' => 'required',
            'files' => 'required'
        ]);

        $ad = Ad::create([
            'name' => request('name'),
            'description' => request('description'),
            'sex' => request('sex'),
            'age' => request('age'),
            'location' => request('location'),
            'user_id' => auth()->id(),
            'type' => request('type'),
            'slug' => $slug,
            'castration' => $castration,
            'sterilization' => $sterilization,
            'invalidity' => $invalidity,
            'vaccines' => $vaccines,
            'chip' => $chip,
            'is_adopted' => false
        ]);

        $path = storage_path('/app/public/' . $ad->user->username . '/');

        if (file_exists($path)) {
            // initialize FileUploader
            $FileUploader = new FileUploader('files', array(
                'uploadDir' => $path,
                'title' => 'name',
                'required' => true,
                'editor' => array(
        			'maxWidth' => 600,
        			'maxHeight' => 1000,
        			'crop' => false,
        			'quality' => 90
        		)
            ));
        } else {
            File::makeDirectory($path, 0777, true);
            $FileUploader = new FileUploader('files', array(
                'uploadDir' => $path,
                'required' => true,
                'title' => 'name',
                'editor' => array(
        			'maxWidth' => 600,
        			'maxHeight' => 1000,
        			'crop' => false,
        			'quality' => 90
        		)
            ));
        }
        // {file_name}_{timestamp}

        // call to upload the files
        $data = $FileUploader->upload();

        // if uploaded and success
        if($data['isSuccess'] && count($data['files']) > 0) {

            $uploadedFiles = $data['files'];

            foreach ($uploadedFiles as $source) {
                FileUploader::resize($source['file'], $width = 600, $height = null, $destination = null, $quality = 90);
            }

            foreach ($uploadedFiles as $photo) {
                AdPhotos::create([
                    'ad_id' => $ad->id,
                    'filename' => 'storage/' . $ad->user->username . '/' . $photo['name'],
                    'name' => $photo['title'],
                    'size' => $photo['size'],
                    'type' => $photo['type']
                ]);
            }

        }

        session()->flash('message', 'Oglas uspješno objavljen.');
        return redirect('/dashboard');

    }

    public function filter(Request $request)
    {
        $sex = request('sex');
        $age = request('age');
        $location = request('location');
        $type = request('type');

        $dropdownData = [
            'type' => request('type'),
            'sex' => request('sex'),
            'age' => request('age'),
            'location' => request('location')
        ];

        $ads = Ad::orderBy('created_at', 'desc')->where('is_adopted', 0);

        if ($sex == 'all') {
            $sex = ['female', 'male'];
        }

        if ($age == 'all') {
            $age = ['junior', 'adult'];
        }

        if ($type == 'all') {
            $type = ['cat', 'dog'];
        }

        if ($location == 'all') {
            $location = [
                'bjelovarsko-bilogorska',
                'brodsko-posavska',
                'dubrovacko-neretvanska',
                'grad-zagreb',
                'istarska',
                'karlovacka',
                'koprivnicko-krizevacka',
                'krapinsko-zagorska',
                'licko-senjska',
                'medimurska',
                'osjecko-baranjska',
                'pozesko-slavonska',
                'primorsko-goranska',
                'sisasko-moslavcka',
                'splitsko-dalmatinska',
                'sibensko-kninska',
                'varazdinska',
                'viroviticko-podravska',
                'vukovarsko-srijemska',
                'zadarska',
                'zagrebacka'
            ];
        }

        $results = $ads->whereIn('sex', (array) $sex)->whereIn('age', (array) $age)->whereIn('location', (array) $location)->whereIn('type', (array) $type)->paginate(21);

        return view('results')->with('ads', $results)->with('data', $dropdownData);

    }

    public function show($username, $id, $slug)
    {

        $ad = Ad::where('id', $id)->first();
        $user = User::where('id', $ad->user_id)->first();

        SEO::setTitle($ad->name . ' | ' . 'Udomi.net');
        SEO::setDescription($ad->description);
        SEO::opengraph()->setUrl(url()->current());
        SEO::setCanonical(url()->current());
        SEO::opengraph()->addProperty('type', 'website');
        SEO::addImages('https://udomi.net/' . $ad->photos->first()->filename);

        $slike = [];

        foreach ($ad->photos as $slika) {
            if ($slika->is_primary == 1) {
                array_unshift($slike, $slika);
            } else {
                array_push($slike, $slika);
            }
        }

        return view('ad')->with('ad', $ad)->with('location', $ad->location)->with('slike', $slike);
    }

    public function contact(Ad $ad, Request $request)
    {
        $this->validate(request(), [
            'email' => 'required',
            'poruka' => 'required|min:1|max:1000'
        ]);

        // return request('email');

        Mail::to($ad->user->email)
        ->send(new PotentialAdoption($ad, request('email'), request('poruka')));

        // Redirect
        // session()->flash('message', 'Poruka poslana.');
        // return redirect()->back();
        return view('success');
    }

    public function demo()
    {
      return view('demo');
    }

}
