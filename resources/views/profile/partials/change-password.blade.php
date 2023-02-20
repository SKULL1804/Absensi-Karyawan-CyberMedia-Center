@extends('layouts.app')

@section('content')
@include('partials.alerts')
<div class="card shadow">
    <div class="card-body mt-4">
    <!-- Change Password Form -->

        <form method="post" action="{{ route('update.password') }}">
            @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row mb-3">
            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="currentPassword" type="password" class="form-control" id="currentPassword">
            </div>
        </div>

        <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
            <div class="col-md-8 col-lg-9">
            <input name="newPassword" type="password" class="form-control" id="newPassword">
            </div>
        </div>

        <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
            <div class="col-md-8 col-lg-9">
            <input name="renewPassword" type="password" class="form-control" id="renewPassword">
            </div>
        </div>

        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="show-hide"  id="show-hide">
            <label class="form-check-label" for="remember_me">Show Password</label>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
        </form><!-- End Change Password Form -->

    </div>
</div>

@endsection
