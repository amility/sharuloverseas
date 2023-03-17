<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
     

    public $table = 'newsletter_subscriber';   
    
    protected $fillable = [
    	'email',
        'is_active'
    ];
    protected $dates = ['deleted_at'];
}
