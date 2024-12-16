<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="logo" href="images/logo.png">
    <title>EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="/main.css" /> --}}
@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])
</head>
  <body class="bg-light mb-4">
    <header class="header-bar  mb-3 border-bottom bg-light">
      <div class="container d-flex flex-column flex-md-row  p-3 ">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-blue">
            <img  data-toggle="tooltip" data-placement="bottom" style="width: 40px; height: 35px; border-radius: 16px mr-5" src="{{URl('images/logo.png')}}"/>   Event Management System</a></h4>
            @auth


        <div class="flex-row my-3 my-md-0">
            @if(auth()->user()->role === 'organizer')
            <a href="/dashboard" class="btn btn-sm btn-primary mr-4" >Dashboard <i class="fas fa-tachometer-alt"></i></a>
            @elseif (auth()->user()->role === 'user')
            <a href="/dashboard" class="btn btn-sm btn-primary mr-4" >Dashboard <i  class="fas fa-tachometer-alt"></i></a>
            @endif

            @if(auth()->user()->role === 'admin')
            <a href="/admin-dashboard" class="btn btn-sm btn-primary mr-4" >Admin Panel <i class="fas fa-chart-bar"></i></a>
            @endif

            @if(auth()->user()->role === 'admin')
            <a href="/admin-profile" class="mr-4"><img style="width: 32px; height: 32px; border-radius: 16px" src="{{URl('images/profile.jpg')}}" /></a>
            @endif

            @if(auth()->user()->role === 'organizer')
                <a href="/post-event" class="btn btn-sm btn-success mr-4"> New Events <i class="fas fa-calendar-plus"></i></a>
            @endif

            @if(auth()->user()->role === 'user')
            <a href="#" class="text-primary mr-4 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
            @endif

            @if(auth()->user()->role === 'user')
            <span class="text-primary mr-4 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
            @endif

            @if(auth()->user()->role === 'user')
            <a href="/user-profile" class="mr-4"><img style="width: 32px; height: 32px; border-radius: 16px" src="{{URl('images/profile.jpg')}}" /></a>
            @endif



            @if(auth()->user()->role === 'organizer')
            <span class="text-primary mr-4 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
            @endif


            @if(auth()->user()->role === 'organizer')
            <a href="/profile" class="mr-4"><img style="width: 32px; height: 32px; border-radius: 16px" src="{{URl('images/profile.jpg')}}" /></a>
            @endif

            <form action="/logout" method="POST" class="d-inline">
             @csrf
               <button class="btn btn-sm btn-secondary">Sign Out</button>
            </form>
          </div>
          @else

        <h5> <a href="/login" class="link-primary">Login</a> </h5>
        <h5> <a href="/signup" class="link-primary ml-5">Signup</a> </h5>


        @endauth

      </h5>
    </header>
    <!-- header ends here -->


    {{-- login-logout message --}}

    @if (session()->has('success'))
    <div class="container container--narrow">
        <div class="alert alert-success text-center">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <small><i class="fa fa-times" aria-hidden="true"></small></i>
            </button>
        </div>
    </div>
    @endif

    @if (session()->has('failure'))
    <div class="container container--narrow">
        <div class="alert alert-danger text-center">
            {{session('failure')}}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <small><i class="fa fa-times" aria-hidden="true"></small></i>
            </button>
        </div>
    </div>
    @endif

    {{$slot}}

    @auth
    <div data-username="{{auth()->user()->username}}"  id="chat-wrapper" class="chat-wrapper right shadow border-top border-left border-right"></div>
    @endauth


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip()
    </script>


  </body>

    {{-- Footer begin --}}
<footer>
    <style>
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #F8F9FA;
      opacity:1.0;
      color: white;
      text-align: center;
    }
    </style>
  <div class="footer  text-center small text-muted py-1" style="padding-top: 0px;">
    <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/" class="text-muted">Event Management System</a>. All rights reserved.</p>
    </div>
</footer>
    {{-- Footer end --}}

</html>
