@extends('layouts.app')

@section('title', 'Beauty Shopping Cart')

@section('content')
    <div class="linking mt-n5 ">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <div class="container d-flex py-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Shopping Cart</li>
                        <li class="breadcrumb-item active" aria-current="page"> Pyment Confirmation </li>
                    </div>
                </ol>
            </nav>
        </div>
    </div>

    <div class="my-5 pt-3">

            <div class="pb-5">
                <div class="container">
                    <div class="row py-5 p-4 bg-white rounded shadow-lg d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div class="p-5 text-center">

                                <h1 class="text-success">Congratulations you have just placed a new order!</h1>
                                <p>Your items will be with you shortly, thank you!</p>
                                <div class="my-5">
                                    <a href="{{ route('shop') }} " class="button">Shopping again?</a>
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
        footer.className = 'footerDown'
    </script>
@endsection


