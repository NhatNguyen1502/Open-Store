<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@extends('layouts.client')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="heading">
                    <h1 class="fw-bold">FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
                </div>
                <div class="text">
                    <P>Browse through our diverse range of meticulously crafted garments, designed to bring out your
                        individuality and cater your sense of style.
                        Try Shopify free for 3 days, and explore all the features you need to start a business fast.
                    </P>
                    <p>“Shopify is better than any other platform we’ve played with, and we’ve played with them all.”
                    </p>
                </div>
                <a href="category.html">
                    <button class="button btn-outline-dark" type="button">Shop Now</button>
                </a>
                <div class="row mt-3">
                    <div class="col-sm-4 col-6">
                        <span class="number mt-2">200+</span><br>
                        <span>International Brands</span>
                    </div>
                    <div class="col-sm-4 col-6 ">
                        <span class="number mt-2"> 2000+</span><br>
                        <span>High-quality Products</span>
                    </div>
                    <div class="col-sm-4 col-12 text-center">
                        <span class="number mt-2"> 30,000+</span><br>
                        <span> Happy customers</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 model col-12">
                <img src="{{ asset('assets/image/model.png') }}" alt="image">
            </div>
        </div>
    </div>
    <div class="brand">
        <div class="name">
            <img class="logo" src="{{ asset('assets/image/zara-logo-1 1.png') }}" alt="image">
        </div>
        <div class="name">
            <img class="logo" src="{{ asset('assets/image/gucci-logo-1 1.png') }}" alt="image">
        </div>
        <div class="name">
            <img class="logo" src="{{ asset('assets/image/prada-logo-1 1.png') }}" alt="image">
        </div>
    </div>
    <div class="container">
        <hr>
        @isset($products)
            <section class="recommend-section">
                <h2 class="text-center fw-bold">RECOMMEND FOR YOU</h2>
                <div class="row">
                    @foreach ($recommendProducts as $product)
                        <div class="col-sm-3 col-12 hoverProducts text-center"">
                            <div class="container-image">
                                <img class="image" src="{{ asset('/storage/images/' . $product->image) }}" alt="image">
                            </div>
                            <p class="fw-bold mt-2">{{ $product->name }}</p>
                            <span class="stock">{{ $product->stock }}</span>
                            <p class="fw-bold fs-4">{{ $product->price }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        @endisset
        <hr>
        <section class="products-section">
            <h2 class="fw-bold text-center mt-4">ALL PRODUCTS</h2>
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-3 col-12 hoverProducts text-center">
                            <div class="container-image">
                                <img class="image" src="{{ asset('/storage/images/' . $product->image) }}" alt="image">
                            </div>
                            <p class="fw-bold mt-2">{{ $product->name }}</p>
                            <span class="stock">{{ $product->stock }}</span>
                            <p class="fw-bold fs-4">{{ $product->price }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
    </div>
@endsection
