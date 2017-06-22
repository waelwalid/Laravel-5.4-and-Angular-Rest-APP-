<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Api_AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials' , "code" => 401], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token' , "code" => 500], 500);
        }
        // all good so return the token
        return response()->json(["msg" => compact('token') , "code" => 200]);
    }


    public function getAuthenticatedUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
}
