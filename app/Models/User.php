<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends Authenticatable
{
  use \App\Http\Traits\UsesUuid, Notifiable, HasApiTokens;
  
  protected $table = 'user';
  protected $primaryKey = 'user_id';

  protected $fillable =
   ['user_id',
   'user_fname',
   'user_lname',
   'user_email',
   'user_contact',
   'user_token' ];

}
