@extends('layouts.base')

<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>

@push('style')
{{-- Template --}}
<link rel="stylesheet" href="{{ asset('template/css/app.css') }}">
@endpush

@section('base')

@include('partials.home-navbar')

<div class="container-fluid">
    @include('partials.home-sidebar')

    <main id="main" class="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 fw-bold">{{ $title }}</h1>


            @yield('buttons')
        </div><!-- End Page Title -->

        <div class="py-4">
            @yield('content')
        </div>
    </main><!-- End #main -->
</div>
<!-- Template JS File -->
<script src="{{ asset('template/js/main.js') }}"></script>

@endsection
