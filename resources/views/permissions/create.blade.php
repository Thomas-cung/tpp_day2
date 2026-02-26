@extends('layouts.app')

@section('content')
<h2 class="mt-4">Create New Permission</h2>
<a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
<form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Permission Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" name="name"
            placeholder="Enter Permission Name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Guard Name</label>
        <input type="text" class="form-control @error('guard name') is-invalid @enderror" id="guard name"
            name="guard name" placeholder="Enter Product Guard Name" />
        @error('description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="create at" class="form-label">Created At</label>
        <input type="number" class="form-control @error('create at') is-invalid @enderror" id="create at"
            name="create at" placeholder="Enter Product Create Name" />
        @error('price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    @endsection