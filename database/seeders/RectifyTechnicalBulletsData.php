<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\TechnicalBulletsModel;
use Illuminate\Database\Seeder;

class RectifyTechnicalBulletsData extends Seeder
{

    public $technicalBulletsModel;

    public function __construct(TechnicalBulletsModel $TBModel)
    {
        $this->technicalBulletsModel = $TBModel;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            echo "Starting to remove duplicate technical bullets.... \n";

            $products = Products::all();

            echo "Total Products - " . count($products) ."\n";

            foreach ($products as $key => $product) {
                $technicalBullets = TechnicalBulletsModel::where([
                    'product_id' => $product->id
                ])->orderBy('id', 'desc')->pluck('id')->toArray();

                unset($technicalBullets[ 0 ]);

                if ( !empty($technicalBullets)) {
                    $deletedTBs = $this->technicalBulletsModel->whereIn('id', $technicalBullets)->delete();

                    echo "Deleted " . $deletedTBs . " duplicate entries for product " . $product->prod_name . " with id " . $product->id . " \n";
                } else {
                    echo "No Duplicate Entries found for product " . $product->prod_name . " with id " . $product->id . " \n";
                }
            }

            echo "Done \n";

        } catch (\Throwable $e) {
            dd($e);
        }
    }
}
