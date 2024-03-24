
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/generalFunction.js') }}"></script>
@extends('layouts.client')

@section('title', 'Sign up ')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection


<div class="container">
   
    @section('form')
    <div class="signupForm justify-content-center" style='display: flex' id='signupForm'>
        <form class='border p-3' method='post' action="{{ route('user.signup') }}" style="width: 400px"> 
            @csrf   
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="col-form-label">User name: <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name='name' required>
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email: <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name='email' required>
                </div>
                <div class="mb-3">
                    <label for="pword" class="col-form-label">Password: <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="pword" name='password' required>
                </div>  
                <div class="mb-3">
                    <label for="pword-confirm" class="col-form-label">Confirm password: <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password-confirm" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone: <span
                            class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phone" name='phone_number' required pattern="^0[0-9]{9,10}$">
                </div>

                

                <button type="submit" class="btn btn-info" >Sign up</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                onclick='toggleForm()' >Log in</button>
            </div>
        </form>
    </div>
    @endsection
</div>