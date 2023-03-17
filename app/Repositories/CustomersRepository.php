<?php

namespace App\Repositories;

use App\Models\Customers;
use App\Repositories\BaseRepository;

/**
 * Class CustomersRepository
 * @package App\Repositories
 * @version September 29, 2020, 7:43 am UTC
*/

class CustomersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
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
        return Customers::class;
    }
}
