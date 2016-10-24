<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ViewChatHistoryTest extends TestCase
{
    /**
    * Return request headers needed to interact with the API.
    *
    * @return Array array of headers.
    */
    protected function headers($user = null)
    {
      $headers = ['Accept' => 'application/json'];

      if (!is_null($user)) {
          $token = JWTAuth::fromUser($user);
          JWTAuth::setToken($token);
          $headers['Authorization'] = 'Bearer '.$token;
      }

      return $headers;
    }
    /**
     * Test: GET /api/stuff.
    */
    public function testViewChatHistory()
    {
        $url = '/chats';

        // Test unauthenticated access.
        $this->get($url, $this->headers())
             ->assertResponseStatus(400);

        $user=User::first();

        // Test authenticated access.
        $this->get($url, $this->headers($user))
            ->seeJson([
                'success' => true,
              ])
            ->assertResponseOk();
    }
}
