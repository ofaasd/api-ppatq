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

        $server = $this->app->get(AuthorizationServer::class);

        $userGrant = new PasswordGrant(
            app(UserRepository::class),
            app(RefreshTokenRepository::class),
            new \DateInterval('P999Y') // access token lifetime: 999 years
        );
        $server->enableGrantType($userGrant, new \DateInterval('P999Y')); // refresh token lifetime: 999 years

    }

}
