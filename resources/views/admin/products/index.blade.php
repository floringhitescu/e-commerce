@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage Role Groups</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> you are not allowed to delete groups that have users</li>
                <li> To edit a role click on the role name, then edit it. The system automatically will save the changes.</li>
            </ul>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Registered Roles
                </div>
                <div>
                    <a type="button" class="text-primary" data-toggle="modal" data-target="#addRole">
                       add new role
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
                            <th>Users</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        @if($role->users->count() > 0)
                                            <a onclick="alert('You cannot delete this roles as there are ')" class="text-danger"><i class="fa fa-trash"></i></a>
                                        @else
                                            <form id="{{ 'destroy'.$role->id }}"  action="{{ route('admin.roles.destroy', $role) }}" method="POST" >
                                                @csrf
                                                @method('delete')
                                                <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$role->id }}').submit();" class="text-danger"><i class="fa fa-trash"></i></a>
                                            </form>
                                        @endif
                                    </div>
                                    <div>
                                       <p id="{{ 'name'.$role->id }}" onclick="this.style.display = 'none'; document.getElementById('{{ 'update'.$role->id }}').style.display = 'block'; "> {{ ucfirst($role->name) }}</p>

                                        <form id="{{ 'update'.$role->id }}"  action="{{ route('admin.roles.update', $role) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('put')
                                            <input class="rounded" type="text" name="name" value="{{ ucfirst($role->name) }}" onmouseout="document.getElementById('{{ 'update'.$role->id }}').style.display = 'none'; document.getElementById('{{ 'name'.$role->id }}').style.display = 'block';" onblur="event.preventDefault(); document.getElementById('{{ 'update'.$role->id }}').submit();">
                                        </form>

                                    </div>

                                </td>
                                <td>{{ $role->users->count() }}</td>
                                <td>{{ $role->created_at->format('d-m-yy') }}</td>
                            </tr>

                        @empty
                            <tr>
                                <p>No roles found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.addRole')
@endsection
