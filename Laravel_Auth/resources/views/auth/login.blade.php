@extends("layouts.default")
@section("title","Login")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4>Login</h4>
            <hr>
            <form action="{{route('login.post')}}" method="post">
                @if (session()->has('success'))
                          <div class="alart alart-success">{{session()->get('success')}}</div>

                          @endif

                          @if (session()->has('error'))
                          <div class="alart alart-success">{{session()->get('error')}}</div>

                          @endif



                @csrf


               <div class="form-group">
                <label for="email">Email</label>
               <input type="email" class="form-control" placeholder="Enter Email" name="email" >
               <span class="text-danger">@error('email') {{$message}}@enderror</span>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
               <input type="password" class="form-control" placeholder="Enter Password" name="password" >
               <span class="text-danger">@error('password') {{$message}}@enderror</span>
           </div>
           <br>

           <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
            <button ><a class="btn btn-block btn-primary" href="/register">Register</a></button>


           </div>



            </form>

        </div>

    </div>

</div>
@endsection
