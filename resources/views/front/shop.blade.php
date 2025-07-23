@extends('front.includes.container')
@section('content')
<!-- main start -->

<script>
    var min = parseInt('{{$min}}');
    var max = parseInt('{{$max}}') +1;
</script>
        {{-- <section class="banner-section">
            <div class="banner-inner">
                <div class="homeslider">
                    <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
                    <div class="pagetitle-wraper">
                        <div class="container">
                            <div class="pagetitle">Products</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="{{ route('front.index') }}">Home</a></li>

                                <li><a href="#">Products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
<section>
    <div class="container">
        <div class="row">
            {{-- Filter Sidebar --}}
        <div class="col-xl-3 col-lg-4">
                <!-- ===================== Filter Sidebar Start ============================= -->
<div class="filter-sidebar">
    <button type="button" class="filter-sidebar__close p-2 position-absolute end-0 top-0 z-index-1 text-body hover-text-main font-20 d-lg-none d-block"><i class="las la-times"></i></button>
    <div class="filter-sidebar__item">
        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Category</button>
        <div class="filter-sidebar__content">
            <ul class="filter-sidebar-list">
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        All Categories <span class="qty">25489</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Site Template <span class="qty">12,501</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        WordPress <span class="qty">1258</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        UI Template <span class="qty">1520</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Templates Kits <span class="qty">210</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        eCommerce <span class="qty">158</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Marketing <span class="qty">178</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        CMS Template <span class="qty">122</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Muse Themes <span class="qty">450</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Blogging <span class="qty">155</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Courses <span class="qty">125</span>
                    </a>
                </li>
                <li class="filter-sidebar-list__item">
                    <a href="" class="filter-sidebar-list__text">
                        Forums <span class="qty">35</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="filter-sidebar__item">
        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Rating</button>
        <div class="filter-sidebar__content" style="">
            <ul class="filter-sidebar-list">
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="veiwAll">
                            <label class="form-check-label" for="veiwAll"> View All</label>
                        </div>
                        <span class="qty">(1859)</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="oneStar">
                            <label class="form-check-label" for="oneStar"> 1 Star and above</label>
                        </div>
                        <span class="qty">(785)</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="twoStar">
                            <label class="form-check-label" for="twoStar"> 2 Star and above</label>
                        </div>
                        <span class="qty">(1250)</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="threeStar">
                            <label class="form-check-label" for="threeStar"> 3 Star and above</label>
                        </div>
                        <span class="qty">(7580)</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="fourStar">
                            <label class="form-check-label" for="fourStar"> 4 Star and above</label>
                        </div>
                        <span class="qty">(1450)</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="fiveStar">
                            <label class="form-check-label" for="fiveStar"> 5 Star Rating</label>
                        </div>
                        <span class="qty">(2530)</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="filter-sidebar__item">
        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Date Updated</button>
        <div class="filter-sidebar__content">
            <ul class="filter-sidebar-list">
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="anyDate">
                            <label class="form-check-label" for="anyDate"> Any Date</label>
                        </div>
                        <span class="qty"> 5,203</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="lastYear">
                            <label class="form-check-label" for="lastYear"> In the last year</label>
                        </div>
                        <span class="qty">1,258</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="lastMonth">
                            <label class="form-check-label" for="lastMonth"> In the last month</label>
                        </div>
                        <span class="qty">2450</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="LastWeek">
                            <label class="form-check-label" for="LastWeek"> In the last week</label>
                        </div>
                        <span class="qty">325</span>
                    </div>
                </li>
                <li class="filter-sidebar-list__item">
                    <div class="filter-sidebar-list__text">
                        <div class="common-check common-radio">
                            <input class="form-check-input" type="radio" name="radio" id="lastDay">
                            <label class="form-check-label" for="lastDay"> In the last day</label>
                        </div>
                        <span class="qty">745</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ===================== Filter Sidebar End ============================= -->
            </div>

            {{-- Product List Section --}}
            <div class="col-xl-9 col-lg-8 nopad sss2 productcontainer">
                

                <div id="renderproduct">
                    @include('front.product-list')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
<script src="static/js/jquery-ias.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script type="text/javascript">
// $('.filter-clean').hide(500);

        var cat = '{{!empty($cat)?$cat->id:null}}';
        var subcat ='{{!empty($subcat)?$subcat->id:null}}';
        var max1 = max;
        var min1 = min;
        var sort = null;
        var attribute = [];
        var page = null;

        $('.filter-clean').on('click',function (e){
            e.preventDefault();
            $slider.slider("values", 0, min);
		    $slider.slider("values", 1, max);
            max1 = max;
            min1 = min;
            sort = null;
            page = null;
            attribute.forEach(element => {console.log(element);$("#"+element).prop("checked", false);});
            attribute = [];
            filter();
            // $('.filter-clean').hide(500);
        });
        $('.Category').on('click', function (e) {
            e.preventDefault();
            cat = $(this).data('id');
            subcat = null;
            page = null;
            filter();
        });
        $('.sucategories').on('click', function (e) {
            e.preventDefault();
            cat = $(this).data('cat_id');
            subcat = $(this).data('id');
            page = null;
            filter();
        });
        $('#orderby').on('change',function(){
            sort = $(this).val();
            page = null;
            filter();
        });

        $('body').on('click','.page-link' ,function(e){
            e.preventDefault();
            $('html, body').animate({ scrollTop: $("body #renderproduct").offset().top}, 1000);
            var url = $(this).attr('href');
            page = url.split('page=')[1];
            filter();
        });
        $('input[name="attr[]"]').change(function(e){
            setTimeout(function() {
                    attribute = $('input[name="attr[]"]:checked').map(function(){
                    return $(this).data('id');
                }).get();
                page = null;
                filter();
            },10);
        });

        var $slider = $("#slider-range").slider({
				range: true,
				orientation: "horizontal",
				min: min,
				max: max,
				values: [min, max],
				step: 1,

				slide: function (event, ui) {
					if (ui.values[0] == ui.values[1]) {
						return false;
					}
					$("#min_price").val(ui.values[0]);
					$("#max_price").val(ui.values[1]);

				},
				stop: function (event, ui) {
                    min1 = ui.values[0];
                    max1 = ui.values[1];
                    page = null;
					filter();
				}
			});

            $("#min_price").val($("#slider-range").slider("values", 0));
			$("#max_price").val($("#slider-range").slider("values", 1));

        function filter() {
            var selectfilter ='';
            var url = '{{route('front.filter')}}';
            if(cat != null){
                url += '/'+cat;
                if(subcat != null){
                    url += '/'+subcat;
                }
            }
            url += '?min='+min1+'&max='+max1;
            if(sort != null){
                url += '&sort='+sort;
            }
            if(attribute.length >= 1){
                url += '&attribute='+attribute.join('|').replace(/\s+/g, '*');
            }
            if(page != null){
                url += '&page='+page;
            }
            $('#renderproduct').load(url);
            // filter actions...
            if(attribute.length < 1 && min1 == min && max1 == max){
                // $('.filter-clean').hide(500);
            }else{
                // $('.filter-clean').show(500);
            }

            if(max1 != max || min1 != min){
                selectfilter += `<li>
							<span class="selected-filter" onclick="removeprice()">
								<span>${max1} - ${min1}</span><span class="select-close">×</span>
							</span>
						</li>`;
            }
            for (let i = 0; i < attribute.length; i++) {
                var attr = attribute[i].split('-');
            selectfilter += `<li>
							<span class="selected-filter" onclick="removeselect('${attribute[i]}')">
								<span>${attr[1]}</span><span class="select-close">×</span>
							</span>
						</li>`;
            }
            // $("body .selectfilter").html(selectfilter);
        }
        function removeprice(){
            $slider.slider("values", 0, min);
		    $slider.slider("values", 1, max);
            max1 = max;
            min1 = min;
            filter();
        }
        function removeselect(att){
            var attnew = [];
            for (let i = 0; i < attribute.length; i++) {
                if(attribute[i] != att){
                    attnew.push(attribute[i]);
                }else{
                    $("input[data-id='"+attribute[i]+"']").prop("checked", false);
                    // $("#"+attribute[i]).prop("checked", false);
                }
            }
            attribute = attnew;
            filter();
        }
    </script>
@endpush
