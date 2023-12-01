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
                                <h3 class="card-title">Add Testimonial</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('add_testimonial_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image(format:jpg, png)</strong></label>
                                            <div class="col-lg-4 col-sm-12">
                                                <input type="file" class="dropify" name="image" />
                                            </div>
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label><strong>Rating</strong></label><br>
                                            <input type="radio" name="rating" value="1">
                                            <label>One</label>
                                            <input type="radio" name="rating" value="2">
                                            <label>Two</label>
                                            <input type="radio" name="rating" value="3">
                                            <label>Three</label>
                                            <input type="radio" name="rating" value="4">
                                            <label>Four</label>
                                            <input type="radio" name="rating" value="5">
                                            <label>Five</label>
                                            @error('rating')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" name="description">{{old('description')}}</textarea>
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