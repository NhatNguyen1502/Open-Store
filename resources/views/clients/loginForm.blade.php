
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/generalFunction.js') }}"></script>
@extends('layouts.client')

@section('title', 'Log in ')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection


<div class="container">
    @section('login')
    <div class="loginForm justify-content-center" style='display: flex' id='loginForm'>
        <form method='get' action="{{ route('user.login') }}"> 
            <div class="modal-body" style="width: 400px">
                <div class="mb-3">
                    <label for="userEmail-inp" class="col-form-label">Email: <span
                            class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="userEmail-inp" name="email" required> 
                </div>
                <div class="mb-3">
                    <label for="pword-inp" class="col-form-label">Password: <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pword-inp" name="password" required> 
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal" data-bs-toggle="modal"
                    onclick='toggleForm()'>Sign up</button>
            </div>
        </form>
    </div>
    @endsection
    
    @section('signup')
    <div class="signupForm justify-content-center" style='display: none' id='signupForm'>
        <form method='post' action="{{route('user.signup')}}" style="width: 400px">
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
                <button type="submit" class="btn btn-info" >Sign up</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                onclick='toggleForm()' >Log in</button>
            </div>
        </form>
    </div>
    @endsection
</div>