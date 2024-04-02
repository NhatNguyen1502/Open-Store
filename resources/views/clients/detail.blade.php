
@extends('layouts.client')

@section('title', 'Product detail')


@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/product_detail.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection

@section('content')
<div class="container">
            <div class="row mt-5">
                <div class="col-sm-4 col-12">
                    <div class="image-container d-flex justify-content-center">
                        <img class="image1 w-100" src="{{ asset('storage/images/' .$product->image) }}" alt="image" id="main-image">
                    </div>
                </div>
                <div class="col-sm-6 col-12 heading" data-product-id="${product.id}">
                    <h1 class="fw-bold">{{ $product->name }}</h1>
                    <div class="containerPrice">
                        <p class="fs-2 price">
                            {{ ($product->price - ($product->price * $product->discount / 100)) }}$
                            <span class="fs-2 dis">{{ $product->price }}$</span>
                            <div class="discountPercent text-center">
                                -{{ $product->discount }}%
                            </div>
                        </p>
                    </div>
                    <p class="sentence">{{ $product->description }}</p>
                    <hr>
                    <form action="{{ route('addToCart', ['product_id' => $product->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3 col-6 p-0">
                                <p class="sentence ">Choose Size</p>
                                <div class="sizeOption">
                                    <select name="size" id="sizeOptions">
                                        <option value="empty">Select size</option>
                                                {{ $product->name }};
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 col-6">
                                <p class="sentence qty">Quantity</p>
                                <input aria-label="quantity" class="input-qty" max="{{ $product->stock }}" min="1" name="quantity" type="number" value="1">
                            </div> 
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary addToCart">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
@endsection