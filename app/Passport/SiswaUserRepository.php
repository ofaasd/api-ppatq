<?php
namespace App\Passport;

use App\Models\RefSiswa;
use Laravel\Passport\Bridge\User;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use Laravel\Passport\Bridge\User as PassportUser;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

class SiswaUserRepository implements UserRepositoryInterface
{
    public function getUserEntityByUserCredentials(
        $username, $password, $grantType, ClientEntityInterface $client
    ) {
        $siswa = RefSiswa::where('no_induk', $username)->first();

        if (! $siswa || $siswa->kode !== $password) {
            return;
        }

        return new PassportUser($siswa->getAuthIdentifier());
    }
}