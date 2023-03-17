<?php

namespace App\Repositories;

use App\Models\AddToCart;
use App\Repositories\BaseRepository;

/**
 * Class AddToCartRepository
 * @package App\Repositories
 * @version October 22, 2020, 4:54 am UTC
*/

class AddToCartRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'product_id',
        'price',
        'quantity',
        'total',
        'attributes',
        'created_by',
        'updated_by'
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
        return AddToCart::class;
    }
}
