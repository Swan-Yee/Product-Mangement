<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginUsingGoogle(){
        return Socialite::driver('google')->redirect();
    }

    // Callback from Google
    public function callbackFromGoogle(){
        try {
            $user = Socialite::driver('google')->stateless()->user();

            $is_user = User::where('email', $user->getEmail())->first();

            if(!$is_user){
                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
                }
                else{
                    $saveUser = User::where('email',  $user->getEmail())->update([
                        'google_id' => $user->getId(),
                    ]);
                    $saveUser = User::where('email', $user->getEmail())->first();
                }

                Auth::loginUsingId($saveUser->id);

                return redirect()->route('home');
            }
            catch (\Throwable $th) {
                throw $th;
            }
    }
}
