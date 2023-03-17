<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductImages
 * @package App\Models
 * @version October 4, 2020, 3:35 pm UTC
 *
 * @property string $image
 * @property integer $product_id
 */
class ProductImages extends Model
{
    use SoftDeletes;

    public $table = 'product_images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'product_id',
        'varientid',
        'isCustom_Image',
        'ViewTypeId',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'product_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
