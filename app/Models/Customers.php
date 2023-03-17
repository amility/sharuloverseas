<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Customers
 * @package App\Models
 * @version September 29, 2020, 7:43 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 */
class Customers extends Authenticatable
{
    use SoftDeletes,Notifiable;

    protected $guard = 'customer';

    public $table = 'customers';    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'remember_token',
        'customer_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'email_verified_at' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'customer_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    
}
