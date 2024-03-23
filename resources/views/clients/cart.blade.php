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
              <a href="CheckOut.html" class="btn btn-primary btn-block">Go to Checkout</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection