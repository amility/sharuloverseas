<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Models\BannerImages;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Brands;
use App\Models\Caliber;
use App\Models\Products;
use App\Models\About;
use App\Models\Terms;
use App\Models\Privacy;
use App\Models\TechnicalBulletsModel;
use App\Models\clipArt;
use App\Models\text;
use App\Models\color;
use App\Models\Gunshow;
use Illuminate\Http\Request;
use App\Models\IP;

use Flash;
use Response;

class PagesController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function home(Request $request)
    {
        // $objBannerImages = BannerImages::get()->toArray();
        // $objBrand = Brands::get()->toArray();
        
        
         $data=new IP;
    $data->ip=$request->ip();
    $data->save();
        $arrOutput = [];
        // $arrOutput['bannerImage'] = BannerImages::get()->toArray();
        $arrOutput['bannerImage'] = BannerImages::orderBy('preference','asc')->get()->toArray();
         //dd($arrOutput);
        $arrOutput['brandLists'] = Brands::get()->toArray();
        $arrOutput['products'] = Products::with('images')->where('is_active', '1')->orderby('id','DESC')->take(8)->get()->toArray();
        //dd($arrOutput['products']);
        // for count
        $arrOutput['featuredCount'] = Products::where(['featured' => 1, 'is_active' => '1'])->count();
        $arrOutput['new_arrivalCount'] = Products::where(['new_arrival' => 1, 'is_active' => '1'])->count();
        $arrOutput['best_sellerCount'] = Products::where(['best_seller' => 1, 'is_active' => '1'])->count();
        $arrOutput['non_fflCount'] = Products::where(['category_id' => 74, 'is_active' => '1'])->count();
        // for best seller query
        $arrOutput['best_seller1'] = Products::with('images')->where(['best_seller' => 1, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $prod = Products::where(['best_seller' => 1, 'is_active' => '1'])->count();
        $arrOutput['best_seller'] = Products::with('images')->where(['best_seller' => 1, 'is_active' => '1'])->orderBy('created_at','desc')->skip(1)->take('6')->get()->toArray();
        $arrOutput['non_ffl'] = Products::with('images')->where(['category_id' =>74, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $arrOutput['access'] = Products::with('images')->where(['category_id' =>70, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $arrOutput['categories'] = Category::with('children')->where('parent_id', '=', null)
        ->where('deleted_at', '=', null)->get()->toArray();
        // dd($arrOutput)
        // end
        
        return view('templates.default.screen.home')
            ->with($arrOutput);
    }








     public function home1(Request $request)
    {
        // $objBannerImages = BannerImages::get()->toArray();
        // $objBrand = Brands::get()->toArray();
        
        
         $data=new IP;
    $data->ip=$request->ip();
    $data->save();
        $arrOutput = [];
        // $arrOutput['bannerImage'] = BannerImages::get()->toArray();
        $arrOutput['bannerImage'] = BannerImages::orderBy('preference','asc')->get()->toArray();
         //dd($arrOutput);
        $arrOutput['brandLists'] = Brands::get()->toArray();
        $arrOutput['products'] = Products::with('images')->where('is_active', '1')->orderby('id','DESC')->take(10)->get()->toArray();
        //dd($arrOutput['products']);
        // for count
        $arrOutput['featuredCount'] = Products::where(['featured' => 1, 'is_active' => '1'])->count();
        $arrOutput['new_arrivalCount'] = Products::where(['new_arrival' => 1, 'is_active' => '1'])->count();
        $arrOutput['best_sellerCount'] = Products::where(['best_seller' => 1, 'is_active' => '1'])->count();

        // for best seller query
        $arrOutput['best_seller1'] = Products::with('images')->where(['best_seller' => 1, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $prod = Products::where(['best_seller' => 1, 'is_active' => '1'])->count();
        $arrOutput['best_seller'] = Products::with('images')->where(['best_seller' => 1, 'is_active' => '1'])->orderBy('created_at','desc')->skip(1)->take('6')->get()->toArray();
        $arrOutput['non_ffl'] = Products::with('images')->where(['category_id' =>3, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $arrOutput['access'] = Products::with('images')->where(['category_id' =>2, 'is_active' => '1'])->orderBy('created_at','desc')->get()->first();
        $arrOutput['categories'] = Category::with('children')->where('parent_id', '=', null)
        ->where('deleted_at', '=', null)->get()->toArray();
        // dd($arrOutput)
        // end
        
        return view('templates.default.screen.home1')
            ->with($arrOutput);
    }

















    public function aboutUs(Request $request)
    {
        $about= About::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
        return view('templates.default.screen.about_us')
            ->with(['bannerImage'=> $objBannerImages,'about'=>$about]);
    }
    
     public function shipingpolicy(Request $request)
    {
         $about= About::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.shipingpolicy')
            ->with(['bannerImage'=> $objBannerImages,'about'=>$about]);
    }
     public function returnpolicy(Request $request)
    {
         $about= About::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.returnpolicy')
            ->with(['bannerImage'=> $objBannerImages,'about'=>$about]);
    }
    
    public function orderpolicy(Request $request)
    {
         $about= About::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.orderpolicy')
            ->with(['bannerImage'=> $objBannerImages,'about'=>$about]);
    }
    
    
    
     /*public function privarcyPolicy(Request $request)
    {
        $privacy= Privacy::get()->where('is_active','=',1);
        $objBannerImages = BannerImages::get()->toArray();
        return view('templates.default.screen.privacy_policy')
            ->with(['bannerImage'=>$objBannerImages,'privacy'=>$privacy]);
    }*/
    
     public function privacypolicy(Request $request)
    {
          $privacy= Privacy::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.privacypolicy')
            ->with(['bannerImage'=> $objBannerImages,'privacy'=>$privacy]);
    }
    
     public function texaslaws(Request $request)
    {
          //$privacy= Privacy::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.texaslaws')
            ->with(['bannerImage'=> $objBannerImages]);
    }
    public function faq(Request $request)
    {
          $privacy= Privacy::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
        //dd($objBannerImages);
         return view('templates.default.screen.faq')
            ->with(['bannerImage'=> $objBannerImages]);
    }
    
    
     public function gunshows(Request $request)
    {
        $about= About::get()->where('is_active','=',1);
        // dd($about);
        $objBannerImages = BannerImages::get()->toArray();
       
        $months =Gunshow::select('month')->distinct()->get();
              $objgunshow= Gunshow::where('show_date','>=', date('Y-m-d'))->orderBy('show_date','asc')->get();

    
         
        return view('templates.default.screen.gun_shows',compact('months'))
            ->with(['bannerImage'=> $objBannerImages,'gun-shows'=>$about,'gunshow'=>$objgunshow]);
    }

    public function contactUs(Request $request)
    {
        $objBannerImages = BannerImages::get()->toArray();
        return view('templates.default.screen.contact_us')
            ->with('bannerImage', $objBannerImages);
    }
    

    public function termConditions(Request $request)
    {
        $terms= Terms::get()->where('is_active','=',1);
       // dd($terms);
        $objBannerImages = BannerImages::get()->toArray();
        return view('templates.default.screen.terms_and_conditions')
            ->with(['bannerImage'=>$objBannerImages,'terms'=>$terms]);
    }

   

    public function getProduct(Request $request)
    {
        $objBannerImages = BannerImages::get()->toArray();
        return view('templates.default.screen.product')
            ->with('bannerImage', $objBannerImages);
    }

    public function getProductDetails($id)
    {
        if (!empty($id)) {
            $objProdctDetails['productDetails'] = $data = Products::with('categoryData')->with('brandData')->with('images')->find($id);
           $objProdctDetails['technical_bullet'] = TechnicalBulletsModel::where('product_id',$id)->get();
            if($data->sub_category_id != null){
                $objProdctDetails['related_product'] = Products::with('images')->where('sub_category_id', $data->sub_category_id)->where('id','!=', $id)->inRandomOrder()->limit(10)->get()->toArray();
            }else{
                $objProdctDetails['related_product'] = Products::with('images')->where('category_id', $data->category_id)->where('id','!=', $id)->inRandomOrder()->limit(10)->get()->toArray();
            }
            //dd($objProdctDetails);
            // if(!empty($objProdctDetails)){
                return view('templates.default.screen.product_details')
                ->with($objProdctDetails);
            // }
        }

        return $this->sendError('Data not found');
    }

    public function getCustomiseProductDetails($id)
    {
        if (!empty($id)) {
            $objProdctDetails['productDetails'] = $data = Products::with('categoryData')->with('brandData')->with('imagess')->find($id);
            $objProdctDetails['clipArt'] = clipArt::where('is_active','1')->orderby('clip_id','DESC')->get();
            $objProdctDetails['text'] = text::where('is_active','1')->orderby('text_id','DESC')->get();
            $objProdctDetails['color'] = color::where('is_active','1')->orderby('color_id','DESC')->get();
            $objProdctDetails['technical_bullet'] = TechnicalBulletsModel::where('product_id',$id)->get();
                if($data->sub_category_id != null){
                    $objProdctDetails['related_product'] = Products::with('imagess')->where('sub_category_id', $data->sub_category_id)->where('id','!=', $id)->inRandomOrder()->limit(10)->get()->toArray();
                }else{
                    $objProdctDetails['related_product'] = Products::with('imagess')->where('category_id', $data->category_id)->where('id','!=', $id)->inRandomOrder()->limit(10)->get()->toArray();
                }
            //dd($objProdctDetails);
            // if(!empty($objProdctDetails)){
                return view('templates.default.screen.product_customise_details')
                ->with($objProdctDetails);
            // }
        }

        return $this->sendError('Data not found');
    }


    public function getWishlist(Request $request)
    {
        $objBannerImages = BannerImages::get()->toArray();
        return view('templates.default.screen.wishlist')
            ->with('bannerImage', $objBannerImages);
    }

    public function getAllProduct($id, $child_id='', Request $request){
        //dd($request);
        $products = Products::with('images')->where(['category_id'=>$id, 'is_active'=>'1']);
        if($child_id){
            $products->where('sub_category_id', $child_id);
        }
        if(isset($request->min_price) && $request->min_price!='' && isset($request->max_price) && $request->max_price!=''){
            $products->whereBetween('prod_price', [$request->min_price, $request->max_price]);
        }
        if(isset($request->brands) && $request->brands!=''){
            $brands = explode(',', $request->brands);
            $products->whereIn('brand_id', $brands);
        }
         if(isset($request->caliber) && $request->caliber!=''){
            $caliber = explode(',', $request->caliber);
            $products->whereIn('caliber_id', $caliber);
        }


        $arrOutput['products'] = $products->orderBy('created_at','desc')->paginate(12);

        $productfilter = Products::where(['category_id'=>$id, 'is_active'=>'1']);
        if($child_id){
            $products->where('sub_category_id', $child_id);
        }
        $arrOutput['min_price'] = $productfilter->min('prod_price');
        $arrOutput['max_price'] = $productfilter->max('prod_price');
        $arrOutput['brandLists'] = Brands::get()->toArray();
         $arrOutput['caliberLists'] = Caliber::get()->toArray();
        return view('templates.default.screen.all_products')->with($arrOutput);
    }

    public function autocomplete(Request $request){
        $input = $request->all();
        $sub_categories = [];
        $brands = [];
         $caliber = [];
        $products = Products::where("prod_name", "LIKE", "%{$input['terms']['term']}%")->where(['is_active'=>'1']);
        if($input['category_id'] != 'all'){
            $sub_categories = Category::where('parent_id', $input['category_id'])->where("name", "LIKE", "%{$input['terms']['term']}%")->where('is_active','1')->pluck('name')->toArray();
            $products->where('category_id', $input['category_id']);
        }else if($input['brand_id'] != 'all'){
            $brands = Brands::where("brand_name", "LIKE", "%{$input['terms']['term']}%")->where(['is_active'=>'1'])->pluck('brand_name')->toArray();        
            
        }
        else {
            $caliber =Caliber::where("caliber_name", "LIKE", "%{$input['terms']['term']}%")->where(['is_active'=>'1'])->pluck('caliber_name')->toArray();        
            
        }
        $prod_name = $products->pluck('prod_name')->toArray();
       
        $merge_array = array_merge($caliber,$brands, $prod_name, $sub_categories);
        return response()->json($merge_array);
    }

    public function search(Request $request){
        $input = $request->all();
        $sub_categories = Category::where('name', $input['search'])->where('is_active','1')->first();
        $brands = Brands::where('brand_name', $input['search'])->first();
 $caliber = Caliber::where('caliber_name', $input['search'])->first();
        if($sub_categories != null){
            $products = Products::with('images')->where('sub_category_id', $sub_categories->id)->where(['is_active'=>'1']);
            $productfilter = Products::where('sub_category_id', $sub_categories->id)->where(['is_active'=>'1']);
        }else if($brands != null){
            $products = Products::with('images')->where('brand_id', $brands->id)->where(['is_active'=>'1']);
            $productfilter = Products::where('brand_id', $brands->id)->where(['is_active'=>'1']);
        }else if($caliber != null){
            $products = Products::with('images')->where('caliber_id', $caliber->id)->where(['is_active'=>'1']);
            $productfilter = Products::where('caliber_id', $caliber->id)->where(['is_active'=>'1']);
        }
        else{
            $products = Products::with('images')->where("prod_name", "LIKE", "%{$input['search']}%")->where(['is_active'=>'1']);
            $productfilter = Products::where("prod_name", "LIKE", "%{$input['search']}%")->where(['is_active'=>'1']);
        }

        if(isset($input['category_id']) && $input['category_id'] != 'all'){
            $products->where('category_id', $input['category_id']);
        }
        if(isset($request->min_price) && $request->min_price!='' && isset($request->max_price) && $request->max_price!=''){
            $products->whereBetween('prod_price', [$request->min_price, $request->max_price]);
            $productfilter->whereBetween('prod_price', [$request->min_price, $request->max_price]);
        }
        if(isset($request->brands) && $request->brands!=''){
            $brands = explode(',', $request->brands);
            $products->whereIn('brand_id', $brands);
            $productfilter->whereIn('brand_id', $brands);
        }
        if(isset($request->caliber) && $request->caliber!=''){
            $caliber = explode(',', $request->caliber);
            $products->whereIn('caliber_id', $caliber);
            $productfilter->whereIn('caliber_id', $caliber);
        }
        $arrOutput['products'] = $products->orderBy('created_at','desc')->paginate(12);
        
        if($input['category_id'] != 'all'){
            $productfilter->where('category_id', $input['category_id']);
        }
        $arrOutput['min_price'] = $productfilter->min('prod_price');
        $arrOutput['max_price'] = $productfilter->max('prod_price');
        $arrOutput['brandLists'] = Brands::get()->toArray();
          $arrOutput['caliberLists'] = Caliber::get()->toArray();
        return view('templates.default.screen.all_products')->with($arrOutput);
    }
}
