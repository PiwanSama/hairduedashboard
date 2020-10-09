<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use \App\Http\Traits\UsesUuid;
    
  protected $table = 'service_category';
  protected $primaryKey = 'service_category_id';

  protected $fillable =
   ['service_category_id',
   'parent_service_category_id',
   'sc_name',
   'sc_img_url'];

   public function service_providers()
    {
        return $this->belongsToMany('App\Models\ServiceProvider','serviceprovider_servicecategory');
    }

}
