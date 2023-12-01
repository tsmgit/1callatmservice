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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="card-title">Contact List</div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p border-bottom-0">#</th>
                                                    <th class="wd-15p border-bottom-0">Name</th>
                                                    <th class="wd-15p border-bottom-0">Email</th>
                                                    <th class="wd-15p border-bottom-0">Phone</th>
                                                    <th class="wd-15p border-bottom-0">Address</th>
                                                    <th class="wd-15p border-bottom-0">Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($contacts))
                                                @foreach($contacts as $list)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$list->name}}</td>
                                                    <td>{{$list->email}}</td>
                                                    <td>{{$list->phone}}</td>
                                                    <td>{{$list->address}}</td>
                                                    <td>{{$list->message}}</td>
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