@extends('layouts.db-admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="text-2xl">Delivery List</h3>
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
                                <th>Phone</th>
                                <th>City</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="capitalize">
                            @foreach ($orders as $order)
                                @if ( $order->status == 'being packed' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-yellow-200 text-yellow-900 lowercase">{{ $order->status }}</span>
                                            </a>
                                        </td>
                                    </tr>
                                @elseif ( $order->status == 'item has been sent' )
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>@currency($order->product->price) IDR</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>                                        
                                            <a href="{{ route('db-admin.showorder', $order->id) }}">
                                                <span class="badge bg-blue-200 text-blue-900 lowercase">{{ $order->status }}</span>
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
                            <p>There are currently no orders with delivery status!</p>
                            <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </section>
@endsection