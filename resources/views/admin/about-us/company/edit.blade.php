@extends('admin.layouts.main')
@section('content')
<!-- Page -->
<div class="page">
    <div class="page-main">
        @extends('admin.layouts.sidebar')
        <!-- App-Content -->
        <div class="app-content main-content">
            <div class="side-app">
                @extends('admin.layouts.nav')
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <!-- <h4 class="page-title mb-0">Add User</h4> -->
                    </div>
                    <div class="page-rightheader">

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <form action="{{route('update_company')}}" enctype="multipart/form-data" method="post">
                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">About Us</h3>
                                </div>
                                <div class="card-body pb-2">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="del_company_img" name="update_company_image" value="{{$get_company->image}}">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image(format:jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="image" name="image" />
                                            </div>
                                            @if($get_company->image)
                                            <img src="{{asset('public/admin/assets/company/'.$get_company->image)}}" id="company_img" width="70px">
                                            <a href="#" id="delete_company_image" onclick="delete_company_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{$get_company->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" placeholder="Description" name="description">{{$get_company->description}}</textarea>
                                            @error('description')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="card mb-5">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Mission & Story Section</h3>
                                </div>
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Mission Heading</strong></label>
                                            <input class="form-control mb-4" value="{{$get_company->mission_heading}}"
                            type="text" name="mission_heading">
                            @error('mission_heading')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><strong>Mission Image</strong></label>
                        <input class="form-control mb-4" type="file" name="mission_img">
                        <img src="{{asset('public/admin/assets/company/'.$get_company->mission_img)}}" width="50px">
                        @error('mission_img')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label><strong>Mission Description</strong></label>
                        <textarea class="form-control" name="mission_desc">{{$get_company->mission_desc}}</textarea>
                        @error('mission_desc')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><strong>Story Heading</strong></label>
                        <input class="form-control mb-4" value="{{$get_company->story_heading}}" type="text" name="story_heading">
                        @error('story_heading')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><strong>Story Image</strong></label>
                        <input class="form-control mb-4" type="file" name="story_img">
                        <img src="{{asset('public/admin/assets/company/'.$get_company->story_img)}}" width="50px">
                        @error('story_img')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label><strong>Story Description</strong></label>
                        <textarea class="form-control" name="story_description">{{$get_company->story_description}}</textarea>
                        @error('story_description')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">SEO Tags</h3>
            </div>
            <div class="card-body pb-2">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label><strong>Meta Title</strong></label>
                        <input class="form-control mb-4" value="{{$get_company->meta_title}}" type="text" name="meta_title">
                        @error('meta_title')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><strong>Meta Description</strong></label>
                        <input class="form-control mb-4" value="{{$get_company->meta_desc}}" type="text" name="meta_desc">
                        @error('meta_desc')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><strong>Meta Keyword</strong></label>
                        <input class="form-control mb-4" value="{{$get_company->meta_keyword}}" type="text" name="meta_keyword">
                        @error('meta_keyword')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </div>
    </div>
</div>
</form>
</div>
<!-- End Row-1 -->
</div>
</div>
<!-- End app-content-->
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function delete_company_image() {
        //alert('ok');
        $('#company_img').attr('src', '');
        $('#del_company_img').val("");


    }
</script>