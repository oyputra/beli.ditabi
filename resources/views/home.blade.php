@extends('layouts.app')

@section('content')
<div>
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-40 relative" style="background-image: url('/images/banner-bg.jpg'); background-position: 0 40% ;">
        
        {{-- session --}}
            @if (session('status'))
                <div class="container flex justify-center lg:text-base text-xs">
                    <div class="absolute top-7">
                        <div class="container">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                                <span class="block sm:inline">
                                <strong class="font-bold">Notice!</strong> {!! session('status') !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>    
            @endif
        {{-- session end --}}

        <div class="container">
            <h1 class="lg:text-6xl text-3xl text-white font-medium">
                <span class="bg-black px-3 py-1 lg:py-0">best collection</span> 
            </h1>
            <h1 class="lg:text-6xl text-3xl text-white font-medium mb-4">
                <span class="bg-black px-3 py-1 lg:py-0">for your outfit</span> 
            </h1>
            <p class="w-2/5 text-xs lg:text-base">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet.
            </p>
            <div class="mt-12">
                <button class="transition hover:shadow-xl hover:bg-transparent bg-primary hover:text-primary text-white animation lg:rounded-md rounded px-5 py-3 lg:px-8 lg:py-3 border border-primary font-medium text-xs lg:text-base">
                    <a href="{{ route('products') }}">Shop</a>
                </button>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- feature section -->
    <div class="container lg:py-16 py-8">
        <div class="w-10/12 grid lg:grid-cols-3 gap-6 mx-auto justify-center grid-cols-1">
            <!-- single feature -->
            <div class="border border-primary rounded-sm px-3 lg:py-6 py-3 flex lg:justify-center pl-10 lg:pl-0 items-center gap-5">
                <i class="fal fa-truck fa-3x w-12 h-12 object-contain text-primary"></i>
                <div>
                    <h4 class="font-medium capitalize lg:text-lg">Free Delivery</h4>
                    <p class="text-gray-500 lg:text-sm text-xs">order over IDR 200.000</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 lg:py-6 py-3 flex lg:justify-center pl-10 lg:pl-0 items-center gap-5">
                <i class="fal fa-wallet fa-3x w-12 h-12 object-contain text-primary"></i>
                <div>
                    <h4 class="font-medium capitalize lg:text-lg">Payment Method</h4>
                    <p class="text-gray-500 lg:text-sm text-xs">various payment methods</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 lg:py-6 py-3 flex lg:justify-center pl-10 lg:pl-0 items-center gap-5">
                <i class="fal fa-user-circle fa-3x w-12 h-12 object-contain text-primary"></i>
                <div>
                    <h4 class="font-medium capitalize lg:text-lg">Create Account</h4>
                    <p class="text-gray-500 lg:text-sm text-xs">free register</p>
                </div>
            </div>
            <!-- single feature end -->
        </div>
    </div>
    <!-- feature section end -->

    <!-- categories -->
    <div class="container lg:py-16 py-8">
        
        @if ( ! $categories->isEmpty() )
            <h2 class="lg:text-3xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
            <div class="grid grid-cols-3 gap-3">
                <!-- single category -->
                @foreach ( $categories as $category )
                    <div class="relative rounded-sm overflow-hidden group">
                        <img src="{{ Storage::url($category->category->image) }}" class="w-full object-cover  lg:h-72 h-40">
                        <form action="{{ route('products') }}" method="GET" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center lg:text-xl text-sm text-white font-roboto font-medium group-hover:bg-opacity-60 transition text-center capitalize">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->category->id }}">
                            <button type="submit" class="absolute inset-0 px-4 py-2 capitalize">{{ $category->category->name }}</button>
                        </form>
                        {{-- <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center lg:text-xl text-sm text-white font-roboto font-medium group-hover:bg-opacity-60 transition text-center capitalize">{{ $category->name }}</a> --}}
                    </div>
                @endforeach
                <!-- single category end -->
            </div>
        @else
            <div class="flex flex-col items-center justify-center space-y-3">
                <p>You don't have products!</p>
                @if ( auth()->check() && auth()->user()->is_admin == 1)
                    <a href="{{ route('db-admin.addproduct') }}" class="bg-primary text-xs lg:text-base border border-primary text-white px-4 py-2 font-medium rounded capitalize hover:bg-transparent hover:text-primary transition animation hover:shadow-xl">Add Product Now!</a>
                @endif
                <div class="lg:w-6/12">
                    <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                </div>
            </div>
        @endif
    </div>
    <!-- categories end -->

    <!-- product wrapper -->
    <div class="container lg:py-16 py-8">

        @if ( ! $products->isEmpty() )
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
        @endif
                
    </div>
    <!-- product wrapper end -->
</div>
@endsection
