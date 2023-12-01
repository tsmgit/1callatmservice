         @section('meta_title',"$blog_page->meta_title")
         @section('meta_desc',"$blog_page->meta_desc")
         @section('meta_keyword',"$blog_page->meta_keyword")
         @include('frontend.include.header')
         <div class="banner__content">
             <div class="banner__content__inner">
                 <h1>our blogs</h1>
             </div>
         </div>
         </div>
         <div class="contact__holder">
             <div class="container">
                 <div class="row">
                     @if(isset($blogs))
                     @foreach($blogs as $list)
                     <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                         <div class="bg__one box-shadow">
                             <div class="image__box">
                                 <a href="{{route('blog_details',$list->slug)}}"><img src="{{asset('public/admin/assets/blog/'.$list->image)}}" alt="" class="w-100" /></a>
                             </div>
                             <div class="blog__text">
                                 <a href="{{route('blog_details',$list->slug)}}">
                                     <h3>{{$list->title}}</h3>
                                 </a>
                                 <p>
                                     {!!$list->short_desc!!}
                                 </p>
                                 <a href="{{route('blog_details',$list->slug)}}"><img src="{{asset('public/frontend')}}/assets/images/round.png" alt="" /></a>
                             </div>
                         </div>
                     </div>
                     @endforeach
                     @endif
                 </div>
             </div>
         </div>
         </div>
         @include('frontend.include.footer')