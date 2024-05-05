<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User; //sử dụng model Login
use Illuminate\Support\Facades\File;

class SocialController extends Controller
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
        
        $fileContents = file_get_contents($getInfo->getAvatar());
        File::put('public/front-end/images/' . $getInfo->getId() . ".jpg", $fileContents);
        return redirect()->to('/home');
    }
    function createUser($getInfo, $provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'fullName'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'username' => '',
                'dob' => '',
                'phone' => '',
                'houseNumber' => ,
                'street' => '',
                'villageId' => ,
                'roleId' => 2,
                'avatarUrl' => $getInfo->getId() . ".jpg",
                'avatar' => ''

            ]);
        }
        return $user;
    }

}
