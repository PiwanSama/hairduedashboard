<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{ 
    
  protected $table = 'product_review';
  protected $primaryKey = 'product_review_id';

  protected $fillable =
   ['p_review_id',
   'p_review_content',
   'p_review_rating',
   'p_review_user_id',
   'p_review_product_id' ];

   public function product()
    {
        return $this->belongsTo('App\Models\Product', 'p_review_product_id');
    }

}
