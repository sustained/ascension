<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\CssSelector\Parser\Token;

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
        try {
            return $this->respondWithToken(auth()->refresh());
        } catch (TokenExpiredException $e) {
            return response()->json([
                'reason' => 'expired',
                'message' => 'Unable to refresh token using expired token.'
            ], 422);
        } catch (TokenBlacklistedException $e) {
            return response()->json([
                'reason' => 'blacklisted',
                'message' => 'Unable to refresh token using blacklisted token.'
            ], 422);
        } catch (JWTException $e) {
            return response()->json([
                'reason' => 'errored',
                'message' => $e->getMessage()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'reason' => 'unknown',
                'message' => 'Unable to refresh token due to unknown error.'
            ], 500);
        }
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
