<x-front-layout title="Ads">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Browse Ads List</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Browse Ads List</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- category-details -->
    <section class="category-details bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar category-sidebar">
                        <div class="sidebar-search sidebar-widget">
                            <div class="widget-title">
                                <h3>Search</h3>
                            </div>
                            <div class="widget-content">
                                <form action="#" method="post" class="search-form">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Search Keyword..." required="">
                                        <button type="submit">
                                            <i class="icon-2"></i>
                                        </button>
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
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-category sidebar-widget">
                            <div class="widget-title">
                                <h3>Category</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list">
                                    <li>
                                        <a href="category-details.html">
                                            All
                                        </a>
                                    </li>
                                    @foreach( $categories as $category )
                                        <li>
                                            <a href="#">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
{{--                            <div class="price-range mt-4">--}}

{{--                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--                                    <button type="submit" class="theme-btn-one">Apply price</button>--}}
{{--                                </div>--}}

{{--                            </div>--}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="category-details-content">
                        <div class="item-shorting clearfix">
                            <div class="text pull-left">
                                <p>
                                    <span>Search Reasults:
                                    </span>
                                    Showing 1-6 of 20 Listings
                                </p>
                            </div>
                            <div class="right-column pull-right clearfix">
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="Sort by: Default">Sort by: Default</option>
                                        <option value="1">Default Sort 01</option>
                                        <option value="2">Default Sort 02</option>
                                        <option value="3">Default Sort 03</option>
                                        <option value="4">Default Sort 04</option>
                                    </select>
                                </div>
                                <div class="menu-box">
                                    <button class="list-view on"><i class="icon-31"></i></button>
                                    <button class="grid-view"><i class="icon-30"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="category-block wrapper list browse-add">
                            <div class="list-item feature-style-three pd-0">
                                @foreach( $ads as $ad )
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img src="{{ asset('storage') . '/' . $ad->cover_image }}" style="height: 269px;width: 200px !important;" alt="">
                                                </figure>
                                                @if( $ad->is_featured == 1 )
                                                    <div class="feature-2">
                                                        Featured
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="lower-content">
                                                <div class="category">
                                                    <i class="fas fa-tags"></i>
                                                    <p>
                                                        {{ $ad->category->name }}
                                                    </p>
                                                </div>
                                                <h4>
                                                    <a href="{{ route('ad.show', ['id' => $ad->id]) }}">
                                                        {{ $ad->title }}
                                                    </a>
                                                </h4>
                                                <ul class="rating clearfix">
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><a href="index.html">(32)</a></li>
                                                </ul>
                                                <ul class="info clearfix">
                                                    <li>
                                                        <i class="far fa-clock"></i>
                                                        {{ $ad->created_at->diffForHumans() }}
                                                    </li>
                                                    <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                                </ul>
                                                <div class="lower-box">
                                                    <ul class="react-box">
                                                        <li class="share-option">
                                                            <a href="browse-add-details.html" class="share-btn"><i class="fas fa-share-alt"></i></a>
                                                            <ul class="d-none">
                                                                <li><a href="browse-add-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li><a href="browse-add-details.html"><i class="fab fa-twitter"></i></a></li>
                                                                <li><a href="browse-add-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                                                                <li><a href="browse-add-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                    </ul>
                                                    <h5>

                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="btn-box"><a href="browse-ads-details.html" class="theme-btn-one">Details</a></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="pagination-wrapper centred">
                            <ul class="pagination clearfix">
                                <li><a href="category-details.html"><i class="far fa-angle-left"></i>Prev</a></li>
                                <li><a href="category-details.html" class="current">01</a></li>
                                <li><a href="category-details.html">02</a></li>
                                <li><a href="category-details.html">03</a></li>
                                <li><a href="category-details.html">Next<i class="far fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category-details end -->
</x-front-layout>
