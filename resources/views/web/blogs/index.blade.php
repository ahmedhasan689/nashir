<x-front-layout title="{{ __('lang.blogs') }}">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>
                        {{ __('lang.blog') }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">
                            {{ __('lang.home') }}
                        </a></li>
                    <li>
                        {{ __('lang.blog') }}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-grid-content">
                        <div class="row clearfix">
                            {{-- Start Here --}}
                            @foreach( $blogs as $blog )
                                <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                                    <div class="news-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="{{ asset('storage') . '/' . $blog->cover_image }}" alt="">
                                                <a href="{{ route('blog.show', ['id' => $blog->id]) }}"><i class="fas fa-link"></i></a>
                                            </figure>
                                            <div class="lower-content">
                                                <figure class="admin-thumb">
                                                    <img src="assets/images/news/admin-1.png" alt=""></figure>
                                                <span class="category">
                                                    {{ $blog->category->name }}
                                                </span>
                                                <h3>
                                                    <a href="{{ route('blog.show', ['id' => $blog->id]) }}">
                                                        {!! (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en  !!}
                                                    </a>
                                                </h3>
                                                <p>
                                                    {!! (app()->getLocale() == 'ar') ? $blog->description_ar : $blog->description_en !!}
                                                </p>
                                                <span class="post-info">
                                                    By
                                                    <a href="#">
                                                        {{ $blog->admin->first_name }}
                                                    </a> - {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD, YY') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- End Here --}}
                        </div>

                        <div class="pagination-wrapper centred">
                            {{ $blogs->links('web.blogs.pagination') }}
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar default-sidebar">
                        <div class="search-widget sidebar-widget">
                            <div class="widget-title">
                                <h3>
                                    {{ __('lang.search') }}
                                </h3>
                            </div>
                            <form action="{{ route('blog.search') }}" method="post" class="search-form default-form">
                                @csrf
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="social-box sidebar-widget">
                            <div class="widget-title">
                                <h3>
                                    {{ __('lang.follow_us') }}
                                </h3>
                            </div>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="{{ $settings->where('key', 'facebook_link')->first()->value }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li><a href="{{ $settings->where('key', 'google_link')->first()->value }}"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="{{ $settings->where('key', 'twitter_link')->first()->value }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $settings->where('key', 'linkedin_link')->first()->value }}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $settings->where('key', 'google_link')->first()->value }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-widget sidebar-widget">
                            <div class="widget-title">
                                <h3>
                                    {{ __('lang.recent_blogs') }}
                                </h3>
                            </div>
                            <div class="post-inner">
                                @foreach( $last_blogs as $last_blog )
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="{{ route('blog.show', ['id' => $last_blog->id]) }}">
                                                <img src="{{ asset('storage') . '/' . $blog->cover_image }}" alt="">
                                            </a>
                                        </figure>
                                        <h5>
                                            <a href="{{ route('blog.show', ['id' => $last_blog->id]) }}">
                                                {!! (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en  !!}
                                            </a>
                                        </h5>
                                        <p>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD, YY') }}</p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->
</x-front-layout>
