<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <title>Create Product</title>
</head>
<body>
    <h1>create</h1>
    <form action={{url("/product")}} method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="file"  name="images[]"  multiple="multiple" accept=".jpg, .jpeg, .png"><br>
        
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="number" name="price">
        <input type="number" name="stock">
        <input type="submit" value="create products" onclick="FileDetails()"><br/><br/>
    </form>
    

</body>
</html>