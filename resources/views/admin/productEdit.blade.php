<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<div class="container d-flex justify-content-center ">
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        <h1>UPDATE PRODUCT</h1>
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="pName-update-{{ $product->id }}" class="col-form-label">Product name: <span
                        class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                    id="pName-update-{{ $product->id }}" required>
            </div>
            <div class="mb-3">
                <label for="price-update-{{ $product->id }}" class="col-form-label">Price: <span
                        class="text-danger">*</span></label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control"
                    id="price-update-{{ $product->id }}" required>
            </div>
            <div class="mb-3">
                <label for="discountAmount-update-{{ $product->id }}" class="col-form-label">Discount: <span
                        class="text-danger">*</span></label>
                <input type="number" name="discount" value="{{ $product->discount }}" min="0" max="100"
                    class="form-control" id="discountAmount-update-{{ $product->id }}" required>
            </div>
            <div class="mb-3">
                <label for="stock-update-{{ $product->id }}" class="col-form-label">Stock: <span
                        class="text-danger">*</span></label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control"
                    id="stock-update-{{ $product->id }}" required>
            </div>
            <div class="mb-3">
                <label for="description-inp" class="col-form-label">Description: <span
                        class="text-danger">*</span></label>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control"
                    id="description-inp" required>
            </div>
            <div class="mb-3">
                <label for="img1-inp" class="col-form-label">Image: <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" accept="image/*" id="img1-inp"
                    onchange="previewImage(event)">
                <img id="preview-image" width="300px" src="{{ asset('storage/images/' . $product->image) }}"
                    alt="">
            </div>
        </div>
        <div class="mb-3">
            <lable for="category-inp " class="col-form-label">Category: <span class="text-danger">*</span> </lable>
            <select class="form-select" name="category_id" id="category-inp" aria-label="Select a category" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            Status: <span class="text-danger">*</span>
            <div class="btn-group">
                <input type="radio" class="btn-check" name="status" id="active-update-{{ $product->id }}"
                    value="active" {{ $product->status == 'active' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="active-update-{{ $product->id }}">Active</label>
                <input type="radio" class="btn-check" name="status" id="unactive-update-{{ $product->id }}"
                    value="inactive" {{ $product->status == 'inactive' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="unactive-update-{{ $product->id }}">Unactive</label>
            </div>
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary"><a class="nav-link text-light"
                    href="{{ route('products.index') }}">Back</a></button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgElement = document.getElementById('preview-image');
            imgElement.src = reader.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
