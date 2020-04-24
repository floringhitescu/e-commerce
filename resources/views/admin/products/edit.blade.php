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
                <li><span class="text-danger">ATTENTION!</span> Product's slug has to be unique and used to access product's page therefore, you must not change it</li>
            </ul>
        </div>

        <div class="card my-5 py-5 container justify-content-center shadow-lg">
            <div class="card-body  py-5">
                <div>
                    <div class="text-center">
                        <h3>Create new product</h3>
                    </div>
                </div>
                <div class=" ">
                    <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        {{-- product name--}}
                        <div class="p-3">
                            <div class="input-group  border rounded-pill @error('name') is-invalid @endif p-2">
                                <input type="text" name="name" id="name" placeholder="Product name" aria-describedby="button-addon3" class="form-control border-0 @error('name') is-invalid @endif" required minlength="3" value="{{old('name') ? old('name') : $product->name}}">
                            </div>
                            <small class="form-text pl-3 text-muted">Product name has to be longer than 5 characters and no longer than 150 characters</small>

                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- product details--}}
                        <div class="p-3">
                            <div class="input-group border rounded-pill @error('details') is-invalid @endif p-2">
                                <input type="text" name="details" id="details" placeholder="Product details" aria-describedby="button-addon3" class="form-control border-0 @error('details') is-invalid @endif" value="{{old('details') ? old('details') : $product->details}}" required minlength="3">
                            </div>
                            <small class="form-text pl-3 text-muted">Product details has to be longer than 5 characters and no longer than 150 characters</small>

                            @error('details')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- product description--}}
                        <div class="p-3">
                            <textarea type="text" name="description" id="name" placeholder="Product description" rows="7" aria-describedby="button-addon3" class="form-control  @error('description') is-invalid @endif" required>{{old('description') ? old('description') : $product->description}}</textarea>
                            <small class="form-text pl-3 text-muted">Product description has to be longer than 150 characters and no longer than 1000 characters</small>

                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-between">
                            {{-- product category--}}
                            <div class="p-3">
                                    <select name="category_id" class="custom-select" required>
                                        <option value="">Open this select menu</option>
                                        @foreach($categories as $category )
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id or $product->category_id == $category->id) selected @endif> {{ $category->name  }} </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                                <small class="form-text pl-3 text-muted">Product description has to be longer than 150 characters and no longer than 1000 characters</small>

                                @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- product price--}}
                            <div class="p-3">
                                <input type="text" name="price" class="form-control"  placeholder="Product price" value="{{old('price') ? old('price') : $product->price}}" required>
                                <small class="form-text pl-3 text-muted">Product price is required and should contain only numbers</small>

                                @error('price')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="mt-3 px-3">
                                <div class="custom-file">
                                    <input onchange="validateSizeWithFileTitle(this)"  type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror"  id="customFile">
                                    <label class="custom-file-label" for="customFile" id="customFile">Choose file</label>
                                </div>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mt-5 d-flex justify-content-end ">
                            <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-secondary mx-3">Cancel</a>
                            <button type="submit" class="btn btn-success mr-3">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
