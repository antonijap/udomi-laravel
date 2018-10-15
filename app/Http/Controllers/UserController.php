<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);
    }

    public function show()
    {
        $ads = auth()->user()->ads->sortByDesc('updated_at');
        $user = auth()->user();
        return view('dashboard')->with('ads', $ads)->with('user', $user);
    }

    public function profile($username, $id)
    {
        $user = User::where('id', $id)->first();
        $ads = $user->ads->sortByDesc('updated_at');
        return view('profile')->with('user', $user)->with('ads', $ads);
    }

    public function showSettings()
    {
        $user = auth()->user();
        return view('settings')->with('user', $user);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'description' => 'max:220'
        ]);

        $user = User::where('id', auth()->user()->id);

        // Create username
        $name = $request['name'];
        $username = str_replace(' ', '-', strtolower($name));
        $currentUser = User::where('username', $username);
        if ($currentUser->count() > 0) {
            if ($user->first()->id == $currentUser->first()->id) {
                $user->update([
                    'name' => $request['name'],
                    'contact_email' => $request['contact_email'],
                    'username' => $username,
                    'description' => $request['description'],
                    'phone' => $request['phone'],
                    'iban' => $request['iban']
                ]);
                session()->flash('message', 'Postavke ažurirane.');
                return redirect('/settings');
            } else {
                session()->flash('message', 'Ime je već zauzeto.');
                return back();
            }

        } else {
            $user->update([
                'name' => $request['name'],
                'contact_email' => $request['contact_email'],
                'username' => $username,
                'description' => $request['description'],
                'phone' => $request['phone'],
                'iban' => $request['iban']
            ]);
            session()->flash('message', 'Postavke ažurirane.');
            return redirect('/');
        }
    }

}
