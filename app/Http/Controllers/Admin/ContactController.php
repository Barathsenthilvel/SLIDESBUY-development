<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Auth;
use DataTables;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:webadmin');
    }

    public function index()
    {
        $totalContacts = Contact::count();
        $unreadContacts = Contact::unread()->count();
        $readContacts = Contact::read()->count();

        return view('admin.contact.index', compact('totalContacts', 'unreadContacts', 'readContacts'));
    }

    public function datatables()
    {
        $datas = Contact::orderBy('id', 'desc')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('name', function(Contact $data) {
                return '<strong>' . $data->name . '</strong><br><small class="text-muted">' . $data->email . '</small>';
            })
            ->addColumn('message', function(Contact $data) {
                return '<div class="message-preview">' .
                       '<strong>Message:</strong><br>' .
                       '<span class="text-muted">' . Str::limit($data->message, 100) . '</span></div>';
            })
            ->addColumn('user_info', function(Contact $data) {
                return '<span class="badge badge-secondary">Guest User</span>';
            })
            ->addColumn('status', function(Contact $data) {
                $statusClass = $data->status == Contact::STATUS_READ ? 'badge-success' : 'badge-warning';
                $statusText = $data->status == Contact::STATUS_READ ? 'Read' : 'Unread';
                
                return '<div class="action-list">
                    <span class="badge ' . $statusClass . '">' . $statusText . '</span>
                    <select class="form-control form-control-sm mt-1 status-select" data-id="' . $data->id . '">
                        <option value="' . Contact::STATUS_UNREAD . '" ' . ($data->status == Contact::STATUS_UNREAD ? 'selected' : '') . '>Mark as Unread</option>
                        <option value="' . Contact::STATUS_READ . '" ' . ($data->status == Contact::STATUS_READ ? 'selected' : '') . '>Mark as Read</option>
                    </select>
                </div>';
            })
            ->addColumn('action', function(Contact $data) {
                return '<div class="action-list">
                    <a href="' . route('admin-contact-view', $data->id) . '" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="' . route('admin-contact-delete', $data->id) . '" class="btn btn-sm btn-danger delete"
                       onclick="return confirm(\'Are you sure you want to delete this contact?\')">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </div>';
            })
            ->addColumn('created_at', function(Contact $data) {
                return '<div class="text-center">
                    <strong>' . $data->created_at->format('d M Y') . '</strong><br>
                    <small class="text-muted">' . $data->created_at->format('h:i A') . '</small>
                </div>';
            })
            ->rawColumns(['name', 'message', 'user_info', 'status', 'action', 'created_at'])
            ->toJson();
    }

    public function view($id)
    {
        $contact = Contact::findOrFail($id);

        // Mark as read when viewed
        if ($contact->status == Contact::STATUS_UNREAD) {
            $contact->status = Contact::STATUS_READ;
            $contact->save();
        }

        return view('admin.contact.view', compact('contact'));
    }

    public function status($id1, $id2)
    {
        $contact = Contact::findOrFail($id1);

        // Convert numeric status to string status
        $status = $id2 == 1 ? Contact::STATUS_READ : Contact::STATUS_UNREAD;
        $contact->status = $status;
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
        Contact::where('status', Contact::STATUS_UNREAD)->update(['status' => Contact::STATUS_READ]);

        return redirect()->back()->withSuccess('All contacts marked as read');
    }

    public function deleteAll()
    {
        Contact::truncate();

        return redirect()->route('admin-contact')->withSuccess('All contacts deleted successfully');
    }

    public function exportContacts()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();

        $filename = 'contacts_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['ID', 'Name', 'Email', 'Message', 'Status', 'IP Address', 'Created At']);

            // Add data rows
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->message,
                    $contact->status,
                    $contact->ip_address,
                    $contact->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
