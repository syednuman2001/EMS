<x-layout>
    <div class="container py-md-2">
          <div class=" col-lg-10 py-2">
            <a href="/adminpanel-user" class="btn btn-sm btn-primary mr-5 mb-2 ml-2" >User List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-org" class="btn btn-sm btn-primary mr-5 mb-2" >Organizer List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-event" class="btn btn-sm btn-primary mr-5 mb-2" >Event List <i class="fa fa-calendar" aria-hidden="true"></i></a>
        <a href="/adminpanel-pending" class="btn btn-sm btn-primary mr-5 mb-2" >Pending Event <i class='fas fa-clock'></i></a>
        <a href="/adminpanel-liked" class="btn btn-sm btn-primary mr-5 mb-2" >Liked Event <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>

            <h4> <u class="text-secondary">Organizer List</u></h4>
            <br>

            @foreach($users as $e)
            <div class="list-group">
                <a  class="list-group-item list-group-item-action py-2 ">

                    <strong><img style="width: 32px; height: 32px; border-radius: 16px" src="{{URl('images/profile.jpg')}}"/>
                        {{ $e->username }}
                        <br/> <small class="py-2 mr-2"> Role: <i class="text-success">{{ $e->role }}</i></small>
                        <br/> <small class="py-2 mr-2"> Email: <i class="text-primary"> {{ $e->email }}</i></small>
                        <br/> <small class="py-2 mr-2"> Address: <i class="text-primary"> {{ $e->address }}</i></small>
                    </strong>
                    <strong>

                        <span class="pt-2">
                            <a href="/edit-profile/{{$e->id}}" class="text-primary mr-2 float-right" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                            <form action="/user-delete/{{$e->id}}" method="POST">
                               @csrf
                               @method('delete')
                               <button type="submit" class="delete-post-button text-danger float-right mr-2 border-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                          </span>

                    </strong>
                </a>
            </div>
            <br/>
        @endforeach

        {!! $users->render() !!}
          </div>
        </div>

  </x-layout>
