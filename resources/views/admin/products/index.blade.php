@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage product Groups</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> Deleting products could affect the orders and therefore, your clients</li>
            </ul>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Registered products
                </div>
                <div>
                    <a type="button" class="text-primary" href="{{ route('admin.products.create') }}">
                       add new product
                    </a>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price(£)</th>
                            <th>Slug</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        <form id="{{ 'destroy'.$product->id }}"  action="{{ route('admin.products.destroy', $product) }}" method="POST" >
                                            @csrf
                                            @method('delete')
                                            <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$product->id }}').submit();" class="text-danger"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </div>
                                    <div>
                                       <p id="{{ 'name'.$product->id }}" onclick="this.style.display = 'none'; document.getElementById('{{ 'update'.$product->id }}').style.display = 'block'; "> {{ ucfirst($product->name) }}</p>

                                        <form id="{{ 'update'.$product->id }}"  action="{{ route('admin.products.update', $product) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('put')
                                            <input class="rounded" type="text" name="name" value="{{ ucfirst($product->name) }}" onmouseout="document.getElementById('{{ 'update'.$product->id }}').style.display = 'none'; document.getElementById('{{ 'name'.$product->id }}').style.display = 'block';" onblur="event.preventDefault(); document.getElementById('{{ 'update'.$product->id }}').submit();">
                                        </form>

                                    </div>

                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->created_at->format('d-m-yy') }}</td>
                            </tr>

                        @empty
                            <tr>
                                <p>No products found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
