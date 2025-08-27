<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribes;
use Yajra\DataTables\Facades\DataTables;

class SubscribesController extends Controller
{
    public function index()
    {
        return view('admin.Subscribes.index');
    }

    public function datatables()
    {
        $subscribers = Subscribes::orderBy('id', 'desc')->get();

        return DataTables::of($subscribers)
            ->addIndexColumn()
            ->addColumn('email', function(Subscribes $data) {
                return $data->email;
            })
            ->addColumn('created_at', function(Subscribes $data) {
                return date_format($data->created_at, 'Y-M-d');
            })
            ->rawColumns(['email'])
            ->toJson();
    }
}
