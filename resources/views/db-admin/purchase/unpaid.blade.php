@extends('layouts.db-admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="text-2xl">Unpaid List</h3>
            </div>
            <div class="card-body">
                @if ( ! $status->isEmpty() || ! $status2->isEmpty() || ! $status3->isEmpty() )
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order</th>
                                <th>Price</th>
                                <th>Name</th>
                                <th>Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="capitalize">
                            @foreach ($orders as $order)
                                @if ( $order->status == 'not yet paid' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-gray-200 text-gray-900 lowercase">{{ $order->status }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                @elseif ( $order->status == 'sent proof' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                </svg>
                                            </a>
                                        </td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-yellow-200 text-yellow-900 lowercase">{{ $order->status }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                @elseif ( $order->status == 'invalid' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                            </svg>
                                        </td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-red-500 text-red-900 lowercase">{{ $order->status }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                                        
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex flex-col items-center justify-center space-y-3 text-center">
                        <div class="lg:w-6/12">
                            <p>There are currently no orders with unpaid status!</p>
                            <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection