<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
  use \App\Http\Traits\UsesUuid;
  
  protected $table = 'service';
  protected $primaryKey = 'service_id';

  protected $fillable =
   ['service_id',
   'service_name',
   'service_price',
   's_img_url',
   's_service_provider_id',
   's_service_category_id'
];

public function service_provider()
{
    return $this->belongsTo('App\Models\ServiceProvider', 's_service_provider_id');
}

public function service_category()
{
    return $this->belongsTo('App\Models\ServiceCategory', 's_service_category_id');
}

public function reviews()
    {
        return $this->hasMany('App\Models\ServiceReview');
    }

}
