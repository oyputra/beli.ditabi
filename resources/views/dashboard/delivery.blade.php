@extends('layouts.dashboard')

@section('content')

    <!-- table delivery -->
    @if ( ! $status->isEmpty() || ! $status2->isEmpty() )
        <table class="min-w-full leading-normal bg-white rounded shadow">
            <thead>
                <tr class="border-b-2 border-gray-200">
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Customer / Invoice
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Product
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Issued / Due
                    </th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @if ( $order->status == 'being packed' || $order->status == 'item has been sent' )
                        <tr>
                            <td class="lg:px-5 px-2 py-5 border-b border-gray-200 text-sm">
                                <div class="flex lg:flex-row flex-col">
                                    <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full" src="{{ asset('images/user.bmp') }}" />
                                    </div>
                                    <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                        {{ $order->user->name }}
                                    </p>
                                    <p class="text-gray-600 whitespace-no-wrap">00{{ $order->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="lg:px-5 px-2 py-5 border-b border-gray-200 text-sm">
                                <img src="{{ Storage::url($order->product->image) }}" class="object-cover rounded h-20 w-20 ">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $order->product->name }}</p>
                                <p class="text-primary whitespace-no-wrap font-semibold">@currency($order->product->price) IDR</p>
                            </td>
                            <td class="lg:px-5 px-2 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</p>
                                <p class="text-gray-600 whitespace-no-wrap">Due in 3 days</p>
                            </td>
                            <td class="lg:px-5 px-2 py-5 border-b border-gray-200 text-sm">
                                @if ( $order->status == 'being packed' )
                                    <a href="{{ route('dashboard.showorder', $order->id) }}">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-yellow-900 hover:bg-yellow-300 rounded-full leading-tight">
                                            <span class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </span>
                                    </a>
                                @elseif ( $order->status == 'item has been sent' )
                                    <a href="{{ route('dashboard.showorder', $order->id) }}">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-blue-900 hover:bg-blue-300 rounded-full leading-tight">
                                            <span class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $order->status }}</span>
                                        </span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <div class="flex flex-col items-center justify-center space-y-3">
            <p>You have no delivery orders</p>
            <a href="{{ route('products') }}" class="text-xs lg:text-base border border-primary px-4 py-2 font-medium rounded hover:bg-transparent bg-primary hover:text-primary text-white transition animation hover:shadow-xl capitalize">Order Now!</a>
            <div class="lg:w-6/12">
                <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
            </div>
        </div>
    @endif
    <!-- table delivery end -->
@endsection