<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<div class="container d-flex justify-content-center ">
    <form method="POST" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
        <h1>UPDATE BANNER</h1>
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="pName-update-{{ $banner->id }}" class="col-form-label">Banner name: <span
                        class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ $banner->name }}" class="form-control"
                    id="pName-update-{{ $banner->id }}" required>
            </div>
            
            <div class="mb-3">
                <label for="img1-inp" class="col-form-label">Image: <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" accept="image/*" id="img1-inp"
                    onchange="previewImage(event)">
                <img id="preview-image" width="300px" src="{{ asset('storage/images/' . $banner->image) }}"
                    alt="">
            </div>
        </div>
        <div class="mb-3">
            Status: <span class="text-danger">*</span>
            <div class="btn-group">
                <input type="radio" class="btn-check" name="status" id="active-update-{{ $banner->id }}"
                    value="active" {{ $banner->status == 'active' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="active-update-{{ $banner->id }}">Active</label>
                <input type="radio" class="btn-check" name="status" id="unactive-update-{{ $banner->id }}"
                    value="inactive" {{ $banner->status == 'inactive' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="unactive-update-{{ $banner->id }}">Unactive</label>
            </div>
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-secondary"><a class="nav-link text-light"
                    href="{{ route('banners.index') }}">Back</a></button>
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
