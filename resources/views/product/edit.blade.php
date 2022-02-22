@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-center py-3 bg-gray-100">
    <!-- create product form -->
    <div class="lg:w-8/12 bg-white shadow-lg p-4 my-8 rounded">
        <div class="container flex items-center justify-center py-3 capitalize relative lg:mb-6">
            <h2 class="lg:text-3xl text-xl font-medium font-domine bg-white px-3 relative text-gray-800 uppercase z-10">create product</h2>
            <div class="border-b-2 border-gray-200 left-0 lg:top-8 top-7 absolute w-full"></div>
        </div>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4 capitalize">
                <div>
                    <img src="{{ Storage::url($product->image) }}" class="my-3 w-full object-cover rounded">
                    <label for="formFile" class="form-label inline-block mb-2 text-gray-700 text-base">Product Image</label>
                    <input name="image" class="form-control form-control input-box" type="file" id="formFile">
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Name</span></label>
                    <input name="name" type="text" class="@error('name') border-primary @enderror form-control input-box" value="{{ $product->name }}">

                    @error('name')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Brand</label>
                    <input name="brand" type="text" class="@error('brand') border-primary @enderror form-control input-box" value="{{ $product->brand }}">

                    @error('brand')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Category</label>
                    <select name="category" class="@error('category') border-primary @enderror form-select appearance-none input-box" aria-label="Default select example">
                        <option disabled></option>
                        <option value="tshirt" {{ $product->category == 'tshirt' ? 'selected' : '' }}>Tshirt</option>
                        <option value="jacket" {{ $product->category == 'jacket' ? 'selected' : '' }}>Jacket</option>
                        <option value="shoes" {{ $product->category == 'shoes' ? 'selected' : '' }}>Shoes</option>
                    </select>

                    @error('category')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Color</label>
                    <input name="color" type="text" class="@error('color') border-primary @enderror form-control input-box" value="{{ $product->color }}">

                    @error('color')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">SKU</label>
                    <input name="sku" type="text" class="@error('sku') border-primary @enderror form-control input-box" value="{{ $product->sku }}">

                    @error('sku')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div>
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Price</label>
                    <input name="price" type="number" class="@error('price') border-primary @enderror form-control input-box" value="{{ $product->price }}">

                    @error('price')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label inline-block mb-2 text-gray-600 text-sm lg:text-base">Product Details</label>
                    <textarea name="detail" class="@error('detail') border-primary @enderror form-control input-box" rows="3">{{ $product->name }}</textarea>

                    @error('detail')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="hover:shadow-xl rounded block text-center w-full py-2 bg-primary border border-primary uppercase text-white lg:text-xl text-sm font-roboto font-medium transition animation">Update</button>
                <a href="{{ route('product.index') }}" class="hover:shadow-xl rounded block text-center w-full py-2 bg-transparent hover:bg-gray-800 border border-gray-800 uppercase text-gray-800 hover:text-white lg:text-xl text-sm font-roboto font-medium transition animation">Cancel</a>
            </div>
        </form>
    </div>
    <!-- create product form end -->
</div>
@endsection