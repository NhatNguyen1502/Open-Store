<div class="alert text-center bg-success text-light rounded-3" id="message" role="alert" style="display: none;">
</div>
<!-- modal login -->
<div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  align-items-center">
                <h5 class="modal-title">Log in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="userEmail-inp" class="col-form-label">Email: <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="userEmail-inp" required>
                    </div>
                    <div class="mb-3">
                        <label for="pword-inp" class="col-form-label">Password: <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pword-inp" required>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="checkLogIn()">Log in</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal2">Sign up</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal3" onclick="showEmailModal()">Forget password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal sign up -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal2Label">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name-reg" class="col-form-label">User name: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name-reg" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-reg" class="col-form-label">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email-reg" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-confirm" class="col-form-label">confirm email: <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email-confirm" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    </div>
                    <div class="mb-3">
                        <label for="pword-reg" class="col-form-label">Password: <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pword-reg" required>
                    </div>
                    <div class="mb-3">
                        <label for="pword-confirm" class="col-form-label">Confirm password: <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pword-confirm" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone-reg" class="col-form-label">Phone: <span
                                class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone-reg" required pattern="^0[0-9]{9,10}$">
                    </div>
                    <div class="mb-3">
                        <label for="address-reg" class="col-form-label">Address: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address-reg" required>
                    </div>
                    <button type="submit" class="btn btn-info" onclick="checkSignUp()">Sign up</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal1">Log in</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal3" onclick="showEmailModal()">Forget
                        password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- model mail -->
<div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="modal3Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal3Label">Reset your password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form">
                <div class="modal-body" id="resetPasswordForm">
                    <div class="mb-3">
                        <label for="email-conf" class="col-form-label">Your email:</label>
                        <input type="email" name="email" class="form-control" id="email-conf" required>
                    </div>
                    <div class="mb-3 d-none" id="confirmCode">
                        <label for="code-conf" class="col-form-label">code:</label>
                        <input type="number" name="code" class="form-control" id="code-conf" required>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal1">Log in</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal2">Sign up</button>
                    <button type="submit" id="requestButton" class="btn btn-warning"
                        onclick="sentEmail('submit')">Request password reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
                    <a href="index.html"><img src="../image/Logo.png" alt="logo" class="ms-2"
                            style="width: 100px;"></a>
                </nav>
            </div>
            <div class="col-5 d-sm-none d-flex justify-content-end align-items-center">
                <button type="button" class="btn me-3 p-0" data-bs-toggle="modal" data-bs-target="#modal1"
                    onclick="handleUserButton()"><i class="fa-regular fa-circle-user fs-2 m-0"
                        id="user-icon"></i></button>
                <a href="Cart.html" class="text-black">
                    <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative"id="cart-icon">
                        <span
                            class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                            style="font-size: 10px !important;"></span>
                    </i>
                </a>
            </div>
            <div class="col-sm-2 p-0 d-sm-block d-none">
                <a href="index.html"><img src="../image/Logo.png" alt="logo" class="w-75"></a>
            </div>
            <div class="col-sm-10 d-sm-block d-none ">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="row w-100 align-items-center">
                        <div class="col-9 d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-inp"
                                    placeholder="Search for anything" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary bg-warning" type="button"
                                    id="button-addon2" onclick="handleSearch()">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-3 d-flex align-content-center justify-content-center">
                            <button type="button" class="btn me-3 p-0" data-bs-toggle="modal"
                                data-bs-target="#modal1" onclick="handleUserButton()">
                                <i class="fa-regular fa-circle-user fs-2 m-0" id="user-icon"></i></button>
                            <a href="Cart.html" class="text-black ms-5">
                                <i class="fa-solid fa-bag-shopping fs-2 me-3 position-relative"id="cart-icon">
                                    <span
                                        class="cart position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"
                                        style="font-size: 10px !important;"></span>
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-start w-100">
                        <div class="col-9 mt-2">
                            <ul class="menu justify-content-center">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Category<span class="arrow">&#129175;</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('category','t-shirts')">T-shirts</a>
                                        </li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('category','shorts')">Shorts</a>
                                        </li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('category','shirts')">Shirts</a>
                                        </li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('category','hoodies')">Hoodies</a>
                                        </li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('category','jeans')">Jeans</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Brand<span class="arrow">&#129175;</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('brand','zara')">Zara</a></li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('brand','gucci')">Gucci</a>
                                        </li>
                                        <li><a href="category.html"
                                                onclick="window.localStorage.setItem('brand','prada')">Prada</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Products</a></li>
                                <li><a href="AboutUs.html">About</a></li>
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
