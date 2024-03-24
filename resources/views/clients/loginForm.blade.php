
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/generalFunction.js') }}"></script>
@extends('layouts.client')

@section('title', 'Log in ')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection


<div class="container">
    @section('form')
    <div class="loginForm justify-content-center" style='display: flex' id='loginForm'>
        <form method='get' action=""> 
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
</div>