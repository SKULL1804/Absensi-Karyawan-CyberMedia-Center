<h5 class="card-title">Profile Details</h5>

    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Nama</div>
        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Jabatan</div>
        <div class="col-lg-9 col-md-8">{{ $user->position->name }}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">Email</div>
        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4 label">No. Telp</div>
        <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
    </div>

