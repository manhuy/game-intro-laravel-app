<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    /**
     * Check user login info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $token = $request->user()->createToken('auth_token')->plainTextToken;
            $cookie = cookie('token', $token, 60 * 24); // 1 day
            
            return $this->responseOK('Login successfully', ['user' => new UserResource($request->user())])->withCookie($cookie);
        }

        return $this->responseUnauthorized();
    }

    /**
     * Check user login info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function logout(Request $request) { 
        $request->user()->currentAccessToken()->delete();
        $cookie = cookie()->forget('token');

        return $this->responseOK('Logged out successfully!')->withCookie($cookie);
    }
}
