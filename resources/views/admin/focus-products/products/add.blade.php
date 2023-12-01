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
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('add_product_action')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title</strong></label>
                                            <input class="form-control mb-4" value="{{old('title')}}" type="text" name="title">
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
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image(format: jpg, png)</strong></label>
                                            <div class="col-lg-6 col-sm-12">
                                                <input type="file" class="dropify" name="image" />
                                            </div>
                                            <div class="preview">
                                                <img id="preview-selected-image" width="75px" />
                                            </div>
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label><strong>Short Description </strong></label>
                                            <textarea class="content2" name="short_desc">{{old('short_desc')}}</textarea>
                                            @error('short_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description</strong></label>
                                            <textarea class="content" name="description">{{old('description')}}</textarea>
                                            @error('description')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="text text-primary"><strong>SEO Tags:</strong></label>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Title</strong> </label>
                                            <input class="form-control mb-4" value="{{old('meta_title')}}" type="text" name="meta_title">
                                            @error('meta_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Description</strong></label>
                                            <input class="form-control mb-4" value="{{old('meta_desc')}}" type="text" name="meta_desc">
                                            @error('meta_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Meta Keyword</strong> </label>
                                            <input class="form-control mb-4" value="{{old('meta_keyword')}}" type="text" name="meta_keyword">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const previewImage = (event) => {
                /**
                 * Get the selected files.
                 */
                const imageFiles = event.target.files;
                /**
                 * Count the number of files selected.
                 */
                const imageFilesLength = imageFiles.length;
                /**
                 * If at least one image is selected, then proceed to display the preview.
                 */
                if (imageFilesLength > 0) {
                    /**
                     * Get the image path.
                     */
                    const imageSrc = URL.createObjectURL(imageFiles[0]);
                    /**
                     * Select the image preview element.
                     */
                    const imagePreviewElement = document.querySelector("#preview-selected-image");
                    /**
                     * Assign the path to the image preview element.
                     */
                    imagePreviewElement.src = imageSrc;
                    /**
                     * Show the element by changing the display value to "block".
                     */
                    imagePreviewElement.style.display = "block";
                }
            };
        </script>