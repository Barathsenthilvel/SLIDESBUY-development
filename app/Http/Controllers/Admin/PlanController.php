<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:45',
                'price' => 'required|numeric|min:0',
                'discount' => 'nullable|numeric|min:0',
                'discount_type' => 'required|in:flat,percentage',
                'download_limit' => 'nullable|integer|min:0',
                'validity' => 'required|integer|min:0',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Plan::create($validator->validated());

            return redirect()->route('admin-subscription-setupview')
                ->with('success', 'Plan created successfully!');
    }



    public function update(Request $request, $id)
{
    $plan = Plan::findOrFail($id);

    $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'discount_type' => 'required|in:flat,percentage',
        'download_limit' => 'required|numeric',
        'validity' => 'required|integer|min:1',
    ]);



    try {
       $plan->update($request->only([
        'name',
        'price',
        'discount',
        'discount_type',
        'download_limit',
        'validity',
    ]));
    return redirect('/admin/subscription/setup')->with('success', 'Plan updated successfully.');
}
catch (\Exception $e) {
    return redirect()->back()->with('error', 'Failed to update plan. Try again.');
}
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function edit($id)
{
    $plan = Plan::findOrFail($id);
    return view('admin.subscriptions.create', compact('plan'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function destroy($id)
{
    // dd($id);
    $plan = Plan::findOrFail($id);
    $plan->delete();

    return redirect()->back()->with('success', 'Plan deleted successfully.');
}


    public function datatables()
    {
        $plans = Plan::all();
        return datatables()->of($plans)
            ->addIndexColumn('DT_RowIndex')
           ->editColumn('name', function ($plan) {
                return $plan->name;
            })
            ->editColumn('price', function ($plan) {
                return number_format($plan->price, 2);
            })
            ->editColumn('discount', function ($plan) {
                return $plan->discount ? number_format($plan->discount, 2) : 'N/A';
            })
           ->editColumn('discount_type', function ($plan) {
                return $plan->discount_type;
            })
           ->editColumn('download_limit', function ($plan) {
                return $plan->download_limit ? $plan->download_limit : 'Unlimited';
            })
            ->editColumn('validity', function ($plan) {
                return $plan->validity . ' days';
            })
            ->addColumn('actions', function ($plan) {
                return view('admin.subscriptions.partials.action', compact('plan'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function getName()
{
    return $this->name;
}

}
