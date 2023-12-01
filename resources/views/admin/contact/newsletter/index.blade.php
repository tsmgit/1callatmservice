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
                        <!-- <h4 class="page-title mb-0">User List</h4> -->
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="index-2.html#">Dashboard</a></li>
                        </ol> -->
                    </div>

                </div>
                <!-- Row-1 -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="card-title">Search Datewise Newsletter</div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('filter_attendance')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>From Date:</label>
                                                <input type="date" name="from_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>To Date:</label>
                                                <input type="date" name="to_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" style="margin-top: 26px; width:100%;" value="Search" class="btn btn-info">
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
                                <div class="card-title">Newsletter List</div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p border-bottom-0">#</th>
                                                    <th class="wd-15p border-bottom-0">Email</th>
                                                    <th class="wd-15p border-bottom-0">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($data))
                                                @foreach($data as $list)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$list->email}}</td>
                                                    <td>{{$list->date}}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection