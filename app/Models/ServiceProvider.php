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
   'sp_lat',
   'sp_lng',
   'sp_address',
   'sp_opening_time',
   'sp_closing_time',
   'sp_rating',
   'sp_whatsapp_contact',
   'sp_primary_contact',
   'sp_secondary_contact',
   'sp_img_url' ];

   public function reviews()
    {
        return $this->hasMany('App\Models\ServiceProviderReview','sp_review_provider_id');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\SpTag');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','p_service_provider_id');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service', 's_service_provider_id');
    }

    public function service_categories()
    {
        return $this->belongsToMany('App\Models\ServiceCategory','serviceprovider_servicecategory','service_provider_id','service_category_id');
    }

}
