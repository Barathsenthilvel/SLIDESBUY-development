<!-- ======================== Popular Section Start =========================== -->
<section class="popular padding-y-120 overflow-hidden">
    <div class="container container-two">
        <div class="section-heading style-left mb-64">
            <h5 class="section-heading__title">Popular Categories</h5>
        </div>

        <div class="popular-slider arrow-style-two row gy-4">
            @foreach($frontBanner as $front)
                <div class="col-lg-2">
                    <a href="{{ url('all-product.html') }}" class="popular-item w-100">
                        <span class="popular-item__icon">
                            <img src="{{ asset('/assets/media/banner/' . $front->web_image) }}" alt="{{ $front->web_image }}">
                        </span>
                        <!-- <h6 class="popular-item__title font-18">{{ $front->title ?? 'Category Title' }}</h6>
                        <span class="popular-item__qty text-body">{{ $front->count ?? '0' }}</span> -->
                    </a>
                </div>
            @endforeach
        </div>

        <div class="popular__button text-center mt-4">
            <a href="{{ url('all-product.html') }}" class="font-18 fw-600 text-heading hover-text-main text-decoration-underline font-heading">
                Explore More
            </a>
        </div>
    </div>
</section>

<!-- ======================== Popular Section End =========================== -->


<!-- sample crosoul only showing 7 boxes -->
<!-- <section class="popular padding-y-120 overflow-hidden">
        <div class="container container-two">
            <div class="section-heading style-left mb-64">
                <h5 class="section-heading__title">Popular Categories</h5>
            </div>
            
            <div class="popular-slider arrow-style-two row gy-4">
            
                
    
                <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon5.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Mobile App</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>

    <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon5.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Mobile App</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
    <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon5.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Mobile App</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
    <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon5.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Mobile App</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
    <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon5.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Mobile App</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
                <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon6.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">PHP Script</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
                <div class="col-lg-2">
        <a href="all-product.html" class="popular-item w-100">
            <span class="popular-item__icon">
                <img src="assets/images/icons/popular-icon4.svg" alt="">
            </span>
            <h6 class="popular-item__title font-18">Java Script</h6>
            <span class="popular-item__qty text-body">15,296</span>
        </a>
    </div>
            </div>
            <div class="popular__button text-center">
                <a href="all-product.html" class="font-18 fw-600 text-heading hover-text-main text-decoration-underline font-heading">Explore More</a>
            </div>
        </div>
</section> -->
<!-- ======================== popular Section End =========================== -->