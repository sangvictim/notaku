<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $auth = Auth::attempt($credentials);
        if (! $auth) {
            return response()->json([
                'status' => '200 OK',
                'message' => 'Authorization Failed !',
            ]);
        }else{
            $user = Auth::User();

            $key = bcrypt($user->id.'+'.$user->username.'+'.date(now()));
            $payload = array(
                "id" => $user->id,
                'akses' => $user->akses
            );

            $jwt = JWT::encode($payload, $key);
            $decoded = JWT::decode($jwt, $key, array('HS256'));

            $user->key = $key;
            $user->save();
            return response()->json([
                'status' => '200 OK',
                'userInfo' => $user,
                'token' => $jwt
            ]);

        }
    }
}
