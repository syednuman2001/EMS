<x-layout>

    <div class="container py-md-2">

        <div class="row align-items-center">

            <div class="col-lg-7  ">
                <h1> &nbsp; &nbsp; <b class="text-muted"> Edit </b> Profile! </h1>
              </div>

    <div class="col-lg-5 col-auto pl-lg-5 pb-3 py-lg-5">
    <div class="container container-md container--narrow py-5">
        <form action="/profile-updated/{{$user->id}}" method="POST">
          <p><small><strong> <a href="javascript:history.back()">&laquo; Back </a></strong></small></p> <br/>
            @csrf
          @method('PUT')
          <div class="form-group">
            <label for="username" class="text-muted mb-1"><h6>Username</h6></label>
            <input value="{{old('username', $user->username)}}" name="username" id="username" class="form-control form-control-lg form-control-title " type="text" placeholder="" autocomplete="off" />
        @error('username')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="username" class="text-muted mb-1"><h6>Email</h6></label>
            <input value="{{old('username', $user->email)}}" name="email" id="email" class="form-control form-control-lg form-control-title " type="text" placeholder="" autocomplete="off" />
        @error('email')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="username" class="text-muted mb-1"><h6>Address</h6></label>
            <input value="{{old('username', $user->address)}}" name="address" id="address" class="form-control form-control-lg form-control-title " type="text" placeholder="" autocomplete="off" />
        @error('address')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="form-group">
            <label for="username" class="text-muted mb-1"><h6>Password</h6></label>
            <input name="password" id="password" class="form-control form-control-lg form-control-title " type="text" placeholder="" autocomplete="off" />
        @error('password')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>
        @endif
            <br/>
          <button class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>

    </div>

    </div>
  </x-layout>
