@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
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
</div> --}}

<!-- register card -->
<div class="bg-primary">
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden bg-white">
            <div class="text-center">
                <h2 class="lg:text-2xl text-xl uppercase font-semibold mb-1">Create An Account</h2>
                <p class="text-gray-600 mb-6 text-xs lg:text-sm">
                    Register here if you don't have account
                </p>
            </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-4 lg:text-base text-sm">
            @csrf
                <div>
                    <label class="text-gray-600 mb-2 block">Full Name <span class="text-primary">*</span></label>
                    <input name="name" type="text" class="@error('name') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('name') }}" placeholder="Enter your full name" autofocus>

                    @error('name')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-600 mb-2 block">Email Address <span class="text-primary">*</span></label>
                    <input name="email" type="email" class="@error('email') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('email') }}" placeholder="Enter your email address">

                    @error('email')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-600 mb-2 block">Password <span class="text-primary">*</span></label>
                    <input name="password" type="password" class="@error('password') border-primary @enderror input-box focus:border focus:border-primary" placeholder="Enter your password">

                    @error('password')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                
                <div>
                    <label class="text-gray-600 mb-2 block">Confirm Password <span class="text-primary">*</span></label>
                    <input name="password_confirmation" type="password" class="input-box focus:border focus:border-primary" placeholder="Confirm your password">
                </div>

                <div class="flex items-center justify-between mt-6 text-xs lg:text-base">
                    <div class="flex items-center">
                        <input type="checkbox" class="text-primary focus:ring-0 rounded-sm cursor-pointer" id="agreement">
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">I have read and agree to the
                            <a href="#" class="text-primary hover:text-red-800">terms & conditions</a>
                        </label>
                        
                    </div>
                </div>

                <button type="submit" class="hover:shadow-xl rounded block w-full py-2 bg-primary border border-primary uppercase text-white lg:text-xl text-sm font-roboto font-medium transition delay-75 duration-300 ease-in-out transform hover:-translate-y-1">CREATE ACCOUNT</button>
            </form>
            
            <p class="mt-4 text-gray-600 text-center text-xs lg:text-base">
                Already have an account? <a href="{{ route('login') }}" class="text-primary hover:text-red-800">Login now</a>
            </p>
        </div>
    </div>
</div>
<!-- register card end -->
@endsection
