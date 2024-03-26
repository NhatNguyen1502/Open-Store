@extends('layouts.client')

@section('title', 'Product')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
@endsection

@section('content')
    <div class="container-sm bg-white">
        <div class="row justify-content-center">
            <div class="col-2">
                <h2 class="fw-bold mt-3 ">Filters</h2>
                <hr>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li class="mb-3"><a href="{{ route('showCategory', ['category_id' => $category->id]) }}"
                                class="text-decoration-none  "
                                onclick="filterByCategory('t-shirts')">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <hr>
            </div>
            <div class="col-10 ">
                <div class="row" id="body">
                    @foreach ($products as $product)
                        <div class="col-sm-3 col-6" id="item-1" onmouseover="addHoverEffect(this)"
                            onmouseout="removeHoverEffect(this)">
                            <a href="{{ route('showDetail', $product->id) }}" class='nav-link'>
                                <img class="mb-3 responsive-image w-100" style=' height: 232px'
                                    src="{{ asset('storage/images/' . $product->image) }}" alt="">
                                <p class="mb-1 font-weight-bold title text-center">{{ $product->name }}</p>
                                <div class="d-flex justify-content-between">
                                    <span class="start item-start">★★★★★</span>
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
                                <p class="font-weight-bold text-center">{{ $product->price }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
