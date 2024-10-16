<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog</title>
</head>
<body>
    <h1>Add Blog</h1>
   <div style="text-align: justify ">
    <form action="add" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <label for="">SL:</label>
        <input type="text" name="sl" placeholder="Add sl">
        <br><br> --}}
        <label for="">Title:</label>
        <input type="text" name="title" placeholder="Add title"> <span style="color: red">@error('title'){{$message}}@enderror</span>
        <br><br>
        <label for="">Image:</label>
        <input type="file" name="image"><span style="color: red">@error('image'){{$message}}@enderror</span>
        <br><br>
        <label for="">Description:</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea><span style="color: red">@error('description'){{$message}}@enderror</span>
        <br><br>
        <button>Submit</button>


    </form>
   </div>

</body>
</html>
