<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{

  protected $table = 'service_provider';
  protected $primaryKey = 'service_provider_id';

  protected $fillable =
   ['service_provider_id',
   'service_provider_name',
   'sp_coverphoto_url',
   'sp_address',
   'sp_location_lat',
   'sp_location_lng',
   'sp_rating',
   'sp_whatsapp_contact',
   'sp_primary_contact',
   'sp_id_front',
   'sp_id_back',
   'is_sp_active' ];

   public function reviews()
    {
        return $this->hasMany('App\Models\ServiceProviderReview','sp_review_provider_id');
    }

    public function service_categories()
    {
        return $this->hasMany('App\Models\ServiceCategory','id');
    }

}
