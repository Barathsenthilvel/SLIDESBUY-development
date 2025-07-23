@extends('front.includes.container')
@section('content')
<!-- main start -->

<script>
    var min = parseInt('{{$min}}');
    var max = parseInt('{{$max}}') +1;
</script>
<style>

    /* filter style */
    .filter-sidebar {
    width: 100%;
    max-width: 250px;
    border: 1px solid #ddd;
    padding: 16px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
    font-family: Arial, sans-serif;
}

.filter-title {
    font-size: 18px;
    margin-bottom: 12px;
    font-weight: bold;
    border-bottom: 1px solid #ccc;
    padding-bottom: 8px;
}

.filter-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.filter-group {
    margin-bottom: 16px;
}

.filter-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    margin-bottom: 8px;
}

.filter-header i {
    font-size: 12px;
}

.filter-body {
    padding-left: 4px;
}

.filter-option {
    margin-bottom: 6px;
}

.filter-option input[type="checkbox"] {
    margin-right: 6px;
    cursor: pointer;
}

.filter-option label {
    cursor: pointer;
    font-size: 14px;
}

.filter-footer {
    margin-top: 20px;
}

.btn.btn-primary {
    background-color: #ffa41c;
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    color: #111;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.btn.btn-primary:hover {
    background-color: #f39c12;
}

</style>
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
            <aside class="col-md-3 col-sm-4 col-xs-12 nopad sss1 sticky-wraper">
                <div class="productlistaside" id="productlistaside">
                    <form id="frmproductlistaside" name="frmproductlistaside" action="#">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            {{-- Filter Header --}}
                            {{-- <div class="filtersec mb-3">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h4 class="filtertrigger">Filters <span class="hidden-sm hidden-lg hidden-md"><i class="fa fa-caret-down"></i></span></h4>
                                    </div>
                                    <div class="col-xs-6 text-end">
                                        <h4><a href="javascript:void(0);" class="filter-clean text-danger">Clear All</a></h4>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- Unified Filter UI --}}
                            <div class="filter-sidebar card shadow-sm p-3">
                                {{-- Price Filter --}}
                                <div class="mb-4">
                                    <h6 class="mb-2">Price</h6>
                                    <div class="price-range-block">
                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                        <div class="d-flex gap-2 align-items-center mt-2">
                                            <input type="hidden" id="minval" value="{{ $min }}" />
                                            <input type="number" id="max_price" name="max_price" class="form-control form-control-sm"
                                                onBlur="pricevaluechange(this.value,'max_price');" placeholder="Max Price" />
                                        </div>
                                    </div>
                                </div>

                                {{-- Category Filter --}}
                                <div class="mb-4">
                                    <h6 class="mb-2">Categories</h6>
                                    <ul class="list-unstyled ms-1">
                                        @foreach($categorys as $key=>$category)
                                            <li class="mb-2">
                                                <a class="text-dark fw-semibold" href="{{ route('front.getCategory', $category->Category_url) }}" data-id="{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </a>
                                                @if(count($category->subs))
                                                    <ul class="list-unstyled ms-3 mt-1">
                                                        @foreach($category->subs as $subcats)
                                                            <li>
                                                                <a href="{{ route('front.getCategory', $subcats->Category_url) }}"
                                                                class="text-muted sucategories" data-cat_id="{{ $category->id }}" data-id="{{ $subcats->id }}">
                                                                    {{ $subcats->category_name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- Dynamic Attribute Filters --}}
                                <div class="mb-4">
                                    <h6 class="mb-2">Filter by Attributes</h6>
                                    @foreach($attributeValues as $key => $attribute)
                                        @php $values = explode(',', $attribute->attribute_values); @endphp
                                        @if(count($values) > 0)
                                            <div class="mb-3">
                                                <div class="fw-semibold mb-2">{{ $attribute->attribute_name }}</div>
                                                @foreach($values as $val)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="attr{{ $attribute->id }}-{{ $val }}"
                                                            name="attr[]" value="{{ $attribute->id }}-{{ $val }}" data-id="{{ $attribute->id }}-{{ $val }}">
                                                        <label class="form-check-label" for="attr{{ $attribute->id }}-{{ $val }}">
                                                            {{ $val }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                {{-- Apply Filters --}}
                                <div class="text-center">
                                    <button type="button" class="btn btn-warning w-100 fw-bold" onclick="fnAttrChanged()">Apply Filters</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </aside>

            {{-- Product List Section --}}
            <div class="col-md-9 col-sm-8 col-xs-12 nopad sss2 productcontainer">
                <div class="protitlesec mb-3">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-6">
                            {{-- Add optional results info --}}
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6 text-end">
                            <form id="frmsortby" class="form-inline text-right">
                                <div class="form-group">
                                    <label for="orderby">Sort by :</label>
                                    <select name="orderby" id="orderby" class="form-control">
                                        <option value="default" selected="selected">Default</option>
                                        <option value="new">New</option>
                                        <option value="top_rated">Top Rated</option>
                                        <option value="H-L">High to Low</option>
                                        <option value="L-H">Low to High</option>
                                        <option value="A-Z">A to Z</option>
                                        <option value="Z-A">Z to A</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
