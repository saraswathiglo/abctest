@extends('layouts.login')
@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <form method="POST" action="/userlogin">
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
</div>--}}
<div class="main-bg">
    <div class="box-conatiner">
        <div id="a">
            <div class="circle-ripple"></div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h1 class="heading-left">Waste Management</h1>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="wrap-login100">
                        <span class="login100-form-title">
                            Sign In
                        </span>
                    <form class="login100-form p-l-55 p-r-55 p-t-20" method="POST" action="{{ url('/userlogin') }}">
                     @csrf
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Please enter password">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <span class="focus-input100"></span>
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                                <span class="txt1">
                                    Forgot
                                </span>
                            <a href="{{ route('password.request') }}" class="txt2">
                                Username / Password?
                            </a>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                {{ __('Login') }}
                            </button>
                        </div>
                       <!--  <div class="flex-col-c p-t-140 p-b-40">
                                <span class="txt1 p-b-9">
                                    Don’t have an account?
                                </span>
                            <a href="{{ route('register') }}" class="txt3">
                                Sign up now
                            </a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


