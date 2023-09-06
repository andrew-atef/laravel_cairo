<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>price</th>
                <th>availablity</th>
                <th>image</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->availability}}</td>
                <td><img src="{{ asset('images/' . $product->picture) }}" width="300"></td>
            </tr>
        </tbody>
    </table>

</body>
</html>