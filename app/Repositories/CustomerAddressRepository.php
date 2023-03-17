<?php

namespace App\Repositories;

use App\Models\CustomerAddress;
use App\Repositories\BaseRepository;

/**
 * Class CustomerAddressRepository
 * @package App\Repositories
 * @version September 29, 2020, 10:41 am UTC
*/

class CustomerAddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'is_primary'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomerAddress::class;
    }
}
