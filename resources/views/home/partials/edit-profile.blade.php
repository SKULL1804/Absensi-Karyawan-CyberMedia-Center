<form method="post" action="{{ route('home.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row mb-3">
        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
        <div class="col-md-8 col-lg-9">
            <input name="username" type="text" class="form-control" id="username" value="{{ $user->username }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
        <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-lg-3 col-form-label">No. Telp</label>
        <div class="col-md-8 col-lg-9">
            <input name="phone" type="text" class="form-control" id="phone" value="{{ $user->phone }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="avatar" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
        <div class="col-md-8 col-lg-9">
            <img id="showimage" src="{{ (!empty($user->avatar))?  url('img/profile/'.$user->avatar):url('img/no_image.jpg')}}" alt="Profile">
            <div class="pt-2">
                <input type="file" class="form-control" name="avatar" id="image">
            </div>
        </div>
    </div>

    <div class="flex">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form><!-- End Upload Image Profile Form-->
