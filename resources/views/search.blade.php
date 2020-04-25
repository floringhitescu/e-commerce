@extends('layouts.app')
@section('title', 'Search Results')
@section('content')

    <div class="mt-n5">
        <div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <div class="container d-flex py-2">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                            @include('partials.search')
                        </div>
                    </ol>
                </nav>
                @include('partials.alert')
            </div>

            <div class="container mt-5 pt-4">
                <h1 class="m-0">Search results:</h1>
                <p>{{ $totalResults }} result(s) for your input " {{ request()->input('search') }} "</p>

                <div class="container">

                    <div class="my-5 px-5">
                        @if($products->count() > 0 )
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light text-left">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    @forelse( $products  as $product)
                                        <tr>
                                            <th scope="row" class="border-0 text-left">
                                                <div class="p-2">
                                                    <a href="{{ $product->path() }}"><img src="{{ $product->img() }}" alt="" width="70" class="img-fluid rounded shadow-sm"></a>
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0 "> <a href="{{ $product->path() }}" class="text-dark d-inline-block align-middle "> {{ Str::limit($product->name, 40) }} </a></h5>
                                                        <span class="text-muted font-weight-normal font-italic d-block">Category:
                                                        <a class="text-primary" href="{{ route('category.shop', $product->category->name) }}">{{ $product->category->name }}</a>
                                                    </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>{{ '£'.$product->price }}</strong></td>
                                        </tr>
                                    @empty
                                        <h1>No products to show</h1>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $products->links() }}
                            </div>
                        @endif
                    </div>

                    <div class="my-5 px-5">
                        @if($categories->count() > 0 )
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light text-left">
                                            <div class="p-2 px-3 text-uppercase">Category name</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Category products</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    @forelse( $categories  as $category)
                                        <td class="border-0 align-middle"><a href="{{ route('category.shop', $category->name) }}">{{ ucfirst($category->name) }}</a></td>
                                        <td class="border-0 align-middle text-left">
                                            <ul class="pl-5 ml-5">
                                                @foreach($category->products as $product)
                                                    <li class="list-group-item-action py-1"><a class="text-primary" href="{{ $product->path() }}">{{ $product->name }}</a> </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        </tr>
                                    @empty
                                        <h1>Your cart seems to be empty</h1>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerScript')
    <script>
        const footer = document.getElementById('footer');
        @if($totalResults > 2)
            footer.style.marginTop = '15%';
        @else
            footer.style.marginTop = '35%';
        @endif
    </script>
@endsection

