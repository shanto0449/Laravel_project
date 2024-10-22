<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title','Contact Us')</title>
</head>
<body>
    @extends('layouts.layouts')
    @section('title', 'Home Page')
    @section('content')
    <h1>Contact Us</h1>
    <hr>
    <form action="{{route('contact.post')}}" method="post" class="ms-auto me-auto mt-auto" style="width: 500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject">
          </div>

        <div class="mb-3">
          <label  class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">Massage</label>
            <textarea name="massage" class="form-control" id="" cols="30" rows="10"></textarea>

          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        {{-- <button><a href="{{route('registration')}}" class="btn btn-primary">Register</a></button> --}}
      </form>
      </div>
    </form>
    @endsection


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

</body>
</html>
