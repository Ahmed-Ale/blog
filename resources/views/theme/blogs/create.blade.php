@extends('theme.master')

@section('title', 'Add New Blog')

@section('content')

    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Add New Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ Blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('blog.store') }}" method="POST" class="form-contact contact_form" id="contactForm"
                        novalidate="novalidate">
                        @csrf

                        <div class="form-group">
                            <input class="form-control border" name="title" id="name" type="text"
                                placeholder="Title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="form-control border" name="image" id="name" type="file">
                            @error('image')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id" placeholder="Category"
                                value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control"name="description" placeholder="Description"
                            id="floatingTextarea">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Blog section end ================= -->


@endsection
