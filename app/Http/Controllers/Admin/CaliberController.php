<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCaliberRequest;
use App\Http\Requests\UpdateCaliberRequest;
use App\Repositories\CaliberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use File;
class CaliberController extends AppBaseController
{
    /** @var  CaliberRepository */
    private $caliberRepository;

    public function __construct(CaliberRepository $caliberRepo)
    {
        $this->caliberRepository = $caliberRepo;
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
        $caliber = $this->caliberRepository->all();

        return view('admin.caliber.index')
            ->with('caliber', $caliber);
    }

    /**
     * Show the form for creating a new Brands.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.caliber.create');
    }

    /**
     * Store a newly created Brands in storage.
     *
     * @param CreateCaliberRequest $request
     *
     * @return Response
     */
    public function store(CreateCaliberRequest $request)
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
            $file->move('../public/calibers/', $fileName);

            $input['caliber_image_name'] = $fileName;
            $input['caliber_image_path'] = '/calibers/' . $fileName;
        }
        //   echo "<pre>";
        // print_r($input['brand_image_path']);die;
        $this->caliberRepository->create($input);
        Flash::success('Caliber saved successfully.');
        return redirect('c~AiN:2)Y42,&*/caliber');
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
        $caliber = $this->caliberRepository->find($id);

        if (empty($caliber)) {
            Flash::error('Caliber not found');

            return redirect(route('admin.caliber.index'));
        }

        return view('admin.caliber.show')->with('caliber', $caliber);
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
        $caliber = $this->caliberRepository->find($id);

        if (empty($caliber)) {
            Flash::error('caliber not found');

            return redirect(route('admin.caliber.index'));
        }

        return view('admin.caliber.edit')->with('caliber', $caliber);
    }

    /**
     * Update the specified Brands in storage.
     *
     * @param int $id
     * @param UpdateCaliberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaliberRequest $request)
    {
        $caliber = $this->caliberRepository->find($id);

        if (empty($caliber)) {
            Flash::error('caliber not found');
            return redirect('c~AiN:2)Y42,&*/caliber');
        }
        $input = $request->all();
        if ($request->file()) {
            $request->validate([
                'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);


            $image_path = public_path("calibers/".$caliber->brand_image_name);
            if (File::exists($image_path)) {
                File::delete($image_path);      
            }
            
            $file = request()->file('image_path');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('../public/calibers/', $fileName);

            $input['caliber_image_name'] = $fileName;
            $input['caliber_image_path'] = '/calibers/' . $fileName;
        }

        $this->caliberRepository->update($input, $id);

        Flash::success('Caliber updated successfully.');

        return redirect('c~AiN:2)Y42,&*/caliber');
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
        $caliber = $this->caliberRepository->find($id);

        if (empty($caliber)) {
            Flash::error('Caliber not found');

            return redirect(route('admin.caliber.index'));
        }
        // dd($brands->brand_name);
        $image_path = public_path("calibers/".$caliber->caliber_image_name);
            if (File::exists($image_path)) {
                File::delete($image_path);      
            }
            
        $this->caliberRepository->delete($id);

        Flash::success('Caliber deleted successfully.');

        return redirect('c~AiN:2)Y42,&*/caliber');
    }
}
