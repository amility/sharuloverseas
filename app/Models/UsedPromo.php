<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedPromo extends Model
{
    use HasFactory;
    public $table='used_promos';
   	protected $guarded = [];
}
