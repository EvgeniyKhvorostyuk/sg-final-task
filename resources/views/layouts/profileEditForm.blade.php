@extends('layouts.master')

@section('content')

	<div id="ww">
        <div class="container">
        	<div class="row mt">
	            <div class="col-lg-6 col-lg-offset-3 centered">
	                <h3>Edit</h3>
	                <hr>
	                <p>Please edit the profile to make it more likable for you</p>
	            </div>
        	</div>
        	<div class="row mt">    
            <div class="col-lg-8 col-lg-offset-2">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" 
                    action="{{ route('profile.update', [auth()->user()->username, $profile->id] ) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}

                    <div class="form-group">
                        <label for="name">Enter your Name:</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="name" type="text" class="form-control" name="name" value="{{ $profile->name}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="lastname">Enter your Lastname:</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $profile->lastname}}">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="image">Choose your main photo:</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="image" type="file" class="form-control" name="image">

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="birth_date">When did you born ?</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ $profile->birth_date}}">

                            @if ($errors->has('birth_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Your phone number:</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="phone_number" type="tel" class="form-control" name="phone_number" value="{{ $profile->phone_number}}">

                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="address">Where do you live ?</label>

                        {{-- <div class="col-md-6"> --}}
                            <textarea id="address" type="text" class="form-control" name="address">{{ $profile->address}}</textarea> 

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="git_link">Your account on GitHub:</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="git_link" type="url" class="form-control" name="git_link" value="{{ $profile->git_link}}">

                            @if ($errors->has('git_link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('git_link') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="about">Type some words about yourself:</label>

                        {{-- <div class="col-md-6"> --}}
                            <textarea id="about" rows="10" cols="45" type="text" class="form-control" name="about">{{ $profile->about}}</textarea>

                            @if ($errors->has('about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                        	<button type="submit" class="btn btn-success btn-block">
                                Save changes
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('profile.show', [$profile->user->username, $profile->id]) }}" class="btn btn-danger btn-block" style="color: #ffffff" >Cancel</a>
                        </div>
                    </div>
                </form>             
            </div>
        </div><!-- /row -->	
        </div> <!-- /container -->
    </div><!-- /ww -->

@endsection