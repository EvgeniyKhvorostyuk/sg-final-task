@extends('layouts.master')

@section('content')
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>Profiles</h3>
                <hr>
                <p>Here we are displaying all our profiles</p>
            </div>
        </div>
        <div class="row mt"> 
            @foreach($profiles as $profile)
                <div class="one_third team last">
                    <div class="title">
                        <a href="
                            @if (Auth::check() && auth()->user()->profile != null && auth()->user()->profile->id == $profile->id)
                                {{ route('profile.show', [auth()->user()->username, auth()->user()->profile->id] ) }}
                            @else 
                                {{route('profile.getProfile', $profile->id)}}
                            @endif    
                            " style="color:#555">{{ $profile->name }} {{ $profile->lastname }}
                        </a>
                    </div>

                    <div class="image" style="background: none;"><img src="{{ asset('images/' . $profile->image) }}" style="display: inline;"></div>

                    <p class="description">{{ substr($profile->about, 0, 90)}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection