<?php
declare(strict_types=1);


namespace App\GraphQL\Mutations;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\ResolveInfo;
use Tymon\JWTAuth\Exceptions\JWTException;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterMutation
{
    /**
     * @param null $rootValue
     * @param array $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return array
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::create([
            'name' => $args['input']['name'],
            'email' => $args['input']['email'],
            'password' => bcrypt($args['input']['password']),
        ]);

        $token = JWTAuth::fromUser($user);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

}
