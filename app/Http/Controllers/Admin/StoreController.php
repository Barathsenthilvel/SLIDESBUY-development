<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Storeconfiguration;
use Auth;
use Validator;

use DataTables;
use App\Models\Currency;

class StoreController extends Controller
{
    public function datatables()
    {
         $datas = Storeconfiguration::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('name', function(Storeconfiguration $data){
                                return $data->store_name;
                            })
                			->addColumn('status', function(Storeconfiguration $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-store-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-store-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Storeconfiguration $data) {
                                return '<div class="action-list"><a href="' . route('admin-store-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a></div>';
                            }) 
                            ->rawColumns(['position','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.storeconfig.index');
	}
    public function status($id1,$id2)
    {
        $data = Storeconfiguration::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
    public function edit($id){
		$data=Storeconfiguration::findOrFail($id);
        $currency = Currency::where('status',1)->get();
		return view('admin.storeconfig.edit',compact('data','currency'));
	}
    public function destroy($id)
    {
        $data = Storeconfiguration::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    public function update(Request $request,$id){
        $input = $request->all();
        if($request->file('fav_icon')){
        $rules = [
                  'fav_icon'   => 'required|dimensions:max_width=43,max_height=38,min_width=43,min_height=38'
                ];
      $customs = [
            'fav_icon.required'   => 'Favicon field should be filled.',
            'fav_icon.max_width'   => 'Favicon maximum width 43px.',
            'fav_icon.max_height'   => 'Favicon maximum height 38px.',
            'fav_icon.min_width'   => 'Favicon minimum width 43px.',
            'fav_icon.min_height'   => 'Favicon minimum height 38px.'
          ];

        $validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }
        }
        $data = Storeconfiguration::findOrFail($id);
        if ($file = $request->file('fav_icon')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/assets/media/banner/',$name);
                if($data->fav_icon != null)
                {
                    if (file_exists(public_path().'/assets/media/banner/'.$data->fav_icon)) {
                        unlink(public_path().'/assets/media/banner/'.$data->fav_icon);
                    }
                }            
            $input['fav_icon'] = $name;
            } 
        $data->update($input);
        $data1['msg'] = 'Store Configuration Updated Successfully.';
        return response()->json($data1);
    }
    public function cropimage(Request $request){
        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        file_put_contents(public_path().'/assets/media/banner/'.$imageName, $data);
    if($request->id !== "0"){
        $Storeconfiguration = Storeconfiguration::findOrFail($request->id);
        if($request->table_colum === 'logo'){
            if($Storeconfiguration->logo != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Storeconfiguration->logo)) {
                    unlink(public_path().'/assets/media/banner/'.$Storeconfiguration->logo);
                }
            }
            $Storeconfiguration->logo = $imageName;
            $Storeconfiguration->update();
        }
        if($request->table_colum === 'Watermark'){
            if($Storeconfiguration->Watermark != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Storeconfiguration->Watermark)) {
                    unlink(public_path().'/assets/media/banner/'.$Storeconfiguration->Watermark);
                }
            }
            $Storeconfiguration->Watermark = $imageName;
            $Storeconfiguration->update();
        }
        if($request->table_colum === 'invert_logo'){
            if($Storeconfiguration->Watermark != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Storeconfiguration->invert_logo)) {
                    unlink(public_path().'/assets/media/banner/'.$Storeconfiguration->invert_logo);
                }
            }
            $Storeconfiguration->invert_logo = $imageName;
            $Storeconfiguration->update();
        }
    }
    return ['Name'=>$imageName];
}

}