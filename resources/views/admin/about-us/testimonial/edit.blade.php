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
                                <h3 class="card-title">Edit Testimonial</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_testimonial_action',$edit_testimonial->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="del_img" name="update_image" value="{{$edit_testimonial->image}}">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image(format:jpg, png)</strong></label>
                                            <div class="col-lg-6 col-sm-12">
                                                <input type="file" class="form-control" id="image" name="image" />
                                            </div>
                                            @if($edit_testimonial->image)
                                            <img src="{{asset('public/admin/assets/testimonial/'.$edit_testimonial->image)}}" id="testimonial_img" width="70px">
                                            <a href="#" id="delete_image" onclick="delete_image()"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Rating</strong></label><br>
                                            <input type="radio" name="rating" value="1" {{ ($edit_testimonial->rating==1)? "checked" : "" }}>
                                            <label>One</label>
                                            <input type="radio" name="rating" value="2" {{ ($edit_testimonial->rating==2)? "checked" : "" }}>
                                            <label>Two</label>
                                            <input type="radio" name="rating" value="3" {{ ($edit_testimonial->rating==3)? "checked" : "" }}>
                                            <label>Three</label>
                                            <input type="radio" name="rating" value="4" {{ ($edit_testimonial->rating==4)? "checked" : "" }}>
                                            <label>Four</label>
                                            <input type="radio" name="rating" value="5" {{ ($edit_testimonial->rating==5)? "checked" : "" }}>
                                            <label>Five</label>
                                            @error('rating')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" name="description">{{$edit_testimonial->description}}</textarea>
                                        </div>
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
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
                $('#testimonial_img').attr('src', '');
                $('#del_img').val("");


            }
        </script>