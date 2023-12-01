                        @php

                        use Illuminate\Support\Carbon;
                        use App\Models\User;
                        use Illuminate\Support\Facades\Auth;

                        $now = Carbon::now();
                        $profile_details = User::where('id', Auth::user()->id)->select('users.*')->first();
                        //dd($profile_details);
                        @endphp
                        @if(Auth::user()->u_type == 'admin')
                        <aside class="app-sidebar">
                            <div class="app-sidebar__logo">
                                <a class="header-brand" href="{{route('dashboard')}}">
                                    <img src="{{asset('public/admin')}}/assets/images/brand/logo_1.png" class="header-brand-img desktop-lgo" alt="Admintro logo">
                                    <img src="{{asset('public/admin')}}/assets/images/brand/logo_1.png" class="header-brand-img dark-logo" alt="Admintro logo">
                                    <img src="{{asset('public/admin')}}/assets/images/brand/logo_1.png" class="header-brand-img mobile-logo" alt="Admintro logo">
                                    <img src="{{asset('public/admin')}}/assets/images/brand/logo_1.png" class="header-brand-img darkmobile-logo" alt="Admintro logo">
                                </a>
                            </div>
                            <div class="app-sidebar__user">
                                <div class="dropdown user-pro-body text-center">
                                    <div class="user-pic">
                                        @if($profile_details->image)
                                        <img src="{{asset('public/admin/assets/user-profile/'.$profile_details->image)}}" alt="user-img" class="avatar-xl rounded-circle mb-1">
                                        @else
                                        <div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="{{asset('public/admin/assets/images/user-profile/avatar.png')}}"></div>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <h5 class=" mb-1">{{Auth::user()->name}} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                                        <span class="text-center user-semi-title">Time : {{$now->format('g:i A')}}</span><br>
                                        <span class="text-center user-semi-title">Date : {{date('d M, Y')}}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="side-menu app-sidebar3">
                                <li class="side-item side-item-category mt-4">Main</li>
                                <li class="slide">
                                    <a class="side-menu__item" href="{{route('dashboard')}}">
                                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                                        </svg>
                                        <span class="side-menu__label">Dashboard</span></a>
                                </li>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"></path>
                                        </svg>
                                        <span class="side-menu__label">Manage Pages</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="{{route('home')}}" class="slide-item">Home</a></li>
                                        <li><a href="{{route('company')}}" class="slide-item">About Us</a></li>
                                        <li><a href="{{route('edit_product_seo')}}" class="slide-item">Products</a></li>
                                        {{--<li><a href="{{route('edit_blog_seo')}}" class="slide-item">Blogs</a>
                                </li>--}}
                                <li><a href="{{route('contact_page')}}" class="slide-item">Contact Us</a></li>
                            </ul>
                            </li>
                            {{--<li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"></path>
                                        </svg>
                                        <span class="side-menu__label">Blog Management</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="{{route('add_blog')}}" class="slide-item">Add Blog</a></li>
                            <li><a href="{{route('blog_list')}}" class="slide-item">Manage Blog</a></li>
                            </ul>
                            </li>--}}
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"></path>
                                    </svg>
                                    <span class="side-menu__label">Testimonial Management</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="{{route('add_testimonial')}}" class="slide-item">Add Reviews</a></li>
                                    <li><a href="{{route('testimonial_list')}}" class="slide-item">Manage Reviews</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"></path>
                                    </svg>
                                    <span class="side-menu__label">Product Management</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="{{route('add_category')}}" class="slide-item">Add Category</a></li>
                                    <li><a href="{{route('category_list')}}" class="slide-item">Manage Category</a></li>
                                    <li><a href="{{route('add_product')}}" class="slide-item">Add Product</a></li>
                                    <li><a href="{{route('product_list')}}" class="slide-item">Manage Product</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M17.73 12.02l3.98-3.98c.39-.39.39-1.02 0-1.41l-4.34-4.34c-.39-.39-1.02-.39-1.41 0l-3.98 3.98L8 2.29C7.8 2.1 7.55 2 7.29 2c-.25 0-.51.1-.7.29L2.25 6.63c-.39.39-.39 1.02 0 1.41l3.98 3.98L2.25 16c-.39.39-.39 1.02 0 1.41l4.34 4.34c.39.39 1.02.39 1.41 0l3.98-3.98 3.98 3.98c.2.2.45.29.71.29.26 0 .51-.1.71-.29l4.34-4.34c.39-.39.39-1.02 0-1.41l-3.99-3.98zM12 9c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-4.71 1.96L3.66 7.34l3.63-3.63 3.62 3.62-3.62 3.63zM10 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2 2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2.66 9.34l-3.63-3.62 3.63-3.63 3.62 3.62-3.62 3.63z"></path>
                                    </svg>
                                    <span class="side-menu__label">Service Management</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="{{route('add_service')}}" class="slide-item">Add Service</a></li>
                                    <li><a href="{{route('service_list')}}" class="slide-item">Manage Service</a></li>
                                    <li><a href="{{route('price_category_list')}}" class="slide-item">Manage Category</a></li>
                                    <li><a href="{{route('price_list')}}" class="slide-item">Manage Item</a></li>
                                    {{--<li><a href="{{route('add_relation')}}" class="slide-item">Add Price List</a></li>
                                    <li><a href="{{route('relation_list')}}" class="slide-item">Manage Price List</a></li>--}}
                                </ul>
                            </li>

                            {{--<li class="side-item side-item-category">Contact Us</li>
                                <li class="slide">
                                    <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path d="M17.73 12.02l3.98-3.98c.39-.39.39-1.02 0-1.41l-4.34-4.34c-.39-.39-1.02-.39-1.41 0l-3.98 3.98L8 2.29C7.8 2.1 7.55 2 7.29 2c-.25 0-.51.1-.7.29L2.25 6.63c-.39.39-.39 1.02 0 1.41l3.98 3.98L2.25 16c-.39.39-.39 1.02 0 1.41l4.34 4.34c.39.39 1.02.39 1.41 0l3.98-3.98 3.98 3.98c.2.2.45.29.71.29.26 0 .51-.1.71-.29l4.34-4.34c.39-.39.39-1.02 0-1.41l-3.99-3.98zM12 9c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-4.71 1.96L3.66 7.34l3.63-3.63 3.62 3.62-3.62 3.63zM10 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2 2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2.66 9.34l-3.63-3.62 3.63-3.63 3.62 3.62-3.62 3.63z"></path>
                                        </svg>
                                        <span class="side-menu__label">Contact Us</span><i class="angle fa fa-angle-right"></i></a>
                                    <ul class="slide-menu">
                                        <li><a href="{{route('office_list')}}" class="slide-item">Office List</a></li>
                            <li><a href="{{route('contact_list')}}" class="slide-item">Contact List</a></li>
                            </ul>
                            </li>--}}
                            <li class="slide">
                                <a class="side-menu__item" href="{{route('newsletter_list')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                                    </svg>
                                    <span class="side-menu__label">Manage Newslletter</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" href="{{route('edit_setting')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                                    </svg>
                                    <span class="side-menu__label">Settings</span></a>
                            </li>
                            </ul>
                        </aside>
                        @endif
                        <!--aside closed-->