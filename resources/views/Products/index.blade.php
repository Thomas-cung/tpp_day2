@extends('layouts.app')

@section('content')
<h2 class="mt-4">Product List</h2>
@can('productCreate')
<a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm my-4">Create</a>
@endcan

<table class="table table-bordered">
    <thead>
        <th class="bg-secondary text-white">ID</th>
        <th class="bg-secondary text-white">NAME</th>
        <th class="bg-secondary text-white">CATEGORY</th>
        <th class="bg-secondary text-white">DESCRIPTION</th>
        <th class="bg-secondary text-white">IMAGE</th>
        <th class="bg-secondary text-white">PRICE</th>
        <th class="bg-secondary text-white">STATUS</th>
        <th class="bg-secondary text-white">ACTION</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <img src="{{ asset('productImages/'. $product->image) }}" alt="{{ $product->image }}"
                    style="width: 100px; height: auto;">
            </td>
            <td>{{ $product->price }}</td>
            <td {{ $product->status === 1 ? "text-success" : "text-danger" }}>
                {{ $product->status == 1 ? "Active" : "Expired" }}
            </td>
            <td>
                @can('productUpdate')
                <a href="{{route('products.edit', ['id' => $product->id])}}"
                    class="btn btn-outline-secondary btn-sm me-2">Edit</a>
                @endcan

                @can('productDelete')
                <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Delete</button>
                </form>
                @endcan

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection