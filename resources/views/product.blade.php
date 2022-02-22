@extends('layouts.app')

@section('content')
<div class="py-3">
    <div class="container">
        {{-- session --}}
            @if (session('status'))
                <div class="flex justify-center lg:text-base text-xs">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <span class="block sm:inline">
                        <strong class="font-bold">Notice!</strong> {!! session('status') !!}
                        </span>
                    </div>
                </div>    
            @endif
        {{-- session end --}}

        {{-- title --}}
        <div class="flex items-center justify-center py-3 capitalize relative lg:my-6">
            <h2 class="lg:text-5xl text-xl font-medium font-domine bg-white px-3 relative text-gray-800 uppercase z-10">Happy Shopping!</h2>
            <div class="border-b-2 border-primary left-0 lg:top-8 top-6 absolute w-full"></div>
        </div>
        {{-- title end --}}
        
        <!-- product wrapper -->
        <div class="lg:pb-16 pb-8 lg:flex">
            @if ( ! $products->isEmpty() )
                <div class="lg:w-3/12">
                    {{-- category --}}
                    <h2 class="lg:text-3xl font-medium text-gray-800 uppercase mb-6">Category</h2>
                    <div class="mb-6 capitalize lg:flex lg:flex-col gap-3 grid grid-cols-4 lg:grid-cols-1">
                        <a href="{{ route('products') }}" class="flex justify-center text-center lg:w-6/12 bg-primary text-xs lg:text-base border border-primary text-white px-4 py-2 font-medium rounded capitalize hover:bg-transparent hover:text-primary transition animation hover:shadow-xl">All Product</a>
                        @foreach ($filters as $filter)
                            <div class="flex justify-center lg:w-6/12 px-4 py-2 relative bg-primary text-xs lg:text-base border border-primary text-white font-medium rounded capitalize hover:bg-transparent hover:text-primary transition animation hover:shadow-xl">
                                <form action="{{ route('products') }}" method="GET">
                                @csrf
                                    <input type="hidden" name="category_id" value="{{ $filter->category_id }}">
                                    {{ $filter->category->name }}
                                    <button type="submit" class="px-4 py-2 absolute inset-0 capitalize"></button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    {{-- category end --}}
                </div>
                <div class="lg:w-9/12">
                    <!-- product grid -->
                    <h2 class="lg:text-3xl font-medium text-gray-800 uppercase mb-6">Products ({{count($products)}})</h2>
                    <div class="grid lg:grid-cols-3 grid-cols-2 gap-6">
            
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
                                        <div class="flex items-baseline lg:text-base text-sm mb-1 space-x-1 font-roboto capitalize">
                                            <p>{{ $product->category->name }}</p>
                                        </div>
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
                                <a href="{{ route('order.create', $product->id) }}" class="block uppercase w-full py-1 text-center lg:text-base text-sm text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                                    Checkout
                                </a>
                                <!-- product content end -->
                            </div>
                        
                        @endforeach
                        <!-- single product end -->
                        
                    </div>
                    <!-- product grid end -->
                </div>
            @else
                <div class="flex flex-col items-center justify-center text-center text-xs lg:text-base space-y-3 w-full">
                    <p>There are currently no products available!</p>
                    @if ( auth()->check() && auth()->user()->is_admin == 1)
                        <a href="{{ route('db-admin.addproduct') }}" class="bg-primary border border-primary text-white px-4 py-2 font-medium rounded capitalize hover:bg-transparent hover:text-primary transition animation hover:shadow-xl">Add Product Now!</a>
                    @endif
                    <div class="lg:w-6/12">
                        <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                    </div>
                </div>
            @endif

        </div>
        <!-- product wrapper end -->

        <!-- product related -->
        <div class="lg:py-16 py-8">

            @if ( ! $products->isEmpty() )
                <h2 class="lg:text-3xl font-medium text-gray-800 uppercase mb-6">Related Products</h2>
                <!-- product grid -->
                <div class="grid lg:grid-cols-4 grid-cols-2 gap-6">
                    <!-- single product -->
                    @foreach ($relatedproducts as $product)

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
                                    <div class="flex items-baseline mb-1 space-x-1 font-roboto capitalize">
                                        <p>{{ $product->category->name }}</p>
                                    </div>
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
                            <a href="{{ route('order.create', $product->id) }}" class="block uppercase w-full py-1 text-center lg:text-base text-sm text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                                Checkout
                            </a>
                            <!-- product content end -->
                        </div>
                    
                    @endforeach
                    <!-- single product end -->
                </div>
                <!-- product grid end -->
            @else
            
            @endif
                    
        </div>
        <!-- product related end -->
    </div>
</div>
@endsection