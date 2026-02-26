@extends('layouts.app')

@section('content')
<h2>Edit Role</h2>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Role Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" value="{{ $role->name }}" id="name"
            name="name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-3">
        <h3>Premission</h3>
        @foreach ($permissions as $permission )
        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}" @if (in_array($permission->id,
            $rolePermissions)) checked @endif
            >{{ $permission->name }}</label><br />

        @endforeach
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        Update
    </button>
</form>
@endsection