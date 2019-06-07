<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kronthto\LaravelOAuth2Login\OAuthProviderService;

class LoginController extends Controller
{
    /**
     * Function to login user using a-capella.ch OAuth2 server.
     */
    public function loginOAuth(OAuthProviderService $oauthService, Request $request)
    {
        // Get the access token from the session that was requested from a-capella.ch
        $auth = $request->session()->get(config('oauth2login.session_key'));

        // If there's no access token, redirect to the OAuth2 login page from a-capella.ch
        if (! $auth) {
            $authorizationUrl = $oauthService->getProvider()->getAuthorizationUrl();
            session()->put(config('oauth2login.session_key_state'), $oauthService->getProvider()->getState());

            return redirect()->guest($authorizationUrl);
        }

        // Check if the access token is not expired, and refresh it if it is
        if ($auth->hasExpired() && $auth->getRefreshToken()) {
            $auth = $oauthService->getProvider()->getAccessToken('refresh_token', [
                'refresh_token' => $auth->getRefreshToken(),
            ]);

            $oauthService->persistAccessToken($auth);
        }

        // Get the user information
        $resourceOwner = $oauthService->getTokenUser($auth)->toArray();
        // Get the user in the database where the drupal_id is the one in the token
        $user = User::where('drupal_id', (int) $resourceOwner['sub'])->first();
        // Create the user if the user never signed in with a-capella.ch
        if (! $user) {
            $user = User::create([
                'name'      => $resourceOwner['name'],
                'email'     => $resourceOwner['email'],
                'drupal_id' => (int) $resourceOwner['sub'],
                'password'  => Hash::make(str_random(32)),
            ]);
        }

        // Login the user
        Auth::login($user);

        // Redirect to the home page
        return redirect('/');
    }

    /**
     * Function to logout an user.
     */
    public function logout(OAuthProviderService $oauthService, Request $request)
    {
        // Get the access token from OAuth
        $auth = $request->session()->get(config('oauth2login.session_key'));

        // If it exists, remove it
        if ($auth) {
            $request->session()->remove(config('oauth2login.session_key'));
        }

        Auth::logout();

        return redirect('/');
    }

    /**
     * Function to login user that was created from the app.
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt(['name' => $validated['name'], 'password' => $validated['password'], 'drupal_id' => null])) {
            return redirect('/');
        }
    }
}
