<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use Flash;
use DB;
use Response;

class CategoryController extends AppBaseController
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
    public function index(Request $request)
    {
        //$categories = $this->categoryRepository->all();
        //$categories['sub_category'] = Category::with('sub_category')->get();
           //dd($categories);
        $categories = DB::table('categories')
     ->where('parent_id', '=', null)
     ->where('deleted_at', '=', null)
                      ->get();
        //dd($categories);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $strType = $request->get('type');
         $id = $request->get('id');
         if(!empty($id)){
            $ids=$id;
         }else{
            $ids='';
         }
        return view('admin.categories.create')->with(['catType'=>$strType,'id'=>$ids]);
    }
 
    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');
        return redirect('c~AiN:2)Y42,&*/categories');
    }

    /**
     * Display the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$category = $this->categoryRepository->find($id);
        //dd($category);
        $category = DB::table('categories')->where(['parent_id'=> $id,'deleted_at'=>null])->get();
          // dd($category);
        if (empty($category)) {
            Flash::error('Category not found');

            return redirect('c~AiN:2)Y42,&*/categories');
        }

        return view('admin.categories.show')->with(['category'=>$category,'id'=>$id]);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');
            return redirect('c~AiN:2)Y42,&*/categories');
        }

        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            // return redirect(route('admin.categories.index'));
            return redirect('c~AiN:2)Y42,&*/categories');
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        // return redirect(route('admin.categories.index'));
        return redirect('c~AiN:2)Y42,&*/categories');
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)

    {

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

