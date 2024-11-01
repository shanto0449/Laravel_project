<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Authentication</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h4>Registration</h4>
                <hr>
                <form action="{{route('register-user')}}" method="post">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>

                    @endif

                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>

                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                       <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="">
                       <span class="text-danger">@error('name') {{$message}}@enderror</span>
                   </div>

                   <div class="form-group">
                    <label for="email">Email</label>
                   <input type="text" class="form-control" placeholder="Enter Email" name="email" value="">
                   <span class="text-danger">@error('email') {{$message}}@enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                   <input type="text" class="form-control" placeholder="Enter Password" name="password" value="">
                   <span class="text-danger">@error('password') {{$message}}@enderror</span>
               </div>

               <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Register</button>

               </div>
               <br>

               <a href="login">Already registered !! Login Here.</a>

                </form>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
