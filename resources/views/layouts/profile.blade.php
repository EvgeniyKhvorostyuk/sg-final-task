@extends('layouts.master')


@section('content')
    <!-- +++++ Welcome Section +++++ -->
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <div class="panel-body">
                        @if (!isset($profile->image))
                            <img src="{{ asset('images/' . 'user.png') }}" width="170" height="170" alt="userimage">
                        @else
                            <img class="img-circle" src="{{ asset('images/' . $profile->image) }}" alt="userimage">
                        @endif
                        
                        <h1>Hi, I am {{ $profile->name }} {{ $profile->lastname }}!</h1>
                        <p>{{ $profile->about }}</p>
                        
                        <p>
                          <strong><i class="fa fa-calendar"></i> Birthdate</strong> : {{ $profile->birth_date }}<br>
                          <strong><i class="fa fa-phone"></i> Phone</strong> : {{ $profile->phone_number }}<br>
                          <strong><i class="fa fa-envelope"></i> Email</strong> : {{ $profile->user->email }}<br>
                          <strong><i class="fa fa-github"></i> GitHub Link</strong> : {{ $profile->git_link }}<br>
                          <strong><i class="fa fa-location-arrow"></i> Addressed</strong> : {{ $profile->address }}<br>
                        </p>
                    </div>
                    @if (Auth::check() && auth()->user()->profile != null && auth()->user()->profile->id == $profile->id)
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('profile.edit', [$profile->user->username, $profile->id]) }}" class="btn btn-primary btn-block" style="color: #ffffff" >Edit</a>
                            </div>
                            <div class="col-sm-6">
                                <form role="form" method="POST" enctype="multipart/form-data" 
                                    action="{{ route('profile.destroy', [auth()->user()->username, $profile->id] ) }}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger btn-block">
                                        Delete a profile
                                    </button>

                                    {{ method_field('DELETE') }}
                                                                        
                                </form>
                            </div>
                        </div>
                    @endif
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->
@endsection