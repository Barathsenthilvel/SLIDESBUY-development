<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use DataTables;
use Auth;

class ReviewController extends Controller
{
	public function datatables()
    {
        if(Auth::user()->is_vendor){
            $datas = Review::orderBy('id','desc')->where('vendor_id','=',Auth::user()->is_vendor)->get();
        }else{
            $datas = Review::orderBy('id','desc')->get();
        }
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('Product', function(Review $data) {
                                $product = $data->getproduct();
                                return ($product != "")?$product->product_title:"Product Not Found";
                            })
                            ->addColumn('created_at', function(Review $data) {
                                return date_format($data->created_at,'Y-M-d');
                            })
                            ->addColumn('SKU', function(Review $data) {
                                $product = $data->getproduct();
                                return  ($product != "")?$product->product_sku:"Product Not Found";
                            })
                            ->addColumn('CustomerDetails', function(Review $data) {
                                $user = $data->getuser();
                                return ($user != "")?$user->name.'<br>'.$user->email.'<br>'.$user->mobile:"User Not Found";
                            })
                            ->addColumn('action', function(Review $data) {
                                return '<div class="action-list"><a href="'.route('admin-review-node',$data->id) .'" class="Viewreview"> <i class="fas fa-edit"></i>View</a><a href="'.route('admin-review-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['Product','SKU','OrderID','CustomerDetails','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.review.index');
	}
    public function review($id){
        $Review = Review::findOrFail($id);
       return view('admin.review.model', compact('Review'))->render();
    }
	public function destroy($id)
    {
        $data = Review::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
