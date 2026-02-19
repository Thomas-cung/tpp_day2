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
    <!-- <h2>Products List</h2>
    <a href="{{ route('products.create') }}">+Create</a>
    <ul>
        @foreach ($products as $product)
        <li>
            <h3> ID: {{ $product->id }}</h3>
            <p> Name: {{ $product->name }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Price:{{ $product->price }}</p>
            <a href="{{route('products.edit', ['id' => $product->id])}}">Edit</a>
            <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul> -->
    <div class="container">
        <h2 class="mt-4">Product List</h2>
        <a href="{{ route('products.create') }}" class="btn btn-outline-success btn-sm my-4">Create</a>
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
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="{{ asset('productImages/'. $product->image) }}" alt="{{ $product->image }}"
                            style="width: 100px; height: auto;">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td {{ $product->status === 1 ? "text-success" : "text-danger" }}>
                        {{ $product->status == 1 ? "Active" : "Expired" }}</td>
                    <td>
                        <a href="{{route('products.edit', ['id' => $product->id])}}"
                            class="btn btn-outline-secondary btn-sm me-2">Edit</a>
                        <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm mt-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>