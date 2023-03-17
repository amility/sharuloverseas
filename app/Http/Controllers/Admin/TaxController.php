<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxModel;
use Flash;
use DB;


class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = TaxModel::latest()->paginate(5);
  
        return view('admin.tax.index',compact('tax'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //
        //die('hi');
        //return view('admin.tax.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'tax_name' => 'required',
            'tax_rate' => 'required',
        ]);
  
        TaxModel::create($request->all());
   
        Flash::success('Tax saved successfully.');
        return redirect('admin/tax');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $data= TaxModel::find($id);

        if (empty($data)) {
            Flash::error('Brands not found');

            return redirect(route('admin.tax.index'));
        }

        return view('admin.tax.show')->with('data', $data);
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
         $tax= TaxModel::find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect('admin.tax');
        }

        return view('admin.tax.edit')->with('tax', $tax);
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
        //
           $tax = TaxModel::find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');
            return redirect('admin/tax');
        }
        $input = $request->all();
       
        $request->validate([
            'tax_name' => 'required',
            'tax_rate' => 'required',
        ]);
        $tax->tax_name=$request->tax_name;
        $tax->tax_rate=$request->tax_rate;
        
        $tax->save();
         

        Flash::success('Tax updated successfully.');

        return redirect('admin/tax');
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
        $tax = TaxModel::find($id);

       
         if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('admin.tax.index'));
        }

         $tax->forceDelete();

        Flash::success('Tax deleted successfully.');

        return redirect('admin/tax');
    }
}
