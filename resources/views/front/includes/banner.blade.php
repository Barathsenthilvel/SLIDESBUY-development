<!-- ============================== Banner Two Start =========================== -->
<style>
/* Search Suggestions Styles */
.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.suggestions-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.suggestions-list li {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background-color 0.2s;
}

.suggestions-list li:hover {
    background-color: #f8f9fa;
}

.suggestions-list li:last-child {
    border-bottom: none;
}

.suggestions-list li .suggestion-text {
    font-size: 14px;
    color: #333;
    font-weight: 500;
}

.suggestions-list li .suggestion-type {
    font-size: 12px;
    color: #666;
    margin-left: 8px;
}

.suggestions-list li .suggestion-count {
    font-size: 12px;
    color: #999;
    float: right;
}
</style>
<section class="banner-two position-relative z-index-1 overflow-hidden">
    <img src="../assets/images/gradients/banner-two-gradient.png" alt="" class="bg--gradient white-version">
    <img src="../assets/images/gradients/banner-two-gradient-dark.png" alt="" class="bg--gradient dark-version">
    <img src="../assets/images/shapes/element-moon3.png" alt="" class="element one">
    <img src="../assets/images/shapes/element-moon2.png" alt="" class="element two">
    <img src="../assets/images/shapes/element-moon1.png" alt="" class="element three">


    <div class="container container-full">
        <div class="row gy-sm-5 gy-4 align-items-center">

            <div class="col-xl-3 col-sm-6 order-xl-0 order-2">
                <div class="position-relative z-index-1">
                    <img src="assets/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="assets/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper">
                        <div class="statistics style-three position-relative start-0 top-0 bg-white text-center">
                            <h5 class="statistics__amount statistics__amount-two text-heading">100+</h5>
                            <span class="statistics__text">Active User</span>
                        </div>

                        <div class="statistics style-three position-relative start-0 top-0 bg-white text-center">
                            <h5 class="statistics__amount statistics__amount-two text-heading">1,000+ </h5>
                            <span class="statistics__text">Total Download</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="banner-two__content">
                    <h1 class="banner-two__title text-center mb-3">Create Powerful Presentions with Ready Made Templates</h1>
                    <p class="banner-two__desc text-center">Download ready-made, fully editable Power point slides and save hours  of design work. finish faster, present better.</p>

                    <form action="{{ route('front.search.products') }}" method="GET" class="search-box style-two position-relative">
                        <input type="text" name="q" id="searchInput" class="common-input common-input--lg pill shadow-sm" placeholder="Search templates, categories..." value="{{ request('q') }}" autocomplete="off">
                        <button type="submit" class="btn btn-main btn-icon icon border-0">
                            <img src="../assets/images/icons/search.svg" alt="">
                        </button>
                        <!-- Search Suggestions Dropdown -->
                        <div id="searchSuggestions" class="search-suggestions" style="display: none;">
                            <ul id="suggestionsList" class="suggestions-list">
                                <!-- Suggestions will be populated here -->
                            </ul>
                        </div>
                    </form>

                    <div class="popular-search d-flex align-items-start gap-3 justify-content-center">
                        <h6 class="popular-search__title font-18 fw-700 mb-0 mt-1 flex-shrink-0 flx-align gap-1"> <span class="d-md-flex d-none">Popular</span> Search: </h6>
                        <ul class="search-list">
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'business']) }}" class="search-list__link font-14 text-heading">Business</a>
                            </li>
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'education']) }}" class="search-list__link font-14 text-heading">Education</a>
                            </li>
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'presentation']) }}" class="search-list__link font-14 text-heading">Presentation</a>
                            </li>
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'marketing']) }}" class="search-list__link font-14 text-heading">Marketing</a>
                            </li>
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'finance']) }}" class="search-list__link font-14 text-heading">Finance</a>
                            </li>
                            <li class="search-list__item">
                                <a href="{{ route('front.search.products', ['q' => 'technology']) }}" class="search-list__link font-14 text-heading">Technology</a>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="popular-search d-flex align-items-start gap-3 justify-content-center">
                        <h6 class="popular-search__title font-18 fw-700 mb-0 mt-1 flex-shrink-0 flx-align gap-1"> <span class="d-md-flex d-none">Popular</span> Search: </h6>
                        <ul class="search-list">
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">theme</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">plugins</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">ui template</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">mobile app</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">html template</a>
                            </li>
                            <li class="search-list__item">
                                <a href="all-product.html" class="search-list__link font-14 text-heading">dashboard</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="position-relative z-index-1">
                    <img src="assets/images/shapes/dots-sm.png" alt="" class="dotted-img d-xl-block d-none white-version">
                    <img src="assets/images/shapes/dots-sm-white.png" alt="" class="dotted-img d-xl-block d-none dark-version">
                    <div class="statistics-wrapper style-right">
                        <div class="statistics style-three position-relative start-0 top-0 bg-white text-center">
                            <h5 class="statistics__amount statistics__amount-two text-heading">100+</h5>
                            <span class="statistics__text">Editable Slides</span>
                        </div>

                        <div class="statistics style-three position-relative start-0 top-0 bg-white text-center">
                            <h5 class="statistics__amount statistics__amount-two text-heading">500+</h5>
                            <span class="statistics__text">Businesses</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    let searchTimeout;
    const searchInput = $('#searchInput');
    const suggestionsDiv = $('#searchSuggestions');
    const suggestionsList = $('#suggestionsList');

    // Search suggestions functionality
    searchInput.on('input', function() {
        const query = $(this).val().trim();

        // Clear previous timeout
        clearTimeout(searchTimeout);

        if (query.length < 2) {
            suggestionsDiv.hide();
            return;
        }

        // Debounce the search
        searchTimeout = setTimeout(function() {
            fetchSearchSuggestions(query);
        }, 300);
    });

    // Hide suggestions when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-box').length) {
            suggestionsDiv.hide();
        }
    });

    // Handle suggestion click
    $(document).on('click', '.suggestions-list li', function() {
        const suggestionText = $(this).find('.suggestion-text').text();
        const suggestionType = $(this).find('.suggestion-type').text();

        if (suggestionType === 'Category') {
            // For categories, redirect to category page
            window.location.href = '{{ route("front.getCategory") }}/' + suggestionText.toLowerCase().replace(/\s+/g, '-');
        } else {
            // For slides, perform search
            searchInput.val(suggestionText);
            suggestionsDiv.hide();
            searchInput.closest('form').submit();
        }
    });

    function fetchSearchSuggestions(query) {
        $.ajax({
            url: '{{ route("front.search.suggestions") }}',
            method: 'GET',
            data: { q: query },
            success: function(response) {
                displaySuggestions(response);
            },
            error: function() {
                // Hide suggestions on error
                suggestionsDiv.hide();
            }
        });
    }

    function displaySuggestions(suggestions) {
        if (suggestions.length === 0) {
            suggestionsDiv.hide();
            return;
        }

        suggestionsList.empty();

        suggestions.forEach(function(suggestion) {
            const li = $('<li>');
            li.html(`
                <span class="suggestion-text">${suggestion.text}</span>
                <span class="suggestion-type">${suggestion.type === 'Product' ? 'Slides' : suggestion.type || 'Slides'}</span>
                <span class="suggestion-count">${suggestion.count}</span>
            `);
            suggestionsList.append(li);
        });

        suggestionsDiv.show();
    }
});
</script>
<!-- ============================== Banner Two End =========================== -->
