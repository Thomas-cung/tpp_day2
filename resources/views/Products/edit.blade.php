<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Product Edit</h2>
    <form action="{{route('products.update', [$product->id])}}" method="POST">
        @csrf
        <input type="text" value="{{ $product->name }}" name="name">
        <br><br>
        <input type="text" name="description" id="description" value="{{ $product->description }}">
        <br><br>
        <input type="number" name="price" id="price" value="{{ $product->price }}">
        <button type="submit">Update</button>
    </form>
</body>

</html>