@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-center">
        <!-- single card -->
        <div class="shadow rounded bg-white px-4 pt-6 pb-8 lg:w-8/12 w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-2xl">Password of Account</h3>
            </div>
            <div class="space-y-3 flex flex-col px-5 mt-10">
                <div class="items-center">
                    <label class="text-gray-600 mb-2 block">Current Password</label>
                    <input type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 lg:text-sm text-xs rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="Enter current password">
                </div>
                <div class="items-center">
                    <label class="text-gray-600 mb-2 block">New Password</label>
                    <input type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 lg:text-sm text-xs rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="Enter new password">
                </div>
                <div class="items-center">
                    <label class="text-gray-600 mb-2 block">Confirm Password</label>
                    <input type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 lg:text-sm text-xs rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="Enter confirm password">
                </div>
                <div class="items-center pt-3">
                    <a href="#" class="bg-blue-700 text-white px-3 py-2 rounded-3xl float-right">Update</a>
                </div>
            </div>
        </div>
        <!-- single card end -->
    </div>
@endsection