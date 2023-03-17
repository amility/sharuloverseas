<?php
namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnicalBulletsModel extends Model
{
  

    public $table = 'technical_bullets';
    

   



    public $fillable = [
        'technical_bullets1',
        'technical_bullets2',
        'technical_bullets3',
        'technical_bullets4',
        'technical_bullets5',
        'technical_bullets6',
        'technical_bullets7',
        'technical_bullets8',
        'technical_bullets9',
        'technical_bullets10',
        'technical_bullets11',
        'technical_bullets12',
        'technical_bullets13',
        'technical_bullets14',
        'technical_bullets15',

        'product_id'
    ];
protected $casts = [
        'id' => 'integer',
        'technical_bullets1' => 'string',
        'technical_bullets2' => 'string',
        'technical_bullets3' => 'string',
        'technical_bullets4' => 'string',

        'technical_bullets5' => 'string',
        'technical_bullets6' => 'string',
        'technical_bullets7' => 'string',
        'technical_bullets8' => 'string',
        'technical_bullets9' => 'string',
        'technical_bullets10' => 'string',
        'technical_bullets11' => 'string',
        'technical_bullets12' => 'string',
        'technical_bullets13' => 'string',
        'technical_bullets14' => 'string',
        'technical_bullets15' => 'string',

        'product_id' => 'integer'
    ];


}
