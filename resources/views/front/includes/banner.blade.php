<section class="homeslider-section">
    <div class="homeslider-inner home">
        @foreach($frontBanner as $front)
       <div class="homeslider one">
          <img src="{{asset('/assets/media/banner/'.$front->web_image)}}" class="img-responsive" alt="{{$front->web_image}}">
       </div>
       @endforeach
    </div>
    <div class="downarrow-wraper text-center">
        <a href="#products"><i class="fa fa-angle-down"></i></a>
    </div>
</section>
