<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  use \App\Http\Traits\UsesUuid;
  
  protected $table = 'user';
  protected $primaryKey = 'user_id';

  protected $fillable =
   ['user_id',
   'user_name',
   'user_email',
   'user_token' ];

}
