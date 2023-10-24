<?php
// app/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = ['sender_id', 'receiver_id', 'message content', 'timestamp'];

  public function order()
  {
    return $this->belongsTo(Order::class, 'order_id');
  }
}
