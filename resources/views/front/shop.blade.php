@extends('front.includes.container')
@section('content')
<!-- main start -->

<style>
    /* List View Styles */
    .list-view .list-grid-wrapper > div {
        width: 100%;
    }

    .list-view .list-grid-wrapper .product-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
    }

    .list-view .list-grid-wrapper .product-item__thumb {
        flex-shrink: 0;
        width: 200px;
        height: 120px;
    }

    .list-view .list-grid-wrapper .product-item__thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .list-view .list-grid-wrapper .product-item__content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .list-view .list-grid-wrapper .product-item__title {
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .list-view .list-grid-wrapper .product-item__info {
        margin-bottom: 10px;
    }

    .list-view .list-grid-wrapper .product-item__bottom {
        margin-top: auto;
    }

    /* Grid View (Default) */
    .list-grid-wrapper .product-item {
        height: auto;
        flex-direction: column;
    }

    .list-grid-wrapper .product-item__thumb {
        width: 100%;
        height: auto;
    }

    .list-grid-wrapper .product-item__content {
        width: 100%;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .list-view .list-grid-wrapper .product-item {
            flex-direction: column;
            text-align: center;
        }

        .list-view .list-grid-wrapper .product-item__thumb {
            width: 100%;
            height: 200px;
        }
    }

    /* Filter tab styles */
    .filter-tab {
        background: #fff;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .filter-form {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>

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


        <section class="breadcrumb breadcrumb-one padding-y-60 section-bg position-relative z-index-1 overflow-hidden">

            <img src="../assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">

            <img src="../assets/images/shapes/element-moon3.png" alt="" class="element one">
            <img src="../assets/images/shapes/element-moon1.png" alt="" class="element three">

            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="breadcrumb-one-content">
                            <h3 class="breadcrumb-one-content__title text-center mb-3 text-capitalize">58,000+ Slides available for purchase</h3>
                            <p class="breadcrumb-one-content__desc text-center text-black-three">Explore the best premium themes and plugins available for sale. Our unique collection is hand-curated by experts. Find and buy the perfect premium theme.</p>



                        </div>
                    </div>
                </div>
            </div>
        </section>



<section>
    <div class="container">
        <!-- Filter Form at Top -->
        <div class="row mb-4">
            <div class="col-12">
                <!-- Filter Tab -->
                <div class="filter-tab gap-3 flx-between mb-4">
                    <button type="button" class="filter-tab__button btn btn-outline-light pill d-flex align-items-center active">
                        <span class="icon icon-left">
                            <img src="{{ asset('assets/images/icons/filter.svg') }}" alt="">
                        </span>
                        <span class="font-18 fw-500">Filters</span>
                    </button>

                    <ul class="nav common-tab nav-pills mb-0 gap-lg-2 gap-1 ms-lg-auto" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="true">Newly Added</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestRating-tab" data-bs-toggle="pill" data-bs-target="#pills-bestRating" type="button" role="tab" aria-controls="pills-bestRating" aria-selected="false" tabindex="-1">Most Downloads</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false" tabindex="-1">Top Rated</button>
                        </li>
                    </ul>
                </div>

                <!-- Filter Form -->
                <form action="#" class="filter-form pb-4" style="display: block;">
                    <div class="row gy-3">
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="tag" class="form-label font-16">Tag</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five common-input--withLeftIcon" id="tag" placeholder="Search By Tag...">
                                <span class="input-icon input-icon--left"><img src="{{ asset('assets/images/icons/search-two.svg') }}" alt=""></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="Price" class="form-label font-16">Price</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five" id="Price" placeholder="$7 - $29">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="flx-between gap-1">
                                <label for="time" class="form-label font-16">Time Frame</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative select-has-icon">
                                <select id="time" class="common-input border-gray-five">
                                    <option value="1">Now</option>
                                    <option value="2">Yesterday</option>
                                    <option value="3">1 Month Ago</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Main Content Row -->
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

<script>
$(document).ready(function() {
    // Grid and List View Toggle
    $('.list-button').on('click', function() {
        $('body').addClass('list-view');
        $(this).addClass('active');
        $('.grid-button').removeClass('active');

        // Update column classes for list view
        $('.list-grid-wrapper > div').removeClass('col-xl-4 col-sm-6').addClass('col-12');
    });

    $('.grid-button').on('click', function() {
        $('body').removeClass('list-view');
        $('.list-button').removeClass('active');
        $(this).addClass('active');

        // Restore column classes for grid view
        $('.list-grid-wrapper > div').removeClass('col-12').addClass('col-xl-4 col-sm-6');
    });

    // Filter form toggle
    $('.filter-tab__button').on('click', function() {
        $('.filter-form').slideToggle();
        $(this).toggleClass('active');
    });

    // Clear filter buttons
    $('.filter-form button[type="reset"]').on('click', function() {
        $(this).closest('.col-sm-4, .col-xs-6').find('input, select').val('');
    });
});
</script>
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
