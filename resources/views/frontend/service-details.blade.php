@section('meta_title',"$service->meta_title")
@section('meta_desc',"$service->meta_desc")
@section('meta_keyword',"$service->meta_keyword")
@include('frontend.include.header')

<div class="banner__content">
  <div class="banner__content__inner">
    <h1>{{$service->title}}</h1>
  </div>
</div>
</div>
<div class="contact__holder">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl6">
        <!-- <div class="product__details__image">
              <img src="{{asset('public/frontend')}}/assets/images/product__dis.jpg" alt="">
            </div>  -->
        <div id="custCarousel" class="carousel slide" data-ride="carousel">
          <!-- slides -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('public/admin/assets/service/'.$service->logo)}}" alt="Hills">
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
        <div class="text__holder__blog">
          <h2>{{$service->title}}</h2>
          <p>{!!$service->short_desc!!}</p>
          <a href="#" data-toggle="modal" data-target="#myModal">Request a Quote</a>
        </div>

      </div>
      @if($service->map)
      <div class="col-sm-12 mt-5">
        <img src="{{asset('public/admin/assets/service/'.$service->map)}}" alt="Hills" class="w-50">
      </div>
      @endif
      <div class="col-sm-12 mt-5">

        <div id="accordion">

          @foreach($arr['category'] as $list)
          <div class="card">
            <div class="card-header" id="headingOne{{$loop->iteration}}">

              <a href="#" class="btn btn-link d-block" data-toggle="collapse" data-target="#collapseOne{{$loop->iteration}}" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-plus"></i>
                {{$list['category_name']}}
              </a>

            </div>

            <div id="collapseOne{{$loop->iteration}}" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Repair Item</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list['item'] as $item)
                    <tr>
                      <td>
                        @if($item['repair_item'])
                        {{$item['repair_item']}}
                        @else
                        No item found
                        @endif
                      </td>
                      <td>{{$item['description']}}</td>
                      <td>{{$item['price']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="col-sm-12 mt-5">
        <p>{!!$service->description!!} </p>
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
        <form method="post" action="{{route('service_enquiry_form_action')}}" class="mt-3">
          @csrf
          <input type="hidden" class="form-control" name="service_name" value="{{$service->title}}" readonly>
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