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
                                            
                        <form method="POST" action="{{route('admin-store-update',$data->id)}}" id="formEdit" enctype="multipart/form-data" onsubmit="CKEditor1.updateSourceElement();CKEditor2.updateSourceElement();CKEditor3.updateSourceElement();if(typeof CKEditor4 != 'undefined'){ CKEditor4.updateSourceElement(); }CKEditor5.updateSourceElement();CKEditor6.updateSourceElement();">
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
                                </div>
                                
                                <div class="form-group row">
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->OrderIDPrefix }}" id="OrderIDPrefix" name="OrderIDPrefix" required maxlength="5" title="Length Must be max 4" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Customer ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->CustomerIDPrefix }}" id="CustomerIDPrefix" name="CustomerIDPrefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Vendor ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->VendorIDPrefix }}" id="VendorIDPrefix" name="VendorIDPrefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Product ID Prefix
                                        <span class="text-danger">*</span></label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="{{ $data->productIdprefix }}" id="productIdprefix" name="productIdprefix" required maxlength="5" title="Length Must be max 4"/>
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                </div>
                                
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
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">logo
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <label for="logo"><img class="file-preview" style="width:666px;border:2px dashed #222;height: 242px"  src="{{ URL::asset('assets/media/banner/'.$data->logo)  }}"></label>
                                        <input type="hidden" name="logo" value="{{ $data->logo }}">
                                        <input type="file" class="upload_image" id="logo" style="display: none"  accept="image/*">
                                        <span class="form-text text-muted">Image width and height:128*80</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Invert Logo
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <label for="invert_logo"><img class="file-preview" style="width:666px;border:2px dashed #222;height: 242px"  src="{{ URL::asset('assets/media/banner/'.$data->invert_logo)  }}"></label>
                                        <input type="hidden" name="invert_logo" value="{{ $data->invert_logo }}">
                                        <input type="file" class="upload_image" id="invert_logo" style="display: none"  accept="image/*">
                                        <span class="form-text text-muted">Image width and height:128*80</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">FavIcon
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <label for="fav_icon"><img class="file-preview" id="output" style="width:648px;border:2px dashed #222;height: 644px"  src="{{ URL::asset('assets/media/banner/'.$data->fav_icon)  }}"></label>
                                        <input type="file" name="fav_icon" class="upload_image1" id="fav_icon" style="display: none"  accept="image/*" onchange="loadFile(event)">
                                        <span class="form-text text-muted">Image width and height:43*38</span>
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
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="Store_Meta_Description"
                                            id="ktckeditor1">{{ $data->Store_Meta_Description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Meta Keywords
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="Store_Meta_Keywords"
                                            id="ktckeditor2">{{ $data->Store_Meta_Keywords}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Store Address
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <textarea name="store_address"
                                            id="ktckeditor3" required>{{ $data->store_address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">GSTIN
                                        <span class="text-danger"></span></label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{ $data->GSTIN}}" id="GSTIN"
                                            name="GSTIN" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order Emails From
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_From" class="form-control" name='Order_Emails_From' placeholder='Write some tags' value='{{ $data->Order_Emails_From}}'/>
                                        {{-- <textarea class="form-control"  
                                            id="Order_Emails_To" name="Order_Emails_From" >{{ $data->Order_Emails_From}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order Emails To
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_To" class="form-control" name='Order_Emails_To' placeholder='Write some tags' value='{{ $data->Order_Emails_To}}'/>
                                        {{-- <textarea class="form-control"  
                                            id="Order_Emails_To" name="Order_Emails_To" required>{{ $data->Order_Emails_To}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order Emails BCC
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Order_Emails_BCC" class="form-control" name='Order_Emails_BCC' placeholder='Write some tags' value='{{ $data->Order_Emails_BCC}}'/>
                                        {{-- <textarea class="form-control" 
                                            id="Order_Emails_BCC" name="Order_Emails_BCC" required>{{ $data->Order_Emails_BCC}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Contact Us Emails To
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Contact_Us_Emails_To" class="form-control" name='Contact_Us_Emails_To' placeholder='Write some tags' value='{{ $data->Contact_Us_Emails_To}}'/>
                                        {{-- <textarea class="form-control" 
                                            id="Contact_Us_Emails_To" name="Contact_Us_Emails_To" required>{{ $data->Contact_Us_Emails_To}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Contact Us Emails BCC
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <input id="Contact_Us_Emails_BCC" class="form-control" name='Contact_Us_Emails_BCC' placeholder='Write some tags' value='{{ $data->Contact_Us_Emails_BCC}}'/>
                                        {{-- <textarea class="form-control" 
                                             id="Contact_Us_Emails_BCC"
                                            name="Contact_Us_Emails_BCC" required>{{ $data->Contact_Us_Emails_BCC}}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
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
    var objectB = new Object();
    var objectA = new Object();
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width:128,
          height:80,
          type:'square' //circle
        },
        boundary:{
          width:666,
          height:242
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
          var table_colum = objectA.id;
            $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){
            $.ajax({
                url:"{{ route('admin-store-cropimage') }}",
                type: "POST",
                data:{id:id,table_colum:table_colum,"image": response,"_token": "{{ csrf_token() }}"},
                success:function(data){  
                    $('#uploadimageModal').modal('hide');
                    objectB.children[1].value = data.Name;
                }
            });
            objectB.children[0].children[0].src = response;
            $('#uploadimageModal').modal('hide');
        })
      }); 
    });

 var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    debugger
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
    
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
		ClassicEditor.create( document.querySelector( '#ktckeditor5' ) )
        .then( editor => { window.CKEditor5 = editor;} )
		.catch( error => { console.error( error ); });
		ClassicEditor.create( document.querySelector( '#ktckeditor6' ) )
        .then( editor => { window.CKEditor6 = editor;} )
		.catch( error => { console.error( error ); });
		
		        // Class definition
    var KTTagify = function() {
        // Private functions
        var demo1 = function() {
            var input = document.getElementById('Order_Emails_From');
            var tagify = new Tagify(input, {
                pattern: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: transformTag,
                dropdown: {
                    enabled: 3,
                }
            });

            function transformTag(tagData) {
                var states = [
                    'success',
                    'primary',
                    'danger',
                    'success',
                    'warning',
                    'dark',
                    'primary',
                    'info'];

                tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

                if (tagData.value.toLowerCase() == 'shit') {
                    tagData.value = 's✲✲t'
                }
            }

            tagify.on('add', function(e) {
                console.log(e.detail)
            });

            tagify.on('invalid', function(e) {
                console.log(e, e.detail);
            });
        }
        var demo2 = function() {
            var input = document.getElementById('Order_Emails_To');
            var tagify = new Tagify(input, {
                pattern: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: transformTag,
                dropdown: {
                    enabled: 3,
                }
            });

            function transformTag(tagData) {
                var states = [
                    'success',
                    'primary',
                    'danger',
                    'success',
                    'warning',
                    'dark',
                    'primary',
                    'info'];

                tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

                if (tagData.value.toLowerCase() == 'shit') {
                    tagData.value = 's✲✲t'
                }
            }

            tagify.on('add', function(e) {
                console.log(e.detail)
            });

            tagify.on('invalid', function(e) {
                console.log(e, e.detail);
            });
        }
        var demo3 = function() {
            var input = document.getElementById('Order_Emails_BCC');
            var tagify = new Tagify(input, {
                pattern: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: transformTag,
                dropdown: {
                    enabled: 3,
                }
            });

            function transformTag(tagData) {
                var states = [
                    'success',
                    'primary',
                    'danger',
                    'success',
                    'warning',
                    'dark',
                    'primary',
                    'info'];

                tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

                if (tagData.value.toLowerCase() == 'shit') {
                    tagData.value = 's✲✲t'
                }
            }

            tagify.on('add', function(e) {
                console.log(e.detail)
            });

            tagify.on('invalid', function(e) {
                console.log(e, e.detail);
            });
        }
        var demo4 = function() {
            var input = document.getElementById('Contact_Us_Emails_To');
            var tagify = new Tagify(input, {
                pattern: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: transformTag,
                dropdown: {
                    enabled: 3,
                }
            });

            function transformTag(tagData) {
                var states = [
                    'success',
                    'primary',
                    'danger',
                    'success',
                    'warning',
                    'dark',
                    'primary',
                    'info'];

                tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

                if (tagData.value.toLowerCase() == 'shit') {
                    tagData.value = 's✲✲t'
                }
            }

            tagify.on('add', function(e) {
                console.log(e.detail)
            });

            tagify.on('invalid', function(e) {
                console.log(e, e.detail);
            });
        }
        var demo5 = function() {
            var input = document.getElementById('Contact_Us_Emails_BCC');
            var tagify = new Tagify(input, {
                pattern: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: transformTag,
                dropdown: {
                    enabled: 3,
                }
            });

            function transformTag(tagData) {
                var states = [
                    'success',
                    'primary',
                    'danger',
                    'success',
                    'warning',
                    'dark',
                    'primary',
                    'info'];

                tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

                if (tagData.value.toLowerCase() == 'shit') {
                    tagData.value = 's✲✲t'
                }
            }

            tagify.on('add', function(e) {
                console.log(e.detail)
            });

            tagify.on('invalid', function(e) {
                console.log(e, e.detail);
            });
        }


        return {
            // public functions
            init: function() {
                demo1();
                demo2();
                demo3();
                demo4();
                demo5();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTTagify.init();
    });
 </script>
@endpush