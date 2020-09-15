<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AppAuthController extends Controller
{

        public $loginAfterSignUp = true;

        public function Applogin(Request $request)
        { $input = $request->only('email', 'password');
            $jwt_token = null; if (!$jwt_token = JWTAuth::attempt($input))
            {
                // your error code here
                return response()->json([ 'status' => 'invalid_credentials', 'message' => 'ungueltige Eingaben.', ], 401); }
               
                // okay
                return response()->json([ 'status' => 'ok', 'token' => $jwt_token, ]); }

                public function logout(Request $request) { $this->validate($request, [ 'token' => 'required' ]);
                    try { JWTAuth::invalidate($request->token); return response()->json([ 'status' => 'ok', 'message' => '' ]); }
                    // error code here
                    catch (JWTException $exception) { return response()->json([ 'status' => 'unknown_error', 'message' => '' ], 500); } }

                    public function getAuthUser(Request $request) { $this->validate($request, [ 'token' => 'required' ]); $user = JWTAuth::authenticate($request->token);
                        return response()->json(['user' => $user]); } protected function jsonResponse($data, $code = 200) { return response()->json($data, $code, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE); }

    }