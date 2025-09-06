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

        // Test: Check if we can read session data
        \Log::info('Edit method - Session data:', [
            'success' => session('success'),
            'error' => session('error'),
            'has_errors' => session()->has('errors')
        ]);

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

        // dd($request->all());
        // Debug: Log the incoming request
        \Log::info('Store update request received', [
            'id' => $id,
            'method' => $request->method(),
            'has_files' => $request->hasFile('logo') || $request->hasFile('invert_logo') || $request->hasFile('fav_icon'),
            'all_input' => $request->all()
        ]);


        \Log::info('Update method accessed successfully');


        \Log::info('Request data test:', [
            'url' => $request->url(),
            'full_url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'user_agent' => $request->userAgent()
        ]);

        $input = $request->all();

        // Validation rules for required fields
        $rules = [
            'store_name' => 'required|string|max:255',
            'default_currency' => 'required|exists:currencies,id',
            'ownershiptype' => 'required|string|max:100',
            'pricing_type' => 'required|string|max:50',
            'CustomerIDPrefix' => 'required|string|max:10',
            'productIdprefix' => 'required|string|max:10',
            'Store_Meta_Title' => 'nullable|string|max:255',
            'Order_Emails_To' => 'required|string',
            'Contact_Us_Emails_To' => 'required|string',
            'Contact_Us_Emails_BCC' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'invert_logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'fav_icon' => 'required|mimes:ico,png,jpg,jpeg,gif,svg|max:5120',
        ];

      $customs = [
            'store_name.required' => 'Store Name is required.',
            'store_name.max' => 'Store Name cannot exceed 255 characters.',
            'default_currency.required' => 'Default Currency is required.',
            'default_currency.exists' => 'Selected currency is invalid.',
            'ownershiptype.required' => 'Ownership Type is required.',
            'pricing_type.required' => 'Pricing Type is required.',
            'CustomerIDPrefix.required' => 'Customer ID Prefix is required.',
            'CustomerIDPrefix.max' => 'Customer ID Prefix cannot exceed 10 characters.',
            'productIdprefix.required' => 'Product ID Prefix is required.',
            'productIdprefix.max' => 'Product ID Prefix cannot exceed 10 characters.',
            'Order_Emails_To.required' => 'Order Emails To is required.',
            'Contact_Us_Emails_To.required' => 'Contact Us Emails To is required.',
            'Contact_Us_Emails_BCC.required' => 'Contact Us Emails BCC is required.',
            'logo.required' => 'Logo is required.',
            'logo.image' => 'Logo must be an image file.',
            'logo.mimes' => 'Logo must be a JPEG, PNG, JPG, GIF or WebP file.',
            'logo.max' => 'Logo size must be less than 10MB.',
            'invert_logo.required' => 'Invert Logo is required.',
            'invert_logo.image' => 'Invert Logo must be an image file.',
            'invert_logo.mimes' => 'Invert Logo must be a JPEG, PNG, JPG, GIF or WebP file.',
            'invert_logo.max' => 'Invert Logo size must be less than 10MB.',
            'fav_icon.required' => 'Favicon is required.',
            'fav_icon.mimes' => 'Favicon must be an ICO, PNG, JPG, JPEG, GIF or SVG file.',
            'fav_icon.max' => 'Favicon size must be less than 5MB.',
        ];

        // All validation rules are now in the main $rules array
        $allRules = $rules;
        $allCustoms = $customs;

                // Validate all fields
        \Log::info('Validation rules:', $allRules);
        \Log::info('Validation customs:', $allCustoms);

        $validator = Validator::make($request->all(), $allRules, $allCustoms);

        if ($validator->fails()) {
            \Log::error('Validation failed:', [
                'errors' => $validator->errors()->toArray(),
                'input' => $request->all()
            ]);
            
            // Check if request is AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->toArray(),
                    'message' => 'Validation failed. Please check the form.'
                ], 422);
            }
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        \Log::info('Validation passed successfully');

        $data = Storeconfiguration::findOrFail($id);
        \Log::info('Store configuration found:', ['id' => $id, 'current_data' => $data->toArray()]);

        // Handle logo upload
        \Log::info('Processing logo field:', [
            'has_file' => $request->hasFile('logo'),
            'logo_old' => $request->input('logo_old'),
            'current_logo' => $data->logo
        ]);

                if ($file = $request->file('logo')) {
            // Get file extension
            $extension = $file->getClientOriginalExtension();
            // Create shorter filename: timestamp_logo.extension
            $name = time() . '_logo.' . $extension;
            \Log::info('Uploading new logo:', ['original_name' => $file->getClientOriginalName(), 'new_name' => $name]);

            $file->move(public_path().'/assets/media/banner/', $name);

            // Delete old logo if exists
            if($data->logo != null && file_exists(public_path().'/assets/media/banner/'.$data->logo)) {
                unlink(public_path().'/assets/media/banner/'.$data->logo);
                \Log::info('Old logo deleted:', ['old_logo' => $data->logo]);
            }

            $input['logo'] = $name;
            \Log::info('Logo updated:', ['new_logo' => $name]);
        } else {
            // Keep old logo if no new one uploaded
            $input['logo'] = $request->input('logo_old', $data->logo);
            \Log::info('Logo unchanged:', ['logo' => $input['logo']]);
        }

        // Handle invert_logo upload
        if ($file = $request->file('invert_logo')) {
            // Get file extension
            $extension = $file->getClientOriginalExtension();
            // Create shorter filename: timestamp_invert_logo.extension
            $name = time() . '_invert_logo.' . $extension;
            $file->move(public_path().'/assets/media/banner/', $name);

            // Delete old invert_logo if exists
            if($data->invert_logo != null && file_exists(public_path().'/assets/media/banner/'.$data->invert_logo)) {
                unlink(public_path().'/assets/media/banner/'.$data->invert_logo);
            }

            $input['invert_logo'] = $name;
        } else {
            // Keep old invert_logo if no new one uploaded
            $input['invert_logo'] = $request->input('invert_logo_old', $data->invert_logo);
        }

                // Handle fav_icon upload
        if ($file = $request->file('fav_icon')) {
            // Get file extension
            $extension = $file->getClientOriginalExtension();
            // Create shorter filename: timestamp_favicon.extension
            $name = time() . '_favicon.' . $extension;
            $file->move(public_path().'/assets/media/banner/', $name);

            // Delete old fav_icon if exists
            if($data->fav_icon != null && file_exists(public_path().'/assets/media/banner/'.$data->fav_icon)) {
                unlink(public_path().'/assets/media/banner/'.$data->fav_icon);
            }

            $input['fav_icon'] = $name;
        } else {
            // Keep old fav_icon if no new one uploaded
            $input['fav_icon'] = $request->input('fav_icon_old', $data->fav_icon);
        }

        try {
            \Log::info('Starting email field processing');

            // Process Tagify email fields - extract email values from JSON
            if (isset($input['Order_Emails_To']) && is_string($input['Order_Emails_To'])) {
                $emails = json_decode($input['Order_Emails_To'], true);
                if (is_array($emails)) {
                    $input['Order_Emails_To'] = implode(',', array_column($emails, 'value'));
                }
            }

            if (isset($input['Order_Emails_BCC']) && is_string($input['Order_Emails_BCC'])) {
                $emails = json_decode($input['Order_Emails_BCC'], true);
                if (is_array($emails)) {
                    $input['Order_Emails_BCC'] = implode(',', array_column($emails, 'value'));
                }
            }

            if (isset($input['Contact_Us_Emails_To']) && is_string($input['Contact_Us_Emails_To'])) {
                $emails = json_decode($input['Contact_Us_Emails_To'], true);
                if (is_array($emails)) {
                    $input['Contact_Us_Emails_To'] = implode(',', array_column($emails, 'value'));
                }
            }

            if (isset($input['Contact_Us_Emails_BCC']) && is_string($input['Contact_Us_Emails_BCC'])) {
                $emails = json_decode($input['Contact_Us_Emails_BCC'], true);
                if (is_array($emails)) {
                    $input['Contact_Us_Emails_BCC'] = implode(',', array_column($emails, 'value'));
                }
            }

            // Ensure all required fields are present and properly formatted
            $requiredFields = [
                'store_name' => $input['store_name'] ?? '',
                'default_currency' => $input['default_currency'] ?? '',
                'ownershiptype' => $input['ownershiptype'] ?? '',
                'pricing_type' => $input['pricing_type'] ?? '',
                'CustomerIDPrefix' => $input['CustomerIDPrefix'] ?? '',
                'productIdprefix' => $input['productIdprefix'] ?? '',
                'Store_Meta_Title' => $input['Store_Meta_Title'] ?? '',
                'Order_Emails_To' => $input['Order_Emails_To'] ?? '',
                'Contact_Us_Emails_To' => $input['Contact_Us_Emails_To'] ?? '',
                'Contact_Us_Emails_BCC' => $input['Contact_Us_Emails_BCC'] ?? '',
            ];

            // Add image fields
            if (isset($input['logo'])) {
                $requiredFields['logo'] = $input['logo'];
            }
            if (isset($input['invert_logo'])) {
                $requiredFields['invert_logo'] = $input['invert_logo'];
            }
            if (isset($input['fav_icon'])) {
                $requiredFields['fav_icon'] = $input['fav_icon'];
            }

            // Remove any null or empty values that might cause issues
            $cleanInput = array_filter($requiredFields, function($value) {
                return $value !== null && $value !== '';
            });

            // Debug: Log the final input data
            \Log::info('Store update input data:', $cleanInput);
            \Log::info('Store configuration model before update:', $data->toArray());


            foreach ($cleanInput as $field => $value) {
                if (isset($data->$field)) {
                    \Log::info("Field: {$field}", [
                        'current' => $data->$field,
                        'new' => $value,
                        'changed' => $data->$field != $value
                    ]);
                }
            }

            // Update the store configuration with all required fields
            try {
                \Log::info('About to update database with fields:', array_keys($cleanInput));
                \Log::info('Update data:', $cleanInput);

                $result = $data->update($cleanInput);

                // Debug: Log the update result
                \Log::info('Store update result:', ['result' => $result, 'id' => $id]);

                // Refresh the model to see the updated data
                $data->refresh();
                \Log::info('Store configuration model after update:', $data->toArray());

                if ($result) {
                    // Log the final state after successful update
                    $data->refresh();
                    \Log::info('Store configuration successfully updated. Final state:', $data->toArray());

                    // Check if all required fields were actually saved
                    $savedFields = [];
                    foreach ($cleanInput as $field => $value) {
                        if (isset($data->$field)) {
                            $savedFields[$field] = $data->$field;
                        }
                    }
                    \Log::info('Fields successfully saved:', $savedFields);

                    // Check if request is AJAX
                    if ($request->ajax() || $request->wantsJson()) {
                        \Log::info('Returning JSON success response for AJAX request');
                        return response()->json([
                            'success' => true,
                            'msg' => '✅ Store Configuration Updated Successfully! All fields have been saved.',
                            'data' => $savedFields
                        ]);
                    }

                    // For non-AJAX requests, redirect with success message
                    \Log::info('Setting success message in session for non-AJAX request');
                    return redirect()->route('admin-store-edit', $id)->with('success', '✅ Store Configuration Updated Successfully! All fields have been saved.');
                } else {
                    \Log::error('Update returned false - no rows were affected');
                    
                    // Check if request is AJAX
                    if ($request->ajax() || $request->wantsJson()) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Failed to update store configuration.'
                        ], 500);
                    }
                    
                    return redirect()->back()->with('error', 'Failed to update store configuration.')->withInput();
                }
            } catch (\Illuminate\Database\QueryException $e) {
                \Log::error('Database query error:', ['error' => $e->getMessage(), 'sql' => $e->getSql()]);

                // Check if it's a column length issue
                if (strpos($e->getMessage(), 'Data too long for column') !== false) {
                    $errorMsg = '❌ File upload failed: One or more filenames are too long for the database. Please use shorter filenames.';
                } else {
                    $errorMsg = '❌ Database error: ' . $e->getMessage();
                }

                return redirect()->back()->with('error', $errorMsg)->withInput();
            } catch (\Exception $e) {
                \Log::error('General update error:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', '❌ Update error: ' . $e->getMessage())->withInput();
            }
        } catch (\Exception $e) {
            \Log::error('Store update error:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Error updating store configuration: ' . $e->getMessage())->withInput();
        }
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
