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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">All Contact Messages</h4>
                            <div>
                                <a href="{{ route('admin-contact-mark-all-read') }}" class="btn btn-success btn-sm">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
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

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#contactTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('admin-contact-datatables') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'message', name: 'message', render: function(data) {
                return data.length > 50 ? data.substr(0, 50) + '...' : data;
            }},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[0, 'desc']],
        pageLength: 25,
        responsive: true
    });

    // Handle status change
    $(document).on('change', '.process', function() {
        var url = $(this).val();
        if (url) {
            window.location.href = url;
        }
    });

    // Handle delete confirmation
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this contact?')) {
            window.location.href = $(this).attr('href');
        }
    });
});
</script>
@endpush
