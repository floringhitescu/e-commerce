@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage Product Categories</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> the deletion of a category will have a cascade effect on the entire product catalog</li>
                <li> To edit a category click on the role name, then edit it. The system automatically will save the changes.</li>
            </ul>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Registered Categories
                </div>
                <div>
                    <a type="button" class="text-primary" data-toggle="modal" data-target="#exampleModal">
                       add new category
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
                            <th>Stock</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        <form id="{{ 'destroy'.$category->id }}"  action="{{ route('admin.categories.destroy', $category) }}" method="POST" >
                                            @csrf
                                            @method('delete')
                                            <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$category->id }}').submit();" class="text-danger"><i class="fa fa-trash"></i></a>
                                        </form>
                                    </div>
                                    <div>
                                       <p id="{{ 'name'.$category->id }}" onclick="this.style.display = 'none'; document.getElementById('{{ 'update'.$category->id }}').style.display = 'block'; "> {{ ucfirst($category->name) }}</p>

                                        <form id="{{ 'update'.$category->id }}"  action="{{ route('admin.categories.update', $category) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('put')
                                            <input class="rounded" type="text" name="name" value="{{ ucfirst($category->name) }}" onmouseout="document.getElementById('{{ 'update'.$category->id }}').style.display = 'none'; document.getElementById('{{ 'name'.$category->id }}').style.display = 'block';" onblur="event.preventDefault(); document.getElementById('{{ 'update'.$category->id }}').submit();">
                                        </form>

                                    </div>

                                </td>
                                <td>{{ $category->products->count() }}</td>
                                <td>{{ $category->created_at->format('d-m-yy') }}</td>
                            </tr>

                        @empty
                            <tr>
                                <p>No categories found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.addCategory')
@endsection
