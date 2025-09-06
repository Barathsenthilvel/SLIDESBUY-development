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

    /* Custom toaster animations */
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

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    /* Custom toaster styling */
    .custom-toast {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 14px;
        line-height: 1.4;
    }

    .custom-toast button:hover {
        opacity: 1 !important;
    }

    /* Loading spinner styles */
    .form-loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 99999;
        display: none;
        justify-content: center;
        align-items: center;
    }

    .form-loading-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        max-width: 300px;
        width: 90%;
    }

    .form-loading-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .form-loading-text {
        color: #333;
        font-size: 16px;
        font-weight: 500;
        margin: 0;
    }

    .form-loading-subtext {
        color: #666;
        font-size: 14px;
        margin: 10px 0 0 0;
    }

    /* Button loading state */
    .btn-loading {
        position: relative;
        pointer-events: none;
    }

    .btn-loading .btn-text {
        opacity: 0.7;
    }

    .btn-loading .btn-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
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

                        <!-- Loading Overlay -->
                        <div id="formLoadingOverlay" class="form-loading-overlay">
                            <div class="form-loading-content">
                                <div class="form-loading-spinner"></div>
                                <p class="form-loading-text">Updating Store Configuration...</p>
                                <p class="form-loading-subtext">Please wait while we save your changes</p>
                            </div>
                        </div>

                        <form method="POST" action="{{route('admin-store-update',$data->id)}}" id="formEdit" enctype="multipart/form-data">
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
                                            <h6><i class="fas fa-info-circle"></i> File Upload Guidelines <span class="text-danger">* Required Fields</span></h6>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Logo & Invert Logo: <span class="text-danger">*</span></strong><br>
                                                    • Formats: JPEG, JPG, PNG, GIF, WebP<br>
                                                    • Max Size: 10MB<br>
                                                    • No dimension restrictions<br>
                                                    • <strong>Required for store branding</strong>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Favicon: <span class="text-danger">*</span></strong><br>
                                                    • Formats: ICO, PNG, JPG, JPEG, GIF, SVG<br>
                                                    • Max Size: 5MB<br>
                                                    • No dimension restrictions<br>
                                                    • <strong>Required for browser tabs</strong>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Tips:</strong><br>
                                                    • Use PNG for transparency<br>
                                                    • ICO format is best for favicons<br>
                                                    • Higher resolution images recommended<br>
                                                    • <strong>All three files are mandatory</strong>
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
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <img class="file-preview" style="width:200px;height:120px;border:2px dashed #222;object-fit:contain;" id="logo_preview"
                                             src="{{ $data->logo && file_exists(public_path('assets/media/banner/'.$data->logo)) ? URL::asset('assets/media/banner/'.$data->logo) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMTI4IDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjY0IiB5PSI0MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+TG9nbzwvdGV4dD4KPC9zdmc+Cg==' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="logo_old" value="{{ $data->logo }}">
                                                                                <input type="file" name="logo" id="logo" accept=".jpeg,.jpg,.png,.gif,.webp" onchange="previewImage(this, 'logo_preview')" class="form-control" required>
                                        <span class="form-text text-muted">No dimension restrictions - upload high resolution images</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> JPEG, JPG, PNG, GIF, WebP |
                                            <strong>Max size:</strong> 10MB
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Invert Logo
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <img class="file-preview" style="width:200px;height:120px;border:2px dashed #222;object-fit:contain;" id="invert_logo_preview"
                                             src="{{ $data->invert_logo && file_exists(public_path('assets/media/banner/'.$data->invert_logo)) ? URL::asset('assets/media/banner/'.$data->invert_logo) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgMTI4IDgwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iMTI4IiBoZWlnaHQ9IjgwIiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjY0IiB5PSI0MCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjNmM3NTdkIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+SW52ZXJ0PC90ZXh0Pgo8L3N2Zz4K' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="invert_logo_old" value="{{ $data->invert_logo }}">
                                                                                <input type="file" name="invert_logo" id="invert_logo" accept=".jpeg,.jpg,.png,.gif,.webp" onchange="previewImage(this, 'invert_logo_preview')" class="form-control" required>
                                        <span class="text-muted">No dimension restrictions - upload high resolution images</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> JPEG, JPG, PNG, GIF, WebP |
                                            <strong>Max size:</strong> 10MB
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">FavIcon
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <img class="file-preview" id="fav_icon_preview" style="width:80px;height:80px;border:2px dashed #222;object-fit:contain;"
                                             src="{{ $data->fav_icon && file_exists(public_path('assets/media/banner/'.$data->fav_icon)) ? URL::asset('assets/media/banner/'.$data->fav_icon) : 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDMiIGhlaWdodD0iMzgiIHZpZXdCb3g9IjAgMCA0MyAzOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQzIiBoZWlnaHQ9IjM4IiBmaWxsPSIjZjhmOWZhIi8+Cjx0ZXh0IHg9IjIxLjUiIHk9IjE5IiBmb250LWZhbWlseT0iQXJpYWwsIHNhbnMtc2VyaWYiIGZvbnQtc2l6ZT0iMTAiIGZpbGw9IiM2Yzc1N2QiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5GYXZpY29uPC90ZXh0Pgo8L3N2Zz4K' }}"
                                             onerror="handleImageError(this)">
                                        <input type="hidden" name="fav_icon_old" value="{{ $data->fav_icon }}">
                                                                                <input type="file" name="fav_icon" id="fav_icon" accept=".ico,.png,.jpg,.jpeg,.gif,.svg" onchange="previewImage(this, 'fav_icon_preview')" class="form-control" required>
                                        <span class="text-muted">No dimension restrictions - upload high resolution images</span>
                                        <br><small class="form-text text-info">
                                            <strong>Allowed formats:</strong> ICO, PNG, JPG, JPEG, GIF, SVG |
                                            <strong>Max size:</strong> 5MB
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Title
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        {{-- @dd( $data->Store_Meta_Title); --}}
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
                                <button type="submit" class="btn btn-primary mr-2" id="submitBtn">
                                    <span class="btn-text">Submit</span>
                                    <div class="btn-spinner" style="display: none;"></div>
                                </button>
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
<script>

$(document).ready(function() {
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
    // LOADING FUNCTIONS
    // ========================================

    // Show loading overlay
    function showLoadingOverlay() {
        console.log('Showing loading overlay');
        $('#formLoadingOverlay').css('display', 'flex');
        $('body').css('overflow', 'hidden'); // Prevent scrolling
    }

    // Hide loading overlay
    function hideLoadingOverlay() {
        console.log('Hiding loading overlay');
        $('#formLoadingOverlay').css('display', 'none');
        $('body').css('overflow', ''); // Restore scrolling
    }

    // Show button loading state
    function showButtonLoading(button) {
        button.addClass('btn-loading').prop('disabled', true);
        button.find('.btn-text').text('Updating...');
        button.find('.btn-spinner').show();
    }

    // Hide button loading state
    function hideButtonLoading(button, originalText) {
        button.removeClass('btn-loading').prop('disabled', false);
        button.find('.btn-text').text(originalText);
        button.find('.btn-spinner').hide();
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

    // Clear field error message (alias for removeFieldError)
    function clearFieldError(input) {
        removeFieldError(input);
    }

    // Clear field success message (alias for removeFieldSuccess)
    function clearFieldSuccess(input) {
        removeFieldSuccess(input);
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

    // Show success toaster notification
    function showSuccessToast(message) {
        console.log('showSuccessToast called with message:', message);
        console.log('toastr available:', typeof toastr !== 'undefined');
        console.log('$.notify available:', typeof $.notify !== 'undefined');

        // Try different toaster libraries
        if (typeof toastr !== 'undefined') {
            console.log('Using toastr for success message');
            toastr.success(message, 'Success!', {
                timeOut: 5000,
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right'
            });
        } else if (typeof $.notify !== 'undefined') {
            console.log('Using $.notify for success message');
            $.notify(message, {
                type: 'success',
                delay: 5000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        } else {
            console.log('Using custom toaster for success message');
            // Fallback to custom toaster
            showCustomToast(message, 'success');
        }

        // Ultimate fallback - if nothing else works, show a simple alert
        setTimeout(function() {
            if (document.querySelector('.custom-toast') === null &&
                document.querySelector('.notifyjs-bootstrap-success') === null &&
                document.querySelector('.toast') === null) {
                console.log('No toaster found, showing fallback alert');
                alert('✅ ' + message);
            }
        }, 2000);
    }

    // Show error toaster notification
    function showErrorToast(message) {
        if (typeof toastr !== 'undefined') {
            toastr.error(message, 'Error!', {
                timeOut: 7000,
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right'
            });
        } else if (typeof $.notify !== 'undefined') {
            $.notify(message, {
                type: 'danger',
                delay: 7000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        } else {
            // Fallback to custom toaster
            showCustomToast(message, 'error');
        }
    }

    // Custom toaster implementation
    function showCustomToast(message, type) {
        console.log('showCustomToast called with:', message, type);
        var toastId = 'toast-' + Date.now();
        var bgColor = type === 'success' ? '#28a745' : '#dc3545';
        var icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';

        var toastHtml = `
            <div id="${toastId}" class="custom-toast" style="
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${bgColor};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 99999;
                min-width: 300px;
                max-width: 400px;
                animation: slideInRight 0.5s ease-out;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            ">
                <div style="display: flex; align-items: center;">
                    <i class="fas ${icon}" style="margin-right: 10px; font-size: 18px;"></i>
                    <div style="flex: 1;">
                        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong><br>
                        ${message}
                    </div>
                    <button onclick="hideCustomToast('${toastId}')" style="
                        background: none;
                        border: none;
                        color: white;
                        font-size: 18px;
                        cursor: pointer;
                        margin-left: 10px;
                        opacity: 0.8;
                        padding: 0;
                        width: 20px;
                        height: 20px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">&times;</button>
                </div>
            </div>
        `;

        try {
            document.body.insertAdjacentHTML('beforeend', toastHtml);
            console.log('Custom toast added to DOM with ID:', toastId);

            // Auto-hide after 5 seconds
            setTimeout(function() {
                hideCustomToast(toastId);
            }, 5000);
        } catch (e) {
            console.error('Error adding custom toast to DOM:', e);
        }
    }

    // Hide custom toaster
    function hideCustomToast(toastId) {
        var toast = document.getElementById(toastId);
        if (toast) {
            toast.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(function() {
                if (toast && toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
    }

    // Test toaster function
    function testToaster() {
        showSuccessToastEnhanced('✅ Store Configuration Updated Successfully! All fields have been saved.', { showOnce: false });
    }

    // Removed showFileRequirements function - no longer needed

    // ========================================
    // IMAGE PREVIEW AND VALIDATION
    // ========================================

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileSize = file.size;
            var fileType = file.type;
            var fieldName = input.name.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());

            // Validate file size (no dimension restrictions)
            var maxSize = (input.name === 'fav_icon') ? 5 * 1024 * 1024 : 10 * 1024 * 1024; // 5MB for favicon, 10MB for logos
            if (fileSize > maxSize) {
                showFieldError(input, fieldName + ' file size must be under ' + (maxSize / (1024 * 1024)).toFixed(0) + 'MB. Current size: ' + (fileSize / (1024 * 1024)).toFixed(1) + 'MB');
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
                        // No dimension validation - accept any size
                        // All validations passed - show preview
                        previewElement.src = e.target.result;
                        previewElement.style.border = '2px solid #28a745'; // Green border for success
                        removeFieldError(input);
                        var successMsg = fieldName + ' uploaded successfully!\nFormat: ' + file.name.split('.').pop().toUpperCase() + '\nSize: ' + (fileSize / (1024 * 1024)).toFixed(1) + 'MB\nDimensions: ' + img.width + '×' + img.height + ' pixels';
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
    // CKEDITOR UPDATE FUNCTION
    // ========================================

    function updateCKEditors() {
        // Update CKEditor content if editors exist
        if (typeof window.storeMetaTitleEditor !== 'undefined') {
            window.storeMetaTitleEditor.updateSourceElement();
        }
        return true;
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
    // UNIFIED FORM VALIDATION & TOASTER SYSTEM
    // ========================================

    // Global toaster state management (show only once)
    window.toasterState = {
        successShown: false,
        errorShown: false,
        lastSuccessMessage: null,
        lastErrorMessage: null
    };

    // Universal field validation rules
    const validationRules = {
        required: {
            validate: (value) => value.trim() !== '',
            message: 'This field is required'
        },
        email: {
            validate: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
            message: 'Please enter a valid email address'
        },
        minLength: (min) => ({
            validate: (value) => value.length >= min,
            message: `Minimum length is ${min} characters`
        }),
        maxLength: (max) => ({
            validate: (value) => value.length <= max,
            message: `Maximum length is ${max} characters`
        }),
        selectRequired: {
            validate: (value) => value !== '' && value !== 'Select Currency' && value !== 'Select type',
            message: 'Please select a valid option'
        },
        fileRequired: {
            validate: (value) => {
                if (typeof value === 'string') {
                    return value.trim() !== '';
                }
                return value && value.files && value.files.length > 0;
            },
            message: 'This file is required'
        }
    };

    // Enhanced field validation function
    function validateFieldEnhanced(field, rules = []) {
        const value = field.value;
        const fieldName = field.name || field.id;

        // Clear previous errors
        clearFieldError(field);

        for (let rule of rules) {
            if (typeof rule === 'string') {
                rule = validationRules[rule];
x            }

            if (rule && !rule.validate(value)) {
                // Customize error message for file fields
                let errorMessage = rule.message;
                if (field.type === 'file') {
                    const fieldLabel = fieldName.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
                    errorMessage = fieldLabel + ' is required.';
                }
                showFieldError(field, errorMessage);
                return false;
            }
        }

        // Show success state for valid fields
        showFieldSuccess(field);
        return true;
    }

    // Enhanced form validation
    function validateFormEnhanced(formId, fieldRules = {}) {
        const form = document.getElementById(formId);
        if (!form) return false;

        let isValid = true;
        const fields = form.querySelectorAll('input, select, textarea');

        fields.forEach(field => {
            const fieldName = field.name || field.id;
            const rules = fieldRules[fieldName] || [];

            // Add required rule if field has required attribute
            if (field.hasAttribute('required') && !rules.includes('required')) {
                if (field.tagName === 'SELECT') {
                    rules.unshift('selectRequired');
                } else {
                    rules.unshift('required');
                }
            }

            if (rules.length > 0 && !validateFieldEnhanced(field, rules)) {
                isValid = false;
            }
        });

        return isValid;
    }

    // Enhanced success toaster (show only once)
    function showSuccessToastEnhanced(message, options = {}) {
        const defaultOptions = {
            duration: 5000,
            position: 'top-right',
            showOnce: true
        };

        const config = { ...defaultOptions, ...options };

        // Check if we should show this message only once
        if (config.showOnce && window.toasterState.successShown &&
            window.toasterState.lastSuccessMessage === message) {
            console.log('Success toaster already shown for this message, skipping...');
            return;
        }

        // Update state
        window.toasterState.successShown = true;
        window.toasterState.lastSuccessMessage = message;

        console.log('Showing success toaster:', message);

        // Try different toaster libraries in order of preference
        if (typeof toastr !== 'undefined') {
            toastr.success(message, 'Success!', {
                timeOut: config.duration,
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-' + config.position
            });
        } else if (typeof $.notify !== 'undefined') {
            $.notify(message, {
                type: 'success',
                delay: config.duration,
                placement: {
                    from: config.position.split('-')[0],
                    align: config.position.split('-')[1]
                }
            });
        } else {
            // Fallback to custom toaster
            showCustomToast(message, 'success', config);
        }
    }

    // Enhanced error toaster (show only once)
    function showErrorToastEnhanced(message, options = {}) {
        const defaultOptions = {
            duration: 7000,
            position: 'top-right',
            showOnce: true
        };

        const config = { ...defaultOptions, ...options };

        // Check if we should show this message only once
        if (config.showOnce && window.toasterState.errorShown &&
            window.toasterState.lastErrorMessage === message) {
            console.log('Error toaster already shown for this message, skipping...');
            return;
        }

        // Update state
        window.toasterState.errorShown = true;
        window.toasterState.lastErrorMessage = message;

        console.log('Showing error toaster:', message);

        // Try different toaster libraries
        if (typeof toastr !== 'undefined') {
            toastr.error(message, 'Error!', {
                timeOut: config.duration,
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-' + config.position
            });
        } else if (typeof $.notify !== 'undefined') {
            $.notify(message, {
                type: 'danger',
                delay: config.duration,
                placement: {
                    from: config.position.split('-')[0],
                    align: config.position.split('-')[1]
                }
            });
        } else {
            // Fallback to custom toaster
            showCustomToast(message, 'error', config);
        }
    }

    // Enhanced custom toaster implementation
    function showCustomToast(message, type, config) {
        const toastId = 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        const bgColor = type === 'success' ? '#28a745' : '#dc3545';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';

        const toastHtml = `
            <div id="${toastId}" class="custom-toast" style="
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${bgColor};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 99999;
                min-width: 300px;
                max-width: 400px;
                animation: slideInRight 0.5s ease-out;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            ">
                <div style="display: flex; align-items: center;">
                    <i class="fas ${icon}" style="margin-right: 10px; font-size: 18px;"></i>
                    <div style="flex: 1;">
                        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong><br>
                        ${message}
                    </div>
                    <button onclick="hideCustomToast('${toastId}')" style="
                        background: none;
                        border: none;
                        color: white;
                        font-size: 18px;
                        cursor: pointer;
                        margin-left: 10px;
                        opacity: 0.8;
                        padding: 0;
                        width: 20px;
                        height: 20px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">&times;</button>
                </div>
            </div>
        `;

        try {
            document.body.insertAdjacentHTML('beforeend', toastHtml);

            // Auto-hide after specified duration
            setTimeout(() => {
                hideCustomToast(toastId);
            }, config.duration);
        } catch (e) {
            console.error('Error adding custom toast to DOM:', e);
        }
    }

    // ========================================
    // MAIN DOCUMENT READY FUNCTION
    // ========================================


        console.log('=== UNIFIED FORM VALIDATION SYSTEM INITIALIZED ===');

        // Wait a bit for all libraries to load
        setTimeout(function() {
            console.log('Checking available toaster libraries...');
            console.log('jQuery available:', typeof $ !== 'undefined');
            console.log('toastr available:', typeof toastr !== 'undefined');
            console.log('$.notify available:', typeof $.notify !== 'undefined');
        }, 500);

        // ========================================
        // STORE CONFIG FORM VALIDATION RULES
        // ========================================

        const storeConfigRules = {
            'store_name': ['required', validationRules.minLength(2)],
            'default_currency': ['selectRequired'],
            'ownershiptype': ['selectRequired'],
            'pricing_type': ['selectRequired'],
            'CustomerIDPrefix': ['required', validationRules.maxLength(5)],
            'productIdprefix': ['required', validationRules.maxLength(5)],
            'Store_Meta_Title': ['required', validationRules.minLength(3)],
            'Order_Emails_To': ['required', 'email'],
            'Contact_Us_Emails_To': ['required', 'email'],
            'Contact_Us_Emails_BCC': ['email'],
            'logo': ['fileRequired'],
            'invert_logo': ['fileRequired'],
            'fav_icon': ['fileRequired']
        };

        // ========================================
        // INITIALIZE COMPONENTS
        // ========================================

        // Initialize Tagify for email fields
        initializeTagify('#Order_Emails_To', 'orderEmailsTo');
        initializeTagify('#Order_Emails_BCC', 'orderEmailsBCC');
        initializeTagify('#Contact_Us_Emails_To', 'contactUsEmailsTo');
        initializeTagify('#Contact_Us_Emails_BCC', 'contactUsEmailsBCC');

        // ========================================
        // ENHANCED FORM SUBMISSION HANDLING
        // ========================================

        $('#formEdit').on('submit', function(e) {
            console.log('Form submitted - starting enhanced validation');
            console.log('Form action:', $(this).attr('action'));
            console.log('Form method:', $(this).attr('method'));

            // Prevent default form submission
            e.preventDefault();

            // Update CKEditor content before validation
            console.log('Updating CKEditor content');
            updateCKEditors();

            // Enhanced form validation
            console.log('Starting enhanced form validation');
            var isValid = validateFormEnhanced('formEdit', storeConfigRules);
            console.log('Enhanced form validation result:', isValid);

            if (!isValid) {
                console.log('Enhanced form validation failed - preventing submission');
                showErrorToastEnhanced('Please fix the validation errors before submitting.');
                return false;
            }

            console.log('Enhanced form validation passed - proceeding with AJAX submission');

            // Get submit button and original text
            var submitBtn = $(this).find('button[type="submit"]');
            var originalText = submitBtn.find('.btn-text').text();
            
            // Show loading states
            showLoadingOverlay();
            showButtonLoading(submitBtn);
            console.log('Loading states activated');

            // Prepare form data
            var formData = new FormData(this);
            
            // Submit via AJAX
            $.ajax({
                method: "POST",
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                timeout: 30000, // 30 second timeout
                success: function(response) {
                    console.log('AJAX Success Response:', response);
                    
                    // Hide loading states
                    hideLoadingOverlay();
                    hideButtonLoading(submitBtn, originalText);
                    
                    if (response.success && response.msg) {
                        // Show success toaster
                        showSuccessToastEnhanced(response.msg, { showOnce: false });
                        
                        // Scroll to top
                        $('html, body').animate({
                            scrollTop: 0
                        }, 500);
                        
                        // Hide any existing error alerts
                        $('.alert-danger').hide();
                        
                        // Show success alert
                        $('.alert-success').html('<div class="d-flex align-items-center"><i class="fas fa-check-circle mr-2"></i><div><strong>Success:</strong> ' + response.msg + '</div></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>').show();
                        
                    } else {
                        showErrorToastEnhanced('Update completed but no success message received.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr, status, error);
                    
                    // Hide loading states
                    hideLoadingOverlay();
                    hideButtonLoading(submitBtn, originalText);
                    
                    var errorMessage = 'Something went wrong. Please try again.';
                    
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors) {
                            var errorList = '';
                            $.each(xhr.responseJSON.errors, function(field, messages) {
                                errorList += '<li>' + messages[0] + '</li>';
                            });
                            errorMessage = '<ul>' + errorList + '</ul>';
                        }
                    }
                    
                    // Handle timeout specifically
                    if (status === 'timeout') {
                        errorMessage = 'Request timed out. Please try again.';
                    }
                    
                    // Show error toaster
                    showErrorToastEnhanced(errorMessage, { showOnce: false });
                    
                    // Scroll to top
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                    
                    // Hide any existing success alerts
                    $('.alert-success').hide();
                    
                    // Show error alert
                    $('.alert-danger').html('<div class="d-flex align-items-center"><i class="fas fa-exclamation-triangle mr-2"></i><div><strong>Error:</strong> ' + errorMessage + '</div></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>').show();
                }
            });
        });

        // ========================================
        // ENHANCED REAL-TIME VALIDATION
        // ========================================

        // Add enhanced real-time validation for all fields
        $('#formEdit input, #formEdit select, #formEdit textarea').on('blur change', function() {
            const fieldName = this.name || this.id;
            const rules = storeConfigRules[fieldName] || [];

            // Add required rule if field has required attribute
            if (this.hasAttribute('required') && !rules.includes('required')) {
                if (this.tagName === 'SELECT') {
                    rules.unshift('selectRequired');
                } else {
                    rules.unshift('required');
                }
            }

            if (rules.length > 0) {
                validateFieldEnhanced(this, rules);
            }
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
        // ENHANCED SESSION MESSAGE HANDLING (SHOW ONLY ONCE)
        // ========================================

        // Show success message more prominently if it exists (only once)
        if ($('.alert-success').length > 0) {
            $('.alert-success').addClass('show');
            // Scroll to top to show the success message
            $('html, body').animate({
                scrollTop: $('.alert-success').offset().top - 100
            }, 500);

            // Show enhanced toaster notification for success (only once)
            setTimeout(function() {
                try {
                    var successMessage = {!! json_encode(session('success')) !!};
                    console.log('Success message from session:', successMessage);
                    if (successMessage) {
                        console.log('Calling enhanced showSuccessToast with message:', successMessage);
                        showSuccessToastEnhanced(successMessage, { showOnce: true });
                    } else {
                        console.log('No success message found in session');
                        // Fallback message
                        showSuccessToastEnhanced('Store Configuration Updated Successfully!', { showOnce: true });
                    }
                } catch (e) {
                    console.warn('Error showing enhanced success toaster:', e);
                    // Fallback to simple notification
                    if (typeof $.notify !== 'undefined') {
                        $.notify('Store Configuration Updated Successfully!', 'success');
                    } else {
                        showSuccessToastEnhanced('Store Configuration Updated Successfully!', { showOnce: true });
                    }
                }
            }, 1000); // 1 second delay to ensure page is fully loaded
        }

        // Show enhanced toaster notification for error if exists (only once)
        if ($('.alert-danger').length > 0) {
            try {
                var errorMessage = {!! json_encode(session('error')) !!};
                if (errorMessage) {
                    showErrorToastEnhanced(errorMessage, { showOnce: true });
                }
            } catch (e) {
                console.warn('Error showing enhanced error toaster:', e);
                // Fallback to simple notification
                if (typeof $.notify !== 'undefined') {
                    $.notify('An error occurred. Please check the form.', 'danger');
                }
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

        console.log('=== ENHANCED STORE CONFIG FORM VALIDATION SYSTEM READY ===');
    });
</script>

