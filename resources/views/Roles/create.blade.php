@extends('layouts.app')

@section('content')
<h2>Create Role</h2>

<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Role Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" name="name"
            placeholder="Enter role Name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success btn-sm">Create Role</button>
</form>
@endsection