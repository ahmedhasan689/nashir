<!DOCTYPE html>
<html lang="{{ app()->getLocale() == 'ar' ? "ar" : "en" }}" dir="{{ app()->getLocale() == 'ar' ? "rtl" : "ltr" }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>
        {{ $title ?? 'Nashir' }}
    </title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">
    @if( app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper @if( app()->getLocale() == 'ar' ) rtl @endif">


{{--    <!-- preloader -->--}}
{{--    <div class="preloader"></div>--}}
{{--    <!-- preloader -->--}}


    <!-- main header -->
    <header class="main-header style-three">

        <!-- header-lower -->
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo-2.png') }}" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="menu-area">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li >
                                        <a href="{{ route('home') }}">
                                            {{ __('lang.home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category.index') }}">
                                            {{ __('lang.categories') }}
                                        </a>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Browse Ads</a>
                                        <ul>
                                            <li><a href="browse-ads-1.html">Browse Ads Grid</a></li>
                                            <li><a href="browse-ads-2.html">Browse Ads List</a></li>
                                            <li><a href="browse-ads-3.html">Grid Half</a></li>
                                            <li><a href="browse-ads-4.html">List Half</a></li>
                                            <li><a href="browse-ads-details.html">Browse Ads Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Pages</a>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="stores.html">Our Stores</a></li>
                                            <li><a href="stores-details.html">Stores Details</a></li>
                                            <li><a href="faq.html">Faq'S</a></li>
                                            <li><a href="pricing.html">Pricing Table</a></li>
                                            <li><a href="login.html">Login Page</a></li>
                                            <li><a href="signup.html">Signup Page</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="error.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Elements</a>
                                        <div class="megamenu">
                                            <div class="row clearfix">
                                                <div class="col-xl-6 column">
                                                    <ul>
                                                        <li><h4>Elements 1</h4></li>
                                                        <li><a href="about-element.html">About Block</a></li>
                                                        <li><a href="category-element-1.html">Category Block 01</a></li>
                                                        <li><a href="category-element-2.html">Category Block 02</a></li>
                                                        <li><a href="category-element-3.html">Category Block 03</a></li>
                                                        <li><a href="place-element-1.html">Place Block 01</a></li>
                                                        <li><a href="place-element-2.html">Place Block 02</a></li>
                                                        <li><a href="news-element-1.html">News Block 01</a></li>
                                                        <li><a href="news-element-2.html">News Block 02</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-xl-6 column">
                                                    <ul>
                                                        <li><h4>Elements 2</h4></li>
                                                        <li><a href="feature-element-1.html">Feature Block 01</a></li>
                                                        <li><a href="feature-element-2.html">Feature Block 02</a></li>
                                                        <li><a href="Process-element-1.html">Process Block 01</a></li>
                                                        <li><a href="Process-element-2.html">Process Block 02</a></li>
                                                        <li><a href="testimonial-element.html">Testimonial Block</a></li>
                                                        <li><a href="clients-element.html">Clients Block</a></li>
                                                        <li><a href="newsletter-element.html">Newsletter Block</a></li>
                                                        <li><a href="chooseus-element.html">Chooseus Block</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown"><a href="index.html">Blog</a>
                                        <ul>
                                            <li>
                                                <a href="blog.html">
                                                    Blog Grid
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-2.html">
                                                    Blog Standard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">
                                                    Blog Details
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        @if( app()->getLocale() == 'en' )
                                            <a rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                                {{ 'Arabic' }}
                                            </a>
                                        @else
                                            <a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                                {{ 'English' }}
                                            </a>
                                        @endif
{{--                                        <a href="index.html">Arabic</a>--}}
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="btn-box">
                        <a href="{{ route('login') }}" class="theme-btn-one">
                            <i class="icon-1"></i>
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><a href="index.html"><img src="assets/images/logo.png" alt=""></a></figure>
                    </div>
                    <div class="menu-area">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <div class="btn-box">
                        <a href="browse-ads-details.html" class="theme-btn-one"><i class="icon-1"></i>Submit Ads</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

    {{ $slot }}

    <!-- main-footer -->
    <footer class="main-footer">
        <div class="footer-top" style="background-image: url(assets/images/background/footer-1.jpg);">
            <div class="auto-container">
                <div class="widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="index.html"><img src="assets/images/footer-logo.png" alt=""></a></figure>
                                <div class="text">
                                    <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt ut labore dolore magna aliqua enim ad minim venitam</p>
                                </div>
                                <ul class="social-links clearfix">
                                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml-70">
                                <div class="widget-title">
                                    <h3>Services</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About Us</a></li>
                                        <li><a href="index.html">Listing</a></li>
                                        <li><a href="index.html">How It Works</a></li>
                                        <li><a href="index.html">Our Services</a></li>
                                        <li><a href="index.html">Our Blog</a></li>
                                        <li><a href="index.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget">
                                <div class="widget-title">
                                    <h3>Top News</h3>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <img src="assets/images/resource/footer-post-1.jpg" alt="">
                                            <a href="blog-details.html"><i class="fas fa-link"></i></a>
                                        </figure>
                                        <h5><a href="blog-details.html">The Added Value Social Worker</a></h5>
                                        <p>Mar 25, 2020</p>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb">
                                            <img src="assets/images/resource/footer-post-2.jpg" alt="">
                                            <a href="blog-details.html"><i class="fas fa-link"></i></a>
                                        </figure>
                                        <h5><a href="blog-details.html">Ways to Increase Trust</a></h5>
                                        <p>Mar 24, 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            Flat 20, Reynolds Neck, North Helenaville, FV77 8WS
                                        </li>
                                        <li>
                                            <i class="fas fa-microphone"></i>
                                            <a href="tel:23055873407">+2(305) 587-3407</a>
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:info@example.com">info@example.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="footer-inner clearfix">
                    <div class="copyright pull-left"><p><a href="index.html">Clasifico</a> &copy; 2020 All Right Reserved</p></div>
                    <ul class="footer-nav pull-right clearfix">
                        <li><a href="index.html">Terms of Service</a></li>
                        <li><a href="index.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->



    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="far fa-long-arrow-up"></span>
    </button>
</div>


<!-- jequery plugins -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/validation.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->
</html>
