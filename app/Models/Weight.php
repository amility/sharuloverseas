<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Weight
 * @package App\Models
 * @version October 3, 2020, 12:49 pm UTC
 *
 * @property string $weight_name

 */
class Weight extends Model
{
   

    public $table = 'weight';


    public $fillable = [
        'weight_name',
      
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'weight_name' => 'string',
       
    ];

  

    
}
