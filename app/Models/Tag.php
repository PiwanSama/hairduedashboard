<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
  {
    
    protected $table = 'service_tag';
    protected $primaryKey = 'tag_id';

    protected $fillable =
      ['tag_id',
      'tag_name',
      ];

      public function service_providers()
      {
          return $this->belongsToMany('App\Models\ServiceProvider');
      }

  }

?>