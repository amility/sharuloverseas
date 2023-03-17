<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Caliber
 * @package App\Models
 * @version October 3, 2020, 12:49 pm UTC
 *
 * @property string $caliber_name
 * @property string $caliber_slug
 * @property string $caliber_image_name
 * @property string $caliber_image_path
 * @property string $is_active
 */
class Caliber extends Model
{
    use SoftDeletes;

    public $table = 'caliber';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'caliber_name',
        'caliber_slug',
        'caliber_image_name',
        'caliber_image_path',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'caliber_name' => 'string',
        'caliber_slug' => 'string',
        'caliber_image_name' => 'string',
        'caliber_image_path' => 'string',
        'is_active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'caliber_name' => 'required|string',
        // 'caliber_image_name' => 'required'
    ];

    
}
