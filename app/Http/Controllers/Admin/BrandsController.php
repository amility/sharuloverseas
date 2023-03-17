<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateBrandsRequest;
use App\Http\Requests\UpdateBrandsRequest;
use App\Repositories\BrandsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use File;
class BrandsController extends AppBaseController
{
    /** @var  BrandsRepository */
    private $brandsRepository;

    public function __construct(BrandsRepository $brandsRepo)
    {
        $this->brandsRepository = $brandsRepo;
    }

    /**
     * Display a listing of the Brands.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $brands = $this->brandsRepository->all();

        return view('admin.brands.index')
            ->with('brands', $brands);
    }

    /**
     * Show the form for creating a new Brands.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created Brands in storage.
     *
     * @param CreateBrandsRequest $request
     *
     * @return Response
     */
    public function store(CreateBrandsRequest $request)
    {
        $request->validate([
            'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $input = $request->all();


        if ($request->file()) {
            
            // $fileName = time() . '_' . $request->image_path->getClientOriginalName();
            // $filePath = $request->file('image_path')->storeAs('brands_logo', $fileName, 'public');
            // $input['brand_image_name'] = $fileName;
            // $input['brand_image_path'] = '/storage/' . $filePath;
            
             $file = request()->file('image_path');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('../public/brands_logo/', $fileName);

            $input['brand_image_name'] = $fileName;
            $input['brand_image_path'] = '/brands_logo/' . $fileName;
        }
        //   echo "<pre>";
        // print_r($input['brand_image_path']);die;
        $this->brandsRepository->create($input);
        Flash::success('Brand saved successfully.');
        return redirect('c~AiN:2)Y42,&*/brands');
    }

    /**
     * Display the specified Brands.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $brands = $this->brandsRepository->find($id);

        if (empty($brands)) {
            Flash::error('Brands not found');

            return redirect(route('admin.brands.index'));
        }

        return view('admin.brands.show')->with('brands', $brands);
    }

    /**
     * Show the form for editing the specified Brands.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $brands = $this->brandsRepository->find($id);

        if (empty($brands)) {
            Flash::error('Brands not found');

            return redirect(route('admin.brands.index'));
        }

        return view('admin.brands.edit')->with('brands', $brands);
    }

    /**
     * Update the specified Brands in storage.
     *
     * @param int $id
     * @param UpdateBrandsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrandsRequest $request)
    {
        $brands = $this->brandsRepository->find($id);

        if (empty($brands)) {
            Flash::error('Brands not found');
            return redirect('c~AiN:2)Y42,&*/brands');
        }
        $input = $request->all();
        if ($request->file()) {
            $request->validate([
                'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);


            $image_path = public_path("brands_logo/".$brands->brand_image_name);
            if (File::exists($image_path)) {
                File::delete($image_path);      
            }
            
            $file = request()->file('image_path');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('../public/brands_logo/', $fileName);

            $input['brand_image_name'] = $fileName;
            $input['brand_image_path'] = '/brands_logo/' . $fileName;
        }

        $this->brandsRepository->update($input, $id);

        Flash::success('Brands updated successfully.');

        return redirect('c~AiN:2)Y42,&*/brands');
    }

    /**
     * Remove the specified Brands from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $brands = $this->brandsRepository->find($id);

        if (empty($brands)) {
            Flash::error('Brands not found');

            return redirect(route('admin.brands.index'));
        }
        // dd($brands->brand_name);
        $image_path = public_path("brands_logo/".$brands->brand_image_name);
            if (File::exists($image_path)) {
                File::delete($image_path);      
            }
            
        $this->brandsRepository->delete($id);

        Flash::success('Brands deleted successfully.');

        return redirect('c~AiN:2)Y42,&*/brands');
    }
}
