@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center w-full">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-2xl">Change Product</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('db-admin.updateproduct', $product->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="oldimage" value="{{ $product->image }}">
                                <div class="form-body">
                                    <div class="space-y-3">
                                        <div class="row items-center">
                                            <img src="{{ Storage::url($product->image) }}" class="my-3 w-full object-cover rounded">
                                            <div class="col-md-4">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="image" class="input-box @error('name') border-primary @enderror focus:border focus:border-blue-700" type="file">
                                                @error('image')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Qty</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="qty" type="number" min="1" class="@error('qty') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->qty }}">
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
                                                <input name="name" type="text" class="@error('name') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->name }}">
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
                                                <input name="brand" type="text" class="@error('brand') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->brand }}">
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
                                                <select name="category_id" class="@error('category_id') border-primary @enderror choices form-select input-box focus:ring-0 capitalize focus:border focus:border-blue-700">
                                                    <option disabled>--- Choose ---</option>
                                                    @foreach ($categories as $category)
                                                        <option @if ($product->category->name == $category->name) selected @endif value="{{ $category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : ''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Color</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="color" type="text" class="@error('color') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->color }}">
                                                @error('color')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>SKU</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input name="sku" type="text" class="@error('sku') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->sku }}">
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
                                                <input name="price" type="text" class="@error('price') border-primary @enderror input-box focus:border focus:border-blue-700" value="{{ $product->price }}">
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
                                                <textarea name="detail" class="@error('detail') border-primary @enderror input-box focus:border focus:border-blue-700">{{ $product->detail }}</textarea>
                                                @error('detail')
                                                    <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end mb-1 gap-2">
                                            <a href="{{ route('db-admin.shop') }}" class="btn btn-secondary rounded-pill focus:ring-0 hover:shadow-xl animation">Cancel</a>
                                            <button type="submit" class="btn btn-primary bg-primary rounded-pill focus:ring-0 hover:shadow-xl animation">Update</button>
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