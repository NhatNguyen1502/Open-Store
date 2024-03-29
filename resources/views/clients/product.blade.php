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
            <li class="mb-3 text-dark category-item"><a href="{{ route('showCategory', ['category_id' => $category->id]) }}" class="text-decoration-none text-dark fw-bolder" style='text-transform: capitalize;' >{{ $category->name }}</a></li>
          @endforeach
        </ul>
        <hr>
      </div>
      <div class="col-10 ">
        <div class="row" id="body">
            @foreach ($products as $product)
            <div class="col-sm-3 col-6 text-center" id="item-1" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)">
              <a href="{{ route('showDetail', $product->id) }}" class='nav-link'>
                  <img class="mb-3 responsive-image w-100" style=' height: 232px' src="{{ asset('storage/images/' .$product->image) }}" alt="">
                  <p class="mb-1 font-weight-bold title text-center">{{ $product->name }}</p>
                  <span class="price text-danger text-center" style='text-decoration: line-through;'>{{ $product->price }}$</span>
                  <p class="fw-bold fs-4">{{ ($product->price - ($product->price * $product->discount / 100)) }}$</p>
              </a>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection