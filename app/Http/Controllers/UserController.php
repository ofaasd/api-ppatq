<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Execeptions\HttpResponseException;
use App\Models\User;


class UserController extends Controller
{
    //
    public function register(UserRegisterRequest $request): JsonResponse{
        $data = $request->validated();

        if(User::where('email',$data['email'])->count() == 1){
            throw new HttpResponseException(response([
                "errors" => [
                    'Email' => [
                        'Email Already Exist'
                    ]
                ]
            ], 400));
        }

        $user = new User($data);
        $user->password = md5($data['password']);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(201);
    }
    public function login(UserLoginRequest $request): JsonResponse{

    }
}
