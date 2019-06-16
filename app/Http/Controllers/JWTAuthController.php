<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JWTAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | min: 6 '
        ]);

        $user = User::create([
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
                'error' => 'You could not be logged in with the provided credentials, please try again.'
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
        return response()->json(auth()->user()->only(['id', 'name', 'email']));
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
            'expires_in'   => auth()->factory()->getTTL() * 60
            // 'user' =>  $this->guard()->user()
        ]);
    }
}
