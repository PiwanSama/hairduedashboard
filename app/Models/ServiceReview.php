<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    use \App\Http\Traits\UsesUuid; 
    
  protected $table = 'service_review';
  protected $primaryKey = 'service_review_id';

  protected $fillable =
   ['service_review_id',
   'service_review_content',
   'service_review_rating',
   'service_review_userid',
   'service_review_provider_id' ];

   public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

}
