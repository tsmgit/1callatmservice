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
                                <h3 class="card-title">Add Item</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('add_price_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Repair Item</strong></label>
                                            <input class="form-control mb-4" value="{{old('repair_item')}}" type="text" name="repair_item">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Price</strong></label>
                                            <input class="form-control mb-4" value="{{old('price')}}" type="text" name="price">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Category Name</strong></label>
                                            <select name="category_id" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                @if(isset($get_price_category))
                                                @foreach($get_price_category as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var i = 0;
                $("#addCourseContent").click(function() {
                    //console.log("ok");
                    ++i;
                    $("#example").append('<tr><td><input type="text" name="addmore[repair_item][]" class="form-control" placeholder="Repair Item"></td><td> <input type="text" name="addmore[description][]" class="form-control" placeholder="Description"></td><td><input type="text" name="addmore[price][]" class="form-control" placeholder="Price"></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
                });

                $(document).on('click', '.remove-tr', function() {
                    $(this).parents('tr').remove();
                });
            });
        </script>