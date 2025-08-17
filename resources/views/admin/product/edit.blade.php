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
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route($list) }}" class="text-muted">List of Products</a>
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
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!--begin::Form-->
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
                        <form method="POST" action="{{$link}}" enctype="multipart/form-data" id="formEdit" onsubmit="if(typeof CKEditor1 != 'undefined'){ CKEditor1.updateSourceElement(); } if(typeof CKEditor4 != 'undefined'){ CKEditor4.updateSourceElement(); } CKEditor2.updateSourceElement();CKEditor3.updateSourceElement();">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{$product->id}}">
                            <input type="hidden" name="url" id="url" value="{{$url}}">
                            <div class="card-body">
                                @if(Auth::user()->is_vendor == null || Auth::user()->is_vendor == "")
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Vendor<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <select class="form-control" id="vendor" name="vendor" >
                                            <option value="">Admin product</option>
                                            @foreach($vendor as $v)
                                               <option data-productPrefix="{{$v->manufacturerID}}" data-vendorperscent="{{$v->vendorperscent}}" value="{{ $v->id }}" {{ ($v->id == $product->vendor) ? 'selected' : '' }}>{{$v->name.' / '.$StoreConfig->VendorIDPrefix.'-'.sprintf("%'03d", $v->id)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" name="vendor" id="vendor" value="{{Auth::user()->id}}">
                                @endif
                               <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Category<span class="text-danger">*</span></label>
                                <div class="col-lg-10 col-md-12">
                                    <select class="form-control" id="category" name="category[]" multiple>
                                        <option value="">Select</option>
                                        @foreach($category as $category)
                                        <option class="oprt" value="{{$category->id}}" {{ in_array($category->id,$product->category) ? 'selected' : '' }}>{{$category->category_name}}</option>
                                            @foreach ($category->subs()->get() as $sub)
                                                <option value="{{ $sub->id }}" {{ in_array($sub->id,$product->category) ? 'selected' : '' }}>{{$sub->category_name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Product Title<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->product_title}}" id="productTitle" name="productTitle" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">SKU Code<span class="text-danger">*</span></label>
                                <div class="col-lg-3 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{$StoreConfig->productIdprefix}}</span>
                                        </div>
                                        <input class="form-control" type="text" value="{{$product->product_sku}}" id="skuCode" name="skuCode" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>SKU is {{ $StoreConfig->store_name }}, Enter based on last SKU</span>
                                </div>
                            </div>

                            <!-- Restored: Manufacturer Code -->
                                                <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Code<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->manufacturerCode}}" id="manufacturerCode" name="manufacturerCode" />
                                                    </div>
                                                </div>

                            <!-- Restored: MRP -->
                                                <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">MRP<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->mrp}}" id="mrp" name="mrp" />
                                                    </div>
                                                </div>

                            <!-- Restored: Manufacturer Price -->
                                                <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Price<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->manufacturerPrice}}" id="manufacturerPrice" name="manufacturerPrice" />
                                                  </div>
                                              </div>

                            <!-- Restored: Mark up Type -->
                                                <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Mark up Type</label>
                                <div class="col-lg-4 col-md-12">
                                    <select name="mark_type" class="form-control">
                                        <option value="percentage" {{ $product->mark_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        <option value="fixed" {{ $product->mark_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                                      </select>
                                                  </div>
                                              </div>

                            <!-- Restored: Mark up -->
                                              <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Mark up</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->markup}}" id="markup" name="markup" />
                                                        </div>
                            </div>

                            <!-- Restored: Our Price -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Our Price</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->ourPrice}}" id="ourPrice" name="ourPrice" readonly />
                                                    </div>
                                                </div>

                            <!-- Restored: Shipping Price -->
                                                        <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Shipping Price</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->shipping_price}}" id="shipping_price" name="shipping_price" />
                                                                </div>
                            </div>

                            <!-- Restored: Weight -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Weight</label>
                                <div class="col-lg-3 col-md-12">
                                    <input class="form-control" type="number" step="0.01" value="{{$product->weight}}" id="weight" name="weight" />
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <select name="weightUnit" class="form-control">
                                        <option value="kg" {{ $product->weight_unit == 'kg' ? 'selected' : '' }}>KG</option>
                                        <option value="g" {{ $product->weight_unit == 'g' ? 'selected' : '' }}>Grams</option>
                                        <option value="lb" {{ $product->weight_unit == 'lb' ? 'selected' : '' }}>Pounds</option>
                                        <option value="oz" {{ $product->weight_unit == 'oz' ? 'selected' : '' }}>Ounces</option>
                                    </select>
                                                            </div>
                                                        </div>

                            <!-- Restored: Tax -->
                                <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Tax</label>
                                    <div class="col-lg-4 col-md-12">
                                    <select name="tax" class="form-control">
                                        <option value="">Select Tax</option>
                                        @foreach($tax as $t)
                                            <option value="{{$t->id}}" {{ $product->tax == $t->id ? 'selected' : '' }}>{{$t->tax_name}} ({{$t->tax_rate}}%)</option>
                                            @endforeach
                                            </select>
                                  </div>
                              </div>

                            <!-- Restored: Delivery Date -->
                              <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Delivery Date</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="date" value="{{$product->delivery_date}}" id="deliveryDate" name="deliveryDate" />
                                </div>
                            </div>

                            <!-- Restored: Min Quantity -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Min Quantity<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" value="{{$product->minquantity}}" id="minquantity" name="minquantity" />
                                </div>
                                </div>

                            <!-- Restored: Quantity -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Quantity<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="number" value="{{$product->quantity == 'unlimited' ? '' : $product->quantity}}" id="quantity" name="quantity" />
                                    <span class="form-text text-muted">Leave empty for unlimited</span>
                                </div>
                            </div>

                            <!-- Restored: Product Description -->
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Product Description<span class="text-danger">*</span></label>
                                <div class="col-lg-10 col-md-12">
                                    <textarea name="productDescription" id="ktckeditor1">{{$product->product_description}}</textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Trending</label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input data-switch="true" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" name="trending" {{ ($product->trending == 'on') ? 'checked' : '' }} />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Meta Name</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{ $product->metaname}}" id="metaname" name="metaname" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Meta Description</label>
                                <div class="col-lg-4 col-md-12">
                                    <textarea name="metadescription" id="ktckeditor3">{{ $product->metadescription}}</textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Meta Keyword<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{ $product->metakeyword}}" id="metakeyword" name="metakeyword" required/>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter keyword separated by comma (E.g. Sarees, Pure)</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Sell Type</label>
                                <div class="col-lg-4 col-md-12">
                                    <select name="sell_type" class="form-control">
                                        <option value="1" {{ ($product->sell_type ?? 1) == 1 ? 'selected' : '' }}>Paid</option>
                                        <option value="0" {{ ($product->sell_type ?? 1) == 0 ? 'selected' : '' }}>Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Sold Out</label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input data-switch="true" type="checkbox"  data-on-color="success" data-off-color="danger" name="soldout" value="on" {{ ($product->soldout == 'on') ? 'checked' : '' }} />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Documents</label>
                                <div class="col-lg-4 col-md-12">
                                    <label class="col-form-label">Document Upload<span class="text-danger">*</span></label>
                                    @if($product->document)
                                        <div class="mb-2">
                                            <strong>Current Document:</strong> {{ basename($product->document) }}
                                        </div>
                                    @endif
                                    <input type="file" name="document" class="form-control" accept=".pdf,.doc,.docx,.zip,.rar"/>
                                    <span class="form-text text-muted">Upload product document (PDF, DOC, ZIP, RAR). Leave empty to keep current document.</span>
                                </div>
                            </div>
                            <h3 class="card-title">Pictures</h3>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Image 1<span class="text-danger">*</span></label>
                                <div class="col-lg-3 col-md-12">
                                    <label for="image1"><img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px"  src="{{ URL::asset('assets/media/products/'.$product->image1) }}"></label>
                                    <input type="hidden" name="image1" value="{{ $product->image1 }}">
                                    <input type="file" class="upload_image" id="image1" style="width:250px;border:2px dashed #222;height: 310px"  accept="image/*">
                                    <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Image 2</label>
                                <div class="col-lg-3 col-md-9">
                                    <label for="image2">
                                        @if($product->image2)
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image2) }}">
                                    <input type="hidden" name="image2" value="{{ $product->image2 }}">
                                    @else
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px">
                                    <input type="hidden" name="image2" value="">
                                    @endif
                                    </label>
                                    <input type="file" id="image2"  class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
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
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image3) }}">
                                    <input type="hidden" name="image3" value="{{ $product->image3 }}">
                                    @else
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px">
                                    <input type="hidden" name="image3" value="">
                                    @endif
                                    </label>
                                    <input type="file" id="image3"  class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
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
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px" src="{{ URL::asset('assets/media/products/'.$product->image4) }}">
                                    <input type="hidden" name="image4" value="{{ $product->image4 }}">
                                    @else
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px">
                                    <input type="hidden" name="image4" value="">
                                    @endif
                                    </label>
                                    <input type="file" id="image4"  class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
                                    <span class="form-text text-muted">Image width and height: 290×160 pixels</span>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                        <i class="ki ki-bold-close icon-sm"></i> Delete
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Similar Products</label>
                                <div class="col-lg-10 col-md-12">
                                    <select class="form-control" id="similar_products" name="similar_products[]" multiple>
                                        <option value="">Select Similar Products</option>
                                        @foreach($products as $prod)
                                            <option value="{{$prod->id}}" {{ in_array($prod->id, explode(',', $product->similar_products ?? '')) ? 'selected' : '' }}>{{$prod->product_title}}/SKU: {{$prod->product_sku}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Related Products</label>
                                <div class="col-lg-10 col-md-12">
                                    <select class="form-control" id="related_products" name="related_products[]" multiple>
                                        <option value="">Select Related Products</option>
                                        @foreach($products as $prod)
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
@endsection

@push('script')
<script>
    var objectB = new Object();
    var objectA = new Object();
        $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
                    width: 128,
                    height: 80,
                    type: 'square' //circle
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
    });

        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            debugger
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        ClassicEditor.create(document.querySelector('#ktckeditor1'))
            .then(editor => { window.CKEditor1 = editor; })
            .catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#ktckeditor2'))
            .then(editor => { window.CKEditor2 = editor; })
            .catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#ktckeditor3'))
            .then(editor => { window.CKEditor3 = editor; })
            .catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#ktckeditor4'))
            .then(editor => { window.CKEditor4 = editor; })
            .catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#ktckeditor3'))
            .then(editor => { window.CKEditor3 = editor; })
            .catch(error => { console.error(error); });
 </script>
@endpush
