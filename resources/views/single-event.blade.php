<x-layout>
    <div class="container py-md-5 container--narrow">
        <p><small><strong> <a href="javascript:history.back()">&laquo; Back </a></strong></small></p> <br/>

        <div class="d-flex justify-content-between">
          <h2>{{$events->title}}</h2>
        </div>

        <p class="text-muted small mb-4">
          Posted by <i class="text-primary"><a href="/org/{{$events->user->id}}">{{$events->user->username}}</a> </i> on {{$events->created_at->format('j/n/Y')}} &nbsp; &nbsp; &nbsp; &nbsp;
        </p>

        <h5 class="display-6"><u> City:</u> &nbsp; <i class="text-muted"> {{$events->City}} </i> </h5>
        <br>
        <h5 class="display-6"><u> Date: </u> &nbsp; <i class="text-muted"> {{$events->Date}} </i> </h5>
        <br>
        <div class="body-content">
            <h5 class="display-6"><u> Detail:</u> &nbsp; <i class="text-muted">   {!!  $events->body !!} </i> </h5>
        </div>
      </div>

  </x-layout>
