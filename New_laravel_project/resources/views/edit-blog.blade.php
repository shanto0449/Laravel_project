<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Blog</h1>

    <form action="/edit-blog/{{$data->slug}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
        {{-- <label for="">SL:</label>
        <input type="text" name="sl" value="{{$data->sl}}" placeholder="Add sl">
        <br><br> --}}
        <label for="">Title:</label>
        <input type="text" name="title" placeholder="Add title" value="{{$data->title}}" > <span style="color: red">@error('title'){{$message}}@enderror</span>
        <br><br>
        <label for="">Image:</label>
        <input type="file" name="image" value="{{$data->image}}"><span style="color: red">@error('image'){{$message}}@enderror</span>
        <br><br>
        <label for="">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" value="{{$data->description}}" >{{$data->description}}</textarea> <span style="color: red">@error('description'){{$message}}@enderror</span>
        <br><br>
        <button>Submit</button>
        <button><a href="/list">Cancle</a></button>


    </form>

</body>
</html>
