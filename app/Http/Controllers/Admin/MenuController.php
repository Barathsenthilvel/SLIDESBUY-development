<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Auth;
use Validator;

use DataTables;

class MenuController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	
	public function index(){
		$category=Category::where('status','1')->get();
		$data=Menu::where('status','1')->get();
		return view('admin.menu.create',compact('category','data'));
	}


	public function store(Request $request,$id){
		$requestedData=$request->all();
		$txtMenu_name=$requestedData['txtMenu_name'];
		$sel_menutype=$requestedData['sel_menutype'];
		$sel_menul=$requestedData['sel_menul'];
		$txtMenu_sortby=$requestedData['txtMenu_sortby'];
		$txtMenu_name=implode(",",$txtMenu_name);
		$sel_menutype=implode(",",$sel_menutype);
		$sel_menul=implode("|",$sel_menul);
		$txtMenu_sortby=implode(",",$txtMenu_sortby);
		


        $data = Menu::findOrFail($id);
        $data->menu_name=$txtMenu_name;
        $data->menu_type=$sel_menutype;
        $data->menu_link=$txtMenu_sortby;//menu link as sort order;
        $data->page_link=$sel_menul;
    	$data->save();
    		
		$data1['msg']    = 'Menu Updated Successfully.';
        return response()->json($data1);

	}

	 public function getHomeMenu(){
        $homeMenu = Menu::where('status','1')->first();
        $menu_name  =explode(",", $homeMenu->menu_name);
        $menu_link  =explode(",", $homeMenu->menu_link);
        $menu_type  =explode(",", $homeMenu->menu_type);
        $page_link = explode("|", $homeMenu->page_link);
        $page_link2;
        $arraysofarray = [];
        foreach ($menu_type as $key => $value) {
        	if($value == 2){
        		$temp = explode(",", $page_link[$key]);
                foreach ($temp as $key1 => $value1) {
                    $Category = Category::where('id',$value1)->first();
                    if(!empty($Category)){
                        if($Category->parent_category_id == 0){
                            $arraysofarray[] = [$Category,Category::where('parent_category_id',$Category->id)->whereIn('id',$temp)->where('status',1)->get()];
                        }
                    }
                }
                $page_link2[] = $arraysofarray;
                $arraysofarray = [];
        	}else{
        		$page_link2[] = $page_link[$key];
        	}
        }
        
        $data1= $this->sort($menu_name,$menu_link,$menu_type,$page_link2);
        $data = ['data'=>$data1];
        // dd($data['data']['page_link'][3][0][1]);
        return $data;
    }

    function Sort($menu_name,$menu_link,$menu_type,$page_link2){
        $array =$menu_link;
        $menu_name = $menu_name;
        $menu_type = $menu_type;
        $page_link2 = $page_link2;
        $temp;
        for($i=0;$i<count($array);$i++){
            for($j=$i+1;$j<count($array);$j++){
                if($array[$i]>$array[$j]){
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;

                    $temp = $menu_name[$i];
                    $menu_name[$i] = $menu_name[$j];
                    $menu_name[$j] = $temp;

                    $temp = $menu_type[$i];
                    $menu_type[$i] = $menu_type[$j];
                    $menu_type[$j] = $temp;

                    $temp = $page_link2[$i];
                    $page_link2[$i] = $page_link2[$j];
                    $page_link2[$j] = $temp;
                }
            }
        }
        return ['menu_name'=>$menu_name,'menu_link'=>$array,'menu_type'=>$menu_type,'page_link'=>$page_link2];
    }
	
}
