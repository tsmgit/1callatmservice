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
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_product_action',$edit_product->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="del_prod_img" name="update_product_image" value="{{$edit_product->image}}">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_product->title}}" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Category</strong> </label>
                                            <select name="cat_id" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @if(isset($cat_list))
                                                @foreach($cat_list as $list)
                                                <option value="{{$list->id}}" {{ $list->id == $edit_product->cat_id ? 'selected' : '' }}>{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image(format:jpg, png)</strong></label>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="file" class="form-control" id="image" name="image" />
                                            </div>
                                            @if($edit_product->image)
                                            <img src="{{asset('public/admin/assets/product/'.$edit_product->image)}}" id="product_img" width="70px">
                                            <a href="#"><i class="fa fa-trash fa-2x text-danger" id="delete_product_image" onclick="delete_product_image()"></i></a>
                                            @else
                                            <img src="{{asset('public/admin/images/Image_not_available.png')}}" width="100px">
                                            @endif
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label><strong>Short Description </strong></label>
                                            <textarea class="content2" name="short_desc">{{$edit_product->short_desc}}</textarea>
                                            @error('short_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" name="description">{{$edit_product->description}}</textarea>
                                            @error('description')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="text text-primary"><strong>SEO Tags:</strong></label>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Title</strong> </label>
                                            <input class="form-control mb-4" value="{{$edit_product->meta_title}}" type="text" name="meta_title">
                                            @error('meta_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Description</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_product->meta_desc}}" type="text" name="meta_desc">
                                            @error('meta_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Keyword</strong> </label>
                                            <input class="form-control mb-4" value="{{$edit_product->meta_keyword}}" type="text" name="meta_keyword">
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
            function delete_product_image() {
                //alert('ok');
                $('#product_img').attr('src', '');
                $('#del_prod_img').val("");


            }
        </script>