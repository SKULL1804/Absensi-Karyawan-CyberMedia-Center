@extends('layouts.app')

@section('buttons')
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('employees.index') }}">Back</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="card shadow">
    <div class="card-body my-4">
        <livewire:employee-create-form />
    </div>
</div>

<script src="{{ asset('js/upload.js') }}"></script>

@endsection
