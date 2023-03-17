<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    use HasFactory;
     protected $guard = 'privacy';

    public $table = 'privacy';   
    use HasFactory;
    protected $fillable = [
    	'title',
        'privacy','is_active'
    ];
    protected $dates = ['deleted_at'];
}
