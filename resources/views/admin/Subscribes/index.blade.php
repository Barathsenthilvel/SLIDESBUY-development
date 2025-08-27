@extends('layout.admin')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Newsletter Subscribers</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">List of Newsletter Subscribers</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="geniustable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Email</th>
                                <th>Subscribe Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
$(function(){
    var table = $('#geniustable').DataTable({
        processing: false,
        serverSide: true,
        ajax: "{{ route('admin-SubScribers-datatables') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'email', name: 'email'},
            { data: 'created_at', name: 'created_at'},
        ],
        drawCallback : function( settings ) {
            $('.select').niceSelect();
        }
    });
});
</script>
@endpush
