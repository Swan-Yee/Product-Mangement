<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function loginUsingFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    // Callback from Facebook
    public function callbackFromFacebook(){
        try {
            $user = Socialite::driver('facebook')->user();

            if($user->getEmail())
                {
                    $is_user = User::where('email', $user->getEmail())->first();

                    if(!$is_user){
                        $saveUser = User::updateOrCreate([
                            'facebook_id' => $user->getId(),
                        ],[
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        // 'email' => 'swan@gmail.com',
                        'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);
                    }
                    else{
                        $saveUser = User::where('email',  $user->getEmail())->update([
                            'facebook_id' => $user->getId(),
                        ]);
                        $saveUser = User::where('email', $user->getEmail())->first();
                    }

                    Auth::loginUsingId($saveUser->id);

                    return redirect()->route('home');
                }
                else{
                    return redirect('login')->with('error', 'Something wrong with your email. Try Again Later');
                    // return "Something wrong with your email. Try Again Later";
                }
            }
            catch (\Throwable $th) {
                throw $th;
            }
    }
}
