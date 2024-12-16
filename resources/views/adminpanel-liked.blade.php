<x-layout>
    <div class="container py-md-2">
          <div class=" col-lg-10 py-2">
            <a href="/adminpanel-user" class="btn btn-sm btn-primary mr-5 mb-2 ml-2" >User List <i class="fa fa-user" aria-hidden="true"></i></a>
            <a href="/adminpanel-org" class="btn btn-sm btn-primary mr-5 mb-2" >Organizer List <i class="fa fa-user" aria-hidden="true"></i></a>
            <a href="/adminpanel-event" class="btn btn-sm btn-primary mr-5 mb-2" >Event List <i class="fa fa-calendar" aria-hidden="true"></i></a>
            <a href="/adminpanel-pending" class="btn btn-sm btn-primary mr-5 mb-2" >Pending Event <i class='fas fa-clock'></i></a>
            <a href="/adminpanel-liked" class="btn btn-sm btn-primary mr-5 mb-2" >Liked Event <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

        <h4> <u class="text-secondary">Liked Event</u></h4>
            <br>
            @foreach($post_likes as $l)

            <div class="list-group">
                <a  class="list-group-item list-group-item-action py-2">
                    <strong>{{ $l->events->title }} </strong> is liked by <strong>{{$l->user->username}} </strong>
                </a>
                <form action="/liked-delete/{{$l->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete-post-button text-danger float-right mr-2 border-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                 </form>
            </div>
            <br/>
            @endforeach

            @if(count($post_likes) === 0)
            <img class="image"   src="{{URl('images/dashboard.jpg')}}">
             @endif

        {!! $post_likes->render() !!}

          </div>
        </div>

  </x-layout>
