<?php
// database/migrations/2023_10_21_create_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
  public function up()
  {
    Schema::create('messages', function (Blueprint $table) {
      $table->id('MessageID');
      $table->unsignedBigInteger('order_id');
      $table->unsignedBigInteger('sender_id');
      $table->unsignedBigInteger('receiver_id');
      $table->string('message content');
      $table->timestamp('timestamp');

      $table->foreign('order_id')->references('order_id')->on('orders');
      $table->foreign('sender_id')->references('buyer_id')->on('orders');
      $table->foreign('receiver_id')->references('seller_id')->on('orders');
    });
  }

  public function down()
  {
    Schema::dropIfExists('messages');
  }
}
