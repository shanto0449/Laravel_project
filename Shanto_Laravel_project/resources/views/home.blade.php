
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Home page')</title>
</head>
<body>

 <header >
    @extends('layouts.layouts')
    @section('title', 'Home Page')
    @section('content')

    @endsection
</header>
   @section('content')
   @include('contact')
   @endsection


</body>
</html>
