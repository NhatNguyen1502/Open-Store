{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- <script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script> -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="../css/hearder-footer.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Montserrat:ital,wght@0,500;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Open store</title>
    <link rel="stylesheet" href="../css/homePage.css">
    <link rel="stylesheet" href="../css/hearder-footer.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="heading">
                    <h1 class="fw-bold">FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
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
                <img src="../image/model.png" alt="image">
            </div>
        </div>
    </div>
    <div class="brand">
        <div class="name">
            <img class="logo" src="../image/zara-logo-1 1.png" alt="image">
        </div>
        <div class="name">
            <img class="logo" src="../image/gucci-logo-1 1.png" alt="image">
        </div>
        <div class="name">
            <img class="logo" src="../image/prada-logo-1 1.png" alt="image">
        </div>
    </div>
    <div class="container">
        <h1 class="fw-bold text-center mt-4">NEW ARRIVALS</h1>
        <!-- hiển thị danh mục sản phẩm mới -->
        <div class="container">
            <div class="row mt-4 text-center" id="newProduct">

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col text-center">
                <button class="button" id="view" type="button" class="btn viewAll btn-dark"
                    onclick="showAll()">View
                    all</button>
            </div>
        </div>
    </div>

    <!-- footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/generalFunction.js"></script>
    <script src="../js/homePage.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">emailjs.init('jo_blC2BLU3XA-97k')</script> 
</body>

</html> --}}
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@extends('layouts.client')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection
