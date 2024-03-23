@extends('layouts.admin')
@section('modal')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="POST" action="{{ route('categories.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="pName-inp" class="col-form-label">Category name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="pName-inp" required>
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
        <th>Action</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td class="d-flex gap-1">
                <button type="button" class="btn btn-primary btn-edit" value="{{ $category->id }}" data-bs-toggle="modal"
                    data-bs-target="#update_category">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>

                <form id="delete-form-{{ $category->id }}"
                    action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>

            </td>
        </tr>
    @endforeach
@endsection

@section('update_modal')
    <div class="modal fade" id="update_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}"
                    enctype="multipart/form-data" id="updateCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryId" class="col-form-label">ID: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="categoryId" id="updateCategoryId" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="categoryName" class="col-form-label">Category name: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="categoryName" id="updateCategoryName" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="savechanges">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-edit')) {
                let categoryId = e.target.value;
                const action = '/admin/categories/' + categoryId;

                fetch(action)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(category => {
                        document.getElementById('updateCategoryId').value = category.id;
                        document.getElementById('updateCategoryName').value = category.name;
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
        });
    </script>
@endsection
