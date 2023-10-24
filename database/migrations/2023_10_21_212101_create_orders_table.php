<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('service_id');
      $table->unsignedBigInteger('seller_id');
      $table->unsignedBigInteger('buyer_id');
      $table->date('order_date');
      $table->string('order_status');
      $table->timestamps();

// Define foreign keys
      $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
      $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  public function down()
  {
    Schema::dropIfExists('orders');
  }
}







