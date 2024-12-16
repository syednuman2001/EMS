<x-layout>

    <div class="container py-md-5 container--narrow">
        <h2>
            <img   style="width: 50px; height: 50px; border-radius: 16px " src="{{URl('images/profile.jpg')}}" />
            {{auth()->user()->username}}
           <small> <a href="/edit-profile/{{auth()->user()->id}}" class="text-primary small ml-4" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a></small>

        </h2>
        <div class="list-group">
          <br>
          <li  class="text-small mb-2"> Email:  {{auth()->user()->email}}</li>
          <li  class="text-small mb-2"> Address:  {{auth()->user()->address}}</li>
          <li  class="text-small"> Total Events: {{$events->count()}}</li>
        </div>

      </div>

  </x-layout>
