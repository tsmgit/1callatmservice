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
                                <h3 class="card-title">Header & Footer Settings</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_setting_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="del_footer_img" name="update_footer_image" value="{{$edit_settings->footer_logo}}">
                                        <input type="hidden" id="del_header_img" name="update_header_image" value="{{$edit_settings->header_logo}}">

                                        <div class="col-md-6 mb-3">
                                            <label><strong>Header Logo(format: jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="header_logo" id="header_img" name="header_logo" />
                                            </div>
                                            @if($edit_settings->header_logo)
                                            <img src="{{asset('public/admin/assets/setting/'.$edit_settings->header_logo)}}" id="header_img" width="70px">
                                            <a href="#" id="delete_header_image" onclick="delete_header_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Footer Logo(format:jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="footer_logo" name="footer_logo" />
                                            </div>
                                            @if($edit_settings->footer_logo)
                                            <img src="{{asset('public/admin/assets/setting/'.$edit_settings->footer_logo)}}" id="footer_img" width="70px">
                                            <a href="#" id="delete_footer_image" onclick="delete_footer_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Facebook Link</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->fb_link}}" type="text" name="fb_link">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Twitter Link</strong> </label>
                                            <input class="form-control mb-4" value="{{$edit_settings->twitter_link}}" type="text" name="twitter_link">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Linkedin Link</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->linkedin_link}}" type="text" name="linkedin_link">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Instagram Link</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->instagram_link}}" type="text" name="instagram_link">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Youtube Link</strong> </label>
                                            <input class="form-control mb-4" value="{{$edit_settings->youtube_link}}" type="text" name="youtube_link">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Mail</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->mail}}" type="text" name="mail">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label><strong>Phone</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->phone}}" type="text" name="phone">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Phone</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_settings->phone2}}" type="text" name="phone2">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Form Submission Mail (with , seperated)</strong></label>
                                            <textarea class="form-control mb-4" name="bulk_mail">{{$edit_settings->bulk_mail}}</textarea>

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
            function delete_footer_image() {
                //alert('ok');
                $('#footer_img').attr('src', '');
                $('#del_footer_img').val("");

            }

            function delete_header_image() {
                //alert('ok');
                $('#header_img').attr('src', '');
                $('#del_header_img').val("");


            }
        </script>