@extends('theme.master')

@section('title', 'My Blogs')

@section('content')

    @include('theme.partials.hero', ['heroTitle' => 'My Blogs'])


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if (isset($blogs))
                            @foreach ($blogs as $blog)
                                <div class="col-md-4">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/{$blog->image}") }}"
                                                alt="{{ $blog->title }}">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a>
                                                </li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="blog-single.html">
                                                <h3>{{ $blog->title }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('blog.show', ['blog' => $blog]) }}">Read More
                                                <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>



                    @if (isset($blogs))
                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->render('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    @endif
                </div>

                {{-- @include('theme.partials.sidebar') --}}
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
