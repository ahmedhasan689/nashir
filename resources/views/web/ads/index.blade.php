<x-front-layout title="{{ __('lang.ads') }}">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>
                        {{ __('lang.browse_ads') }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li>
                        <a href="{{ route('home') }}">
                            {{ __('lang.home') }}
                        </a>
                    </li>
                    <li>
                        {{ __('lang.browse_ads') }}
                    </li>
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
                                <h3>
                                    {{ __('lang.search') }}
                                </h3>
                            </div>
                            <div class="widget-content">
                                <form action="{{ route('home.search') }}" method="post" class="search-form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="{{ __('lang.search') }}" required="">
                                        <button type="submit">
                                            <i class="icon-2"></i>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <i class="icon-3"></i>
                                        <select class="wide" name="country">
                                            <option data-display="{{ __('lang.select_country') }}">{{ __('lang.select_country') }}</option>
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
                                </form>
                            </div>
                        </div>
{{--                        <div class="sidebar-category sidebar-widget">--}}
{{--                            <div class="widget-title">--}}
{{--                                <h3>Category</h3>--}}
{{--                            </div>--}}
{{--                            <div class="widget-content">--}}
{{--                                <ul class="category-list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            All--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    @foreach( $categories as $category )--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                {{ $category->name }}--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="category-details-content">
                        <div class="category-block wrapper list browse-add">
                            <div class="list-item feature-style-three pd-0">
                                @foreach( $ads as $ad )
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img src="{{ asset('storage') . '/' . $ad->cover_image }}" style="height: 199px;width: 200px !important;" alt="">
                                                </figure>
                                                @if( $ad->is_featured == 1 )
                                                    <div class="feature-2">
                                                        {{ __('lang.featured') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="lower-content" @if(app()->getLocale() == 'ar') style="padding-right: 20px" @endif>
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
                                                <ul class="info clearfix">
                                                    <li>
                                                        <i class="far fa-clock"></i>
                                                        {{ $ad->created_at->diffForHumans() }}
                                                    </li>
                                                    <li><i class="fas fa-map-marker-alt"></i>{{ $ad->country->name }}</li>
                                                </ul>

                                            </div>
                                            <div class="btn-box " @if(app()->getLocale() == 'ar') style="left: 30px; right: unset" @endif><a href="{{ route('ad.show', ['id' => $ad->id]) }}" class="theme-btn-one">
                                                    {{ __('lang.details') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="pagination-wrapper centred">
                            {{ $ads->links('web.blogs.pagination') }}
                        </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category-details end -->
</x-front-layout>
