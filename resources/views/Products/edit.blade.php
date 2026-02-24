@extends('layouts.app')

@section('content')
<h2 class="mt-4">Edit Product</h2>
<a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
<form action="{{ route('products.update', [$product->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror" value="{{ $product->name }}"
            id="name" name="name" />
        @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror"
            value="{{ $product->description }}" id="description" name="description" />
        @error('description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Product Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}"
            id="price" name="price" />
        @error('price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="checkbox" class="form-check-input" id="status" name="status"
            {{ $product->status ? 'checked' : '' }}>
    </div>

    <!-- <input type="hidden" name="status" value="Expired"> -->

    <!-- <input type="checkbox" name="status" value={{ $product->status }}
                {{ $product->status == '1' ? 'checked' : '' }}> -->

    <button type="submit" class="btn btn-primary btn-sm">
        Update
    </button>
</form>
@endsection