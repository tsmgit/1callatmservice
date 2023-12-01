@section('meta_title',"$product->meta_title")
@section('meta_desc',"$product->meta_desc")
@section('meta_keyword',"$product->meta_keyword")
@include('frontend.include.header')
<div class="banner__content">
    <div class="banner__content__inner">
        <h1>{{$product->title}}</h1>
    </div>
</div>
</div>
<div class="contact__holder">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <!-- <div class="product__details__image">
              <img src="./assets/images/product__dis.jpg" alt="">
            </div>  -->
                <div id="custCarousel" class="carousel slide" data-ride="carousel">
                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('public/admin/assets/product/'.$product->image)}}" alt="Hills">
                        </div>
                    </div>
                    <!-- Thumbnails -->
                </div>

            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="text__holder__blog">
                    <h2>{{$product->title}}</h2>
                    <p>{!!$product->short_desc!!}</p>
                    <a href="#" data-toggle="modal" data-target="#myModal">Request a Quote</a>
                </div>

            </div>
            <div class="col-sm-12 mt-5">
                <p>{!!$product->description!!}</p>
            </div>

            <div class="relatedproducts">
                <div class="container">
                    <h2>Related Products</h2>
                    <div class="row">
                        @if(isset($related_products))
                        @foreach($related_products as $list)
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mb-4">
                            <div class="card__wrapp">
                                <div class="cardproduct">
                                    <img src="{{asset('public/admin/assets/product/'.$list->image)}}" alt="" />
                                </div>
                                <h4>{{$list->title}}</h4>
                                <a href="{{route('product_details',$list->slug)}}">View Details</a>
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
<div class="modal request__wrapp" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">RMA Request Forum</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(session('success'))
                <span class="text text-success">{{session('success')}}</span>
                @endif
                <form method="post" action="{{route('product_enquiry_form_action')}}" class="mt-3">
                    @csrf
                    <input type="hidden" class="form-control" name="product_name" value="{{$product->title}}" readonly>
                    <div class="form-group">
                        <input type="text" class="form-control" name="company" placeholder="Company*" required>
                    </div>
                    @error('company')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address*" required>
                    </div>
                    @error('email')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <input type="text" class="form-control" name="rma_no" placeholder="Enter A Four Digit Number For Your RMA">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="Number" class="form-control" name="phone" placeholder="Number">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Message" name="message" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn send__wrapp">SEND</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('frontend.include.footer')
