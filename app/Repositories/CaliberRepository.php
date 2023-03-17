<?php

namespace App\Repositories;

use App\Models\Caliber;
use App\Repositories\BaseRepository;

/**
 * Class BrandsRepository
 * @package App\Repositories
 * @version October 3, 2020, 12:49 pm UTC
*/

class CaliberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'caliber_name',
        'caliber_slug',
        'caliber_image_name',
        'caliber_image_path',
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
        return Caliber::class;
    }
}
