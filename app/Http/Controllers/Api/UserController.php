<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    { 

      $checkUser = User::where('email',$request->email)->get();

      if(!$checkUser->isEmpty()){
        return response()->json([
          "message"=>"User already exists"
        ], 403);
      }

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);

        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
          "message"=>"User saved succesfully",
          "user"=>$user,
          "access_token"=>$accessToken
        ], 201);
    }

    public function login(Request $request){

     /* $credentials = request(['email', 'password']);
      
      if(!auth()->attempt($credentials)){
        return response()->json([
          "message"=>"Invalid credentials"
        ], 201);
      }

      $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
          "message"=>"Login successful",
          "user"=>auth()->user(),
          "access_token"=>$accessToken
        ], 201);*/

        $user = User::where('email', $request->email)->first();
        
        if($user){

          if(Hash::check($request->password, $user->password)){
            
            $accessToken = $user->createToken('authToken')->accessToken;

            return response()->json([
              "message"=>"Login successful",
              "user"=>$user,
              "access_token"=>$accessToken
            ], 201);

          }else{
            return response()->json([
              "message"=>"Invalid credentials"
            ], 422);

          }
        }else{
          return response()->json([
            "message"=>"User doesn't exist"
          ], 422);

        }

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
