@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Contact Message Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-contact') }}">Contact Messages</a></li>
                            <li class="breadcrumb-item active">View Message</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Message from {{ $contact->name }}</h4>
                            <div>
                                <a href="{{ route('admin-contact') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <a href="mailto:{{ $contact->email }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-reply"></i> Reply via Email
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="message-content">
                                    <div class="alert alert-info">
                                        <h5><i class="fas fa-envelope me-2"></i>Message Content</h5>
                                        <hr>
                                        <div class="message-text" style="white-space: pre-wrap; line-height: 1.6;">
                                            {{ $contact->message }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="message-details">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Message Details</h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><strong>Name:</strong></td>
                                                    <td>{{ $contact->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email:</strong></td>
                                                    <td>
                                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td>
                                                        @if($contact->status == \App\Models\Contact::STATUS_READ)
                                                            <span class="badge badge-success">Read</span>
                                                        @else
                                                            <span class="badge badge-warning">Unread</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>User Type:</strong></td>
                                                    <td>
                                                        <span class="badge badge-secondary">Guest User</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>IP Address:</strong></td>
                                                    <td>{{ $contact->ip_address ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Submitted:</strong></td>
                                                    <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h6 class="mb-0"><i class="fas fa-cogs me-2"></i>Actions</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-grid gap-2">
                                                @if($contact->status == \App\Models\Contact::STATUS_UNREAD)
                                                    <a href="{{ route('admin-contact-status', ['id1' => $contact->id, 'id2' => 1]) }}"
                                                       class="btn btn-success btn-sm">
                                                        <i class="fas fa-check"></i> Mark as Read
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin-contact-status', ['id1' => $contact->id, 'id2' => 0]) }}"
                                                       class="btn btn-warning btn-sm">
                                                        <i class="fas fa-eye-slash"></i> Mark as Unread
                                                    </a>
                                                @endif

                                                <a href="{{ route('admin-contact-delete', $contact->id) }}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to delete this contact message?')">
                                                    <i class="fas fa-trash"></i> Delete Message
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.message-content .alert {
    border-radius: 10px;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.message-text {
    font-size: 16px;
    color: #333;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #007bff;
}

.message-details .card {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.message-details .card-header {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    border-radius: 10px 10px 0 0 !important;
}

.message-details .table td {
    padding: 8px 0;
    vertical-align: top;
}

.message-details .table td:first-child {
    width: 40%;
    font-weight: 600;
}

.badge {
    font-size: 0.75em;
    padding: 0.5em 0.75em;
}
</style>
@endpush
