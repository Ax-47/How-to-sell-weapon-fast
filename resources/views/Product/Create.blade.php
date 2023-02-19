<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1>create</h1>
    <form action={{url("/productc")}} method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="number" name="price">
        <input type="number" name="stock">
        <input type="submit" value="create products">

    </form>
</body>
</html>