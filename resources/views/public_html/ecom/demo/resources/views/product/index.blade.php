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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Product</h5>
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
                                            <h3 class="card-label">List of Products</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            
                                            
											<div class="dropdown dropdown-inline">
											    <!--begin::Button-->
                                            <a href="{{route('admin-product-group')}}" class="btn btn-primary font-weight-bolder">
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
                                            </span>Add Product</a>
                                            <!--end::Button-->
												<button type="button" class="btn btn-secondary font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Download</button>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="navi flex-column navi-hover py-2">
														<li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">Export Downloads</li>
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
                                        <!--begin: Datatable-->
                                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>SKU</th>
                                                    <th>M-Code</th>
                                                    <th>Admin / vendor</th>
                                                    <th>Sold on/off</th>
                                                    <th>Quantity</th>
                                                    <th>status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
												<tr>
													<th>Sno</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>SKU</th>
                                                    <th>M-Code</th>
                                                    <th>Admin / vendor</th>
                                                    <th>Sold on/off</th>
                                                    <th>Quantity</th>
                                                    <th>status</th>
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
        order:[[0,'desc']],

        language: {
            'lengthMenu': 'Display _MENU_',
        },

        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('admin-product-datatables') }}',
            type: 'POST',
            data: {
                // parameters for custom backend script demo
                "_token": "{{ csrf_token() }}"
            },
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'product_title'
            },
            {
                data: 'image1'
            },
            {
                data: 'category'
            },
            {
                data: 'manufacturerPrice'
            },
            {
                data: 'product_sku'
            },
            {
                data: 'manufacturerCode'
            },
            {
                data: 'vendor'
            },
            {
                data: 'soldout'
            },
            {
                data: 'quantity'
            },
            {
                data: 'status'
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
                    case 'Product':
                        input = $(`<input type="text" class="form-control form-control-sm form-filter datatable-input" data-col-index="` + column.index() + `"/>`);
                        break;
                    case 'image':
                        break;
                    case 'Category':
                    input = $(`<select class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="` + column.index() + `">
                                    <option value="">Select</option>
                                    @foreach ($cate as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                    </select>`);
                        break;
                    case 'SKU':
                        input = $(`<input type="text" class="form-control form-control-sm form-filter datatable-input" data-col-index="` + column.index() + `"/>`);
                        break;
                    case 'M-Code':
                        input = $(`<input type="text" class="form-control form-control-sm form-filter datatable-input" data-col-index="` + column.index() + `"/>`);
                        break;
                    case 'Admin / vendor':
                        break;
                    case 'Sold on/off':
                        input = $(`<select class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="` + column.index() + `">
                                    <option value="">Select</option>
                                    <option value="on">On</option>
                                    <option value="off">Off</option></select>`);
                        break;
                    case 'status':
                        input = $(`<select class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="` + column.index() + `">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option></select>`);
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
                    return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="'+full.edit+'"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit</span></a></li>\
							    		<li class="nav-item"><a class="nav-link action-list delete" href="'+full.delete+'"><i class="nav-icon la la-leaf"></i><span class="nav-text">Delete</span></a></li>\
									</ul>\
							  	</div>\
							</div>\
						';
                },
            },
            {
                targets: 0,
                width: '30px',
            },
            {
                targets: 1,
                width: '100px',
            },
            {
                targets: 2,
                width: '180px',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '<img style="width: 100px;height: 100px;" src="'+full.img_src+'">';
                },
            },
            {
                targets: 3,
                width: '100px',
            },
            {
                targets: 4,
                width: '100px',
            },
            {
                targets: 5,
                width: '100px',
                render:function(data, type, full, meta){
                    return '{{$StoreConfig->productIdprefix}}-'+data;
                }
            },
            {
                targets: 6,
                orderable: false,
                width: '100px',
            },
            {
                targets: 7,
                width: '100px',
            },
            {
                targets: 8,
                width: '100px',
                // render: function(data, type, full, meta) {
                //     var status = {
                //         On: {
                //             'title': 'On',
                //             'data' : 'on',
                //             'class': 'label-light-primary'
                //         },
                //         Off: {
                //             'title': 'Off',
                //             'data' : 'off',
                //             'class': ' label-light-danger'
                //         }
                //     };
                //     var option = "";
                //     for(var K in status){
                //         var check = (status[K].data == data) ? 'selected':'';
                //         option +='<option  value='+status[K].data+' ' +check+'>'+status[K].title +'</option>';
                //     }
                //     return '<select class="form-control form-control-sm form-filter datatable-input">'+option+'</select>';
                // }
            },
            {
                targets: 9,
                width: '100px',
            },
            {
                targets: 10,
                width: '100px',
                render: function(data, type, full, meta) {
                    var status = {
                        '1': {
                            'title': 'Activate',
                            'data' : '1',
                            'class': 'label-light-primary'
                        },
                        '0': {
                            'title': 'Deactivated',
                            'data' : '0',
                            'class': ' label-light-danger'
                        }
                    };
                    var option = "";
                    for(var K in status){
                        var check = (status[K].data == data) ? 'selected':'';
                        option +='<option data-link='+full.temp_status[K]+' value='+status[K].data+' ' +check+'>'+status[K].title +'</option>';
                    }
                    return '<select class="status form-control form-control-sm form-filter datatable-input">'+option+'</select>';
                }
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

$(document).on('change','.status',function () {

        var data = $(this).val();
        var link = $(this).find(':selected').attr('data-link');
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

</script>
 @endpush   
