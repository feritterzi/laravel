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



    <div class="row">
        @foreach ($blogs as $item)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions mb-3">
                    <img class="card-img img-fluid" src="{{ asset('uploads/'.$item->image) }}" alt="{{$item->title}}">
                        <div class="card-img-actions-overlay card-img">
                            <a href="{{url('blog/'.$item->slug)}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>

                    <h5 class="font-weight-semibold mb-1">
                        <a href="#" class="text-default">{{$item->title}}</a>
                    </h5>

                    <ul class="list-inline list-inline-dotted text-muted mb-3">
                        <li class="list-inline-item">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</li>
                    </ul>

                    {{$item->summary}}
                </div>

                <div class="card-footer d-flex">
                    <a href="#" class="ml-auto">{{__('blog.read-more')}} <i class="icon-arrow-right14 ml-2"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /layout 1 -->


@endsection
@section('page-level-scripts')

@endsection
