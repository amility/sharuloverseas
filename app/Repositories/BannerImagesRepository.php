<?php

namespace App\Repositories;

use App\Models\BannerImages;
use App\Repositories\BaseRepository;

/**
 * Class BannerImagesRepository
 * @package App\Repositories
 * @version September 24, 2020, 2:54 pm UTC
*/

class BannerImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image_path',
        'title',
        'description',
        'preference'
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
        return BannerImages::class;
    }
}
