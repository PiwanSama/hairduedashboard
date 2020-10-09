<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProviderReview extends Model
{
    use \App\Http\Traits\UsesUuid;
    
  protected $table = 'service_provider_review';
  protected $primaryKey = 'sp_review_id';

  protected $fillable =
   ['sp_review_id',
   'sp_review_content',
   'sp_review_rating',
   'sp_review_userid',
   'sp_review_provider_id' ];


   public function service_provider()
    {
        return $this->belongsTo('App\Models\ServiceProvider');
    }

}
