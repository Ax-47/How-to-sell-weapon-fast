<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($self)
        <a href=""><img src={{$a->profile}} alt=""></a>
        <h1>Hello <a href="">{{$a->name}}</a></h1>
        <a href=""><h2>{{$a->bio}}</h2></a>
    @else
        <img src={{$a->profile}} alt="">
        <h1>Hello {{$a->name}}</h1>
        <h2>{{$a->bio}}</h2>
    @endif
</body>
</html>