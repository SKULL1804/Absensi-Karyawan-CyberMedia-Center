@extends('layouts.app')

@section('buttons')
<nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('positions.index') }}">Back</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-body my-4">
                <livewire:position-create-form />
            </div>
        </div>
    </div>
</div>

@endsection
