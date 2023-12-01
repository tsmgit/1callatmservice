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
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_category_action',$edit_category->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Parent Category</strong></label>
                                            <select name="parent_id" class="form-control">
                                                <option value="0">Select</option>
                                                @foreach($category_list as $cat)
                                                    <option value="{{ $cat->id }}" <?php if($cat->id == $edit_category->parent_id) {echo "selected";} ?>>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Name</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_category->name}}" type="text" name="name">
                                            @error('name')
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