<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $avatar =$user->avatar;
        $check = User::where('email', $email)->count();
        if($check > 0){
            $avatar_file = $id . ".jpg";
            $filecontent = file_get_contents($avatar);
            File::put(public_path("assets/images/faces/$avatar_file"),$filecontent);
            $user = User::updateOrCreate(
                ['email'=> $email],
                [
                    'name' => $name,
                    'google_id'=>$id,
                    'avatar'=>$avatar_file
                ]);
                Auth::login($user);
            return redirect()->to('dashboard');
        }else{
            return redirect()->to('auth')->with('error' ,'your google account doesnt have permission to login');
        }


    }
function logout(){
Auth::logout();
return redirect()->to('auth');
}
}
