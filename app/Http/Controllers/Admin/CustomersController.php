<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Repositories\CustomersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;
use DB;


use Flash;
use Response;

class CustomersController extends AppBaseController
{

    /** @var  CustomersRepository */
    private $customersRepository;

    public function __construct(CustomersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
    }

    /**
     * Display a listing of the Customers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$customers = $this->customersRepository->all();
  $customers = DB::table('customers')->where('deleted_at',null)->orderBy('id', 'desc')->get();
  
        return view('admin.customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new Customers.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created Customers in storage.
     *
     * @param CreateCustomersRequest $request
     * @return Response
     */
    public function store(CreateCustomersRequest $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:customers,email',
            'password' => 'required'
        ]);


        $customer = Customers::create([
            'name'     => $request[ 'name' ],
            'email'    => $request[ 'email' ],
            'password' => Hash::make($request[ 'password' ]),
        ]);
        // $input = $request->all();


        // $customers = $this->customersRepository->create($input);

        Flash::success('Customers saved successfully.');

        return redirect('c~AiN:2)Y42,&*/customers');
    }

    /**
     * Display the specified Customers.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('admin.customers.index'));
        }

        return view('admin.customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified Customers.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('admin.customers.index'));
        }

        return view('admin.customers.edit')->with('customers', $customers);
    }

    /**
     * Update the specified Customers in storage.
     *
     * @param int                    $id
     * @param UpdateCustomersRequest $request
     * @return Response
     */
    public function update($id, UpdateCustomersRequest $request)
    {
        $customers = $this->customersRepository->find($id);


        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('admin.customers.index'));
        }
        $data = array();
        if ($request->password != '') {
            $request->validate([
                'name'     => 'required',
                'email'    => 'required|email',
                'password' => 'required|required_with:confirm_password|same:confirm_password',

            ]);
            $data[ 'name' ] = $request[ 'name' ];
            $data[ 'email' ] = $request[ 'email' ];
            $data[ 'password' ] = Hash::make($request[ 'password' ]);
        } else {
            $request->validate([
                'name'  => 'required',
                'email' => 'required|email',

            ]);
            $data[ 'name' ] = $request[ 'name' ];
            $data[ 'email' ] = $request[ 'email' ];
        }

        $customers = $this->customersRepository->update($data, $id);

        Flash::success('Customers updated successfully.');

        return redirect('c~AiN:2)Y42,&*/customers');
    }

    /**
     * Remove the specified Customers from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('admin.customers.index'));
        }

        $this->customersRepository->delete($id);

        Flash::success('Customers deleted successfully.');

        return redirect('c~AiN:2)Y42,&*/customers');
    }
    /*change customer status*/
    // public function changeStatus($request){


    //     $data=array();

    //        $id=$request['id'];

    //          $tax = Customers::find($id);
    //    $tax->is_active=$request['is_active'];


    //     $tax->save();


    //     Flash::success('Customers updated successfully.');

    //     return redirect('admin/customers');

    // }
    public function userChangeStatus(Request $request)
    {
        // echo "<pre>";
        // print_r($_POST);die;
        //\Log::info($request->all());
        $user = Customers::find($request[ 'id' ]);
        $user->status = $request[ 'status' ];

        $data = $user->save();
        if ($data) {
            Flash::success('Customers status updated successfully.');

            return redirect('c~AiN:2)Y42,&*/customers');
        } else {
            Flash::error('Something went wronge.');

            return redirect('c~AiN:2)Y42,&*/customers');
        }

        //return response()->json(['success'=>'Status change successfully.']);
    }
}
