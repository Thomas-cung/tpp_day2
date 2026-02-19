<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- <h2>Product Edit</h2>
    <form action="{{route('products.update', [$product->id])}}" method="POST">
        @csrf
        <input type="text" value="{{ $product->name }}" name="name">
        <br><br>
        <input type="text" name="description" id="description" value="{{ $product->description }}">
        <br><br>
        <input type="number" name="price" id="price" value="{{ $product->price }}">
        <button type="submit">Update</button>
    </form> -->

    <div class="container">
        <h2 class="mt-4">Edit Product</h2>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
        <form action="{{ route('products.update', [$product->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('name')  is-invalid @enderror"
                    value="{{ $product->name }}" id="name" name="name" />
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
                <input type="text" class="form-control @error('price') is-invalid @enderror"
                    value="{{ $product->price }}" id="price" name="price" />
                @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <label>Active or Expired</label>

            <input type="hidden" name="status" value="Expired">

            <input type="checkbox" name="status" value="1" {{ $product->status == '1' ? 'checked' : '' }}>
            <button type="submit" class="btn btn-primary btn-sm">
                Update
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>