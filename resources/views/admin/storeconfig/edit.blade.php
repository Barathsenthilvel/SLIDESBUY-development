@extends('layout.admin')

@section('content')
@php
    // Helper function to safely display email field values
    function getEmailFieldValue($data, $fieldName) {
        if (isset($data->$fieldName)) {
            $value = $data->$fieldName;
            if (is_string($value)) {
                return $value;
            } elseif (is_array($value)) {
                return implode(',', $value);
            }
        }
        return '';
    }
@endphp
<style>
    .alert {
        margin-bottom: 20px;
    }
    .alert ul {
        margin-bottom: 0;
    }
    .alert .close {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        opacity: .5;
        background: none;
        border: 0;
        padding: 0;
        margin-left: auto;
    }
    .alert .close:hover {
        opacity: .75;
    }
    .file-preview {
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .file-preview:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    input[type="file"] {
        margin-top: 10px;
    }

    /* Prevent dropzone conflicts */
    .dz-default.dz-message {
        display: none !important;
    }

    /* Ensure form elements are properly styled */
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* File upload guidelines styling */
    .file-guidelines {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
    }

    .file-guidelines h6 {
        color: #495057;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .file-guidelines .col-md-4 {
        padding: 10px;
    }

    .file-guidelines strong {
        color: #007bff;
    }

    /* Input group styling for file uploads */
    .input-group .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }

    .input-group .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    /* Field validation styling */
    .field-error-message {
        font-size: 0.875rem;
        padding: 0.5rem;
        border-radius: 0.25rem;
        margin-top: 0.5rem;
    }

    .field-success-message {
        font-size: 0.875rem;
        padding: 0.5rem;
        border-radius: 0.25rem;
        margin-top: 0.5rem;
    }

    .is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
    }

    .is-valid {
        border-color: #28a745 !important;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
    }

    /* File input validation styling */
    .custom-file.is-invalid .custom-file-label {
        border-color: #dc3545;
    }

    .custom-file.is-valid .custom-file-label {
        border-color: #28a745;
    }

    /* Floating AJAX message styling */
    #ajax-success-message,
    #ajax-error-message {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border: none;
        border-radius: 8px;
        animation: slideInRight 0.5s ease-out;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    #ajax-success-message {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    #ajax-error-message {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
        color: white;
    }

    #ajax-success-message .close,
    #ajax-error-message .close {
        color: white;
        opacity: 0.8;
    }

    #ajax-success-message .close:hover,
    #ajax-error-message .close:hover {
        opacity: 1;
    }

    /* Toaster notification styling */
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
</style>

<!-- Prevent dropzone and other conflicting scripts from running -->
<script>
    // Completely disable dropzone
    if (typeof Dropzone !== 'undefined') {
        Dropzone.autoDiscover = false;
        // Override Dropzone constructor to prevent errors
        window.Dropzone = function() {
            console.warn('Dropzone is disabled on this page');
            return {
                on: function() {},
                off: function() {},
                destroy: function() {}
            };
        };
    }

    // Prevent form validation conflicts
    window.formValidationDisabled = true;

    // Disable any existing dropzone instances
    if (typeof window.dropzoneInstances !== 'undefined') {
        window.dropzoneInstances.forEach(function(instance) {
            try {
                if (instance && typeof instance.destroy === 'function') {
                    instance.destroy();
                }
            } catch (e) {
                console.warn('Error destroying dropzone instance:', e);
            }
        });
    }
</script>
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">store</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin-store') }}" class="text-muted">List of store</a>
                        </li>
                    </ul>
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
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Store Configuration</h3>
                        </div>
                        <!--begin::Form-->
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
                                        @if(strpos(session('error'), 'filename') !== false)
                                            <br><small class="text-muted">💡 Tip: Try uploading files with shorter names</small>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- Debug: Show session data -->
                        @if(config('app.debug'))
                            <div class="alert alert-info" style="display: none;">
                                <strong>Debug Info:</strong><br>
                                Success: {{ session('success') ? 'Yes' : 'No' }}<br>
                                Error: {{ session('error') ? 'Yes' : 'No' }}<br>
                                Has Errors: {{ $errors->any() ? 'Yes' : 'No' }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        <strong>Please fix the following errors:</strong>
                                    </div>
                                    <ul class="mb-0 mt-2">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    @if($errors->has('logo') || $errors->has('invert_logo') || $errors->has('fav_icon'))
                                        <div class="mt-2 p-2 bg-light border-left border-danger">
                                            <small class="text-danger">
                                                <strong>💡 File Upload Tips:</strong><br>
                                                • Use shorter filenames<br>
                                                • Ensure file format is correct<br>
                                                • Check file size limits
                                            </small>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin-store-update',$data->id)}}" id="formEdit" enctype="multipart/form-data" onsubmit="return validateForm() && updateCKEditors();">
                            <input type="hidden" id="id" value="{{ $data->id }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->store_name }}" id="store_name" name="store_name" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Default Currency
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <select class="form-control" id="default_currency" name="default_currency">
                                            <option>Select Currency</option>
                                            @foreach ($currency as $cur )
                                            <option value="{{ $cur->id }}" {{($cur->id == $data->default_currency)?'selected':''}}>{{ $cur->currency_symbol }} ({{ $cur->currency_title }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Ownership Type
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <select class="form-control" id="ownershiptype" name="ownershiptype">
                                            <option>Select type</option>
                                            <option value="Partnership" {{($data->ownershiptype == "Partnership")?'selected':''}}>Partnership</option>
                                            <option value="Public Sector" {{($data->ownershiptype == "Public Sector")?'selected':''}}>Public Sector</option>
                                            <option value="Private Sector" {{($data->ownershiptype == "Private Sector")?'selected':''}}>Private Sector</option>
                                            <option value="Single Ownership" {{($data->ownershiptype == "Single Ownership")?'selected':''}}>Single Ownership</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Pricing Type
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <select class="form-control" id="pricingtype" name="pricing_type">
                                            <option>Select type</option>
                                            <option value="subscription" {{($data->pricing_type == "subscription") ? 'selected':''}}>Subscription</option>
                                            <option value="product" {{($data->pricing_type == "product") ? 'selected' : ''}}>Product</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Tax Type
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="include_tax"  value='Inclusive' {{ ($data->include_tax === 'Inclusive')? 'checked':'' }}/>
                                                <span></span>
                                                Inclusive
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="include_tax"  value='Exclusive' {{ ($data->include_tax === 'Exclusive')? 'checked':'' }} />
                                                <span></span>
                                                Exclusive
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Date Formate
                                        <span class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <select class="form-control" id="default_date_formate" name="default_date_formate" required>
                                                <option>Select Date Formate</option>
                                                <option value="MM/DD/YY" {{($data->default_date_formate === 'MM/DD/YY' )?'selected':''}}>MM/DD/YY</option>
                                                <option value="MM-DD-YY" {{($data->default_date_formate === 'MM-DD-YY' )?'selected':''}}>MM-DD-YY</option>
                                                <option value="DD/MM/YY" {{($data->default_date_formate === 'DD/MM/YY' )?'selected':''}}>DD/MM/YY</option>
                                                <option value="DD-MM-YY" {{($data->default_date_formate === 'DD-MM-YY' )?'selected':''}}>DD-MM-YY</option>
                                            </select>
                                        </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Order ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->OrderIDPrefix }}" id="OrderIDPrefix" name="OrderIDPrefix" required maxlength="5" title="Length Must be max 4" />
                                    </div>
                                </div> --}}


                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Customer ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->CustomerIDPrefix }}" id="CustomerIDPrefix" name="CustomerIDPrefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Vendor ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->VendorIDPrefix }}" id="VendorIDPrefix" name="VendorIDPrefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Product ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->productIdprefix }}" id="productIdprefix" name="productIdprefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div>

                                <!-- File Upload Guidelines -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="file-guidelines">
                                            <h6><i class="fas fa-info-circle"></i> File Upload Guidelines</h6>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Logo & Invert Logo:</strong><br>
                                                    • Formats: JPEG, JPG, PNG, GIF, WebP<br>
                                                    • Max Size: 2MB<br>
                                                    • Dimensions: 128×80 pixels
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Favicon:</strong><br>
                                                    • Formats: ICO, PNG, JPG, JPEG, GIF, SVG<br>
                                                    • Max Size: 512KB<br>
                                                    • Dimensions: 43×38 pixels
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Tips:</strong><br>
                                                    • Use PNG for transparency<br>
                                                    • ICO format is best for favicons<br>
                                                    • Keep file sizes small for faster loading
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Billing Address
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="billing_address"
                                            id="ktckeditor6">{{ $data->billing_address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Location Address
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="location_address"
                                            id="ktckeditor5">{{ $data->location_address}}</textarea>
                                    </div>
                                </div> --}}
{{--
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Display Out of Stock
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <div class="radio-inline">
                                            <label class="radio radio-success">
                                                <input type="radio" name="out_of_stock"  value='1' {{ ($data->out_of_stock === '1')? 'checked':'' }}/>
                                                <span></span>
                                                Yes
                                            </label>
                                            <label class="radio radio-success">
                                                <input type="radio" name="out_of_stock"  value='0' {{ ($data->out_of_stock === '0')? 'checked':'' }} />
                                                <span></span>
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">logo
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <img class="file-preview" style="width:128px;height:80px;border:2px dashed #222;object-fit:cover;" id="logo_preview"
                                             src="{{ $data->logo && file_exists(public_path('assets/media/banner/'.$data->logo)) ? URL::asset('assets/media/banner/'.$data->logo) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMTI4IDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjY0IiB5PSI0MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+TG9nbzwvdGV4dD4KPC9zdmc+Cg==' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="logo_old" value="{{ $data->logo }}">
                                                                                <div class="input-group">
                                            <input type="file" name="logo" id="logo" accept=".jpeg,.jpg,.png,.gif,.webp" onchange="previewImage(this, 'logo_preview')" class="form-control">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info btn-sm" onclick="showFileRequirements('logo')" title="Show file requirements">
                                                    <i class="fas fa-question-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Image width and height:128*80</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> JPEG, JPG, PNG, GIF, WebP |
                                            <strong>Max size:</strong> 2MB
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Invert Logo
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <img class="file-preview" style="width:128px;height:80px;border:2px dashed #222;object-fit:cover;" id="invert_logo_preview"
                                             src="{{ $data->invert_logo && file_exists(public_path('assets/media/banner/'.$data->invert_logo)) ? URL::asset('assets/media/banner/'.$data->invert_logo) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMTI4IDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjY0IiB5PSI0MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+SW52ZXJ0PC90ZXh0Pgo8L3N2Zz4K' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="invert_logo_old" value="{{ $data->invert_logo }}">
                                                                                <div class="input-group">
                                            <input type="file" name="invert_logo" id="invert_logo" accept=".jpeg,.jpg,.png,.gif,.webp" onchange="previewImage(this, 'invert_logo_preview')" class="form-control">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info btn-sm" onclick="showFileRequirements('invert_logo')" title="Show file requirements">
                                                    <i class="fas fa-question-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-muted">Image width and height:128*80</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> JPEG, JPG, PNG, GIF, WebP |
                                            <strong>Max size:</strong> 2MB
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">FavIcon
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <img class="file-preview" id="fav_icon_preview" style="width:43px;height:38px;border:2px dashed #222;object-fit:cover;"
                                             src="{{ $data->fav_icon && file_exists(public_path('assets/media/banner/'.$data->fav_icon)) ? URL::asset('assets/media/banner/'.$data->fav_icon) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDMiIGhlaWdodD0iMzgiIHZpZXdCb3g9IjAgMCA0MyAzOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQzIiBoZWlnaHQ9IjM4IiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjIxLjUiIHk9IjE5IiBmb250LWZhbWlseT0iQXJpYWwsIHNhbnMtc2VyaWYiIGZvbnQtc2l6ZT0iMTAiIGZpbGw9IiM2Yzc1N2QiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5GYXZpY29uPC90ZXh0Pgo8L3N2Zz4K' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="fav_icon_old" value="{{ $data->fav_icon }}">
                                                                                <div class="input-group">
                                            <input type="file" name="fav_icon" id="fav_icon" accept=".ico,.png,.jpg,.jpeg,.gif,.svg" onchange="previewImage(this, 'fav_icon_preview')" class="form-control">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info btn-sm" onclick="showFileRequirements('fav_icon')" title="Show file requirements">
                                                    <i class="fas fa-question-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-muted">Image width and height:43*38</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> ICO, PNG, JPG, JPEG, GIF, SVG |
                                            <strong>Max size:</strong> 512KB
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Title
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{ $data->Store_Meta_Title }}"
                                            id="Store_Meta_Title" name="Store_Meta_Title" />
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="Store_Meta_Description"
                                            id="ktckeditor1">{{ $data->Store_Meta_Description}}</textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Keywords
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="Store_Meta_Keywords"
                                            id="ktckeditor2">{{ $data->Store_Meta_Keywords}}</textarea>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Address
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="store_address"
                                            id="ktckeditor3" required>{{ $data->store_address}}</textarea>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">GSTIN
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{ $data->GSTIN}}" id="GSTIN"
                                            name="GSTIN" required/>
                                    </div>
                                </div> --}}

                                <div class="form-group row d-none">
                                    <label class="col-2 col-form-label">Order Emails From
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_From" class="form-control" name='Order_Emails_From' placeholder='Write some tags' value='{{ getEmailFieldValue($data, "Order_Emails_From") }}'/>
                                        {{-- <textarea class="form-control"
                                            id="Order_Emails_To" name="Order_Emails_From" >{{ $data->Order_Emails_From}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order Emails To
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_To" class="form-control" name='Order_Emails_To' placeholder='Write some tags' value='{{ getEmailFieldValue($data, "Order_Emails_To") }}'/>
                                        {{-- <textarea class="form-control"
                                            id="Order_Emails_To" name="Order_Emails_To" required>{{ $data->Order_Emails_To}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row d-none">
                                    <label class="col-2 col-form-label">Order Emails BCC
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_BCC" class="form-control" name='Order_Emails_BCC' placeholder='Write some tags' value='{{ getEmailFieldValue($data, "Order_Emails_BCC") }}'/>
                                        {{-- <textarea class="form-control"
                                            id="Order_Emails_BCC" name="Order_Emails_BCC" required>{{ $data->Order_Emails_BCC}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Contact Us Emails To
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Contact_Us_Emails_To" class="form-control" name='Contact_Us_Emails_To' placeholder='Write some tags' value='{{ getEmailFieldValue($data, "Contact_Us_Emails_To") }}'/>
                                        {{-- <textarea class="form-control"
                                            id="Contact_Us_Emails_To" name="Contact_Us_Emails_To" required>{{ $data->Contact_Us_Emails_To}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Contact Us Emails BCC
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Contact_Us_Emails_BCC" class="form-control" name='Contact_Us_Emails_BCC' placeholder='Write some tags' value='{{ getEmailFieldValue($data, "Contact_Us_Emails_BCC") }}'/>
                                        {{-- <textarea class="form-control"
                                             id="Contact_Us_Emails_BCC"
                                            name="Contact_Us_Emails_BCC" required>{{ $data->Contact_Us_Emails_BCC}}</textarea> --}}
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-2 col-form-label">Date / Time Zone
                                        <span class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <select class="form-control" id="time_zone" name="time_zone" required>
                                                <option>Select Time Zone</option>
                                                <option value="">Select Time Zone </option>
                                                <option value="Africa/Abidjan" {{($data->time_zone === 'Africa/Abidjan' )?'selected':''}}>Africa/Abidjan</option>
                                                <option value="Africa/Accra" {{($data->time_zone === 'Africa/Accra' )?'selected':''}}>Africa/Accra</option>
                                                <option value="Africa/Addis_Ababa" {{($data->time_zone === 'Africa/Addis_Ababa' )?'selected':''}}>Africa/Addis_Ababa</option>
                                                <option value="Africa/Algiers" {{($data->time_zone === 'Africa/Algiers' )?'selected':''}}>Africa/Algiers</option>
                                                <option value="Asia/Kolkata" {{($data->time_zone === 'Asia/Kolkata' )?'selected':''}}>Asia/Kolkata</option>
                                            </select>
                                        </div>
                                </div> --}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->

                </div>

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
    // ========================================
    // GLOBAL CONFLICT PREVENTION
    // ========================================

    // Completely disable Dropzone globally
    if (typeof Dropzone !== 'undefined') {
        Dropzone.autoDiscover = false;
        window.Dropzone = function() {
            console.warn('Dropzone is disabled on this page');
            return {
                on: function() {},
                off: function() {},
                destroy: function() {}
            };
        };
    }

    // Disable Metronic FormValidation
    window.formValidationDisabled = true;
    if (typeof window.formValidation !== 'undefined') {
        try {
            window.formValidation.destroy();
        } catch (e) {
            console.warn('FormValidation destroy failed:', e);
        }
    }

    // Disable any existing dropzone instances
    if (typeof window.dropzoneInstances !== 'undefined') {
        window.dropzoneInstances.forEach(function(instance) {
            try {
                if (instance && typeof instance.destroy === 'function') {
                    instance.destroy();
                }
            } catch (e) {
                console.warn('Error destroying dropzone instance:', e);
            }
        });
    }

    // ========================================
    // UTILITY FUNCTIONS
    // ========================================

    // Show field-specific error message
    function showFieldError(input, message) {
        removeFieldError(input);
        var errorDiv = document.createElement('div');
        errorDiv.className = 'field-error-message alert alert-danger mt-2';
        errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + message;
        input.parentNode.appendChild(errorDiv);
        input.classList.add('is-invalid');
        console.error('Validation Error:', message);
    }

    // Show field-specific success message
    function showFieldSuccess(input, message) {
        removeFieldSuccess(input);
        var successDiv = document.createElement('div');
        successDiv.className = 'field-success-message alert alert-success mt-2';
        successDiv.innerHTML = '<i class="fas fa-check-circle"></i> ' + message;
        input.parentNode.appendChild(successDiv);
        input.classList.add('is-valid');
        console.log('Validation Success:', message);
    }

    // Remove field error message
    function removeFieldError(input) {
        var existingError = input.parentNode.querySelector('.field-error-message');
        if (existingError) {
            existingError.remove();
        }
        input.classList.remove('is-invalid');
    }

    // Remove field success message
    function removeFieldSuccess(input) {
        var existingSuccess = input.parentNode.querySelector('.field-success-message');
        if (existingSuccess) {
            existingSuccess.remove();
        }
        input.classList.remove('is-valid');
    }

    // Show floating success message
    function showSuccessMessage(message) {
        hideSuccessMessage();
        var successDiv = document.createElement('div');
        successDiv.id = 'ajax-success-message';
        successDiv.className = 'alert alert-success position-fixed';
        successDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);';
        successDiv.innerHTML = '<i class="fas fa-check-circle mr-2"></i>' + message + '<button type="button" class="close ml-2" onclick="hideSuccessMessage()"><span>&times;</span></button>';
        document.body.appendChild(successDiv);
    }

    // Hide floating success message
    function hideSuccessMessage() {
        var existingMsg = document.getElementById('ajax-success-message');
        if (existingMsg) {
            existingMsg.remove();
        }
    }

    // Show floating error message
    function showErrorMessage(message) {
        hideErrorMessage();
        var errorDiv = document.createElement('div');
        errorDiv.id = 'ajax-error-message';
        errorDiv.className = 'alert alert-danger position-fixed';
        errorDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);';
        errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>' + message + '<button type="button" class="close ml-2" onclick="hideErrorMessage()"><span>&times;</span></button>';
        document.body.appendChild(errorDiv);
    }

    // Hide floating error message
    function hideErrorMessage() {
        var existingMsg = document.getElementById('ajax-error-message');
        if (existingMsg) {
            existingMsg.remove();
        }
    }

    // Show file requirements popup
    function showFileRequirements(fieldType) {
        var requirements = '';
        switch(fieldType) {
            case 'logo':
            case 'invert_logo':
                requirements = 'Logo Requirements:\n• Formats: JPEG, JPG, PNG, GIF, WEBP\n• Max Size: 2MB\n• Dimensions: 128×80 pixels (exact)';
                break;
            case 'fav_icon':
                requirements = 'Favicon Requirements:\n• Formats: ICO, PNG, JPG, JPEG, GIF, SVG\n• Max Size: 512KB\n• Dimensions: 43×38 pixels (exact)';
                break;
            default:
                requirements = 'Please check the file requirements below the input field.';
        }
        alert(requirements);
    }

    // ========================================
    // IMAGE PREVIEW AND VALIDATION
    // ========================================

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileSize = file.size;
            var fileType = file.type;
            var fieldName = input.name.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());

            // Determine required dimensions based on field name
            var requiredWidth, requiredHeight;
            if (input.name === 'fav_icon') {
                requiredWidth = 43;
                requiredHeight = 38;
            } else {
                requiredWidth = 128;
                requiredHeight = 80;
            }

            // Validate file size
            var maxSize = (input.name === 'fav_icon') ? 512 * 1024 : 2 * 1024 * 1024; // 512KB for favicon, 2MB for logos
            if (fileSize > maxSize) {
                showFieldError(input, fieldName + ' file size must be under ' + (maxSize / 1024).toFixed(0) + 'KB. Current size: ' + (fileSize / 1024).toFixed(1) + 'KB');
                input.value = '';
                return;
            }

            // Validate file type
            var allowedTypes = (input.name === 'fav_icon')
                ? ['image/ico', 'image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/svg+xml']
                : ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

            if (!allowedTypes.includes(fileType)) {
                showFieldError(input, fieldName + ' must be a valid image file. Allowed: ' + allowedTypes.map(t => t.split('/')[1].toUpperCase()).join(', '));
                input.value = '';
                return;
            }

            var reader = new FileReader();
            reader.onload = function(e) {
                var img = new Image();
                img.onload = function() {
                    var previewElement = document.getElementById(previewId);
                    if (previewElement) {
                        // Validate dimensions
                        if (img.width !== requiredWidth || img.height !== requiredHeight) {
                            showFieldError(input, fieldName + ' dimensions must be exactly ' + requiredWidth + '×' + requiredHeight + ' pixels.\n\nCurrent dimensions: ' + img.width + '×' + img.height + ' pixels');
                            input.value = '';
                            return;
                        }

                        // All validations passed - show preview
                        previewElement.src = e.target.result;
                        previewElement.style.border = '2px solid #28a745'; // Green border for success
                        removeFieldError(input);
                        var successMsg = fieldName + ' uploaded successfully!\nFormat: ' + file.name.split('.').pop().toUpperCase() + '\nSize: ' + (fileSize / 1024).toFixed(1) + 'KB\nDimensions: ' + img.width + '×' + img.height + ' pixels';
                        console.log(successMsg);
                        showFieldSuccess(input, fieldName + ' validation passed! ✓');
                    }
                };
                img.onerror = function() {
                    showFieldError(input, 'Error loading image. Please try again.');
                    input.value = '';
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Function to handle image load errors
    function handleImageError(img) {
        // Set a default placeholder image
        img.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMTI4IDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjY0IiB5PSI0MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+SW1hZ2U8L3RleHQ+Cjx0ZXh0IHg9IjY0IiB5PSI1NSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEwIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+Tm90IEZvdW5kPC90ZXh0Pgo8L3N2Zz4K';
        img.style.border = '2px dashed #dc3545'; // Red border for error
        img.alt = 'Image not found';
    }

    // ========================================
    // FIELD VALIDATION
    // ========================================

    function validateField(input) {
        var value = input.value.trim();
        var isRequired = input.hasAttribute('required');

        if (isRequired && !value) {
            showFieldError(input, 'This field is required');
            return false;
        }

        removeFieldError(input);
        return true;
    }

    function validateForm() {
        var isValid = true;
        var requiredFields = document.querySelectorAll('#formEdit [required]');

        requiredFields.forEach(function(field) {
            if (!validateField(field)) {
                isValid = false;
            }
        });

        // Check for file validation errors
        var fileErrors = document.querySelectorAll('.field-error-message');
        if (fileErrors.length > 0) {
            isValid = false;
        }

        return isValid;
    }

    // ========================================
    // SAFE INITIALIZATION FUNCTIONS
    // ========================================

    // Initialize CKEditor instances safely
    function initializeCKEditor(selector, editorName) {
        try {
            var element = document.querySelector(selector);
            if (element && typeof ClassicEditor !== 'undefined') {
                console.log('Initializing CKEditor for:', editorName);
                ClassicEditor
                    .create(element, {
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent'],
                        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload'],
                    })
                    .then(function(editor) {
                        console.log('CKEditor initialized successfully for:', editorName);
                        window[editorName] = editor;
                    })
                    .catch(function(error) {
                        console.warn('CKEditor initialization failed for', editorName + ':', error);
                    });
            } else {
                console.log('CKEditor element not found or ClassicEditor not available for:', editorName);
            }
        } catch (error) {
            console.warn('CKEditor initialization error for', editorName + ':', error);
        }
    }

    // Initialize Tagify for email fields
    function initializeTagify(selector, fieldName) {
        try {
            var element = document.querySelector(selector);
            if (element && typeof Tagify !== 'undefined') {
                console.log('Initializing Tagify for:', fieldName);
                var tagify = new Tagify(element, {
                    whitelist: [],
                    maxTags: 10,
                    dropdown: {
                        maxItems: 20,
                        classname: "tags-look",
                        enabled: 0,
                        closeOnSelect: false
                    }
                });
                console.log('Tagify initialized successfully for:', fieldName);
            } else {
                console.log('Tagify element not found or Tagify not available for:', fieldName);
            }
        } catch (error) {
            console.warn('Tagify initialization failed for', fieldName + ':', error);
        }
    }

    // ========================================
    // MAIN DOCUMENT READY FUNCTION
    // ========================================

    $(document).ready(function() {
        console.log('Document ready - initializing store config edit page');

        // ========================================
        // INITIALIZE COMPONENTS
        // ========================================

        // Initialize CKEditor for Store Meta Title
        initializeCKEditor('#Store_Meta_Title', 'storeMetaTitleEditor');

        // Initialize Tagify for email fields
        initializeTagify('#Order_Emails_To', 'orderEmailsTo');
        initializeTagify('#Order_Emails_BCC', 'orderEmailsBCC');
        initializeTagify('#Contact_Us_Emails_To', 'contactUsEmailsTo');
        initializeTagify('#Contact_Us_Emails_BCC', 'contactUsEmailsBCC');

        // ========================================
        // FORM SUBMISSION HANDLING
        // ========================================

        $('#formEdit').on('submit', function(e) {
            console.log('Form submitted');

            // Validate form before submission
            if (!validateForm()) {
                e.preventDefault();
                showErrorMessage('Please fix the validation errors before submitting.');
                return false;
            }

            // Show loading state
            var submitBtn = $(this).find('button[type="submit"]');
            var originalText = submitBtn.text();
            submitBtn.text('Updating...').prop('disabled', true);

            // Re-enable button after 10 seconds as fallback
            setTimeout(function() {
                submitBtn.text(originalText).prop('disabled', false);
            }, 10000);

            // Add AJAX submission for better debugging
            e.preventDefault();

            // Try AJAX first, fallback to normal submission if it fails
            try {
                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    timeout: 15000, // 15 second timeout
                    success: function(response) {
                        console.log('Success response received');

                        // Show success message immediately
                        showSuccessMessage('✅ Store Configuration Updated Successfully! All fields have been saved.');

                        // Reset form and enable button
                        submitBtn.text(originalText).prop('disabled', false);

                        // Clear any previous error messages
                        $('.field-error-message').remove();
                        $('.is-invalid').removeClass('is-invalid');

                        // Show success notification for 5 seconds, then hide
                        setTimeout(function() {
                            hideSuccessMessage();
                        }, 5000);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX failed, falling back to normal submission');

                        // Fallback to normal form submission
                        var form = document.getElementById('formEdit');
                        form.removeEventListener('submit', arguments.callee);
                        form.submit();
                    }
                });
            } catch (e) {
                console.error('AJAX error, falling back to normal submission:', e);

                // Fallback to normal form submission
                var form = document.getElementById('formEdit');
                form.removeEventListener('submit', arguments.callee);
                form.submit();
            }
        });

        // ========================================
        // REAL-TIME VALIDATION
        // ========================================

        // Add real-time validation for required fields
        $('#formEdit [required]').on('blur change', function() {
            validateField(this);
        });

        // ========================================
        // ALERT HANDLING
        // ========================================

        // Handle alert dismissal
        $('.alert .close').on('click', function() {
            $(this).closest('.alert').fadeOut();
        });

        // Auto-hide success alerts after 5 seconds
        $('.alert-success').delay(5000).fadeOut();

        // Auto-hide error alerts after 10 seconds
        $('.alert-danger').delay(10000).fadeOut();

        // ========================================
        // SESSION MESSAGE HANDLING
        // ========================================

        // Show success message more prominently if it exists
        if ($('.alert-success').length > 0) {
            $('.alert-success').addClass('show');
            // Scroll to top to show the success message
            $('html, body').animate({
                scrollTop: $('.alert-success').offset().top - 100
            }, 500);

            // Show toaster notification for success
            if (typeof $.notify !== 'undefined') {
                $.notify("{{ session('success') }}", "success");
            }
        }

        // Show toaster notification for error if exists
        if ($('.alert-danger').length > 0) {
            if (typeof $.notify !== 'undefined') {
                $.notify("{{ session('error') }}", "error");
            }
        }

        // ========================================
        // GLOBAL ERROR HANDLING
        // ========================================

        // Global error handler for uncaught errors
        window.addEventListener('error', function(e) {
            console.error('Global error caught:', e.error);
        });

        // Handle promise rejections
        window.addEventListener('unhandledrejection', function(e) {
            console.error('Unhandled promise rejection:', e.reason);
        });

        console.log('Store config edit page initialization completed');
    });
</script>
@endpush
