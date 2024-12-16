
<x-layout>

    <div class="container py-md-2">

        <div class="row align-items-center">

          <div class="col-lg-7 ">
            <h3 class="display-5 "> Welcome to <strong class="text-info"> EMS </strong></h3>
            <h1 class="display-4 "> <strong class="text-muted"> Reset  </strong> Your Password </h1>
          </div>

          <div class=" col-lg-5 col-auto pl-lg-5 pb-3 py-lg-5">
            <form  action="{{route('password.email')}}" method="POST" id="login-form">
              @csrf

              @if (session('status'))
              <div class="alert alert-info" role="alert">
                {{ session('status') }}
              </div>

              @elseif (session('email'))
              <div class="alert alert-danger" role="alert">
                {{ session('email') }}
              </div>
              @endif

              <div class="form-group ">
                <label for="email" class="text-muted mb-1"><small>Email</small></label>
                <input value="{{old('email')}}" name="email" id="email" class="form-control" type="email" placeholder="Enter your email" autocomplete="off" />
                @error('email')
                         <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
                    @enderror

              </div>

              <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block">Reset</button>
            </form>

          </div>
        </div>
      </div>
  </x-layout>
