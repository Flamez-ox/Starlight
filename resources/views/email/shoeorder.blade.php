<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Order for Shoe</h2>
<ul>
    <li>Name: <span> {{$fromName}}</span></li>
    <!-- <li>Email:<span> {{$fromEmail}}</span></li> -->
    <li>Phone:<span> {{$subject}}</span></li>
    <li>Quantity: <span> {{$select}}</span> </li>
    <li>Size: <span>{{$size}}</span></li>
    <li>Color: <span>{{$color}}</span></li>
    <li>Address: <span>{{$address}}</span></li>
</ul>
</body>
</html>
{{$size}}
{{$color}}