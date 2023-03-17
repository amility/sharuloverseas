<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brands
 * @package App\Models
 * @version October 3, 2020, 12:49 pm UTC
 *
 * @property string $brand_name
 * @property string $brand_slug
 * @property string $brand_image_name
 * @property string $brand_image_path
 * @property string $is_active
 */
class Brands extends Model
{
    use SoftDeletes;

    public $table = 'brands';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'brand_name',
        'brand_slug',
        'brand_image_name',
        'brand_image_path',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'brand_name' => 'string',
        'brand_slug' => 'string',
        'brand_image_name' => 'string',
        'brand_image_path' => 'string',
        'is_active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'brand_name' => 'required|string',
        // 'brand_image_name' => 'required'
    ];

    
}
