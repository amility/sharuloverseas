<?php

namespace App\Repositories;

use App\Models\ProductImages;
use App\Repositories\BaseRepository;

/**
 * Class ProductImagesRepository
 * @package App\Repositories
 * @version October 4, 2020, 3:35 pm UTC
*/

class ProductImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'product_id'
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
        return ProductImages::class;
    }
}
