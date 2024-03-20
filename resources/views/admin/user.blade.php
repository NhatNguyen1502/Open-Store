@extends('layouts.admin')
@section('modal')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{route('users.create')}}" method="POST"> 
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="col-form-label">User name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="col-form-label">Email: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}}$" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="col-form-label"> Password: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="col-form-label">Phone: <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" name="phone_number" required pattern="^0[0-9]{9,10}}$">
            </div>
            <div class="mb-3">
                Role: <span class="text-danger">*</span>
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="role" id="admin" value="admin">
                    <label class="btn btn-outline-primary" for="admin">Admin</label>
                    <input type="radio" class="btn-check"  name="role" id="user" value="user">
                    <label class="btn btn-outline-primary" for="user">User</label>
                </div>
            </div>
            <div class="mb-3">
                Status: <span class="text-danger">*</span>
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="status" id="active" value="active">
                    <label class="btn btn-outline-primary" for="active">Active</label>
                    <input type="radio" class="btn-check" name="status" id="inactive" value="inactive">
                    <label class="btn btn-outline-primary" for="inactive">In Active</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addUser">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
@endsection

@section('thead')
    <tr class="table-dark">
        <th>ID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($users as $key => $item)
        <tr class="item-id-{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone_number}}</td>
            <td>{{$item->role}}</td>
            <td>{{$item->status}}</td>
            <td>
                <button class="btn btn-primary"><a class="nav-link text-light" href="{{route('users.edit', ['id' => $item->id])}}">Update</a></button>                
            </td>
        </tr>
    @endforeach

@endsection