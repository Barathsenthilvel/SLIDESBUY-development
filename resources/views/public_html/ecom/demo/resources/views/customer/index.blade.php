@extends('layout.admin') 

@section('content')  
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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Customer</h5>
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
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header flex-wrap py-3">
                                        <div class="card-title">
                                            <h3 class="card-label">List of Customers</h3>
                                        </div>
                                        
                                    </div>
                                  <div class="card-body">
                                        <!--begin: Search Form-->
                                        <form class="mb-15">
                                            <div class="row mb-6">
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>CustomerID:</label>
                                                    <input type="text" class="form-control datatable-input" placeholder="Customer Id" data-col-index="0" />
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Name:</label>
                                                    <input type="text" class="form-control datatable-input" placeholder="Name" data-col-index="1" />
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Email:</label>
                                                    <input type="text" class="form-control datatable-input" placeholder="Email" data-col-index="2" />
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Mobile:</label>
                                                    <input type="text" class="form-control datatable-input" placeholder="Mobile" data-col-index="3" />
                                                </div>
                                            </div>
                                            <div class="row mb-8">
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Created:</label>
                                                    <div class="input-daterange input-group" id="kt_datepicker">
                                                        <input type="text" class="form-control datatable-input" name="start" placeholder="From" data-col-index="4" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-ellipsis-h"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control datatable-input" name="end" placeholder="To" data-col-index="4" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Customer Type:</label>
                                                    <select class="form-control datatable-input" data-col-index="5">
                                                        <option value="">Select</option>
                                                     
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>City:</label>
                                                    <select class="form-control datatable-input" data-col-index="6">
                                                        <option value="">Select</option>
                                                 
                                                    </select>
                                                </div>

                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>State:</label>
                                                    <select class="form-control datatable-input" data-col-index="7">
                                                        <option value="">Select</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-8">
                                                
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Country:</label>
                                                    <select class="form-control datatable-input" data-col-index="8">
                                                        <option value="">Select</option>
                                                        </select>
                                                </div>
                                                <div class="col-lg-3 mb-lg-0 mb-6">
                                                    <label>Pincode:</label>
                                                    <select class="form-control datatable-input" data-col-index="9">
                                                        <option value="">Select</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-8">
                                                <div class="col-lg-12">
                                                <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                        <span>Search</span>
                                                    </span>
                                                </button>&#160;&#160;
                                                <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                                    <span>
                                                        <i class="la la-close"></i>
                                                        <span>Reset</span>
                                                    </span>
                                                </button></div>
                                            </div>
                                        </form>
                                        <!--begin: Datatable-->
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable1">
                                            <thead>
                                                <tr>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Customer Type</th>
                                                    <th>Reg-Date</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Country</th>
                                                    <th>Pincode</th>
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
        "use strict";
var KTDatatablesSearchOptionsAdvancedSearch1 = function() {

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    var initTable11 = function() {
        // begin first table
        var table = $('#kt_datatable1').DataTable({
            responsive: true,
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            language: {
                'lengthMenu': 'Display _MENU_',
            },

            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{route('admin-customer-datatables')}}',
                type: 'POST',
                data: {
                    // parameters for custom backend script demo
                    "_token": "{{ csrf_token() }}",
                    columnsDef: [
                        'RecordID', 'OrderID', 'Country', 'ShipCity', 'CompanyAgent',
                        'ShipDate', 'Status', 'Type', 'Actions',],
                },
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'Phone'},
                {data: 'customer_type'},
                {data: 'created_at'},
                {data: 'city'},
                {data: 'state'},
                {data: 'country'},
                {data: 'pincode'},
                {data: 'status'},
                {data: 'id', responsivePriority: -1},
            ],

            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;

                    switch (column.title()) {
                        case 'Customer Type':
                        const unique4=[];
                            column.data().each((d,j)=>{
                                if(d != null){
                                    unique4[d.id] = d; 
                                    var d;
                                    var option = '';
                                    for(d in unique4) {
                                        option +='<option value="' + unique4[d].id + '">' + unique4[d].title + '</option>';
                                    };
                                    $('.datatable-input[data-col-index="5"]').html(option);
                                }
                            });
                            break;
                            case 'City':
                            const unique=[];
                            column.data().each((d,j)=>{
                                if(d != null){
                                    unique[d.id] = d; 
                                    var d;
                                    var option = '';
                                    for(d in unique) {
                                        option += '<option value="' + unique[d].id + '">' + unique[d].city_name + '</option>';
                                    };
                                    $('.datatable-input[data-col-index="6"]').html(option);
                                }
                            });
                            break;
                            case 'State':
                            const unique1=[];
                            column.data().each((d,j)=>{
                                if(d != null){
                                unique1[d.id] = d; 
                                var d;
                                var option = '';
                                for(d in unique1) {
                                    option += '<option value="' + unique1[d].id + '">' + unique1[d].state_name + '</option>';
                                };
                                $('.datatable-input[data-col-index="7"]').html(option);
                                }
                            });
                            
                            break;
                            case 'Country':
                            const unique2=[];
                            column.data().each((d,j)=>{ 
                                if(d != null){
                                unique2[d.id] = d; 
                                var d;
                                var option = '';
                                for(d in unique2) {
                                    option += '<option value="' + unique2[d].id + '">' + unique2[d].country_name + '</option>';
                                };
                                $('.datatable-input[data-col-index="8"]').html(option);
                                }
                            });
                            break;
                            case 'Pincode':
                            const unique3=[];
                            column.data().each((d,j)=>{
                                if(d != null){
                                unique3[d.id] = d; 
                            var d;
                            var option  ="";
                            for(d in unique3) {
                                option+='<option value="' + unique3[d].id + '">' + unique3[d].pincode + '</option>';
                            };
                                $('.datatable-input[data-col-index="9"]').html(option);
                                }
                                });
                            break;
                    }
                });
            },

            columnDefs: [
            {
                 targets: 4,
                 render: function(data, type, full, meta) { return (data != null)?data.title:'Not Found';},
            },
            {
                 targets: 6,
                 render: function(data, type, full, meta) { return (data != null)?data.city_name:'Not Found';},
            },
            {
                 targets: 7,
                 render: function(data, type, full, meta) { return  (data != null)?data.state_name:'Not Found';},
            },
            {
                 targets: 8,
                 render: function(data, type, full, meta) { return (data != null)?data.country_name:'Not Found';},
            },
            {
                 targets: 9,
                 render: function(data, type, full, meta) { return  (data != null)?data.pincode:'Not Found';},
            },
            {
                 targets: 2,
                 width: '150px',
            },
            {
                targets: 0,
                width: '100px',
                render:function(data, type, full, meta){
                    return '{{$StoreConfig->CustomerIDPrefix}}'+(full.id).toString().padStart(3,0);
                }
            },
            {
                targets: 10,
                orderable: false,
                width: '100px',
                render: function(data, type, full, meta) {
                    var baseURL = '{{route('admin-baseURL-customer-status')}}';
                    var option = "";
                        var status = {
                            0: {'title': 'Deactivated', 'class': ' label-light-danger'},
                            1: {'title': 'Activated', 'class': ' label-light-success'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        for(var K in status){
                        var check = (status[K].title == status[data].title) ? 'selected':'';
                        option +='<option '+check+' data-val='+data+' value='+baseURL+'/'+full.id+'/'+K+'>'+status[K].title +'</option>';
                            }
                            return '<select class="form-control form-control-sm form-filter datatable-input statusChange">'+option+'</select>';
                        // return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                    },
                },
                {
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var baseURL = '{{route('admin-customer-edit')}}/'+full.id;
                        var deleteurl = '{{route('admin-customer-delete')}}/'+full.id;
                        return '\<a href="'+baseURL+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="'+deleteurl+'" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>\
                        ';
                    },
                },
                {
                targets: 5,
                width: '100px',
                render: function(data, type, full, meta) {
                    const A = new Date(full.created_at);
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    return  A.toLocaleDateString(undefined,options);
                },
            },
                // {
                //     targets: 6,
                //     render: function(data, type, full, meta) {
                //         var status = {
                //             1: {'title': 'Pending', 'class': 'label-light-primary'},
                //             2: {'title': 'Delivered', 'class': ' label-light-danger'},
                //             3: {'title': 'Canceled', 'class': ' label-light-primary'},
                //             4: {'title': 'Success', 'class': ' label-light-success'},
                //             5: {'title': 'Info', 'class': ' label-light-info'},
                //             6: {'title': 'Danger', 'class': ' label-light-danger'},
                //             7: {'title': 'Warning', 'class': ' label-light-warning'},
                //         };
                //         if (typeof status[data] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                //     },
                // },
                // {
                //     targets: 7,
                //     render: function(data, type, full, meta) {
                //         var status = {
                //             1: {'title': 'Online', 'state': 'danger'},
                //             2: {'title': 'Retail', 'state': 'primary'},
                //             3: {'title': 'Direct', 'state': 'success'},
                //         };
                //         if (typeof status[data] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                //             '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                //     },
                // },
            ],
        });

        var filter = function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
        };

        var asdasd = function(value, index) {
            var val = $.fn.dataTable.util.escapeRegex(value);
            table.column(index).search(val ? val : '', false, true);
        };

        $('#kt_search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            $('.datatable-input').each(function() {
                var i = $(this).data('col-index');
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                }
                else {
                    params[i] = $(this).val();
                }
            });
            $.each(params, function(i, val) {
                // apply search params to datatable
                table.column(i).search(val ? val : '', false, false);
            });
            table.table().draw();
        });

        $('#kt_reset').on('click', function(e) {
            e.preventDefault();
            $('.datatable-input').each(function() {
                $(this).val('');
                table.column($(this).data('col-index')).search('', false, false);
            });
            table.table().draw();
        });

        $('#kt_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
        });

    };

    return {

        //main function to initiate the module
        init: function() {
            initTable11();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesSearchOptionsAdvancedSearch1.init();
});


$(document).on('change','.statusChange',function () {

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
