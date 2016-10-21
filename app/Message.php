<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
    {
      /**
       *
       * Each message belongs to a user
       *
      */
        return $this->belongsTo('App\User')
            ->select('id','name');
     }
}
