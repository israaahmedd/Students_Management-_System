<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Notifications\UserNotification;

use Illuminate\Support\Facades\Notification;

class LoginController extends Controller
{
   
// public function sendNotification(){
//     $user = Auth::user();
//     Notification::send($user,new UserNotification($user->id));


// }
   
    // Show the login form
    public function indexLogin()
    {
        return view('Auth.login');
    }

    // Handle login logic
    public function handelLogin(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        // Attempt to log the user in
        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Check if authentication was successful
        if ($isLogin) {
               $user = Auth::user();

            // Send notification to the logged-in user
            $user->notify(new UserNotification($user->id));
          return redirect()->route('index');
        } else {
 
            return redirect()->back();
        
        }
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('index.login');
    }
}

