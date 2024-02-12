                    <!-- Start Blog Post Siddebar -->
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget newsletter-widget">
                                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{ route('subscribe') }}" method="post">
                                    @csrf
                                    <div class="form-group mt-30">
                                        <div class="col-autos">
                                            <input name="email" type="text" class="form-control"
                                                id="inlineFormInputGroup" placeholder="Enter email"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="bbtns d-block mt-20 w-100" type="submit">Subcribe</button>
                                </form>
                            </div>

                            <div class="single-sidebar-widget post-category-widget">
                                <h4 class="single-sidebar-widget__title">Category</h4>
                                <ul class="cat-list mt-20">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('theme.category', ['name' => $category->name]) }}"
                                                class="d-flex justify-content-between">
                                                <p>{{ $category->name }}</p>
                                                <p>({{ str_pad($category->blogs_count, 2, STR_PAD_LEFT, '0') }})</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="single-sidebar-widget__title">Recent Blogs</h4>
                                <div class="popular-post-list">
                                    @foreach ($recentSidebarBlogs as $blog)
                                        <div class="single-post-list">
                                            <div class="thumb">
                                                <img class="card-img rounded-0"
                                                    src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                                                <ul class="thumb-info">
                                                    <li><a
                                                            href="{{ route('blog.show', $blog) }}">{{ $blog->user->name }}</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('blog.show', $blog) }}">{{ $blog->created_at->format('M d') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="details mt-20">
                                                <a href="{{ route('blog.show', $blog) }}">
                                                    <h6>{{ $blog->title }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Post Siddebar -->
