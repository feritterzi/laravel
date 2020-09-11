@extends('frontend/views/layouts.app')
@section('content')

    <!-- Layout 1 -->
    <div class="row mb-3">
        <div class="col-sm-12">
            <h6 class="mb-0 font-weight-semibold">
                {{__('index.support')}}  @if($catTitle!='') / {{$catTitle}} @endif
            </h6>
        </div>
    </div>



    <!-- Inner container -->
    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="w-100 overflow-auto order-2 order-md-1">

            <!-- Questions list -->
        <div class="font-size-sm text-uppercase font-weight-semibold text-muted pt-2 mb-2">{{__('search-results')}}</div>
            @foreach ($supports as $item)
            <div class="card-group-control card-group-control-right">
                <div class="card mb-2">
                    <div class="card-header">
                        <h6 class="card-title">
                        <a class="text-default collapsed" data-toggle="collapse" href="#question{{$loop->index}}">
                                <i class="icon-help mr-2 text-slate"></i> {{$item->title}}
                            </a>
                        </h6>
                    </div>

                    <div id="question{{$loop->index}}" class="collapse">
                        <div class="card-body">
                            {{$item->body}}
                        </div>

                        <div class="card-footer bg-transparent d-sm-flex align-items-sm-center border-top-0 pt-0">
                            <span class="text-muted">Latest update: {{ date('j F, Y', strtotime($item->updated_at)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



            <!-- /questions list -->

        </div>
        <!-- /left content -->


        <!-- Right sidebar component -->
        <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 wmin-sm-300 order-1 order-md-2 sidebar-expand-md">

            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- Search -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('support.search')}}" method="POST">
                            @csrf
                            <div class="form-group-feedback form-group-feedback-right">
                            <input type="search" name="q" value="{{ old('q') }}" class="form-control" placeholder="{{__('support.search-support')}}">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 font-size-base text-muted"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /search -->


                <!-- Navigation -->
                <div class="card">

                    <div class="nav nav-sidebar mb-2">
                        @foreach ($supportCats as $item)
                        <li class="nav-item">
                        <a href="{{url('support/'.$item->slug)}}" class="nav-link border-0"><i class="icon-lifebuoy"></i> {{$item->title}}</a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link"><i class="icon-mail5"></i> {{__('support.contact')}}</a>
                        </li>
                    </div>
                </div>
                <!-- /navigation -->







            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /right sidebar component -->

    </div>
    <!-- /inner container -->
    <!-- /layout 1 -->


@endsection
@section('page-level-scripts')
@endsection
