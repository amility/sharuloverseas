<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
      protected $guard = 'about_us';

    public $table = 'about_us';   
    use HasFactory;
    protected $fillable = ['title',
        'about_us','is_active'
    ];
    protected $dates = ['deleted_at'];
}
