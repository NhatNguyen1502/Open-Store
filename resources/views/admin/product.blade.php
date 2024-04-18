@extends('layouts.admin')
@section('modal')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="POST" action="{{ route('products.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="pName-inp" class="col-form-label">Product name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="pName-inp" required>
            </div>
            <div class="mb-3">
                <lable for="category-inp " class="col-form-label">Category: <span class="text-danger">*</span> </lable>
                <select class="form-select" name="category_id" id="category-inp" aria-label="Select a category" required>
                    <option value="" disabled selected>Choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price-inp" class="col-form-label">Price: <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control" min="0" id="price-inp" required>
            </div>
            <div class="mb-3">
                <label for="discountAmount-inp" class="col-form-label">Discount: <span class="text-danger">*</span></label>
                <input type="number" name="discount" class="form-control" min="0" max="100"
                    id="discountAmount-inp" required>
            </div>
            <div class="mb-3">
                <label for="stock-inp" class="col-form-label">Stock: <span class="text-danger">*</span></label>
                <input type="number" name="stock" class="form-control" min="0" id="stock-inp" required>
            </div>
            <div class="mb-3">
                <label for="description-inp" class="col-form-label">Description: <span class="text-danger">*</span></label>
                <input type="text" name="description" class="form-control" id="description-inp" required>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addProduct">Add</button>
        </div>
    </form>
@endsection

@section('thead')
    <tr class="table-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($products as $key => $item)
        <tr class="item-id-{{ $item->id }}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ number_format($item->price, 0, ',', '.') }}</td>
            <td>{{ $item->discount }}</td>
            <td>{{ $item->stock }}</td>
            <td>
                <img src="{{ asset('storage/images/' . $item->image) }}" alt="img" width="50px">
            </td>
            <td>{{ $item->description }}</td>

            <td>{{ $item->status }}</td>
            <td>
                <div class="btn-group gap-1" role="group" aria-label="Button group">
                    <button class="btn btn-primary rounded">
                        <a class="nav-link text-light" href="{{ route('products.edit', ['id' => $item->id]) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </button>

                    <form id="delete-form-{{ $item->id }}"
                        action="{{ route('products.delete', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endsection
