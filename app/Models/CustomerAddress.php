<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomerAddress
 * @package App\Models
 * @version September 29, 2020, 10:41 am UTC
 *
 * @property integer $customer_id
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $country
 * @property string $street_address
 * @property string $appartment
 * @property string $town_city
 * @property string $state_country
 * @property string $postcode_zip
 * @property string $email_address
 * @property string $phone
 * @property string $is_primary
 */
class CustomerAddress extends Model
{
    use SoftDeletes;

    public $table = 'customer_addresses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'company_name',
        'country',
        'street_address',
        'appartment',
        'town_city',
        'state_country',
        'postcode_zip',
        'email_address',
        'phone',
        'is_primary',
        'block',
        'house_building',
        'extra_direction',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'company_name' => 'string',
        'country' => 'string',
        'street_address' => 'string',
        'appartment' => 'string',
        'town_city' => 'string',
        'state_country' => 'string',
        'postcode_zip' => 'string',
        'email_address' => 'string',
        'phone' => 'string',
        'is_primary' => 'string',
        'block' => 'string',
        'house_building' => 'string',
        'extra_direction' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
