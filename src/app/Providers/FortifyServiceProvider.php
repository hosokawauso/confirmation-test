<?php

namespace App\Providers;

use App\Actions\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
/* use App\Http\Requests\LoginRequest; */
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(CreateNewUsers::class, CreateNewUser::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* Fortify::createUsersUsing(CreateNewUser::class);
            Fortify::registerView(function () {
                return view('auth.register');
            }); */

        Fortify::loginView(function () {
            return view('auth.login');
        });

        

        Fortify::authenticateUsing(function (Request $request) {

            /* $input = $request->only(['email', 'password']);

            $formRequest = app(LoginRequest::class);
            $formRequest->merge($input);
            $formRequest->setContainer(app())->validate();
            
            $user = User::where('email', $request->email)->first();

            if($user &&
               Hash::check($request->password, $user->password)) {
                return $user;
               }

            return null; */

            $request->validate([
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required'],
            ], [
                'email.required' => 'メールアドレスを入力してください',
                'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
                'password.required' => 'パスワードを入力してください',
            ]);
        
            $user = \App\Models\User::where('email', $request->email)->first();
        
            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            throw ValidationException::withMessages([
                'email' => ['メールアドレスまたはパスワードが正しくありません'],
            ]);

        });


        Ratelimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });
        
    }

        
}
