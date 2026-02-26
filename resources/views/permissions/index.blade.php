@extends('layouts.app')

@section('content')
<h2 class="mt-4">Permissions List</h2>
@can('permissionCreate')
@endcan
<a href="{{ route('permissions.create') }}" class="btn btn-outline-success btn-sm my-4">
    Create
</a>
<div class="overflow-x-auto">
    <table class="table table-bordered">
        <thead class="bg-gray-100">
            <tr>
                <th class="bg-secondary text-white">ID</th>
                <th class="bg-secondary text-white">Name</th>
                <th class="bg-secondary text-white">Guard Name</th>
                <th class="bg-secondary text-white">Created At</th>
                <th class="bg-secondary text-white">Updated At</th>
                <th class="bg-secondary text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td>{{ $permission->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $permission->updated_at->format('Y-m-d H:i') }}</td>
                <td>
                    @can('permissionUpdate')
                    @endcan
                    <a href="{{ route('permissions.edit', $permission->id) }}"
                        class="btn btn-outline-secondary btn-sm me-2">Edit</a>
                    @can('permissionDelete')
                    @endcan
                    <form action="{{ route('permissions.delete', $permission->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection