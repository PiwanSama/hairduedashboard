<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    { 

      $checkUser = User::where('user_email',$request->email)->get();

      if(!$checkUser->isEmpty()){
        return response()->json([
          "message"=>"User already exists"
        ], 403);
      }

        $user = new User;
        $user->user_fname = $request->first_name;
        $user->user_lname = $request->last_name;
        $user->user_email = $request->email;
        $user->user_contact = $request->contact;
        $user->password = bcrypt($request->email);

        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
          "message"=>"User saved succesfully",
          "user"=>$user,
          "access_token"=>$accessToken
        ], 201);
    }

    public function login(Request $request){

      $credentials = request(['user_email', 'password']);
      
      if(!Auth::attempt($credentials)){
        return response()->json([
          "message"=>"Invalid credentials"
        ], 201);
      }

      $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
          "message"=>"Login successful",
          "user"=>auth()->user(),
          "access_token"=>$accessToken
        ], 201);

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
