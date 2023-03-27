<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SellerData;
use App\Models\Brands;
use App\Models\Caliber;
use App\Models\ProductImages;
use App\Models\TechnicalBulletsModel;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\db;

use Excel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImportDataController extends Controller
{
    public function import_data(Request $request)
    {
        $i = 0;
        $excelFile = $request->file('import_product');
        $excelFilePath = $excelFile->store('temp');
        $tempDirPath = storage_path('temp');

        $tempDirPath = str_replace('temp', '/app/', $tempDirPath);

        $fullPath = $tempDirPath . $excelFilePath;

        $spreadsheet = IOFactory::load($fullPath);
        $selectedSellerId = $request->input('seller_id');
        $worksheet = $spreadsheet->getActiveSheet();
        for ($row = 2; $row <= $worksheet->getHighestRow(); $row++) {
            for ($col = 'A'; $col <= $worksheet->getHighestColumn(); $col++) {
                if ($selectedSellerId == 1) { //DAVIDSONS 
                    $name = $worksheet->getCell('A' . $row)->getValue();
                    $description = $worksheet->getCell('Q' . $row)->getValue();
                    if (empty($name)) {
                        $name = $description;
                    }
                    $productData['prod_name'] =  $name;
                    $productData['category_id'] = $this->getCategoryId($worksheet->getCell('B' . $row)->getValue());
                    $productData['sub_category_id'] = $this->getSubCategoryId($worksheet->getCell('C' . $row)->getValue(), $productData['category_id']);
                    $productData['brand_id'] = $this->getBrandId($worksheet->getCell('D' . $row)->getValue());

                    //caliber data
                    $productData['caliber_id'] = $this->getClibarId($worksheet->getCell('E' . $row)->getValue());
                    //weight data
                    $productData['weight_id'] = $this->getWeightId($worksheet->getCell('F' . $row)->getValue());
                    //sku data
                    $sku = $worksheet->getCell('G' . $row)->getValue();
                    $productData['prod_sku'] = $sku;
                    // mrp  ce data
                    $reqPrice = $worksheet->getCell('H' . $row)->getValue();
                    $productData['mrp_price'] = $reqPrice;
                    // sale price data
                    $salePrice = $worksheet->getCell('I' . $row)->getCalculatedValue();
                    $productData['prod_price'] = $salePrice;
                    // total stock data
                    $totalStock = $worksheet->getCell('J' . $row)->getValue();
                    $productData['total_stock'] = $totalStock;
                    // Video Url data
                    $videoUrl =  $worksheet->getCell('K' . $row)->getValue();
                    $productData['prod_video_url'] = $videoUrl;
                    // New arrival data
                    $newArrival = $worksheet->getCell('L' . $row)->getValue();
                    $productData['new_arrival'] = ($newArrival == '') ? 0 : $newArrival;
                    //best seller data
                    $bestSeller = $worksheet->getCell('M' . $row)->getValue();
                    $productData['best_seller'] = ($bestSeller == '') ? 0 : $bestSeller;
                    //featured data
                    $featured = $worksheet->getCell('N' . $row)->getValue();
                    $productData['featured'] = ($featured == '') ? 0 : $featured;
                    //status data
                    $status = $worksheet->getCell('O' . $row)->getValue();
                    $productData['is_active'] = ($status == '') ? 1 : $status;
                    //specs data
                    $specsData = $worksheet->getCell('P' . $row)->getValue();
                    $productData['prod_specification'] = $specsData;
                    //description data

                    $productData['prod_description'] = $description;
                    //product slug
                    $slug = Str::slug($name);
                    $productData['prod_slug'] = $slug;
                    //seller id data
                    $productData['seller_id'] = $selectedSellerId;
                    $match = ['seller_id' => $selectedSellerId, 'prod_sku' => $sku];
                    $productObj = Products::updateOrCreate($match, $productData);
                    $technicalData['technical_bullets1'] = $request->get('technical_bullets1');
                    $technicalData['technical_bullets2'] = $request->get('technical_bullets2');
                    $technicalData['technical_bullets3'] = $request->get('technical_bullets3');
                    $technicalData['technical_bullets4'] = $request->get('technical_bullets4');
                    $technicalData['technical_bullets5'] = $request->get('technical_bullets5');
                    $technicalData['technical_bullets6'] = $request->get('technical_bullets6');
                    $technicalData['technical_bullets7'] = $request->get('technical_bullets7');
                    $technicalData['technical_bullets8'] = $request->get('technical_bullets8');
                    $technicalData['technical_bullets9'] = $request->get('technical_bullets9');
                    $technicalData['technical_bullets10'] = $request->get('technical_bullets10');
                    $technicalData['technical_bullets11'] = $request->get('technical_bullets11');
                    $technicalData['technical_bullets12'] = $request->get('technical_bullets12');
                    $technicalData['technical_bullets13'] = $request->get('technical_bullets13');
                    $technicalData['technical_bullets14'] = $request->get('technical_bullets14');
                    $technicalData['technical_bullets15'] = $request->get('technical_bullets15');
                    $technicalData['product_id'] = $productObj->id;
                    $match = ['product_id' => $productObj->id,];
                    TechnicalBulletsModel::updateOrCreate($match,$technicalData);
                    $image = $worksheet->getCell('R' . $row)->getValue();
                    if (!empty($image)) {
                        //echo "\nimage".$image;
                        $contents = file_get_contents($image);
                        $fileName = time() . '_' . substr($image, strrpos($image, '/') + 1);
                        $fileNameArr = explode('?', $fileName);
                        $fileName = $fileNameArr[0];
                        Storage::disk('public_product')->put($fileName, $contents);
                        $productImagesk['image'] = '/product_images/' . $fileName;
                        $productImagesk['product_id'] = $productObj->id;
                        ProductImages::create($productImagesk);
                    } else {
                        $productImagesk['image'] = '/product_images/1667993825_1.jpg';
                        $productImagesk['product_id'] = $productObj->id;
                        ProductImages::create($productImagesk);
                    }
                } elseif ($selectedSellerId == 2) {
                    //Name data
                    $name = $worksheet->getCell('A' . $row)->getValue();
                    $description = $worksheet->getCell('Q' . $row)->getValue();
                    if (empty($name)) {
                        $name = $description;
                    }
                    $productData['prod_name'] = $name;
                    //category data
                    $productData['category_id'] = $this->getCategoryId($worksheet->getCell('B' . $row)->getValue());
                    //subcategory data
                    $productData['sub_category_id'] = $this->getSubCategoryId($worksheet->getCell('C' . $row)->getValue(), $productData['category_id']);
                    //brand data
                    $productData['brand_id'] = $this->getBrandId($worksheet->getCell('D' . $row)->getValue());
                    //caliber data
                    $productData['caliber_id'] = $this->getClibarId($worksheet->getCell('E' . $row)->getValue());
                    //weight data
                    $productData['weight_id'] = $this->getWeightId($worksheet->getCell('F' . $row)->getValue());
                    //sku data
                    $sku = $worksheet->getCell('G' . $row)->getValue();
                    $productData['prod_sku'] = $sku;
                    // mrp price data
                    $reqPrice = $worksheet->getCell('H' . $row)->getValue();
                    $productData['mrp_price'] = $reqPrice;
                    // sale price data
                    $salePrice = $worksheet->getCell('I' . $row)->getCalculatedValue();
                    $productData['prod_price'] = $salePrice;
                    // total stock data
                    $totalStock = $worksheet->getCell('J' . $row)->getValue();
                    $productData['total_stock'] = $totalStock;
                    // Video Url data
                    $videoUrl = $worksheet->getCell('K' . $row)->getValue();
                    $productData['prod_video_url'] = $videoUrl;
                    // New arrival data
                    $newArrival = $worksheet->getCell('L' . $row)->getValue();
                    $productData['new_arrival'] = ($newArrival == '') ? 0 : $newArrival;
                    //best seller data
                    $bestSeller = $worksheet->getCell('M' . $row)->getValue();
                    $productData['best_seller'] = ($bestSeller == '') ? 0 : $bestSeller;
                    //featured data
                    $featured = $worksheet->getCell('N' . $row)->getValue();
                    $productData['featured'] = ($featured == '') ? 0 : $featured;
                    //status data
                    $status = $worksheet->getCell('O' . $row)->getValue();
                    $productData['is_active'] = ($status == '') ? 1 : $status;
                    //specs data
                    $specsData = $worksheet->getCell('P' . $row)->getValue();
                    $productData['prod_specification'] = $specsData;
                    //description data
                    $description = $worksheet->getCell('Q' . $row)->getValue();
                    $productData['prod_description'] = $description;
                    //product slug
                    $slug = Str::slug($name);
                    $productData['prod_slug'] = $slug;
                    //seller id data
                    $productData['seller_id'] = $selectedSellerId;
                    $match = ['seller_id' => $selectedSellerId, 'prod_sku' => $sku];
                    $productObj = Products::updateOrCreate($match, $productData);
                    $image = $worksheet->getCell('R' . $row)->getValue();
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
