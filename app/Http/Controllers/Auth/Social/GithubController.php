<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Validator;
use Exception;

class GithubController extends Controller
{
    private $socialite;
    private $user;

    public function __construct(Socialite $socialite, User $user)
    {
        $this->socialite = $socialite;
        $this->user      = $user;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider()
    {
        try {
            return $this->socialite::driver('github')->scopes(['user:email'])->redirect();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback()
    {
        try {
            $socialiteUser = $this->socialite::driver('github')->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        $email = $socialiteUser->getEmail();
        $name = $socialiteUser->getName();
        $name = empty($name) ? $socialiteUser->getNickname() : $name;

        $validator = $this->validator(['email' => $email, 'name' => $name]);

        if ($validator->fails()) {
            return $this->sendFailedResponse();
        }

        return $this->loginOrCreateAccount($name, $email);
    }

    protected function loginOrCreateAccount($name, $email)
    {
        $userForAuth = User::firstOrNew(['email' => $email]);

        if (User::where('email', $email)->doesntExist()) {
            $deleteUser = User::withTrashed()->where('email', $email)->first();

            if ($deleteUser) {
                $deleteUser->restore();
                Auth::login($deleteUser, true);
                flash()->success(__('auth.logged_in'));
                return redirect()->route('my');
            }

            $userForAuth->name              = $name;
            $userForAuth->email_verified_at = now();
            $userForAuth->password          = Hash::make(random_bytes(10));

            $userForAuth->saveOrFail();
        }

        Auth::login($userForAuth, true);
        flash()->success(__('auth.logged_in'));

        return redirect()->route('my');
    }

    protected function sendFailedResponse($msg = null)
    {
        flash()->error($msg ?? __('auth.provider_fails'));
        return redirect()->back()->withInput();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
}
