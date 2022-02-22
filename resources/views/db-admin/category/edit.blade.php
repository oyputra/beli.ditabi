@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center w-full">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-2xl">Change Category</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('db-admin.updatecategory', $category->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="oldimage" value="{{ $category->image }}">
                                <div class="form-body">
                                    <div class="space-y-3">
                                        <div class="row items-center">
                                            <img src="{{ Storage::url($category->image) }}" class="my-3 w-full object-cover rounded">
                                            <input type="hidden" name="oldimage" value="{{ $category->image }}">
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
                                                <input name="name" type="text" class="@error('name') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $category->name }}">
                                                @error('name')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end mb-1 gap-2">
                                            <a href="{{ route('db-admin.category') }}" class="btn btn-secondary rounded-pill focus:ring-0 focus:outline-none hover:shadow-xl animation">Cancel</a>
                                            <button type="submit" class="btn btn-primary bg-primary rounded-pill focus:ring-0 focus:outline-none hover:shadow-xl animation">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection