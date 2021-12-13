<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
     public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser= User::where('facebook_id',$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/home');
        }else{
            $newUser = new User;
            $newUser->name=$user->name;
            $newUser->email=$user->email;
            $newUser->facebook_id=$user->id;
            $newUser->password=bcrypt('12345678');
            $newUser->save();
            return redirect('/home');
        }
    }
}
