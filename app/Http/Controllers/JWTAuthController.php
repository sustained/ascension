<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class JWTAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'legalese' => ['accepted']
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'You could not be logged in with the provided credentials, please try again.'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'You were successfully logged out.']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function me()
    {
        if (auth()->check()) {
            return response()->json(auth()->user()->only(['id', 'name', 'email']));
        } else {
            return response()->json(['message' => 'User not authorised'], 401);
        }
    }

    public function recovery()
    { }

    public function reset()
    { }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'user' =>  auth()->user()
        ]);
    }
}
