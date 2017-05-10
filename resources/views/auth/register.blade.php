@extends('layouts.master')

@section('content')
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>Registration</h3>
                <hr>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
        </div>
        <div class="row mt">    
            <div class="col-lg-8 col-lg-offset-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="username">Username</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        {{-- </div> --}}
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>

                        {{-- <div class="col-md-6"> --}}
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        {{-- </div> --}}
                    </div>

                    <div class="form-group">
                        {{-- <div class="col-md-6 col-md-offset-4"> --}}
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        {{-- </div> --}}
                    </div>
                </form>             
            </div>
        </div><!-- /row -->
    </div><!-- /container -->
@endsection
