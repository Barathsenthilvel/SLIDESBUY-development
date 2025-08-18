{{-- @foreach($category as $homecat)
    @if(count($homecat['category']) > 0)
<section class="featured-section light-bg common-section" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center text-uppercase section-title middle-liner">
                <span>{{ $homecat['Homecat']->title }}</span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopad featuredslider-wraper">
                <div class="row">
                    @foreach($homecat['category'] as $cat)
                        <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class=""
                                href="{{route('front.getCategory',$cat->Category_url)}}" style="position: relative;">
                                <span class="Cat_name">{{ $cat->category_name }}</span>
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/media/banner/'.$cat->style_1)}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endforeach --}}


 <!-- ===========================Our Categories Section Start ========================== -->

<section class="popular-item-card-section padding-y-120 overflow-hidden">

  <img src="../assets/images/shapes/brush.png" alt="" class="element-brush">

  <div class="container container-two">

    @foreach($category as $homecat)
      @if(count($homecat['category']) > 0)

      <div class="section-heading mb-4">
        <h3 class="section-heading__title">{{ $homecat['Homecat']->title }}</h3>
      </div>

      <div class="tab-content" id="pills-tab-popularContent">
        <div class="tab-pane fade show active" id="pills-all-two" role="tabpanel" aria-labelledby="pills-all-two-tab" tabindex="0">
          <div class="row gy-4">

            @foreach($homecat['category'] as $cat)
            <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6">
              <div class="popular-item-card">

                <div class="popular-item-card__thumb">
                  <a href="{{ route('front.getCategory', $cat->Category_url) }}" class="link w-100">
                    <img src="{{asset('/assets/media/banner/' . $cat->style_1) }}" alt="{{ $cat->category_name }}">
                  </a>

                  <div class="product-item__bottom flx-between gap-2">
                    <div>
                      {{-- You can customize these details as needed, below are placeholders --}}
                      <span class="product-item__sales font-14 mb-0 text-white">100 Slides </span>
                      {{-- <div class="d-flex align-items-center gap-1">
                        <ul class="star-rating">
                          <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                          <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                          <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                          <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                          <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        </ul>
                        <span class="star-rating__text text-white fw-500 font-14">(16)</span>
                      </div> --}}
                    </div>
                    <span class="product-item__author">
                      by
                      <a href="profile.html" class="link text-decoration-underline"> Slidesbuy</a>
                    </span>
                  </div>
                </div>

                <div class="popular-item-card__content d-flex align-items-center justify-content-between gap-2 text-start">
                  <h6 class="popular-item-card__title mb-0">
                    <a href="{{ route('front.getCategory', $cat->Category_url) }}" class="link">
                      {{ $cat->category_name }}
                    </a>
                  </h6>
                  <a href="{{ route('front.getCategory', $cat->Category_url) }}" class="btn-link line-height-1 flex-shrink-0">
                    <img src="../assets/images/icons/link.svg" alt="" class="white-version">
                    <img src="../assets/images/icons/link-light.svg" alt="" class="dark-version">
                  </a>
                </div>

              </div>
            </div>
            @endforeach

          </div> <!-- row -->
        </div> <!-- tab-pane -->
      </div> <!-- tab-content -->

      @endif
    @endforeach

  </div> <!-- container -->
</section>


<!-- =========================== Our Categories Section End ========================== -->
