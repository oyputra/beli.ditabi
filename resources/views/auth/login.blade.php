@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="" role="alert">
                                        <p class="text-gray-600 text-xs italic">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
</div> --}}

<!-- login card -->
<div class="bg-primary">
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden bg-white">
            <div class="text-center">
                <h2 class="lg:text-2xl text-xl uppercase font-semibold mb-1">Login</h2>
                <p class="text-gray-600 mb-6 text-xs lg:text-sm">
                    Login if you are a returing customer
                </p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="space-y-4 lg:text-base text-sm">
            @csrf
                <div>
                    <label class="text-gray-600 mb-2 block">Email Address</label>
                    <input type="email" name="email" class="@error('email') border-primary @enderror input-box focus:border focus:border-primary" placeholder="Enter your email address" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>                

                <div>
                    <label class="text-gray-600 mb-2 block">Password</label>
                    <input type="password" name="password" class="@error('password') border-primary @enderror input-box focus:border focus:border-primary" placeholder="Enter your password" value="{{ old('password') }}">

                    @error('password')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6 text-xs lg:text-base">
                    <div class="flex items-center">
                        <input type="checkbox" class="text-primary focus:ring-0 rounded-sm cursor-pointer" id="agreement">
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-primary hover:text-red-800">Forgot password</a>
                </div>

                <button type="submit" class="hover:shadow-xl rounded block w-full py-2 bg-primary border border-primary uppercase text-white lg:text-xl text-sm font-roboto font-medium transition delay-75 duration-300 ease-in-out transform hover:-translate-y-1">
                    Login
                </button>
                <!-- transition hover:shadow-xl hover:bg-transparent hover:text-primary rounded-md px-5 py-3 lg:px-8 lg:py-3 bg-primary border border-primary text-white font-medium text-xs lg:text-base -->
            </form>

            <p class="mt-4 text-gray-600 text-center text-xs lg:text-base">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary hover:text-red-800">Register now</a>
            </p>
        </div>
    </div>
</div>
<!-- login card end -->
@endsection
