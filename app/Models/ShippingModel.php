<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model
{
    protected $guard = 'shipping';

    public $table = 'shipping';   
    use HasFactory;
    protected $fillable = [
        'shipping_method', 
        'price',
        'start_date',
        'end_date',
        'min_value',
        'max_value',
         'min_weight',
        'max_weight',
        'is_active'

    ];
    protected $dates = ['deleted_at'];
}
