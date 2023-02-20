@extends('layouts.app')

@push('style')
@powerGridStyles
@endpush

@section('buttons')
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('attendances.index') }}">Back</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')
@include('partials.alerts')

<div class="card shadow">
    <div class="card-body my-4">
        <livewire:attendance-edit-form :attendance="$attendance"/>
    </div>
</div>

@endsection
