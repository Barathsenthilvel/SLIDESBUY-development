<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Auth;
use DataTables;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:webadmin');
    }

    public function index()
    {
        return view('admin.contact.index');
    }

    public function datatables()
    {
        $datas = Contact::orderBy('id', 'desc')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('status', function(Contact $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-contact-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Read</option><option data-val="0" value="'. route('admin-contact-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Unread</option></select></div>';
            })
            ->addColumn('action', function(Contact $data) {
                return '<div class="action-list">
                    <a href="' . route('admin-contact-view', $data->id) . '"> <i class="fas fa-eye"></i>View</a>
                    <a href="' . route('admin-contact-delete', $data->id) . '" class="delete"><i class="fas fa-trash-alt"></i>Delete</a>
                </div>';
            })
            ->addColumn('created_at', function(Contact $data) {
                return $data->created_at->format('d M Y, h:i A');
            })
            ->rawColumns(['status', 'action', 'created_at'])
            ->toJson();
    }

    public function view($id)
    {
        $contact = Contact::findOrFail($id);

        // Mark as read when viewed
        if ($contact->status == 0) {
            $contact->status = 1;
            $contact->save();
        }

        return view('admin.contact.view', compact('contact'));
    }

    public function status($id1, $id2)
    {
        $contact = Contact::findOrFail($id1);
        $contact->status = $id2;
        $contact->save();

        return redirect()->back()->withSuccess('Status updated successfully');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin-contact')->withSuccess('Contact deleted successfully');
    }

    public function markAllAsRead()
    {
        Contact::where('status', 0)->update(['status' => 1]);

        return redirect()->back()->withSuccess('All contacts marked as read');
    }

    public function deleteAll()
    {
        Contact::truncate();

        return redirect()->route('admin-contact')->withSuccess('All contacts deleted successfully');
    }
}
