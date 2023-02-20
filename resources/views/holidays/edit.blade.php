@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body my-4">
        <livewire:holiday-edit-form :holidays="$holidays" />
    </div>
</div>

@endsection
