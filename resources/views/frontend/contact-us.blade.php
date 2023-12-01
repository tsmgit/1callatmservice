@section('meta_title',"$contact->meta_title")
@section('meta_desc',"$contact->meta_desc")
@section('meta_keyword',"$contact->meta_keyword")
@include('frontend.include.header')
<div class="banner__content">
    <div class="banner__content__inner">
        <h1>Contact Us</h1>
    </div>
</div>
</div>
<div class="contact__holder">
    <div class="container">
        <div class="row p-0 m-0">
            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 p-0">
                <div class="map" id="g_map">
                    <iframe src="{{$contact->map}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 p-0">
                <form action="{{route('contact_form_action')}}" method="post">
                    @csrf
                    <div class="form__holder">
                        <h2>Get In Touch</h2>
                        <div>
                            @if(session('success'))
                            <span class="text text-success">{{session('success')}}</span>
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <input type="text" name="name" id="" placeholder="Name*" />
                                @error('name')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="" placeholder="Email*" />
                                @error('email')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="phone" id="" placeholder="Phone*" />
                                @error('phone')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="address" id="" placeholder="Address*" />
                                @error('address')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <input type="submit" value="Submit Now" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('frontend.include.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
// <script>
    //     $(document).ready(function() {
    //         $.ajax({
    //             url: "{{route('get_map')}}",
    //             method: "GET",
    //             success: function(response) {
    //                 var location = response.map;
    //                 $('#g_map').html(location);
    //             }
    //         });
    //     });
    // 
</script>