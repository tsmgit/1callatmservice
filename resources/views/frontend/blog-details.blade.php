@section('meta_title',"$blogs->meta_title")
@section('meta_desc',"$blogs->meta_desc")
@section('meta_keyword',"$blogs->meta_keyword")
@include('frontend.include.header')

<div class="banner__content">
    <div class="banner__content__inner">
        <h1>{{$blogs->title}}</h1>
    </div>
</div>
</div>
<div class="blog__wrappone">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <div class="blog__details__img">
                    <img src="{{asset('public/admin/assets/blog/'.$blogs->image)}}" alt="" width="920px" height="649px" />
                </div>
                <h3>{{$blogs->title}}</h3>
                <span>{{$blogs->created_at->format('m F, Y')}}</span>
                <p class="mt-3">
                    {!!$blogs->description!!}
                </p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="recentposts">
                    @if(isset($blog))
                    @foreach($blog as $list)
                    <div class="repost__wrapp">
                        <div class="repost__image">
                            <img src="{{asset('public/admin/assets/blog/'.$list->image)}}" width="200px" height="142px" alt="" />
                        </div>
                        <div class="repost__text">
                            <a href="{{route('blog_details',$list->slug)}}">{{$list->title}}</a>
                            <span>{{$list->created_at->format('m F, Y')}}</span>
                            <p class="lorem">{{substr($list->short_desc, 0, 20)}} ...</p>
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