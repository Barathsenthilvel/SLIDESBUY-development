@extends('front.includes.container')
@section('content')
<!-- main start -->

<script>
    var min = parseInt('{{$min}}');
    var max = parseInt('{{$max}}') +1;
</script>

<section class="banner-section">
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
</section>


<section>
    <div class="container">
        <aside class="col-md-3 col-sm-4 col-xs-12 nopad sss1 sticky-wraper">
            <div class="productlistaside" id="productlistaside">
                <form id="frmproductlistaside" name="frmproductlistaside" action="#">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="filtersec">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 filtersecc">
                                    <h4 class="filtertrigger">Filters &nbsp; <span
                                            class="hidden-sm hidden-lg hidden-md"><i
                                                class="fa fa-caret-down"></i></span></h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 filterseccc">
                                    <h4>
                                        <span class="saveandclear-wraper">
                                            <a href="javascript:void(0);" class="filter-clean">Clear All</a>
                                        </span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad collapsemenu-wraper">
                            <div class="filter-title">
                                <span class="filter-trigger">
                                    <span class="filter-close"><i class="fa fa-angle-left"></i></span>
                                    &nbsp; <span>Filters </span>
                                </span>
                                <span class="clear-filter pull-right"><a href="javascript:void(0);" class="filter-clean">Clear All</a></span>
                            </div>
                            <!---->
                            <div class="pricerange-wraper">
                                <ul class="collapsemenu">
                                    <li>
                                        <a class="firstlevel-collpase" href="#">Price</a>
                                        <a aria-controls="pricefilter1" aria-expanded="true"
                                            class="collapse-trigger" data-toggle="collapse" href="#pricefilter1"
                                            role="button"></a>
                                        <div aria-expanded="true" class="collapse in" id="pricefilter1" style="">
                                            <div class="well">
                                                <div class="price-range-block">
                                                    <div id="slider-range" class="price-filter-range"
                                                        name="rangeInput"></div>
                                                    <div>
                                                        <!--<input type="number" min="180" max="435"  oninput="validity.valid||(value='180');" id="min_price" name="min_price" class="price-range-field" />-->
                                                        {{-- <input type="hidden" id="minval" value="{{$min}}" />
                                                        <input type="hidden" id="maxval" value="{{$max+1}}" /> --}}
                                                        <input type="number" id="min_price" name="min_price"
                                                            class="price-range-field"
                                                            onBlur="pricevaluechange(this.value,'min_price');" />

                                                        <span>to</span>

                                                        <!--<input type="number"  oninput="validity.valid||(value='180');" id="min_price" name="min_price" class="price-range-field" /> <span>to</span>  -->

                                                        <input type="number" id="max_price" name="max_price"
                                                            class="price-range-field"
                                                            onBlur="pricevaluechange(this.value,'max_price');" />

                                                        <!-- <input type="number" min="180" max="435" oninput="validity.valid||(value='435');" id="max_price" name="max_price" class="price-range-field" />-->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="categorylist-wraper">
                                <ul class="collapsemenu">
                                    @foreach($categorys as $key=>$categorys)
                                    <li>
                                        <a class="firstlevel-collpase Category" href="{{route('front.getCategory',$categorys->Category_url)}}"  data-id="{{$categorys->id}}">{{$categorys->category_name}}</a>
                                        @if(count($categorys->subs))
                                        <a aria-controls="collapseMenu1" aria-expanded="false"
                                            class="collapse-trigger collapsed" data-toggle="collapse" href="#collapseMenu{{$key}}"
                                            id="flexible-packaging" role="button"></a>
                                        <div aria-expanded="false" class="collapse" id="collapseMenu{{ $key }}" style="">
                                            <div class="well">
                                                <ul class="collapse-submenu">
                                                    @foreach($categorys->subs as $subcats)
                                                    <li>
                                                        <a href="{{route('front.getCategory',$subcats->Category_url)}}" class="sucategories" data-cat_id = "{{$categorys->id}}" data-id="{{$subcats->id}}">{{$subcats->category_name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="filtermain-wraper">
                                <ul class="collapsemenu">
                                    @foreach($attributeValues as $key=>$attributeValues)
                                        @if(count(explode(',',$attributeValues->attribute_values)) > 0)
                                            <li>
                                                <a class="firstlevel-collpase" href="#">{{$attributeValues->attribute_name}}</a>
                                                <a aria-controls="blouse{{$key}}" aria-expanded="false" class="collapse-trigger collapsed"
                                                    data-toggle="collapse" href="#blouse{{$key}}" role="button"></a>
                                                <div aria-expanded="false" class="collapse" id="blouse{{$key}}" style="">
                                                    <div class="well">
                                                        @foreach(explode(',',$attributeValues->attribute_values) as $key2=>$values)
                                                            <div class="filterlist">
                                                                <div>
                                                                    <input type="checkbox"
                                                                        name="attr[]" id="{{$attributeValues->id}}-{{$values}}" data-id="{{$attributeValues->id}}-{{$values}}" value="{{$attributeValues->id}}-{{$values}}">
                                                                    <label for="{{$attributeValues->id}}-{{$values}}">{{$values}}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <!---->
                            <div class="filter-bottom">
                                <span class="filterbot-single filter-result">
                                    <span></span> <span> </span>
                                </span>
                                <span class="filterbot-single filter-apply ">
                                    <a href="javascript:void(0);" onChange="fnAttrChanged();"
                                        class="apply-btn text-center"><span>Apply</span></a>
                                </span>

                            </div>

                        </div>
                    </div><!-- panel-group -->
                </form>
            </div>

        </aside>

        <div class="col-md-9 col-sm-8 col-xs-12 nopad sss2 productcontainer">

            <div class="protitlesec">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-2">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-10">
                        <form id="frmsortby" class="form-inline text-right">
                            <div class="form-group">
                                <label for="sel1">Sort by :</label>
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
