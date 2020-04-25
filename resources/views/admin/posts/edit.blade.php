@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        @include('partials.alert')
        <div class="d-flex justify-content-between my-4">
            <h1 class="mt-4">Manage post </h1>
            <p class="mt-4" id="currentTime"></p>
        </div>
        <div class="pb-4">
            <p><strong>Instructions on how to use the system</strong></p>
            <ul>
                <li><span class="text-danger">ATTENTION!</span> Post deletion would trigger cascade deletion on comments</li>
            </ul>
        </div>

        <div class="card my-5 py-5 container justify-content-center shadow-lg">
            <div class="card-body  py-5">
                <div>
                    <div class="text-center">
                        <h3>Edit new post</h3>
                    </div>
                </div>
                <div class=" ">
                    <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        {{-- post title--}}
                        <div class="p-3">
                            <div class="input-group  border rounded-pill @error('title') is-invalid @endif p-2">
                                <input type="text" name="title" id="title" placeholder="Post title" aria-describedby="button-addon3" class="form-control border-0 @error('title') is-invalid @endif" required minlength="100" maxlength="250" value="{{old('title') ? old('title') : $post->title}}">
                            </div>
                            <small class="form-text pl-3 text-muted">Post title has to be longer than 100 characters and no longer than 250 characters</small>

                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- post description--}}
                        <div class="p-3">
                            <textarea type="text" name="description" id="name" placeholder="Post description" maxlength="1000" minlength="150" rows="4" aria-describedby="button-addon3" class="form-control  @error('description') is-invalid @endif" required>{{old('description') ? old('description') : $post->description}}</textarea>
                            <small class="form-text pl-3 text-muted">Post description has to be longer than 150 characters and no longer than 1000 characters</small>

                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- post body--}}
                        <div class="p-3">
                            <textarea type="text" name="body" id="body" placeholder="Post body" rows="10"  maxlength="6000" minlength="1000" aria-describedby="button-addon3" class="form-control  @error('body') is-invalid @endif" required>{{old('body') ? old('body') : $post->body}}</textarea>
                            <small class="form-text pl-3 text-muted">Post description has to be longer than 1000 characters and no longer than 6000 characters</small>

                            @error('body')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start flex-column">
                            <div class="p-3">
                                <label for="currentImage">Current image</label>
                                <div>
                                    <img c width="150" class="img-fluid rounded shadow-sm"  src="{{ $post->image() }}" alt="post image">
                                </div>
                            </div>
                            <div class="">
                                <div class="mt-3 px-3">
                                    <div class="custom-file">
                                        <input onchange="validateSizeWithFileTitle(this)"  type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror"  id="customFile">
                                        <label class="custom-file-label" for="customFile" id="customFile">Choose file</label>
                                    </div>

                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class=" mt-5 d-flex justify-content-end ">
                            <a href="{{ route('admin.posts.index') }}" type="button" class="btn btn-secondary mx-3">Cancel</a>
                            <button type="submit" class="btn btn-success mr-3">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
