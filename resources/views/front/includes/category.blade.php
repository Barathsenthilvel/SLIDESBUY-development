@foreach($category as $homecat)
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
@endforeach