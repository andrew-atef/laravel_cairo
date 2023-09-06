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



        <table border>
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        price
                    </th>
                    <th>
                        user name
                    </th>
                    <th>
                        user email
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td>
                        {{ $order->price }}
                    </td>
                    <td>
                        {{ $order->user->name }}
                    </td>
                    <td>
                        {{ $order->user->email }}
                    </td>
                </tr>
            </tbody>
        </table>

    </body>
</html>