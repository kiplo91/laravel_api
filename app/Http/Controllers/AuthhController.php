<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthhController extends Controller
{
    public function register(Request $request){
       
        try {
         $request->validate([
            "name"=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=>  'required',

        ]);

    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        
       
        return response()->json([
            'message'=> 'User registered successfully',201
        ]);
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error'=>('Invalid credentials')],401);
            }

        }catch(JWTException $e){
            return response()->json(['error'=>('Could not create token')],500);
    }
    return response()->json(compact('token'));
}
}