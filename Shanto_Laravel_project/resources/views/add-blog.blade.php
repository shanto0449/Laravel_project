<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title','Add Blog')</title>
</head>
<body>
    <div class="container">


        <h1>Add Blog!</h1>
        <hr>

        <form action="{{route('blog.post')}}" method="post" enctype="multipart/form-data" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3">

              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" ><span style="color: red">@error('image'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title"><span style="color: red">@error('title'){{$message}}@enderror</span>
              </div>

            <div class="mb-3">
              <label  class="form-label">Description</label>
             <textarea name="description" id="" cols="30" rows="10"></textarea><span style="color: red">@error('description'){{$message}}@enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-primary"><a href="/view-blog" style="color:white">Cancle</a></button>
          </form>
          </div>

    </div>



    </form>
   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
