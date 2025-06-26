<?php

namespace App\Providers;
use DateInterval;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Bridge\UserRepository;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use Laravel\Passport\Bridge\RefreshTokenRepository;
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

        // Aktifkan password grant
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        // Enable password grant secara manual
        $this->app->get(AuthorizationServer::class)->enableGrantType(
            new PasswordGrant(
                $this->app->make(UserRepository::class),
                $this->app->make(RefreshTokenRepository::class),
                new DateInterval('P15D') // access token valid 15 hari
            ),
            new DateInterval('PT1H') // token TTL: 1 jam
        );
    }

}
