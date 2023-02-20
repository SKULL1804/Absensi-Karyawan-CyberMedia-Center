@extends('layouts.home')

@section('content')

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="{{ (!empty($user->avatar))?  url('img/profile/'.$user->avatar):url('img/no_image.jpg')}}" alt="Profile" class="rounded-circle">
                    <h2>{{ Auth::user()->name }}</h2>
                    <h3>{{ Auth::user()->position->name }}</h3>

                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-profile">Edit Profile</button>
                        </li>

                    </ul>

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @include('profile.partials.overview-profile')
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="edit-profile">
                            @include('home.partials.edit-profile')
                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

<script src="{{ asset('js/upload.js') }}"></script>

@endsection
