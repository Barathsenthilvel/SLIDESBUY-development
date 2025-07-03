<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Auth;
use Validator;

use DataTables;

class CurrencyController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = Currency::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(Currency $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-currency-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-currency-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Currency $data) {
                                return '<div class="action-list"><a href="' . route('admin-currency-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-currency-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.currency.index');
	}

	public function create(){
		return view('admin.currency.create');
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'currencyTitle' => 'required|unique:currencies,currency_title,'.$request->input('currencyTitle'),
			'currencySymbol' => 'required|unique:currencies,currency_symbol,'.$request->input('currencySymbol'),
			'currencyPrice' => 'required'

		];

		$customs=[
			'currencyTitle.required'  	=> 'Currency Title should be filled',
			'currencyTitle.unique'    	=> 'Currency Title already taken',
			'currencySymbol.required'  	=> 'Currency Symbol should be filled',
			'currencySymbol.unique'    	=> 'Currency Symbol already taken',
			'currencyPrice.required'  	=> 'Currency Symbol should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Currency;

        $data->currency_title  =$requestedData['currencyTitle'];
        $data->currency_symbol =$requestedData['currencySymbol'];
        $data->currency_price  =$requestedData['currencyPrice'];
    	$data->save();
		$data1['msg'] = 'New Currency Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'currencyTitle' => 'required|unique:currencies,currency_title,'.$id,
			'currencySymbol' => 'required|unique:currencies,currency_symbol,'.$id,
			'currencyPrice' => 'required'

		];

		$customs=[
			'currencyTitle.required'  	=> 'Currency Title should be filled',
			'currencyTitle.unique'    	=> 'Currency Title already taken',
			'currencySymbol.required'  	=> 'Currency Symbol should be filled',
			'currencySymbol.unique'    	=> 'Currency Symbol already taken',
			'currencyPrice.required'  	=> 'Currency Symbol should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Currency::findOrFail($id);

        $data->currency_title  =$requestedData['currencyTitle'];
        $data->currency_symbol =$requestedData['currencySymbol'];
        $data->currency_price  =$requestedData['currencyPrice'];
    	$data->save();
		$data1['msg'] = 'Currency Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Currency::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Currency::findOrFail($id);
		return view('admin.currency.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = Currency::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}
