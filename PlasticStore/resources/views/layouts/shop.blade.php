<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website." />
    <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template" />
    <meta name="author" content="elemis" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/fe/img/favicon.png') }} />
        <link rel=" stylesheet" href="{{ asset('assets/fe/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fe/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fe/css/colors/purple.css') }}" />
    <link rel="preload" href="{{ asset('assets/fe/css/fonts/thicccboi.css') }}" as="style" onload="this.rel='stylesheet'" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div class="content-wrapper">
        @if (session('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!--Navbar-->
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-50">
                        <a href="{{url('/')}}">
                            <h1>Plastic Store</h1>
                            {{-- <img src="{{ asset('assets/fe/img/FS-sm.png') }}"
                            srcset="{{ asset('assets/fe/img/FS-lg.png') }} 2x" alt="" /> --}}
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("categories")}}">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("brands")}}">Brands</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("sub_processes")}}">Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("products")}}">Products</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                                    <br />
                                    00 (123) 456 78 90 <br />
                                    <nav class="nav social social-white mt-4">
                                        <a href="#"><i class="uil uil-twitter"></i></a>
                                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                                        <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a>
                                        <a href="#"><i class="uil uil-youtube"></i></a>
                                    </nav>
                                    <!-- /.social -->
                                </div>
                            </div>
                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            @if (!Auth::user())
                            <li class="nav-item d-none d-md-block">
                                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill">Login</a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link position-relative d-flex flex-row align-items-center" href="{{ route('cart.checkout') }}">
                                    <i class="uil uil-shopping-cart"></i>
                                    @php
                                    $cart = session('cart');
                                    $cartCount = is_array($cart) ? count($cart) : 0;
                                    @endphp
                                    <span class="badge badge-cart bg-primary">{{ $cartCount }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                            <li class="nav-item dropdown d-none d-md-block">
                                <h6 class="dropdown-item btn btn-primary rounded-pill dropdown-item">Halo, {{ Auth::user()->name}}</h6>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="dropdown-item" href="{{ route('profile') }}"><i class="uil uil-setting"></i> Profile</a></li>
                                    @can('is-admin')
                                    <li class="nav-item"><a class="dropdown-item" href="{{url('/admin')}}"><i class="uil uil-user-md"></i> Admin</a></li>
                                    @endcan
                                    <li class="nav-item"><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="uil uil-signout"></i> Keluar</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" hidden>
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/.dropdown-menu -->
                            </li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                            @endif
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->


        </header>
        <!--Main Content taruh sini-->
        @yield('content')
        {{--
        <section class="wrapper bg-gradient-primary">
            <div class="container pt-10 pt-md-14">
                test content
            </div>
            <!-- /.container -->
        </section> --}}
    </div>

    <!--Footer-->
    <footer class="bg-dark text-inverse">
        <div class="container py-13 py-md-15">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        {{-- <img class="mb-4" src="{{ asset('assets/fe/img/logo-light.png') }}"
                        srcset="{{ asset('assets/fe/img/logo-light.png') }} 2x" alt="" /> --}}
                        <h4 class="widget-title text-white mb-3">Plastic Store</h4>
                        <p class="mb-4">© 2023 Cahaya Makmur Wijaya. <br class="d-none d-lg-block" />All rights reserved.</p>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                        <address class="pe-xl-15 pe-xxl-17">Jalan Mawar Nomor 7
                            Kelurahan Tegalsari, Kecamatan Tegalsari, Kota Surabaya, Provinsi Jawa Timur
                        </address><br>
                        <a href="mailto:#">junius@cahayamakmurwijaya.com</a><br /> 082244776001
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Learn More</h4>
                        <ul class="list-unstyled  mb-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-12 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Our Newsletter</h4>
                        <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
                        <div class="newsletter-wrapper">
                            <!-- Begin Mailchimp Signup Form -->
                            <div id="mc_embed_signup2">
                                <form action="https:/elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll2">
                                        <div class="mc-field-group input-group form-floating">
                                            <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                                            <label for="mce-EMAIL2">Email Address</label>
                                            <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                                        </div>
                                        <div id="mce-responses2" class="clear">
                                            <div class="response" id="mce-error-response2" style="display:none">
                                            </div>
                                            <div class="response" id="mce-success-response2" style="display:none">
                                            </div>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </div>
                        <!-- /.newsletter-wrapper -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="{{ asset('assets/fe/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/fe/js/theme.js') }}"></script>
    @yield('js')
</body>