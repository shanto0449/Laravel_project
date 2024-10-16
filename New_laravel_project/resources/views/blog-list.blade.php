<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog List</title>
</head>
<body>
    <header>
        <h1 style="text-align: center ">Md Shanto Hosen</h1>

    </header>
    <h1>Blog list</h1>
    <div style="text-align: right ; margin: 20px">
        <button ><a href="/add" ><h1 >Add Blog</h1></a></button>
    </div>

    <br>
    <br>
    <div >
        <table border="1" style="width: 100%">
            <tr style="text-align: center; ">

                <td>Title</td>
                <td>Image</td>
                <td>Description</td>
                <td>Publication_Date</td>
                <td>Action</td>

            </tr>
            @foreach ($blogs as $blog)

            <tr>
                {{-- <td> {{$blog->sl}} </td> --}}
                <td>{{$blog->title}}</td>
                <td><img src="{{ Storage::url($blog->image) }}" style="width: 100px; margin:5px" alt="" ></td>
                <td>{{$blog->description}}</td>
                <td>{{$blog->created_at}}</td>
                <td>
                    <a href="{{'delete/'.$blog->id}}">Delete</a>
                    <br>
                    <a href="{{'edit/'.$blog->slug}}">Edit</a><br>
                    <a href="{{'view/'.$blog->slug}}">View</a>
                </td>
            </tr>

            @endforeach
        </table>

        {{$blogs->links()}}

    </div>
    <style>
        .w-5.h-5{
            width: 15px;

        }
    </style>

</body>
</html>
