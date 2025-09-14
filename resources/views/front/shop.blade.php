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

    /* command for slide list view resposnive border spacces
     .list-grid-wrapper .product-item__thumb {
        width: 100%;
        height: auto;
    } */

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

    /* Prevent horizontal scroll issues * to command fro account info/
    /* .container, .container-two {
        overflow-x: hidden;
    } */

    /* Ensure tables don't cause horizontal scroll */
    table {
        width: 100%;
        max-width: 100%;
        table-layout: fixed;
        word-wrap: break-word;
    }

    /* Responsive table wrapper */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Ensure product grid doesn't overflow */
    .list-grid-wrapper {
        overflow: hidden;
    }

    /* Prevent download count text from breaking layout */
    .product-item__sales {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
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
                            <h3 class="breadcrumb-one-content__title text-center mb-3 text-capitalize">Create Powerful Presentations with ready made templates</h3>
                            <p class="breadcrumb-one-content__desc text-center text-black-three">Download ready-made, fully editable Power point slides and save hours  of design work. finish faster, present better.</p>



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
                <!-- Modern Filter & Sort Interface -->
                <div class="modern-filter-container mb-4">
                    <div class="row g-3 align-items-center">
                        <!-- Filter Button - Mobile First -->
                        <div class="col-12 col-md-auto">
                            <div class="filter-section">
                                <button type="button" class="modern-filter-btn" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false">
                                    <svg class="filter-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polygon points="22,3 2,3 10,12.46 10,19 14,21 14,12.46"></polygon>
                                    </svg>
                                    <span class="filter-text">Filters</span>
                                    {{-- <svg class="chevron-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6,9 12,15 18,9"></polyline>
                                    </svg> --}}
                                </button>
                            </div>
                        </div>

                        <!-- Sort Options - Mobile Dropdown -->
                        <div class="col-12 col-md-auto ms-md-auto">
                            <div class="sort-section">
                                <!-- Mobile Dropdown -->
                                <div class="mobile-sort d-md-none">
                                    <div class="custom-select-wrapper">
                                        <select class="form-select modern-select" id="mobileSortSelect">
                                            <option value="newest">Newly Added</option>
                                            <option value="downloads">Most Downloads</option>
                                            <option value="rated">Top Rated</option>
                                        </select>
                                        <div class="custom-arrow">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="6,9 12,15 18,9"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Desktop Tabs -->
                                <div class="desktop-sort d-none d-md-block">
                                    <div class="sort-tabs">
                                        <button class="sort-tab active" data-sort="newest" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="true">

                                            <span class="sort-text">Newly Added</span>
                                        </button>
                                        <button class="sort-tab" data-sort="downloads" id="pills-bestRating-tab" data-bs-toggle="pill" data-bs-target="#pills-bestRating" type="button" role="tab" aria-controls="pills-bestRating" aria-selected="false" tabindex="-1">

                                            <span class="sort-text">Most Downloads</span>
                                        </button>
                                        <button class="sort-tab" data-sort="rated" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false" tabindex="-1">

                                            <span class="sort-text">Top Rated</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Filter Panel -->
                    {{-- <div class="collapse filter-panel mt-3" id="filterCollapse">
                        <div class="card filter-card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="filter-title mb-3">🔍 Filter Products</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="form-label">Search by Tag</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.35-4.35"></path>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enter tag...">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="form-label">Price Range</label>
                                        <select class="form-select">
                                            <option>All Prices</option>
                                            <option>Under $10</option>
                                            <option>$10 - $25</option>
                                            <option>$25 - $50</option>
                                            <option>Over $50</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select">
                                            <option>All Categories</option>
                                            <option>Business</option>
                                            <option>Education</option>
                                            <option>Technology</option>
                                            <option>Creative</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="form-label">Rating</label>
                                        <select class="form-select">
                                            <option>All Ratings</option>
                                            <option>⭐⭐⭐⭐⭐ 5 Stars</option>
                                            <option>⭐⭐⭐⭐ 4+ Stars</option>
                                            <option>⭐⭐⭐ 3+ Stars</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="filter-actions">
                                            <button type="button" class="btn btn-outline-secondary btn-sm">Clear All</button>
                                            <button type="button" class="btn btn-primary btn-sm">Apply Filters</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- JavaScript for Modern Filter Interface -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Mobile sort dropdown functionality
                    const mobileSortSelect = document.getElementById('mobileSortSelect');
                    const desktopSortTabs = document.querySelectorAll('.sort-tab');

                    if (mobileSortSelect) {
                        mobileSortSelect.addEventListener('change', function() {
                            const selectedValue = this.value;
                            const targetTab = document.querySelector(`[data-sort="${selectedValue}"]`);

                            if (targetTab) {
                                // Remove active class from all tabs
                                desktopSortTabs.forEach(tab => tab.classList.remove('active'));

                                // Add active class to selected tab
                                targetTab.classList.add('active');

                                // Trigger click event on the tab
                                targetTab.click();
                            }
                        });
                    }

                    // Desktop sort tabs functionality
                    desktopSortTabs.forEach(tab => {
                        tab.addEventListener('click', function() {
                            // Remove active class from all tabs
                            desktopSortTabs.forEach(t => t.classList.remove('active'));

                            // Add active class to clicked tab
                            this.classList.add('active');

                            // Update mobile dropdown if it exists
                            if (mobileSortSelect) {
                                const sortValue = this.getAttribute('data-sort');
                                mobileSortSelect.value = sortValue;
                            }
                        });
                    });

                    // Filter panel toggle animation
                    const filterBtn = document.querySelector('.modern-filter-btn');
                    const filterPanel = document.getElementById('filterCollapse');

                    if (filterBtn && filterPanel) {
                        filterBtn.addEventListener('click', function() {
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';

                            // Add smooth animation class
                            if (!isExpanded) {
                                filterPanel.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                            }
                        });
                    }

                    // Filter form interactions
                    const filterInputs = document.querySelectorAll('.filter-card .form-control, .filter-card .form-select');
                    filterInputs.forEach(input => {
                        input.addEventListener('focus', function() {
                            this.parentElement.classList.add('focused');
                        });

                        input.addEventListener('blur', function() {
                            this.parentElement.classList.remove('focused');
                        });
                    });

                    // Clear all filters functionality
                    const clearBtn = document.querySelector('.filter-actions .btn-outline-secondary');
                    if (clearBtn) {
                        clearBtn.addEventListener('click', function() {
                            filterInputs.forEach(input => {
                                if (input.type === 'text') {
                                    input.value = '';
                                } else if (input.tagName === 'SELECT') {
                                    input.selectedIndex = 0;
                                }
                            });
                        });
                    }

                    // Apply filters functionality
                    const applyBtn = document.querySelector('.filter-actions .btn-primary');
                    if (applyBtn) {
                        applyBtn.addEventListener('click', function() {
                            // Add loading state
                            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Applying...';
                            this.disabled = true;

                            // Simulate filter application (replace with actual logic)
                            setTimeout(() => {
                                this.innerHTML = 'Apply Filters';
                                this.disabled = false;

                                // Close filter panel
                                if (filterPanel && filterPanel.classList.contains('show')) {
                                    filterBtn.click();
                                }
                            }, 1000);
                        });
                    }
                });
                </script>

                <!-- Filter Form -->
                {{-- <form action="#" class="filter-form pb-4" style="display: block;">
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
                </form> --}}
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

        // Handle Newly Added tab click
        $('#pills-product-tab').on('click', function() {
            sort = 'new';
            page = null;
            filter();
        });

        // Handle Most Downloads tab click
        $('#pills-bestRating-tab').on('click', function() {
            sort = 'most_downloads';
            page = null;
            filter();
        });

        // Handle Top Rated tab click
        $('#pills-trending-tab').on('click', function() {
            sort = 'top_rated';
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
