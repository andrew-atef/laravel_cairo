<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
      @csrf
     <input type="text" name="name" placeholder="name" >
     <input type="text" name="price" placeholder="price">
     <input type="text" name="availability"placeholder="availability">
     <input type="text" name="category_id"placeholder="category_id">
     <input type="file" name="picture">
     <input type="submit" >
    </form>
</body>
</html>