@extends('layouts.db-admin')

@section('content')
    <div class="flex justify-center">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-2xl">Avatar of Account</h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                        <div class="row align-items-center mb-5">
                            <div class="mb-3 col-md-3 col-6 text-center mx-auto space-y-3 flex justify-center">
                                @if ( $user->image == null )
                                    <img src="{{ asset('images/user.bmp') }}" class="rounded-lg object-cover w-20 h-20" style="object-position: center top;">
                                @else
                                    <img src="{{ Storage::url($user->image) }}" class="rounded-lg object-cover w-20 h-20" style="object-position: center top;">
                                @endif
                            </div>
                            <div class="mb-1 col-md-9 col-12 relative">
                                <form action="{{ route('db-admin.updateavatar') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal space-y-3">
                                    @csrf
                                    @method('PUT')
                                    <input name="image" class="@error('image') border-primary @enderror input-box" type="file">
                                    <input type="hidden" name="oldimage" value="{{ $user->image }}">
                                    @error('image')
                                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                    @enderror
                                    <div class="flex justify-end gap-2">
                                        <button type="submit" class="flex btn btn-primary bg-primary rounded-pill focus:ring-0 hover:shadow-xl animation">
                                            Update
                                        </button>
                                    </div>
                                </form>
                                
                                @if ( $user->image !== null )
                                    <div class="absolute bottom-0 flex">
                                        <form action="{{ route('db-admin.destroyavatar') }}" method="POST" class="flex justify-end mt-3">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="oldimage" value="{{ $user->image }}">
                                            <button type="submit" class="flex btn btn-danger bg-danger rounded-pill focus:ring-0 hover:shadow-xl animation">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection