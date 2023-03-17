<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

use Flash;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data['subcategory'] = Category::find($id);
        $data['product'] = Products::where(['sub_category_id'=>$id])->get();
        //dd($data);
        if (empty($data)) {
            Flash::error('Sub Category not found');
            return redirect()->back();
            //return redirect()->route('c~AiN:2)Y42,&*/subcategories', ['id' => $id]);
        }
         return view('admin.categories.sub_show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
         $subcategory = Category::find($id);

        if (empty($subcategory)) {
            Flash::error('Category not found');
            return redirect('c~AiN:2)Y42,&*/categories');
        }

        return view('admin.categories.edit_sub')->with('subcategory', $subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category =  Category::find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            // return redirect(route('admin.categories.index'));
            return redirect('c~AiN:2)Y42,&*/categories');
        }
        $category->name=$request['name'];
        $category->parent_id=$request['parent_id'];
        $category->slug=$request['slug'];
        $category->is_active=$request['is_active'];

        $category->save();

        Flash::success('subcategory updated successfully.');

        // return redirect(route('admin.categories.index'));
        return redirect('c~AiN:2)Y42,&*/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category=Category::where('parent_id','=',$id)->get();
    //dd($category);
        if(count($category)>0){
            Flash::error('This record can not delete');
            return redirect()->back();
        }else{
            $subcategory = Category::find($id);

         if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect('c~AiN:2)Y42,&*/categories');
        }

         $subcategory->delete();

        Flash::success('Subcategory deleted successfully.');

        return redirect('c~AiN:2)Y42,&*/categories');
        }

        
    }
}
