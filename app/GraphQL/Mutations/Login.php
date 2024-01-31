<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;



final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // Attempt to authenticate the user
        if(!$token = JWTAuth::attempt($args)) {
            throw new \Error('Invalid credentials.');
        }
        // return ttl and token
        $user = Auth::user();
        $ttl=JWTAuth::factory()->getTTL();

        // Return the JWT token and authenticated user
        return ['token' => $token, 'ttl' => $ttl, 'user' => $user];
    }
}
