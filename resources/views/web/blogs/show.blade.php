<x-front-layout title="{!! (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en  !!}">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Blog Details</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Blog Details</li>
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
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ asset('storage') . '/' . $blog->cover_image }}" alt="">
                                </figure>
                                <div class="lower-content">
                                    <figure class="admin-thumb">
                                        <img src="assets/images/news/admin-1.png" alt="">
                                    </figure>
                                    <span class="category">
                                        {{ $blog->category->name }}
                                    </span>
                                    <h2>
                                        {!! (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en  !!}
                                    </h2>
                                    <span class="post-info">By <a href="blog-details.html">
                                            {{ $blog->admin->first_name }}
                                        </a> - {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD, YY') }}</span>
                                    <div class="text">
                                        {!! (app()->getLocale() == 'ar') ? $blog->description_ar : $blog->description_en  !!}
                                    </div>

                                </div>
                            </div>
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
                            <form action="{{ route('blog.search') }}" method="POST" class="search-form default-form">
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
