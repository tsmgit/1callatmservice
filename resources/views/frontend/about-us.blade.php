@section('meta_title',"$company->meta_title")
@section('meta_desc',"$company->meta_desc")
@section('meta_keyword',"$company->meta_keyword")
@include('frontend.include.header')
<div class="banner__content">
    <div class="banner__content__inner">
        <h1>About Us</h1>
    </div>
</div>
</div>
<div class="welcome__about inner__page">
    <div class="container">
        <div class="row">
            <div class="about__holderone">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
                        <div class="welcome__img">
                            <img src="{{asset('public/admin/assets/company/'.$company->image)}}" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <h2>{{$company->title}}</h2>
                        <p>
                            {!!$company->description!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="our__mission">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="welcome__img after__image m-0">
                    <img src="{{asset('public/admin/assets/company/'.$company->mission_img)}}" alt="" />
</div>
<h2>{{$company->mission_heading}}</h2>
<p>
    {!!$company->mission_desc!!}
</p>
</div>
<div class="col-sm-6">
    <div class="welcome__img after__image m-0">
        <img src="{{asset('public/admin/assets/company/'.$company->story_img)}}" alt="" />
    </div>
    <h2>{{$company->story_heading}}</h2>
    <p>
        {!!$company->story_description!!}
    </p>
</div>
</div>
</div>
</div>--}}
{{--<div class="blog__wrapp">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Visit Our Blogs</h2>
            </div>
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'>
@if(isset($blogs))
@foreach($blogs as $list)
<div class="slide-item bg__one">
    <div class="image__box">
        <img src="{{asset('public/admin/assets/blog/'.$list->image)}}" alt="" />
    </div>
    <div class="blog__text">
        <h3>{{$list->title}}</h3>
        <p>
            {!!$list->short_desc!!}
        </p>
        <a href="{{route('blog_details',$list->slug)}}"><img src="{{asset('public/frontend')}}/assets/images/round.png" alt="" /></a>
    </div>
</div>
@endforeach
@endif
</div>
</div>
</div>
</div>--}}
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
@include('frontend.include.footer')