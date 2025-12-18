<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Str;
use Validator;

class GithubController extends Controller
{
    private $socialite;
    private $user;

    public function __construct(Socialite $socialite, User $user)
    {
        $this->socialite = $socialite;
        $this->user = $user;
    }

    public function redirectToProvider(): RedirectResponse
    {
        try {
            return $this->socialite::driver('github')
                ->scopes(['user:email', 'repo', 'write:repo_hook'])
                ->redirect();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback(): RedirectResponse
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

        $user = User::withTrashed()->firstOrNew(['email' => $email]);

        if ($user->trashed()) {
            $user->restore();
        }

        if (!$user->exists) {
            $user->name = $name;
            $user->email_verified_at = now();
            $user->password = Hash::make(Str::random(10));
            $user->saveOrFail();
        }

        Auth::login($user, true);

        $user->github_access_token = encrypt($socialiteUser->token);
        $user->github_refresh_token = $socialiteUser->refreshToken
            ? encrypt($socialiteUser->refreshToken)
            : null;
        $user->github_token_expires_at = $socialiteUser->expiresIn
            ? now()->addSeconds($socialiteUser->expiresIn)
            : null;
        $user->save();

        flash()->success(__('auth.logged_in'));

        return redirect()->route('my.show');
    }

    private function sendFailedResponse($msg = null): RedirectResponse
    {
        flash()->error($msg ? $msg : __('auth.provider_fails'));

        return redirect()->back()->withInput();
    }

    private function validator(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
}
