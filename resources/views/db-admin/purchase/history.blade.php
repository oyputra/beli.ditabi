@extends('layouts.db-admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="text-2xl">History List</h3>
            </div>
            <div class="card-body">
                @if ( ! $status->isEmpty() || ! $status2->isEmpty() )
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order</th>
                                <th>Price</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="capitalize">
                            @foreach ($orders as $order)
                                @if ( $order->status == 'complete' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-green-200 text-green-900 lowercase">{{ $order->status }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                @elseif ( $order->status == 'canceled' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
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
                            <p>There are currently no orders with history status!</p>
                            <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
@endsection