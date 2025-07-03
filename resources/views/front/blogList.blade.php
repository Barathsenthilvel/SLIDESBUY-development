@extends('front.includes.container')
@section('content')
<main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Blog</a></li>
                        <li>Classic</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content with-sidebar">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <div class="posts">
                                @foreach($blog as $blogs)
                                <article class="post post-classic mb-7">
                                    <figure class="post-media overlay-zoom">
                                        @if($blogs->blog_type==0)
                            <a href="{{route('front.blog',$blogs->blog_url)}}">
                                <img src="{{URL::asset('/assets/media/banner/'.$blogs->blog_image)}}" width="870" height="420" alt="post" />
                            </a>
                            @else
                            <iframe width="870" height="255" src="{{$blogs->blog_video}}"  frameborder="0" allowfullscreen></iframe>
                            @endif
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            on <a href="#" class="post-date">{{ date('F d Y',strtotime($blogs->created_at))}}</a>
                                        </div>
                                        <p> {{ wordwrap(strip_tags($blogs->blog_content),'100') }}</p>
                                        <a href="{{route('front.blog',$blogs->blog_url)}}" class="btn btn-link btn-underline btn-primary">Read
                                            more<i class="d-icon-arrow-right"></i></a>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
@push('script')
@endpush
