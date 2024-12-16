<x-layout>
    <div class="container py-md-2">
          <div class="col-lg-7 py-2">
        <h2 class="display- text-primary"> Events </h2>
        <br/>
        @if(count($events) === 0)
        <img class="image" style="width: 170%" src="{{URl('images/dashboard.jpg')}}">
         @endif
            @foreach($events as $e)
            <div class="list-group">
                <a  class="list-group-item list-group-item-action py-2">
                    <strong>{{ $e->title }} </strong> in <strong>{{ $e->City }} </strong> at {{ $e->Date }}

                </a>
            </div>
            <br/>
            @endforeach


        {!! $events->render() !!}
          </div>
        </div>
      </div>
  </x-layout>
