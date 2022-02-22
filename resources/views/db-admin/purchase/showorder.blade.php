@extends('layouts.db-admin')

@section('content')
    <!-- Basic Horizontal form layout section start -->            
        <div class="col-12">
            <div class="card">
                <div class="card-content grid lg:grid-cols-5">
                    <div class="lg:col-span-2 px-5 mt-10">
                        <img src="{{ Storage::url($order->product->image) }}" class="rounded img-fluid" alt="singleminded">
                    </div>
                    <div class="card-body lg:col-span-3">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="divide-y">
                                    <div class="flex lg:flex-row flex-col items-start py-3">
                                        <div class="col-md-3 col-12">
                                            <h3 class="text-lg">Customer</h3>
                                        </div>
                                        <div class="col-md-9 col-12">
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
                                    <div class="flex lg:flex-row flex-col items-start py-3">
                                        <div class="col-md-3 col-12">
                                            <h3 class="text-lg">Order</h3>
                                        </div>
                                        <div class="col-md-9 col-12 grid grid-cols-2 justify-items-start capitalize">
                                            <div class="mb-3">
                                                <p>Product</p><h3 class="font-medium">{{ $order->product->name }}</h3>
                                            </div>
                                            <div class="mb-3">
                                                <p>Brand</p><h3 class="font-medium">{{ $order->product->brand }}</h3>
                                            </div>
                                            <div class="mb-3">
                                                <p>Color</p><h3 class="font-medium">{{ $order->product->color }}</h3>
                                            </div>
                                            <div class="mb-3">
                                                <p>Category</p><h3 class="font-medium">{{ $order->product->category->name }}</h3>
                                            </div>
                                            <div class="mb-3">
                                                <p>SKU</p><h3 class="font-medium">{{ $order->product->sku }}</h3>
                                            </div>
                                            <div class="mb-3">
                                                <p>Price</p><h3 class="font-medium">@currency($order->product->price) IDR</h3>
                                            </div>
                                        </div>
                                    </div>


                                    @if ( $order->status == 'not yet paid' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction due</p>
                                                        <h3 class="text-lg text-danger">22 Oct 2022</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-gray-200 text-gray-900 badge rounded-pill px-4 py-2">
                                                    not yet paid
                                                </span>
                                            </div>
                                        </div>

                                    @elseif ( $order->status == 'invalid' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">20 Oct 2022</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction due</p>
                                                        <h3 class="text-lg text-danger">22 Oct 2022</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-red-500 text-red-900 badge rounded-pill px-4 py-2">
                                                    invalid
                                                </span>
                                            </div>
                                        </div>

                                    @elseif ( $order->status == 'sent proof' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">20 Oct 2022</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction created</p>
                                                        <h3 class="text-lg">22 Oct 2022</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-yellow-200 text-yellow-900 badge rounded-pill px-4 py-2">
                                                    Sent proof
                                                </span>
                                                <img src="{{ Storage::url($order->transaction_image) }}" class="rounded img-fluid mt-3" alt="singleminded">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Action</h3>
                                            </div>
                                            <div class="lg:col-span-9 flex gap-3">
                                                <form action=""></form>
                                                <form action="{{ route('order.status', $order->id) }}" method="POST" class="flex gap-3">
                                                    @csrf
                                                    <input type="submit" name="status" value="invalid" class="bg-red-200 hover:bg-red-300 text-red-600 font-bold text-sm rounded-full px-4 py-1">
                                                    <input type="submit" name="status" value="being packed" class="bg-blue-200 hover:bg-blue-300 text-blue-900 font-bold text-sm rounded-full px-4 py-1">
                                                </form>
                                            </div>
                                        </div>    

                                    @elseif ( $order->status == 'being packed' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">20 Oct 2022</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction created</p>
                                                        <h3 class="text-lg">22 Oct 2022</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <p>Delivery due</p>
                                                        <h3 class="text-lg text-danger">25 Oct 2022</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-yellow-200 text-yellow-900 badge rounded-pill px-4 py-2">
                                                    being packed
                                                </span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Action</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <form action=""></form>
                                                <form class="space-y-3" action="{{ route('dashboard.status.itemhasbeensent', $order->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="items-center">
                                                        <label class="text-sm">Upload your delivery receipt</label>
                                                        <input name="delivery_image" class="focus:border-primary input-box" type="file">
                                                    </div>
                                                    <div class="items-center">
                                                        <label class="text-sm">Estimated product arrival</label>
                                                        <input name="estimated_date" type="date" class="w-full rounded-md border-gray-200 bg-transparent focus:ring-0 focus:border-gray-200 input-box">
                                                        <input type="hidden" name="delivery_date" value="{{ Carbon\Carbon::now() }}">
                                                    </div>
                                                    <button type="submit" class="bg-blue-200 hover:bg-blue-300 text-blue-900 badge rounded-pill px-4 py-2 float-right">
                                                        item has been sent
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    
                                    @elseif ( $order->status == 'item has been sent' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction created</p>
                                                        <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->transaction_date)->format('d M Y') }}</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <p>Delivery created</p>
                                                        <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <p>Estimate arrived</p>
                                                        <h3 class="text-lg text-danger">{{ \Carbon\Carbon::parse($order->estimated_date)->format('d M Y') }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-blue-200 text-blue-900 badge rounded-pill px-4 py-2">
                                                    item has been sent
                                                </span>
                                            </div>
                                        </div>

                                    @elseif ( $order->status == 'complete' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    @if ($order->created_at !== null)
                                                        <div>
                                                            <p>Order created</p>
                                                            <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</h3>
                                                        </div>
                                                    @endif
                                                    @if ($order->transaction_date !== null)
                                                        <div>
                                                            <p>Transaction created</p>
                                                            <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->transaction_date)->format('d M Y') }}</h3>
                                                            <a href="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if ($order->delivery_date !== null)
                                                        <div>
                                                            <p>Delivery created</p>
                                                            <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</h3>
                                                            <a href="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if ($order->arrival_date !== null)
                                                        <div>
                                                            <p>Has arrived</p>
                                                            <h3 class="text-lg">{{ \Carbon\Carbon::parse($order->arrival_date)->format('d M Y') }}</h3>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-green-200 text-green-600 badge rounded-pill px-4 py-2">
                                                    {{ $order->status }}
                                                </span>
                                            </div>
                                        </div>

                                    @elseif ( $order->status == 'canceled' )
                                        <div class="flex lg:flex-row flex-col items-start py-3">
                                            <div class="col-md-3 col-12">
                                                <h3 class="text-lg">Due</h3>
                                            </div>
                                            <div class="col-md-9 col-12 space-y-3">
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <p>Order created</p>
                                                        <h3 class="text-lg">20 Oct 2022</h3>
                                                    </div>
                                                    <div>
                                                        <p>Transaction created</p>
                                                        <h3 class="text-lg">22 Oct 2022</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <p>Delivery created</p>
                                                        <h3 class="text-lg">25 Oct 2022</h3>
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <p>Has arrived</p>
                                                        <h3 class="text-lg">22 Oct 2022</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 lg:grid-cols-12 py-3">
                                            <div class="lg:col-span-3">
                                                <h3 class="text-lg">Status</h3>
                                            </div>
                                            <div class="lg:col-span-9">
                                                <span class="bg-red-500 text-red-900 badge rounded-pill px-4 py-2">
                                                    {{ $order->status }}
                                                </span>
                                            </div>
                                        </div>

                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    <!-- // Basic Horizontal form layout section end -->
@endsection