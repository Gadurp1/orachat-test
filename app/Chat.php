<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat;

class Chat extends Model
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

  public function lastMessage()
  {
    /**
     *
     * Select the latest message from chat history
     *
    */
    return $this->hasMany('App\Message')
        ->orderBy('created','DESC')
        ->with('user')
        ->take(1);
   }
}
