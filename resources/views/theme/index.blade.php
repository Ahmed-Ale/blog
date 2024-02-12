@extends('theme.master')

@php
    use Carbon\Carbon;
@endphp
@section('title', 'Sensive Blog - Home')
@section('home-active', 'active')


@section('content')
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->
        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">
                    @foreach ($recentSliderBlogs as $blog)
                        <div class="card blog__slide text-center">
                            <div class="blog__slide__img">
                                <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                    alt="">
                            </div>
                            <div class="blog__slide__content">
                                <a class="blog__slide__label"
                                    href="{{ route('theme.category', $blog->category->name) }}">{{ $blog->category->name }}</a>
                                <h3><a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a></h3>
                                @php
                                    if (Carbon::parse($blog->created_att)->isToday()) {
                                        $daysPassed = 'Today';
                                    } elseif (Carbon::parse($blog->created_att)->isYesterday()) {
                                        $daysPassed = 'Yesterday';
                                    } else {
                                        $daysPassed = Carbon::parse($blog->created_att)->diffForHumans();
                                    }

                                @endphp
                                <p>{{ $daysPassed }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================ Blog slider end =================-->


        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if (isset($blogs))
                            @foreach ($blogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class="img-fluid w-100" src="{{ asset("storage/blogs/$blog->image") }}"
                                            alt="">
                                        <ul class="thumb-info">
                                            <li><a href="{{ route('blog.show', $blog) }}"><i
                                                        class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                            <li><a href="{{ route('blog.show', $blog) }}"><i
                                                        class="ti-notepad"></i>{{ $blog->created_at->format('F j,Y') }}</a>
                                            </li>
                                            <li><a href="{{ route('blog.show', $blog) }}"><i
                                                        class="ti-themify-favicon"></i>{{ count($blog->comments) }}
                                                    Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="{{ route('blog.show', $blog) }}">
                                            <h3>{{ $blog->title }}</h3>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        <a class="button" href="{{ route('blog.show', $blog) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->render('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                    @include('theme.partials.sidebar')
                </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>

@endsection
