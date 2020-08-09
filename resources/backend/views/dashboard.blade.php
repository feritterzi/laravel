@extends('backend.views.layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            @role('admin')
                I am a admin!
            @endrole
            @role('agent')
                I am a agent!
            @endrole
            @role('advisor')
                I am a advisor!
            @endrole
        </div>
    </div>
</div>
@endsection
