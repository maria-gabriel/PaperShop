<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\User;
use Auth;

class SocialNetworkController extends Controller
{
    public function redirectToNetwork($socialNetwork){
    	return Socialite::driver($socialNetwork)->redirect();
    }

    public function handleNetwork($socialNetwork){
    	$socialUser = Socialite::driver($socialNetwork)->user();
    	//dd($socialUser);
    	$socialProfile = User::firstOrNew(["social_network" => $socialNetwork, "social_id" => $socialUser->getid()]);
        //dd($socialProfile->exists());
        $user = User::firstOrNew(["email" => $socialUser->getEmail()]);
        //if (!$socialProfile->exists()) {
            //if(!$user->exists()) {
                $user->name  = $socialUser->getName();
                $user->email = $socialUser->getEmail();
            //}
            $user->avatar = $socialUser->getAvatar();
	    	$user->social_id = $socialUser->getId();
            $user->social_network = $socialNetwork;
            $user->perfil_id = 2;
            $user->save();
        //}
        
        Auth::login($user);
        return redirect()->route('home');
    }
}
