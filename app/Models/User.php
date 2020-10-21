<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Model
{
  use \App\Http\Traits\UsesUuid, Authenticatable, HasApiTokens;
  
  protected $table = 'user';
  protected $primaryKey = 'user_id';

  protected $fillable =
   ['user_id',
   'user_fname',
   'user_lname',
   'user_email',
   'password',
   'user_contact',
   'user_token' ];

   protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function setPasswordAttribute($password)
  {
      $this->attributes['password'] = bcrypt($password);
  }


}
