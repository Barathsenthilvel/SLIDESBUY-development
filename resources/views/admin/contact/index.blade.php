@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Contact Messages</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Messages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total Messages</p>
                                <h4 class="mb-0">{{ $totalContacts }}</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="fas fa-envelope font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Unread Messages</p>
                                <h4 class="mb-0 text-warning">{{ $unreadContacts }}</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-warning align-self-center">
                                    <span class="avatar-title">
                                        <i class="fas fa-eye-slash font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Read Messages</p>
                                <h4 class="mb-0 text-success">{{ $readContacts }}</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                    <span class="avatar-title">
                                        <i class="fas fa-check font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Actions</p>
                                <h6 class="mb-0">Quick Actions</h6>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-info align-self-center">
                                    <span class="avatar-title">
                                        <i class="fas fa-cogs font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">All Contact Messages</h4>
                            <div>
                                <a href="{{ route('admin-contact-export') }}" class="btn btn-info btn-sm me-2">
                                    <i class="fas fa-download"></i> Export CSV
                                </a>
                                <a href="{{ route('admin-contact-mark-all-read') }}" class="btn btn-success btn-sm me-2">
                                    <i class="fas fa-check-double"></i> Mark All as Read
                                </a>
                                <a href="{{ route('admin-contact-delete-all') }}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete all contacts? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i> Delete All
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="contactTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Contact Info</th>
                                        <th>Message Preview</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
.mini-stats-wid .mini-stat-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mini-stats-wid .avatar-title {
    color: white;
}

.table th {
    background-color: #f8f9fa;
    border-color: #dee2e6;
    font-weight: 600;
}

.message-preview {
    max-width: 300px;
}

.status-select {
    max-width: 120px;
    font-size: 0.875rem;
}

.badge {
    font-size: 0.75em;
    padding: 0.5em 0.75em;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#contactTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('admin-contact-datatables') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '5%'},
            {data: 'name', name: 'name', width: '20%'},
            {data: 'message', name: 'message', width: '25%'},
            {data: 'user_info', name: 'user_info', width: '15%'},
            {data: 'status', name: 'status', width: '15%'},
            {data: 'created_at', name: 'created_at', width: '10%'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '10%'}
        ],
        order: [[0, 'desc']],
        pageLength: 25,
        responsive: true,
        language: {
            search: "Search messages:",
            lengthMenu: "Show _MENU_ messages per page",
            info: "Showing _START_ to _END_ of _TOTAL_ messages",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });

    // Handle status change
    $(document).on('change', '.status-select', function() {
        var contactId = $(this).data('id');
        var newStatus = $(this).val();

        if (confirm('Are you sure you want to change the status of this message?')) {
            var url = "{{ route('admin-contact-status', ['id1' => ':id', 'id2' => ':status']) }}"
                .replace(':id', contactId)
                .replace(':status', newStatus);

            window.location.href = url;
        } else {
            // Reset to previous value
            $(this).val($(this).data('previous'));
        }
    });

    // Store previous value on focus
    $(document).on('focus', '.status-select', function() {
        $(this).data('previous', $(this).val());
    });

    // Handle delete confirmation
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this contact message?')) {
            window.location.href = $(this).attr('href');
        }
    });

    // Auto-refresh table every 30 seconds for new messages
    setInterval(function() {
        table.ajax.reload(null, false);
    }, 30000);
});
</script>
@endpush
