<link rel="stylesheet" href="">

<footer class="footer pt-5 position-relative">
    <div class="container-fluid pb-5">
    <div class="subcribe bg-dark align-content-center rounded-4 position-absolute top-0 start-50 translate-middle me-sm-0 me-5">
        <form action="{{ route('contact') }}" method="post">
            @csrf
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-sm-9 col-12 p-2 ms-3">
                    <h2 class='text-light'>Contact with us</h2>
                    <textarea name="message" class='p-3 rounded mb-2 w-100' style='outline: none ' placeholder='Enter your message here...'></textarea>
                </div>
                <button class='m-2 rounded-5' style='width: 100px; height: 40px ' type="submit">Send to us</button>
            </div>
        </form>
    </div>

        <div class="row mt-sm-0 mt-5">
            <div class="col-sm-4 col-12 m-sm-5 mt-5">
                <a href="{{ route('homepage') }}"><img src="{{ asset('assets/image/Logo.png') }}" alt="logo" class="mt-sm-0 mt-5"
                        style="width: 100px;"></a>
                <div class="fw-bold mt-2 mb-2">Contact</div>
                <div class="mb-3">
                    <span>Address: 101B Lê Hữu Trác, Sơn Trà, Đà Nẵng</span> <br>
                    <span>Phone: +84 396 139 324</span> <br>
                    <span>Hours: 6:00-22:00</span> <br>
                </div>
                <div class="d-flex">
                    <div class="icon d-flex justify-content-center align-items-center"><i
                            class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="icon d-flex justify-content-center align-items-center"><i
                            class="fa-brands fa-facebook-f"></i>
                    </div>
                    <div class="icon d-flex justify-content-center align-items-center"><i
                            class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon d-flex justify-content-center align-items-center"><i
                            class="fa-brands fa-github"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-6 mt-sm-5 mt-3">
                <div class="fw-bold mt-sm-5 mb-2">About </div>
                <div class="mb-3">
                    <a href="AboutUs.html" class="nav-link">About us</a>
                </div>
            </div>
            <div class="col-sm-2 col-6 mt-sm-5 mt-3">
                <div class="fw-bold mt-sm-5 mb-2">My Account</div>
                <div class="mb-3">
                    <span onclick="handleUserButton()">Sign in</span> <br>
                    <a href="Cart.html" class="nav-link">View Cart</a>
                </div>
            </div>
            <div class="col-sm-2 col-12 mt-sm-5 mt-3">
                <div class="fw-bold mt-sm-5 mb-2">Install App</div>
                <div class="mb-3">
                    <span>From App Store or Google Play</span> <br>
                    <div class="row pt-3 pb-3">
                        <div class="col ps-0">
                            <img src="{{ asset('assets/image/AppStore.png') }}" alt="AppStore" style="width: 100%;">
                        </div>
                        <div class="col ps-0">
                            <img src="{{ asset('assets/image/CHplay.png') }}" alt="CHplay" style="width: 100%;">
                        </div>
                    </div>
                    <span>Secured Payment Gateways</span> <br>
                </div>
            </div>
        </div>
        <hr>
        <p>&copy; 2023 HighFashion.com</p>
    </div>
</footer>
