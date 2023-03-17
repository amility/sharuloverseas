<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\BaseRepository;

/**
 * Class WishlistRepository
 * @package App\Repositories
 * @version October 26, 2020, 12:15 pm UTC
*/

class WishlistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'product_id',
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
        return Wishlist::class;
    }
}
