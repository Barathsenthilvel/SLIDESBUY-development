@extends('layout.admin')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Slide</h5>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route($list) }}" class="text-muted">List of Slides</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Slide</h3>
                        </div>

                        <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
                            <div></div>
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
                            <div></div>
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @php
                        if(Auth::user()->is_vendor != null || Auth::user()->is_vendor != ""){
                            $link=route('admin-productv-update',$product->id);
                            $url=route('admin-productv-cropimage');
                        }else{
                            $link=route('admin-product-update',$product->id);
                            $url=route('admin-product-cropimage');
                        }
                        @endphp

                        <form method="POST" action="{{$link}}" enctype="multipart/form-data" id="formEdit" onsubmit="if(typeof CKEditor1 != 'undefined'){ CKEditor1.updateSourceElement(); } CKEditor2.updateSourceElement();">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{$product->id}}">
                            <input type="hidden" name="url" id="url" value="{{$url}}">
                            <input type="hidden" name="attributeTemplate" value="{{$attributeTemplate}}">

                            <div class="card-body">
                                <!-- Vendor Field -->
                                @if(Auth::user()->is_vendor == null || Auth::user()->is_vendor == "")
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Vendor<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <select class="form-control" id="vendor" name="vendor">
                                            <option value="">Admin product</option>
                                            @foreach($vendor as $v)
                                               <option value="{{ $v->id }}" {{ ($v->id == $product->vendor) ? 'selected' : '' }}>{{$v->name.' / '.$StoreConfig->VendorIDPrefix.'-'.sprintf("%'03d", $v->id)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" name="vendor" id="vendor" value="{{Auth::user()->id}}">
                                @endif

                                <!-- Category Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Category<span class="text-danger">*</span></label>
                                    <div class="col-lg-10 col-md-12">
                                        <select class="form-control" id="category" name="category[]" multiple>
                                            <option value="">Select</option>
                                            @foreach($category as $cat)
                                            <option value="{{$cat->id}}" {{ in_array($cat->id,$product->category) ? 'selected' : '' }}>{{$cat->category_name}}</option>
                                                @foreach ($cat->subs()->get() as $sub)
                                                    <option value="{{ $sub->id }}" {{ in_array($sub->id,$product->category) ? 'selected' : '' }}>{{$sub->category_name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Title Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Title<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <input class="form-control" type="text" value="{{$product->product_title}}" id="productTitle" name="productTitle" />
                                    </div>
                                </div>

                                <!-- Code Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Code<span class="text-danger">*</span></label>
                                    <div class="col-md-12 col-lg-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{$StoreConfig->productIdprefix}}</span>
                                            </div>
                                            <input class="form-control" type="text" value="{{$product->product_sku}}" id="skuCode" name="skuCode" />
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Last SKU Code {{$StoreConfig->productIdprefix}}{{isset($Product_last->product_sku)?$Product_last->product_sku:"not found"}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <span>SKU is {{ $StoreConfig->store_name }}, Enter based on last SKU</span>
                                    </div>
                                </div>

                                <!-- Attributes Section -->
                                @if($attributeTemplate > 0 && !empty($processGroup))
                                <h3 class="card-title">Attribute</h3>

                                @foreach($processGroup as $processGroup)
                                @if (!empty($processGroup[0]))
                                @php
                                    // Parse the stored attribute values correctly
                                    $attributeValues = explode('|', $product->attribute_values ?? '');
                                    $attributeValuesArray = [];

                                    foreach($attributeValues as $attr) {
                                        if(!empty($attr)) {
                                            $parts = explode('-', $attr);
                                            if(count($parts) >= 2) {
                                                $attributeValuesArray[$parts[0]] = $parts[1];
                                            }
                                        }
                                    }

                                    // Get current attribute ID and values
                                    $currentAttributeId = $processGroup[0]->id;
                                    $currentAttributeValues = $attributeValuesArray[$currentAttributeId] ?? '';
                                @endphp

                                @switch($processGroup[0]->attribute_type)
                                @case (1)
                                <!-- Text Input -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                    <div class="col-lg-4 col-md-12">
                                        <input class="form-control" type="text" value="{{$currentAttributeValues}}" name="attributes[{{$currentAttributeId}}]" />
                                    </div>
                                </div>
                                @break

                                @case (3)
                                <!-- Single Select -->
                                @php
                                $availableValues = explode(',', $processGroup[0]->attribute_values);
                                @endphp
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                    <div class="col-lg-10 col-md-12">
                                        <select class="form-control multis" name="attributes[{{$currentAttributeId}}]">
                                            <option value="">select {{$processGroup[0]->attribute_name}}</option>
                                            @foreach($availableValues as $value)
                                            <option value="{{$value}}" {{$currentAttributeValues == $value ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @break

                                @case (4)
                                <!-- Multiple Select (like Tags) -->
                                @php
                                $availableValues = explode(',', $processGroup[0]->attribute_values);
                                $selectedValues = explode(',', $currentAttributeValues);
                                @endphp
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                    <div class="col-lg-10 col-md-12">
                                        <select class="form-control multis" name="attributes[{{$currentAttributeId}}][]" multiple>
                                            @foreach($availableValues as $value)
                                            <option value="{{$value}}" {{in_array($value, $selectedValues) ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @break

                                @endswitch
                                @endif
                                @endforeach
                                @endif

                                <!-- Others Section -->
                                <h3 class="card-title">Others</h3>

                                <!-- Description Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Description<span class="text-danger">*</span></label>
                                    <div class="col-lg-10 col-md-12">
                                        <textarea name="productDescription" id="ktckeditor2">{{$product->product_description}}</textarea>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                </div>

                                <!-- Trending Field -->
                                <div class="form-group row">
                                    <label class="col-md-12 col-lg-2 col-form-label">Trending</label>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="trending" name="trending" value="1" {{ ($product->trending == 1 || $product->trending == '1' || $product->trending == 'on' || $product->trending == true) ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="trending">
                                                <span class="text-success font-weight-bold">ON</span> / <span class="text-danger font-weight-bold">OFF</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <small class="text-muted">Current value: {{ $product->trending ?? 'NULL' }} (Type: {{ gettype($product->trending) }})</small>
                                        @if(config('app.debug'))
                                            <br><small class="text-info">Debug: Raw value = "{{ var_export($product->trending, true) }}"</small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Meta Name Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Meta Name</label>
                                    <div class="col-lg-4 col-md-12">
                                        <input class="form-control" type="text" value="{{ $product->metaname}}" id="metaname" name="metaname" />
                                    </div>
                                </div>

                                <!-- Meta Description Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Meta Description</label>
                                    <div class="col-lg-4 col-md-12">
                                        <textarea name="metadescription" id="ktckeditor1">{{ $product->metadescription}}</textarea>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                </div>

                                <!-- Meta Keyword Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Meta Keyword<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <input class="form-control" type="text" value="{{ $product->metakeyword}}" id="metakeyword" name="metakeyword" required/>
                                    </div>
                                </div>

                                <!-- Documents Section -->
                                <h3 class="card-title">Documents</h3>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Document Upload<span class="text-danger">*</span></label>
                                    <div class="col-lg-3 col-md-10">
                                        @if($product->document)
                                            <div class="mb-2">
                                                <strong>Current Document:</strong> {{ basename($product->document) }}
                                            </div>
                                        @endif
                                        <input type="file" id="document" name="document" style="width:250px;padding:20px;border:2px dashed #222;" accept=".pdf,.ppt,.pptx">
                                    </div>
                                </div>

                                <!-- Sell Type Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Sell Type</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select name="sell_type" class="form-control">
                                            <option value="1" {{ ($product->sell_type ?? 1) == 1 ? 'selected' : '' }}>Paid</option>
                                            <option value="0" {{ ($product->sell_type ?? 1) == 0 ? 'selected' : '' }}>Free</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Pictures Section -->
                                <h3 class="card-title">Pictures</h3>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Image 1<span class="text-danger">*</span></label>
                                    <div class="col-lg-3 col-md-12">
                                        <label for="image1"><img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image1) }}"></label>
                                        <input type="hidden" name="image1" value="{{ $product->image1 }}">
                                        <input type="file" class="upload_image" id="image1" style="width:250px;border:2px dashed #222;height: 310px" accept="image/*">
                                        <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Image 2</label>
                                    <div class="col-lg-3 col-md-9">
                                        <label for="image2">
                                            @if($product->image2)
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image2) }}">
                                            <input type="hidden" name="image2" value="{{ $product->image2 }}">
                                            @else
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px">
                                            <input type="hidden" name="image2" value="">
                                            @endif
                                        </label>
                                        <input type="file" id="image2" class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
                                        <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                            <i class="ki ki-bold-close icon-sm"></i> Delete
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Image 3</label>
                                    <div class="col-lg-3 col-md-9">
                                        <label for="image3">
                                            @if($product->image3)
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image3) }}">
                                            <input type="hidden" name="image3" value="{{ $product->image3 }}">
                                            @else
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px">
                                            <input type="hidden" name="image3" value="">
                                            @endif
                                        </label>
                                        <input type="file" id="image3" class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
                                        <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                            <i class="ki ki-bold-close icon-sm"></i> Delete
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Image 4</label>
                                    <div class="col-lg-3 col-md-9">
                                        <label for="image4">
                                            @if($product->image4)
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image4) }}">
                                            <input type="hidden" name="image4" value="{{ $product->image4 }}">
                                            @else
                                            <img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px">
                                            <input type="hidden" name="image4" value="">
                                            @endif
                                        </label>
                                        <input type="file" id="image4" class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
                                        <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                            <i class="ki ki-bold-close icon-sm"></i> Delete
                                        </span>
                                    </div>
                                </div>

                                <!-- Similar Products Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Similar Products</label>
                                    <div class="col-lg-10 col-md-12">
                                        <select class="form-control" id="similar_products" name="similar_products[]" multiple>
                                            <option value="">Select Similar Products</option>
                                            @foreach($similarProduct as $prod)
                                                <option value="{{$prod->id}}" {{ in_array($prod->id, explode(',', $product->similar_products ?? '')) ? 'selected' : '' }}>{{$prod->product_title}}/SKU: {{$prod->product_sku}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Related Products Field -->
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Related Products</label>
                                    <div class="col-lg-10 col-md-12">
                                        <select class="form-control" id="related_products" name="related_products[]" multiple>
                                            <option value="">Select Related Products</option>
                                            @foreach($relatedProduct as $prod)
                                                <option value="{{$prod->id}}" {{ in_array($prod->id, explode(',', $product->related_products ?? '')) ? 'selected' : '' }}>{{$prod->product_title}}/SKU: {{$prod->product_sku}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    var objectB = new Object();
    var objectA = new Object();

    $(document).ready(function () {
        // Select2 initialization
        $('#category').select2({
            allowClear: true,
            dropdownAutoWidth: true,
            width: 'resolve',
        });
        $('.multis').select2({
            allowClear: true,
            dropdownAutoWidth: true,
            width: 'resolve',
        });

        // Image crop functionality
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 128,
                height: 80,
                type: 'square'
            },
            boundary: {
                width: 666,
                height: 242
            }
        });

        $('.upload_image').on('change', function () {
            objectB = this.parentElement;
            objectA = this;
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function (event) {
            var id = $("#id").val();
            var table_colum = objectA.id;
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                $.ajax({
                    url: "{{ route('admin-product-cropimage') }}",
                    type: "POST",
                    data: { id: id, table_colum: table_colum, "image": response, "_token": "{{ csrf_token() }}" },
                    success: function (data) {
                        $('#uploadimageModal').modal('hide');
                        objectB.children[1].value = data.Name;
                    }
                });
                objectB.children[0].children[0].src = response;
                $('#uploadimageModal').modal('hide');
            })
        });

        // Delete image functionality
        $('.deletSpan').on('click', function(){
            this.parentElement.parentElement.children[1].children[0].children[0].src = "";
            this.parentElement.parentElement.children[1].children[0].children[1].value = "";
        });
    });
</script>

<script>
    ClassicEditor.create(document.querySelector('#ktckeditor1'))
        .then(editor => { window.CKEditor1 = editor; })
        .catch(error => { console.error(error); });
    ClassicEditor.create(document.querySelector('#ktckeditor2'))
        .then(editor => { window.CKEditor2 = editor; })
        .catch(error => { console.error(error); });
</script>
@endpush
