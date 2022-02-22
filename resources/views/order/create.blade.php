@extends('layouts.app')

@section('content')
    <!-- checkout wrapper -->
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="container gap-6 grid grid-cols-12 items-start pb-16 pt-4">
            <!-- checkout form -->
            <div class="lg:col-span-8 col-span-12 bg-white shadow-lg p-4 rounded">
                <div class="container flex items-center justify-center py-3 capitalize relative lg:mb-6">
                    <h2 class="lg:text-3xl text-xl font-medium font-domine bg-white px-3 relative text-gray-800 uppercase z-10">checkout</h2>
                    <div class="border-b-2 border-gray-200 left-0 lg:top-7 top-6 absolute w-full"></div>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">Name<span class="text-primary">*</span></label>
                        <p class="bg-gray-100 border border-solid border-gray-300 rounded px-3 py-1.5 text-base font-normal text-gray-700">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">
                            Country/Region Name <span class="text-primary">*</span>
                        </label>
                        <input name="country" type="text" class="@error('country') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('country') }}">
                        @error('country')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">
                            Town City <span class="text-primary">*</span>
                        </label>
                        <input name="city" type="text" class="@error('city') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('city') }}">
                        @error('city')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">
                            Street Address <span class="text-primary">*</span>
                        </label>
                        <input name="address" type="text" class="@error('address') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('address') }}">
                        @error('address')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">
                            Zip Code <span class="text-primary">*</span>
                        </label>
                        <input name="zipcode" type="text" class="@error('zipcode') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('zipcode') }}">
                        @error('zipcode')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block text-sm lg:text-base">
                            Phone Number <span class="text-primary">*</span>
                        </label>
                        <input name="phone" type="text" class="@error('phone') border-primary @enderror input-box focus:border focus:border-primary" value="{{ old('phone') }}">
                        @error('phone')
                            <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- checkout form end -->
    
            <!-- sidebar place order -->
            <div class="lg:col-span-4 col-span-12 bg-white shadow-lg p-4 rounded">
                <div class="container flex items-center justify-center py-3 capitalize relative lg:mb-6">
                    <h2 class="lg:text-2xl text-lg font-medium font-domine bg-white px-3 relative text-gray-800 uppercase z-10">Order Summary</h2>
                    <div class="border-b-2 border-gray-200 left-0 lg:top-7 top-6 absolute w-full"></div>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <div class="flex gap-3">
                            <img src="{{ Storage::url($product->image) }}" class="rounded object-cover h-20 w-20" style="object-position: center top;">
                            <div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <h5 class="text-gray-800 font-medium lg:text-base text-sm capitalize">{{ $product->name }}</h5>
                                <p class="lg:text-sm text-xs text-gray-600">Brand: {{ $product->brand }}</p>
                                <p class="lg:text-sm text-xs text-gray-600">Color: {{ $product->color }}</p>
                            </div>
                        </div>
                        <p class="text-gray-800 font-medium lg:text-base text-sm">@currency($product->price) IDR</p>
                    </div>
                    <input name="message" type="text" placeholder="Message" class="@error('message') border-primary @enderror input-box text-xs focus:border focus:border-primary"  value="{{ old('message') }}">
                    @error('message')
                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="flex justify-between border-b border-gray-200 text-gray-800 font-medium py-3 pt-8 uppercase lg:text-base text-sm">
                    <p>Subtotal</p>
                    <p>@currency($product->price) IDR</p>
                </div>
                <div class="flex justify-between text-gray-800 font-medium py-3 uppercase lg:text-base text-sm">
                    <p class="font-semibold">Total</p>
                    <p>@currency($product->price) IDR</p>
                </div>
                <div class="flex items-center mb-4 mt-2">
                    <input id="agreement" type="checkbox" class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                    <label for="agreement" class="text-gray-600 ml-3 cursor-pointer lg:text-sm text-xs">Agree to our <a href="#" class="text-primary">term & conditions</a></label>
                </div>
                <div class="mb-4 mt-2 space-y-3">
                    <button type="submit" class="hover:shadow-xl rounded block text-center w-full py-2 bg-primary hover:bg-transparent border border-primary uppercase text-white hover:text-primary lg:text-xl text-sm font-roboto font-medium transition animation">
                        Place Order
                    </button>
                    <a href="{{ route('products') }}" class="hover:shadow-xl rounded block text-center w-full py-2 bg-gray-800 hover:bg-transparent border hover:border-gray-800 hover:text-gray-800 uppercase text-white lg:text-xl text-sm font-roboto font-medium transition animation">
                        Cancel
                    </a>
                </div>
            </div>
            <!-- sidebar place order end -->
        </div>
    </form>
    <!-- checkout wrapper end -->
@endsection