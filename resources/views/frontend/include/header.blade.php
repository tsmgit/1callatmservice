@php
$get_settings = DB::table('header_and_footers')->where('id',1)->first();
$services = DB::table('services')->where('status', 1)->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/assets/images/fav.png') }}" sizes="32x32">

    <link href="{{asset('public/frontend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/custom-style.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/responsive.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/owl.css" rel="stylesheet" />
    <!-- sweetalert js -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <title>@yield('meta_title') | 1 Call ATM Service LLC</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keywords" content="@yield('meta_keyword')">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FWYQB5YSN0"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-FWYQB5YSN0');
    </script>
</head>

<body>
    <header>
        <div class="header__top">
            <div class="container">
                <a class="" href="{{route('index')}}">
                    <div class="logo__holder">
                        <img src="{{asset('public/admin/assets/setting/'.$get_settings->header_logo)}}" alt="" class="header__logo" />
                    </div>
                </a>
                <div class="header__content__inner">
                    <div class="contact__info__outer">
                        <div class="contact__info email__wrapp">
                            <a href="tel:{{$get_settings->phone}}">
                                <i class="fa-solid fa-phone"></i>
                                <span>{{$get_settings->phone}} </span>
                            </a>
                            <a href="tel:{{$get_settings->phone2}}">
                                <i class="fa-solid fa-phone"></i>
                                <span>{{$get_settings->phone2}}</span>
                            </a>
                        </div>
                        <div class="contact__info phone__wrapp">
                            <a href="mailto:{{$get_settings->mail}}" class="email__wrapp" style="color:#000;font-size:19px;font-weight: 400; margin-right: 8px;">
                                <i class="fa-solid fa-envelope" style="color:#C70000;"></i>
                                <span>{{$get_settings->mail}}</span>
                            </a>
                            <div class="socialicon__header">
                                <ul>
                                    @if($get_settings->fb_link)
                                    <li>
                                        <a href="{{$get_settings->fb_link}}" target="_blank" class="">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                        @endif
                                        @if($get_settings->twitter_link)
                                    <li>
                                        <a href="{{$get_settings->twitter_link}}">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                        @endif
                                        @if($get_settings->instagram_link)
                                    <li>
                                        <a href="{{$get_settings->instagram_link}}">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                        @endif
                                        @if($get_settings->youtube_link)
                                    <li>
                                        <a href="{{$get_settings->youtube_link}}">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </li>
                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main__body__wrapp">
        <div class="header__banner__main header__banner__inner">
            <div class="container">
                <nav class="navbar navbar-expand-lg static-top">
                    <div class="container main__header__content">
                        <button class="navbar-toggler navbar-toggler-right hamburger-menu order-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <div class="mobile__responsive__logo d-xl-none d-lg-block d-md-block d-sm-block pl-3 pr-3 pt-3 pb-3">
                                <img src="{{asset('public/frontend')}}/assets/images/logo.png" alt="" class="" />
                            </div>
                            <ul class="navbar-nav">
                                <li>
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('about_us')}}">About Us </a>
                                </li>
                                <li>
                                    <a href="{{route('products')}}">Products </a>
                                </li>
                                <li>
                                    <a href="blogs">Blog</a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Service </a>
                                    <ul class="dropdown-menu">
                                        @if(isset($services))
                                        @foreach($services as $service)
                                        <li><a href="{{route('service_details',$service->slug)}}">{{$service->title}}</a></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('contact_us')}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>