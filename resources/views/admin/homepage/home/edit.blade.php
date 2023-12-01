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
                <form action="{{route('update_home')}}" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <input type="hidden" id="del_banner_img" name="update_banner_image" value="{{$edit_home->image}}">
                        <input type="hidden" id="del_about_img" name="update_about_image" value="{{$edit_home->about_image}}">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white mb-3">
                                    <h3 class="card-title">Banner Section</h3>
                                </div>
                                <div class="card-body pb-2">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Heading</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->heading}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Banner Image(format: jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="image" name="image" />
                                            </div>
                                            @if($edit_home->image)
                                            <img src="{{asset('public/admin/assets/banner/'.$edit_home->image)}}" id="banner_img" width="70px">
                                            <a href="#" id="delete_banner_image" onclick="delete_banner_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" placeholder="Description" name="description">{{$edit_home->description}}</textarea>
                                            @error('description')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Button Url</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->button_url}}" placeholder="Button Url" type="text" name="button_url">
                                            @error('button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white mb-3">
                                    <h3 class="card-title">About Section</h3>
                                </div>
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Heading</strong></label>
                                            <input class="form-control mb-6" value="{{$edit_home->about_heading}}" placeholder="Heading" type="text" name="about_heading">
                                            @error('about_heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->about_title}}" placeholder="Title" type="text" name="about_title">
                                            @error('about_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>About Image(format:jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" name="about_image" id="about_image" />
                                            </div>
                                            @if($edit_home->about_image)
                                            <img src="{{asset('public/admin/assets/about/'.$edit_home->about_image)}}" id="about_img" width="70px">
                                            <a href="#"><i class="fa fa-trash fa-2x text-danger" id="delete_about_image" onclick="delete_about_image()"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('about_image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Button Url</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->about_button_url}}" placeholder="Button Url" type="text" name="about_button_url">
                                            @error('about_button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content2" placeholder="Description" name="about_desc">{{$edit_home->about_desc}}</textarea>
                                            @error('about_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Services Section</h3>
                                </div>
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Heading</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->service_heading}}" type="text" name="service_heading">
                                            @error('service_heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="form-control" name="service_desc">{{$edit_home->service_desc}}</textarea>
                                            @error('service_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">SEO Tags</h3>
                                </div>
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->meta_title}}" type="text" name="meta_title">
                                            @error('meta_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Description</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->meta_desc}}" type="text" name="meta_desc">
                                            @error('meta_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Keyword</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_home->meta_keyword}}" type="text" name="meta_keyword">
                                            @error('meta_keyword')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End app-content-->
    </div>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function delete_banner_image() {
            //alert('ok');
            $('#banner_img').attr('src', '');
            $('#del_banner_img').val("");


        }

        function delete_about_image() {
            //alert('ok');
            $('#about_img').attr('src', '');
            $('#del_about_img').val("");


        }
    </script>