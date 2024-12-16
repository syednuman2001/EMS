
<x-layout>

    <div class="container py-md-2">

        <div class="row align-items-center">

          <div class="col-lg-7 ">
            <h3 class="display-5 "> Welcome to <strong class="text-info"> EMS </strong></h3>
            <h1 class="display-4 "> Create a new <strong class="text-muted"> account</strong>! </h1>
          </div>


          {{-- Registration-form --}}

          <div class=" col-lg-5 col-auto pl-lg-5 pb-3 py-lg-3">
            <form  action="/signup-submit" method="POST" id="registration-form">
              @csrf
              <div class="form-group ">
                <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                {{-- for basetext  --}}
                <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
           {{-- Validation --}}
                @error('username')
                <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
                 @enderror

            </div>

              <div class="form-group">
                <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                {{-- for basetext  --}}
                <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
            {{-- Validation --}}
            @error('email')
            <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
            @enderror
            </div>

            <div class="form-group">
                <label for="address-register" class="text-muted mb-1"><small>Address</small></label>
                {{-- for basetext  --}}
                <input value="{{old('address')}}" name="address" id="address-register" class="form-control" type="text"  autocomplete="off" />
            {{-- Validation --}}
            @error('address')
            <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
            @enderror
            </div>

            <div class="form-group">
                <label for="role" class="text-muted mb-1"><small>Role</small></label>
            <select class="form-control" aria-label="Default select example" name="role" >
                <option selected value="user">Select your role </option>
                <option value="user">User</option>
                <option value="organizer">Organizer </option>
              </select>
            </div>

              <div class="form-group">
                <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
                {{-- Validation --}}
                @error('password')
              <p class="m-0, small alert alert-danger shadow-sm" >{{ $message }}</p>
                @enderror
            </div>

              <div class="form-group">
                <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
            {{-- Validation --}}
            @error('password_confirmation')
            <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
            @enderror
            </div>

              <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block mb-4">Sign up for EMS</button>
            </form>

          </div>
        </div>
      </div>
  </x-layout>
