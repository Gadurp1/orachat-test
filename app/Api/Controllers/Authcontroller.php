<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;
use Auth;
use Validator;
use App\User;

class AuthController extends \App\Http\Controllers\Controller
{
    /**
     * Authenticate user and return a token
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        $user=Auth::user();
        $user->token=$token;
        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Register new user and return a token
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'email' => 'email|required|unique:users',
          'name' => 'required',
          'password' => 'required|min:6',
          'confirm' => 'required|same:password'
        ]);

        if($validator->fails()) {
          return response()->json(['error' => true, 'data' => $validator->errors()->all()]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        // if no errors are encountered we can return a JWT
        $token = JWTAuth::fromUser($user);
        $user->token=$token;
        return response()->json(['success' => true, 'data' => $user]);
    }

}
