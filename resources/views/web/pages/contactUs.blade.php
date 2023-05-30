<x-front-layout title="{{ __('lang.packages_page') }}">

    @section('css')
        <style>
            .directionRTL {
                display: flex !important;
            }
        </style>
    @endsection

    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>
                        {{ __('lang.contact_us') }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">
                            {{ __('lang.home') }}
                        </a></li>
                    <li>{{ __('lang.contact_us') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- contact-section -->
    <section class="contact-section bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                    <div class="contact-info-inner">
                        <div class="sec-title">
                            <span>Contact Us</span>
                            <h2>Our Contacts & Location</h2>
                        </div>
                        <div class="single-box">
                            <h3>Opening hours</h3>
                            <ul class="list clearfix">
                                <li>Daily: 9.30 AM–6.00 PM</li>
                                <li>Sunday & Holidays: Closed</li>
                            </ul>
                        </div>
                        <div class="single-box">
                            <h3>Contact info</h3>
                            <ul class="list clearfix">
                                <li>77408 Satterfield Motorway Suite <br />469 New Antonetta, BC K3L6P6</li>
                                <li><a href="mailto:example@info.com">example@info.com</a></li>
                                <li><a href="tel:6174959400326">(617) 495-9400-326</a></li>
                            </ul>
                        </div>
                        <div class="single-box">
                            <h3>Social contact</h3>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h2 @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                            {{ __('lang.get_in_touch') }}
                        </h2>
                        <form method="post" action="{{ route('contact_dashboard.store') }}" method="POST"  class="default-form">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                                        {{ __('lang.your_name') }}*
                                    </label>
                                    <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="{{ __('lang.your_name') }} ...">
                                    @error('name')
                                        <span class="text-danger @if( app()->getLocale() == 'ar' ) directionRTL @endif">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label  @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                                        {{ __('lang.your_email') }}*
                                    </label>
                                    <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="{{ __('lang.your_email') }} ...">
                                    @error('email')
                                        <span class="text-danger @if( app()->getLocale() == 'ar' ) directionRTL @endif">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                                        {{ __('lang.your_phone') }}*
                                    </label>
                                    <input type="text" name="phone_number" class="@error('phone_number') is-invalid @enderror" placeholder="{{ __('lang.your_phone') }} ...">
                                    @error('phone_number')
                                        <span class="text-danger @if( app()->getLocale() == 'ar' ) directionRTL @endif">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                                        {{ __('lang.subject') }}*
                                    </label>
                                    <input type="text" name="subject" class="@error('subject') is-invalid @enderror" placeholder="{{ __('lang.subject') }} ...">
                                    @error('subject')
                                        <span class="text-danger @if( app()->getLocale() == 'ar' ) directionRTL @endif">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label @if( app()->getLocale() == 'ar' ) class="directionRTL" @endif>
                                        {{ __('lang.your_message') }}*
                                    </label>
                                    <textarea name="message" class="@error('message') is-invalid @enderror" placeholder="{{ __('lang.your_message') }}"></textarea>
                                    @error('message')
                                        <span class="text-danger @if( app()->getLocale() == 'ar' ) directionRTL @endif">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn-one" type="submit">
                                        {{ __('lang.submit_now') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <!-- google-map-section -->
    <section class="google-map-section">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd"></iframe>
        </div>
    </section>
    <!-- google-map-section end -->
</x-front-layout>
