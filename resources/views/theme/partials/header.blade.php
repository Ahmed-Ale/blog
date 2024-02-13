    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ route('theme.index') }}"><img
                            src="{{ asset('assets/img') }}/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-center">
                            <li class="nav-item @yield('home-active')"><a class="nav-link"
                                    href="{{ route('theme.index') }}">Home</a>
                            </li>
                            <li class="nav-item submenu dropdown @yield('category-active')">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('theme.category', ['name' => $category->name]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item @yield('contact-active')"><a class="nav-link"
                                    href="{{ route('theme.contact') }}">Contact</a>
                            </li>
                        </ul>

                        <!-- Add new blog -->
                        @if (Auth::check())
                            <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary mr-2">Add
                                New</a>
                        @endif
                        <!-- End - Add new blog -->

                        <ul class="nav navbar-nav navbar-right navbar-social ml-2">
                            @if (!Auth::check())
                                <a href="{{ route('register') }}" class="btn btn-sm btn-warning mr-3">Register /
                                    Login</a>
                            @else
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true"
                                        aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('blogs.myBlogs') }}">My
                                                Blogs</a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout_form">
                                            @csrf
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:$('form#logout_form').submit()"
                                                    >Logout</a>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
