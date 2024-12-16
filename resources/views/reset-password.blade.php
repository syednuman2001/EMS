<x-layout>

    <div class="container py-md-2">

        <div class="align-items-center">

          {{-- Reset-form --}}

          <div class=" col-lg-5 col-auto pl-lg-5 pb-3 py-lg-5">
            <form  action="{{route('password.update')}}" method="POST" id="reset-form">
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
                <input type="hidden" name="token" value="{{$token}}">
                <label for="email" class="text-muted mb-1"><small>Email</small></label>
                <input name="email" id="email" class="form-control" type="text" placeholder="Type Email" autocomplete="off" />
                    @error('email')
                         <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
                    @enderror

            </div>

              <div class="form-group">
                <label for="password" class="text-muted mb-1"><small>New Password</small></label>
                <input name="password" id="password" class="form-control" type="password" placeholder="Type New password" />
                    @error('password')
                        <p class="m-0, small alert alert-danger shadow-sm" >{{ $message }}</p>
                    @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                <input name="password_confirmation" id="password-confirm" class="form-control" type="password" placeholder="Confirm password" />
            {{-- Validation --}}
            @error('password_confirmation')
            <p class="m-0, small alert alert-danger shadow-sm" >{{ $message}}</p>
            @enderror
            </div>


              <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block">Reset Password</button>
            </form>

          </div>
        </div>
      </div>
  </x-layout>
