<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/e1aaf64c7e.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center p-3"></h1>
        <div class="row justify-content-end pb-3">
            <div class="col-11 position-relative">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" id="addButton">Add +</button>
                <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y" onclick="logOut()"><i class="fa-solid fa-right-from-bracket fs-3"></i></button>
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            @yield('modal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <input type="radio" class="btn-check" name="management-options" id="product-option" autocomplete="off">
                <label class="btn btn-outline-warning w-100" for="product-option">Products</label>
                <input type="radio" class="btn-check" name="management-options" id="user-option" autocomplete="off">
                <label class="btn btn-outline-warning w-100" for="user-option">Users</label> 
                <input type="radio" class="btn-check" name="management-options" id="order-option" autocomplete="off">
                <label class="btn btn-outline-warning w-100" for="order-option">Orders</label>
            </div> 
            <div class="col-11">
                <table class="table">
                    <thead>
                        @yield('thead')
                    </thead>
                    <tbody id="tbody">
                        @yield('tbody')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/generalFunction.js"></script>
    <script src="../js/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>