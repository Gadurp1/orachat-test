<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewChatHistoryTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testViewChatHistory()
    {
      $this->visit('http://orachat-test.dev/')
             ->see('Laravel');
    }
}
