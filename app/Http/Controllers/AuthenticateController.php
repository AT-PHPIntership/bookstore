<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class AuthenticateController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }
    
    /**
     * Return a JWT
     *
     * @param \Illuminate\Http\BillRequest $request hold data from request
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => \Config::get('http_response_code.INVALID_CREDENTIAL')], \Config::get('http_response_code.400_FORBIDDEN'));
            }
        } catch (JWTException $e) {
            return response()->json(['error' => \Config::get('http_response_code.COULD_NOT_CREATE_TOKEN')], \Config::get('http_response_code.500_INTERNAL_SERVER_ERROR'));
        }
        return response()->json(compact('token'));
    }
}
