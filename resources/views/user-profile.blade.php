<x-layout>

    <div class="container py-md-5 container--narrow">
        <h2>
            <img   style="width: 50px; height: 50px; border-radius: 16px " src="{{URl('images/profile.jpg')}}" />
            {{auth()->user()->username}}
        </h2>
        <div class="list-group mb-2">
          <br>
          <li  class="text-small mb-2"> Email:  {{auth()->user()->email}}</li>
          <li  class="text-small mb-2"> Address:  {{auth()->user()->address}}</li>
          <li  class="text-small"> Liked Events: {{$post_likes->count()}}</li>
        </div>
        @foreach($post_likes as $l)
        <div class="list-group col-lg-7">
            <a  class="list-group-item list-group-item-action py-2 mb-2">
                <strong>{{ $l->events->title }} </strong> in <strong>{{ $l->events->City }} </strong> at <strong>{{ $l->events->Date }}</strong> is Liked by <strong>You</strong>
                <form action="/liked-delete/{{$l->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete-post-button text-danger float-right  border-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                 </form>
            </a>

        </div>

        @endforeach
      </div>

  </x-layout>
