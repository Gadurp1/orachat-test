<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat;

class Chat extends Model
{
  public $timestamps=false;

  /**
      * The storage format of the model's date columns.
      *
      * @var string
      */
     protected $dateFormat = 'Y';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name'
  ];

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
    return $this->hasOne('App\Message')
        ->selectRaw('id,user_id,chat_id,message,date_format(created, "%Y-%m-%dT%TZ") as created')
        ->orderBy('created','DESC')
        ->with('user')
        ->take(1);
   }


   public function scopeChatHistory()
   {
     return $this->selectRaw('id,user_id,name,date_format(created, "%Y-%m-%dT%TZ") as created')
         ->orderBy('created','DESC')
         ->with('user')
         ->with('lastMessage');
    }

}
