<x-layout>
    <div class="container py-md-5 container--narrow">


            <div class="text-center">
                <h3 class="py-1">Hello <strong class="text-success">{{auth()->user()->username}}</strong>, Good to see you again!</h3>

                @if(auth()->user()->role === 'organizer')

                <h4 class="text-secondary">Now you can post <b class="text-dark"> Events</b> on EMS.</h4>
                @endif

                @if(count($events) === 0)
                <img class="image" src="{{URl('images/dashboard.jpg')}}">
                @endif

            </div>



           <div class="container py-md-2">
            <div class="col-lg-8 py-2">
          <h2 class="display- text-primary"> Events</h2>
         <br/>
          <table class="table ">
			<thead>
				<tr>
					<th> <u> Event </u> </th>
					<th> <u> City </u> </th>
                    <th> <u> Date </u> </th>
                    <th> <u> Status </u> </th>
				</tr>
			</thead>
			<tbody>
                @foreach($events as $e)
				<tr >
					<td> <a href="event/{{$e->id}}"> <h6 class="text-secondary"><b>{{ $e->title }}</b></h6> </a> </td>
					<td> {{ $e->City }} </td>
					<td> {{ $e->Date }}</td>
                    <td> {{ $e->Status}} &nbsp;
                        @if(auth()->user()->role === 'user')
                        <a href="/liked/{{$e->id}}" ><span class="like border ml-4">Like</span></a>
                        @endif


                        @if(auth()->user()->role === 'organizer')
                          <span class="pt-2">
                            <form action="/event-delete/{{$e->id}}" method="POST">
                               @csrf
                               @method('delete')
                               <button type="submit" class="delete-post-button text-danger float-right border-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                          </span>
                        @endif
                    </td>
				</tr >


                @endforeach
			</tbody>
		</table>

          {!! $events->render() !!}
            </div>
          </div>
        </div>

      </div>
</x-layout>
