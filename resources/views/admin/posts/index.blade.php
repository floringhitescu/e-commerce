@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage post</h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> Deleting posts could affect the orders and therefore, your clients</li>
            </ul>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table mr-1"></i> Registered posts
                </div>
                <div>
                    <a type="button" class="text-primary" href="{{ route('admin.posts.create') }}">
                       add new post
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Comments no</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        <form id="{{ 'destroy'.$post->id }}"  action="{{ route('admin.posts.destroy', $post) }}" method="POST" >
                                            @csrf
                                            @method('delete')
                                            <a onclick=" event.preventDefault(); document.getElementById('{{ 'destroy'.$post->id }}').submit();" class="text-danger"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.posts.edit', $post) }}"><i class="fas fa-edit"></i></a>
                                        </form>

                                    </div>
                                    <p>{{ ucfirst($post->title) }}</p>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>{{ $post->created_at->format('d-m-yy') }}</td>
                            </tr>

                        @empty
                            <tr>
                                <p>No posts found</p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
