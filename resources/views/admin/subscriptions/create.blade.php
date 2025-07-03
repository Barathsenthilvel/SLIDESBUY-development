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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Subscription</h5>
                        <!--end::Page Title-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin-store') }}" class="text-muted"></a>
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
                                <h3 class="card-title">Create Plan</h3>
                            </div>
                            <!--begin::Form-->

                            <div class="alert alert-custom alert-success fade show" style="display: none;" role="alert">
                                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                <div class="alert-text">{{session('success')}}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>

                            <div class="alert alert-custom alert-danger fade show" style="display: none;" role="alert">
                                <div class="alert-icon"><i class="flaticon2-radial-warning"></i></div>
                                <div class="alert-text" id="error">{{session('error')}}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin-plan-store')}}" id="formCreate"
                                enctype="multipart/form-data" class="form">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Enter the Plan Name <span
                                                class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <input type="text" name="name" class="form-control" required
                                                placeholder="Enter a Plan Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Enter the Price <span
                                                class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <input type="text" name="price" class="form-control" required
                                                placeholder="Price"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Enter the Discount</label>
                                        <div class="col-3">
                                            <input type="text" name="discount" class="form-control" placeholder="Discount"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Select the Discount Type <span
                                                class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <select name="discount_type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="flat">Flat</option>
                                                <option value="percentage">Percentage</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Enter the Download Limit<span
                                                class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <input type="text" name="download_limit" class="form-control" required
                                                placeholder="Enter the Document download limit">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Enter the Validity (Days) <span
                                                class="text-danger">*</span></label>
                                        <div class="col-3">
                                            <input type="number" name="validity" class="form-control" required
                                                placeholder="Validity in days" min="1">
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
                        url: "{{ route('admin-store-cropimage') }}",
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
        ClassicEditor.create(document.querySelector('#ktckeditor5'))
            .then(editor => { window.CKEditor5 = editor; })
            .catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#ktckeditor6'))
            .then(editor => { window.CKEditor6 = editor; })
            .catch(error => { console.error(error); });

        // Class definition
        var KTTagify = function () {
            // Private functions
            var demo1 = function () {
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

                tagify.on('add', function (e) {
                    console.log(e.detail)
                });

                tagify.on('invalid', function (e) {
                    console.log(e, e.detail);
                });
            }
            var demo2 = function () {
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

                tagify.on('add', function (e) {
                    console.log(e.detail)
                });

                tagify.on('invalid', function (e) {
                    console.log(e, e.detail);
                });
            }
            var demo3 = function () {
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

                tagify.on('add', function (e) {
                    console.log(e.detail)
                });

                tagify.on('invalid', function (e) {
                    console.log(e, e.detail);
                });
            }
            var demo4 = function () {
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

                tagify.on('add', function (e) {
                    console.log(e.detail)
                });

                tagify.on('invalid', function (e) {
                    console.log(e, e.detail);
                });
            }
            var demo5 = function () {
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

                tagify.on('add', function (e) {
                    console.log(e.detail)
                });

                tagify.on('invalid', function (e) {
                    console.log(e, e.detail);
                });
            }


            return {
                // public functions
                init: function () {
                    demo1();
                    demo2();
                    demo3();
                    demo4();
                    demo5();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTTagify.init();
        });
    </script>
@endpush