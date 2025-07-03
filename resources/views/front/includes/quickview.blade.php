@php
                                $quantity = 1;
                                if(!empty(session()->get('cart')->items)){
                                    if(array_key_exists($product->id,session()->get('cart')->items)){
                                        $quantity = session()->get('cart')->items[$product->id]['quantity'];
                                    }
                                }
                            @endphp

<div class="product product-single row product-popup">
	<div class="col-md-6">
		<div class="product-gallery">
			<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
				<figure class="product-image">
					<img src="{{URL::asset('assets/media/products/'.$product->image1)}}"
						data-zoom-image="{{URL::asset('assets/media/products/'.$product->image1)}}" alt="Blue Pinafore Denim Dress"
						width="580" height="580">
				</figure>
				<figure class="product-image">
					<img src="{{URL::asset('assets/media/products/'.$product->image2)}}"
						data-zoom-image="{{URL::asset('assets/media/products/'.$product->image2)}}" alt="Blue Pinafore Denim Dress"
						width="580" height="580">
				</figure>
				<figure class="product-image">
					<img src="{{URL::asset('assets/media/products/'.$product->image3)}}"
						data-zoom-image="{{URL::asset('assets/media/products/'.$product->image3)}}" alt="Blue Pinafore Denim Dress"
						width="580" height="580">
				</figure>
				<figure class="product-image">
					<img src="{{URL::asset('assets/media/products/'.$product->image4)}}"
						data-zoom-image="{{URL::asset('assets/media/products/'.$product->image4)}}" alt="Blue Pinafore Denim Dress"
						width="580" height="580">
				</figure>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="product-details scrollable pr-0 pr-md-3">
			<h1 class="product-name mt-0">{{$product->product_title}}</h1>
			<div class="product-meta">
				SKU: <span class="product-sku">{{$StoreConfig->productIdprefix." ".$product->product_sku }}</span>
			</div>
			<div class="product-price">{{ ($product->getproductPrice()->isoffer)?$product->getproductPrice()->offer:$product->getproductPrice()->price }}</div>
			<div class="ratings-container">
				<div class="ratings-full">
					<span class="ratings" style="width:{{$product->reviewtotal()->reviewtotal}}%"></span>
					<span class="tooltiptext tooltip-top"></span>
				</div>
				<a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$product->reviewtotal()->total}} reviews )</a>
			</div>
			{{-- <p class="product-short-desc">Sed egestas, ante et vulputate volutpat, eros pede semper
				est, vitae luctus metus libero eu augue. Morbi purus liberpuro ate vol faucibus
				adipiscing.</p> --}}

			{{-- <div class="product-form product-color">
				<label>Color:</label>
				<div class="product-variations">
					<a class="color" data-src="images/demos/demo7/products/big1.jpg" href="#"
						style="background-color: #1e73be"></a>
					<a class="color" data-src="images/demos/demo7/products/2.jpg" href="#"
						style="background-color: #56962e"></a>
					<a class="color" data-src="images/demos/demo7/products/3.jpg" href="#"
						style="background-color: #965000"></a>
				</div>
			</div> --}}
			{{-- <div class="product-form product-size">
				<label>Size:</label>
				<div class="product-form-group">
					<div class="product-variations">
						<a class="size" href="#">M</a>
						<a class="size" href="#">L</a>
					</div>
					<a href="#" class="product-variation-clean">Clean All</a>
				</div>
			</div> --}}
			{{-- <div class="product-variation-price">
				<span>$239.00</span>
			</div> --}}

			<hr class="product-divider">

			<div class="product-form product-qty">
				<div class="product-form-group">
					<div class="input-group mr-2">
						<button class="quantity-minus d-icon-minus"></button>
						<input class="quantity form-control" type="number" value="{{$product->minquantity}}" min-Quantity="{{$product->minquantity}}" min="1" max="{{$product->quantity}}">
						<button class="quantity-plus d-icon-plus"></button>
					</div>
					@if($product->soldout == 'off')
					<button class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold btn-cart3" data-id="{{$product->id}}"><i
							class="d-icon-bag"></i>Add to
						Cart</button>
					@else
					<button class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold btn-cart3 btn-disabled disabled-link" data-id="{{$product->id}}" disabled ><i
							class="d-icon-bag"></i>Out of Stock</button>
					@endif
				</div>
			</div>

			<hr class="product-divider mb-3">
			{{-- <div class="product-footer">
				<a href="#" class="btn-product btn-wishlist mr-4"><i class="d-icon-heart"></i>Add to wishlist</a>
			</div> --}}
		</div>
	</div>
</div>