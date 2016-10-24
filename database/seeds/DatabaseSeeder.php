<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function($u) {
            $chats=$u->chats()->save(factory(App\Chat::class)->make());
            $chats->messages()->save(factory(App\Message::class)->make());
        });
    }
}
