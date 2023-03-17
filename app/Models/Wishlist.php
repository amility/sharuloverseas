<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wishlist
 * @package App\Models
 * @version October 26, 2020, 12:15 pm UTC
 *
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $created_by
 * @property integer $updated_by
 */
class Wishlist extends Model
{
    // use SoftDeletes;

    public $table = 'wishlists';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'product_id',
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

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
