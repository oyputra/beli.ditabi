@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-center">
        <!-- single card -->
        <div class="shadow relative rounded bg-white px-4 pt-6 pb-8 lg:w-8/12 w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-2xl">Avatar</h3>
                <a href="#" class="text-primary"></a>
            </div>
            <form action="{{ route('dashboard.updateavatar') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                @csrf
                @method('PUT')
                <div class="space-x-3 grid grid-cols-4 items-center">
                    <div class="col-span-1">
                        @if ( $user->image == null )
                            <img src="{{ asset('images/user.bmp') }}" class="rounded-lg">
                        @else
                            <img src="{{ Storage::url($user->image) }}" class="rounded-lg object-cover" style="object-position: center top;">
                        @endif
                    </div>
                    <div class="col-span-3 space-y-2">
                        <h3 class="capitalize text-gray-700 text-lg">Update Image</h3>
                        <input name="image" class="@error('image') border-primary @enderror input-box" type="file">
                        @error('image')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                        <div class="py-3">
                            <button type="submit" class="bg-blue-700 text-white px-3 py-2 rounded-3xl float-right">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            @if ( $user->image !== null )
                <div class="absolute bottom-8 right-28">
                    <form action="{{ route('dashboard.destroyavatar') }}" method="POST" class="flex justify-end mt-3">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="oldimage" value="{{ $user->image }}">
                        <button type="submit" class="bg-primary text-white px-3 py-2 rounded-3xl float-right">
                            Delete
                        </button>
                    </form>
                </div>
            @endif 
        </div>
        <!-- single card end -->
    </div>
@endsection