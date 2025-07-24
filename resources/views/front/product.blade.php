@extends('front.includes.container')
{{-- @section('title',  $product->metaname)
@section('meta_keywords',$product->metakeyword)
@section('meta_description', $product->metadescription) --}}
@section('content')

@php
    $price = $product->getproductPrice();
    $rev = $product->reviewtotal();
    $star = $rev->reviewtotal/20;
@endphp
@if (Auth::check())
@php
	$array = \explode(',',Auth::user()->wishlist);
@endphp
@else
@php
	$array = [];
@endphp
@endif
<style>
    .common-section {
        padding: 70px 0 0 0;
    }

</style>

<!-- ======================== Breadcrumb Two Section Start ===================== -->
<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">

    <div class="breadcrumb-two">
        <img src="assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">
    
                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="all-product.html" class="breadcrumb-list__link text-body hover-text-main">Products</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">SaaS</span>
                            </li>
                        </ul>
                        
                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Quantum: SaaS Landing Page WordPress Theme</h3>
    
                        <div class="breadcrumb-content flx-align gap-3">
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="text">By <a href="#" class="link text-main fw-600">Oviousdev</a> </span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/cart-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/cart-white.svg" alt="" class="dark-version w-20">
                                </span>
                                <span class="text">158 sales</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/check-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/check-icon-white.svg" alt="" class="dark-version">
                                </span>
                                <span class="text">Recently Updated</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/check-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/check-icon-white.svg" alt="" class="dark-version">
                                </span>
                                <span class="text">Well Documented</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-two">
        <div class="breadcrumb-tab flx-wrap align-items-start gap-lg-4 gap-2">
            <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-product-details-tab" data-bs-toggle="pill" data-bs-target="#pills-product-details" type="button" role="tab" aria-controls="pills-product-details" aria-selected="true">Product Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill" data-bs-target="#pills-rating" type="button" role="tab" aria-controls="pills-rating" aria-selected="false">
                    <span class="d-flex align-items-center gap-1">
                        <span class="star-rating">
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                        </span>
                        <span class="star-rating__text text-body"> 5.0</span>
                        <span class="star-rating__text text-body"> (180)</span>
                    </span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false">Comments (50)</button>
                </li>
            </ul>
            <div class="social-share">
                <button type="button" class="social-share__button">
                    <img src="assets/images/icons/share-icon.svg" alt="">
                </button>
                <div class="social-share__icons">
                    <ul class="social-icon-list colorful-style">
                        <li class="social-icon-list__item">
                            <a href="https://www.facebook.com" class="social-icon-list__link text-body flex-center"><i class="fab fa-facebook-f"></i></a> 
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.twitter.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.google.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- ======================== Breadcrumb Two Section End ===================== -->
<!-- ======================= Product Details Section Start ==================== -->
<div class="container">
    <div class="row">
        {{-- Left: Vertical Thumbnails --}}
        <div class="col-md-2">
            <div class="d-flex flex-column gap-2">
                @foreach([1, 2, 3, 4] as $i)
                    @php
                        $image = 'image' . $i;
                        $imagePath = 'assets/media/products/' . $product->$image;
                    @endphp
                    @if(!empty($product->$image) && file_exists(public_path($imagePath)))
                        <a href="{{ asset($imagePath) }}" data-lightbox="product">
                            <img src="{{ asset($imagePath) }}" class="img-fluid border rounded" alt="thumb-{{ $i }}">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Center: Main Preview Image and Buttons --}}
        <div class="col-md-7">
            @php
                $mainImage = null;
                foreach([1,2,3,4] as $i) {
                    $img = 'image'.$i;
                    $imgPath = 'assets/media/products/'.$product->$img;
                    if (!empty($product->$img) && file_exists(public_path($imgPath))) {
                        $mainImage = asset($imgPath);
                        break;
                    }
                }
            @endphp

            <div class="mb-4">
                @if($mainImage)
                    <img src="{{ $mainImage }}" class="img-fluid rounded w-100" alt="Main Image">
                @endif
            </div>

            <div class="d-flex gap-3">
                <a href="#" class="btn btn-primary">Live Preview</a>
                <a href="#" class="btn btn-outline-secondary screenshot-btn"
                   data-images='[
                       @php $first = true; @endphp
                       @foreach([1,2,3,4] as $i)
                           @php
                               $img = 'image' . $i;
                               $imgPath = 'assets/media/products/' . $product->$img;
                           @endphp
                           @if(!empty($product->$img) && file_exists(public_path($imgPath)))
                               @if(!$first), @endif"{{ asset($imgPath) }}"
                               @php $first = false; @endphp
                           @endif
                       @endforeach
                   ]'>
                   Screenshot
                </a>
            </div>

            <div class="mt-4">
                <p class="text-muted">
                    {{ $product->description ?? 'No description available.' }}
                </p>
            </div>
        </div>

        {{-- Right: Sidebar (Add to Cart, Price, Author Info) --}}
        <div class="col-md-3">
            <div class="product-sidebar section-bg p-3 rounded">
                <h6 class="mb-2">Regular License</h6>
                <h4 class="text-end mb-3">$1580.00</h4>

                <ul class="list-unstyled mb-3">
                    <li>✔ Quality verified</li>
                    <li>✔ Use for a single project</li>
                    <li>✔ Non-paying users only</li>
                </ul>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="supportCheck">
                    <label for="supportCheck" class="form-check-label">Extended support 12 month</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <del>$12</del>
                    <strong>$7.25</strong>
                </div>

                <button class="btn btn-primary w-100 mb-3">Add To Cart</button>

                <div class="author-box border-top pt-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ asset('assets/images/thumbs/author-details-img.png') }}" class="rounded-circle" width="40" alt="">
                        <div>
                            <h6 class="mb-0">Oviousdev</h6>
                            <small class="text-muted">⭐ 5.0</small>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-1 mt-2">
                        @for($i = 1; $i <= 8; $i++)
                            <img src="{{ asset('assets/images/thumbs/badge'.$i.'.png') }}" width="30" alt="badge">
                        @endfor
                    </div>

                    <a href="profile.html" class="btn btn-outline-secondary w-100 mt-3">View Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================= Product Sidebar End ========================= -->

<!-- ======================= Product Details Section End ==================== -->











	<section>
		<div class="container">
			<div class="pro-details">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopad">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 productdetail-imgwraper">
							<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12 singleprd-sliderwraper">
							<div class="singleprd-slider">
                                @if(file_exists(public_path('assets/media/products/'.$product->image1)))
								<div class="singleprd">
									<a href="{{URL::asset('assets/media/products/'.$product->image1)}}" class="products imgBox" data-lightbox="product">
									    <img src="{{URL::asset('assets/media/products/'.$product->image1)}}" class="img-responsive center-block" data-origin="{{URL::asset('assets/media/products/'.$product->image1)}}" lt="product">
									</a>
								</div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image2)))
								<div class="singleprd">
									<a href="{{URL::asset('assets/media/products/'.$product->image2)}}" class="products imgBox" data-lightbox="product">
									    <img src="{{URL::asset('assets/media/products/'.$product->image2)}}" class="img-responsive center-block" data-origin="{{URL::asset('assets/media/products/'.$product->image2)}}" lt="product">
									</a>
								</div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image3)))
								<div class="singleprd">
									<a href="{{URL::asset('assets/media/products/'.$product->image3)}}" class="products imgBox" data-lightbox="product">
									    <img src="{{URL::asset('assets/media/products/'.$product->image3)}}" class="img-responsive center-block" data-origin="{{URL::asset('assets/media/products/'.$product->image3)}}" lt="product">
									</a>
								</div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image4)))
								<div class="singleprd">
									<a href="{{URL::asset('assets/media/products/'.$product->image4)}}" class="products imgBox" data-lightbox="product">
									    <img src="{{URL::asset('assets/media/products/'.$product->image4)}}" class="img-responsive center-block" data-origin="{{URL::asset('assets/media/products/'.$product->image4)}}" lt="product">
									</a>
								</div>
                                @endif
					         </div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 nopad thumbnailprd-slider">
                                @if(file_exists(public_path('assets/media/products/'.$product->image1)))
                                <div class="singleprd">
                                    <div class="singleprd-inner">
                                        <img class="img-responsive center-block" src="{{URL::asset('assets/media/products/'.$product->image1)}}" alt="product">
                                    </div>
                                </div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image2)))
                                <div class="singleprd">
                                    <div class="singleprd-inner">
                                        <img class="img-responsive center-block" src="{{URL::asset('assets/media/products/'.$product->image2)}}" alt="product">
                                    </div>
                                </div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image3)))
                                <div class="singleprd">
                                    <div class="singleprd-inner">
                                        <img class="img-responsive center-block" src="{{URL::asset('assets/media/products/'.$product->image3)}}" alt="product">
                                    </div>
                                </div>
                                @endif
                                @if(file_exists(public_path('assets/media/products/'.$product->image4)))
                                <div class="singleprd">
                                    <div class="singleprd-inner">
                                        <img class="img-responsive center-block" src="{{URL::asset('assets/media/products/'.$product->image4)}}" alt="product">
                                    </div>
                                </div>
                                @endif
						    </div>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  productright-wraper">
						<div class="product-topdetails">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="infotitle">
										<h3><span>{{ $product->product_title }}<br><small>SKU : {{$StoreConfig->productIdprefix}}-{{$product->product_sku}}</small></span></h3>
										<div class="star-rated">
                                                <i class=" {{($star >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        </div>
									</div>
									{{-- <div class="detailsprice-wraper">
										<span class="actual-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $price->price }}</span>

                                            <span class="original-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $product->mrp }}</span>

                                            <span class="offer-percent">
                                                ({{ $product->saveings['%'] }} Discount, you save  {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $product->saveings['save_amount'] }}

                                                @if($price->discount)
                                                    & Special Discount {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ sprintf('%0.2f', $price->offer) }}
                                                @endif)


                                                <!--(@if(!empty($price->CustomerGroup))-->
                                                <!--    @if($price->CustomerGroup->amount)-->
                                                <!--    Prime Customer offer {{$price->CustomerGroup->amount}}{{($price->CustomerGroup->type == 1)?'%':'Rs'}} applied already-->
                                                <!--    @else-->
                                                <!--        For Prime Customer - Get 5% off-->
                                                <!--    @endif-->
                                                <!--    @else-->
                                                <!--    For Prime Customer - Get 5% off-->
                                                <!--@endif-->

                                                <!--@if(!empty($price->discount)) & Additional {{$price->discount->number}}{{($price->discount->type == '%')?'%':'Rs'}} off as a regular discount @endif )-->
                                            </span>
										<div class="addi_text">* @if($price->tax) {{$StoreConfig->include_tax}} of {{$price->tax->tax_rate}}{{($price->tax->tax_type == 1)?" %":" -/Rs"}} @endif Tax and Shipping Charge may apply </div>
										</br>

                                        @if ($price->isoffer)
                                        @if(strtotime("+10 day") > strtotime("+1 day", strtotime($price->discount->expiry_date)))
                                        <div class="product-count addi_text">
                                            <label>Off Ends In :</label>
                                             <p id="product-countdown"></p>
                                         </div>
                                         @endif
								        @endif
									</div> --}}
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad prodec-wraper">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="detailsprice-wraper">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nopad stock-wraper">
											<div class="dettit">
												Availability
											</div>
											<div class="detcnt">
                                                @if ($product->soldout == 'off')
												    <span class="text-green">In Stock</span>
                                                @else
                                                    <span style="color: red">Out Off Stock</span>
                                                @endif
											</div>
                                            @php
												$quantity = $product->minquantity;
												if(!empty(session()->get('cart')->items)){
													if(array_key_exists($product->id,session()->get('cart')->items)){
														$quantity = session()->get('cart')->items[$product->id]['quantity'];
													}
												}
											@endphp
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nopad quantity">
											<div class="quantity-button quantity-down">
												-
											</div><input id="prices1" min="{{$product->minquantity}}" max='{{$product->quantity}}' readonly onblur="checkminqty()" onchange="" onkeypress="return validateQty(event);" onmousemove="" step="{{$product->minquantity}}" type="number" value="{{$quantity}}">
											<div class="quantity-button quantity-up">
												+
											</div>
										</div>
								<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 nopad categories-wraper">
									<div class="product-dimensions-unit"></div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad detailbtn-wraper">
							        <ul class="list-inline">
                                        <input type="hidden" id="id" value="{{ $product->id }}">
								        <li><a href="" class="cart-btn common-btn {{($product->soldout != 'off')?'p-e-none':''}} btn-cart1" tabindex="0" data-toggle="tooltip" data-placement="top" title="{{($product->soldout != 'off')?'soldout':'Add to Cart'}}">{{($product->soldout != 'off')?'soldout':'Add to Cart'}}</a></li>
								        <li>
                                            <a data-id="{{$product->id}}" href="" id="productWish" class="wishlist-btn common-btn btn-wishlist {{(in_array($product->id,$array)?'added':'')}}" tabindex="0" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <img class="img-responsive center-block"  src="{{URL::asset('assets/front/images/icons/wishlist.png')}}">
                                            </a>
                                        </li>
                                        <li><a href="{{ url('/product/' . $product->slug) }}" class="cart-btn common-btn" tabindex="0" data-toggle="tooltip" data-placement="top" title="More Details">More Details</a></li>
							        </ul>
						        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 productspec-wraper">
							<!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="false">Product Description</a></li>
								{{-- <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="true">FAQ</a></li> --}}
							    <li role="presentation" ><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" aria-expanded="true">Review &amp; Rating</a></li>
							  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="tab1">
								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 nopad">
								<div class="content-para">
								<h4 style="box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; border: 0px; outline: 0px; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.4; vertical-align: baseline; font-family: Poppins; font-size: 17px; font-style: normal; font-weight: 600; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
                                    {!! $product->product_description !!}
                                </h4>
                                        <br>
                                            <div class="proc-attr">

										<table class="table table-bordered">
                                		<colgroup>
                                			<col width="30%">
                                			<col width="70%">
                                		</colgroup>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p><strong>Weight</strong></p>
                                                </td>
                                                <td>
                                                    <p>{{$product->weight}}</p>
                                                </td>
                                            </tr>
                                            @foreach ($product->Methodattribute() as $attribute)
                                            @php
                                                if(empty($attribute[1])) continue;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <p><strong>{{$attribute[0]}}</strong></p>
                                                </td>
                                                <td>
                                                    <p>{{$attribute[1]}}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                	</table>
								                      </div>


																	</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="tab2">
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 nopad">
                    <div class="content-para">
    								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 nopad form-group">
    								<div class="dettit">
    											Is the lorem Ipsum?
    											</div>
    								<p>Most of our products are made to order, as we customize the product specially for you. We have an inventory of popular items with a wide range of products and customisation.</p>
    								</div>
    								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 nopad form-group">
    								<div class="dettit">
    											Is the lorem Ipsum?
    											</div>
    								<p>Most of our products are made to order, as we customize the product specially for you. We have an inventory of popular items with a wide range of products and customisation.</p>
    								</div>


    								</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="tab3">
                                @include('front.includes.review')
							</div>


						  </div>

						</div>
				</div>
				@if(count($relateproduct)>0)
    				@php
    				    $obj1 = new \stdClass;
    				    $obj1->{'title'} = 'Relared Product';
    				    $discounts['product'] = $relateproduct;
    				    $discounts['discount'] = $obj1;
    				    $discounts['hideviewall'] = true;
    				@endphp
                        @include('front.includes.discount')
                @endif
                @if(count($similarproduct)>0)
    				@php
    				    $obj1 = new \stdClass;
    				    $obj1->{'title'} = 'Similar Product';
    				    $discounts['product'] = $similarproduct;
    				    $discounts['discount'] = $obj1;
    				    $discounts['hideviewall'] = true;
    				@endphp
                        @include('front.includes.discount')
                @endif
			</div>
		</div>
	</section>

@endsection
@push('script')
<script src="{{URL::asset('assets/front/js/jquery.fancybox.min.js')}}"></script>
<script>
    $(".detcateg").insertAfter(".detsocial");
     $('.quantity').each(function () {
          var spinner = $(this),
              input = spinner.find('input[type="number"]'),
              btnUp = spinner.find('.quantity-up'),
              btnDown = spinner.find('.quantity-down'),
              min = input.attr('min'),
              max = input.attr('max'),
              step = parseFloat(input.attr('step'));
          //	console.log(step);

          btnUp.click(function () {
              //console.log(step);
              var oldValue = parseFloat(input.val());
              if (oldValue >= max) {
                  var newVal = oldValue;
                  toastr["error"](`Only ${newVal} quantity available`);
              } else {
                  var newVal = oldValue + step;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
          });

          btnDown.click(function () {
              //	console.log(step);
              var oldValue = parseFloat(input.val());
              if (oldValue <= min) {
                  var newVal = oldValue;
              } else {
                  var newVal = oldValue - step;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
          });

      });

     /*produtdeatil slider*/
          $(".singleprd-slider").slick({
              infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: true,
              fade: true,
              speed: 300,
              autoplay:false,
              lazyLoad: 'ondemand',
              asNavFor: '.thumbnailprd-slider',
          });
          $(".thumbnailprd-slider").slick({
              slidesToScroll: 1,
              slidesToShow: 6,
              infinite: true,
              arrows: false,
              autoplay: false,
              //dots:true,
              vertical: false,
              verticalSwiping: true,
              //autoplaySpeed: 4000,
              asNavFor: '.singleprd-slider',
              focusOnSelect: true,
              //centerMode: false,
              responsive: [{
                      breakpoint: 1024,
                      settings: {
                          slidesToShow: 6,
                          slidesToScroll: 1
                      }
                  },
                  {
                      breakpoint: 767,
                      settings: {

                          slidesToShow: 4,
                          vertical: false,
                          slidesToScroll: 1
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                          slidesToShow: 3,
                          vertical: false,
                          slidesToScroll: 1
                      }
                  }
              ]
          });
          /**/



   // Remove active class from all thumbnail slides
  $('.thumbnailprd-slider .slick-slide').removeClass('slick-active');
  $('.thumbnailprd-slider .slick-slide').eq(0).addClass('slick-active');
  $('.product_topline .slick-prev').prop('disabled', true);
  $('.singleprd-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
   var mySlideNumber = nextSlide;
  //alert(slick.slideCount);
  if(mySlideNumber==(slick.slideCount-1))
  {
     $('.product_topline .slick-next').prop('disabled', true);
     $('.product_topline .slick-next').fadeOut(100);
  }
  else if(mySlideNumber==0)
  {
   $('.product_topline .slick-prev').prop('disabled', true);
   $('.product_topline .slick-prev').fadeOut(100);
  }
  else
  {
   $('.product_topline .slick-next').prop('disabled', false);
   $('.product_topline .slick-prev').prop('disabled', false);
   $('.product_topline .slick-next').fadeIn(100);
   $('.product_topline .slick-prev').fadeIn(100);
  }

   $('.thumbnailprd-slider .slick-slide').removeClass('slick-active');
   $('.thumbnailprd-slider .slick-slide').eq(mySlideNumber).addClass('slick-active');
});


  if ($(window).width() > 767){
      $('.imgBox').imgZoom({
      boxWidth: 400,
      boxHeight: 400,
      marginLeft: 15,
      });
  }
  //$('.products').fancybox();


  $('.product_pagination li').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
  return false;
  });
  /*sticky footer*/
       var width = $(window).width();
      var lastScrollTop = 0;
      $(window).scroll(function(event) {;
      var width = $(window).width();
      if (width <= 767) {
      function footer()
      {
              var st = $(this).scrollTop();
               if (st > lastScrollTop){
               $(".footer-nav").slideDown();
               }
               else {
               $(".footer-nav").hide();
               }
               lastScrollTop = st;
      }
      footer();
      }
      });
      /*sticky footer ends*/
  </script>
<script>

$('body .countClick').click(function(e){
e.preventDefault();
    var userid={{(Auth::check())?Auth::id():0}};
    var prodid={{$product->id}};
    $.ajax({
    method:"post",
    url:'{{url('likes')}}',
    data: {
        "_token": "{{ csrf_token() }}",
        userid: userid,
        prodid:prodid
        },
    success:function(data){
        console.log(data.data);
        $('#likeCounts').text(data.data);

            },
    error:function(error){

    }
});
});

    $('body #star_rating i').click(function(e){
		var star = $(this).data('star');
		$('#rating').val(star);
		$('body #star_rating i').each((i,e) =>{
			if(e.dataset.star <= star){
				e.classList.add("fa-star");
				e.classList.remove("fa-star-o");
			}else{
				e.classList.remove("fa-star");
				e.classList.add("fa-star-o");
			}
		})
    });
$('body #reviewSubmit').submit(function(e){
e.preventDefault();
const formData = new FormData(e.target);
formData.set('rating', $("#rating").val());
$.ajax({
    method:"POST",
    url:$(this).prop('action'),
    data:formData,
    cache: false,
    processData: false,
    contentType: false,
    success:function(data){
        $('#tab3').load('{{route('load.review',['id'=>$product->id])}}');
    },
    error:function(erroe){

    }
});
});
$("#seerating").on('click',function() {
    $('html,body').animate({ scrollTop: $("#see").offset().top},'slow');
    $( "#see" ).trigger( "click" );

});


// Set the date we're counting down to

var countDownDate = {{($price->discount)?strtotime("+1 day", strtotime($price->discount->expiry_date))*1000:strtotime("now")}};

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("product-countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("product-countdown").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endpush
