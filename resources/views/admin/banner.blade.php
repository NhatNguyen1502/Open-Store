@extends('layouts.admin')
@section('modal')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('banners.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="col-form-label">Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="img1-inp" class="col-form-label">Image: <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" accept="image/*" id="img1-inp" required>
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
        <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($banners as $key => $item)
        <tr class="item-id-{{ $item->id }}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <img src="{{ asset('banner_images/' . $item->image) }}" alt="img" width="50px">
            </td>
            <td>{{ $item->status }}</td>
            <td>
                <button class="btn btn-primary"><a class="nav-link text-light"
                    href="{{ route('users.edit', ['id' => $item->id]) }}">Update</a></button>
            </td>
        </tr>
    @endforeach
@endsection
