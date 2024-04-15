<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<div class="container d-flex justify-content-center ">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        <h1>UPDATE USER</h1>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="uName-update-{{$user->id}}" class="col-form-label">User name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
        </div>
        <div class="mb-3">
            <label for="email-update-{{$user->id}}" class="col-form-label">Email: <span class="text-danger">*</span></label>
            <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}}$" name="email" value="{{$user->email}}" required>
            <div class="mb-3">
                <label for="phone-update-{{$user->id}}" class="col-form-label">Phone: <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" name="phone_number" value="{{$user->phone_number}}" required pattern="^0[0-9]{9,10}}$">
            </div>
            <div class="mb-3">
                Role: <span class="text-danger">*</span>
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="role" id="admin-update-{{$user->id}}" value="admin" {{$user->role == 'admin' ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="admin-update-{{$user->id}}">Admin</label>
                    <input type="radio" class="btn-check" name="role" id="user-update-{{$user->id}}" value="user" {{$user->role == 'user' ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="user-update-{{$user->id}}">User</label>
                </div>
            </div>
            <div class="mb-3">
                Status: <span class="text-danger">*</span>
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="status" id="active-update-{{$user->id}}" value="active" {{$user->status == 'active' ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="active-update-{{$user->id}}">Active</label>
                    <input type="radio" class="btn-check" name="status" id="unactive-update-{{$user->id}}" value="inactive" {{$user->status == 'inactive' ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="unactive-update-{{$user->id}}">Unactive</label>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-secondary"><a class="nav-link text-light" href="{{route('users.index')}}">Back</a></button>
                <button type="submit" class="btn btn-primary" id="updateUser">Update</button>
            </div>
    </form>
</div>