@extends('layouts.app')


@section('content')
<h2 class="mt-4">Role List</h2>
@can('roleCreate')
<a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm my-4">Create</a>
@endcan

<table class="table table-bordered">
    <tr>
        <td class="bg-secondary text-white">ID</td>
        <td class="bg-secondary text-white">NAME</td>
        <td class="bg-secondary text-white">ACTION</td>
    </tr>

    @foreach($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
            @can('roleUpdate')
            <a href="{{route('roles.edit', ['id' => $role->id])}}"
                class="btn btn-outline-secondary btn-sm me-2">Edit</a>
            @endcan

            @can('roleDelete')
            <form action="{{ route('roles.delete', ['id' => $role->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Delete</button>
            </form>
            @endcan

        </td>
    </tr>
    @endforeach
</table>
@endsection