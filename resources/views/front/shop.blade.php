@extends('front.includes.container')
@section('content')
<!-- main start -->

<style>
    /* Filter Panel - Mobile Only */
    @media (min-width: 768px) {
        #filterCollapse {
            display: none !important;
        }
        #filterCollapse.collapse {
            display: none !important;
        }
        #filterCollapse.show {
            display: none !important;
        }
    }

    @media (max-width: 767px) {
        #filterCollapse {
            display: none;
        }
        #filterCollapse.show {
            display: block;
        }
    }

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

    /* Search Results Header */
    .search-results-header {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #007bff;
    }

    /* Clear Filters Button */
    .clear-filters-btn {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    /* Filter Form Styles */
    .filter-sidebar-list__text.cursor-pointer {
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        padding: 8px 0;
        text-align: left;
    }

    .filter-sidebar-list__text input[type="checkbox"],
    .filter-sidebar-list__text input[type="radio"] {
        margin-right: 8px;
    }

    /* Fix rating and attributes filter text alignment */
    .filter-sidebar-list__text {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        text-align: left;
        width: 100%;
        padding: 8px 0;
    }

    .filter-sidebar-list__text .common-check {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        text-align: left;
    }

    .filter-sidebar-list__text .form-check-label {
        margin-left: 8px;
        text-align: left;
    }

    .filter-sidebar-list__text .qty {
        color: #666;
        font-size: 0.9rem;
    }

    /* Active Filters Display */
    .active-filters {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }

    .active-filters .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
    }

    .active-filters .btn-close {
        font-size: 0.7rem;
        padding: 0.25rem;
    }

    /* Loading State */
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    input[type="radio"] {


      /* Set dimensions */
      width: 18px;
      height: 18px;

      cursor: pointer;
    }

    /* Modern Mobile-Responsive Filter Styles */
    .modern-filter-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .modern-filter-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .modern-filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .filter-icon {
        width: 20px;
        height: 20px;
    }

    .filter-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .filter-section-title {
        color: #2d3748;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
    }

    .filter-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .filter-option {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 16px;
        transition: all 0.3s ease;
        cursor: pointer;
        margin: 0;
    }

    .filter-option:hover {
        background: #edf2f7;
        border-color: #cbd5e0;
        transform: translateY(-1px);
    }

    .filter-option .form-check-input {
        margin-right: 12px;
        margin-top: 0;
        width: 18px;
        height: 18px;
    }

    .filter-option .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
    }

    .filter-option .form-check-label {
        cursor: pointer;
        font-weight: 500;
        color: #4a5568;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .attribute-group {
        background: #f7fafc;
        border-radius: 8px;
        padding: 1rem;
        border-left: 4px solid #667eea;
    }

    .attribute-title {
        color: #2d3748;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .active-filters {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 8px;
        padding: 1rem;
    }

    .filter-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .filter-tag {
        background: #667eea;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .filter-tag .remove-tag {
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 12px;
    }

    .filter-actions {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #e2e8f0;
    }

    .filter-actions .btn {
        border-radius: 8px;
        font-weight: 600;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .filter-actions .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .filter-actions .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    /* Mobile Responsive Design */
    @media (max-width: 768px) {
        .modern-filter-container {
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        .modern-filter-btn {
            width: 100%;
            justify-content: center;
            padding: 14px 20px;
            font-size: 1rem;
        }

        .filter-options {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .filter-option {
            padding: 10px 14px;
        }

        .filter-section-title {
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }

        .filter-actions {
            flex-direction: column;
            gap: 0.75rem;
        }

        .filter-actions .btn {
            width: 100%;
            padding: 14px 20px;
        }

        .attribute-group {
            padding: 0.75rem;
        }

        .filter-tags {
            gap: 0.25rem;
        }

        .filter-tag {
            font-size: 0.8rem;
            padding: 4px 8px;
        }
    }

    @media (max-width: 576px) {
        .modern-filter-container {
            padding: 0.5rem;
            border-radius: 8px;
        }

        .filter-card .card-body {
            padding: 1rem;
        }

        .filter-option {
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        .filter-option .form-check-label {
            font-size: 0.9rem;
        }

        .badge {
            font-size: 0.7rem;
            padding: 0.25em 0.5em;
        }
    }

    /* Sort Tabs Mobile Design */
    .sort-tabs {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .sort-tab {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        color: #4a5568;
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .sort-tab:hover {
        background: #edf2f7;
        border-color: #cbd5e0;
        color: #2d3748;
    }

    .sort-tab.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    @media (max-width: 768px) {
        .sort-tabs {
            display: none;
        }

        .mobile-sort {
            display: block !important;
        }
    }

    @media (min-width: 769px) {
        .mobile-sort {
            display: none !important;
        }
    }

    .custom-select-wrapper {
        position: relative;
    }

    .modern-select {
        appearance: none;
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 40px 12px 16px;
        font-weight: 500;
        color: #4a5568;
        transition: all 0.3s ease;
        width: 100%;
    }

    .modern-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .custom-arrow {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #4a5568;
    }

    /* Loading States */
    .filter-loading {
        opacity: 0.6;
        pointer-events: none;
    }

    .filter-loading .btn {
        position: relative;
    }

    .filter-loading .btn::after {
        content: '';
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

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Animation for filter panel */
    .filter-panel.collapsing {
        transition: height 0.3s ease;
    }

    .filter-panel.show {
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Enhanced Search Results Header */
    .search-results-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 4px solid #007bff;
    }

    .search-title {
        color: #2d3748;
        font-weight: 600;
        font-size: 1.25rem;
    }

    .search-count {
        font-size: 1rem;
        font-weight: 500;
    }

    .search-actions .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .search-actions .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Mobile Responsive Design */
    @media (max-width: 768px) {
        .search-results-header {
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-title {
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
        }

        .search-count {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .search-actions .btn {
            width: 100%;
            padding: 10px 20px;
        }
    }

    @media (max-width: 576px) {
        .search-results-header {
            padding: 0.75rem;
            border-radius: 8px;
        }

        .search-title {
            font-size: 1rem;
            line-height: 1.4;
        }

        .search-count {
            font-size: 0.85rem;
        }
    }

    /* Enhanced Category Badge Styling */
    .filter-option .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        border-radius: 12px;
        font-weight: 600;
    }

    .filter-option .badge.bg-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
        color: white;
    }

    /* Mobile Category Count Visibility */
    @media (max-width: 768px) {
        .filter-option .badge {
            font-size: 0.7rem;
            padding: 0.25em 0.5em;
            min-width: 24px;
            text-align: center;
        }

        .filter-option .form-check-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
    }
</style>

{{-- <script>
    var min = parseInt('{{$min}}');
    var max = parseInt('{{$max}}') +1;
</script> --}}
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

                            @if(isset($query) && !empty($query))
                            <!-- Search Results Header -->
                            <div class="search-results-header text-center mb-4 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                                        <h4 class="search-title mb-2 fs-5 fs-md-4">
                                            <i class="fas fa-search me-2"></i>Search Results for:
                                            <strong class="text-primary d-block d-sm-inline">"{{ $query }}"</strong>
                                        </h4>
                                        <p class="search-count text-muted mb-3 fs-6">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            @php
                                                $totalResults = 0;
                                                if (is_object($products) && method_exists($products, 'total')) {
                                                    $totalResults = $products->total();
                                                } elseif (is_array($products)) {
                                                    $totalResults = count($products);
                                                } elseif (is_object($products) && method_exists($products, 'count')) {
                                                    $totalResults = $products->count();
                                                }
                                            @endphp
                                            <span class="result-count">{{ $totalResults }}</span> results found
                                            {{-- @if($totalResults > 0)
                                                <span class="text-success ms-2">
                                                    <i class="fas fa-check-circle me-1"></i>Showing {{ min(12, $totalResults) }} per page
                                                </span>
                                            @endif --}}
                                        </p>
                                        <div class="search-actions">
                                            <a href="{{ route('front.getCategory') }}" class="btn btn-outline-secondary btn-sm">
                                                <i class="fas fa-arrow-left me-1"></i> Back to All Products
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif


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
                                            <option value="popular">Most Downloads</option>
                                            <option value="rating">Top Rated</option>
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
                                        <button class="sort-tab" data-sort="popular" id="pills-bestRating-tab" data-bs-toggle="pill" data-bs-target="#pills-bestRating" type="button" role="tab" aria-controls="pills-bestRating" aria-selected="false" tabindex="-1">

                                            <span class="sort-text">Most Downloads</span>
                                        </button>
                                        <button class="sort-tab" data-sort="rating" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false" tabindex="-1">

                                            <span class="sort-text">Top Rated</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Panel - Mobile Only -->
                    <div class="collapse filter-panel mt-3 d-md-none" id="filterCollapse">
                        <div class="card filter-card">
                            <div class="card-body">


                                <!-- Active Filters Display -->
                                <div id="activeFilters" class="active-filters mb-3" >
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="mb-0">Active Filters</h6>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearAllFilters()">Clear All</button>
                                    </div>
                                    <div id="filterTags" class="filter-tags">
                                        <!-- Active filter tags will be displayed here -->
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <!-- Categories Filter -->
                                    <div class="col-12">
                                        <h6 class="filter-section-title">
                                            <i class="fas fa-th-large me-2"></i>Categories
                                        </h6>
                                        <div class="filter-options">
                                            @php
                                                // Safely handle allCategories - ensure it's always a collection
                                                $categories = collect();
                                                if (isset($allCategories)) {
                                                    if (is_array($allCategories)) {
                                                        $categories = collect($allCategories);
                                                    } elseif (is_object($allCategories) && method_exists($allCategories, 'count')) {
                                                        $categories = $allCategories;
                                                    }
                                                }
                                            @endphp
                                            @if($categories->count() > 0)
                                                @php
                                                    // Pre-calculate category counts for better performance
                                                    $categoryCounts = [];
                                                    if (isset($products) && $products) {
                                                        foreach ($products as $product) {
                                                            if ($product->category) {
                                                                $categoryIds = explode('|', $product->category);
                                                                foreach ($categoryIds as $catId) {
                                                                    $categoryCounts[$catId] = ($categoryCounts[$catId] ?? 0) + 1;
                                                                }
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                @foreach($categories->take(8) as $category)
                                                    <div class="form-check filter-option">
                                                        <input class="form-check-input" type="checkbox" name="category" value="{{ $category->id }}"
                                                               id="category_{{ $category->id }}"
                                                               {{ in_array($category->id, $categoryFilter ?? []) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                                            <span class="category-name">{{ $category->category_name }}</span>
                                                            <span class="badge bg-primary ms-2 category-count" data-category-id="{{ $category->id }}">
                                                                {{ $categoryCounts[$category->id] ?? 0 }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @if($categories->count() > 8)
                                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="toggleMoreCategories()">
                                                        Show More <i class="fas fa-chevron-down ms-1"></i>
                                                    </button>
                                                    <div id="moreCategories" class="mt-2" style="display: none;">
                                                        @foreach($categories->skip(8) as $category)
                                                            <div class="form-check filter-option">
                                                                <input class="form-check-input" type="checkbox" name="category" value="{{ $category->id }}"
                                                                       id="category_{{ $category->id }}"
                                                                       {{ in_array($category->id, $categoryFilter ?? []) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="category_{{ $category->id }}">
                                                                    {{ $category->category_name }}
                                                                    <span class="badge bg-light text-dark ms-2">{{ $category->products_count ?? 0 }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Price Type Filter -->
                                    <div class="col-12">
                                        <h6 class="filter-section-title">
                                            <i class="fas fa-tag me-2"></i>Price Type
                                        </h6>
                                        <div class="filter-options">
                                            <div class="form-check filter-option">
                                                <input class="form-check-input" type="radio" name="price_type" value=""
                                                       {{ empty($priceTypeFilter) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    <span class="badge bg-secondary me-2">All</span> All Type
                                                </label>
                                            </div>
                                            <div class="form-check filter-option">
                                                <input class="form-check-input" type="radio" name="price_type" value="free"
                                                       {{ $priceTypeFilter == 'free' ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    <span class="badge bg-success me-2">Free</span> Free
                                                </label>
                                            </div>
                                            <div class="form-check filter-option">
                                                <input class="form-check-input" type="radio" name="price_type" value="paid"
                                                       {{ $priceTypeFilter == 'paid' ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    <span class="badge bg-primary me-2">Paid</span> Paid
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tags Filter -->
                                    @php
                                        // Safely handle allTags - ensure it's always a collection
                                        $tags = collect();
                                        if (isset($allTags)) {
                                            if (is_array($allTags)) {
                                                $tags = collect($allTags);
                                            } elseif (is_object($allTags) && method_exists($allTags, 'count')) {
                                                $tags = $allTags;
                                            }
                                        }
                                    @endphp
                                    {{-- @if($tags->count() > 0)
                                    <div class="col-12">
                                        <h6 class="filter-section-title">
                                            <i class="fas fa-hashtag me-2"></i>Popular Tags
                                        </h6>
                                        <div class="filter-options">
                                            @foreach($tags->take(10) as $tag)
                                                <div class="form-check filter-option">
                                                    <input class="form-check-input" type="radio" name="tag" value="{{ $tag }}"
                                                           id="tag_{{ $loop->index }}"
                                                           {{ $tagFilter == $tag ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="tag_{{ $loop->index }}">
                                                        #{{ $tag }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif --}}

                                    <!-- Attributes Filter -->
                                    @php
                                        // Safely handle allAttributes - ensure it's always a collection
                                        $attributes = collect();
                                        if (isset($allAttributes)) {
                                            if (is_array($allAttributes)) {
                                                $attributes = collect($allAttributes);
                                            } elseif (is_object($allAttributes) && method_exists($allAttributes, 'count')) {
                                                $attributes = $allAttributes;
                                            }
                                        }
                                    @endphp
                                    @if($attributes->count() > 0)
                                    <div class="col-12">
                                        <h6 class="filter-section-title">
                                            <i class="fas fa-list me-2"></i>Attributes
                                        </h6>
                                        <div class="filter-options">
                                            @foreach($attributes->take(6) as $attribute)
                                                @if(isset($attribute->parsed_values) && count($attribute->parsed_values) > 0)
                                                    <div class="attribute-group mb-3">
                                                        <h6 class="attribute-title">{{ $attribute->attribute_name }}</h6>
                                                        @foreach(collect($attribute->parsed_values)->take(4) as $value)
                                                            <div class="form-check filter-option">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="attribute_value[]"
                                                                       value="{{ $attribute->id }}-{{ $value }}"
                                                                       id="attr_{{ $attribute->id }}_{{ $loop->index }}"
                                                                       {{ in_array($attribute->id . '-' . $value, $attributeFilter ?? []) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="attr_{{ $attribute->id }}_{{ $loop->index }}">
                                                                    {{ $value }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Filter Actions -->
                                    <div class="col-12">
                                        <div class="filter-actions d-flex gap-2">
                                            <button type="button" class="btn  flex-fill" onclick="clearAllFilters()" style="background-color: black">
                                                <i class="fas fa-times me-1"></i> Clear All
                                            </button>
                                            <button type="button" class="btn btn-primary flex-fill" onclick="applyFilters()">
                                                <i class="fas fa-filter me-1"></i> Apply Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <!-- Active Filters Display -->
        <div class="active-filters mb-4" id="activeFilters" style="display: none;">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <span class="fw-600">Active Filters:</span>
                <div id="filterTags"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearAllFilters()">
                    <i class="fas fa-times"></i> Clear All
                </button>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            {{-- Filter Sidebar --}}
            <div class="col-xl-3 col-lg-4">
                <!-- ===================== Filter Sidebar Start ============================= -->
                <div class="filter-sidebar">
                    <button type="button" class="filter-sidebar__close p-2 position-absolute end-0 top-0 z-index-1 text-body hover-text-main font-20 d-lg-none d-block"><i class="las la-times"></i></button>

                    <!-- Clear All Filters Button -->
                    <div class="clear-filters-btn mb-3">
                        <a href="{{ route('front.search.products') }}" class="btn  btn-sm w-100" style="background-color: #000; color: #fff;">
                            <i class="fas fa-times"></i> Clear All Filters
                        </a>
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Category</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <label class="filter-sidebar-list__text cursor-pointer">
                                        <input type="checkbox" name="category" value=""
                                               {{ empty($categoryFilter) ? 'checked' : '' }}>
                                        All Categories <span class="qty">{{ (is_object($products) && method_exists($products, 'total')) ? $products->total() : (is_array($products) ? count($products) : 0) }}</span>
                                    </label>
                                </li>
                                @php
                                    // Safely handle allCategories for sidebar
                                    $sidebarCategories = collect();
                                    if (isset($allCategories)) {
                                        if (is_array($allCategories)) {
                                            $sidebarCategories = collect($allCategories);
                                        } elseif (is_object($allCategories) && method_exists($allCategories, 'count')) {
                                            $sidebarCategories = $allCategories;
                                        }
                                    }
                                @endphp
                                @if($sidebarCategories->count() > 0)
                                    @foreach($sidebarCategories->take(15) as $category)
                                        @php
                                            // Count products in this category
                                            $categoryCount = 0;
                                            if(isset($products)) {
                                                foreach($products as $product) {
                                                    if($product->category && strpos($product->category, (string)$category->id) !== false) {
                                                        $categoryCount++;
                                                    }
                                                }
                                            }
                                        @endphp
                                        <li class="filter-sidebar-list__item">
                                            <label class="filter-sidebar-list__text cursor-pointer">
                                                <input type="checkbox" name="category" value="{{ $category->id }}"
                                                       {{ in_array($category->id, $categoryFilter ?? []) ? 'checked' : '' }}>
                                                {{ $category->category_name }} <span class="qty">({{ $categoryCount }})</span>
                                            </label>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Tags Filter -->
                    {{-- @if(isset($allTags) && $allTags->count() > 0)
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Tags</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <label class="filter-sidebar-list__text cursor-pointer">
                                        <input type="radio" name="tag" value=""
                                               {{ empty($tagFilter) ? 'checked' : '' }}>
                                        All Tags
                                    </label>
                                </li>
                                @php
                                    // Safely handle allTags for sidebar
                                    $sidebarTags = collect();
                                    if (isset($allTags)) {
                                        if (is_array($allTags)) {
                                            $sidebarTags = collect($allTags);
                                        } elseif (is_object($allTags) && method_exists($allTags, 'count')) {
                                            $sidebarTags = $allTags;
                                        }
                                    }
                                @endphp
                                @foreach($sidebarTags->take(10) as $tag)
                                    <li class="filter-sidebar-list__item">
                                        <label class="filter-sidebar-list__text cursor-pointer">
                                            <input type="radio" name="tag" value="{{ $tag }}"
                                                   {{ $tagFilter == $tag ? 'checked' : '' }}>
                                            {{ $tag }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif --}}

                    <!-- Price Type Filter (Free/Paid) -->
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Price Type</button>
                        <div class="filter-sidebar__content">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <label class="filter-sidebar-list__text cursor-pointer">
                                        <input type="radio" name="price_type" value=""
                                               {{ empty($priceTypeFilter) ? 'checked' : '' }}>
                                        All Type
                                    </label>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <label class="filter-sidebar-list__text cursor-pointer">
                                        <input type="radio" name="price_type" value="free"
                                               {{ $priceTypeFilter == 'free' ? 'checked' : '' }}>
                                        <span class="badge bg-success me-2">Free</span> Free
                                    </label>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <label class="filter-sidebar-list__text cursor-pointer">
                                        <input type="radio" name="price_type" value="paid"
                                               {{ $priceTypeFilter == 'paid' ? 'checked' : '' }}>
                                        <span class="badge bg-primary me-2">Paid</span> Paid
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Attributes Filter -->
                    @php
                        // Safely handle allAttributes for sidebar
                        $sidebarAttributes = collect();
                        if (isset($allAttributes)) {
                            if (is_array($allAttributes)) {
                                $sidebarAttributes = collect($allAttributes);
                            } elseif (is_object($allAttributes) && method_exists($allAttributes, 'count')) {
                                $sidebarAttributes = $allAttributes;
                            }
                        }
                    @endphp
                    @if($sidebarAttributes->count() > 0)
                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Attributes</button>
                        <div class="filter-sidebar__content">
                            @foreach($sidebarAttributes as $attribute)
                                @if(isset($attribute->parsed_values) && count($attribute->parsed_values) > 0)
                                    <div class="mb-3">
                                        <h6 class="font-14 fw-600 mb-2">{{ $attribute->attribute_name }}</h6>
                                        <ul class="filter-sidebar-list">
                                            @foreach($attribute->parsed_values as $value)
                                                <li class="filter-sidebar-list__item">
                                                    <label class="filter-sidebar-list__text cursor-pointer">
                                                        <input type="checkbox" name="attribute_value[]" value="{{ $attribute->id }}-{{ $value }}"
                                                               {{ in_array($attribute->id . '-' . $value, $attributeFilter ?? []) ? 'checked' : '' }}>
                                                        {{ $value }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif


                    <div class="filter-sidebar__item">
                        <button type="button" class="filter-sidebar__button font-16 text-capitalize fw-500">Rating</button>
                        <div class="filter-sidebar__content" style="">
                            <ul class="filter-sidebar-list">
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            {{-- <input class="form-check-input" type="radio" name="radio" id="veiwAll">
                                            <label class="form-check-label" for="veiwAll"> View All</label> --}}

                                            <input class="form-check-input" type="radio" name="radio" id="veiwAll">
                                            <label class="" for="veiwAll"> View All</label>
                                        </div>
                                        <span class="qty">(0)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="oneStar">
                                            <label class="" for="oneStar"> 1 Star and above</label>
                                        </div>
                                        <span class="qty">(0)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="twoStar">
                                            <label class="" for="twoStar"> 2 Star and above</label>
                                        </div>
                                        <span class="qty">(0)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="threeStar">
                                            <label class="" for="threeStar"> 3 Star and above</label>
                                        </div>
                                        <span class="qty">(0)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="fourStar">
                                            <label class="" for="fourStar"> 4 Star and above</label>
                                        </div>
                                        <span class="qty">(0)</span>
                                    </div>
                                </li>
                                <li class="filter-sidebar-list__item">
                                    <div class="filter-sidebar-list__text">
                                        <div class="common-check common-radio">
                                            <input class="form-check-input" type="radio" name="radio" id="fiveStar">
                                            <label class="" for="fiveStar"> 5 Star Rating</label>
                                        </div>
                                        <span class="qty">(0)</span>
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
    // Initialize AJAX filtering system
    initializeAjaxFiltering();

    // Update search header on page load
    const query = getUrlParameter('q');
    if (query) {
        updateSearchHeader(query);
    }

    // Grid and List View Toggle
    $('.list-button').on('click', function() {
        $('body').addClass('list-view');
        $(this).addClass('active');
        $('.grid-button').removeClass('active');
        $('.list-grid-wrapper > div').removeClass('col-xl-4 col-sm-6').addClass('col-12');
    });

    $('.grid-button').on('click', function() {
        $('body').removeClass('list-view');
        $('.list-button').removeClass('active');
        $(this).addClass('active');
        $('.list-grid-wrapper > div').removeClass('col-12').addClass('col-xl-4 col-sm-6');
    });

    // Sort tabs functionality
    $('.sort-tab').on('click', function() {
        $('.sort-tab').removeClass('active');
        $(this).addClass('active');
        applyFilters();
    });

    // Mobile sort dropdown
    $('#mobileSortSelect').on('change', function() {
        const sortValue = $(this).val();
        $('.sort-tab').removeClass('active');
        $(`[data-sort="${sortValue}"]`).addClass('active');
        applyFilters();
    });
});

// AJAX Filtering Functions
function initializeAjaxFiltering() {
    // Remove form submissions and replace with AJAX
    $('form').off('submit').on('submit', function(e) {
        e.preventDefault();
        applyFilters();
    });

    // Replace onchange with AJAX calls
    $('input[type="checkbox"], input[type="radio"]').off('change').on('change', function() {
        applyFilters();
    });
}

function applyFilters() {
    const query = getUrlParameter('q') || '';
    const categories = getSelectedCategories();
    const tags = getSelectedTags();
    const attributes = getSelectedAttributes();
    const priceType = getSelectedPriceType();
    const sort = getSelectedSort();

    // Show loading state
    showLoadingState();

    // Build AJAX URL
    let url = '{{ route("front.search.products") }}?';
    if (query) url += 'q=' + encodeURIComponent(query) + '&';
    if (categories.length) url += 'category=' + categories.join(',') + '&';
    if (tags) url += 'tag=' + encodeURIComponent(tags) + '&';
    if (attributes.length) url += 'attribute_value=' + attributes.join(',') + '&';
    if (priceType) url += 'price_type=' + encodeURIComponent(priceType) + '&';
    if (sort) url += 'sort=' + sort + '&';

    // Remove trailing &
    url = url.replace(/&$/, '');

    // Make AJAX request
    $.ajax({
        url: url,
        type: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(response) {
            $('#renderproduct').html(response);
            updateActiveFilters();
            updateSearchHeader(query);
            hideLoadingState();
        },
        error: function(xhr, status, error) {
            hideLoadingState();
            console.error('Filter error:', error);
            alert('Error loading products. Please try again.');
        }
    });
}

function getSelectedCategories() {
    const categories = [];
    $('input[name="category"]:checked').each(function() {
        if ($(this).val()) {
            categories.push($(this).val());
        }
    });
    return categories;
}

function getSelectedTags() {
    return $('input[name="tag"]:checked').val() || '';
}

function getSelectedAttributes() {
    const attributes = [];
    $('input[name="attribute_value[]"]:checked').each(function() {
        if ($(this).val()) {
            attributes.push($(this).val());
        }
    });
    return attributes;
}

function getSelectedPriceType() {
    return $('input[name="price_type"]:checked').val() || '';
}

function getSelectedSort() {
    return $('.sort-tab.active').data('sort') || 'newest';
}

function updateActiveFilters() {
    const activeFilters = [];

    // Add category filters
    $('input[name="category"]:checked').each(function() {
        if ($(this).val()) {
            const categoryName = $(this).closest('label').text().trim().split(' ')[0];
            activeFilters.push({
                type: 'category',
                value: $(this).val(),
                label: categoryName,
                element: $(this)
            });
        }
    });

    // Add tag filters
    const selectedTag = $('input[name="tag"]:checked').val();
    if (selectedTag) {
        activeFilters.push({
            type: 'tag',
            value: selectedTag,
            label: selectedTag,
            element: $('input[name="tag"]:checked')
        });
    }

    // Add attribute filters
    $('input[name="attribute_value[]"]:checked').each(function() {
        const label = $(this).closest('label').text().trim();
        activeFilters.push({
            type: 'attribute',
            value: $(this).val(),
            label: label,
            element: $(this)
        });
    });

    // Add price type filter
    const selectedPriceType = $('input[name="price_type"]:checked').val();
    if (selectedPriceType) {
        const label = selectedPriceType === 'free' ? 'Free Products' : 'Paid Products';
        activeFilters.push({
            type: 'price_type',
            value: selectedPriceType,
            label: label,
            element: $('input[name="price_type"]:checked')
        });
    }

    // Update active filters display
    displayActiveFilters(activeFilters);
}

function displayActiveFilters(filters) {
    const filterTags = $('#filterTags');
    const activeFiltersDiv = $('#activeFilters');

    if (filters.length === 0) {
        activeFiltersDiv.hide();
        return;
    }

    activeFiltersDiv.show();
    filterTags.empty();

    filters.forEach(function(filter) {
        const tag = $(`
            <span class="badge bg-primary me-2 mb-2 d-inline-flex align-items-center">
                ${filter.label}
                <button type="button" class="btn-close btn-close-white ms-2" onclick="removeFilter('${filter.type}', '${filter.value}')"></button>
            </span>
        `);
        filterTags.append(tag);
    });
}

function removeFilter(type, value) {
    if (type === 'category') {
        $('input[name="category"][value="' + value + '"]').prop('checked', false);
    } else if (type === 'tag') {
        $('input[name="tag"][value="' + value + '"]').prop('checked', false);
    } else if (type === 'attribute') {
        $('input[name="attribute_value[]"][value="' + value + '"]').prop('checked', false);
    } else if (type === 'price_type') {
        $('input[name="price_type"][value=""]').prop('checked', true);
    }

    applyFilters();
}

function clearAllFilters() {
    $('input[type="checkbox"], input[type="radio"]').prop('checked', false);
    $('input[name="category"][value=""]').prop('checked', true);
    $('input[name="tag"][value=""]').prop('checked', true);
    $('input[name="price_type"][value=""]').prop('checked', true);
    $('input[name="attribute_value[]"]').prop('checked', false);
    $('.sort-tab[data-sort="newest"]').addClass('active').siblings().removeClass('active');
    applyFilters();
}

function showLoadingState() {
    $('#renderproduct').html('<div class="text-center p-4"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');
}

function hideLoadingState() {
    // Loading state is automatically replaced when AJAX completes
}

// function updateSearchHeader(query) {
//     const searchHeader = $('.breadcrumb-one-content').find('.search-results-header');

//     if (query && query.trim() !== '') {
//         // Show search header
//         if (searchHeader.length === 0) {
//             const searchHeaderHtml = `
//                 <div class="search-results-header text-center mb-4">
//                     <div class="container">
//                         <div class="row justify-content-center">
//                             <div class="col-12 col-md-8 col-lg-6">
//                                 <h4 class="search-title mb-2">
//                                     <i class="fas fa-search me-2"></i>Search Results for:
//                                     <strong class="text-primary">"${query}"</strong>
//                                 </h4>
//                                 <p class="search-count text-muted mb-3">
//                                     <i class="fas fa-chart-bar me-1"></i>
//                                     <span id="searchResultCount">Loading...</span> results found
//                                 </p>
//                                 <div class="search-actions">
//                                     <a href="{{ route('front.getCategory') }}" class="btn btn-outline-secondary btn-sm">
//                                         <i class="fas fa-arrow-left me-1"></i> Back to All Products
//                                     </a>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             `;
//             $('.breadcrumb-one-content').append(searchHeaderHtml);
//         } else {
//             // Update existing search header
//             searchHeader.find('.search-title strong').text(`"${query}"`);
//         }
//     } else {
//         // Hide search header if no query
//         searchHeader.remove();
//     }
// }

function toggleMoreCategories() {
    const moreCategories = $('#moreCategories');
    const button = $('button[onclick="toggleMoreCategories()"]');

    if (moreCategories.is(':visible')) {
        moreCategories.slideUp(300);
        button.html('Show More <i class="fas fa-chevron-down ms-1"></i>');
    } else {
        moreCategories.slideDown(300);
        button.html('Show Less <i class="fas fa-chevron-up ms-1"></i>');
    }
}

// Utility function to get URL parameters
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
</script>
@endpush
