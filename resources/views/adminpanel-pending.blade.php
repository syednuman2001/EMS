<x-layout>
    <div class="container py-md-2">
          <div class=" col-lg-10 py-2">
            <a href="/adminpanel-user" class="btn btn-sm btn-primary mr-5 mb-2 ml-2" >User List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-org" class="btn btn-sm btn-primary mr-5 mb-2" >Organizer List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-event" class="btn btn-sm btn-primary mr-5 mb-2" >Event List <i class="fa fa-calendar" aria-hidden="true"></i></a>
        <a href="/adminpanel-pending" class="btn btn-sm btn-primary mr-5 mb-2" >Pending Event <i class='fas fa-clock'></i></a>
        <a href="/adminpanel-liked" class="btn btn-sm btn-primary mr-5 mb-2" >Liked Event <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

            <h4> <u class="text-secondary">Pending Events</u></h4>
            <br>

            <table class="table ">
                <thead>
                    <tr>
                        <th> <u> Event </u> </th>
                        <th> <u> City </u> </th>
                        <th> <u> Date </u> </th>
                        <th> <u> Status </u> </th>
                        <th> <u> Approval </u> </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($events as $e)
                    <tr>
                        <td> <a href="event/{{$e->id}}"> <h6 class="text-secondary"><b>{{ $e->title }}</b></h6> </a> </td>
                        <td> {{ $e->City }} </td>
                        <td> {{ $e->Date }}</td>
                        <td> {{ $e->Status }} </td>
                        <td><a href="{{url('accept-event',$e->id)}}" class="btn btn-sm btn-success mr-1 mb-1" >Accept</a>
                            <a href="{{url('reject-event',$e->id)}}" class="btn btn-sm btn-danger  mb-1" >Reject</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @if(count($events) === 0)
            <img class="image" style="width: 100%; height:350px"  src="{{URl('images/dashboard.jpg')}}">
            @endif
        {!! $events->render() !!}
          </div>
        </div>

  </x-layout>
