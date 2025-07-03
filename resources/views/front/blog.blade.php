@extends('front.includes.container')
@section('content')
<main class="main">
            <nav class="breadcrumb-nav mt-0 mt-lg-3">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Blog</a></li>
                        <li>Single Post</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content with-sidebar">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <article class="post-single">
                                <figure class="post-media">
                                        @if($blog->blog_type==0)
                            <a href="{{route('front.blog',$blog->blog_url)}}">
                                <img src="{{URL::asset('/assets/media/banner/'.$blog->blog_image)}}" width="880" height="450" alt="post" />
                            </a>
                            @else
                            <iframe width="880" height="450" src="{{$blog->blog_video}}"  frameborder="0" allowfullscreen></iframe>
                            @endif
                                </figure>
                                <div class="post-details">
                                    <div class="post-meta">
                                        on <a href="#" class="post-date">{{ date('F d Y',strtotime($blog->created_at))}}</a>
                                    </div>
                                    <div class="post-body mb-7">
                                        {!!$blog->blog_content!!}
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
@push('script')
@endpush
