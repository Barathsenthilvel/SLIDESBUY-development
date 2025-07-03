<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribes;
use DataTables;

class SubscribesController extends Controller
{
	public function datatables()
    {
         $datas = Subscribes::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('email', function(Subscribes $data) {
                                return $data->email;
                            })
                            ->addColumn('created_at', function(Subscribes $data) {
                                return date_format($data->created_at,'Y-M-d');
                            }) 
                            ->rawColumns(['email'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.Subscribes.index');
	}

}
