@extends('layouts.db-admin')

@section('content')

    <div class="flex justify-center w-full">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-2xl">Add Category</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('db-admin.storecategory') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="space-y-3">
                                    <div class="row items-center">
                                        <div class="col-md-4">
                                            <label>Image</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input name="image" class="input-box @error('image') border-primary @enderror focus:border focus:border-blue-700" type="file">
                                            @error('image')
                                                <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row items-center">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input name="name" type="text" class="@error('name') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ old('name') }}">
                                            @error('name')
                                                <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <a href="{{ route('db-admin.category') }}" class="btn btn-secondary bg rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Cancel</a>
                                        <button type="submit" class="btn btn-primary bg-primary rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection