<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class BannerImageSeeder extends Seeder
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
        DB::table('banner_images')->truncate();

        $arrBannerImageLists = [
            [ 'app_type' => 'web', 'name' => 'slide-1.jpg', 'image_path' => 'images/slides/slide-1.jpg' ,'title' => 'Big choice of <br/> Plumbing products','preference' => 1 ,'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Etiam pharetra laoreet dui quis molestie"],
            [ 'app_type' => 'web', 'name' => 'slide-2.jpg', 'image_path' => 'images/slides/slide-2.jpg' ,'title' => 'Screwdrivers <br/> Professional Tools', 'preference' => 2 ,'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Etiam pharetra laoreet dui quis molestie"],
            [ 'app_type' => 'web', 'name' => 'slide-3.jpg', 'image_path' => 'images/slides/slide-3.jpg' ,'title' => 'Knipex Quality<br> Made in Germany', 'preference' => 3,'description' => '' ],
        ];
        DB::table('banner_images')->insert($arrBannerImageLists);
    }
}