<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class AuthController extends Controller
{

    function index(){
        return view('auth.index');
    }

    function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callback(){
        $user = Socialite::driver('google')->user();
        $id =$user->id;
        $email =$user->email;
        $name = $user->name;

        $check = User::where('email', $email)->count();
        if($check > 0){
            $user = User::updateOrCreate(
                ['email'=> $email],
                [
                    'name' => $name,
                    'google_id'=>$id
                ]);
            return '<h1>Selamat Anda Sudah Masuk</h1>';
        }else{
            return redirect()->to('auth')->with('error' ,'your account dissalowed login');
        }


    }}
