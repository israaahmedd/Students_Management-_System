<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexRegister(){
      
      return view('Auth.register');
    }
    public function handelRegister(Request $request){
     

      $data=$request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required',
      ], [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please provide a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters long.',
    ]);
      $data['password'] = Hash::make($data['password']);
        // return $data;
      $user=User::create($data);
      Auth::login($user);
        return view('Auth.login');

    }
}