
@extends('layout.app')
@section('title', ' Overseas Education-Educircle')
@section('content')
    <div class="r-bg-a pt85 pb120">
        <div class="container w-992">
            <div class="row pt80">
                <div class="col-lg-12">
                    <div class="page-headings text-center">
                        <ul class="breadcrus mb20">
                            <li class="bread-non"><a href="blog.html">All Blog Posts</a></li>
                            <li>&nbsp;/&nbsp;</li>
                            <li class="bread-active"><a href="#">Educircle</a></li>
                            

                        </ul>
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="r-bg-x pb120">
        <div class="container w-992">
            <div class="blog-details">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($blog->image)
                            <div class="sol-img mt60">
                                <img src="{{ asset('uploads/blog_images/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="img-fluid">

                            </div>
                            <div class="info-b-right">
                                <span><strong>Date:</strong>
                                    {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}</span>
                            </div>
                        @endif

                        <div class="ree-blog-details">
                            <div class="info-bar">
                                <div class="info-b-left">
                                    @if ($blog->tags)
                                        @foreach (explode(',', $blog->tags) as $tag)
                                            <a href="#">#{{ trim($tag) }}</a>
                                        @endforeach
                                    @endif
                                </div>

                            </div>

                            <p>{{ $blog->short_description }}</p>

                            <div>{!! $blog->full_description !!}</div>
                        </div>

                        <div class="center-btn mt40">
                            <a href="{{ route('blog') }}" class="ree-btn ree-btn-grdt2 mr20">
                                Back to Blogs <i class="fas fa-arrow-left fa-btn"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
