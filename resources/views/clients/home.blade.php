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
                    <h1 class="fw-bold">FIND JEWELRY THAT MATCHES YOUR STYLE</h1>
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
    <div id="banner" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($banners as $key => $banner)
                @if ($banner->status === 'active')
                    <button type="button" data-bs-target="#banner" data-bs-slide-to="{{ $key }}"
                        class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endif
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                @if ($banner->status === 'active')
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ asset('banner_images/' . $banner->image) }}" class="d-block w-100"
                            alt="{{ $banner->name }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $banner->name }}</h5>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        @isset($recommendProducts)
            <hr>
            <section class="recommend-section">
                <h2 class="text-center fw-bold">RECOMMEND FOR YOU</h2>
                <div class="row pt-3">
                    @foreach ($recommendProducts as $product)
                        <div class="col-sm-3 col-12 hoverProducts text-center">
                            <a href="{{ route('showDetail', $product->id) }}" class='nav-link'>
                                <div class="container-image">
                                    <img class="image" src="{{ asset('/storage/images/' . $product->image) }}" alt="image">
                                </div>
                                <p class="fw-bold mt-2">{{ $product->name }}</p>
                                <span class="price text-danger"
                                    style='text-decoration: line-through;'>{{ $product->price }}$</span>
                                <p class="fw-bold fs-4">
                                    {{ $product->price - ($product->price * $product->discount) / 100 }}.000$</p>
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endisset
        <hr>
        <section class="discount-section">
            <h2 class="fw-bold text-center mt-4">SALE PRODUCT</h2>
            <div class="container pt-3">
                <div class="row">
                    @foreach ($saleProducts as $product)
                        <div class="col-sm-3 col-12 hoverProducts text-center">
                            <a href="{{ route('showDetail', $product->id) }}" class='nav-link'>
                                <div class="container-image">
                                    <img class="image" src="{{ asset('/storage/images/' . $product->image) }}"
                                        alt="image">
                                </div>
                                <p class="fw-bold mt-2">{{ $product->name }}</p>
                                <span class="price text-danger"
                                    style='text-decoration: line-through;'>{{ $product->price }}$</span>
                                <p class="fw-bold fs-4">
                                    {{ $product->price - ($product->price * $product->discount) / 100 }}.000$</p>
                            </a>

                            @if (session()->has('user_id'))
                                <?php $isInWishlist = $wishlists->contains('product_id', $product->id); ?>
                                @if ($isInWishlist)
                                    <a
                                        href="{{ route('deleteWishlist', ['product_id' => $product->id, 'user_id' => session('user_id')]) }}">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a href="{{ route('addWishlist', ['product_id' => $product->id, 'user_id' => session('user_id')]) }}"
                                        class="nav-link">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('user.showLogin') }}" class="nav-link">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
        <hr>
        <section class="products-section">
            <h2 class="fw-bold text-center mt-4">ALL PRODUCTS</h2>
            <div class="container">
                <div class="row pt-3">
                    @foreach ($products as $product)
                        <div class="col-sm-3 col-12 hoverProducts text-center">
                            <a href="{{ route('showDetail', $product->id) }}" class='nav-link'>
                                <div class="container-image">
                                    <img class="image" src="{{ asset('/storage/images/' . $product->image) }}"
                                        alt="image">
                                </div>
                                <p class="fw-bold mt-2">{{ $product->name }}</p>
                                <span class="price text-danger"
                                    style='text-decoration: line-through;'>{{ $product->price }}$</span>
                                <p class="fw-bold fs-4">
                                    {{ $product->price - ($product->price * $product->discount) / 100 }}.000$</p>
                            </a>

                            @if (session()->has('user_id'))
                                <?php $isInWishlist = $wishlists->contains('product_id', $product->id); ?>
                                @if ($isInWishlist)
                                    <a
                                        href="{{ route('deleteWishlist', ['product_id' => $product->id, 'user_id' => session('user_id')]) }}">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                @else
                                    <a href="{{ route('addWishlist', ['product_id' => $product->id, 'user_id' => session('user_id')]) }}"
                                        class="nav-link">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('user.showLogin') }}" class="nav-link">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section class="favourite">
            <!-- Button trigger modal -->
            <button id="fixed-button" type="button" class="btn btn-danger me-3" data-bs-toggle="modal"
                data-bs-target="#favourite">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
            <!-- Modal -->
            <div class="modal fade modal-xl" id="favourite" tabindex="-1" aria-labelledby="favouriteLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="favouriteLabel">Favorite product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @php
                                    $hasProduct = false;
                                @endphp
                                @if ($wishlists)
                                    @foreach ($wishlists as $wishlist)
                                        @if ($wishlist->user_id == session('user_id') && $wishlist->product_id)
                                            @foreach ($products as $product)
                                                @if ($product->id == $wishlist->product_id)
                                                    @php
                                                        $hasProduct = true;
                                                    @endphp
                                                    <div class="col-3 hoverProducts text-center">
                                                        <div class="container-image">
                                                            <img class="image"
                                                                src="{{ asset('/storage/images/' . $product->image) }}"
                                                                alt="image">
                                                        </div>
                                                        <p class="fw-bold mt-2">{{ $product->name }}</p>
                                                        {{ $product->price - ($product->price * $product->discount) / 100 }}.000$</p>
                                                        <a
                                                            href="{{ route('deleteWishlist', ['product_id' => $product->id, 'user_id' => session('user_id')]) }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    @if (!$hasProduct)
                                        <p>No product</p>
                                    @endif
                                @else
                                    <p>No product</p>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
