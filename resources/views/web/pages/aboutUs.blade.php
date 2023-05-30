<x-front-layout title="{{ __('lang.about_us') }}">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <span>About</span>
                                <h2>About Our Company</h2>
                            </div>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image_block_1">
                        <div class="image-box">
                            <div class="image-pattern">
                                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-16.png);"></div>
                                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-16.png);"></div>
                            </div>
                            <figure class="image">
                                <img src="{{ asset('assets/images/resource/about-1.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- testimonial-section -->
    <section class="testimonial-section bg-color-1 sec-pad">
        <figure class="image-layer"><img src="{{ asset('assets/images/resource/testimonial-image-1.png') }}" alt=""></figure>
        <div class="anim-icon">
            <div class="icon anim-icon-1 rotate-me" style="background-image: url(assets/images/icons/anim-icon-1.png);"></div>
            <div class="icon anim-icon-2 rotate-me" style="background-image: url(assets/images/icons/anim-icon-2.png);"></div>
            <div class="icon anim-icon-3 rotate-me" style="background-image: url(assets/images/icons/anim-icon-2.png);"></div>
            <div class="icon anim-icon-4 rotate-me" style="background-image: url(assets/images/icons/anim-icon-1.png);"></div>
        </div>
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-4.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-5.png);"></div>
            <div class="pattern-3" style="background-image: url(assets/images/shape/shape-6.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-12 col-md-12 inner-column">
                    <div class="inner-box">
                        <div class="sec-title light">
                            <span>Testimonials</span>
                            <h2>What client’s say?</h2>
                        </div>
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim  minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-1.png" alt=""></figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim  minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-1.png" alt=""></figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim  minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-1.png" alt=""></figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-9.png') }});"></div>
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
