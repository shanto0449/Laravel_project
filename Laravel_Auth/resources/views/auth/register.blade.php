@extends("layouts.default")
@section("title","Register")
@section("content")




            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <h4>Registration</h4>
                        <hr>
                        <form action="{{route('register.post')}}" method="post">
                          @if (session()->has('success'))
                          <div class="alart alart-success">{{session()->get('success')}}</div>

                          @endif

                          @if (session()->has('error'))
                          <div class="alart alart-success">{{session()->get('error')}}</div>

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

                      

                        </form>

                    </div>

                </div>
            </div>

            </div>
@endsection

