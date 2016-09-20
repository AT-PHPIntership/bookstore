<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Repositories\UserRepository as User;

class AuthenticateController extends Controller
{
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Instantiate a new controller instance.
     *
     * @param UserRepository $user user
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
        $this->user = $user;
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
        $user = $this->user->with('profile')->findBy('email', $credentials['email'])->first();
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => \Config::get('http_response_code.INVALID_CREDENTIAL')], \Config::get('http_response_code.400_FORBIDDEN'));
            }
        } catch (JWTException $e) {
            return response()->json(['error' => \Config::get('http_response_code.COULD_NOT_CREATE_TOKEN')], \Config::get('http_response_code.500_INTERNAL_SERVER_ERROR'));
        }
        return response()->json(['token' => $token, 'user' => $user], \Config::get('http_response_code.200_OK'));
    }
}
