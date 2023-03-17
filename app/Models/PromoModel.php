<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoModel extends Model
{
	//use SoftDeletes,Notifiable;

    protected $guard = 'promo';

    public $table = 'promo';   
    use HasFactory;
    protected $fillable = [
        'promo_name', 'promo_code','promo_price','promo_type','max_user','min_amount','upto_amount','image','description','status'
    ];
    protected $dates = ['deleted_at'];
}
