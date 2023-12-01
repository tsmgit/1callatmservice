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
                                <h3 class="card-title">Contact Us</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_contact_page_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Map</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_contact_seo->map}}" type="text" name="map">
                                            @error('map')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="text text-primary"><strong>SEO Tags:</strong></label>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_contact_seo->meta_title}}" type="text" name="meta_title">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Description</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_contact_seo->meta_desc}}" type="text" name="meta_desc">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Keyword</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_contact_seo->meta_keyword}}" type="text" name="meta_keyword">
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