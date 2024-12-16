<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function userDashboard() {
        if (auth()->check()) {

            if(auth()->user()->role === 'organizer') {
                return view('dashboard')->with('events',Post::where('user_id', auth()->id())->paginate(5));
            } elseif (auth()->user()->role === 'user') {
                return view('dashboard')->with('events', Post::where('Status','=','active')->paginate(5));
            } else {
                return redirect('/admin-dashboard');
            }

        } else {
            return view('login');
        }
     }



     public function adminDashboard() {
        if (auth()->check()) {

            $totalUsers = User::where('role', '=', 'user')->count();
            $totalOrganizers = User::where('role', '=', 'organizer')->count();
            $totalEvents = Post::where('status','=','active')->count();

            return view('admin-dashboard', compact('totalUsers','totalOrganizers','totalEvents'));
        }else {
            return redirect()->back()->with('failure', "You don't have access to this route.");
        }
    }


     public function AdminPanelUser() {

    if(auth()->user()->role === 'admin') {
        return view('adminpanel-user')->with('users', User::where('role', '=', 'user')->paginate(5));
    }}

     public function AdminPanelOrg() {

    if(auth()->user()->role === 'admin') {
        return view('adminpanel-org')->with('users', User::where('role', '=', 'organizer')->paginate(5));

    }}

     public function AdminPanelEvent() {

    if(auth()->user()->role === 'admin') {
        return view('adminpanel-event')->with('events', Post::where('Status','=','active')->paginate(5));

    }}

    public function AdminPanelPending() {

        if(auth()->user()->role === 'admin') {
            return view('adminpanel-pending')->with('events', Post::where('Status','=','pending')->paginate(5));

        }}


    public function AdminPanelLiked() {

        if(auth()->user()->role === 'admin') {
            return view('adminpanel-liked')->with('post_likes', PostLike::paginate(5));

        }}






     public function Profile() {
        return view('profile')->with('events', Post::where('user_id', auth()->id())->get() );
    }

    public function adminProfile() {
        return view('admin-profile');
    }

    public function UserProfile() {
        return view('user-profile')->with('post_likes', PostLike::where('user_id', auth()->id())->get() );
    }


    public function loginSubmit(Request $request){
        // validation
        $incomingFields = $request->validate([

            'username' => 'required',
            'password' => 'required'

        ]);

        if (auth()->attempt(['username' => $incomingFields['username'], 'password'=> $incomingFields['password']])) {

           // For request cookie
            $request->session()->regenerate();

            // redirect and success message

            if(auth()->user()->role === 'admin') {
                return redirect('/admin-dashboard')->with('success','You are succesfully logged in.');
            }

            return redirect('/dashboard')->with('success','You are succesfully logged in.');

        } else {
            return redirect()->back()->with('failure', 'Invalid login.');
    }
}



    //Registration

    public function signupSubmit (Request $request){

        //Validation
        $incomingFields = $request->validate([
            'username' => ['required', 'min:4', 'max:20', Rule::unique('users', 'username' )],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        //password encryption
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $incomingFields['role'] = $request->role;
        $incomingFields['address'] = $request->address;

        // Save user in database
        $user = User::create($incomingFields);
        // Redirect user to login
        auth()->login($user);
        return redirect('/dashboard')->with('success', 'Thank you for creating an account');
    }


    public function login() {
        if (auth()->check()) {
            return view('dashboard');
        }
         else{
        return view('login');
     }
    }


     public function signup() {
        if (auth()->check()) {
            return view('dashboard');
        } else {
            return view('signup');
        }
     }


     public function homePage() {
             return view('home')->with('events',  Post::where('Status','=','active')->paginate(5) );
    }

    public function logout(){
        auth()->logout();
        return redirect('/login')->with('success','You are succesfully logged out.');
    }


    // Forgot password

    public function forgotPassword () {

        return view('forgot-password');
    }

// Delete User

    public function delete(User $user) {
        $user->delete();

        return redirect()->back()->with('success','Profile Successfully Deleted.');
    }


    public function showEditForm(User $user) {

        return view('edit-profile', ['user' => $user]);
    }


    public function saveUpdate(User $user, Request $request) {

        $incomingFields = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required'

        ]);

        $incomingFields['username'] = strip_tags($incomingFields['username']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['password'] = bcrypt($incomingFields['password']);


        $user->update($incomingFields);


        return redirect()->back()->with('success', 'Profile Successfully Updated');
    }


    //Edit Organizer Profile

    public function OrgshowEditForm(User $user) {

        return view('edit-profile', ['user' => $user]);
    }


}






