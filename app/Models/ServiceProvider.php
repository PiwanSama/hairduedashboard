<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{

  use \App\Http\Traits\UsesUuid;

  protected $table = 'service_provider';
  protected $primaryKey = 'service_provider_id';

  protected $fillable =
   ['service_provider_id',
   'service_provider_name',
   'sp_address',
   'sp_rating',
   'sp_whatsapp_contact',
   'sp_primary_contact',
   'sp_id_img' ];

   public function reviews()
    {
        return $this->hasMany('App\Models\ServiceProviderReview','sp_review_provider_id');
    }

    public function service_categories()
    {
        return $this->belongsToMany('App\Models\ServiceCategory','serviceprovider_servicecategory','service_provider_id','service_category_id');
    }

}
