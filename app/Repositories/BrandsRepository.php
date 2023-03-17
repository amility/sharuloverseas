<?php

namespace App\Repositories;

use App\Models\Brands;
use App\Repositories\BaseRepository;

/**
 * Class BrandsRepository
 * @package App\Repositories
 * @version October 3, 2020, 12:49 pm UTC
*/

class BrandsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand_name',
        'brand_slug',
        'brand_image_name',
        'brand_image_path',
        'is_active'
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
        return Brands::class;
    }
}
