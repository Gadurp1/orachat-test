<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('messages', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('chat_id');
             $table->integer('user_id')->index();
             $table->string('message');
             $table->integer('pages_count');
             $table->timestamp('created');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
