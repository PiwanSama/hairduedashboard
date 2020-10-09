<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use \App\Http\Traits\UsesUuid; 
    
  protected $table = 'product_review';
  protected $primaryKey = 'product_review_id';

  protected $fillable =
   ['product_review_id',
   'product_review_content',
   'product_review_rating',
   'product_review_userid',
   'product_review_provider_id' ];

   public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
