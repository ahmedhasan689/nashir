<x-front-layout title="Home">
    <!-- banner-section -->
    <section class="banner-section style-three" style="background-image: url(assets/images/banner/banner-3.jpg);">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-8 col-md-6 col-sm-12 content-column">
                    <div class="content-box">
                        <h1>
                            {{ __('lang.browse_ads_home') }}
                        </h1>
                        <p>
                            {{ __('lang.lots_of_ads') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 inner-column">
                    <div class="inner-box">
                        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-12.png') }});"></div>
                        <h3>
                            {{ __('lang.find_ads') }}
                        </h3>
                        <form action="{{ route('home.search') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <i class="icon-2"></i>
                                <input type="search" name="search" placeholder="{{ __('lang.search') }}" required="">
                            </div>
                            <div class="form-group">
                                <i class="icon-3"></i>
                                <select class="wide" name="country">
                                    <option data-display="{{ __('lang.select_country') }}">
                                        {{ __('lang.select_country') }}
                                    </option>
                                    @foreach( $countries as $country )
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="icon-4"></i>
                                <select class="wide" name="category">
                                    <option data-display="{{ __('lang.select_category') }}">{{ __('lang.select_category') }}</option>
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="theme-btn-one">
                                    <i class="icon-2"></i>
                                    {{ __('lang.search') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- category-section -->
    <section class="category-section centred sec-pad">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-10.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <span>
                    {{ __('lang.categories') }}
                </span>
                <h2>
                    {{ __('lang.explore_category') }}
                </h2>
                <p>
                    {{ __('lang.many_categories') }}
                </p>
            </div>
            <div class="five-item-carousel owl-carousel owl-theme dots-style-one owl-nav-none">
                @foreach( $categories as $category )
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="shape">
                                <div class="shape-1" style="background-image: url({{ asset('front_assets/images/shape/shape-1.png') }});"></div>
                                <div class="shape-2" style="background-image: url({{ asset('front_assets/images/shape/shape-e.png') }});"></div>
                            </div>
                            <div class="icon-box"><i class="icon-6"></i></div>
                            <h5>
                                {{ $category->name }}
                            </h5>
                            <span>
                                {{ $category->advertisements_count }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- feature-style-three -->
    <section class="feature-style-three">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>
                    {{ __('lang.ads') }}
                </span>
                <h2>
                    {{ __('lang.explore_ads') }}
                </h2>
                <p>
                    {{ __('lang.site_includes') }}
                </p>
            </div>
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">
                            {{ __('lang.recent_ads') }}
                        </li>
                        <li class="tab-btn" data-tab="#tab-2">
                            {{ __('lang.popular_ads') }}
                        </li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            @foreach( $recent_ads as $recent_ad )
                                <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                    <div class="feature-block-one wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img src="{{ asset('storage') . '/' . $recent_ad->cover_image }}" style="width: 200px !important; height: 200px !important;"  alt=""></figure>
                                                @if($recent_ad->is_featured)
                                                    <div class="feature-2">Featured</div>
                                                @endif
                                            </div>
                                            <div class="lower-content">
                                                <div class="category">
                                                    <i class="fas fa-tags"></i>
                                                    <p>
                                                        {{ $recent_ad->category->name }}
                                                    </p>
                                                </div>
                                                <h4>
                                                    <a href="browse-ads-details.html">
                                                        {{ $recent_ad->title}}
                                                    </a>
                                                </h4>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>{{ $recent_ad->created_at->diffForHumans() }}</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>{{ $recent_ad->country->name }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab" id="tab-2">
                        <div class="row clearfix">
                            @foreach( $popular_ads as $ad )
                                <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img src="{{ asset('storage') . '/' . $ad->advertisements->cover_image }}" style="width: 200px !important; height: 200px !important;" alt="">
                                                </figure>
                                                <div class="feature-2">Featured</div>
                                            </div>
                                            <div class="lower-content">
                                                <div class="category">
                                                    <i class="fas fa-tags"></i>
                                                    <p>
                                                        {{ $ad->advertisements->category->name }}
                                                    </p>
                                                </div>
                                                <h4>
                                                    <a href="{{ route('ad.show', ['id' => $ad->advertisements->id]) }}">
                                                        {{ $ad->advertisements->title }}
                                                    </a>
                                                </h4>

                                                <ul class="info clearfix">
                                                    <li>
                                                        <i class="far fa-clock"></i>
                                                        {{ $ad->advertisements->created_at->diffForHumans() }}
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        {{ $ad->advertisements->country->name }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-style-three end -->


    <!-- chooseus-section -->
    <section class="chooseus-section bg-color-1">
        <div class="anim-icon">
            <div class="icon anim-icon-1 rotate-me" style="background-image: url(assets/images/icons/anim-icon-1.png);"></div>
            <div class="icon anim-icon-2 rotate-me" style="background-image: url(assets/images/icons/anim-icon-2.png);"></div>
            <div class="icon anim-icon-3 rotate-me" style="background-image: url(assets/images/icons/anim-icon-2.png);"></div>
            <div class="icon anim-icon-4 rotate-me" style="background-image: url(assets/images/icons/anim-icon-1.png);"></div>
            <div class="icon anim-icon-5 rotate-me" style="background-image: url(assets/images/icons/anim-icon-2.png);"></div>
        </div>
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-4.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-11.png);"></div>
            <div class="pattern-3" style="background-image: url(assets/images/shape/shape-11.png);"></div>
        </div>
        <figure class="image-layer"><img src="assets/images/resource/chooseus-1.png" alt=""></figure>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                    <div class="content_block_2">
                        <div class="content-box">
                            <div class="sec-title light">
                                <span>
                                    {{ __('lang.why_choose_us') }}
                                </span>
                                <h2>
                                    {{ __('lang.why_choose_nashir') }}
                                </h2>
                            </div>
                            <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h3>
                                        {{ __('lang.ad_posting') }}
                                    </h3>
                                    <p>
                                        {{ __('lang.reach_others') }}
                                    </p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-27"></i></div>
                                    <h3>
                                        {{ __('lang.ad_share') }}
                                    </h3>
                                    <p>
                                        {{ __('lang.get_rewards') }}
                                    </p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-27"></i></div>
                                    <h3>
                                        {{ __('lang.ad_share') }}
                                    </h3>
                                    <p>
                                        {{ __('lang.get_rewards') }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->


    <!-- place-section -->
    <section class="place-section centred">
        <div class="auto-container">
            <div class="inner-content">
                <div class="sec-title centred">
                    <span>
                        {{ __('lang.top_countries') }}
                    </span>
                    <h2>
                        {{ __('lang.popular_Country') }}
                    </h2>
                    <p>
                        {{ __('lang.by_country') }}
                    </p>
                </div>
                <div class="row clearfix">
                    @foreach( $ad_countries as $ad_country )
                        <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                            <div class="place-block-one wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/place-1.jpg') }}" alt=""></figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h3>
                                                <a href="#">
                                                    {{ $ad_country->country->name }}
                                                </a>
                                            </h3>
                                            <span>{{ $ad_country->country->advertisements_count }} {{ __('lang.ads') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->


    <!-- download-section -->
    <section class="download-section">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-8.png);"></div>
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="assets/images/resource/laptop-1.png" alt=""></figure>
                        <figure class="image image-2 rotate-me"><img src="assets/images/resource/ball-1.png" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <span class="upper-text">
                                {{ __('lang.coming_soon') }}
                            </span>
                            <h2>
                                {{ __('lang.download') }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- download-section end -->


    <!-- news-section -->
    <section class="news-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>
                    {{ __('lang.blogs') }}
                </span>
                <h2>
                    {{ __('lang.recent_blogs') }}
                </h2>
            </div>
            <div class="row clearfix">
                @foreach( $blogs as $blog )
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ asset('storage') . '/' . $blog->cover_image }}" alt="">
                                    <a href="{{ route('blog.index') }}"><i class="fas fa-link"></i></a>
                                </figure>
                                <div class="lower-content">
                                    <figure class="admin-thumb">
                                        <img src="{{ asset('assets/images/news/admin-1.png') }}" alt="">
                                    </figure>
                                    <span class="category">
                                        {{ $blog->category->name }}
                                    </span>
                                    <h3>
                                        <a href="{{ route('blog.index') }}">
                                            {!! (app()->getLocale() == 'ar') ? $blog->title_ar : $blog->title_en  !!}
                                        </a>
                                    </h3>
                                    <p>
                                        {!! (app()->getLocale() == 'ar') ? $blog->description_ar : $blog->description_en !!}
                                    </p>
                                    <span class="post-info">By <a href="blog-details.html">{{ $blog->admin->first_name }}</a> - {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM DD, YYYY') }}/span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-9.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <div class="icon-box"><i class="icon-25"></i></div>
                        <h2>
                            {{ __('lang.subscribe') }}
                        </h2>
                        <p>
                            {{ __('lang.and') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <form action="#" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="{{ __('lang.put_email') }}" required="">
                            <button type="button" class="theme-btn-one">
                                {{ __('lang.subscribe_now') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->

</x-front-layout>
