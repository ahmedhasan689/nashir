<x-front-layout title="{{ __('lang.packages_page') }}">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>
                        {{ __('lang.packages_page') }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li>
                        <a href="{{ route('home') }}">
                            {{ __('lang.index') }}
                        </a>
                    </li>
                    <li>
                        {{ __('lang.packages') }}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- pricing-section -->
    <section class="pricing-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>
                    {{ __('lang.packages') }}
                </span>
                <h2>
                    {{ __('lang.packages_desc') }}
                </h2>
            </div>
            <div class="row clearfix">
                @foreach( $packages as $package )
                    <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one">
                            <div class="pricing-table">
                                <div class="teble-header">
                                    <p>
                                        {{ app()->getLocale() === 'ar' ? $package->name_ar : $package->name_en }}
                                    </p>
                                    <h2>
                                        ${{ $package->price }}
                                        <span>
                                            / {{ $package->duration }} {{ __('lang.months') }}
                                        </span>
                                    </h2>
                                </div>
                                <div class="table-content">
                                    <ul class="list clearfix">
                                        <li>{{ __('lang.views_number') ." :" . $package->views_number }}</li>
                                        <li>{{ __('lang.bonus_value') ." :" . $package->bonus_value }}</li>
                                    </ul>
                                </div>
                                <div class="table-footer">
                                    <a href="#">
                                        {{ __('lang.buy_now') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- pricing-section end -->
</x-front-layout>
