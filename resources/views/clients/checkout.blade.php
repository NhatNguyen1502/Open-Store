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
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                            required>
                        <input type="hidden" class="form-control" name="user_id" value="{{ session('user_id') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control" name="phone_number" id="phone"
                            value="{{ $user->phone_number }}" required pattern="^0[0-9]{9,10}$">
                    </div>
                    <div class="form-group">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Enter your address" required>
                        <div class="form-group">
                            <lable for="payment-method " class="col-form-label">Payment method: </lable>
                            <select class="form-select" name="payment_method" required>
                                <option value="COD" selected>COD</option>
                                <option value="MOMO">MOMO</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6">
                <h2>Your order</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody id="orderTable">
                        <div class="d-none">
                            {{ $total = 0 }}
                        </div>
                        @foreach ($cartProducts as $product)
                            <tr>
                                <td><img src="{{ asset('/storage/images/' . $product->image) }}" alt="img"
                                        width="50px"> {{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price * (100 - $product->discount) }}đ</td>
                            </tr>
                            <div class="d-none">
                                {{ $total += $product->price * (100 - $product->discount) * $product->quantity }}
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <h6>Delivery fee: Free </h6>
                <h4 id="total">Total: {{ $total }}đ </h4>
                <input type="hidden" name="total_price" value="{{ $total }}">
                <button type="submit" class="btn btn-success" id="checkout">Checkout</button>
            </div>
            </form>
        </div>
    </div>
@endsection
