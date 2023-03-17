<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoModel;
use App\Models\Products;
use App\Models\PromoProduct;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Flash;
use DB;


class PromoController extends Controller
{
    //
    public function index(){
    	$promo= DB::table('promo')->get();
    	
    return view('admin.promo.index',)
           ->with('promo', $promo);	
    }
    public function create()
    {
        $data['category'] = Category::where('parent_id',null)->pluck('name', 'id');
        // $data['products'] = Products::pluck('prod_name','id');
        return view('admin.promo.create')->with($data);
    }
    public function store(Request $request)
    {   
    	$request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
            'promo_name'=>'required',
            'promo_code'=>'required',
            'promo_price'=>'required|numeric',
            'promo_type'=>'required',
            'max_user'=>'required|numeric',
            'min_amount'=>'required|numeric',
            'upto_amount'=>'required|numeric',
        ]);
        $input = $request->all();
        if($input['all'] == 'selected_product'){
            $request->validate([
                'category_id'=>'required',
                'product_id'=>'required',
            ]);
        }


        if ($request->file()) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('promo_image', $fileName, 'public');
            $input['image'] = $fileName;
            $input['image_path'] = '/storage/' . $filePath;
        }
        //   echo "<pre>";
        //print_r($input['image']);die;
        unset($input['product_id']);
        unset($input['category_id']);
        unset($input['sub_category_id']);
        unset($input['all']);
        $promoData = PromoModel::create($input);
        if(isset($request->product_id) && !empty($request->product_id)){
            
            for ($i = 0; $i < count($request->product_id); $i++) {
                $promp_product[] = [
                    'promo_id' => $promoData->id,
                    'product_id' => $request->product_id[$i],
                    'category_id' => $request->category_id,
                    'sub_category_id' => $request->sub_category_id
                ];
            }
            PromoProduct::insert($promp_product);
        }
        Flash::success('Promo saved successfully.');
        return redirect('c~AiN:2)Y42,&*/promo');
    }
    public function edit($id)
    {
        $promo = $data['promo'] = PromoModel::find($id);
        if (empty($promo)) {
            Flash::error('Promo not found');

            return redirect('admin.promo');
        }
        $data['category'] = Category::where('parent_id',null)->pluck('name', 'id');
        $data['promo_category'] = PromoProduct::where('promo_id','=',$id)->first();
        if($data['promo_category'] != null){
            $data['sub_category'] = Category::where('parent_id','=',$data['promo_category']['category_id'])->get()->toArray();
            $product = Products::where(['category_id' => $data['promo_category']['category_id']]);
            if($data['promo_category']['sub_category_id'] != null){
                $product->where('sub_category_id', $data['promo_category']['sub_category_id']);
            }
            $data['products'] = $product->get()->toArray();
        }
        $data['promo_product'] = PromoProduct::where('promo_id','=',$id)->pluck('product_id')->toArray();
        return view('admin.promo.edit')->with($data);
    }
    public function update(Request $request,$id){
        $request->validate([
                'promo_name'=>'required',
                'promo_code'=>'required',
                'promo_price'=>'required|numeric',
                'promo_type'=>'required',
                'max_user'=>'required|numeric',
                'min_amount'=>'required|numeric',
                'upto_amount'=>'required|numeric',
            ]);
        $input = $request->all();
        if($input['all'] == 'selected_product'){
            $request->validate([
                'category_id'=>'required',
                'product_id'=>'required',
            ]);
        }
    	$promo = PromoModel::find($id);

        if (empty($promo)) {
            Flash::error('Promo not found');
            return redirect('c~AiN:2)Y42,&*/promo');
        }

        if ($request->file()) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|max:2048',
            ]);            
            Storage::disk('public')->delete('/promo_image/' . $promo->image_path);
            $fileName = time() . '_' . $request->image->getClientOriginalName();

            $filePath = $request->file('image')->storeAs('promo_image', $fileName, 'public');
            $promo->image = $fileName;
            $promo->image_path = '/storage/' . $filePath;
        }

        //PromoModel::save($input, $id);
        $promo->promo_name = $request->promo_name;
        $promo->promo_code = $request->promo_code;
        $promo->promo_price = $request->promo_price;
        $promo->promo_type = $request->promo_type;
        $promo->max_user = $request->max_user;
        $promo->min_amount = $request->min_amount;
        $promo->upto_amount = $request->upto_amount;
        $promo->description = $request->description;
        $promo->status = $request->status;
        $promo->save();

        if(!isset($request->product_id)){
            PromoProduct::where('promo_id', $id)->delete();
        }
        if($input['all'] == 'all_product'){
            PromoProduct::where('promo_id', $id)->delete();   
        }

        if(isset($request->product_id) && !empty($request->product_id) && $input['all'] == 'selected_product'){
            PromoProduct::where('promo_id', $id)->delete();
            for ($i = 0; $i < count($request->product_id); $i++) {
                $promp_product[] = [
                    'promo_id' => $id,
                    'product_id' => $request->product_id[$i],
                    'category_id' => $request->category_id,
                    'sub_category_id' => $request->sub_category_id
                ];
            }
            PromoProduct::insert($promp_product);
        }
        Flash::success('Promo updated successfully.');
        return redirect('c~AiN:2)Y42,&*/promo');
    }
    public function destroy($id)
    {
        $promo = PromoModel::find($id);
        if (empty($promo)) {
            Flash::error('Promo not found');
            return redirect(route('admin.promo.index'));
        }
        Storage::disk('public')->delete('/promo_image/' . $promo->image_path);
        PromoProduct::where('promo_id', $id)->delete();
        $promo->forceDelete();
        Flash::success('Promo deleted successfully.');
        return redirect('c~AiN:2)Y42,&*/promo');
    }

    public function show($id)
    {
        $data1 = $data['promo'] = PromoModel::find($id);
        $data['promo_product'] = PromoProduct::with('products')->with('category')->with('subcategory')->where('promo_id','=',$id)->get()->toArray();
        if (empty($data1)) {
            Flash::error('Promo not found');
            return redirect(route('admin.promo.index'));
        }
        return view('admin.promo.show')->with($data);
    }

    function getSubCategory(Request $request)
    {
        $data = $output['status'] = DB::table('categories')
                  ->where('parent_id', $request->id)
                  ->get();

        $output['html'] = '<option value="">Select Sub Category</option>';
        foreach ($data as $row) {
            $output['html'] .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        return response()->json($output);
    }

    function getproducts(Request $request)
    {
        $data = DB::table('products')
                  ->where([$request->type => $request->id, 'is_active' => '1'])
                  ->get();

        $output['html'] = '<option value="">Select Products</option>';
        foreach ($data as $row) {
            $output['html'] .= '<option value="' . $row->id . '">' . $row->prod_name . '</option>';
        }
        return response()->json($output);
    }  
}