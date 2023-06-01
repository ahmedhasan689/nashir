<x-front-layout title="Categories">
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred">
                <div class="title">
                    <h1>
                        {{ __('lang.categories') }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li>
                        <a href="{{ route('home') }}">
                            {{ __('lang.home') }}
                        </a>
                    </li>
                    <li>{{ __('lang.categories') }}</li>
                </ul>
            </div>
            <div class="search-box-inner">
                <form action="{{ route('home.search') }}" method="post">
                    @csrf
                    <div class="input-inner clearfix">
                        <div class="form-group">
                            <i class="icon-2"></i>
                            <input type="search" name="name" placeholder="{{ __('lang.search') }}">
                        </div>
                        <div class="form-group">
                            <i class="icon-3"></i>
                            <select class="wide">
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
                                <option data-display="{{ __('lang.select_category') }}">
                                    {{ __('lang.select_category') }}
                                </option>
                                @foreach( $categories as $category )
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="btn-box">
                            <button type="submit"><i class="icon-2"></i>{{ __('lang.search') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- category-style-two -->
    <section class="category-style-two">
        <div class="auto-container">
            <div class="sec-title centred">
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
            <div class="row clearfix">
                @foreach( $categories as $category )
                    <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                    <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box" style="height: 150px;">
                                <img src="{{ asset('storage') . '/' . $category->cover_image }}" alt="">
                            </figure>
                            <div class="lower-content">
                                <span>52</span>
                                <div class="icon-box">
                                    <i class="icon-6"></i>
                                </div>
                                <h4>
                                    <a href="{{ route('category.show', ['id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- category-style-two end -->


    <!-- subscribe-section -->
    <section class="subscribe-section">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-9.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <div class="icon-box"><i class="icon-25"></i></div>
                        <h2>{{ __('lang.subscribe') }}</h2>
                        <p>{{ __('lang.and') }}</p>
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
