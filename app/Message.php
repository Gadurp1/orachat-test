<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps=false;

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

     public function chat()
     {
       /**
        *
        * Each message belongs to a chat
        *
       */
         return $this->belongsTo('App\Chat');
     }

     public function scopeMessageHistory()
     {
       /**
        *
        * Format history of messages
        *
       */
       return $this->selectRaw('id,chat_id,user_id,message,date_format(created, "%Y-%m-%dT%TZ") as created')
           ->orderBy('created','DESC')
           ->with('user');
      }
}
