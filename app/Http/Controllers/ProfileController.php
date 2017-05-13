<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use Image;
use Storage;


class ProfileController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->except('index', 'getProfile');
    }

    public function getProfile($id)
    {
        $profile = Profile::find($id);

        return view('layouts.profile')->with('profile', $profile);
    }

    public function index()
    {
        $profiles = Profile::latest()->get();
        // $username = auth()->user()->username;

        return view('home', compact('profiles'));
    }

    public function create()
    {
		return view('layouts.profileCreateForm');
    }

    public function store()
    {	
        $this->validate(request(), [
    		'name' => 'required|max:255',
    		'lastname' => 'required|max:255',
            'birth_date' => 'required|date_format:"Y-m-d"',
            'phone_number' => 'required|digits_between:6,13',
            'git_link' => 'required|url',
            'about' => 'required',
            'address' => 'required',
            'image' => 'sometimes|image'
            
		]);
        
        $profile = new Profile;

        $profile->user_id = auth()->id();
        $profile->name = request('name');
        $profile->lastname = request('lastname');
        $profile->birth_date = request('birth_date');
        $profile->phone_number = request('phone_number');
        $profile->about = request('about');
        $profile->git_link = request('git_link');
        $profile->address = request('address');

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(170, 170)->save($location);

            $profile->image = $fileName; 
        }

        $profile->save();

        return redirect()->route('home', auth()->user()->username);

    }

    public function show($username, $id)
    {
        $username = Auth::user()->username;
        //$profile = Profile::find($id);
        $profile = User::where('username', '=', $username)->first()->profile;

        return view('layouts.profile')->with('profile', $profile)->with('username', $username);
    }

    public function edit($username, $id)
    {
        $username = Auth::user()->username;
        //$profile = Profile::find($id);
        $profile = User::where('username', '=', $username)->first()->profile;

        return view('layouts.profileEditForm')->with('profile', $profile)->with('username', $username);
    }

    public function update($username, $id)
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birth_date' => 'required|date_format:"Y-m-d"',
            'phone_number' => 'required|digits_between:6,13',
            'git_link' => 'required|url',
            'about' => 'required',
            'address' => 'required',
            'image' => 'sometimes|image'
            
        ]);

        $username = auth()->user()->username;
        $profile = User::where('username', '=', $username)->first()->profile;

        $profile->user_id = auth()->id();
        $profile->name = request('name');
        $profile->lastname = request('lastname');
        $profile->birth_date = request('birth_date');
        $profile->phone_number = request('phone_number');
        $profile->about = request('about');
        $profile->git_link = request('git_link');
        $profile->address = request('address');

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(170, 170)->save($location);
            $oldFileName = $profile->image;

            $profile->image = $fileName;

            Storage::delete($oldFileName); 
        }

        $profile->save();

        return redirect()->route('profile.show', [$username, $profile]);
    }

    public function destroy($id)
    {
        $profile = User::where('username', '=', auth()->user()->username)->first()->profile;

        $profile->delete();
        return redirect()->route('home');
    }
}
