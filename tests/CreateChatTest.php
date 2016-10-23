<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use JWTAuth;
use Illuminate\Http\Response;
use Auth;

class UserLoginTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $user=App\User::find(2);
        $this->user=$user;
        $this->token = JWTAuth::fromUser($user);
        $this->post('api/users/login', ['email'=>$user->email, 'password'=>'Potatoe23!'])
            ->seeJson([
                 'created' => $user->created,
                 'email' => $user->email,
                 'id' => $user->id,
                 'name' => $user->name,
                 'token' => $this->token
             ]);
      return $this;
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testViewUser()
    {
      $this->testUserLogin();
      $this->get('users/me', ['token'=> $this->token ])
          ->seeJsonStructure([
              '*' => [
                  'id', 'token', 'email', 'name',
              ]
          ]);
    }
}
