<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingAddress extends Model
{
    use HasFactory;
    public $table='order_shipping_addresses';
   	protected $guarded = [];
}
