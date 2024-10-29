<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Carosuel Images</title>
</head>
<body>
    <div class="container">
        <h1>Uplode Carosuel Image</h1>
        <div class="card mt-5 mb-5">
            <form method="post" action="{{url('/create')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="image">Select Image</label>
                  <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary mt-5 mb-5">Uplode</button>
              </form>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success mt-5">
                {{session()->get('message')}}
            </div>
        @endif

    </div>
    <script src="{{asset('js/holder.min.js')}}" ></script>

</body>
</html>
