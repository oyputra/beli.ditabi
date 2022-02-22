@extends('layouts.db-admin')

@section('content')
    @if ( ! $products->isEmpty() )
        <div class="flex justify-between items-center mb-5">
            <p>The shop has {{ count($products) }} products</p>
            <a href="{{ route('db-admin.addproduct') }}" class="btn btn-primary hover:shadow-xl animation">Add Product</a>
        </div>

        <div class="grid lg:grid-cols-3 gap-3 w-full">
            
            @foreach ($products as $product)
                <div class="card">
                    <div class="card-content text-sm">
                        <img src="{{ Storage::url($product->image) }}" class="card-img-top img-fluid object-cover h-72" alt="singleminded">
                        <div class="card-body">
                            <h5 class="card-title uppercase font-semibold">{{ $product->name }}</h5>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Qty</p>
                                <p class="col-span-2 font-semibold">{{ $product->qty }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Brand</p>
                                <p class="col-span-2 font-semibold">{{ $product->brand }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Category</p>
                                <p class="col-span-2 font-semibold capitalize">{{ $product->category->name }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Color</p>
                                <p class="col-span-2 font-semibold">{{ $product->color }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">SKU</p>
                                <p class="col-span-2 font-semibold">{{ $product->sku }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Detail</p>
                                <p class="col-span-2 font-semibold">{{ $product->detail }}</p>
                            </div>
                            <div class="grid grid-cols-3">
                                <p class="col-span-1">Price</p>
                                <h5 class="card-text col-span-2 text-lg font-semibold">@currency($product->price) IDR</h5>
                            </div>
                            <div class="flex justify-end items-end my-2 mt-5 gap-3">
                                <form action="{{ route('db-admin.destroyproduct', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="oldimage" value="{{ $product->image }}">
                                    <button class="btn btn-danger flex focus:ring-0 hover:shadow-xl animation">Delete</button>
                                </form>
                                <a href="{{ route('db-admin.changeproduct', $product->id) }}" class="btn btn-primary focus:ring-0 hover:shadow-xl animation">Change</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="flex flex-col justify-center">
                        <div class="text-center">
                            <p>There is currently no product available!</p>
                            <a href="{{ route('db-admin.addproduct') }}" class="btn btn-primary my-3 focus:ring-0">Add Product Now!</a>
                        </div>
                        <div class="flex justify-center">
                            <div class="lg:w-6/12">
                                <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection