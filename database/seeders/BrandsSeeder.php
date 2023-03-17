<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class BrandsSeeder extends Seeder
{
    public $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('brands')->truncate();
        $arrBannerImageLists = [
            ['brand_name' => 'Stanley', 'brand_slug' => 'stanley', 'brand_image_name' => 'logo-1.jpg', 'brand_image_path' => 'images/logos/logo-1.png'],
            ['brand_name' => 'Knipex', 'brand_slug' => 'knipex', 'brand_image_name' => 'logo-2.jpg', 'brand_image_path' => 'images/logos/logo-2.png'],
            ['brand_name' => 'Norbar', 'brand_slug' => 'norbar', 'brand_image_name' => 'logo-3.jpg', 'brand_image_path' => 'images/logos/logo-3.png'],
            ['brand_name' => 'Irwin Tools', 'brand_slug' => 'irwin-tools', 'brand_image_name' => 'logo-4.jpg', 'brand_image_path' => 'images/logos/logo-4.png'],
            ['brand_name' => 'Alpen', 'brand_slug' => 'alpen', 'brand_image_name' => 'logo-5.jpg', 'brand_image_path' => 'images/logos/logo-5.png'],
            ['brand_name' => 'Piher', 'brand_slug' => 'piher', 'brand_image_name' => 'logo-6.jpg', 'brand_image_path' => 'images/logos/logo-6.png'],
        ];
        DB::table('brands')->insert($arrBannerImageLists);
    }
}
