@extends('layouts.client')

@section('title', 'Cart')


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection



@section('content')
    <div class="container-fluid bg-light">
        <h1>Your Cart</h1>
        <div class="row">
            <div class="col-lg-7 col-md-12 border rounded" id="product-body">
                <?php $subtotal = 0; ?> <!-- Khởi tạo biến tổng giá trị -->
                @foreach ($cartProducts as $product)
                    <div class="row mt-4 p-4">
                        <div class="col-5">
                            <img class='w-100 h-100' src="{{ asset('storage/images/' . $product->image) }}">
                        </div>
                        <div class="col-4">
                            <h3>{{ $product->name }}</h3>
                            <p> Size: 1</p>
                            <p>{{ number_format($product->price, 0, ',', '.') }} đ</p>
                            <p>Discount: {{ number_format($product->discount, 0, ',', '.') }}%</p>

                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-between ">
                            <div class="nut">
                                <!-- <input class="minus is-form" type="button" value="-" onclick="changeQuantity()"> -->
                                <input aria-label="quantity" class="input-qty p-2" id='input{{ $product->id }}'
                                    style='width: 60px' max="Số tối đa" min="1" name="" type="number"
                                    value="{{ $product->total_quantity }}"
                                    onchange="updateCartItem({{ $product->id }}, {{ $product->price }})">
                                <!-- <input class="plus is-form" type="button" value="+" onclick="changeQuantity()"> -->
                            </div>
                            <div class="icon-cart">
                                <a href="{{ route('removeCartProduct', ['product_id' => $product->id]) }}">
                                    <i class="fa fa-trash" style="color:red" onclick="deleteCartItem()"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php 
$discountedPrice = $product->price * (1 - $product->discount / 100); // Tính giá sau khi được giảm giá
$subtotal += $discountedPrice * $product->total_quantity; // Cộng giá trị của sản phẩm vào tổng giá trị đơn hàng
?>

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
                            <span id="subtotal">{{ number_format($subtotal, 0, ',', '.') }}đ</span>

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
                            <span id="totalPrice">{{ number_format($subtotal, 0, ',', '.') }}đ</span>
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
