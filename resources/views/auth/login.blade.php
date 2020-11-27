<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app_name', 'DigiQ') }}</title>

    <!--Link to Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body style="background-color:#BAF7FE;">
    <div class="container text-center" style="padding-top:150px;">
        <div class="row">
            <div class="col-sm-4 jerry">
                {{-- <img class="mx-auto mb-2" style="border-radius: 10px; width:50%;" src="{{asset('img/logo.png')}}" alt="This is an image of logo"> --}}
                <h1 class="mt-5">DigiQ</h1>
                <h4 class="mt-2 header">Login</h4>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group w-75 ml-5">
                        {{-- Username --}}
                        <div class="input-group">
                        <span class="input-group-text mt-2"><i class="fa fa-user fa-lg icon tom" aria-hidden="true" class = "icon"></i></span>
        
                            <input id="email" type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Password --}}
                        <div class="input-group pt-3">
                            <span class="input-group-text"><i class="fa fa-lock fa-lg icon tom" aria-hidden="true" class = "icon"></i></span>
                    
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        {{-- Remember me --}}
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                        {{-- Login button and Forgot Password --}}
                        <div class="form-check">
                            <button type="submit" class="btn btn-primary ml-3 px-5 mt-4 mb-2" style="border-radius:50px; background-color: #08417a;"><i class="fa fa-sign-in fa-lg icon mr-1" aria-hidden="true" class = "icon"></i>
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <a class="btn btn-link" href="/resetpassword">Reset Password</a> --}}
            </div>
            <div class="col-8">
                <img id="queue" src="{{ asset('img/queue.png') }}" alt="This is an image">
            </div>
        </div>
    </div>
</body>
</html>







{{-- @extends('myLayout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
