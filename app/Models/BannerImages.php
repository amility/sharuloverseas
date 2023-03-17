<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BannerImages
 * @package App\Models
 * @version September 24, 2020, 2:54 pm UTC
 *
 * @property string $image_path
 * @property integer $preference
 */
class BannerImages extends Model
{
    use SoftDeletes;

    public $table = 'banner_images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'app_type',
        'name',
        'image_path',
        'alt_name',
        'title',
        'description',
        'preference',
        'is_active',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'app_type' => 'string',
        'name' => 'string',
        'image_path' => 'string',
        'title' => 'string',
        'description' => 'string',
        'alt_name' => 'string',
        'preference' => 'integer',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image_path' => 'required',
        'preference' => 'required'
    ];

    
}
