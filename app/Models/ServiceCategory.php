<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    
  protected $table = 'service_category';
  protected $primaryKey = 'service_category_id';

  protected $fillable =
   ['service_category_id',
    'parent_service_category_id',
    'sc_name'];

   public function service_providers()
    {
        return $this->belongsToMany('App\Models\ServiceProvider','serviceprovider_servicecategory','service_category_id','service_provider_id');
    }

}
