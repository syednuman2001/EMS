<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/post-event" method="POST">
          @csrf
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title')}}" name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror

        </div>

        <div class="form-group">
            <label for="post-City" class="text-muted mb-1"><small>City</small></label>
            <input value="{{old('City')}}" name="City" id="post-City" class="form-control form-control-lg form-control-City" type="text" placeholder="" autocomplete="off" />
        @error('City')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="post-Date" class="text-muted mb-1"><small>Date</small></label>
            <input value="{{old('Date')}}" name="Date" id="post-Date" class="form-control form-control-lg form-control-Date" type="text" placeholder="DD/MM/YYYY" autocomplete="off" />
        @error('Date')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>

          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Description</small></label>
            <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text" style="height: 190px">{{old('body')}}</textarea>
            @error('body')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>

          <button class="btn btn-primary">Save New Event</button>
        </form>
      </div>
  </x-layout>
