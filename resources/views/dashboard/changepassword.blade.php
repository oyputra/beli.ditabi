@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-center">
        <!-- single card -->
        <div class="shadow rounded bg-white px-4 pt-6 pb-8 lg:w-8/12 w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-2xl">Password of Account</h3>
            </div>
            <form action="{{ route('dashboard.updatepassword') }}" enctype="multipart/form-data" method="POST">
                <div class="space-y-3 flex flex-col px-5 mt-10">
                    @csrf
                    @method('PUT')
                    <div class="items-center">
                        <label class="text-gray-600 mb-2 block">Current Password</label>
                        <input type="password" name="old_password" class="@error('old_password') border-primary @enderror input-box" placeholder="Enter current password">
                        @error('old_password')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="items-center">
                        <label class="text-gray-600 mb-2 block">New Password</label>
                        <input type="password" name="password" class="@error('password') border-primary @enderror input-box" placeholder="Enter new password">
                        @error('password')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="items-center">
                        <label class="text-gray-600 mb-2 block">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="@error('password_confirmation') border-primary @enderror input-box" placeholder="Enter confirm password">
                        @error('password_confirmation')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="items-center pt-3">
                        <button type="submit" class="bg-blue-700 text-white px-3 py-2 rounded-3xl float-right">Update</button>
                        {{-- <input type="hidden" name="_token" value="{{ Session::token() }}"}> --}}
                    </div>
                </div>
            </form>
        </div>
        <!-- single card end -->
    </div>
@endsection