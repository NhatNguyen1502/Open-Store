<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
<header class="header sticky-top bg-white">
    <nav class="container-fluid">
        <div class="row">
            <div class="col-7 d-sm-none d-block text-start">
                <nav class="navbar justify-content-start">
                    <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('assets/image/Logo.png') }}" alt="logo" class="ms-2"
                            style="width: 100px;">
                    </a>
                </nav>
            </div>
            <div class="col-5 d-sm-none d-flex justify-content-end align-items-center">
                <button type="button" class="btn me-3 p-0" data-bs-toggle="modal" data-bs-target="#modal1"
                    href="/login"><i class="fa-regular fa-circle-user fs-2 m-0" id="user-icon"></i></button>
                @if (session('user_id'))
                    <a href="{{ route('cart', ['user_id' => session('user_id')]) }}" class="text-black">
                        <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative" id="cart-icon">
                            <span
                                class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                                style="font-size: 10px !important;"></span>
                        </i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-black">
                        <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative" id="cart-icon">
                            <span
                                class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                                style="font-size: 10px !important;"></span>
                        </i>
                    </a>
                @endif
            </div>
            <div class="col-sm-2 p-0 d-sm-block d-none">
                <a href="{{ route('homepage') }}"><img src="{{ asset('assets/image/Logo.png') }}" alt="logo"
                        class="w-75"></a>
            </div>
            <div class="col-sm-10 d-sm-block d-none ">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="row w-100 align-items-center">
                        <div class="col-9 d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-inp"
                                    placeholder="Search for anything" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary bg-warning" type="button" id="button-addon2"
                                    onclick="handleSearch()">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-3 d-flex align-content-center justify-content-center">
                            @if (session('user_id'))
                                <a href="{{ route('cart', ['user_id' => session('user_id')]) }}" class="text-black">
                                    <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative" id="cart-icon">
                                        <span
                                            class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                                            style="font-size: 10px !important;"></span>
                                    </i>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-black">
                                    <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative" id="cart-icon">
                                        <span
                                            class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                                            style="font-size: 10px !important;"></span>
                                    </i>
                                </a>
                            @endif
                            @if (session('user_id'))
                                <!-- Hiển thị button khi session user_id tồn tại -->
                                <button type="button" class="btn me-3 p-0" onclick="handleLogout()">
                                    <i class="fa-solid fa-right-from-bracket fs-3"></i>
                                </button>
                            @else
                                <!-- Hiển thị thẻ a khi session user_id không tồn tại -->
                                <a class="btn me-3 p-0" href="{{ route('login') }}">
                                    <i class="fa-regular fa-circle-user fs-2 m-0" id="user-icon"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-start w-100">
                        <div class="col-9 mt-2">
                            <ul class="menu justify-content-center">
                                <li><a href="{{ route('homepage') }}">Home</a></li>
                                <li><a href="{{ route('showProducts') }}">Category</a></li>
                                <li><a href="{{ route('aboutUs') }}">About</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('category','t-shirts')">T-shirts</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('category','shorts')">Shorts</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('category','shirts')">Shirts</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('category','hoodies')">Hoodies</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('category','jeans')">Jeans</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Brand
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('brand','zara')">Zara</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('brand','gucci')">Gucci</a></li>
                            <li><a class="dropdown-item" href="category.html"
                                    onclick="window.localStorage.setItem('brand','prada')">Prada</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="category.html">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="AboutUs.html">About</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pb-2 d-sm-none d-block">
            <div class="input-group" id="search">
                <input type="text" class="form-control" id="mini-search-inp" placeholder="Search for anything"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary bg-warning" type="button" id="button-addon2"
                    onclick="handleSearch()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </nav>
</header>

<script>
    function handleLogout() {
        // Gửi yêu cầu đến server để xóa session
        fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (response.ok) {
                    // Xóa user_id và email khỏi session trên client side
                    sessionStorage.removeItem('user_id');
                    sessionStorage.removeItem('email');
                    // Hoặc nếu bạn muốn chuyển hướng người dùng sau khi đăng xuất
                    window.location.href = '{{ route('login') }}';
                }
            })
            .catch(error => console.error('Error:', error));
    };
</script>
