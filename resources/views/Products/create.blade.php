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
    <!-- <h2>Create New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Product Name" />
        <br><br>
        <label for="description">Description: </label>
        <textarea type="text" name="description" id="description" placeholder="Enter Product Description"></textarea>
        <br><br>
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter Product Price"></input>
        <br><br>
        <button type="submit">
            +Create
        </button>
    </form> -->

    <div class="container">
        <h2 class="mt-4">Create New Product</h2>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm my-3">Back to list</a>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" name="name"
                    placeholder="Enter Product Name" />
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" placeholder="Enter Product Description" />
                @error('description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    placeholder="Enter Product Price" />
                @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control @error('image') is invalid @enderror" name="image">
                @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-sm">Create Product</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>