<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @extends('layouts.layouts')
    @section('title', 'Home Page')
    @section('content')
    <h1 style="text-align: center">Blog</h1>
    <hr>


    @foreach ($blogs as $blog )

    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($blog->image) }}"  class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title">Title: {{$blog->title}}</h5>
          <p class="card-text">Description: {{$blog->description}}</p>

          <h5 class="card-title">Date:{{$blog->created_at}}</h5>
          <p>
            <a href="">Edit</a>
            <a href="">Delete</a>
            <a href="">View</a>
          </p>
        </div>
      </div>


    @endforeach

    {{$blogs->links()}}

    <style>
        .w-5.h-5{
            width: 15px;

        }
        .card{
            padding: 10px;
        }
    </style>
    @endsection



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
