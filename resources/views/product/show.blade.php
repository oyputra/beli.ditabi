@extends('layouts.app')

@section('content')
    {{-- session --}}
    @if (session('status'))
        <div class="flex py-4 justify-center lg:text-base text-xs">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <span class="block sm:inline">
                <strong class="font-bold">Notice!</strong> {!! session('status') !!}
                </span>
            </div>
        </div>    
    @endif
    {{-- session end --}}
    <!-- product view -->
    <div class="container grid lg:grid-cols-2 grid-cols-1 gap-6 py-4 mb-8">
        <!-- product image -->
        <div>
            <img src="{{ Storage::url($product->image) }}" class="w-full object-cover h-96 bg-no-repeat bg-top">
            <div class="grid grid-cols-5 gap-4 mt-4">
                <img src="{{ Storage::url($product->image) }}" class="w-full cursor-pointer border border-primary object-cover lg:h-28 h-20">
                <img src="{{ Storage::url($product->image) }}" class="w-full cursor-pointer border object-cover lg:h-28 h-20 hover:border hover:border-primary transition">
                <img src="{{ Storage::url($product->image) }}" class="w-full cursor-pointer border object-cover lg:h-28 h-20 hover:border hover:border-primary transition">
                <img src="{{ Storage::url($product->image) }}" class="w-full cursor-pointer border object-cover lg:h-28 h-20 hover:border hover:border-primary transition">
                <img src="{{ Storage::url($product->image) }}" class="w-full cursor-pointer border object-cover lg:h-28 h-20 hover:border hover:border-primary transition">
            </div>
        </div>
        <!-- product image end -->
        
        <!-- product content -->
        <div class="space-y-4">
            <h2 class="lg:text-3xl text-xl font-medium uppercase">{{ $product->name }}</h2>

            <div class="flex items-center">
                <div class="flex gap-1 lg:text-sm text-xs text-yellow-400">
                    <span><i class="fas fa-star"></i>
                    <span><i class="fas fa-star"></i>
                    <span><i class="fas fa-star"></i>
                    <span><i class="fas fa-star"></i>
                    <span><i class="fas fa-star"></i></p>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>

            <!-- product identity -->
            <div class="space-y-2 text-sm lg:text-base">
                <p class="font-semibold space-x-2">
                    <span class="text-black">Avilability:</span>
                    <span class="text-gray-600">{{ $product->qty }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-black font-semibold">Brand:</span>
                    <span class="text-gray-600">{{ $product->brand }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-black font-semibold">Category:</span>
                    <span class="text-gray-600">{{ $product->category->name }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-black font-semibold">Color:</span>
                    <span class="text-gray-600">{{ $product->color }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-black font-semibold">SKU:</span>
                    <span class="text-gray-600">{{ $product->sku }}</span>
                </p>
                <!-- price -->
                <div class="flex items-baseline mb-1 space-x-2">
                    <span class="text-black font-semibold">Price:</span>
                    <p class="lg:text-xl text-lg text-primary font-roboto font-semibold">@currency($product->price) IDR</p>
                </div>
                <!-- price end -->
            </div>
            <!-- product identity end -->
            

            <!-- cart button -->
            <div class="flex lg:flex-row flex-col gap-3">
                <a href="{{ route('order.create', $product->id) }}" class="w-full bg-primary hover:bg-transparent text-sm lg:text-base justify-center border border-primary text-white hover:text-primary px-8 py-2 font-medium rounded uppercase flex items-center gap-2 transition animation hover:shadow-xl">
                    Checkout
                </a>
            </div>
            <!-- cart button end -->
        </div>
        <!-- product content end -->
    </div>
    <!-- product view end -->

    <!-- product view details -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 lg:pb-3 pb-1 font-medium">Product Details</h3>

        <div class="lg:w-3/5 pt-6">
            <div class="text-gray-600 space-y-3 lg:text-base text-xs">
                <p>{{ $product->detail }}</p>
            </div>
        </div>
    </div>
    <!-- product view details end -->

    <!-- product wrapper -->
    <div class="container lg:py-16 py-8">
                
        <h2 class="lg:text-3xl font-medium text-gray-800 uppercase mb-6">Related Products</h2>
        <!-- product grid -->
        <div class="grid lg:grid-cols-4 grid-cols-2 gap-6">

            <!-- single product -->
            @foreach ($products as $product)

                <div class="bg-white shadow rounded overflow-hidden relative h-full">
                    <!-- product image -->
                    <div class="relative group capitalize">
                        <img src="{{ Storage::url($product->image) }}" class="w-full object-cover lg:h-72 h-40">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('product.show', $product->id) }}" class="text-white hover:text-gray-700 text-xs lg:text-lg px-4 py-1 rounded-sm hover:border-opacity-0 flex items-center justify-center transition hover:bg-white border border-white">
                                View
                            </a>
                        </div>
                    </div>
                    <!-- product image end -->
                    <!-- product content -->
                    <div class="py-3 lg:px-4 px-2 lg:h-36 h-28 grid content-between">
                        <h4 class="uppercase font-medium lg:text-xl text-sm text-gray-800 max-h-0">{{ $product->name }}</h4>
                        <div>
                            <div class="flex items-baseline mb-1 space-x-1 font-roboto">
                                <p class="lg:text-xl text-sm text-primary font-semibold">@currency($product->price) IDR</p>
                                {{-- <p class="lg:text-sm text-xs text-gray-400 line-through">Rp{{ $product->price }}</p> --}}
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 lg:text-sm text-xs text-yellow-400">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-1 lg:ml-3">(150)</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block w-full py-1 text-center lg:text-base text-sm text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add to cart</a>
                    <!-- product content end -->
                </div>
            
            @endforeach
            <!-- single product end -->
            
        </div>
        <!-- product grid end -->
    </div>
    <!-- product wrapper end -->
@endsection