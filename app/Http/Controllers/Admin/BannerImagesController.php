<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateBannerImagesRequest;
use App\Http\Requests\UpdateBannerImagesRequest;
use App\Repositories\BannerImagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Response;
use File;

class BannerImagesController extends AppBaseController
{
    /** @var  BannerImagesRepository */
    private $bannerImagesRepository;

    public function __construct(BannerImagesRepository $bannerImagesRepo)
    {
        $this->bannerImagesRepository = $bannerImagesRepo;
    }

    /**
     * Display a listing of the BannerImages.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bannerImages = $this->bannerImagesRepository->all();

        return view('admin.banner_images.index')
            ->with('bannerImages', $bannerImages);
    }

    /**
     * Show the form for creating a new BannerImages.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.banner_images.create');
    }

    /**
     * Store a newly created BannerImages in storage.
     *
     * @param CreateBannerImagesRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerImagesRequest $request)
    {
        $request->validate([
            'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
        ]);


        $input = $request->all();
        // if ($request->file()) {
        //     $fileName = time() . '_' . $request->image_path->getClientOriginalName();
        //     $filePath = $request->file('image_path')->storeAs('slides', $fileName, 'public');
        //     $input['name'] = $fileName;
        //     $input['image_path'] = '/storage/' . $filePath;
        //     $this->bannerImagesRepository->create($input);

        //     Flash::success('Banner Images saved successfully.');
        //     return redirect('admin/bannerImages');
        // }
        
        if (request()->hasFile('image_path')) {
            $file = request()->file('image_path');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('../public/homeSlider/', $fileName);

            $input['name'] = $fileName;
            $input['image_path'] = '/homeSlider/' . $fileName;
            $this->bannerImagesRepository->create($input);

            Flash::success('Banner Images saved successfully.');
            return redirect('c~AiN:2)Y42,&*/bannerImages');   
        }
    }

    /**
     * Display the specified BannerImages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error('Banner Images not found');
            return redirect('c~AiN:2)Y42,&*/bannerImages');
            // return redirect(route('bannerImages.index'));
        }

        return view('admin.banner_images.show')->with('bannerImages', $bannerImages);
    }

    /**
     * Show the form for editing the specified BannerImages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error('Banner Images not found');
            // return redirect(route('bannerImages.index'));
            return redirect('c~AiN:2)Y42,&*/bannerImages');
        }

        return view('admin.banner_images.edit')->with('bannerImages', $bannerImages);
    }

    /**
     * Update the specified BannerImages in storage.
     *
     * @param int $id
     * @param UpdateBannerImagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerImagesRequest $request)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);
        if (empty($bannerImages)) {
            Flash::error('Banner Images not found');
            return redirect('c~AiN:2)Y42,&*/bannerImages');
        }

        $input = $request->all();
        // if ($request->file()) {
        //     $request->validate([
        //         'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
        //     ]);

        //     Storage::disk('public')->delete('/slides/' . $bannerImages->name);
        //     $fileName = time() . '_' . $request->image_path->getClientOriginalName();

        //     $filePath = $request->file('image_path')->storeAs('slides', $fileName, 'public');
        //     $input['name'] = $fileName;
        //     $input['image_path'] = '/storage/' . $filePath;
        // }
        
        if (request()->hasFile('image_path')) {
              $request->validate([
                'image_path' => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);
            $file = request()->file('image_path');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('../public/homeSlider/', $fileName);

            $input['name'] = $fileName;
            $input['image_path'] = '/homeSlider/' . $fileName;
             
        }

        $this->bannerImagesRepository->update($input, $id);

        Flash::success('Banner Images updated successfully.');
        return redirect('c~AiN:2)Y42,&*/bannerImages');
    }

    /**
     * Remove the specified BannerImages from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bannerImages = $this->bannerImagesRepository->find($id);

        if (empty($bannerImages)) {
            Flash::error('Banner Images not found');
            return redirect('c~AiN:2)Y42,&*/bannerImages');
        }

        // Storage::disk('public')->delete('/slides/' . $bannerImages->name);
        $image_path = public_path("homeSlider/".$bannerImages->name);

        if (File::exists($image_path)) {
            File::delete($image_path);      
        }
        
        $this->bannerImagesRepository->delete($id);

        Flash::success('Banner Images deleted successfully.');
        return redirect('c~AiN:2)Y42,&*/bannerImages');
    }
}
