<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Repositories\ProductsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Brands;
use App\Models\Caliber;
use App\Models\Weight;
use App\Models\Category;
use App\Models\ProductImages;
use App\Models\ProductPdf;
use App\Models\TechnicalBulletsModel;
use Illuminate\Http\Request;
use App\Models\Products;
use Flash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute;
use App\Models\ProductVariation;
use App\Models\ProductAttributeVariant;
    
class ProductsController extends AppBaseController
{

    /** @var  ProductsRepository */
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * Display a listing of the Products.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $products = Products::with('categoryData')
        ->with('brandData','caliberData')
        ->orderby('id','desc')
        ->get();
        
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new Products.
     *
     * @return Response
     */

    public function create()
    {
        $categories = Category::getParentCategoryLists();
        
        //return $categories;
        $sub_categories = [];
        $brands = Brands::pluck('brand_name', 'id');
        $caliber = Caliber::pluck('caliber_name','id');
        $weight = DB::table('shipping')->whereNotNull('min_weight')->whereNotNull('max_weight')->get();
        return view('admin.products.create', compact('categories', 'sub_categories', 'brands','caliber','weight'));
    }


    function getSubCategory(Request $request)
    {
       
        
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('categories')
                  ->where($select, $value)
                  ->get();

        $output = '<option value="">Select Sub Category</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }

    /**
     * Store a newly created Products in storage.
     *
     * @param CreateProductsRequest $request
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {


        $arrProductData = [];
        $arrProductData[ 'prod_name' ] = $request->get('prod_name');
        $arrProductData[ 'prod_slug' ] = $request->get('prod_slug');
        $arrProductData[ 'category_id' ] = $request->get('category_id');
        $arrProductData[ 'sub_category_id' ] = $request->get('sub_category_id');
         $arrProductData[ 'weight_id' ] = $request->get('weight_id');
        $arrProductData[ 'brand_id' ] = $request->get('brand_id');
        $arrProductData[ 'caliber_id' ] = $request->get('caliber_id');
        $arrProductData[ 'prod_sku' ] = $request->get('prod_sku');
        $arrProductData[ 'mrp_price' ] = $request->get('mrp_price');
        $arrProductData[ 'prod_price' ] = $request->get('prod_price');
        $arrProductData[ 'total_stock' ] = $request->get('total_stock');
        $arrProductData[ 'prod_description' ] = $request->get('prod_description');
        $arrProductData[ 'prod_details' ] = $request->get('prod_details');
        
        $arrProductData[ 'prod_specification' ] = $request->get('prod_specification');

        //variation flag
        
        $arrProductData['variationFlag'] =!empty( $request->get('variationFlag')? $request->get('variationFlag'):'0');

        //end
        $arrProductData[ 'prod_video_url' ] = $request->get('prod_video_url');
        if ($request->get('new_arrival')) {
            $arrProductData[ 'new_arrival' ] = $request->get('new_arrival');
        } else {
            $arrProductData[ 'new_arrival' ] = 0;
        }

        if ($request->get('featured')) {
            $arrProductData[ 'featured' ] = $request->get('featured');
        } else {
            $arrProductData[ 'featured' ] = 0;
        }
        if ($request->get('best_seller')) {
            $arrProductData[ 'best_seller' ] = $request->get('best_seller');
        } else {
            $arrProductData[ 'best_seller' ] = 0;
        }
        if ($request->get('is_active')) {
            //dd("hello");
            $arrProductData[ 'is_active' ] = $request->get('is_active');
        } else {
            //dd("hello3");
            $arrProductData[ 'is_active' ] = 0;
        }

        //dd($arrProductData);
        if ($request->file('front_image') || $request->file('back_image')
        || $request->file('left_image') || $request->file('right')
        ) {
            $arrProductData['custom_product'] = '1';
        }

        if ($request->file('prod_pdf')) {

            $fileName = time() . '_' . $request->prod_pdf->getClientOriginalName();
            $filePath = $request->file('prod_pdf')->storeAs('product_pdf', $fileName, 'public');
            $arrProductData[ 'prod_pdf' ] = '/storage/' . $filePath;
        }

        $products = $this->productsRepository->create($arrProductData);
        $product_id = $products->id;
        //technical bullets data
        if ($products) {
            $technicalData[ 'technical_bullets1' ] = $request->get('technical_bullets1');
            $technicalData[ 'technical_bullets2' ] = $request->get('technical_bullets2');
            $technicalData[ 'technical_bullets3' ] = $request->get('technical_bullets3');
            $technicalData[ 'technical_bullets4' ] = $request->get('technical_bullets4');
            $technicalData[ 'technical_bullets5' ] = $request->get('technical_bullets5');
            $technicalData[ 'technical_bullets6' ] = $request->get('technical_bullets6');
            $technicalData[ 'technical_bullets7' ] = $request->get('technical_bullets7');
            $technicalData[ 'technical_bullets8' ] = $request->get('technical_bullets8');
            $technicalData[ 'technical_bullets9' ] = $request->get('technical_bullets9');
            $technicalData[ 'technical_bullets10' ] = $request->get('technical_bullets10');
            $technicalData[ 'technical_bullets11' ] = $request->get('technical_bullets11');
            $technicalData[ 'technical_bullets12' ] = $request->get('technical_bullets12');
            $technicalData[ 'technical_bullets13' ] = $request->get('technical_bullets13');
            $technicalData[ 'technical_bullets14' ] = $request->get('technical_bullets14');
            $technicalData[ 'technical_bullets15' ] = $request->get('technical_bullets15');
            $technicalData[ 'product_id' ] = $product_id;


            TechnicalBulletsModel::create($technicalData);
        }
        $product_id = $products->id;

        // for($i = 1; $i <= 4; $i++)
        // {
            $aa = [
                'a'=>"h",
                'b'=>"hh",
                'c'=>"hhh",
                'd'=>"hhhh",
            ];
            // foreach($aa as $a)
            // {
              
                
                if ($request->file('front_image')) {
                    $image = $request->file('front_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Customize_image'), $new_name);
                    $productImages['image'] = '/Customize_image/'.$new_name;
                    $productImages['isCustom_Image'] = '1';
                    $productImages['ViewTypeId'] = '1';
                    $productImages['product_id'] = $product_id;
                    ProductImages::create($productImages);

                }

                if ($request->file('back_image')) {
                    $image = $request->file('back_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Customize_image'), $new_name);
                    $productImages['image'] = '/Customize_image/'.$new_name;
                    $productImages['isCustom_Image'] = '1';
                    $productImages['ViewTypeId'] = '2';
                    $productImages['product_id'] = $product_id;
                    ProductImages::create($productImages);

                }

                if ($request->file('left_image')) {
                    $image = $request->file('left_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Customize_image'), $new_name);
                    $productImages['image'] = '/Customize_image/'. $new_name;
                    $productImages['isCustom_Image'] = '1';
                    $productImages['ViewTypeId'] = '3';
                    $productImages['product_id'] = $product_id;
                    ProductImages::create($productImages);

                }

                if ($request->file('right_image')) {
                    $image = $request->file('right_image');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('Customize_image'), $new_name);
                    $productImages['image'] = '/Customize_image/' .$new_name;
                    $productImages['isCustom_Image'] = '1';
                    $productImages['ViewTypeId'] = '4';
                    $productImages['product_id'] = $product_id;
                    ProductImages::create($productImages);

                }
        
        
        
            // }
           
    
        // }  

        if ($request->file('file')) {
            foreach ($request->file('file') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('../public/product_images/', $fileName);
                $original_name = $file->getClientOriginalName();
                $productImagesk['image'] = '/product_images/' . $fileName;
                $productImagesk['product_id'] = $product_id;
                ProductImages::create($productImagesk);

            }
        }
       

        Flash::success('Products saved successfully.');

        return response()->json(['status' => "success", 'product_id' => $product_id]);
    }

    public function storeImage(Request $request)
    {
        // return $request->all();
        if ($request->file('file')) {
            $product_id = $request->product_id;
            foreach ($request->file('file') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('../public/product_images/', $fileName);
                $original_name = $file->getClientOriginalName();
                ProductImages::create(['image' => '/product_images/' . $fileName, 'product_id' => $product_id]);

            }
            Flash::success('Products saved successfully.');

            return response()->json(['status' => "success", 'imgdata' => $original_name, 'product_id' => $product_id]);
        }
    }

    /**
     * Display the specified Products.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect('c~AiN:2)Y42,&*/products');
        }
        //

        //$arrOutput['technical_bullets']=$technical_bullets;
        $products[ 'technical_bullets' ] = DB::table('technical_bullets')->where('product_id', $id)->first();
        $products[ 'sub_category' ] = DB::table('categories')->where('id', $products[ 'sub_category_id' ])->first();
        $products[ 'category' ] = DB::table('categories')->where('id', $products[ 'category_id' ])->first();
        $products[ 'brands' ] = DB::table('brands')->where('id', $products[ 'brand_id' ])->first();
         $products[ 'caliber' ] = DB::table('caliber')->where('id', $products[ 'caliber_id' ])->first();
         $products[ 'weight' ] = DB::table('shipping')->whereNotNull('min_weight')->whereNotNull('max_weight')->get();
        $products[ 'product_images' ] = DB::table('product_images')->where('product_id', $products[ 'id' ])->get();

        //

        return view('admin.products.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified Products.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //dd($id);
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect('c~AiN:2)Y42,&*/products');
        }
        $categories = Category::getParentCategoryLists();
        //$technical_bullets=
        $sub_categories = [];
        $brands = Brands::pluck('brand_name', 'id');
        $caliber = Caliber::pluck('caliber_name', 'id');
        $weight = DB::table('shipping')->whereNotNull('min_weight')->whereNotNull('max_weight')->get();

        $arrOutput[ 'products' ] = $products;
        $arrOutput[ 'sub_categories' ] = $sub_categories;
        $arrOutput[ 'categories' ] = $categories;
        $arrOutput[ 'brands' ] = $brands;
        $arrOutput[ 'caliber' ] = $caliber;
        $arrOutput[ 'weight' ] = $weight;
        //$arrOutput['technical_bullets']=$technical_bullets;
        $arrOutput[ 'technical_bullets' ] = DB::table('technical_bullets')->where('product_id', $id)->first();
        $arrOutput[ 'sub_category' ] = DB::table('categories')->where('id', $products[ 'sub_category_id' ])->first();
        $arrOutput[ 'product_images' ] = DB::table('product_images')->where('product_id', $products[ 'id' ])->get();

        //dd($arrOutput);

        return view('admin.products.edit')->with($arrOutput);
        // return view('admin.products.edit')->with('products', $products);
    }

    /**
     * Update the specified Products in storage.
     *
     * @param int                   $id
     * @param UpdateProductsRequest $request
     * @return Response
     */
    public function update($id, UpdateProductsRequest $request)
    {

        $products = $this->productsRepository->find($id);

        $technical = TechnicalBulletsModel::find($request[ 'technical_id' ]);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect('c~AiN:2)Y42,&*/products');
        }
        $products[ 'prod_name' ] = $request->prod_name;
        $products[ 'prod_slug' ] = $request->prod_slug;
        $products[ 'prod_sku' ] = $request->prod_sku;
        $products[ 'category_id' ] = $request->category_id;
        $products[ 'sub_category_id' ] = $request->sub_category_id;
        $products[ 'weight_id' ] = $request->weight_id;
        $products[ 'brand_id' ] = $request->brand_id;
        $products[ 'caliber_id' ] = $request->caliber_id;
        $products[ 'prod_price' ] = $request->prod_price;
        $products[ 'total_stock' ] = $request->total_stock;
        $products[ 'prod_video_url' ] = $request->prod_video_url;
        $products[ 'prod_specification' ] = $request->prod_specification;
        $products[ 'prod_details' ] = $request->prod_details;
        $products[ 'prod_description' ] = $request->prod_description;

        if ($request->new_arrival) {
            $products[ 'new_arrival' ] = $request->new_arrival;
        } else {
            $products[ 'new_arrival' ] = 0;
        }

        if ($request->featured) {
            $products[ 'featured' ] = $request->featured;
        } else {
            $products[ 'featured' ] = 0;
        }
        if ($request->best_seller) {
            $products[ 'best_seller' ] = $request->best_seller;
        } else {
            $products[ 'best_seller' ] = 0;
        }
        if ($request->is_active) {
            $products[ 'is_active' ] = $request->is_active;
        } else {
            $products[ 'is_active' ] = 0;
        }


        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png'
            ]);
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('product_images', $fileName, 'public');
            $products[ 'image' ] = '/storage/' . $filePath;
        }

        if ($request->file('prod_pdf')) {

            $request->validate([
                'prod_pdf'           => 'mimes:pdf',
                'technical_bullets1' => 'required|string'
            ]);

            $fileName = time() . '_' . $request->prod_pdf->getClientOriginalName();
            $filePath = $request->file('prod_pdf')->storeAs('product_pdf', $fileName, 'public');
            $products[ 'prod_pdf' ] = '/storage/' . $filePath;
        }
        $products->save();

        //$products = $this->productsRepository->update($request->all(), $id);

        $technical->technical_bullets1 = $request[ 'technical_bullets1' ];
        $technical->technical_bullets2 = $request[ 'technical_bullets2' ];
        $technical->technical_bullets3 = $request[ 'technical_bullets3' ];
        $technical->technical_bullets4 = $request[ 'technical_bullets4' ];
        $technical->technical_bullets5 = $request[ 'technical_bullets5' ];
        $technical->technical_bullets6 = $request[ 'technical_bullets6' ];
        $technical->technical_bullets7 = $request[ 'technical_bullets7' ];
        $technical->technical_bullets8 = $request[ 'technical_bullets8' ];
        $technical->technical_bullets9 = $request[ 'technical_bullets9' ];
        $technical->technical_bullets10 = $request[ 'technical_bullets10' ];
        $technical->technical_bullets11 = $request[ 'technical_bullets11' ];
        $technical->technical_bullets12 = $request[ 'technical_bullets12' ];
        $technical->technical_bullets13 = $request[ 'technical_bullets13' ];
        $technical->technical_bullets14 = $request[ 'technical_bullets14' ];
        $technical->technical_bullets15 = $request[ 'technical_bullets15' ];

        $technical->save();
        //  if ( !empty($products)) {
        //     if ($prductSubImg = $request->file('sub_image')) {
        //         $arrSubProdImg = [];
        //         foreach ($prductSubImg as $file) {
        //             $fileName = time() . '_' . $file->getClientOriginalName();
        //             $filePath = $file->storeAs('product_images', $fileName, 'public');
        //             $arrSubProdImg[] = new ProductImages(['image' => '/storage/' . $filePath]);

        //         }

        //         $products->images()->saveMany($arrSubProdImg);
        //     }
        // }
         if ($request->file('file')) {
            $product_id = $id;
            foreach ($request->file('file') as $file) {

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move('../public/product_images/', $fileName);
                $original_name = $file->getClientOriginalName();
                ProductImages::create(['image' => '/product_images/' . $fileName, 'product_id' => $product_id]);

            }
        }
        
        Flash::success('Products updated successfully.');

        // return redirect('c~AiN:2)Y42,&*/products');
        return response()->json([
            'status'=>'success',
             'message1' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Product update successfully
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>',
             'product_id' => $id
            ]);
    }

    /**
     * Remove the specified Products from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect('c~AiN:2)Y42,&*/products');
        }

        $this->productsRepository->delete($id);

        Flash::success('Products deleted successfully.');

        return redirect('c~AiN:2)Y42,&*/products');
    }


    public function delete(Request $request)
    {

        $data = ProductImages::find($request[ 'id' ]);

        $file = $data[ 'image' ];
        if (File::delete(public_path($file))) {

            DB::table('product_images')->where('id', $request[ 'id' ])->delete();

        } else {
            dd('File does not exists. ');
        }

        Flash::success('Products image deleted successfully.');

        if ($request[ 'edit' ] == 'show') {

            return redirect()->route('products.show', $request[ 'pro_id' ]);
        }

    }

    public function deleteImages(Request $request)
    {
        $data = ProductImages::find($request[ 'image_id' ]);
        $file = $data[ 'image' ];
        if (File::delete(public_path($file))) {
            DB::table('product_images')->where([
                'id'         => $request[ 'image_id' ],
                'product_id' => $request[ 'product_id' ]
            ])->delete();
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    function fetch_image($id)
    {
        // dd($id);
        $images = DB::table('product_images')->where('product_id', $id)->get()->toArray();
        if ($images == null) {

        } else {
            $output = '<div class="row" style="margin-top: 15px;">';
            foreach ($images as $image) {
                $output .= '
                <div class="col-md-2" style="margin-bottom:16px;" align="center">
                        <img src="' . asset($image->image) . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                        <button type="button" class="btn btn-link remove_image" onclick="removeProductImage(' . $image->product_id . ',' . $image->id . ')">Remove</button>
                    </div>
                ';
            }
            $output .= '</div>';
            echo $output;
        }
    }

    public function removeVideo(Request $request)
    {
        $success = Products::where('id', $request->id)->update(['prod_video_url' => null]);
        if ($success) {
            Flash::success('Products video deleted successfully.');

            return redirect()->route('products.show', $request->id);
        }
        Flash::success('Something went wrong.');

        return redirect()->route('products.show', $request->id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getImportForm()
    {
        return view('admin.products.import');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function import(Request $request)
    {
        $this->validateExcelBeforeImport($request);

        try {
            $guessExtension = $request->file('excel_data_sheet')->guessExtension();

            $now = Carbon::now()->format('Y-m-d');

            $file = $request->file('excel_data_sheet')->storeAs('imports',
                'product_import_sheet_latest_' . $now . '.' . $guessExtension);

            Artisan::call('import:products', [
                '--path' => 'app/' . $file,
            ]);

            Flash::success('Imported SuccessFully! Please verify Products.');

            return redirect()->route('products.index');
        } catch (\Throwable $exception) {

            Flash::error('Products Import Failed! Please contact Technical team - Status Error Info: ' . $exception->getMessage());

            return redirect()->route('products.index');
        }
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateExcelBeforeImport(Request $request): void
    {
        $validator = Validator::make(
            [
                'file'      => $request->excel_data_sheet,
                'extension' => strtolower($request->excel_data_sheet->getClientOriginalExtension()),
            ],
            [
                'file'      => 'required',
                'extension' => 'required|in:xlsx,xls',
            ]
        );

        $validator->validate();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSampleSheet(Request $request)
    {
        return response()->download(storage_path("app/imports/product_import_sheet_latest.xlsx"));
    }
    public function productStatusUpdate(Request $request){
        // dd($request['status']);
        $request->validate([
        'product' => 'array|required',
        'status' => 'required'
    ]);
        for($i=0; $i<count($request['product']); $i++){
            //dd($request['product'][$i]);
            $query = DB::table('products')
       ->where('id',$request['product'][$i])
       ->update(array('is_active' =>$request['status']));

        }
        Flash::success('Product status updated successfully.');
        return redirect()->route('products.index');

    }
    public function variant()
    {
        $categories = Category::getParentCategoryLists();
        $sub_categories = [];
        $brands = Brands::pluck('brand_name', 'id');
         $caliber = Caliber::pluck('caliber_name', 'id');
         
        $attribute = Attribute::get();
        return view('admin.products_variant.create', compact('categories', 'sub_categories', 'brands','attribute','caliber'));
    }
    public function variantStore(Request $request)
    {
        // return $request;
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
        if($validation->passes())
           {
            if($request->choose_img1 == '1')
            {
                $image = $request->file('select_file');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VariationImage'), $new_name);
            }
            if($request->choose_img2 == '2')
            {
                $image = $request->file('select_file1');
                $new_name1 = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VariationImage'), $new_name1);
            }
            if($request->choose_img3 == '3')
            {
                $image = $request->file('select_file2');
                $new_name2 = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VariationImage'), $new_name2);
            }
            if($request->choose_img4 == '4')
            {
                $image = $request->file('select_file3');
                $new_name3 = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('VariationImage'), $new_name3);
            }

            //
            $productVariation = new ProductVariation();
            $productVariation->product_id= $request->get('product_id');
            $productVariation->sku= $request->get('sku');
            $productVariation->qty= $request->get('qty');
            $productVariation->regular_price= $request->get('regular_price');
            $productVariation->sale_price= $request->get('sale_price');
            $productVariation->description= $request->get('description');
            $productVariation->save();
            $c = $request->get('attribute_variat_id');
            foreach($request->get('attribute_id') as $key => $attri)
            {
                $attribute_id = str_replace( array( '\'', '"', '[', ']' ), '', $c[$key]);
                $value = DB::table('attribute_value')->where('id',$attribute_id)->pluck('value')->first();
                $pro_attr_var = new ProductAttributeVariant();
                $pro_attr_var->product_id = $request->get('product_id');
                $pro_attr_var->product_variation_id = $productVariation->id;        
                $pro_attr_var->attribute_id = $attri;
                $pro_attr_var->attibute_value_id = $attribute_id;
                $pro_attr_var->value = $value;
                $pro_attr_var->front_image = !empty($new_name)?$new_name:null;
                $pro_attr_var->left_image = !empty($new_name1)?$new_name1:null;
                $pro_attr_var->right_image = !empty($new_name2)?$new_name2:null;
                $pro_attr_var->back_image = !empty($new_name3)?$new_name3:null;
                $pro_attr_var->save();
            }
             $product_id = $request->get('product_id');
             return response()->json([
                'status'=>'success',
                 'message1' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Product variations save successfully
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>',
                 'product_id' => $product_id
                ]);

            //
           }
           else
           {
            return response()->json([
             'message'   => $validation->errors()->all(),
             'class_name'  => 'alert-danger'
            ]);
        }
      
        
    }
}
