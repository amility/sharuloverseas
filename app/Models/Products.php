<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Products
 * @package App\Models
 * @version October 3, 2020, 1:43 pm UTC
 *
 * @property string $category_id
 * @property string $sub_category_id
 * @property string $brand_id
 *  @property string $caliber_id
 * @property string $prod_sku
 * @property string $prod_name
 * @property string $prod_slug
 * @property string $prod_price
 * @property string $total_stock
 * @property string $prod_description
 * @property string $prod_details
 * @property string $prod_specification
 * @property string $prod_video_url
 */
class Products extends Model
{
    use SoftDeletes;

    public $table = 'products';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'category_id',
        'sub_category_id',
        'brand_id',
        'caliber_id',
        'prod_sku',
        'prod_name',
        'prod_slug',
         'weight_id',
        'prod_price',
        'total_stock',
        'prod_description',
        'prod_details',
        'prod_specification',
        'prod_video_url',
        'image',
        'prod_pdf',
        'featured',
        'new_arrival',
        'best_seller',
        'is_active',
        'variationFlag',
        'mrp_price',
        'front_image',
        'back_image',
        'left_image',
        'right_image',
        'custom_product'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'brand_id' => 'integer',
        'caliber_id' => 'integer',
        'prod_sku' => 'string',
        'prod_name' => 'string',
        'prod_slug' => 'string',
        'prod_price' => 'string',
        'total_stock' => 'string',
        'prod_description' => 'string',
        'prod_details' => 'string',
        'prod_specification' => 'string',
        'prod_video_url' => 'string',
        'featured'=>'integer',
        'new_arrival'=>'integer',
        'best_seller'=>'integer',
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required|string',
        'brand_id' => 'required|string',
        'caliber_id' => 'required|string',
        'prod_sku' => 'required|string',
        'prod_name' => 'required|string',
        'prod_price' => 'required|string',
        'total_stock' => 'required|string'
    ];

    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brandData()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }
 public function caliberData()
    {
        return $this->belongsTo(Caliber::class, 'caliber_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id')->where('isCustom_Image',null);
    }
    public function imagess()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id')->orWhereNotNull('isCustom_Image');
    }
}
