@extends('theme.master')

@section('title', 'Remake Barber - Login')

@section('content')

    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('login.post') }}" method="POST" class="form-contact contact_form"
                        id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" value="{{ old('email') }}" name="email" id="email"
                                type="email" placeholder="Enter email address">
                            @error('email')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="password" id="name" type="password"
                                placeholder="Enter your password">
                            @error('password')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <a href="{{ route('register') }}" class="mx-4">Don't have an account ?</a>
                            <button type="submit" class="button button--active button-contactForm">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
