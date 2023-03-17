<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;

      protected $guard = 'terms';

    public $table = 'terms';   
    use HasFactory;
    protected $fillable = ['title',
        'terms','is_active'
    ];
    protected $dates = ['deleted_at'];
}
