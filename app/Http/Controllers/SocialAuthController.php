<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;
use App\User;

class SocialAuthController extends Controller
{
    public function redirect($provider)
	 	{
	     	return Socialite::driver($provider)->redirect();
	 	}
	public function callback($provider)
	 	{
		    $getInfo = Socialite::driver($provider)->user(); 
		    $user = $this->createUser($getInfo,$provider); 
		    auth()->login($user); 
		    return redirect()->to('/home');
	 	}
	function createUser($getInfo,$provider){
	$user = User::where('provider_id', $getInfo->id)->orwhere('email',$getInfo->email)->first();
	if (!$user) {
	    $user = User::create([
	         'name'     => $getInfo->name,
	         'email'    => $getInfo->email,
	         'provider' => $provider,
	         'provider_id' => $getInfo->id
	     ]);
	   }
	   return $user;
	 }
}
