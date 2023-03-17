<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunshow extends Model
{
    use HasFactory;
     protected $guard = 'gunshow';

    public $table = 'gunshow';   
    use HasFactory;
    protected $fillable = [
    	'day',
        'month',
        'year',
        'show_name',
        'target_link',
        'show_date',
        'updated_at',
        'created_at'
    ];
   // protected $dates = ['deleted_at'];
}
