<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SellerData;
use App\Models\Brands;
use App\Models\Caliber;
use App\Models\ProductImages;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\db;
use Storage;
use Excel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ImportDataController extends Controller
{
    public function import_data(Request $request)
    {
        $selectedSellerId = $request->input('seller_id');
        $imported_data = Excel::toArray(new SellerData, $request->file('import_product'));
        $imported_data = $imported_data[0];
        $i = 0;

        foreach ($imported_data as $data) {

            if ($i == 0 || empty($data[0])) { //skip heading row  
                $i++;
                continue;
            }
            if ($selectedSellerId == 1) { //DAVIDSONS 
                //Name data
                $name = $data[0];
                $productData['prod_name'] = 'name';
                //category data
                $productData['category_id'] = $this->getCategoryId($data[1]);
                //subcategory data
                $productData['sub_category_id'] = $this->getSubCategoryId($data[2], $productData['category_id']);
                //brand data
                $productData['brand_id'] = $this->getBrandId($data[3]);
                //caliber data
                $productData['caliber_id'] = $this->getClibarId($data[4]);
                //weight data
                $productData['weight_id'] = $this->getWeightId($data[5]);
                //sku data
                $sku = $data[6];
                $productData['prod_sku'] = $sku;
                // mrp  ce data
                $reqPrice = $data[7];
                $productData['mrp_price'] = $reqPrice;
                // sale price data
                $salePrice = $data[8]->getCalculatedValue();
                $productData['prod_price'] = $salePrice;
                // total stock data
                $totalStock = $data[9];
                $productData['total_stock'] = $totalStock;
                // Video Url data
                $videoUrl = $data[10];
                $productData['prod_video_url'] = $videoUrl;
                // New arrival data
                $newArrival = $data[11];
                $productData['new_arrival'] = ($newArrival == '') ? 0 : $newArrival;
                //best seller data
                $bestSeller = $data[12];
                $productData['best_seller'] = ($bestSeller == '') ? 0 : $bestSeller;
                //featured data
                $featured = $data[13];
                $productData['featured'] = ($featured == '') ? 0 : $featured;
                //status data
                $status = $data[14];
                $productData['is_active'] = ($status == '') ? 1 : $status;
                //specs data
                $specsData = $data[15];
                $productData['prod_specification'] = $specsData;
                //description data
                $description = $data[16];
                $productData['prod_description'] = $description;
                //product slug
                $slug = Str::slug($name);
                $productData['prod_slug'] = $slug;
                //seller id data
                $productData['seller_id'] = $selectedSellerId;
                $match = ['seller_id' => $selectedSellerId, 'prod_sku' => $sku];
                $productObj = Products::updateOrCreate($match, $productData);

                $image = $data[17];
                if (!empty($image)) {
                    $contents = file_get_contents($image);
                    $fileName = time() . '_' . substr($image, strrpos($image, '/') + 1);
                    $sourcePath = '/product_images/' . $fileName;
                    Storage::disk('public')->put($sourcePath, $contents);
                    $productImagesk['image'] = '/product_images/' . $fileName;
                    $productImagesk['product_id'] = $productObj->id;
                    echo "cdc1";
                    die();
                    ProductImages::create($productImagesk);
                } else {
                    $productImagesk['image'] = '/product_images/1667993825_1.jpg';
                    $productImagesk['product_id'] = $productObj->id;
                    echo "cdc2";
                    die();
                    ProductImages::create($productImagesk);
                }
            } elseif ($selectedSellerId == 2) {
                //Name data
                $name = $data[0];
                $productData['prod_name'] = $name;
                //category data
                $productData['category_id'] = $this->getCategoryId($data[1]);
                //subcategory data
                $productData['sub_category_id'] = $this->getSubCategoryId($data[2], $productData['category_id']);
                //brand data
                $productData['brand_id'] = $this->getBrandId($data[3]);
                //caliber data
                $productData['caliber_id'] = $this->getClibarId($data[4]);
                //weight data
                $productData['weight_id'] = $this->getWeightId($data[5]);
                //sku data
                $sku = $data[6];
                $productData['prod_sku'] = $sku;
                // mrp price data
                $reqPrice = $data[7];
                $productData['mrp_price'] = $reqPrice;
                // sale price data
                $salePrice = $data[8]->getCalculatedValue();
                $productData['prod_price'] = $salePrice;
                // total stock data
                $totalStock = $data[9];
                $productData['total_stock'] = $totalStock;
                // Video Url data
                $videoUrl = $data[10];
                $productData['prod_video_url'] = $videoUrl;
                // New arrival data
                $newArrival = $data[11];
                $productData['new_arrival'] = ($newArrival == '') ? 0 : $newArrival;
                //best seller data
                $bestSeller = $data[12];
                $productData['best_seller'] = ($bestSeller == '') ? 0 : $bestSeller;
                //featured data
                $featured = $data[13];
                $productData['featured'] = ($featured == '') ? 0 : $featured;
                //status data
                $status = $data[14];
                $productData['is_active'] = ($status == '') ? 1 : $status;
                //specs data
                $specsData = $data[15];
                $productData['prod_specification'] = $specsData;
                //description data
                $description = $data[16];
                $productData['prod_description'] = $description;
                //product slug
                $slug = Str::slug($name);
                $productData['prod_slug'] = $slug;
                //seller id data
                $productData['seller_id'] = $selectedSellerId;
                $match = ['seller_id' => $selectedSellerId, 'prod_sku' => $sku];
                $productObj = Products::updateOrCreate($match, $productData);
                $image = $data[17];
                if (!empty($image)) {
                    $contents = file_get_contents($image);
                    $fileName = time() . '_' . substr($image, strrpos($image, '/') + 1);
                    $sourcePath = '/product_images/' . $fileName;
                    Storage::disk('public')->put($sourcePath, $contents);
                    $productImagesk['image'] = '/product_images/' . $fileName;
                    $productImagesk['product_id'] = $productObj->id;
                    ProductImages::create($productImagesk);
                } else {
                    $productImagesk['image'] = '/product_images/1667993825_1.jpg';
                    $productImagesk['product_id'] = $productObj->id;
                    ProductImages::create($productImagesk);

                }
            }
        }
        session()->flash('success', 'Product added successfully!');
        return back();
    }

    private function getCategoryId($categoryName)
    {
        $categoryObj = DB::table('categories')
            ->whereRaw('LOWER(TRIM(name)) = ?', [strtolower(trim($categoryName))])
            ->first();
        if (empty($categoryObj)) {
            $categoryObj = DB::table('categories')
                ->whereRaw('LOWER(TRIM(name)) = ?', [strtolower(trim('Other'))])
                ->first();
            if (empty($categoryObj)) {
                $categoryObj = Category::create(['name' => 'Other', 'slug' => 'other', 'is_active' => 1]);
            }
        }
        return $categoryObj->id;
    }
    private function getSubCategoryId($subCategoryName, $categoryId)
    {
        $subCategoryObj = DB::table('categories')
            ->whereRaw('LOWER(TRIM(name))=?', [strtolower(trim($subCategoryName))])
            ->whereRaw('parent_id', $categoryId)
            ->first();
        if (empty($subcategoryObj)) {
            $subCategoryObj = DB::table('categories')
                ->whereRaw('LOWER(TRIM(name))=?', [strtolower(trim('Other'))])
                ->whereRaw('parent_id', $categoryId)
                ->first();
            if (empty($subCategoryObj)) {
                $subCategoryObj = Category::create(['name' => 'Other', 'slug' => 'other', 'parent_id' => $categoryId, 'is_active' => 1]);
            }
        }
        return $subCategoryObj->id;
    }

    private function getBrandId($brandName)
    {
        $brandObj = DB::table('brands')
            ->whereRaw('brand_name', [strtolower(trim($brandName))])
            ->first();

        if (empty($brandObj)) {
            $brandObj = DB::table('brands')
                ->whereRaw('brand_name', 'Other')
                ->first();
            if (empty($brandObj)) {
                $brandObj = Brands::create(['brand_name' => 'Other', 'brand_slug' => 'other', 'is_active' => 1]);
            }
        }
        return $brandObj->id;
    }

    private function getClibarId($caliberName)
    {
        $caliberObj = DB::table('caliber')
            ->whereRaw('caliber_name', $caliberName)
            ->first();
        if (empty($caliberObj)) {
            $caliberObj = DB::table('caliber')
                ->whereRaw('caliber_name', 'Other')
                ->first();
            if (empty($caliberObj)) {
                $caliberObj = Caliber::create(['caliber_name' => 'Other', 'caliber_slug' => 'other', 'is_active' => 1]);
            }
        }
        return $caliberObj->id;
    }

    private function getWeightId($weightName)
    {
        $weightObj = DB::table('weight')
            ->whereRaw('weight_name', $weightName)
            ->first();

        if (empty($weightObj)) {
            $weightObj = DB::table('weight')
                ->whereRaw('weight_name', 'Other')
                ->first();
            if (empty($weightObj)) {
                $weightObj = Weight::create(['weight_name' => 'Other']);
            }
        }
        return $weightObj->id;
    }
}