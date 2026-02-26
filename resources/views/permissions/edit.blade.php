@extends('layouts.app')

@section('content')

<h2 class="mt-4">Edit Permission</h2>
<a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
<form action="{{ route('permissions.update', [$permission->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Permission Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" value="{{ $permission->name }}"
            id="name" name="name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Guard Name</label>
        <input type="text" class="form-control @error('guard')  is-invalid @enderror" value="{{ $permission->name }}"
            id="guard name" name="guard name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Create At</label>
        <input type="text" class="form-control @error('create at')  is-invalid @enderror"
            value="{{ $permission->name }}" id="create at" name="create at" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        Update
    </button>
</form>

@endsection