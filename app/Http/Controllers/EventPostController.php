<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\PostLike;
use Illuminate\Http\Request;
use App\Jobs\SendNewPostEmail;
use Illuminate\Support\Facades\Mail;

class EventPostController extends Controller
{

        public function search($term) {

            $events = Post::search($term)->get();

            return $events;

        }


        public function showCreateForm(){

            // login authentication for post creation

            return view('post-event');
        }


        // Post save

        public function saveNewPost(Request $request){
            $incomingFields = $request->validate(
            [
                'title' => 'required',
                'City' => 'required',
                'Date' => 'required',
                'body' => 'required',
                'Status' => 'pending',
            ]);
            //set Id, title and body
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['City'] = strip_tags($incomingFields['City']);
            $incomingFields['Date'] = strip_tags($incomingFields['Date']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);
            $incomingFields['user_id'] = auth()->id();
            $incomingFields['Status'] ='pending';


            //Post save in Databases

            $events = Post::create($incomingFields);

            return redirect("/dashboard")->with('success', 'New Event Successfully Posted!');
        }



        public function singleEvent(Post $id){
            return view('single-event')->with('events', $id );
        }

        public function singleOrganizer(User $user){
            return view('single-org')->with('users', $user );
        }


        // Manage Events

        public function delete(Post $event) {
            $event->delete();

            return redirect()->back()->with('success','Event Successfully Deleted.');
        }


        public function eventEditForm(Post $event) {

            return view('edit-event', ['event' => $event]);
        }


        public function eventUpdate(Post $event, Request $request) {

            $incomingFields = $request->validate([
                'title' => 'required',
                'City' => 'required',
                'Date' => 'required',
                'body' => 'required'
            ]);

            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['City'] = strip_tags($incomingFields['City']);
            $incomingFields['Date'] = strip_tags($incomingFields['Date']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);

            $event->update($incomingFields);

            return redirect('/adminpanel-event')->with('success', 'Event Successfully Updated');
        }

// Post Approval


        public function eventApprove($id) {
            $event = Post::find($id);

            $event->Status = 'active';

            $event->save();

            // Send Event Posting Mail
            dispatch(new SendNewPostEmail(['sendTo' => User::all()->where('role', '==', 'user')->where('address', '===', $event->City), 'title' => $event->title   ]));

            return redirect()->back()->with('success','Event Successfully Approved.');
    }

        public function eventReject($id) {
            $event = Post::find($id);

            $event->Status = 'reject';

            $event->save();

            return redirect()->back()->with('success','Event Successfully Rejected.');
}


// Event Like


        public function like($id){


            $post_id = $id;
            $user_id = auth()->user()->id;

            $exists = PostLike::where('user_id', $user_id)
                  ->where('post_id', $post_id)
                  ->orWhere(function ($query) use ($user_id, $post_id) {
                      $query->where('user_id', $user_id)
                            ->where('post_id', $post_id);
                  })
                  ->exists();

            if (!$exists) {


            PostLike::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'like' => 1 ]);


            return back()->with('success','Event Successfully Liked.' );

            } else {

            return back()->with('failure','Event Already Liked' );

            }

}


            public function likeDelete(PostLike $id) {
                 $id->delete();

            return redirect()->back()->with('failure','Like Successfully Deleted.');
            }



}



