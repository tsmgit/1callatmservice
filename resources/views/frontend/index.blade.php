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
    <link href="{{asset('public/frontend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/custom-style.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/responsive.css" rel="stylesheet" />
    <link href="{{asset('public/frontend')}}/assets/css/owl.css" rel="stylesheet" />
    <!-- sweetalert js -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <title>{{$home->meta_title}} | 1 Call ATM Service LLC</title>
    <meta name="description" content="{{$home->meta_desc}}">
    <meta name="keywords" content="{{$home->meta_keyword}}">
    
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
                                <span>{{$get_settings->phone}}</span>
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
        <div class="header__banner__main">
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
                                    <a href="{{route('about_us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{route('products')}}">Products</a>
                                </li>
                                <li>
                                    <a href="{{route('blogs')}}">Blog</a>
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
                        </div>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 m-auto">
                        <div class="row">
                            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                <div class="banner__contain">
                                    <h2>{{$home->heading}}</h2>
                                    <h1>{{$home->title}}</h1>
                                    <p class="line-clamp line-clamp--5">
                                        {!!$home->description!!}
                                    </p>
                                    <a href="{{$home->button_url}}">get started</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                <img src="{{asset('public/admin/assets/banner/'.$home->image)}}" alt="" class="atm__all" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadowone">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 m-auto">
                        <img src="{{asset('public/frontend')}}/assets/images/sadow.png" alt="" class="shadow__all" />
                    </div>
                </div>
            </div>
        </div>
        <div class="welcome__about">
            <div class="container">
                <div class="row">
                    <div class="about__holder">
                        <div class="right_pat"></div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7">
                                <div class="welcome__img">
                                    <img src="{{asset('public/admin/assets/about/'.$home->about_image)}}" alt="" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                                <h3 class="about__text">{{$home->about_heading}}</h3>
                                <h2>{{$home->about_title}}</h2>
                                <p>
                                    {!!$home->about_desc!!}
                                </p>
                                <a href="{{$home->about_button_url}}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services__wrapp">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <h2>{{$home->service_heading}}</h2>
                        <p>
                            {!!$home->service_desc!!}
                        </p>
                    </div>
                    @if(isset($servicess))
                    @foreach($servicess as $service)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="box__holder">
                            <div class="imh__holder">
                                @if($service->logo)
                                <img src="{{asset('public/admin/assets/service/'.$service->logo)}}" alt="" />
                                @endif
                            </div>
                            <h3 class="atm__holder">
                                <a href="{{route('service_details',$service->slug)}}">{{$service->title}}
                                    <img src="{{asset('public/frontend')}}/assets/images/round.png" alt="" /></a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="product__wrapp">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Our Products</h2>
                    </div>
                    @if(isset($products))
                    @foreach($products as $product)
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-md-4 mb-sm-4 mb-4">
                        <div class="card__wrapp">
                            <div class="cardproduct">
                                @if($product->image)
                                <img src="{{asset('public/admin/assets/product/'.$product->image)}}" alt="" />
                                @endif
                            </div>
                            <h4>{{$product->title}}</h4>
                            <a href="{{route('product_details',$product->slug)}}">View Details</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        
        <div class="blog__wrapp d-none">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Visit Our Blogs</h2>
                    </div>
                    <div id="blog" class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'>
                        
                    </div>
                </div>
            </div>
        </div>
    <div class="testi__wrapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>What Clients Say</h3>
                    <h2>About Us</h2>
                </div>
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8 m-auto">
                    <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
                        @if(isset($testimonials))
                        @foreach($testimonials as $list)
                        <div class="slide-item">
                            <div class="tes">
                                @if($list->image)
                                <img src="{{asset('public/admin/assets/testimonial/'.$list->image)}}" alt="" />
                                @endif
                                <div class="star__holder">
                                    <ul>
                                        @if($list->rating == 1)
                                        <li><i class="fa-solid fa-star"></i></li>
                                        @elseif($list->rating == 2)
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        @elseif($list->rating == 3)
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        @elseif($list->rating == 4)
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        @elseif($list->rating == 5)
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        @endif
                                    </ul>
                                </div>
                                <p>
                                    {!!$list->description!!}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer__wrapp">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-12 col-lg-12 col-xl-8 m-auto">
                    <div class="footer__nav">
                        <ul>
                            <li>
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about_us')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{route('products')}}">Products</a>
                            </li>
                            <li>
                                <a href="#">Service </a>
                            </li>
                            <li>
                                <a href="{{route('contact_us')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 m-auto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="box__wrapp">
                                <div class="mail__holder">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <a href="mailto:{{$get_settings->mail}}">{{$get_settings->mail}}</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="subscribe">
                                <img src="{{asset('public/admin/assets/setting/'.$get_settings->footer_logo)}}" alt="" class="m-auto d-block" />
                                <form method="post" action="{{route('submit_newsletter')}}">
                                    @csrf
                                    <div class="subs__search">
                                        <input type="text" name="email" placeholder="Enter your email to get updates" required />
                                        <input type="submit" value="Submit" class="ml-auto" />
                                    </div>
                                    @error('email')
                                    <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    @if(session('success'))
                                    <span class="text text-success">{{session('success')}}</span>
                                    @endif
                                </form>
                                <div class="socialicon__header">
                                    <ul class="text-center mt-4">
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
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="box__wrapp">
                                <div class="mail__holder">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <div class="center_text">
                                    <a href="tel:{{$get_settings->phone}}">{{$get_settings->phone}}</a>
                                    <a href="tel:{{$get_settings->phone2}}">{{$get_settings->phone2}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrapp">
                    <p>© <?php echo date('Y'); ?> 1CALL ATM SERVICE . All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('public/frontend')}}/assets/vendor/jquery/jquery.slim.min.js"></script>
    <script src="{{asset('public/frontend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend')}}/assets/js/core.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/owl.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/script.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/swiper.min.js"></script>
    <script src="{{asset('public/frontend')}}/assets/js/core.js"></script>

    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
        (function() {
            $(".hamburger-menu").on("click", function() {
                $(".bar").toggleClass("animate");
            });
        })();
        
        $(document).ready(function() {
            fetch("https://1callatmservice.com/blog/wp-content/themes/1callatm/api/blog.php")
            .then(response => response.json())
            .then(data => {
                data.posts.forEach(post => {
                    $("#blog").append(`                        
                            <div class="slide-item bg__one">
                                <div class="image__box">
                                    <img src="${post.image}" alt="" />
                                </div>
                                <div class="blog__text">
                                    <h3>${post.title}</h3>
                                    <p>
                                       ${post.excerpt}
                                    </p>
                                    <a href="${post.link}">
                                        <img src="{{asset('public/frontend')}}/assets/images/round.png" alt="" />
                                    </a>
                                </div>
                            </div>`)
                })
                
                $("#blog").owlCarousel()
            })
        })
    </script>

</body>

</html>