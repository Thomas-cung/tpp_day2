@extends('layouts.app')

@section('content')
<h2 class="mt-4">
    Create New Category
</h2>
{{-- {{ dd($errors) }} --}}
<a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" name="name"
            placeholder="Enter Category Name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control @error('description') @enderror" id="description" name="description"
            placeholder="Enter Category Description" />
        @error('description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Category Image</label>
        <input type="file" class="form-control @error('image') @enderror" name="image">
        @error('image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success btn-sm">
        Create Category
    </button>
</form>
@endsection