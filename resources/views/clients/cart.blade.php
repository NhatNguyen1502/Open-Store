@extends('layouts.client')

@section('title', 'Cart')


@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection

@section('content')
<div class="container-fluid bg-light">
    <h1>Your Cart</h1>
    <div class="row">
      <div class="col-lg-7 col-md-12 border rounded" id="product-body">
      @foreach( $cartProducts as $product)
      <div class="row mt-4 p-4">
        <div class="col-5">
          <img class='w-100 h-100' src="{{ $product->image }}" alt="T-shirt">
        </div>
        <div class="col-4">
        <h3>{{ $product->name }}</h3> 
          <p> Size: 1</p>                  
          <p>Color: Red</p>                  
          <p>{{ $product->price }}</p>
        </div>
        <div class="col-3 d-flex flex-column">
          <div class="icon-cart">
            <i class="fa fa-trash" style="color:red" onclick="deleteCartItem()"></i>
          </div>
          <div class="nut">
          <input class="minus is-form" type="button" value="-" onclick="changeQuantity()">
          <input aria-label="quantity" class="input-qty" style='width: 100px' max="Số tối đa" min="1" name="" type="number" value="${element.quantity}" onchange="updateCartItem()">
          <input class="plus is-form" type="button" value="+" onclick="changeQuantity()">
          </div>
        </div>
      </div>
      <hr>
      @endforeach

      </div>
      <div class="col-lg-5 col-md-12 border rounded">
        <h4 class="title-card">Order Summary</h4>
        <form>
          <div class="row">
            <div class="col-8">
              <span>Subtotal:</span>
            </div>
            <div class="col-4 text-right">
              <span id="subtotal"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <span>Delivery Fee:</span>
            </div>
            <div class="col-4 text-right">
              <span id="deliveryFee">Free</span>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <span>Total:</span>
            </div>
            <div class="col-4 text-right">
              <span id="totalPrice"></span>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">Go to Checkout</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection