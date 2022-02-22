@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center w-full">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-2xl">Create Product</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('db-admin.storeproduct') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="space-y-3">
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="image" class="input-box @error('image') border-primary @enderror focus:border focus:border-blue-700" type="file" value="{{ old('image') }}">
                                                @error('image')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-start">
                                            <div class="col-md-4">
                                                <label>Qty</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="qty" type="number" min="1" class="@error('qty') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ old('qty') }}">
                                                @error('qty')
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
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Brand</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="brand" type="text" class="@error('brand') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ old('brand') }}">
                                                @error('brand')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Category</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select name="category_id" class="@error('category_id') border-primary @enderror choices form-select input-box focus:ring-0 focus:border focus:border-blue-700 capitalize" value="{{ old('category_id') }}">
                                                        <option selected disabled>--- Choose ---</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : ''}}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Color</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="color" type="text" class="@error('color') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ old('color') }}">
                                                @error('color')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>SKU (Automatic)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="@error('sku') border-primary @enderror input-box focus:border focus:border-blue-700">{{ $sku }}</p>
                                                <input type="hidden" name="sku" value="{{ $sku }}">
                                                @error('sku')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="price" type="text" class="@error('price') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ old('price') }}">
                                                @error('price')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-start">
                                            <div class="col-md-4">
                                                <label>Product Detail</label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="detail" class="@error('detail') border-primary @enderror input-box focus:border focus:border-blue-700">{{ old('detail') }}</textarea>
                                                @error('detail')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="{{ route('db-admin.shop') }}" class="btn btn-secondary bg rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Cancel</a>
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
    </section>
@endsection