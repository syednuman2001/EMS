  <x-layout>
    <div class="container py-md-2">
          <div class=" col-lg-10 py-2">
            <a href="/adminpanel-user" class="btn btn-sm btn-primary mr-5 mb-2 ml-2" >User List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-org" class="btn btn-sm btn-primary mr-5 mb-2" >Organizer List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-event" class="btn btn-sm btn-primary mr-5 mb-2" >Event List <i class="fa fa-calendar" aria-hidden="true"></i></a>
        <a href="/adminpanel-pending" class="btn btn-sm btn-primary mr-5 mb-2" >Pending Event <i class='fas fa-clock'></i></a>
        <a href="/adminpanel-liked" class="btn btn-sm btn-primary mr-5 mb-2" >Liked Event <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

            <h4> <u class="text-secondary">Event List</u></h4>
            <br>

            @foreach($events as $e)
            <div class="list-group">
                <a  href="event/{{$e->id}}" class="list-group-item list-group-item-action py-2 ">

                    <strong><img style="width: 32px; height: 32px; border-radius: 16px" src="{{URl('images/profile.jpg')}}"/>
                        {{ $e->title }}
                        <br/> <small class="py-2 mr-2"> Posted by: <i  class="text-success"> <u>{{ $e->user->username }}</u></i> at <u class="text-secondary ml-1">{{ $e->created_at->format('j/n/Y')}}</u></small>
                        <br/> <small class="py-2 mr-2"> City: <i class="text-primary"> {{ $e->City }}</i></small>
                        <br/> <small class="py-2 mr-2"> Date: <i class="text-primary"> {{ $e->Date }}</i></small>
                    </strong>
                    <strong>

                        <span class="pt-2">
                            <a href="/edit-event/{{$e->id}}" class="text-primary mr-2 float-right" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                            <form action="/event-delete/{{$e->id}}" method="POST">
                               @csrf
                               @method('delete')
                               <button type="submit" class="delete-post-button text-danger float-right mr-2 border-0 " data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                          </span>
                    </strong>
                </a>
            </div>


            <br/>
        @endforeach

        {!! $events->render() !!}
          </div>
        </div>

  </x-layout>
