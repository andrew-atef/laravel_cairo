<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('product.create')}}">Add Product</a>
    <br />
    <a href="{{route('category.index')}}">All categories</a>
    <br />
    <a href="{{route('order.index')}}">All orders</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>price</th>
                <th>availablity</th>
                <th>show</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->availability}}</td>
                <td>
                    <form action="{{route('product.show',$product->id)}}" method="get">
                        <button>Show</button>
                     </form>
                    </td>
                    <td>
                       <form action="{{route('product.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                       </form>
                    </td>
                    <td>
                       <form action="{{route('product.update',$product->id)}}" >
                        <button type="submit">Update</button>
                       </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>