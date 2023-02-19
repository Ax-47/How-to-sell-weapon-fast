<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src={{ 'storage\products\images\\'.$item->image }} alt="image" sizes="" srcset="">
    <h1>Product :{{$item->name}}</h1>
    <h2>Description :{{$item->description}}</h2>
    <h2>Stock :{{$item->stock}}</h2>
    <h2>Price :{{$item->price}}</h2>
    <img src="{{$item->user->profile}}" alt="profile" sizes="" srcset="">
    <h2>{{$item->user->name}}</h2>
    <form action={{url("/maket/buy")}} method="post">
        @csrf
        <input type="hidden" name="product" value={{$item->id}}><br>
        <input type="number" name="stock"><br>
        <input type="submit" value="buy"><br><br>
    </form>
    @auth
        <form action={{url("/comment/post")}} method="post">
            @csrf
            <input type="number" name="review"><br>
            <input type="text" name="connent"><br>
            <input type="submit" value="lets go"><br>
        </form>
    @else
        <h2>login?</h2>
    @endauth
</body>
</html>