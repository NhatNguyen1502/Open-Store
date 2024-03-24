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
                <label for="cateName" class="col-form-label">Category name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="cateName" required>
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
                <form method="POST" action="" enctype="multipart/form-data" id="updateCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="updateCategoryId" class="col-form-label">ID: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="categoryId" id="updateCategoryId" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="updateCategoryName" class="col-form-label">Category name: <span
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('click', async function(e) {
            const target = e.target;

            if (target.classList.contains('btn-edit')) {
                const categoryId = target.value;
                const action = `/admin/categories/${categoryId}`;

                try {
                    const response = await axios.get(action);
                    const category = response.data;
                    fillAndShowModal(category);
                } catch (error) {
                    console.error('There was a problem with the Axios request:', error);
                }
            }

            if (target.id == 'savechanges') {
                e.preventDefault();
                try {
                    const form = document.getElementById('updateCategoryForm');
                    const data = new FormData(form);
                    const action = `${form.action}/${form.categoryId.value}`;
                    await axios.post(action, data);
                    hideModal();
                    location.reload();
                } catch (error) {
                    console.error('There was a problem with the Axios request:', error);
                }
            }
        });

        function fillAndShowModal(category) {
            fillModal(category);
            showModal();
        }

        function fillModal(category) {
            document.getElementById('updateCategoryId').value = category.id;
            document.getElementById('updateCategoryName').value = category.name;
        }

        function showModal() {
            $('#update_category').modal('show');
        }

        function hideModal() {
            $('#update_category').modal('hide');
        }
    </script>
@endsection
