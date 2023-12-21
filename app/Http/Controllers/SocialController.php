<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SocialController extends Controller
{ 
    public function submit(Request $request)
    {
        $requestData = $request->all();
        $response = Http::post("https://reqres.in/api/register", [
            'email' => $requestData['email'],
            'password' => $requestData['password'],
        ]);

        return $response->body();
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            $existingUser = User::where('email', $user->getEmail())->first();
            
            if (!$existingUser) {
                // Create a new user if not found
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'google_id' => $user->getId(),
                    'avatar' =>$user->getAvatar(),
                ]);
                
                //Auth::home($newUser);
                return "user login successfully";
            } else {
                // Update existing user with google_id if not already present
                if (!$existingUser->google_id) {
                    $existingUser->update([
                        'google_id' => $user->getId(),
                    ]);
                }
               // print_r($existingUser);
                //die();
              //  Auth::home($existingUser);
                return "user login successfully";
            }
            
            //return redirect()->route('/home')->with('error', 'Authentication failed. Please try again.');// Redirect to your desired route after login
        } catch (\Throwable $th) {
            // Handle exceptions if needed
        }
    }
}
