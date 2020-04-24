@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage Beauty Pro Users</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i> Registered users
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    @if(!$user->isAdmin())
                                        <div class="mr-2">
                                            <form id="{{ 'destroy'.$user->id }}"  action="{{ route('admin.users.destroy', $user) }}" method="POST" >
                                                @csrf
                                                @method('delete')
                                                <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$user->id }}').submit();" class="text-danger"><i class="fa fa-trash"></i></a>
                                            </form>
                                        </div>
                                    @endif
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->created_at->format('d-m-yy') }}</td>
                            </tr>

                        @empty
                            <tr>
                                <p>No users found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
