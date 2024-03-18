@extends('layouts.admin')
@section('modal')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{route('user.create')}}" method="POST"> 
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
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" onclick="passDataUsersBeforeUpdate({{$item->id}})">Update</button>
                <div class="modal fade" id="update{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update user</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="uName-update-{{$item->id}}" class="col-form-label">User name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="uName-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email-update-{{$item->id}}" class="col-form-label">Email: <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}}$" id="email-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address-update-{{$item->id}}" class="col-form-label">Address: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone-update-{{$item->id}}" class="col-form-label">Phone: <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone-update-{{$item->id}}" required pattern="^0[0-9]{9,10}}$">
                                    </div>
                                    <div class="mb-3">
                                        Role: <span class="text-danger">*</span>
                                        <div class="btn-group">
                                            <input type="radio" class="btn-check" name="role-update-{{$item->id}}" id="admin-update-{{$item->id}}" value="admin">
                                            <label class="btn btn-outline-primary" for="admin-update-{{$item->id}}">Admin</label>
                                            <input type="radio" class="btn-check" name="role-update-{{$item->id}}" id="user-update-{{$item->id}}" value="user">
                                            <label class="btn btn-outline-primary" for="user-update-{{$item->id}}">User</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        Status: <span class="text-danger">*</span>
                                        <div class="btn-group">
                                            <input type="radio" class="btn-check" name="status-update-{{$item->id}}" id="active-update-{{$item->id}}" value="Active">
                                            <label class="btn btn-outline-primary" for="active-update-{{$item->id}}">Active</label>
                                            <input type="radio" class="btn-check" name="status-update-{{$item->id}}" id="unactive-update-{{$item->id}}" value="Unactive">
                                            <label class="btn btn-outline-primary" for="unactive-update-{{$item->id}}">Unactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="updateUser" onclick="checkAndHandleUserData({{$item->id}})">Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

@endsection