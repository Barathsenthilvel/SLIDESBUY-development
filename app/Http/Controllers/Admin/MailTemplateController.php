<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MailTemplate;
use App\Models\TemplateName;
use Auth;
use Validator;

use DataTables;

class MailTemplateController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = MailTemplate::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('template_name', function(MailTemplate $data) {
                				$getName=$data->template_name;
                				$template_name=TemplateName::where('id',$getName)->first();
                				return $template_name->template_name;
                				
                  				})
                			->addColumn('status', function(MailTemplate $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-mailtemplate-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-mailtemplate-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(MailTemplate $data) {
                                return '<div class="action-list"><a href="' . route('admin-mailtemplate-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-mailtemplate-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['template_name','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.mailtemplate.index');
	}

	public function create(){
		$data=TemplateName::where('status','1')->get();
		return view('admin.mailtemplate.create',compact('data'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'templateName' => 'required|unique:mail_templates,template_name,'.$request->input('templateName'),
			'mailBcc' => 'required',
			'mailSubject' => 'required'

		];

		$customs=[
			'templateName.required'  => 'Template Name should be filled',
			'templateName.unique'    => 'Template Name already taken',
			'mailBcc.required'       => 'Mail Bcc should be filled',
			'mailSubject.required'   => 'Mail Subject Image should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new MailTemplate;

        $data->template_name=$requestedData['templateName'];
        $data->bcc_mail=$requestedData['mailBcc'];
        $data->subject_mail=$requestedData['mailSubject'];
        $data->content_mail=$requestedData['mailContent'];
        $data->footer_mail=$requestedData['mailFooter'];
        $data->save();

		$data1['msg'] = 'New Mail Template Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'templateName' => 'required|unique:mail_templates,template_name,'.$id,
			'mailBcc' => 'required',
			'mailSubject' => 'required'

		];

		$customs=[
			'templateName.required'  => 'Template Name should be filled',
			'templateName.unique'    => 'Template Name already taken',
			'mailBcc.required'       => 'Mail Bcc should be filled',
			'mailSubject.required'   => 'Mail Subject Image should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = MailTemplate::findOrFail($id);

        $data->template_name=$requestedData['templateName'];
        $data->bcc_mail=$requestedData['mailBcc'];
        $data->subject_mail=$requestedData['mailSubject'];
        $data->content_mail=$requestedData['mailContent'];
        $data->footer_mail=$requestedData['mailFooter'];
        $data->save();

		$data1['msg'] = 'Mail Template Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = MailTemplate::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=MailTemplate::findOrFail($id);
		$data1=TemplateName::where('status','1')->get();
		return view('admin.mailtemplate.edit',compact('data','data1'));
	}


    public function destroy($id)
    {
        $data = MailTemplate::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
