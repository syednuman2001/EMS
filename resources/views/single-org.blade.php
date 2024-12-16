<x-layout>

    <div class="container py-md-5 container--narrow">
        <p><small><strong> <a href="javascript:history.back()">&laquo; Back </a></strong></small></p> <br/>

        <h2>
            <img   style="width: 50px; height: 50px; border-radius: 16px " src="{{URl('images/profile.jpg')}}" />
            {{$users->username}}
        </h2>
        <div class="list-group">
          <br>
          <li  class="text-small mb-2"> Email:  {{$users->email}}</li>
          <li  class="text-small mb-2"> Address:  {{$users->address}}</li>
        </div>
      </div>

  </x-layout>
