<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use DB;
use Flash;

class AttributeController extends Controller
{
    public function index()
    {
        $attribute_list = Attribute::all();
        return view('admin/attribute/index')->with('list',$attribute_list);
    }
    public function create()
    {
        return view('admin/attribute/create');
    }
    public function store(Request $request)
    {
        $data = new Attribute;
        $data->name = $request['name'];
        $data->save();
        foreach($request['value'] as $datas)
        {
            $val['attribute_id'] = $data->id;
            $val['value'] = $datas;
            DB::table('attribute_value')->insert($val);
        }
        Flash::success('Attribute saved successfully.');
        return redirect('admin/attribute');
    }
    public function edit($id)
    {
        $edit_attribute = Attribute::find($id);
        $arrOutput[ 'attribute_value' ] = DB::table('attribute_value')->where('attribute_id', $edit_attribute['id'])->get();
        return view('admin/attribute/edit')->with(['edit_value'=>$edit_attribute,'abc'=>$arrOutput]);

    }
    public function edit_save($id,Request $request)
    {
        $edit_attribute = Attribute::find($id);
        $edit_attribute->name = $request['name'];
        $edit_attribute->update();
        DB::table('attribute_value')->where('attribute_id', $request['id'])->delete();

        foreach($request['value'] as $datas)
        {
            $val['attribute_id'] = $id;
            $val['value'] = $datas;
            DB::table('attribute_value')->insert($val);
        }
        Flash::success('Attribute update successfully.');
        return redirect('admin/attribute');

    }
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        if(!empty($attribute))
        {
            DB::table('attribute_value')->where('attribute_id', $attribute['id'])->delete();
        }
        $attribute->delete();
        Flash::success('Attribute deleted successfully.');
        return redirect('admin/attribute');
    }
}
