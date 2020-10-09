<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  use \App\Http\Traits\UsesUuid;

  protected $table = 'product';
  protected $primaryKey = 'product_id';

  protected $fillable =
   ['product_id',
   'product_name',
   'product_old_price',
   'product_price',
   'p_img_url',
   'p_service_provider_id',
   'p_service_category_id' ];
   

   public function service_provider()
    {
        return $this->belongsTo('App\Models\ServiceProvider', 'p_service_provider_id');
    }

    public function service_category()
    {
        return $this->belongsTo('App\Models\ServiceCategory', 'p_service_category_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\ProductReview');
    }

}
