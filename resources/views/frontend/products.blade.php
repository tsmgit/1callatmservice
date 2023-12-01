@section('meta_title',"$product_page->meta_title")
@section('meta_desc',"$product_page->meta_desc")
@section('meta_keyword',"$product_page->meta_keyword")
@include('frontend.include.header')
<div class="banner__content">
    <div class="banner__content__inner">
        <h1>our products</h1>
    </div>
</div>
</div>
<div class="contact__holder">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-4">
                <div class="cate__wrapp" id="sidebar">
                    <h3>Filter By Category</h3>
                    <ul class="list-unstyled components">
                        @if($selecdCatId == 0)
                        <li class="active">
                            <a href="{{route('products')}}">All<i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>
                        @else
                        <li class="">
                            <a href="{{route('products')}}">All<i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </li>
                        @endif
                       
                        @if(isset($product_cat))
                            @foreach($product_cat as $list)
                                <li class="">
                                    @if(count($list->subcats) > 0)
                                    <a href="#submenu_{{$list->id}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">{{$list->name}}<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                    @else 
                                    <a href="{{url('category/'.$list->id)}}">{{$list->name}}<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                    @endif
                                    
                                    <ul class="list-unstyled collapse"  id="submenu_{{$list->id}}">
                                        @foreach($list->subcats as $cat)
                                        <li>
                                            <a href="{{url('category/'.$cat->id)}}">{{ $cat->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 tab-content" id="myTabContent3">
                <div class="row">
                    @if(count($product) > 0)
                    @foreach($product as $list)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                        <div class="card__wrapp">
                            <div class="cardproduct">
                                <img src="{{asset('public/admin/assets/product/'.$list->image)}}" alt="" />
                            </div>
                            <h4>{{$list->title}}</h4>
                            <a href="{{route('product_details',$list->slug)}}">View Details</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="text-danger container d-flex align-items-center justify-content-center" height="100%">
                        <b>No Products Found</b>
                    </div>
                    @endif
                </div>
                <div class="custom_pagination">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('frontend.include.footer')