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
                <!--End Page header-->
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @elseif(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                <!-- Row-1 -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Add Banner</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('add_banner_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Heading</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{old('heading')}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title One <span class="required_star">*</span></strong></label>
                                            <input class="form-control mb-4" value="{{old('title_one')}}" placeholder="Title One" type="text" name="title_one">
                                            @error('title_one')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title Two <span class="required_star">*</span></strong></label>
                                            <input class="form-control mb-4" value="{{old('title_two')}}" placeholder="Title Two" type="text" name="title_two">
                                            @error('title_two')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Button Url <span class="required_star">*</span></strong></label>
                                            <input class="form-control mb-4" value="{{old('button_url')}}" placeholder="Button Url" type="text" name="button_url">
                                            @error('button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image <span class="required_star">*</span></strong></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Upload Banner</label>
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
                    </div>
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection