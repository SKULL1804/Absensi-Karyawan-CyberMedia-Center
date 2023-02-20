@extends('layouts.app')

@push('style')
@powerGridStyles
@endpush

@section('buttons')
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('employees.create') }}">Add {{ $title }}</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')
@include('partials.alerts')

<div class="card shadow">
    <div class="card-body mt-4">
        <livewire:employee-table />
    </div>
</div>

@endsection

@push('script')
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
@powerGridScripts
@endpush
