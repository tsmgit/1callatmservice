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
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Edit Service</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_service_action',$edit_service->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="del_img" name="update_service_image" value="{{$edit_service->logo}}">
                                        <input type="hidden" id="del_map_img" name="update_map_image" value="{{$edit_service->map}}">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_service->title}}" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image(format: jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="logo" name="logo" />
                                            </div>
                                            @if($edit_service->logo)
                                            <img src="{{asset('/public/admin/assets/service/'.$edit_service->logo)}}" id="service_img" width="70px">
                                            <a href="#" id="delete_image" onclick="delete_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('logo')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Map(format:jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="map" name="map" />
                                            </div>
                                            @if($edit_service->map)
                                            <img src="{{asset('/public/admin/assets/service/'.$edit_service->map)}}" id="map_img" width="70px">
                                            <a href="#" id="delete_map_image" onclick="delete_map_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('map')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label><strong>Short Description</strong></label>
                                            <textarea class="content2" name="short_desc">{{$edit_service->short_desc}}</textarea>
                                        </div>
                                        @error('short_desc')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" name="description">{{$edit_service->description}}</textarea>
                                        </div>
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_service->meta_title}}" type="text" name="meta_title">
                                            @error('meta_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Description</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_service->meta_desc}}" type="text" name="meta_desc">
                                            @error('meta_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Keyword</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_service->meta_keyword}}" type="text" name="meta_keyword">
                                            @error('meta_keyword')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
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
                    </div>
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            function delete_image() {
                //alert('ok');
                $('#service_img').attr('src', '');
                $('#del_img').val("");


            }

            function delete_map_image() {
                //alert('ok');
                $('#map_img').attr('src', '');
                $('#del_map_img').val("");


            }
        </script>