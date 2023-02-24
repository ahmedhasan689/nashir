<x-front-layout title="Login">
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url({{ asset('dashboard_assets/images/background/page-title.jpg') }});">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Log in</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li>Log in</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- login-section -->
    <section class="login-section bg-color-2">
        <div class="auto-container">
            <div class="inner-container">
                <div class="inner-box">
                    <h2>Log in</h2>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('login') }}" method="post" class="login-form">
                        @csrf

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="form-group">
                            <div class="text">
                                <a href="login.html">
                                    Forget Password?
                                </a>
                            </div>
                        </div>
                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn-one">Login Now</button>
                        </div>
                    </form>
                    <div class="other-content centred">
{{--                        <div class="text"><span>or</span></div>--}}
{{--                        <ul class="social-links clearfix">--}}
{{--                            <li><a href="login.html"><i class="fab fa-facebook-f"></i>Login with Facebook</a></li>--}}
{{--                            <li><a href="login.html"><i class="fab fa-google-plus-g"></i>Login with Google Plus</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <div class="othre-text">
                            <p>
                                Don’t have an account?
                                <a href="{{ route('register') }}">
                                    Register Now
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login-section end -->

</x-front-layout>
