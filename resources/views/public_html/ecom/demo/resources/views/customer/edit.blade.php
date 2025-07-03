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
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-customer') }}" class="text-muted">List of Customers</a>
                                            </li>
                                        </ul>
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
                                <div class="card card-custom">
                                    <div class="card-body p-0">
                                        <!--begin::Wizard-->
                                        <div class="wizard wizard-1" id="kt_wizard1" data-wizard-state="step-first" data-wizard-clickable="false">
                                            <!--begin::Wizard Nav-->
                                            <div class="wizard-nav border-bottom">
                                                <div class="wizard-steps p-8 p-lg-10">
                                                    <!--begin::Wizard Step 1 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                                        <div class="wizard-label">
                                                            <i class="wizard-icon flaticon-list"></i>
                                                            <h3 class="wizard-title">1. Customer Details</h3>
                                                        </div>
                                                        <span class="svg-icon svg-icon-xl wizard-arrow">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    <!--end::Wizard Step 1 Nav-->
                                                    <!--begin::Wizard Step 2 Nav-->
                                                    <div class="wizard-step" data-wizard-type="step">
                                                        <div class="wizard-label">
                                                            <i class="wizard-icon flaticon-bus-stop"></i>
                                                            <h3 class="wizard-title">2. Billing & Shipping Addresses</h3>
                                                        </div>
                                                        
                                                    </div>
                                                    <!--end::Wizard Step 2 Nav-->
                                                </div>
                                            </div>
                                            <!-- Modal-->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
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
                                            <!--end::Wizard Nav-->
                                            
                                            <!--begin::Wizard Body-->
                                            <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                                <div class="col-xl-12 col-xxl-7">
                                                    <!--begin::Wizard Form-->
                                                    <form class="form" method="post" action="{{route('admin-customer-update',$data->id)}}" id="kt_form1">
                                                        <!--begin::Wizard Step 1-->
                                                        {{ csrf_field() }}
                                                        <div class="pb-5" data-wizard-type="step-content">
                                                            <h4 class="mb-10 font-weight-bold text-dark">Customer Profile</h4>
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Customer Id</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg"  value="{{$StoreConfig->CustomerIDPrefix}}{{sprintf('%03d',$data->id)}}" readonly />
                                                            </div>
                                                            <!--end::Input-->
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Customer Name</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg"  value="{{$data->name}}" readonly />
                                                            </div>
                                                            <!--end::Input-->
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" value="{{$data->email}}" readonly />
                                                            </div>
                                                            <!--end::Input-->
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" value="{{$data->Phone}}" readonly />
                                                            </div>
                                                            <!--end::Input-->
                                                            <!--begin::Select-->
                                                            <div class="form-group">
                                                                <label>Customer Group</label>
                                                                <select name="customerGroup" class="form-control ">
                                                                            <option value="">Select</option>
                                                                            @foreach($customerGroup as $customerGroups)
                                                                            <option value="{{$customerGroups->id}}" {{($data->customer_type == $customerGroups->id)?"selected":""}}>{{$customerGroups->title}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Select-->
                                                            
                                                        </div>
                                                        <!--end::Wizard Step 1-->
                                                        <div id="AddTemplate">
                                                        @include('admin.customer.address')
                                                        </div>
                                                        <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                            <div class="mr-2">
                                                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                                <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Actions-->
                                                    </form>
                                                    <!--end::Wizard Form-->
                                                </div>
                                            
                                            
                                            <!--end::Wizard Body-->
                                                
                                            </div>
                                        </div>
                                        <!--end::Wizard-->
                                    </div>
                                    <!--end::Wizard-->
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>

                    <!--end::Content-->
                    <!--begin::Footer-->
 @endsection                     

 @push('script')
<script>
   
    function pinFunction(id){
        var postcode=$(".pincode"+id).val();
        $.ajax({
                    type: "POST",
                    url:'{{ route('postcode') }}',
                    data:{postcode:postcode,'_token': "{{ csrf_token() }}"},
                    success:function(data){ 
                      console.log(data);
                      $(".country"+id).val(data["country_id"]);
                      $(".state"+id).val(data["state_id"]);
                      $(".city"+id).val(data["city_id"]);
                    },
                    error:function(data){
                      console.table(data);
                    }
              });
    }
    

        "use strict";

// Class definition
var KTWizard11 = function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    customerGroup: {
                        validators: {
                            notEmpty: {
                                message: 'Customer Group is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        // Step 2
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    
                    postcode: {
                        validators: {
                            notEmpty: {
                                message: 'Postcode is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));

        
    }

    var _initWizard = function () {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false  // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function (wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false;  // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on('changed', function (wizard) {
            KTUtil.scrollTop();
        });

        // Submit event
        _wizardObj.on('submit', function (wizard) {
            Swal.fire({
                text: "All is good! Please confirm the form submission.",
                icon: "success",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, submit!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function (result) {
                if (result.value) {
                    // Submit form
                   // _formEl.submit();
                   // const formData = new FormData(_formEl.target);
                   // console.table(formData);
                   const formData = new FormData(_formEl);
                    $.ajax({
                        method:"POST",
                        url:$(_formEl).prop('action'),
                        data:formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            console.log(data);
                            Swal.fire({
                                text: "Customer Updated Successfully!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-primary",
                                }
                            });
                        },
                        error:function(erroe){
                            alert("Something is wrong");
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been submitted!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('kt_wizard1');
            _formEl = KTUtil.getById('kt_form1');

            _initValidation();
            _initWizard();
        }
    };
}();

jQuery(document).ready(function () {
    KTWizard11.init();
});

$('body').on('click','a.btn-hover-light-primary',function(e){
    e.preventDefault();
$("#exampleModal .modal-body").load($(this).attr('href'));
$('#exampleModal').modal('show');
});
$('body').submit('#model',async function(e){
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
            $.ajax({
                method:"GET",
                url:"{{route('admin-refresh',$data->id)}}",
                success:function(data){ 
                    $("#AddTemplate").html(data);
                }
            });
            $.notify(data.msg,"success");
            }
        },
        error:function(erroe){
            console.log(erroe);
            window.scrollTo({top:0,behavior:'smooth'});
            alert("Something is wrong");
        }
    });
// $("#AddTemplate").load("{{route('admin-refresh',$data->id)}}");
});
    // $('body').on('change','select[name=country]',function(){
    //     var data = $(this).val();
    //     var addid = $('#address_id').val();
    //     $.get('{{route('admin-getstate-user')}}',{id:data,addid:addid},function(data, status){
    //         $('#stattetemplate').html(data);
    //     })
    // });
// $(document).ready(function(){

//   $('.select2').select2({
//     placeholder:'Select Country',
//     theme:'bootstrap4',
//     tags:true,
//   }).on('select2:close', function(){
//     var element = $(this);
//     var new_category = $.trim(element.val());

//     if(new_category != '')
//     {
//       $.ajax({
//         url:"add.php",
//         method:"POST",
//         data:{category_name:new_category},
//         success:function(data)
//         {
//           if(data == 'yes')
//           {
//             element.append('<option value="'+new_category+'">'+new_category+'</option>').val(new_category);
//           }
//         }
//       })
//     }

//   });

// });

</script>
 @endpush