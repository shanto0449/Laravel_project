
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title','Login')</title>
  </head>
  <body>
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
              <div class="clo-12">
                @foreach ($errors->all() as $error )
                <div class="alert alert-danger">{{$error}}</div>

                @endforeach
              </div>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>

            @endif
            @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>

            @endif
           </div>
           <h1>Login Page!</h1>
           <hr>
        <form action="{{route('login.post')}}" method="post" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
              </div>

            <div class="mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <button><a href="{{route('registration')}}" class="btn btn-primary">Register</a></button>
          </form>
          </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>

