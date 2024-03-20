@extends('layouts.admin')
@section('modal')
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">New product</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{route('products.create')}}" enctype="multipart/form-data">
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
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price-inp" class="col-form-label">Price: <span class="text-danger">*</span></label>
            <input type="number" name="price" class="form-control" min="0" id="price-inp" required>
        </div>
        <div class="mb-3">
            <label for="discountAmount-inp" class="col-form-label">Discount: <span class="text-danger">*</span></label>
            <input type="number" name="discount" class="form-control" min="0" max="100" id="discountAmount-inp" required>
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
         <tr class="item-id-{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount}}</td>
            <td>{{$item->stock}}</td>
            <td>
                <img src="{{ asset('storage/images/' . $item->image) }}" alt="img" width="50px">
            </td>
            <td>{{$item->description}}</td>

            <td>{{$item->status}}</td>
            <td>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" onclick="passDataProductsBeforeUpdate({{$item->id}})">Update</button>
                <div class="modal fade" id="update{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="pName-update-{{$item->id}}" class="col-form-label">Product name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="pName-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price-update-{{$item->id}}" class="col-form-label">Price: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="price-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="discountAmount-update-{{$item->id}}" class="col-form-label">Discount: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="discountAmount-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock-update-{{$item->id}}" class="col-form-label">Stock: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="stock-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description-update-{{$item->id}}" class="col-form-label">Description: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="description-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <lable for="brand-update-{{$item->id}} " class="col-form-label">Brand: <span class="text-danger">*</span> </lable>
                                        <select class="form-select" id="brand-update-{{$item->id}}" aria-label="Select a brand" required>
                                            <option value="" disabled selected>Choose a brand</option>
                                            <option value="zara">Zara</option>
                                            <option value="gucci">Gucci</option>
                                            <option value="prada">Prada</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <lable for="category-update-{{$item->id}} " class="col-form-label">Category: <span class="text-danger">*</span> </lable>
                                        <select class="form-select" id="category-update-{{$item->id}}" aria-label="Select a category" required>
                                            <option value="" disabled selected>Choose a category</option>
                                            <option value="t-shirts">T-shirts</option>
                                            <option value="shorts">Shorts</option>
                                            <option value="shirts">Shirts</option>
                                            <option value="hoodies">Hoodies</option>
                                            <option value="jeans">Jeans</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="img1-update-{{$item->id}}" class="col-form-label">Image 1: <span class="text-danger">*</span></label>
                                        <input type="url" class="form-control" id="img1-update-{{$item->id}}" required>
                                    </div>
                                    <div class="mb-3">
                                        Status:<span class="text-danger">*</span>
                                        <div class="btn-group">
                                            <input type="radio" class="btn-check" name="status-update-{{$item->id}}" id="Enabled-update-{{$item->id}}" value="Enabled">
                                            <label class="btn btn-outline-primary" for="Enabled-update-{{$item->id}}">Enabled</label>
                                            <input type="radio" class="btn-check" name="status-update-{{$item->id}}" id="Disabled-update-{{$item->id}}" value="Disabled">
                                            <label class="btn btn-outline-primary" for="Disabled-update-{{$item->id}}">Disabled</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="updateProduct" onclick="checkAndHandleProductData({{$item->id}})">Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endsection