@extends('theme.master')

@section('title', 'My Blogs')

@section('content')

    @include('theme.partials.hero', ['heroTitle' => 'My Blogs'])


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('blogDeleteSuccess'))
                        <div class="alert alert-success">
                            {{ session('blogDeleteSuccess') }}
                        </div>
                    @endif
                    <div class="row">
                        @if (isset($blogs))
                            @foreach ($blogs as $blog)
                                <div class="col-md-4">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/{$blog->image}") }}"
                                                alt="{{ $blog->title }}">
                                            <ul class="thumb-info">
                                                <li><a href="{{ route('blog.show', ['blog' => $blog]) }}"><i
                                                            class="ti-user"></i>{{ $blog->user->name }}</a>
                                                </li>
                                                <li><a href="{{ route('blog.show', ['blog' => $blog]) }}"><i
                                                            class="ti-themify-favicon"></i>{{ count($blog->comments) }}
                                                        Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="blog-single.html">
                                                <h3>{{ $blog->title }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('blog.show', ['blog' => $blog]) }}">Read More
                                                <i class="ti-arrow-right"></i></a>

                                            <a href="{{ route('blog.edit', ['blog' => $blog]) }}"
                                                class="btn btn-sm btn-primary m-2 pr-2 pl-2">Edit</a>

                                            <form action="{{ route('blog.destroy', ['blog' => $blog]) }}" method="POST"
                                                class="d-inline" id="delete_form">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mr-2">Delete</button>
                                            </form>
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

            </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
