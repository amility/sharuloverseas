<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Products
 * @package App\Models
 * @version October 3, 2020, 1:43 pm UTC
 *
 * @property string $product_id
 * @property string $category_id
 * @property string $type
 */
class ProductCategoriesList extends Model
{
    use SoftDeletes;

    public $table = 'product_categories';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'product_id',
        'category_id',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'string',
        'category_id' => 'string',
        'type' => 'string'
    ];
    
}
