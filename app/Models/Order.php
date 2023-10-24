<?php

namespace App\Models;
use Musonza\Chat\Traits\Messageable;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use Messageable;

  protected $fillable = ['service_id', 'seller_id', 'buyer_id', 'order_date', 'order_status'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }

  public function seller()
  {
    return $this->belongsTo(User::class, 'seller_id');
  }

  public function buyer()
  {
    return $this->belongsTo(User::class, 'buyer_id');
  }
  
}
