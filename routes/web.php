<?php
use App\Events\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\EventPostController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//User Routes

// syed_numan_raza    snake-case
// syedNumanRaza        camel-case
// SyedNumanRaza        Pascal-case
// syed-numan-raza          for routes only

Route::get('/', [UserController::class, 'homePage'])->name('home');

Route::get('/profile',[UserController::class, 'Profile' ]);
Route::get('/user-profile',[UserController::class, 'UserProfile' ]);
Route::get('/admin-profile',[UserController::class, 'adminProfile' ]);
Route::get('/edit-org-profile/{auth()->user()->id}', [UserController::class, 'OrgshowEditForm'])->name('OrgshowEditForm');

Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('userDashboard');
Route::get('/admin-dashboard', [UserController::class, 'adminDashboard'])->name('adminDashboard');

Route::get('/adminpanel-user', [UserController::class, 'AdminPanelUser'])->name('AdminPanelUser');
Route::get('/adminpanel-org', [UserController::class, 'AdminPanelOrg'])->name('AdminPanelOrg');
Route::get('/adminpanel-event', [UserController::class, 'AdminPanelEvent'])->name('AdminPanelEvent');
Route::get('/adminpanel-pending', [UserController::class, 'AdminPanelPending'])->name('AdminPanelPending');
Route::get('/adminpanel-liked', [UserController::class, 'AdminPanelLiked'])->name('AdminPanelLiked');


Route::get('/signup', [UserController::class, 'signup'])->middleware('guest');
Route::post('/signup-submit', [UserController::class, 'signupSubmit'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login-submit', [UserController::class, 'loginSubmit'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Manage Users

Route::delete('/user-delete/{user}', [UserController::class, 'delete']);

Route::get('/edit-profile/{user}', [UserController::class, 'showEditForm'])->name('showEditForm');

Route::put('/profile-updated/{user}',[UserController::class, 'saveUpdate']);

// Manage Events

Route::delete('/event-delete/{event}', [EventPostController::class, 'delete']);

Route::get('/edit-event/{event}', [EventPostController::class, 'eventEditForm'])->name('eventEditForm');

Route::put('/event-updated/{event}',[EventPostController::class, 'eventUpdate']);

Route::get('/accept-event/{id}', [EventPostController::class, 'eventApprove']);

Route::get('/reject-event/{id}', [EventPostController::class, 'eventReject']);

Route::get('/liked/{id}', [EventPostController::class, 'like']);

Route::delete('/liked-delete/{id}', [EventPostController::class, 'likeDelete']);





// Forgot Password


Route::get('/forgot-password', [UserController::class,'forgotPassword'])->middleware('guest');


Route::post('/forgot-password-submit', function (Request $request) {
             $request->validate(['email' => 'required|email']);
             $status = Password::sendResetLink(
             $request->only('email')
                );

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
            })->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
            return view('reset-password', ['token' => $token]);
            })->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {

            $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
             ]);

            $status = Password::reset(
               $request->only('email', 'password', 'password_confirmation', 'token'),
                  function (User $user, string $password) {
                   $user->forceFill([
                   'password' => Hash::make($password)
                   ])->setRememberToken(Str::random(60));

                   $user->save();

                   event(new PasswordReset($user));
                   }
                   );

             return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
             })->middleware('guest')->name('password.update');



// Event Post Routes
Route::get('/post-event',[EventPostController::class, 'showCreateForm' ])->middleware('auth');
Route::post('/post-event',[EventPostController::class, 'saveNewPost' ])->middleware('auth');
Route::get('/event/{id}',[EventPostController::class, 'singleEvent']);
Route::get('/org/{user}',[EventPostController::class, 'singleOrganizer']);

Route::get('/search/{term}',[EventPostController::class, 'search']);




// Chat Routes


Route::post('/send-chat-message', function (Request $request) {
    $formFields = $request->validate([
      'textvalue' => 'required'
    ]);

    if (!trim(strip_tags($formFields['textvalue']))) {
      return response()->noContent();
    }

    broadcast(new ChatMessage(['username' =>auth()->user()->username, 'textvalue' => strip_tags($request->textvalue)]))->toOthers();
    return response()->noContent();

  });
