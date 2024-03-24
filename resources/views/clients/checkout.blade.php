
@extends('layouts.client')

@section('title', 'Checkout')


@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection

@section('content')
<div class="container-fluid" id="checkoutBody">
    <h1 class="text-center">Checkout</h1>
    <div class="row">
      <div class="col-lg-6">
        <h2>Delivery information</h2>
        <form>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="tel" class="form-control" id="phone" required pattern="^0[0-9]{9,10}$">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" required>
          </div>
      </div>
      <div class="col-lg-6">
        <h2>Your order</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Size</th>
              <th scope="col">Color</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody id="orderTable">   
            @foreach( $cartProducts  as $product)
            <tr>
                <td><img src="{{ $product->image }}" alt="img" width="50px"> {{ $product->name }}</td>
                <td>1</td>
                <td>Red</td>
                <td>1</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <h4 id="total">Total: </h4>
        <button type="submit" class="btn btn-success" id="checkout">Checkout</button>
        </form>
      </div>
    </div>
  </div>
  @endsection