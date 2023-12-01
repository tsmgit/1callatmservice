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
                                <h3 class="card-title">Edit Three Column</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_column_action',$edit_column->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Title</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_column->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image <span class="required_star">*</span></strong></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Upload Image</label>
                                            </div>
                                            <img src="{{asset('public/admin/assets/banner/'.$edit_column->image)}}">
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="example1" class="table table-bordered text-nowrap key-buttons">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Option</th>
                                                        <th class="wd-20p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i=0; @endphp
                                                    <input type="hidden" id="del" name="del" value="{{$edit_column->id}}" class="form-control">
                                                    @foreach(explode(',', $edit_column->options) as $list)
                                                    <tr>
                                                        <td>

                                                            <input type="text" name="addmore[]" value="{{$list}}" class="form-control" placeholder="Option">
                                                        </td>
                                                        <td>
                                                            <button type="button" onclick="remove_btn(<?php echo $i; ?>)" name="add" id="add" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
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

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Edit About</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_about_action',$edit_about->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Heading</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_about->heading}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Title</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_about->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image <span class="required_star">*</span></strong></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Upload Image</label>
                                            </div>
                                            <img src="{{asset('public/admin/assets/about/'.$edit_about->image)}}" width="50px">
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Button Url</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_about->button_url}}" placeholder="Button Url" type="text" name="button_url">
                                            @error('button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong> <span class="required_star">*</span></label>
                                            <textarea class="content mb-4" placeholder="Description" name="description">{{$edit_about->description}}</textarea>
                                            @error('description')
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

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Edit Need Help</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_help_action',$edit_help->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Heading</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_help->heading}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Button Url</strong> <span class="required_star">*</span></label>
                                            <input class="form-control mb-4" value="{{$edit_help->button_url}}" placeholder="Button Url" type="text" name="button_url">
                                            @error('button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong> <span class="required_star">*</span></label>
                                            <textarea class="form-control mb-4" placeholder="Description" name="description">{{$edit_help->description}}</textarea>
                                            @error('description')
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var i = 0;
                $("#add").click(function() {
                    //console.log("ok");
                    ++i;
                    $("#example1").append('<tr><td><input type="text" name="addmore[]" placeholder="Option" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
                });

                $(document).on('click', '.remove-tr', function() {
                    $(this).parents('tr').remove();
                });


            });

            function remove_btn(x) {
                //alert(x);
                var id = $('#del').val();
                $.ajax({
                    url: "{{route('delete_row')}}",
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id,
                        'x': x,
                    },
                    success: function(response) {
                        toastr.success(response.success);
                        window.reload();
                    }
                });
            }
        </script>