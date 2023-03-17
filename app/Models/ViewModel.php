<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewModel extends Model
{
    use HasFactory;
    protected $table = 'custom_view';
    protected $fillable = ['view', 'price', 'is_active','deleted_at'];   
}
