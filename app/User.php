<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function chatHistory()
    {
      /**
       *
       * Each message belongs to a user
       *
      */
        return $this->hasMany('App\Chat');
    }

    public function response()
    {
      /**
       *
       * Each message belongs to a user
       *
      */
        return $this->select('id');
    }
}
