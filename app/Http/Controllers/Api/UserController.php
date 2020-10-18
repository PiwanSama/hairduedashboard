<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $request)
    { 
      $user = new User;
      $user->user_id = $request->id;
      $user->user_fname = $request->first_name;
      $user->user_lname = $request->last_name;
      $user->user_email = $request->email;
      $user->user_contact = $request->contact;
      $user->user_token = $request->user_token;

      $user->save();

      return response()->json([
        "message"=>"User saved succesfully"
      ], 201);
    }

}
