<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AddToCart
 * @package App\Models
 * @version October 22, 2020, 4:54 am UTC
 *
 * @property integer $user_id
 * @property integer $product_id
 * @property string $price
 * @property string $quantity
 * @property string $total
 * @property string $attributes
 * @property integer $created_by
 * @property integer $updated_by
 */
class AddToCart extends Model
{
    // use SoftDeletes;

    public $table = 'add_to_carts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'product_id',
        'price',
        'quantity',
        'total',
        'attributes',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'price' => 'string',
        'quantity' => 'string',
        'total' => 'string',
        'attributes' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
