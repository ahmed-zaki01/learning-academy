<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
   protected $guarded = ['id'];

   public function student() {
      return $this->belongsTo('App\Student');
   }
}
