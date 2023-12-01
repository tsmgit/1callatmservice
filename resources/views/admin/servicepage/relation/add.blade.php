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
                                <h3 class="card-title">Add Service Price</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('add_relation_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Service</strong></label>
                                            <select name="service_id" class="form-control">
                                                <option value="" selected disabled>Select Service</option>
                                                @if(isset($service))
                                                @foreach($service as $list)
                                                <option value="{{$list->id}}">{{$list->title}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Category</strong></label>
                                            <select name="cat_id" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                @if(isset($price_cat))
                                                @foreach($price_cat as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Price</strong></label>
                                            <select name="price_id[]" class="select2" multiple>
                                                <option value="" disabled>Select Price</option>
                                                @if(isset($price_list))
                                                @foreach($price_list as $list)
                                                @if($list->repair_item)
                                                <option value="{{$list->id}}">{{$list->repair_item}}</option>
                                                @else
                                                <option value="{{$list->id}}">{{$list->description}}</option>
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
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