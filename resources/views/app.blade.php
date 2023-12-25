<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ul{
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .pagination{
            display: flex;
        }
        .pagination li{
            margin: 10px;
            margin-left: 0;
        }
        .menu a{
            display: inline-block;
            text-decoration: none;
            color: #333;
            margin: 10px;
        }
        .menu a:first-child{
            margin-left: 0;
        }
        .menu a:hover{
            color: red;
        }
    </style>
</head>
<body>
   <div class="container">
        @include('partials/nav')
        @yield('content')
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>