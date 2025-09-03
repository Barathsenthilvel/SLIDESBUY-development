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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Slide</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route($list) }}" class="text-muted">List of Slides</a>
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
                            <h3 class="card-title">Add Slide</h3>

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

                                            {{-- <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <div><strong>Note:</strong> Images will be automatically stored in <code>public/assets/media/products/</code> directory when you submit the form. Make sure your images are exactly 856×550 pixels for optimal display.</div>
                                                <button type="button" class="close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div> --}}
                                             @php
                                             if(Auth::user()->is_vendor != null || Auth::user()->is_vendor != ""){
                                                $link=route('admin-productv-store');
                                            }else{
                                                $link=route('admin-product-store');
                                            }
                                            @endphp
                        <form method="POST" action="{{$link}}" enctype="multipart/form-data" id="formCreate" onreset="CKEditor1.setData(''); CKEditor2.setData('');" onsubmit="if(typeof CKEditor1 != 'undefined'){ CKEditor1.updateSourceElement(); } if(typeof CKEditor3 != 'undefined'){ CKEditor3.updateSourceElement(); } CKEditor2.updateSourceElement();">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" value=0>

                            <!-- Success/Error Message Area -->
                            <div id="messageArea" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
                                <span id="messageText"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body">
                                @if (Auth::user()->is_vendor == null)

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Vendor<span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="vendor" name="vendor" >
                                        <option value="">Admin product</option>
                                        @foreach($vendor as $v)
                                            <option data-productPrefix="{{$v->manufacturerID}}" data-vendorperscent="{{$v->vendorperscent}}" value="{{ $v->id }}">{{$v->name.' / '.$StoreConfig->VendorIDPrefix.'-'.sprintf("%'03d", $v->id)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @else
                            <input type="hidden" name="vendor" value="{{Auth::user()->is_vendor}}">
                            @endif
                               <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Category<span class="text-danger">*</span></label>
                                <div class="col-lg-10 col-md-12">
                                    <select class="form-control" id="category" name="category[]" multiple>
                                        <option value="">Select</option>
                                        @foreach($category as $category)
                                        <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                            @foreach ($category->subs()->get() as $sub)
                                                <option value="{{ $sub->id }}">{{$sub->category_name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-2 col-form-label">Sub Category</label>

                                <div class="col-lg-4 col-md-12">
                                    <select class="form-control" id="subCategory" name="subCategory" >
                                        <option value="">Select</option>
                                        @if(old('category') && isset($data) && is_array($data) && count($data) > 0)
                                        @foreach($data as $data)
                                        <option value="{{$data->id}}" {{ (old('subCategory') == $data->id) ? 'selected' : '' }}>{{$data->category_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label"> Title<span class="text-danger">*</span></label>

                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{old('productTitle')}}" id="productTitle" name="productTitle" />
                                </div>
                            </div>
                            @if(Auth::user()->is_vendor == null && $pricing_type == 'product')
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Manufacturer Code<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Code">Admin</span>
                                        </div>
                                        <input class="form-control" type="text" value="" id="manufacturerCode" name="manufacturerCode" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Please enter your unique product code</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">MRP<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" type="number" value="" id="mrp" name="mrp" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Manufacturer Price<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="" id="manufacturerPrice" name="manufacturerPrice" onkeyup="baseprice(this.value)"/>
                                        <div class="input-group-append"><span class="input-group-text" id="Manufacturer"></span></div>
                                        <input type="hidden" id="persenttest" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter your Product amount without GST</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mark up Type<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-success"><input type="radio" onchange="mark_type_change(0)" checked name="mark_type" value="0" required><span></span> Flat</label>
                                        <label class="radio radio-outline radio-success"><input type="radio" onchange="mark_type_change(1)"  name="mark_type" value="1"><span></span> %</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Mark up<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" type="number" min=0 max=100 value=0 id="markup" name="markup" onkeyup="markupPrice(this.value)" required/>
                                        <div class="input-group-append"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter Mark up value</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Our Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="text" value="{{old('basePrice')}}" id="basePrice" name="basePrice" />
                                    <input class="form-control" type="hidden" value="{{$attributeTemplate}}" id="attributeTemplate" name="attributeTemplate" />
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>This is {{ $StoreConfig->store_name }} Price, No need to Enter</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Shipping Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="number" value="{{old('shipping_price')}}" id="shipping_price" name="shipping_price" required/>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Shipping charger cnly for vendor</span>
                                </div>
                            </div>
                            @endphp
                            @php
                            $persenttest = null;
                            if(Auth::user()->is_vendor != null && $pricing_type == 'product'){
                                $persenttest = App\Models\Vendor::findOrFail(Auth::user()->is_vendor);
                                }

                            @endphp

                            @if($persenttest != null)
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Manufacturer Code<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Code">{{$persenttest->productPrefix}}</span>
                                        </div>
                                        <input class="form-control" type="text" value="" id="manufacturerCode" name="manufacturerCode" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Please enter your unique product code</span>
                                </div>
                            </div>
                            @endif
                            @if($persenttest != null)
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Manufacturer Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-9">
                                    <input class="form-control" type="text" value="" id="manufacturerPrice" name="manufacturerPrice" onkeyup="baseprice(this.value)" />
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <h5 class="font-weight-bold text-dark">Vendor % = {{ $persenttest->vendorperscent}}</h5>
                                    <input type="hidden" id="persenttest" value="{{ $persenttest->vendorperscent}}">
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter your Product amount without GST</span>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Mark up Perscent<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" type="number" min=0 max=100 value=0 id="markup" name="markup" onkeyup="markupPrice(this.value)"  required/>
                                        <div class="input-group-append"><span class="input-group-text" id="">%</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter Mark up Perscent </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Our Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="text" value="{{old('basePrice')}}" id="basePrice" name="basePrice" readonly/>
                                    <input class="form-control" type="hidden" value="{{$attributeTemplate}}" id="attributeTemplate" name="attributeTemplate" />
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>This is {{ $StoreConfig->store_name }} Price, No need to Enter</span>
                                </div>
                            </div>
                            @endif


                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Code<span class="text-danger">*</span></label>

                                <div class="col-md-12 col-lg-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{$StoreConfig->productIdprefix}}</span>
                                        </div>
                                        <input class="form-control" type="text" value="{{old('skuCode')}}" id="skuCode" name="skuCode" />
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Last SKU Code {{$StoreConfig->productIdprefix}}{{isset($Product_last->product_sku)?$Product_last->product_sku:"not found"}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>SKU is {{ $StoreConfig->store_name }}, Enter based on last SKU</span>
                                </div>
                            </div>

                            @if($attributeTemplate >0)
                            <h3 class="card-title">Attribute</h3>
                            @foreach($processGroup as $processGroup)
                            @if (!empty($processGroup[0]))
                            @php
                                $attributeId = $processGroup[0]->id;
                                $attributeName = $processGroup[0]->attribute_name;
                                $attributeType = $processGroup[0]->attribute_type;
                                $attributeValues = !empty($processGroup[0]->attribute_values) ? explode(',', $processGroup[0]->attribute_values) : [];
                            @endphp
                            @switch($processGroup[0]->attribute_type)
                            @case (1)
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{old('attributes[$processGroup[0]->attribute_name]')}}" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}]" />
                                </div>
                            </div>
                            @break
                            @case (2)
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                <div class="col-lg-10 col-md-12">
                                    <textarea name="attributes[{{$processGroup[0]->id}}]" id="ktckeditor3">{{old('attributes[$processGroup[0]->attribute_name]')}}</textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            @break
                            @case (3)
                            @php
                            $attributeValues1 = array_filter(array_map('trim', explode(',', (string)($processGroup[0]->attribute_values ?? ''))));
                            @endphp
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                <div class="col-lg-10 col-md-12">
                                  <select class="form-control multis" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}]" >
                                      @if(count($attributeValues1) > 0)
                                      <option value="" >select {{$processGroup[0]->attribute_name}}</option>
                                      @foreach($attributeValues1 as $attributeValue)
                                      <option value="{{$attributeValue}}" {{(in_array($attributeValue,explode(',',old('attributes[$processGroup[0]->attribute_name]')))?'selected':'')}}>{{$attributeValue}}</option>
                                      @endforeach
                                      @endif
                                  </select>
                              </div>
                          </div>
                          @break
                            @case (4)
                            @php
                            $attributeValues1 = array_filter(array_map('trim', explode(',', (string)($processGroup[0]->attribute_values ?? ''))));
                            @endphp
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                <div class="col-lg-10 col-md-12">
                                  <select class="form-control multis" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}][]" multiple>
                                      @foreach($attributeValues1 as $value)
                                          @php
                                              $value = trim($value);
                                              $oldValues = old("attributes.{$processGroup[0]->id}") ?? [];
                                          @endphp
                                          <option value="{{ $value }}" {{ in_array($value, $oldValues) ? 'selected' : '' }}>
                                              {{ $value }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @if($processGroup[0]->attribute_name === 'Tags' || $processGroup[0]->attribute_name === 'tags')
                                      <small class="form-text text-muted">You can select multiple tags. These will be displayed on the product page.</small>
                                  @endif
                              </div>
                          </div>
                          @break
                          @case (5)
                          @php
                          $attributeValues1 = array_filter(array_map('trim', explode(',', (string)($processGroup[0]->attribute_values ?? ''))));
                          @endphp
                          <div class="form-group row">
                            <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>

                            <div class="col-lg-4 col-md-12 col-form-label">
                                <div class="form-check pl-0 checkbox-inline">
                                    @if(count($attributeValues1) > 0)
                                    @foreach($attributeValues1 as $attributeValue)
                                    <label class="checkbox checkbox-outline">
                                        <input type="checkbox" name="attributes[{{$processGroup[0]->id}}][]" value="{{$attributeValue}}">
                                        <span></span>{{$attributeValue}}</label>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @break
                            @case (6)
                            @php
                            $attributeValues1 = array_filter(array_map('trim', explode(',', (string)($processGroup[0]->attribute_values ?? ''))));
                            @endphp
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">{{$processGroup[0]->attribute_name}}</label>

                                <div class="col-lg-4 col-md-12 col-form-label">
                                    <div class="form-check pl-0 checkbox-inline">
                                        @if(count($attributeValues1) > 0)
                                        @foreach($attributeValues1 as $attributeValue)
                                        <label class="checkbox checkbox-outline">
                                            <input type="radio" name="attributes[{{$processGroup[0]->id}}][]" value="{{$attributeValue}}">
                                            <span></span>{{$attributeValue}}</label>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @break
                                @endswitch
                                @endif
                                @endforeach
                                @endif

                                <h3 class="card-title">Others</h3>
                                @if($pricing_type == 'product')
                                <div class="form-group row">
                                    <label class="col-md-12 col-lg-2 col-form-label">Tax<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="input-group">
                                            <select class="form-control" id="tax" name="tax"  required>
                                                <option value="">select Tax</option>
                                                @foreach($tax as $tax)
                                                <option data-tax_type={{$tax->tax_type}} data-tax_rate={{$tax->tax_rate}} value="{{$tax->id}}" {{ (old('tax') == $tax->id) ? 'selected' : '' }}>{{$tax->tax_name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append"><span class="input-group-text" id="showtax"></span></div>
                                        </div>
                                    </div>
                              </div>
                              @endif

                              <!-- <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Weight<span class="text-danger">*</span></label>

                                <div class="col-lg-4 col-md-9">
                                    <input type="text" name="weight" value="{{old('weight')}}" class="form-control" required>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <select name="weightUnit" class="form-control" >
                                        <option value="1" {{ (old('weightUnit') == 1) ? 'selected' : '' }}>Gram</option>
                                        <option value="2" {{ (old('weightUnit') == 2) ? 'selected' : '' }}>KG</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label"> Description<span class="text-danger">*</span></label>
                                <div class="col-lg-10 col-md-12">
                                    <textarea name="productDescription" id="ktckeditor2">{{old('productDescription')}}</textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Trending</label>

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input data-switch="true" type="checkbox" name="trending" data-on-color="success" data-off-color="danger" {{ (old('trending') == 1) ? 'checked' : '' }} />
                                </div>
                            </div>
                            {{-- @if($pricing_type == 'product')
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Delivery Date</label>
                                <div class="col-lg-3 col-md-12" >
                                    <input type="text" name="deliveryDate" class="form-control" placeholder="Select Date" value="3 to 5 Days"  >
                                </div>
                            </div>
                            @endif --}}
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Meta Name</label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="" id="metaname" name="metaname" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Meta Description</label>
                                <div class="col-lg-10 col-md-12">
                                    <textarea name="metadescription" id="ktckeditor1">{{old('metadescription')}}</textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Meta Keyword
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="" id="metakeyword" name="metakeyword" required/>
                                </div>
                                {{-- <div class="col-lg-4 col-md-12">
                                    <span>Enter keyword separated by comma (E.g. Sarees, Pure)</span>
                                </div> --}}
                            </div>
                            @if($pricing_type == 'product')
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Quantity
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="" id="quantity" name="quantity"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Min Quantity
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="1" id="minquantity" name="minquantity" required/>
                                </div>
                            </div>
                            @endif
                            {{-- <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Sold Out</label>

                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input data-switch="true" type="checkbox"  data-on-color="success" data-off-color="danger" name="soldout" value="on" {{ (old('soldout') == 'on') ? 'checked' : '' }} />
                                </div>
                            </div> --}}

                            <h3 class="card-title">Documents</h3>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Document Upload<span class="text-danger">*</span> </label>
                                <div class="col-lg-3 col-md-10">
                                    <input type="file" id="document" name="document" style="width:250px;padding:20px;border:2px dashed #222;" accept=".pdf,.ppt,.pptx">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Sell Type</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <select name="sell_type" class="form-control" >
                                        <option value="1">Paid</option>
                                        <option value="0">Free</option>
                                    </select>
                                </div>
                            </div>


                            <h3 class="card-title">Pictures</h3>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Image 1<span class="text-danger">*</span> </label>
                                <div class="col-lg-3 col-md-10">
                                    <div class="image-upload-container">
                                        <div class="file-preview" style="width:250px;border:2px dashed #222;height: 160px;cursor:pointer;background-color:#f8f9fa;display:flex;align-items:center;justify-content:center;color:#6c757d;font-size:14px;" onclick="document.getElementById('image1').click();" title="Click to upload image">
                                            <span>Click to upload Image 1</span>
                                        </div>
                                        <input type="file" name="image1" id="image1" class="upload_image" style="display:none;" accept="image/*">
                                    </div>
                                    <span class="form-text text-muted">Min: 200x200px | Max: 5000x5000px | Max size: 10MB (Big images supported)</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Image 2</label>

                                <div class="col-lg-3 col-md-10">
                                    <div class="image-upload-container">
                                        <div class="file-preview" style="width:250px;border:2px dashed #222;height: 160px;cursor:pointer;background-color:#f8f9fa;display:flex;align-items:center;justify-content:center;color:#6c757d;font-size:14px;" onclick="document.getElementById('image2').click();" title="Click to upload image">
                                            <span>Click to upload Image 2</span>
                                        </div>
                                        <input type="file" name="image2" id="image2" class="upload_image" style="display:none;" accept="image/*">
                                    </div>
                                    <span class="form-text text-muted">Min: 200x200px | Max: 5000x5000px | Max size: 10MB (Big images supported)</span>
                                </div>
                                <div class="col-2">
                                    <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                        <i class="ki ki-bold-close icon-sm"></i> Delete
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Image 3</label>

                                <div class="col-lg-3 col-md-10">
                                    <div class="image-upload-container">
                                        <div class="file-preview" style="width:250px;border:2px dashed #222;height: 160px;cursor:pointer;background-color:#f8f9fa;display:flex;align-items:center;justify-content:center;color:#6c757d;font-size:14px;" onclick="document.getElementById('image3').click();" title="Click to upload image">
                                            <span>Click to upload Image 3</span>
                                        </div>
                                        <input type="file" name="image3" id="image3" class="upload_image" style="display:none;" accept="image/*">
                                    </div>
                                    <span class="form-text text-muted">Min: 200x200px | Max: 5000x5000px | Max size: 10MB (Big images supported)</span>
                                </div>
                                <div class="col-2">
                                    <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                        <i class="ki ki-bold-close icon-sm"></i> Delete
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Image 4</label>

                                <div class="col-lg-3 col-md-10">
                                    <div class="image-upload-container">
                                        <div class="file-preview" style="width:250px;border:2px dashed #222;height: 160px;cursor:pointer;background-color:#f8f9fa;display:flex;align-items:center;justify-content:center;color:#6c757d;font-size:14px;" onclick="document.getElementById('image4').click();" title="Click to upload image">
                                            <span>Click to upload Image 4</span>
                                        </div>
                                        <input type="file" name="image4" id="image4" class="upload_image" style="display:none;" accept="image/*">
                                    </div>
                                    <span class="form-text text-muted">Min: 200x200px | Max: 5000x5000px | Max size: 10MB (Big images supported)</span>
                                </div>
                                <div class="col-2">
                                    <span class="btn btn-light-danger font-weight-bold mr-2 deletSpan">
                                        <i class="ki ki-bold-close icon-sm"></i> Delete
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Similar Products</label>


                                <div class="col-10">
                                    <select name="similarProducts[]" id="similarProducts" class="form-control" multiple="multiple">
                                        @if(isset($products) && is_array($products) && count($products) > 0)
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" {{ (old('similarProducts') == $product->id) ? 'selected' : '' }}>{{$product->product_title}}/SKU: {{$StoreConfig->productIdprefix}}{{  $product->product_sku}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Related Products</label>


                                <div class="col-10">
                                    <select name="relatedProducts[]" id="relatedProducts" class="form-control" multiple="multiple">
                                        @if(isset($products) && is_array($products) && count($products) > 0)
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" {{ (old('relatedProducts') == $product->id) ? 'selected' : '' }}>{{$product->product_title}}/SKU: {{$StoreConfig->productIdprefix}}{{  $product->product_sku}}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
<!--begin::Footer-->
@endsection

@push('style')
<style>
.image-upload-container {
    position: relative;
}

.file-preview {
    transition: all 0.3s ease;
}

.file-preview:hover {
    border-color: #007bff !important;
    background-color: #e3f2fd !important;
}

.file-preview img {
    border-radius: 4px;
}

.upload_image {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
</style>
@endpush

@push('script')
<script>

$('#category').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });
    $('#relatedProducts').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });
    $('#similarProducts').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });

    $('.multis').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });

    $(document).ready(function(){
        // File inputs are now hidden with display:none in HTML
        // No need to hide them with JavaScript
    });
   $("#category").change(function(){
    var category=$("#category").val();
    $.ajax({
        type:"POST",
        url:"{{route('getSubCategory')}}",
        data:{"_token": "{{ csrf_token() }}",id:category},
        success:function(data){
            $.each(data, function(index, element) {
                $("#subCategory").append('<option value="'+element["id"]+'">'+element["category_name"]+'</option>');

            });
        }
    });
});
   $(".imagePreview").change(function(event){
       var temp= $(this);
            var reader = new FileReader();
            var imageField = document.getElementsByClassName("file-preview");
            reader.onload = function(){
                if(reader.readyState == 2){
                     temp.parent()[0].children[0].children[0].src=reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);

   });

   // Class definition

   var KTBootstrapSwitch = function() {

// Private functions
var demos = function() {
 // minimum setup
 $('[data-switch=true]').bootstrapSwitch();
};

return {
 // public functions
 init: function() {
     demos();
 },
};
}();

jQuery(document).ready(function() {
    KTBootstrapSwitch.init();
});

</script>
<script>
    function mark_type_change(val){
        if(val == 0){
            var persent = Number($('#markup').val());
            var manufacturerPrice = Number($('#manufacturerPrice').val());
            $('#basePrice').val(Number((persent)+manufacturerPrice));
            return;
        }else{
            if($('#markup').val() >100) $('#markup').val(100)
            var persent = Number($('#markup').val());
            var manufacturerPrice = Number($('#manufacturerPrice').val());
            var onepersent = manufacturerPrice/100;
            $('#basePrice').val(Number((onepersent*persent)+manufacturerPrice));
        }
    }

    function baseprice(price){
        if(document.querySelector('[name=mark_type]:checked').value == '0'){
            var persent = Number($('#markup').val());
            var manufacturerPrice = Number($('#manufacturerPrice').val());
            $('#basePrice').val(Number((persent)+manufacturerPrice));
            return;
        }
        if($('#markup').val() >100) $('#markup').val(100)
        var persent = Number($('#markup').val());
        var manufacturerPrice = Number($('#manufacturerPrice').val());
        var onepersent = manufacturerPrice/100;
        $('#basePrice').val(Number((onepersent*persent)+manufacturerPrice));
    }
    function markupPrice(price){
        if(document.querySelector('[name=mark_type]:checked').value == '0'){
            var persent = Number($('#markup').val());
            var manufacturerPrice = Number($('#manufacturerPrice').val());
            $('#basePrice').val(Number((persent)+manufacturerPrice));
            return;
        }
        if($('#markup').val() >100) $('#markup').val(100)
        var persent = Number($('#markup').val());
        var manufacturerPrice = Number($('#manufacturerPrice').val());
        var onepersent = manufacturerPrice/100;
        $('#basePrice').val(Number((onepersent*persent)+manufacturerPrice));
    }
    $("#tax").change(function(){
        if($('#tax').val() == ''){
          $("#showtax").html('');
          return;
        }
        var retu =  ($(this).find(':selected').data('tax_type')==1)?'%':'₹';
        $("#showtax").html($(this).find(':selected').data('tax_rate')+" "+retu);
    });
    $("#vendor").change(function(){
        if($(this).val() != ""){
        $("#Manufacturer").html("Vendor "+$(this).find(':selected').data('vendorperscent')+" %");
        $("#Code").html($(this).find(':selected').data('productprefix'));
        $("#persenttest").val(Number($('#vendor').find(':selected').data('vendorperscent')));
        }else{
            $("#Manufacturer").html("");
            $("#persenttest").val(Number(0));
            $("#Code").html("Admin");
        }
    });


            // Client-side image dimension validation
    function validateImageDimensions(file, callback) {
        var img = new Image();
        img.onload = function() {
            var width = this.width;
            var height = this.height;
            var fileSize = file.size;
            var maxSize = 10 * 1024 * 1024; // 10MB in bytes for big images

            // Check file size (max 10MB for big images)
            if (fileSize > maxSize) {
                alert('Image size must be less than 10MB');
                callback(false);
                return;
            }

            // Check minimum dimensions (prevent tiny images)
            if (width < 200 || height < 200) {
                alert('Image dimensions should be at least 200x200 pixels for clear display. Current size: ' + width + '×' + height);
                callback(false);
                return;
            }

            // Check maximum dimensions (allow very large images up to 5000x5000)
            if (width > 5000 || height > 5000) {
                alert('Image dimensions should not exceed 5000x5000 pixels. Current size: ' + width + '×' + height);
                callback(false);
                return;
            }

            // Success - image meets all requirements for big image upload
            callback(true);
        };
        img.src = URL.createObjectURL(file);
    }

    $(document).ready(function(){
            $('.upload_image').on('change', function(){
        var file = this.files[0];
        if (!file) return;

        validateImageDimensions(file, function(isValid) {
            if (isValid) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    // Find the preview container and update it to show the image
                    var previewContainer = $(this).closest('.form-group').find('.file-preview');
                    previewContainer.html('<img src="' + event.target.result + '" style="width:100%;height:100%;object-fit:cover;">');
                }.bind(this);
                reader.readAsDataURL(file);
            } else {
                // Clear the file input
                this.value = '';
                // Reset the preview to default state
                var previewContainer = $(this).closest('.form-group').find('.file-preview');
                var imageNumber = $(this).attr('id').replace('image', '');
                previewContainer.html('<span>Click to upload Image ' + imageNumber + '</span>');
            }
        }.bind(this));
      });
            $('.deletSpan').on('click',function(){
            // Get the image number from the file input ID
            var fileInput = $(this).closest('.form-group').find('input[type="file"]');
            var imageNumber = fileInput.attr('id').replace('image', '');

            // Reset the preview to default state
            var previewContainer = $(this).closest('.form-group').find('.file-preview');
            previewContainer.html('<span>Click to upload Image ' + imageNumber + '</span>');

            // Clear the file input
            fileInput.val('');
        });
    });

    // Form submission handler
    $('#formCreate').on('submit', function(e) {
        e.preventDefault();

        // Show loading indicator
        var submitBtn = $(this).find('button[type="submit"]');
        var originalText = submitBtn.text();
        submitBtn.prop('disabled', true).text('Creating...');

        const formData = new FormData(this);
        const url = this.action;

        $.ajax({
            method: "POST",
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log('Success response:', data);
                if (data.success && data.redirect) {
                    // Show success message in the message area
                    $('#messageText').text(data.msg);
                    $('#messageArea').removeClass('alert-danger').addClass('alert-success').show();

                    // Redirect to the list page after a short delay
                    setTimeout(function() {
                        window.location.href = data.redirect;
                    }, 1500);
                } else if (data.msg) {
                    // Show success message in the message area
                    $('#messageText').text(data.msg);
                    $('#messageArea').removeClass('alert-danger').addClass('alert-success').show();

                    // Reset form
                    $('#formCreate')[0].reset();
                    // Reset CKEditor content
                    if (typeof CKEditor1 !== 'undefined') CKEditor1.setData('');
                    if (typeof CKEditor2 !== 'undefined') CKEditor2.setData('');
                    if (typeof CKEditor3 !== 'undefined') CKEditor3.setData('');
                    if (typeof CKEditor4 !== 'undefined') CKEditor4.setData('');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error response:', xhr.responseText);
                console.log('Status:', status);
                console.log('Error:', error);

                var errorMsg = "Something went wrong!";
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.errors) {
                        errorMsg = Object.values(response.errors).flat().join('\n');
                    } else if (response.message) {
                        errorMsg = response.message;
                    }
                } catch (e) {
                    // If parsing fails, use default error message
                }

                // Show error message in the message area
                $('#messageText').text(errorMsg);
                $('#messageArea').removeClass('alert-success').addClass('alert-danger').show();
            },
            complete: function() {
                // Re-enable submit button
                submitBtn.prop('disabled', false).text(originalText);
            }
        });
    });
</script>
<script>
    ClassicEditor.create( document.querySelector( '#ktckeditor1' ) )
        .then( editor => { window.CKEditor1 = editor;} )
		.catch( error => { console.error( error ); });
		ClassicEditor.create( document.querySelector( '#ktckeditor2' ) )
        .then( editor => { window.CKEditor2 = editor;} )
		.catch( error => { console.error( error ); });
		ClassicEditor.create( document.querySelector( '#ktckeditor3' ) )
        .then( editor => { window.CKEditor3 = editor;} )
		.catch( error => { console.error( error ); });
		ClassicEditor.create( document.querySelector( '#ktckeditor4' ) )
        .then( editor => { window.CKEditor4 = editor;} )
		.catch( error => { console.error( error ); });
 </script>
@endpush
