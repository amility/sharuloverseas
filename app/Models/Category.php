<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * Class Category
 * @package App\Models
 * @version September 24, 2020, 1:35 pm UTC
 *
 * @property string $name
 * @property string $mnachine_name
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent_id',
        'name',
        'slug',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'is_active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string'
    ];

    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public static function getParentCategoryLists(){
        $arrCatLists = DB::table('categories')->select('id','parent_id','name')->where('parent_id', '=', null)->where('deleted_at', '=', null)->where('is_active','1')->get()->whereNull('parent_id');
        $arrCategoryLists = [];
        foreach($arrCatLists as $strKey => $arrCatData){
            $arrCategoryLists[$arrCatData->id] = $arrCatData->name;
        }
        return $arrCategoryLists;
    }

    public function getSubCategoryName($id)
    {
        $subCategory = $this->newQuery()->where([
            'id' => $id
        ])->select('name')->where('is_active','1')->get()->toArray();

        if(!empty($subCategory) && isset($subCategory[ 0 ][ 'name' ])) {
            return $subCategory[ 0 ][ 'name' ];
        }

        return "";
    }
}
