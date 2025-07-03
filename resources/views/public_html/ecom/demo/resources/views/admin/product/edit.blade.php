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
                                            <option value="">Select</option>
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
                            {{-- <div class="form-group row">
                                <label class="col-2 col-form-label">Sub Category</label>

                                <div class="col-10">
                                    <select class="form-control" id="subCategory" name="subCategory" >
                                        <option value="">Select</option>
                                        @foreach($data as $data)
                                        <option value="{{$data->id}}" {{ ($product->sub_category == $data->id) ? 'selected' : '' }}>{{$data->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Product Title<span class="text-danger">*</span></label>

                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->product_title}}" id="productTitle" name="productTitle" />
                                </div>
                            </div>
                            
                            @if(Auth::user()->is_vendor == null)
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Code<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Code"></span>
                                        </div>
                                        <input class="form-control" type="text" value="{{$product->manufacturerCode}}" id="manufacturerCode" name="manufacturerCode" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Please enter your unique product code</span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Price<span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" type="text" value="{{$product->manufacturerPrice }}" id="manufacturerPrice" name="manufacturerPrice" onkeyup="baseprice(this.value)"/>
                                        <div class="input-group-append"><span class="input-group-text" id='Manufacturer'></span></div>
                                        <input type="hidden" id="persenttest" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter your Product amount without GST</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Mark up Perscent<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" onkeyup="markupPrice(this.value)"  type="number" min=0 max=100 value={{$product->markup}} id="markup" name="markup" required/>
                                        <div class="input-group-append"><span class="input-group-text" id="Manufacturer">%</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter Mark up Perscent </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Our Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->product_base_price}}" id="basePrice" name="basePrice" />
                                    <input class="form-control" type="hidden" value="{{$attributeTemplate}}" id="attributeTemplate" name="attributeTemplate" />
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>This is Silkastic Price, No need to Enter</span>
                                </div>
                            </div>
                            @else    
                            @php
                                $persenttest = App\Models\Vendor::findOrFail(Auth::user()->is_vendor);
                            @endphp    
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Code<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Code">{{$persenttest->manufacturerID}}</span>
                                        </div>
                                        <input class="form-control" type="text" value="{{$product->manufacturerCode}}" id="manufacturerCode" name="manufacturerCode" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Please enter your unique product code</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Manufacturer Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->manufacturerPrice }}" id="manufacturerPrice" name="manufacturerPrice" onkeyup="baseprice(this.value)" />
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <h5 class="font-weight-bold text-dark">Vendor % = {{ $persenttest->vendorperscent}}</h5>
                                    <input type="hidden" id="persenttest" value="{{ $persenttest->vendorperscent}}">
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter your Product amount without GST</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12 col-lg-2 col-form-label">Mark up Perscent<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <div class="input-group">
                                        <input class="form-control" onkeyup="markupPrice(this.value)"  type="number" min=0 max=100 value={{$product->markup}} id="markup" name="markup" required/>
                                        <div class="input-group-append"><span class="input-group-text" id="Manufacturer">%</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter Mark up Perscent </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Our Price<span class="text-danger">*</span></label>
                                <div class="col-lg-2 col-md-12">
                                    <input class="form-control" type="text" value="{{$product->product_base_price}}" id="basePrice" name="basePrice" readonly/>
                                    <input class="form-control" type="hidden" value="{{$attributeTemplate}}" id="attributeTemplate" name="attributeTemplate" />
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>This is Silkastic Price, No need to Enter</span>
                                </div>
                            </div>                           
                            @endif

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
                                    <span>SKU is silkastic code, Enter based on last SKU</span>
                                </div>
                            </div>
                            
                            @if($attributeTemplate >0)
                            <h3 class="card-title">Attribute</h3>
                                @foreach($processGroup as $key => $processGroup)
                                    @php
                                        if(!isset($attributeValues3[$processGroup[0]->id])){
                                                $attributeValues3[$processGroup[0]->id] = [$processGroup[0]->id,''];
                                            }
                                    @endphp
                                    @if (!empty($processGroup[0]))
                                        @switch($processGroup[0]->attribute_type)
                                            @case (1)
                                                @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                    
                                                    <div class="col-lg-10 col-md-12">
                                                        <input class="form-control" type="text" value="{{$attributeValues3[$processGroup[0]->id][1]}}" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}]" />
                                                    </div>
                                                </div>
                                                @endif
                                                @break
                                            @case (2)
                                                @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                    
                                                    <div class="col-lg-10 col-md-12">
                                                        <textarea name="attributes[{{$processGroup[0]->id}}]" id="ktckeditor4">{{$attributeValues3[$processGroup[0]->id][1]}}</textarea>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                </div>
                                                @endif
                                                @break
                                            @case (3)
                                            @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                                @php
                                                $attributeValues1=explode(',',$processGroup[0]->attribute_values);
                                                $attributeValues=(count($attributeValues1)>0)?count($attributeValues1):'0';
                                                @endphp
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                    
                                                    <div class="col-lg-10 col-md-12">
                                                      <select class="form-control" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}]">
                                                          @if($attributeValues>0)
                                                          @foreach($attributeValues1 as $attributeValues1)
                                                          @php
                                                          @endphp
                                                          @if(array_key_exists($processGroup[0]->id,$attributeValues3) && $attributeValues3[$key][0]==$processGroup[0]->id)
                                                          <option value="{{$attributeValues1}}" {{(in_array($attributeValues1,explode(',',$attributeValues3[$key][1])))?'selected':'' }}>{{$attributeValues1}}</option>
                                                          @else
                                                          <option value="{{$attributeValues1}}">{{$attributeValues1}}</option>
                                                          @endif
                                                          @endforeach
                                                          @endif
                                                      </select>
                                                  </div>
                                              </div>
                                              @endif
                                              @break
                                            @case (4)
                                                @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                                @php
                                                $attributeValues1=explode(',',$processGroup[0]->attribute_values);
                                                $attributeValues=(count($attributeValues1)>0)?count($attributeValues1):'0';
                                                @endphp
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                    
                                                    <div class="col-lg-10 col-md-12">
                                                      <select class="form-control" id="{{$processGroup[0]->attribute_name}}" name="attributes[{{$processGroup[0]->id}}][]" multiple>
                                                          @if($attributeValues>0)
                                                          @foreach($attributeValues1 as $attributeValues1)
                                                          @php
                                                          @endphp
                                                          @if(array_key_exists($processGroup[0]->id,$attributeValues3) && $attributeValues3[$key][0]==$processGroup[0]->id)
                                                          <option value="{{$attributeValues1}}" {{(in_array($attributeValues1,explode(',',$attributeValues3[$key][1])))?'selected':'' }}>{{$attributeValues1}}</option>
                                                          @else
                                                          <option value="{{$attributeValues1}}">{{$attributeValues1}}</option>
                                                          @endif
                                                          @endforeach
                                                          @endif
                                                      </select>
                                                  </div>
                                              </div>
                                              @endif
                                              @break
                                          @case (5)
                                            @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                              @php
                                              $attributeValues1=explode(',',$processGroup[0]->attribute_values);
                                              $attributeValues=(count($attributeValues1)>0)?count($attributeValues1):'0';
                                              @endphp
                                              <div class="form-group row">
                                                <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                    
                                                <div class="col-lg-10 col-md-12 col-form-label">
                                                    <div class="form-check pl-0 checkbox-inline">
                                                        @if($attributeValues>0)
                                                        @foreach($attributeValues1 as $attributeValues1)
                                                        <label class="checkbox checkbox-outline">
                                                            <input type="checkbox" name="attributes[{{$processGroup[0]->id}}][]" {{(in_array($attributeValues1,explode(',',$attributeValues3[$key][1])))?'checked':'' }} value="{{$attributeValues1}}">
                                                            <span></span>{{$attributeValues1}}</label>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @break
                                            @case (6)
                                                @if(isset($attributeValues3[$processGroup[0]->id][1]))
                                                @php
                                                    $attributeValues1=explode(',',$processGroup[0]->attribute_values);
                                                    $attributeValues=(count($attributeValues1)>0)?count($attributeValues1):'0';
                                                @endphp
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-md-12 col-form-label">{{$processGroup[0]->attribute_name}}</label>
                                                            <div class="col-lg-10 col-md-12 col-form-label">
                                                                <div class="form-check pl-0 checkbox-inline">
                                                                    @if($attributeValues>0)
                                                                        @foreach($attributeValues1 as $attributeValues1)
                                                                        <label class="checkbox checkbox-outline">
                                                                            <input type="radio" name="attributes[{{$processGroup[0]->id}}][]" {{(in_array($attributeValues1,explode(',',$attributeValues3[$key][1])))?'checked':'' }}  value="{{$attributeValues1}}">
                                                                            <span></span>{{$attributeValues1}}</label>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @break
                                            @endswitch
                                        @endif
                                    @endforeach
                                @endif
                                
                                 <!--End of seddion -->
                                 
                                <h3 class="card-title">Others</h3>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-12 col-form-label">Tax<span class="text-danger">*</span></label>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="input-group">
                                            <select class="form-control" id="tax" name="tax"  required>
                                                <option value="">select Tax</option>
                                            @foreach($tax as $tax)
                                                <option data-tax_type={{$tax->tax_type}} data-tax_rate={{$tax->tax_rate}} value="{{$tax->id}}" {{ ($product->tax == $tax->id) ? 'selected' : '' }} >{{$tax->tax_name}}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-append"><span class="input-group-text" id="showtax"></span></div>
                                        </div>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Weight<span class="text-danger">*</span></label>

                                <div class="col-lg-4 col-md-9">
                                    <input type="text" name="weight" value="{{$product->weight}}" class="form-control" required>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <select name="weightUnit" class="form-control" >
                                        <option value="1" {{ ($product->weight_unit == 1) ? 'selected' : '' }}>Gram</option>
                                        <option value="2" {{ ($product->weight_unit == 2) ? 'selected' : '' }}>KG</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Product Description<span class="text-danger">*</span></label>

                                <div class="col-lg-10 col-md-12">
                                    <textarea name="productDescription" id="ktckeditor2">{{$product->product_description}}</textarea>
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
                                <label class="col-lg-2 col-md-12 col-form-label">Delivery Date</label>
                                <div class="col-lg-4 col-md-12" >
                                    <input type="text" name="deliveryDate" placeholder="Select Date" class="form-control" data-id="{{$product->delivery_date}}" value="{{ $product->delivery_date}}">
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
                                <label class="col-lg-2 col-md-12 col-form-label">Meta Keyword
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{ $product->metakeyword}}" id="metakeyword" name="metakeyword" required/>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <span>Enter keyword separated by comma (E.g. Sarees, Pure)</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Quantity
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{ $product->quantity}}" id="quantity" name="quantity" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Min Quantity
                                <span class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-12">
                                    <input class="form-control" type="text" value="{{ $product->minquantity}}" id="minquantity" name="minquantity" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Sold Out</label>

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input data-switch="true" type="checkbox"  data-on-color="success" data-off-color="danger" name="soldout" value="on" {{ ($product->soldout == 'on') ? 'checked' : '' }} />
                                </div>
                            </div>

                            <h3 class="card-title">Pictures</h3>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Image 1<span class="text-danger">*</span> </label>
                                <div class="col-lg-3 col-md-12">
                                    <label for="image1"  ><img class="file-preview" style="width:250px;border:2px dashed #222;height: 310px"  src="{{ URL::asset('assets/media/products/'.$product->image1) }}"></label>
                                    <input type="hidden" name="image1" value="{{ $product->image1 }}">
                                    <input type="file" class="upload_image" id="image1" style="width:250px;border:2px dashed #222;height: 310px"  accept="image/*">
                                    <span class="form-text text-muted">Image width and height:700*700</span>
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
                                    
                                    <span class="form-text text-muted">Image width and height:700*700</span>
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
                                    
                                    <span class="form-text text-muted">Image width and height:700*700</span>
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
                                    <input type="hidden" name="image4" value="{{ $product->image4}}">
                                    @else
                                    <img class="file-preview"  style="width:250px;border:2px dashed #222;height: 310px">
                                    <input type="hidden" name="image4" value="">
                                    @endif
                                    </label>
                                    <input type="file" id="image4" class="upload_image" style="width:250px;padding:20px;border:2px dashed #222;" accept="image/*">
                                    
                                    <span class="form-text text-muted">Image width and height:700*700</span>
                                   
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
                                    <select name="similarProducts[]" id="similarProducts" class="form-control" multiple>
                                        @foreach($similarProduct as $similarProduct)
                                        <option value="{{$similarProduct->id}}" {{ in_array($similarProduct->id,explode(',',$product->similar_products)) ? 'selected' : '' }}>{{$similarProduct->product_title}}/SKU: {{$StoreConfig->productIdprefix}}{{  $similarProduct->product_sku}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-md-12 col-form-label">Related Products</label>

                                
                                <div class="col-lg-10 col-md-12">
                                    <select name="relatedProducts[]" id="relatedProducts" class="form-control" multiple>
                                        @foreach($relatedProduct as $relatedProduct)
                                        <option value="{{$relatedProduct->id}}" {{ in_array($relatedProduct->id,explode(',',$product->related_products)) ? 'selected' : '' }}>{{$relatedProduct->product_title}}/SKU: {{$StoreConfig->productIdprefix}}{{  $relatedProduct->product_sku}}</option>
                                        @endforeach
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

@push('script')
<script>

$('#category').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
        dropdownCssClass: "test"
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
        $("input[type=file]").css("display","none");
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
    var retu =  ($("#tax").find(':selected').data('tax_type')==1)?'%':'₹';
    $("#showtax").html($("#tax").find(':selected').data('tax_rate')+" "+retu);

    if($('#vendor').val() != ""){
        $("#Manufacturer").html("Vendor "+$('#vendor').find(':selected').data('vendorperscent')+" %");
        $("#Code").html($('#vendor').find(':selected').data('productprefix'));
        $("#persenttest").val(Number($('#vendor').find(':selected').data('vendorperscent')));
        }else{
            $("#persenttest").val(Number(0));
            $("#Code").html("Admin");
            $("#Manufacturer").html("");
        }
    function baseprice(price){
        var persent = Number($('#markup').val());
        var manufacturerPrice = Number(price);
        var onepersent = manufacturerPrice/100;
        $('#basePrice').val(Number((onepersent*persent)+manufacturerPrice));
    }
    function markupPrice(price){
        var persent = Number($('#markup').val());
        var manufacturerPrice = Number($('#manufacturerPrice').val());
        var onepersent = manufacturerPrice/100;
        $('#basePrice').val(Number((onepersent*persent)+manufacturerPrice));
    }
    $("#tax").change(function(){
        var retu =  ($(this).find(':selected').data('tax_type')==1)?'%':'₹';
        $("#showtax").html($(this).find(':selected').data('tax_rate')+" "+retu);
    });
    $("#vendor").change(function(){
        if($(this).val() != ""){
        $("#Manufacturer").html("Vendor "+$(this).find(':selected').data('vendorperscent')+" %");
        $("#Code").html($(this).find(':selected').data('productprefix'));
        $("#persenttest").val(Number($('#vendor').find(':selected').data('vendorperscent')));
        }else{
            $("#persenttest").val(Number(0));
            $("#Code").html("Admin");
            $("#Manufacturer").html("");
        }
    });
    var objectB = new Object();
    var objectA = new Object();
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
         width:700,
          height:700,
          type:'square' //circle
        },
        boundary:{
          width:800,
          height:800
        }
      });
    
      $('.upload_image').on('change', function(){
        objectB = this.parentElement;
        objectA = this;
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });
    
      $('.crop_image').click(function(event){
          var id= $("#id").val();
          var url= $("#url").val();
          var table_colum = objectA.id;
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){
            $.ajax({
                url:url,
                type: "POST",
                data:{id:id,table_colum:table_colum,"image": response,"_token": "{{ csrf_token() }}"},
                success:function(data){  
                    objectB.children[0].children[0].src = response;
                    $('#uploadimageModal').modal('hide');
                    objectB.children[0].children[1].value = data['Name'];
                },error:function(data){
                    $.notify("Reduce the quality & size of image !!","success");
                }
            });
            $('#uploadimageModal').modal('hide');
        })
      });
        $('.deletSpan').on('click',function(){
            this.parentElement.parentElement.children[1].children[0].children[0].src="";
            this.parentElement.parentElement.children[1].children[0].children[1].value = "";
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