<x-layout>
    <div class="container py-md-2">
          <div class=" col-lg-10 py-2">
        <a href="/adminpanel-user" class="btn btn-sm btn-primary mr-5 mb-2 ml-2" >User List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-org" class="btn btn-sm btn-primary mr-5 mb-2" >Organizer List <i class="fa fa-user" aria-hidden="true"></i></a>
        <a href="/adminpanel-event" class="btn btn-sm btn-primary mr-5 mb-2" >Event List <i class="fa fa-calendar" aria-hidden="true"></i></a>
        <a href="/adminpanel-pending" class="btn btn-sm btn-primary mr-5 mb-2" >Pending Event <i class='fas fa-clock'></i></a>
        <a href="/adminpanel-liked" class="btn btn-sm btn-primary mr-5 mb-2" >Liked Event <i class="fa fa-thumbs-up" aria-hidden="true"></i></a>


        <div class="container mt-4">
            <h1 class="display-6 text-primary"><u>Analytics</u></h1>

            <div class="row">
                <div class="col mt-3">
                <div class="card card-body bg-light text-success mb-5" style="width: 22rem">
                    <label class="text-secondary"><h5> Total Registered Users</h5></label>
                    <h2>{{ $totalUsers }}</h2>
                    <small><a href="/adminpanel-user">View</a></small>
                </div>
                <div class="card card-body bg-light text-success mb-3" style="width: 22rem">
                    <label class="text-secondary"><h5> Total Registered Organizers</h5></label>
                    <h2>{{ $totalOrganizers }}</h2>
                    <small><a href="/adminpanel-org">View</a></small>
                </div>
                </div>
                <div class="col mt-3">
                    <div class="card card-body bg-light text-success mb-5" style="width: 22rem">
                        <label class="text-secondary"><h5> Total Posted Events</h5></label>
                        <h2>{{ $totalEvents }}</h2>
                        <small><a href="/adminpanel-event">View</a></small>
                    </div>
                    </div>
            </div>
        </div>
          </div>
        </div>


  </x-layout>
