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
          @foreach( $categories as $category)
            <li class="mb-3"><a href="{{ route('showCategory', ['category_id' => $category->id]) }}" class="text-decoration-none  " onclick="filterByCategory('t-shirts')">{{ $category->name }}</a></li>
          @endforeach
        </ul>
        <hr>
      </div>
      <div class="col-10 ">
        <div class="row" id="body">
            @foreach ($products as $product)
            <div class="col-sm-3 col-6" id="item-1" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)">
                <img class="mb-3 responsive-image w-100" style=' height: 232px' src="{{ $product->image }}" alt="">
                <p class="mb-1 font-weight-bold title text-center">{{ $product->name }}</p>
                <span class="start item-start">★★★★★</span>
                <p class="font-weight-bold text-center">{{ $product->price }}</p>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection