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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Order</h5>
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
                                            <h3 class="card-label">List of Order</h3>
                                        </div>
                                        <div class="card-toolbar">
											<div class="dropdown dropdown-inline">
												<button type="button" class="btn btn-secondary btn-sm font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Tools</button>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="navi flex-column navi-hover py-2">
														<li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Export Tools</li>
														<li class="navi-item">
															<a href="#" class="navi-link" id="export_copy">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
																<span class="navi-text">Copy</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link" id="export_excel">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
																<span class="navi-text">Excel</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link" id="export_csv">
																<span class="navi-icon">
																	<i class="la la-file-text-o"></i>
																</span>
																<span class="navi-text">CSV</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Modal-->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
                                        <!--begin: Datatable-->
                                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Order ID</th>
                                                    <th>Order Date</th>
                                                    <th>Customer Info</th>
                                                    <th>Final Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Payment Status</th>
                                                    <th>Order Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
												<tr>
													<th>Sno</th>
                                                    <th>Order ID</th>
                                                    <th>Order Date</th>
                                                    <th>Customer Info</th>
                                                    <th>Final Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Payment Status</th>
                                                    <th>Order Status</th>
                                                    <th>Option</th>
												</tr>
											</tfoot>
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
     var URL = '{{route('baseurl')}}';
        var KTDatatablesSearchOptionsColumnSearch1 = function() {

$.fn.dataTable.Api.register('column().title()', function() {
    return $(this.header()).text().trim();
});

var initTable1 = function() {

    // begin first table
    var table = $('#kt_datatable1').DataTable({
        responsive: true,
        buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
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
            url: '{{ route('admin-order-datatables') }}',
            type: 'POST',
            data: {
                // parameters for custom backend script demo
                "_token": "{{ csrf_token() }}",
                columnsDef: [
                    'id', 'order_id', 'order_date', 'first_name', 'totalPrice',
                    'payment_method', 'payment_status', 'delivery_status', 'first_name','first_name','first_name'
                ],
            },
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'order_id'
            },
            {
                data: 'order_date'
            },
            {
                data: 'first_name'
            },
            {
                data: 'grandTotal'
            },
            {
                data: 'payment_method'
            },
            {
                data: 'payment_status'
            },
            {
                data: 'delivery_status'
            },
            {
                data: 'id',
                responsivePriority: -1
            },
        ],
        initComplete: function() {
            var thisTable = this;
            var rowFilter = $('<tr class="filter"></tr>').appendTo($(table.table().header()));

            this.api().columns().every(function() {
                var column = this;
                var input;

                switch (column.title()) {
                    case 'Sno':
                        break;
                    case 'Order ID':
                        input = $(`<input type="text" class="form-control form-control-sm form-filter datatable-input" data-col-index="` + column.index() + `"/>`);
                        break;
                    case 'Order Date':
                    input = $(`
                            <div class="input-group date">
                                <input type="text" class="form-control form-control-sm datatable-input" readonly placeholder="From" id="kt_datepicker_1"
                                 data-col-index="` + column.index() + `"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="input-group date d-flex align-content-center">
                                <input type="text" class="form-control form-control-sm datatable-input" readonly placeholder="To" id="kt_datepicker_2"
                                 data-col-index="` + column.index() + `"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>
                                </div>
                            </div>`);
                        break;
                    case 'Customer Info':
                        input = $(`<input type="text" class="form-control form-control-sm form-filter datatable-input" data-col-index="` + column.index() + `"/>`);
                        break;
                    case 'Final Amount':
                        break;
                    case 'Payment Method':
                    case 'Payment Status':
                        input = $(`<select class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="` + column.index() + `">
                                    <option value="">Select</option></select>`);
                        column.data().unique().sort().each(function(d, j) {
                            $(input).append('<option value="' + d + '">' + d + '</option>');
                        });
                        break;
                    case 'Order Status':
                        input = $(`<select class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="` + column.index() + `">
                                    <option value="">Select</option><option value="fail">fail</option><option value="Confirmed">Confirmed</option><option value="placed">placed</option><option value="Shipped">Shipped</option><option value="Delivered">Delivered</option><option value="Returned">Returned</option></select>`);
                        // column.data().unique().sort().each(function(d, j) {
                        //     $(input).append('<option value="' + d + '">' + d + '</option>');
                        // });
                        break;
                    case 'Option':
                        var search = $(`
                            <button class="btn btn-primary kt-btn btn-sm kt-btn--icon d-block">
                                <span>
                                    <i class="la la-search"></i>
                                    <span>Search</span>
                                </span>
                            </button>`);

                        var reset = $(`
                            <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">
                                <span>
                                   <i class="la la-close"></i>
                                   <span>Reset</span>
                                </span>
                            </button>`);

                        $('<th>').append(search).append(reset).appendTo(rowFilter);

                        $(search).on('click', function(e) {
                            e.preventDefault();
                            var params = {};
                            $(rowFilter).find('.datatable-input').each(function() {
                                var i = $(this).data('col-index');
                                if (params[i]) {
                                    params[i] += '|' + $(this).val();
                                } else {
                                    params[i] = $(this).val();
                                }
                            });
                            $.each(params, function(i, val) {
                                // apply search params to datatable
                                table.column(i).search(val ? val : '', false, false);
                            });
                            table.table().draw();
                        });

                        $(reset).on('click', function(e) {
                            e.preventDefault();
                            $(rowFilter).find('.datatable-input').each(function(i) {
                                $(this).val('');
                                table.column($(this).data('col-index')).search('', false, false);
                            });
                            table.table().draw();
                        });
                        break;
                }

                if (column.title() !== 'Option') {
                    $(input).appendTo($('<th>').appendTo(rowFilter));
                }
            });

            // hide search column for responsive table
            var hideSearchColumnResponsive = function() {
                thisTable.api().columns().every(function() {
                    var column = this
                    if (column.responsiveHidden()) {
                        $(rowFilter).find('th').eq(column.index()).show();
                    } else {
                        $(rowFilter).find('th').eq(column.index()).hide();
                    }
                })
            };

            // init on datatable load
            hideSearchColumnResponsive();
            // recheck on window resize
            window.onresize = hideSearchColumnResponsive;

            $('#kt_datepicker_1,#kt_datepicker_2').datepicker();
        },
        columnDefs: [{
                targets: -1,
                title: 'Option',
                orderable: false,
                render: function(data, type, full, meta) {
                    var URL_View= '{{route('admin-order-view1')}}/'+data;
                    return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="'+URL_View+'"><i class="nav-icon la la-edit"></i><span class="nav-text">View</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Invoice</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Lable</span></a></li>\
									</ul>\
							  	</div>\
							</div>\
						';
                },
            },
            {
                targets: 3,
                width: '180px',
                render: function(data, type, full, meta) {
                    return '<span class="font-weight-bold text-danger">'+full.first_name+' '+full.last_name+'</span></br><span class="font-weight-bold text-primary">'+full.apparment+','+full.city+'\
                    ,'+full.state+' '+ full.country+' </br>Pincode :'+full.post_code+'</span>';
                },
            },
            {
                targets: 4,
                width: '100px',
            },
            {
                targets: 2,
                width: '100px',
                render: function(data, type, full, meta) {
                    const A = new Date(full.created_at);
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    return  A.toLocaleDateString(undefined,options);
                },
            },
            {
                targets: 5,
                width: '100px',
            },
            {
                targets: 0,
                width: '30px',
            },
            {
                targets: 1,
                width: '100px',
                render:function(data, type, full, meta){
                    return '{{$StoreConfig->OrderIDPrefix}}'+full.id;
                }
            },
            {
                targets: 6,
                width: '100px',
                render: function(data, type, full, meta) {
                    var URL = '{{route('baseurl')}}';
                    var status = {
                        fail: {
                            'title': 'fail',
                            'class': 'label-light-primary'
                        },
                        Pending: {
                            'title': 'Pending',
                            'class': 'label-light-info'
                        },
                        success: {
                            'title': 'success',
                            'class': ' label-light-danger'
                        }
                    };
                    if(status[data].title == "success"){ return '<span class="font-weight-bold text-success">'+status[data].title+'</span>';  }
                    var option = "";
                    for(var K in status){
                        var check = (status[K].title == status[data].title) ? 'selected':'';
                        option +='<option data-id='+full.id+' data-status='+status[K].title+' value='+status[K].title+' ' +check+'>'+status[K].title +'</option>';
                    }
                    return '<select onchange="updatepayment(this)" class="form-control form-control-sm form-filter datatable-input">'+option+'</select>';
                    // return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                },
            },
            {
                targets: 7,
                width: '100px',
                render: function(data, type, full, meta) {
                    var URL = '{{route('baseurl')}}';
                    var status = {
                        fail: {
                                'title': 'fail',
                                'class': 'label-light-primary'
                            },
                            Confirmed: {
                                'title': 'Confirmed',
                                'class': 'label-light-primary'
                            },
                            placed: {
                                'title': 'placed',
                                'class': ' label-light-danger'
                            },
                            Shipped: {
                                'title': 'Shipped',
                                'class': ' label-light-primary'
                            },
                            Delivered: {
                                'title': 'Delivered',
                                'class': ' label-light-success'
                            },
                            // Returned: {
                            //     'title': 'Returned',
                            //     'class': ' label-light-info'
                            // },
                            Canceled: {
                                'title': 'Canceled',
                                'class': ' label-light-info'
                            }
                            // ReturnedByCustomer: {
                            //     'title': 'ReturnedByCustomer',
                            //     'class': ' label-light-info'
                            // },
                    };
                    var option = "";
                        for(var K in status){
                            var check = (status[K].title == status[data].title) ? 'selected':'';
                            option +='<option data-shipping='+URL+'/shippingnodes/'+full.id+'/'+status[K].title+' data-link='+URL+'/orderststus/'+full.id+'/'+status[K].title+' value='+status[K].title+' ' +check+'>'+status[K].title +'</option>';
                        }
                        return '<select class="form-control form-control-sm form-filter datatable-input orderstatus">'+option+'</select>';
                    // return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' + '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                },
            },
        ],
    });
		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});
};

return {

    //main function to initiate the module
    init: function() {
        initTable1();
    },

};

}();

jQuery(document).ready(function() {
KTDatatablesSearchOptionsColumnSearch1.init();
});

$(document).on('change','.orderstatus',function () {

        var data = $(this).val();
        var link = $(this).find(':selected').attr('data-link');
        if(data == "Shipped" || data == 'Returned'){
            $("#exampleModal .modal-body").load($(this).find(':selected').attr('data-shipping'));
            $('#exampleModal').modal('show');
        }
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

$('body').submit('#model',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    const url = e.target.action;
    $.ajax({
        method:"POST",
        url:url,
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.msg){
            $('#exampleModal').modal('hide');
            $.notify(data.msg,"success");
            }
        },
        error:function(erroe){
            console.log(erroe);
            window.scrollTo({top:0,behavior:'smooth'});
            alert("Something is wrong");
        }
    });
});

function updatepayment(obj){
    var id = $(obj).find(':selected').attr('data-id');
    var val = obj.value;
    var link = `${URL}/paymentstatus/${id}/${val}`;
    $.get(link);
    $.notify("Payment Updated Successfully.","success");
}
</script>
 @endpush   
