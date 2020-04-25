@extends('layouts.app')

@section('content')

    <div class="mt-n5">
        <div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <div class="container d-flex py-2">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            @include('partials.search')
                        </div>
                    </ol>
                </nav>
                @include('partials.alert')
            </div>
            <div class="container mt-5 pt-4">
                <div class="container">
                   <div>
                       <h1 class="m-0">{{ ucfirst(strtolower($post->title)) }}</h1>
                       <div><h3 > by <span class="text-primary">{{ $post->user->name }}</span></h3></div>
                   </div>
                   <div>
                       <hr>
                       Posted on {{ $post->created_at->format('M d, yy h:m') }}
                       <hr>
                   </div>
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid rounded" src="{{ $post->image() }}" alt="">
                    </div>
                    <hr>
                    <div class="text-justify">
                        <p class="mb-3">
                            {{$post->description}}
                        </p>

                        <p>
                            {{$post->body}}
                        </p>
                    </div>
                    <hr >
                    <div class="pt-3">
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form action="{{ route('comment.post', $post) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="content" @guest() disabled @endguest  class="form-control @error('content') is-invalid @enderror" rows="7" minlength="10" maxlength="250" required>{{old('content')}}@guest() You have to log in to leave a comment @endguest</textarea>
                                        <small class="">your comment must be at least 10 characters</small>
                                    </div>
                                    @error('content')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    <div class="text-center button-container m-2 d-flex justify-content-end">
                                        <a href="{{route('home')}}" class="button ">Back</a>
                                        <button type="submit"  class="button ">Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Single Comment -->
                        <hr>

                        <div class="container px-5" >
                            @forelse($comments as $comment)
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="users image">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="mt-0 text-primary"> {{ $comment->user->name }} </h5>
                                            </div>
                                            <div>
                                                <p>on {{ $comment->created_at->format('M d, yy h:m') }}</p>
                                            </div>
                                        </div>
                                        {{ $comment->content }}
                                    </div>
                                </div>
                                @empty
                                <p>Be the first to comment this article</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script>
        const footer = document.getElementById('footer');
        footer.style.marginTop = '30%'
    </script>
@endsection
