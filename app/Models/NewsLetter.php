<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    use HasFactory;
    public $table = 'newsletter_subscriber';
    protected $fillable = ['email','expiry_date','is_active'
    ];
    protected $dates = ['deleted_at'];
}
