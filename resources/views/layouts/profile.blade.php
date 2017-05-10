@extends('layouts.master')


@section('content')
    <!-- +++++ Welcome Section +++++ -->
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                profile
                    {{-- @if (!isset($profile->image))
                        <img src="{{ asset('images/' . 'user.png') }}" alt="Stanley">
                    @else
                        <img class="img-circle" src="{{ asset('images/' . $profile->image) }}" alt="Stanley">
                    @endif
                    
                    <h1>Hi, I am {{ $profile->name }} {{ $profile->lastname }}!</h1>
                    <p>{{ $profile->about }}</p>
                    
                    <p>
                      <strong><i class="fa fa-calendar"></i> Birthdate</strong> : {{ $profile->birth_date }}<br>
                      <strong><i class="fa fa-phone"></i> Phone</strong> : {{ $profile->phone_number }}<br>
                      <strong><i class="fa fa-envelope"></i> Email</strong> : {{ $profile->user->email }}<br>
                      <strong><i class="fa fa-github"></i> GitHub Link</strong> : {{ $profile->git_link }}<br>
                      <strong><i class="fa fa-location-arrow"></i> Addressed</strong> : {{ $profile->address }}<br>
                    </p> --}}
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->
@endsection