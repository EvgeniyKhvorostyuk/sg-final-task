@extends('layouts.master')

@section('content')
    <div class="content fullwidth">
        <div class="container pt">
            @foreach($profiles as $profile)
                <div class="one_third team last">
                    <div class="title">{{ $profile->name }} {{ $profile->lastname }}</div>

                    <div class="image" style="background: none;"><img src="{{ asset('images/' . $profile->image) }}" style="display: inline;"></div>

                    <p class="description">{{ $profile->about}}</p>

                </div>
            @endforeach
        </div>
    </div>
@endsection