<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Repositories\WishlistRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends AppBaseController
{
    /** @var  WishlistRepository */
    private $wishlistRepository;

    public function __construct(WishlistRepository $wishlistRepo)
    {
        $this->wishlistRepository = $wishlistRepo;
    }

    /**
     * Display a listing of the Wishlist.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $wishlists = $this->wishlistRepository->allQuery(
                        $request->except(['skip', 'limit']),
                        $request->get('skip'),
                        $request->get('limit')
                        )->with('product')->where('user_id', $customerData['id'])->get()->toArray();
            return view('templates.default.screen.wishlist')
                ->with('wishlists', $wishlists);
        }
        return view('templates.default.screen.account_login');
    }

    /**
     * Show the form for creating a new Wishlist.
     *
     * @return Response
     */
    public function create()
    {
        return view('wishlists.create');
    }

    /**
     * Store a newly created Wishlist in storage.
     *
     * @param CreateWishlistRequest $request
     *
     * @return Response
     */
    public function store(CreateWishlistRequest $request)
    {      
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $input = $request->all();
            $data['user_id'] = $customerData['id'];
            $data['product_id'] = $input['product_id'];
            $data['created_by'] = $customerData['id'];
            $data['updated_by'] = $customerData['id'];
            $wishlist = $this->wishlistRepository->create($input);

            Flash::success('Wishlist saved successfully.');
            return redirect(route('wishlists.index'));
        }
        return view('templates.default.screen.account_login');
    }

    /**
     * Display the specified Wishlist.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        return view('wishlists.show')->with('wishlist', $wishlist);
    }

    /**
     * Show the form for editing the specified Wishlist.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        return view('wishlists.edit')->with('wishlist', $wishlist);
    }

    /**
     * Update the specified Wishlist in storage.
     *
     * @param int $id
     * @param UpdateWishlistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWishlistRequest $request)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        $wishlist = $this->wishlistRepository->update($request->all(), $id);

        Flash::success('Wishlist updated successfully.');

        return redirect(route('wishlists.index'));
    }

    /**
     * Remove the specified Wishlist from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        $this->wishlistRepository->delete($id);

        Flash::success('Wishlist deleted successfully.');

        return redirect(route('wishlists.index'));
    }

    public function addToWishlistJs(CreateWishlistRequest $request)
    {
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $input = $request->all();
            $wishlistData = Wishlist::where(['product_id' => $input['product_id'], 'user_id' => $customerData['id']])->first();            
            
            $data['user_id'] = $customerData['id'];
            $data['product_id'] = $input['product_id'];
            $data['created_by'] = $customerData['id'];
            $data['updated_by'] = $customerData['id'];
            if($wishlistData != null){
                $wishlist = $this->wishlistRepository->update($data, $wishlistData['id']);
            }else{                
                $wishlist = $this->wishlistRepository->create($data);            
            }
            if($wishlist){
                echo "success";
            }
        }else{
            echo 'login';    
        }
        
    }

    public function removeToWishlistJs(CreateWishlistRequest $request)
    {
        if(Auth::guard('customer')->user()){
            $wishlist = $this->wishlistRepository->find($request->wishlist_id);

            if (empty($wishlist)) {
                Flash::error('Product not found');

                echo "empty";
            }
           $delete = $this->wishlistRepository->delete($request->wishlist_id);
            if($delete){
                echo "success";
            }
        }else{
            echo 'login';    
        }
        
    }
}
