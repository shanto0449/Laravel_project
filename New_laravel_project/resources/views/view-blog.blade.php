<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Blog</title>
</head>
<body>
    <h1>View Blog</h1>

    <form action="">
        <div style="background-color:aqua; margin:50px">
            {{-- <h2><b>Blog ID: {{$blog->id}}</b></h2>
            <h3><b>Blog SL: {{$blog->sl}}</b></h3> --}}
            <h3><b>Title: {{$blog->title}}</b></h3>
            <img src="{{ Storage::url($blog->image) }}" style="width: 200px">
            <p>Description:{{$blog->description}}</p>
            <p>Created Date:{{$blog->created_at}}</p>
            <p>Update Date: {{$blog->updated_at}}</p>
         </div>
         <button><a href="/list">Cancle</a></button>
    </form>

</body>
</html>
