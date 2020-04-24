@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage Orders</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> Cancelling an order could affect directly your customers and Beauty Pro reputation.</li>
            </ul>
        </div>



        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Registered Orders
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="usersTable"
                        width="100%"
                        cellspacing="0">
                        <thead>
                        <tr>
                            <th>Customer name</th>
                            <th>Order ID</th>
                            <th>Amount (£)</th>
                            <th>Placed on</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    <div class="mr-2">

                                        <form id="{{ 'destroy'.$order->id }}"  action="{{ route('admin.orders.destroy', $order) }}" method="POST" >
                                            @csrf
                                            @method('delete')
                                            <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$order->id }}').submit();" class="text-danger"><i class="fas fa-eject"></i></a>
                                        </form>

                                    </div>
                                    {{$order->user->name}}
                                </td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->created_at->format('d-m-yy') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <p>No orders found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <hr class="my-5">
        <h1 class="mb-5 mt-n3">Cancelled Orders</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Cancelled Orders
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="usersTable"
                        width="100%"
                        cellspacing="0">
                        <thead>
                        <tr>
                            <th>Customer name</th>
                            <th>Order ID</th>
                            <th>Amount (£)</th>
                            <th>Cancelled on</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cancelledOrders as $order)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    {{$order->user->name}}
                                </td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->deleted_at->format('d-m-yy') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <p>No orders found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
