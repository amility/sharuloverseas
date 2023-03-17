<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clipArt extends Model
{
    use HasFactory;
    protected $table = 'clip_art';
    protected $fillable = ['name','price','image'];

}
