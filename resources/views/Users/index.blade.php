@extends('layouts.app')

@section('content')
<h1 class="mt-4">User List</h1>
@can('userCreate')

<a href="{{ route('users.create') }}" class="btn btn-outline-success my-4 btn-sm">+ Create</a>
@endcan
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>Image</th>
            <th>Role</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>

            <td>
                @if ($user->image)
                <img src="{{ asset('userImage/' . $user->image) }}" alt="{{ $user->name }}" width="80" height="50"
                    class="rounded-circle object-fit-cover">
                @else
                <span class="text-muted">—</span>
                @endif
            </td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone ?? '—' }}</td>
            <td>{{ ucfirst($user->gender ?? '—') }}</td>
            <td>{{ $user->address ?? '—' }}</td>
            <td>
                <form action="{{ route('users.status',['id'=>$user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $user->status == 1 ? 'btn-success' : 'btn-danger' }}">
                        {{ $user->status ? 'Active' : 'Inactive' }}
                    </button>
                </form>
            </td>
            <td class="d-flex gap-2">
                @can('userUpdate')
                <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                    class="btn btn-outline-secondary btn-sm">Edit</a>
                @endcan

                @can('userDelete')
                <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection