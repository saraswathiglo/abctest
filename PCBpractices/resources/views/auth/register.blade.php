@extends('layouts.login')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                            {{ __('Register') }}
                        </span>
                    <form class="login100-form p-l-55 p-r-55 p-t-20" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter password">
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please re enter password">
                            <input id="password-confirm" type="password" class="input100" name="password_confirmation" placeholder="Re-Enter Password" required autocomplete="new-password">

                            <span class="focus-input100"></span>
                        </div>


                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                {{ __('Register') }} now
                            </button>
                        </div>
                        <div class="flex-col-c p-t-140 p-b-40">
                                <span class="txt1 p-b-9">
                                    Already have an account?
                                </span>
                            <a href="{{ route('login') }}" class="txt3">
                                {{ __('Login') }} now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
