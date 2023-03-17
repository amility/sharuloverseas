<?php

namespace App\Imports;

use App\Models\Brands;
use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\TechnicalBulletsModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Storage;

class FirstSheetImport implements ToModel, WithHeadingRow, WithBatchInserts, WithCalculatedFormulas
{

    public function batchSize(): int
    {
        return 500;
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|void|null
     */
    public function model(array $row)
    {
        try {

            $brand = $this->saveBrand($row[ 'brand' ]);

            $category = $this->saveCategory($row[ 'main_category' ]);

            $subCategory = $this->saveSubCategory($category, $row[ 'sub_category' ]);

            $product = $this->saveProduct($brand, $category->id, $subCategory->id, $row);

            //$row = $this->setProductImage($row, $product);

            //$row = $this->setProductPDF($row, $product);

            if ($product->save()) {
                $technicalBullets = TechnicalBulletsModel::firstOrNew([
                    'product_id' => $product->id,
                ]);

                $technicalBullets->technical_bullets1 = $row[ 'technical_bullet_1' ];
                $technicalBullets->technical_bullets2 = $row[ 'technical_bullet_2' ];
                $technicalBullets->technical_bullets3 = $row[ 'technical_bullet_3' ];
                $technicalBullets->technical_bullets4 = $row[ 'technical_bullet_4' ];
                $technicalBullets->technical_bullets5 = $row[ 'technical_bullet_5' ];
                $technicalBullets->technical_bullets6 = $row[ 'technical_bullet_6' ];
                $technicalBullets->technical_bullets7 = $row[ 'technical_bullet_7' ];
                $technicalBullets->technical_bullets8 = $row[ 'technical_bullet_8' ];
                $technicalBullets->technical_bullets9 = $row[ 'technical_bullet_9' ];
                $technicalBullets->technical_bullets10 = $row[ 'technical_bullet_10' ];
                $technicalBullets->technical_bullets11 = $row[ 'technical_bullet_11' ];
                $technicalBullets->technical_bullets12 = $row[ 'technical_bullet_12' ];
                $technicalBullets->technical_bullets13 = $row[ 'technical_bullet_13' ];
                $technicalBullets->technical_bullets14 = $row[ 'technical_bullet_14' ];
                $technicalBullets->technical_bullets15 = $row[ 'technical_bullet_15' ];

                $technicalBullets->save();

                //$this->saveExtraProductImages($row, $product);
            }

        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), $exception->getLine(), $exception->getFile());
            //dd($exception->getMessage(), $exception->getLine(), $exception->getFile());
        }
    }

    /**
     * @param $brand1
     * @return mixed
     */
    protected function saveBrand($brand1)
    {
        if ( !empty($brand1)) {
            $brand = Brands::firstOrNew([
                'brand_slug' => Str::slug($brand1)
            ]);

            $brand->brand_name = $brand1;
            $brand->is_active = true;
            $brand->save();

            return $brand;
        }
    }

    /**
     * @param       $brand
     * @param       $categoryId
     * @param       $subCategoryId
     * @param array $row
     * @return Products
     */
    protected function saveProduct($brand, $categoryId, $subCategoryId, array $row): Products
    {
        $product = Products::firstOrNew([
            'category_id'     => $categoryId,
            'sub_category_id' => $subCategoryId,
            'brand_id'        => isset($brand->id) && !is_null($brand->id) ? $brand->id : null,
            'prod_sku'        => $row[ 'brand_product_id' ],
            'prod_slug'       => Str::slug($row[ 'brand' ] . "" . $row[ 'brand_product_id' ]),
        ]);

        $product->prod_price = isset($row[ 'price' ]) && !empty($row[ 'price' ]) ? $row[ 'price' ] : $product->prod_price;
        $product->total_stock = 50;
        $product->prod_description = isset($row[ 'description' ]) && !empty($row[ 'description' ]) ? $row[ 'description' ] : $product->prod_description;
        $product->prod_details = isset($row[ 'long_text' ]) && !empty($row[ 'long_text' ]) ? $row[ 'long_text' ] : $product->prod_details;
        $product->prod_specification = isset($row[ 'long_text_html' ]) && !empty($row[ 'long_text_html' ]) ? $row[ 'long_text_html' ] : $product->prod_specification;
        $product->prod_video_url = isset($row[ 'product_video' ]) && !empty($row[ 'product_video' ]) ? $row[ 'product_video' ] : $product->prod_video_url;
        $product->featured = false;
        $product->new_arrival = false;
        $product->best_seller = false;

        if (isset($row[ 'product_short_name' ]) && !empty($row[ 'product_short_name' ])) {
            $product->prod_name = $row[ 'product_short_name' ];
        } else {
            $product->prod_name = Str::upper($row[ 'brand' ]) . " " . $row[ 'brand_product_id' ];
        }

        $product->is_active = isset($product->is_active) && $product->is_active ? $product->is_active : 0; //Keeping product inactive by default

        return $product;
    }

    /**
     * @param $main_category
     * @return mixed
     */
    protected function saveCategory($main_category)
    {
        $category = Category::firstOrNew([
            'slug' => Str::slug($main_category)
        ]);

        $category->name = $main_category;
        $category->parent_id = null;

        $category->save();

        return $category;
    }

    /**
     * @param $category
     * @param $sub_category
     * @return mixed
     */
    protected function saveSubCategory($category, $sub_category)
    {
        $subCategory = Category::firstOrNew([
            'parent_id' => $category->id,
            'slug'      => Str::slug($sub_category)
        ]);

        $subCategory->name = $sub_category;
        $subCategory->parent_id = $category->id;

        $subCategory->save();

        return $subCategory;
    }

    /**
     * @param        $fileUrl
     * @param string $type
     * @return string|null
     */
    protected function saveFileFromURL($fileUrl, $type = '')
    {
        $path = null;
        $folder = $type == 'pdf' ? 'product_pdf' : 'product_images';
        $contents = file_get_contents($fileUrl);
        $name = substr($fileUrl, strrpos($fileUrl, '/') + 1);
        $store = Storage::put('/storage/' . $folder . '/' . $name, $contents, 'public');
        if ($store) {
            $path = '/storage/' . $folder . '/' . $name;
        }

        return $path;
    }

    /**
     * @param array    $row
     * @param Products $product
     * @return array
     */
    protected function setProductPDF(array $row, Products $product): array
    {
        $dataSheetPath = null;
        if (isset($row[ 'datasheet' ]) && !empty($row[ 'datasheet' ])) {
            $dataSheetPath = $this->saveFileFromURL($row[ 'datasheet' ]);
        }
        $product->prod_pdf = $dataSheetPath;

        return $row;
    }

    /**
     * @param array    $row
     * @param Products $product
     * @return array
     */
    protected function setProductImage(array $row, Products $product): array
    {
        $mainImagePath = null;
        if (isset($row[ 'image_1' ]) && !empty($row[ 'image_1' ])) {
            $mainImagePath = $this->saveFileFromURL($row[ 'image_1' ]);
        }
        $product->image = $mainImagePath;

        return $row;
    }

    /**
     * @param array    $row
     * @param Products $product
     */
    protected function saveExtraProductImages(array $row, Products $product): void
    {
        $hasSecondImage = isset($row[ 'image_2_final' ]) && !empty($row[ 'image_2_final' ]);
        $hasApplicationImage = isset($row[ 'image_application_01' ]) && !empty($row[ 'image_application_01' ]);
        $hasSecondApplicationImage = isset($row[ 'image_application_02' ]) && !empty($row[ 'image_application_02' ]);

        if ($hasSecondImage) {
            $secondImagePath = $this->saveFileFromURL($row[ 'image_2_final' ]);
            $productImages = new ProductImages();
            $productImages->image = $secondImagePath;
            $productImages->product_id = $product->id;
            $productImages->save();
        }

        if ($hasApplicationImage) {
            $secondImagePath = $this->saveFileFromURL($row[ 'image_application_01' ]);
            $productImages = new ProductImages();
            $productImages->image = $secondImagePath;
            $productImages->product_id = $product->id;
            $productImages->save();
        }

        if ($hasSecondApplicationImage) {
            $secondImagePath = $this->saveFileFromURL($row[ 'image_application_02' ]);
            $productImages = new ProductImages();
            $productImages->image = $secondImagePath;
            $productImages->product_id = $product->id;
            $productImages->save();
        }
    }
}
