@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-center">
        <!-- single card -->
        <div class="shadow rounded bg-white px-4 pt-6 pb-8 lg:w-8/12 w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-2xl">Account</h3>
            </div>
            <form action="{{ route('dashboard.updatedetail') }}" method="POST" class="form form-horizontal">
                @csrf
                @method('PUT')
                <input name="is_admin" type="hidden" value="{{ $user->is_admin }}">
                <div class="space-y-3 flex flex-col px-5 mt-10">
                    <div class="flex">
                        <div class="w-2/12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person h-8 w-8" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col w-full">
                            <input name="name" class="@error('name') border-primary @enderror input-box" type="text" value="{{ $user->name }}">
                            @error('name')
                                <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-2/12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope h-8 w-8" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col w-full">
                            <input name="email" class="@error('email') border-primary @enderror input-box" type="text" value="{{ $user->email }}">
                            @error('email')
                                <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end pt-3 gap-3">
                        <a href="{{ route('dashboard.detail') }}" class="bg-gray-500 text-white px-3 py-2 rounded-3xl float-right">Cancel</a>
                        <button type="submit" class="bg-blue-700 text-white px-3 py-2 rounded-3xl float-right">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- single card end -->
    </div>
@endsection