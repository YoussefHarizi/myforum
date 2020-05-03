<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\SocialAccountService;

class SocialAccountController extends Controller
{
    //
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(SocialAccountService $profileService, $provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $th) {
            return redirect()->to('login');
        }
        $authUser = $profileService->findOrCreate($user, $provider);

        auth()->login($authUser, true);
        return redirect()->to('home');
        // $user->token;
    }
}
