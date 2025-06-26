<?php

namespace App\Providers;

use DateInterval;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Bridge\UserRepository;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use App\Passport\SiswaUserRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        'App\Model' => 'App\Policies\Modelpolicy'
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Konfigurasi masa berlaku token
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        $server = $this->app->get(AuthorizationServer::class);

        $userGrant = new PasswordGrant(
            app(UserRepository::class),
            app(RefreshTokenRepository::class),
            new \DateInterval('P15D')
        );
        $server->enableGrantType($userGrant, new \DateInterval('PT8H'));

        // Password grant untuk siswa
        // $siswaGrant = new PasswordGrant(
        //     app(SiswaUserRepository::class),
        //     app(RefreshTokenRepository::class),
        //     new \DateInterval('P15D')
        // );
        // $server->enableGrantType($siswaGrant, new \DateInterval('PT2H'));
    }

}
