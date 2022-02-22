@extends('layouts.dashboard')

@section('content')

    <!-- Show Order -->
    <div class="lg:col-span-9 col-span-12 flex justify-center">
        <div class="flex flex-col col-span-12 w-full space-y-5">
            <!-- single card -->
            <div class="shadow rounded bg-white w-full py-5 px-5">
                <div class="container flex items-center justify-center py-3 capitalize relative">
                    <h2 class="lg:text-3xl text-xl font-medium font-domine bg-white px-3 relative text-gray-800 uppercase z-10">My Order</h2>
                    <div class="border-b-2 border-gray-200 left-0 lg:top-7 top-6 absolute w-full"></div>
                </div>
                <div class="grid lg:grid-cols-5 grid-cols-1 gap-3">
                    <div class="col-span-2 px-5 mt-8">
                        <img src="{{ Storage::url($order->product->image) }}" class="w-full object-cover rounded">
                    </div>
                    <div class="px-5 mt-8 divide-y col-span-3">
                        <div class="grid grid-cols-4 gap-3">
                            <div class="col-span-4">
                                <div class="mb-3">
                                    <p>Invoice</p><h3 class="font-medium">{{ $order->invoice }}</h3>
                                </div>
                                <div class="mb-3">
                                    <p>Name / Phone number</p><h3 class="font-medium">{{ $order->user->name }} / {{ $order->phone }}</h3>
                                </div>
                                <div class="mb-3">
                                    <p>Shipping address</p><h3 class="font-medium">{{ $order->address }}</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-4 gap-3 py-3">
                            <h3 class="text-lg font-semibold">Order</h3>
                            <div class="col-span-3 grid grid-cols-2 justify-items-start">
                                <div>
                                    <p>Product</p><h3 class="font-medium">{{ $order->product->name }}</h3>
                                </div>
                                <div>
                                    <p>Brand</p><h3 class="font-medium">{{ $order->product->brand }}</h3>
                                </div>
                                <div>
                                    <p>Color</p><h3 class="font-medium">{{ $order->product->color }}</h3>
                                </div>
                                <div>
                                    <p>Category</p><h3 class="font-medium">{{ $order->product->category->name }}</h3>
                                </div>
                                <div>
                                    <p>SKU</p><h3 class="font-medium">{{ $order->product->sku }}</h3>
                                </div>
                                <div>
                                    <p>Price</p><h3 class="font-medium">@currency($order->product->price) IDR</h3>
                                </div>
                            </div>
                        </div>
                        
                        {{-- condition --}}
                        
                        @if ($order->status == 'not yet paid' || $order->status == 'sent proof' || $order->status == 'invalid')
                        
                            {{-- not yet paid || sent proof || invalid --}}
                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Due</h3>
                                <div class="col-span-3 grid grid-cols-2 gap-3">
                                    <div>
                                        <p>Order created</p><h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                    </div>
                                    @if ( $order->status == 'not yet paid' || $order->status == 'invalid' )
                                        <div>
                                            <p>Transaction due</p><h3 class="text-lg text-primary font-medium">22 Oct 2022</h3>
                                        </div>
                                    @elseif ( $order->status == 'sent proof' )
                                        <div>
                                            <p>Transaction created</p><h3 class="text-lg font-medium">22 Oct 2022</h3>
                                            <a href="" class="hover:text-primary">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Status</h3>
                                <div class="col-span-3">
                                    @if ($order->status == 'not yet paid')
                                        <div class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                            <span class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </div>
                                    @elseif ($order->status == 'sent proof')
                                        <div class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                            <span class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </div>
                                    @elseif ($order->status == 'invalid')
                                        <div class="relative inline-block px-3 py-1 font-semibold text-red-600 leading-tight">
                                            <span class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Transaction</h3>
                                <div class="col-span-3">
                                    <div class="mb-3">
                                        <p>Rekening BCA</p>
                                        <h3 class="font-medium">013290328 a/n beli.ditabi</h3>
                                    </div>
                                    @if ($order->status == 'invalid' || $order->status == 'not yet paid')
                                        <form action="{{ route('dashboard.status.sentproof', $order->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input name="transaction_date" type="hidden" value="{{ Carbon\Carbon::now() }}">
                                            <input name="transaction_image" class="input-box" type="file">
                                            <p class="text-primary">*kirim bukti transfer</p>
                                            <button type="submit" class="bg-primary text-white px-3 py-2 mt-3 rounded-3xl float-right">Sent Proof</button>
                                        </form>
                                    @elseif ($order->status == 'sent proof')
                                        <img src="{{ Storage::url($order->transaction_image) }}" class="w-full object-cover rounded">
                                    @endif
                                </div>
                            </div>                            
                                
                            @if ($order->status == 'invalid' || $order->status == 'not yet paid')
                                <div class="grid grid-cols-4 gap-3 py-3">
                                    <h3 class="text-lg font-semibold">Action</h3>
                                    <div class="col-span-3">
                                        <form action="{{ route('order.status', $order->id) }}" method="POST" class="flex gap-3">
                                            @csrf
                                            <input type="submit" name="status" value="canceled" class="bg-red-200 hover:bg-red-300 text-red-600 font-bold text-sm rounded-full px-4 py-1">
                                        </form>
                                    </div>
                                </div>
                            @endif

                        @elseif ($order->status == 'being packed')
                        
                            {{-- pending / accept --}}
                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Due</h3>
                                <div class="col-span-3 grid grid-cols-2 gap-3">
                                    <div>
                                        <p>Order created</p><h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                    </div>
                                    <div>
                                        <p>Transaction created</p>
                                        <h3 class="text-lg font-medium">22 Oct 2022</h3>
                                        <a href="" class="hover:text-primary">
                                            <i class="fas fa-image"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p>Delivery due</p>
                                        <h3 class="text-lg text-primary font-medium">22 Oct 2022</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Status</h3>
                                <div class="col-span-3">
                                    <div class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                        <span class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $order->status }}</span>
                                    </div>
                                </div>
                            </div>
                        
                        @elseif ($order->status == 'item has been sent')

                            {{-- item has been sent --}}
                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Due</h3>
                                <div class="col-span-3 grid grid-cols-2 gap-3">
                                    <div>
                                        <p>Order created</p><h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                    </div>
                                    <div>
                                        <p>Transaction created</p>
                                        <h3 class="text-lg font-medium">22 Oct 2022</h3>
                                        <a href="" class="hover:text-primary">
                                            <i class="fas fa-image"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p>Delivery created</p>
                                        <h3 class="text-lg font-medium">22 Oct 2022</h3>
                                        <a href="" class="hover:text-primary">
                                            <i class="fas fa-image"></i>
                                            <span class="font-medium">JNE</span>
                                        </a>
                                    </div>
                                    <div>
                                        <p>Estimate arrived</p>
                                        <h3 class="text-lg text-primary font-medium">22 Oct 2022</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Status</h3>
                                <div class="col-span-3">
                                    <div class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                        <span class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $order->status }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Action</h3>
                                <div class="col-span-3 space-y-3">
                                    <img src="{{ Storage::url($order->delivery_image) }}" class="w-full object-cover rounded">
                                    <form action="{{ route('dashboard.status.arrival', $order->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input name="arrival_date" type="hidden" value="{{ Carbon\Carbon::now() }}">
                                        <input name="arrival_image" class="input-box" type="file">
                                        <button type="submit" class="bg-primary text-white px-3 py-2 mt-3 rounded-3xl float-right">accepted</button>
                                    </form>
                                </div>
                            </div>

                        @elseif ($order->status == 'complete' || $order->status == 'canceled')
                        
                            {{-- complete / canceled --}}
                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Due</h3>
                                <div class="col-span-3 grid grid-cols-2 gap-3">
                                    <div>
                                        <p>Order created</p><h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                    </div>
                                    @if ( $order->transaction_date !== null && $order->transaction_image !== null )
                                        <div>
                                            <p>Transaction created</p>
                                            <h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->transaction_date)->format('d M Y') }}</h3>
                                            <a href="" class="hover:text-primary">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </div>
                                    @endif
                                    @if ( $order->delivery_date !== null && $order->delivery_image !== null )
                                        <div>
                                            <p>Delivery created</p>
                                            <h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->transaction_date)->format('d M Y') }}</h3>
                                            <a href="" class="hover:text-primary">
                                                <i class="fas fa-image"></i>
                                                <span class="font-medium">JNE</span>
                                            </a>
                                        </div>
                                    @endif
                                    @if ( $order->estimated_date !== null )
                                        <div>
                                            <p>Estimate arrived</p>
                                            <h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->estimated_date)->format('d M Y') }}</h3>
                                        </div>
                                    @endif
                                    @if ( $order->arrival_date !== null && $order->arrival_image !== null )
                                        <div>
                                            <p>Product Arrived</p>
                                            <h3 class="text-lg font-medium">{{ \Carbon\Carbon::parse($order->arrival_date)->format('d M Y') }}</h3>
                                            <a href="" class="hover:text-primary">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-3 py-3">
                                <h3 class="text-lg font-semibold">Status</h3>
                                <div class="col-span-3">
                                    @if ( $order->status == 'complete' )
                                        <div class="relative inline-block px-3 py-1 font-semibold text-green-600 leading-tight">
                                            <span class="absolute inset-0 bg-green-200 hover:bg-green-500 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </div>
                                    @elseif ( $order->status = 'canceled' )
                                        <div class="relative inline-block px-3 py-1 font-semibold text-red-600 leading-tight">
                                            <span class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endif



                        {{-- condition end --}}
                    </div>                        
                </div>
            </div>
            <!-- single card end -->
                                                                       
        </div>
    </div>
    <!-- Show Order end -->

@endsection