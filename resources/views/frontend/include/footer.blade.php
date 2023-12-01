@php
$get_settings = DB::table('header_and_footers')->where('id',1)->first();
@endphp
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
                                    <input type="text" name="email" placeholder="Enter your email to get updates" required/>
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
</script>
 <!-- dropdown -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<script>
    (function($) {
        $.fn.countTo = function(options) {
            options = options || {};

            return $(this).each(function() {
                // set options for current element
                var settings = $.extend({},
                    $.fn.countTo.defaults, {
                        from: $(this).data("from"),
                        to: $(this).data("to"),
                        speed: $(this).data("speed"),
                        refreshInterval: $(this).data("refresh-interval"),
                        decimals: $(this).data("decimals"),
                    },
                    options
                );

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data("countTo") || {};

                $self.data("countTo", data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof settings.onUpdate == "function") {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData("countTo");
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof settings.onComplete == "function") {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(
                        self,
                        value,
                        settings
                    );
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null, // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    })(jQuery);

    jQuery(function($) {
        // custom formatting example
        $(".count-number").data("countToOptions", {
            formatter: function(value, options) {
                return value
                    .toFixed(options.decimals)
                    .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            },
        });

        // start all the timers
        $(".timer").each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({},
                options || {},
                $this.data("countToOptions") || {}
            );
            $this.countTo(options);
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function() {
            $(this)
                .prev(".card-header")
                .find(".fa")
                .addClass("fa-minus")
                .removeClass("fa-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse")
            .on("show.bs.collapse", function() {
                $(this)
                    .prev(".card-header")
                    .find(".fa")
                    .removeClass("fa-plus")
                    .addClass("fa-minus");
            })
            .on("hide.bs.collapse", function() {
                $(this)
                    .prev(".card-header")
                    .find(".fa")
                    .removeClass("fa-minus")
                    .addClass("fa-plus");
            });
    });
</script>

</body>

</html>