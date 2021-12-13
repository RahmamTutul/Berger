<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebookCallback(){
        $user = Socialite::driver('github')->user();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('/backend/pages/index');
    }
   
}
