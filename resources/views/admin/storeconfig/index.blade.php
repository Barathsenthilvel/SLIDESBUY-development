@extends('layout.admin')

@section('content')
<style>
    /* Enhanced toaster styling */
    .notifyjs-bootstrap-success {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        padding: 15px 20px;
        font-weight: 500;
    }

    .notifyjs-bootstrap-error {
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        padding: 15px 20px;
        font-weight: 500;
    }

    /* Alert styling */
    .alert {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .alert-success {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    .alert-danger {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
        color: white;
    }

    .alert .close {
        color: white;
        opacity: 0.8;
    }

    .alert .close:hover {
        opacity: 1;
    }

    /* Animation for alerts */
    .alert.fade.show {
        animation: slideInDown 0.5s ease-out;
    }

    @keyframes slideInDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
                    <!--end::Header-->
                    <!--begin::Content-->
                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <!--begin::Page Heading-->
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <!--begin::Page Title-->
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Store Config</h5>
                                        <!--end::Page Title-->
                                        <!--begin::Breadcrumb-->

                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page Heading-->
                                </div>
                                <!--end::Info-->

                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <!-- Session Messages -->
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            <div>
                                                <strong>Success:</strong> {{ session('success') }}
                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>
                                            <div>
                                                <strong>Error:</strong> {{ session('error') }}
                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header flex-wrap py-3">
                                        <div class="card-title">
                                            <h3 class="card-label">List of Store Config</h3>
                                        </div>
                                        <div class="card-toolbar">

                                            {{-- <!--begin::Button-->
                                            <a href="{{route('admin-attribute-create')}}" class="btn btn-primary font-weight-bolder">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>Add Attribute</a>
                                            <!--end::Button--> --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered" id="geniustable" >
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Store Name</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                        </table>
                                        <!--end: Datatable-->
                                    </div>
                                </div>
                                <!--end::Card-->

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
 @endsection
 @push('script')
     <script type="text/javascript">
        $(function(){
            // Show toaster notification if success message exists
            @if(session('success'))
                // Show toaster notification
                $.notify("{{ session('success') }}", "success");

                // Auto-hide success alert after 5 seconds
                setTimeout(function() {
                    $('.alert-success').fadeOut();
                }, 5000);
            @endif

            @if(session('error'))
                // Show toaster notification
                $.notify("{{ session('error') }}", "error");

                // Auto-hide error alert after 8 seconds
                setTimeout(function() {
                    $('.alert-danger').fadeOut();
                }, 8000);
            @endif

            // Handle alert dismissal
            $('.alert .close').on('click', function() {
                $(this).closest('.alert').fadeOut();
            });

        var table = $('#geniustable').DataTable({
               processing: false,
               serverSide: true,
               ajax: "{{ route('admin-store-datatables') }}",
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'name', name: 'name' },
                        { data: 'status', searchable: false, orderable: false},
                        { data: 'action', searchable: false, orderable: false },


                     ],
                drawCallback : function( settings ) {
                        $('.select').niceSelect();
                }
            });
    });

$(document).on('change','.droplinks',function () {

        var link = $(this).val();
        var data = $(this).find(':selected').attr('data-val');
        if(data == 0)
        {
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-success").addClass("drop-danger");
        }
        else{
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-danger").addClass("drop-success");
        }
        $.get(link);
        $.notify("Status Updated Successfully.","success");
      });

{{-- DATA TABLE ENDS--}}

</script>
 @endpush
