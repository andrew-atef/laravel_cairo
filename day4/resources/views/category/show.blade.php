<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Document</title>
</head>
<body>
<div> Category Name : {{$category->name}} </div>
<hr>

        <table>
            <thead>
                <tr>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Product Price
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($category->products) --}}
                @foreach ( $category->products as $product )
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>