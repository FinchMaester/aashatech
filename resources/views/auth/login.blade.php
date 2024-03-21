@extends('layouts.app')
@php
    $sitesetting = App\Models\Sitesetting::first();
@endphp

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    @include('admin.login.head')

    <body>

        <main class="main" id="top">
            <div class="container-fluid">
                <div class="row min-vh-100 flex-center g-0">
                    <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                            src="{{ asset('adminassets/assets/img/icons/spot-illustrations/bg-shape.png') }}" alt=""
                            width="250"><img class="bg-auth-circle-shape-2"
                            src="{{ 'adminassets/assets/img/icons/spot-illustrations/shape-1.png' }}" alt=""
                            width="150">
                        <div class="card overflow-hidden z-index-1">
                            <div class="card-body p-0">
                                <div class="row g-0 h-100">
                                    <div class="col-md-5 text-center bg-card-gradient">
                                        <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                            <div class="bg-holder bg-auth-card-shape"
                                                style="background-image:url({{ 'adminassets/assets/img/icons/spot-illustrations/half-circle.png' }});">
                                            </div>
                                            <!--/.bg-holder-->
                                            {{-- {{ $sitesetting->main_logo }} --}}
                                            {{-- <div class="z-index-1 position-relative">
                                                <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder">
                                                    <img src="{{ $sitesetting->main_logo }}" alt="image"></a>
                                                <p class="opacity-75 text-white">{{ $sitesetting->slogan }} </p>
                                            </div> --}}
                                            <div class="z-index-1 position-relative">
                                                <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder">
                                                    @if (isset($sitesetting->main_logo))
                                                        <img src="{{ $sitesetting->main_logo }}" alt="image">
                                                    @else
                                                        <img src="{{ asset('/images/logo.png') }}" alt="dummy image">
                                                        {{-- <img src= "{{ url('/images/logo.png') }}"alt="dummy image"> --}}
                                                    @endif
                                                </a>
                                                <p class="opacity-75 text-white">
                                                    @if (isset($sitesetting->slogan))
                                                        {{ $sitesetting->slogan }}
                                                    @else
                                                        <h6>East or West Aasha Tech is Best</h6>
                                                    @endif
                                                </p>
                                            </div>

                                        </div>
                                        {{-- <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                  <p class="text-white">Don't have an account?<br><a class="text-decoration-underline link-light" href="../../../pages/authentication/card/register.html">Get started!</a></p>
                  <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Read our <a class="text-decoration-underline text-white" href="#!">terms</a> and <a class="text-decoration-underline text-white" href="#!">conditions </a></p>
                </div> --}}
                                    </div>
                                    <div class="col-md-7 d-flex flex-center">
                                        <div class="p-4 p-md-5 flex-grow-1">
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <h3>Account Login</h3>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="user-box">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>
                                                    <label for="email">{{ __('Email Address') }}</label>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="user-box">

                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">
                                                    <label for="password" class="">{{ __('Password') }}</label>

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>

                                                    {{-- @if (Route::has('password.request'))
                                                        <a class="forgot_btn" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                        @endif --}}

                                                    <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3"
                                                            type="submit" name="submit">Log in</button></div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('admin.login.scripts')

    </body>

    </html>
@endsection
