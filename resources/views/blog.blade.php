@extends('layout.app')
@section('title', 'Blog-Educircle.io')
@section('content')
    <div class="r-bg-a pt50 pb60">
        <div class="container">
            <div class="row justify-content-center pt50">
                <div class="col-lg-7 text-center">
                    <h2 class="mb15">Scholarships, SOP Tips & Australia Updates – All in One Place.</h2>
                    <p class="h-light">Browse our blogs and prepare smarter for your future.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-block sec-pad pt80">
        <div class="container">
            <div class="blog-post">
                <div class="row">
                    @forelse($blogs as $blog)
                        <div class="col-lg-4 col-sm-6">
                            <div class="ree-media-crd">
                                @if ($blog->image)
                                    <div class="rpl-img">
                                        <a href="{{ route('blog.details', $blog->title_slug) }}">
                                            <img src="{{ asset('uploads/blog_images/' . $blog->image) }}"
                                                alt="{{ $blog->meta_title }}" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                                <div class="rpl-contt">
                                    <div class="blog-quick-inf mb20 mt30">
                                        <span><i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}</span>

                                    </div>
                                    <h4 class="mb15">
                                        <a href="{{ route('blog.details', $blog->title_slug) }}">
                                            {{ $blog->meta_title }}
                                        </a>
                                    </h4>


                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection