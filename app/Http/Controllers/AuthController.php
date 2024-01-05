<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Str;

class AuthController extends Controller
{

    public function login(Request $request){

        $user = User::where('email', $request->email)->where('name', $request->name)->first();

        if($user){
            
            dd(backpack_user());
            return redirect('admin/dashboard');
        }else{
           return redirect('login');
        }

    }

    public function signuplater(){
        $temporaryName = 'citylayer_' . uniqid();
        $temporaryPassword = Str::random(12);

        $user=User::create([
            'name' => $temporaryName,
            'email' => '',
            'password' => $temporaryPassword,
            'role' => 'user',
        ]);
        backpack_auth()->login($user);
        return redirect('/');
    }   
    public function signup(Request $request){

        $customMessages = [
            'email.required' => 'Please provide an email address.',
            'email.email' => 'The email address is not valid.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ],$customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = strstr($request->email, '@', true);

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        backpack_auth()->login($user);
        return redirect('/');

    }
    
    public function signupUsername(Request $request){

        $customMessages = [
            'name.required' => 'Please provide an username.',
            'name.unique' => 'This username is already in use.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];

        Validator::extend('name', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\s]+$/', $value);
        });

        $validator = Validator::make($request->all(), [
            'name' => 'required|name|unique:users',
            'password' => 'required|confirmed',
        ],$customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        backpack_auth()->login($user);
        return redirect('/');

    }
}
