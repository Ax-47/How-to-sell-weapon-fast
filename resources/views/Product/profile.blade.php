<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($item->images as $image)
        <img src={{ asset('storage/images/products/'.$image->image) }} alt="{{$image->image}}" sizes="" srcset="">
    @endforeach
    
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
        <form action={{url("/comment/post")}} method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product" value="{{$id}}">
            <input type="file" name="images[]"  accept=".jpg, .jpeg, .png" multiple><br>
            <input type="number" name="review"><br>
            <input type="text" name="comment"><br>
            <input type="submit" value="lets go"><br>
        </form>
    @else
        <h2>login?</h2>
    @endauth
</body>
</html>