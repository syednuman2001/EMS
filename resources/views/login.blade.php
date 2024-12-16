
<x-layout>

    <div class="container py-md-2">

        <div class="row align-items-center">

          <div class="col-lg-7 ">
            <h3 class="display-5 "> Welcome to <strong class="text-info"> EMS </strong></h3>
            <h1 class="display-4 "> <strong class="text-muted"> Login </strong> to your account! </h1>
          </div>


          {{-- login-form --}}

          <div class=" col-lg-5 col-auto pl-lg-5 pb-3 py-lg-5">
            <form  action="/login-submit" method="POST" id="login-form">
              @csrf

              @if (session('status'))
              <div class="alert alert-info" role="alert">
                {{ session('status') }}
              </div>
              @endif

              <div class="form-group ">
                <label for="username" class="text-muted mb-1"><small>Username</small></label>
                <input value="{{old('username')}}" name="username" id="username" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
                    @error('username')
                         <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
                    @enderror

            </div>

              <div class="form-group">
                <label for="password" class="text-muted mb-1"><small>Password</small></label>

                <a href="/forgot-password" class="float-right"> Forgot Password? </a>

                <input name="password" id="password" class="form-control" type="password" placeholder="Type password" />
                    @error('password')
                        <p class="m-0, small alert alert-danger shadow-sm" >{{ $message }}</p>
                    @enderror
            </div>

              <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block">Login</button>
            </form>

          </div>
        </div>
      </div>
  </x-layout>
