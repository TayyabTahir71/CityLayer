<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        backpack_auth()->save($user);
        return redirect('/');
    }   
    public function signup(Request $request){


        $user = User::where('email', $request->email)->where('name', $request->name)->first();

        if(!$user){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'user',
            ]);

            backpack_auth()->save($user);
            return redirect('/');

        }else{
            return redirect('login');
        }

    }
}
