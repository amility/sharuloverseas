<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
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
        DB::table('categories')->truncate();

        $arrParentCatLists = [
            ['id' => 1,'name' => 'Power Tools', 'slug' => "power-tools"],
            ['id' => 2,'name' => 'Hand Tools', 'slug' => "hand-tools"],
            ['id' => 3,'name' => 'Machine Tools', 'slug' => "machine-tools"],
            ['id' => 4,'name' => 'Building Supplies', 'slug' => "building-supplies"],
            ['id' => 5,'name' => 'Electrical', 'slug' => "electrical"],
            ['id' => 6,'name' => 'Power Machinery', 'slug' => "power-machinery"],
            ['id' => 7,'name' => 'Measurement', 'slug' => "measurement"],
            ['id' => 8,'name' => 'Clothes & PPE', 'slug' => "clothes-ppe"],
            ['id' => 9,'name' => 'Plumbing', 'slug' => "plumbing"],
            ['id' => 10,'name' => 'Storage & Organization', 'slug' => "storage-organization"],
            ['id' => 11,'name' => 'Welding & Soldering', 'slug' => "welding-soldering"],
        ];
        DB::table('categories')->insert($arrParentCatLists);


        $arrParentCatLists = [
            ['parent_id' => 1,'name' => 'Engravers', 'slug' => "engravers"],
            ['parent_id' => 1,'name' => 'Drills', 'slug' => "drills"],
            ['parent_id' => 1,'name' => 'Wrenches', 'slug' => "wrenches"],
            ['parent_id' => 1,'name' => 'Plumbing', 'slug' => "plumbing"],
            ['parent_id' => 1,'name' => 'Wall Chaser', 'slug' => "wall-chaser"],
            ['parent_id' => 1,'name' => 'Pneumatic Tools', 'slug' => "pneumatic-tools"],
            ['parent_id' => 1,'name' => 'Milling Cutters', 'slug' => "milling-cutters"],

            ['parent_id' => 2,'name' => 'Screwdrivers', 'slug' => "screwdrivers"],
            ['parent_id' => 2,'name' => 'Handsaws', 'slug' => "handsaws"],
            ['parent_id' => 2,'name' => 'Knives', 'slug' => "knives"],
            ['parent_id' => 2,'name' => 'Axes', 'slug' => "axes"],
            ['parent_id' => 2,'name' => 'Multitools', 'slug' => "multitools"],
            ['parent_id' => 2,'name' => 'Paint Tools', 'slug' => "paint Tools"],

            ['parent_id' => 3,'name' => 'Thread Cutting', 'slug' => "thread-cutting"],
            ['parent_id' => 3,'name' => 'Chip Blowers', 'slug' => "chip-blowers"],
            ['parent_id' => 3,'name' => 'Sharpening Machines', 'slug' => "sharpening-machines"],
            ['parent_id' => 3,'name' => 'Pipe Cutters', 'slug' => "pipe-cutters"],
            ['parent_id' => 3,'name' => 'Slotting Machines', 'slug' => "slotting-machines"],
            ['parent_id' => 3,'name' => 'Lathes', 'slug' => "lathes"],

        ];
        DB::table('categories')->insert($arrParentCatLists);

    }
}
