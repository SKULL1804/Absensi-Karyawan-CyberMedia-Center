@extends('layouts.app')

@section('buttons')
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('positions.index') }}">Back</a></li>
    <li class="breadcrumb-item active">Add Posisi</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="card shadow col-md-7">
        <div class="card-body my-4">
            <livewire:position-edit-form :positions="$positions" />
        </div>
    </div>
</div>

@endsection
