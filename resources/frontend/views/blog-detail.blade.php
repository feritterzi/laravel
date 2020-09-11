@extends('frontend/views/layouts.app')
@section('content')

    <!-- Layout 1 -->
    <div class="row mb-3">
        <div class="col-sm-12">
            <h6 class="mb-0 font-weight-semibold">
                {{__('index.blog')}}
            </h6>
        </div>
    </div>



    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="w-100 overflow-auto order-2 order-md-1">

            <!-- Post -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="mb-3 text-center">
                            <a href="#" class="d-inline-block">
                                <img src="../../../../global_assets/images/demo/cover3.jpg" class="img-fluid" alt="">
                            </a>
                        </div>

                        <h4 class="font-weight-semibold mb-1">
                        <a href="#" class="text-default">{{$blog->title}}</a>
                        </h4>

                        <ul class="list-inline list-inline-dotted text-muted mb-3">
                        <li class="list-inline-item">{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}</li>
                        </ul>
                        <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-warning">
                            <blockquote class="blockquote d-flex mb-0">
                                <div>
                                    <p class="mb-1">{{$blog->summary}}</p>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <div class="mb-4">
                        {{$blog->body}}
                    </div>
                </div>
            </div>
            <!-- /post -->
        </div>
        <!-- /left content -->


        <!-- Right sidebar component -->
        <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Search -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Search articles</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="search" class="form-control" placeholder="Search...">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 font-size-base text-muted"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /search -->

                <!-- Share -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Share</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <ul class="list-inline list-inline-condensed text-center mb-0">
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-indigo btn-icon btn-lg rounded-round mb-3 legitRipple">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-danger btn-icon btn-lg rounded-round mb-3 legitRipple">
                                    <i class="icon-youtube3"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-info btn-icon btn-lg rounded-round mb-3 legitRipple">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-orange btn-icon btn-lg rounded-round mb-3 legitRipple">
                                    <i class="icon-feed3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /share -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /right sidebar component -->

    </div>


@endsection
@section('page-level-scripts')

@endsection
