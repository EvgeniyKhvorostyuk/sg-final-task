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
        $this->middleware('auth');
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

    public function show(User $user, Profile $profile)
    {

        return view('layouts.profile', compact('user', 'profile'));
    }
}
