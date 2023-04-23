<x-front-layout title="Home">
    <!-- banner-section -->
    <section class="banner-section style-three" style="background-image: url(assets/images/banner/banner-3.jpg);">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-8 col-md-6 col-sm-12 content-column">
                    <div class="content-box">
                        <h1>Browse ads through our site</h1>
                        <p>Lots of ads you can find here, post your ad now</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 inner-column">
                    <div class="inner-box">
                        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-12.png);"></div>
                        <h3>Find Product</h3>
                        <form action="#" method="post">
                            <div class="form-group">
                                <i class="icon-2"></i>
                                <input type="search" name="search-field" placeholder="Search Keyword..." required="">
                            </div>
                            <div class="form-group">
                                <i class="icon-3"></i>
                                <select class="wide">
                                    <option data-display="Select Location">Select Location</option>
                                    @foreach( $countries as $country )
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <i class="icon-4"></i>
                                <select class="wide">
                                    <option data-display="Select Category">Select Category</option>
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="theme-btn-one"><i class="icon-2"></i>Search</button>
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
                <span>Categories</span>
                <h2>Explore by Category</h2>
                <p>Many categories and sections, for easy access to ads</p>
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
                <span>Ads</span>
                <h2>Explore Ads</h2>
                <p>
                    The site includes many different advertisements, register on the site and publish the advertisement or help in publishing it on social networking sites
                </p>
            </div>
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Recent Ads</li>
                        <li class="tab-btn" data-tab="#tab-2">Popular Ads</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/feature-15.jpg" alt=""></figure>
                                            <div class="feature-2">Featured</div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="category"><i class="fas fa-tags"></i><p>Electronics</p></div>
                                            <h4><a href="browse-ads-details.html">Villa on Grand Avenue</a></h4>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(32)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>1 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span> $3,000.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInRight animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/feature-16.jpg" alt=""></figure>
                                            <div class="feature-2">Featured</div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="category"><i class="fas fa-tags"></i><p>Electronics</p></div>
                                            <h4><a href="browse-ads-details.html">Villa on Grand Avenue</a></h4>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(25)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>2 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span> $2,000.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInLeft animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/feature-17.jpg" alt=""></figure>
                                            <div class="feature-2">Featured</div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="category"><i class="fas fa-tags"></i><p>Electronics</p></div>
                                            <h4><a href="browse-ads-details.html">Villa on Grand Avenue</a></h4>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(32)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>6 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span> $3,200.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInRight animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="assets/images/resource/feature-18.jpg" alt=""></figure>
                                            <div class="feature-2">Featured</div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="category"><i class="fas fa-tags"></i><p>Electronics</p></div>
                                            <h4><a href="browse-ads-details.html">Villa on Grand Avenue</a></h4>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(32)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>7 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span> $3,500.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <span>Testimonials</span>
                                <h2>Why Choose Classiera</h2>
                            </div>
                            <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h3>Sell Your Product Safely</h3>
                                    <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor.</p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-27"></i></div>
                                    <h3>Meet seller at a safe location</h3>
                                    <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor.</p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><i class="icon-28"></i></div>
                                    <h3>Pay only after collecting item</h3>
                                    <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor.</p>
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
                    <span>Top Places</span>
                    <h2>Most Popular Places</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore <br />dolore magna aliqua enim.</p>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                        <div class="place-block-one wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/place-1.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h3><a href="index.html">Los Angeles</a></h3>
                                        <span>10 Listing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                        <div class="place-block-one wow fadeInDown animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/place-2.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h3><a href="index.html">San Francisco</a></h3>
                                        <span>15 Listing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                        <div class="place-block-one wow fadeInDown animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/place-3.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h3><a href="index.html">California City</a></h3>
                                        <span>08 Listing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 place-block">
                        <div class="place-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/place-4.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h3><a href="index.html">New York City</a></h3>
                                        <span>05 Listing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 place-block">
                        <div class="place-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/place-5.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h3><a href="index.html">Brooklyn City</a></h3>
                                        <span>02 Listing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <span class="upper-text">Download</span>
                            <h2>Download Our Android and IOS App for Experience</h2>
                            <div class="download-btn">
                                <a href="index.html" class="app-store">
                                    <i class="icon-23"></i>
                                    <span>Download on</span>
                                    <h4>App Store</h4>
                                </a>
                                <a href="index.html" class="play-store">
                                    <i class="icon-24"></i>
                                    <span>Get It On</span>
                                    <h4>Google Play</h4>
                                </a>
                            </div>
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
                <span>News & Article</span>
                <h2>Stay Update with Docpro</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/news/news-1.jpg" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img src="assets/images/news/admin-1.png" alt=""></figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">Including animation in your design system</a></h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October 13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/news/news-2.jpg" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img src="assets/images/news/admin-2.png" alt=""></figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">A digital prescription for the industry.</a></h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October 13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/news/news-3.jpg" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img src="assets/images/news/admin-3.png" alt=""></figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">Strategic & commercial approach with issues.</a></h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October 13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <h2>Subscribe to Newsletter</h2>
                        <p>and receive new ads in inbox</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Inout your email address" required="">
                            <button type="submit" class="theme-btn-one">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->

</x-front-layout>
