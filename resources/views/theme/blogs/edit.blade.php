@extends('theme.master')

@section('title', 'Edit Blog')

@section('content')

    @include('theme.partials.hero', ['heroTitle' => $blog->title])

    <!-- ================ Blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogUpdateSuccess'))
                        <div class="alert alert-success">
                            {{ session('blogUpdateSuccess') }}
                        </div>
                    @endif
                    <form action="{{ route('blog.update', ['blog' => $blog]) }}" method="POST"
                        class="form-contact contact_form" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input class="form-control border" name="title" id="name" type="text"
                                placeholder="Title" value="{{ $blog->title }}">
                            @error('title')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            @error('image')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id" value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected($category->id == $blog->category_id) >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control"name="description" placeholder="Description" id="floatingTextarea">{{ $blog->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Blog section end ================= -->


@endsection
