@extends('backend.views.layouts.app')

@section('content')
<!-- Basic datatable -->
<div class="card">
    <div class="card-header header-elements-inline">
    <h5 class="card-title">{{__('admin-blog.blog')}}</h5>
        <div class="header-elements">
            <div class="list-icons">
            </div>
        </div>
    </div>

    <div class="card-body">

    </div>

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>{{__('admin-blog.title')}}</th>
                <th>{{__('admin-blog.created_at')}}</th>
                <th>{{__('admin-blog.status')}}</th>
                <th class="text-center">{{__('admin-blog.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td><span title="{{$item->created_at}}">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span></td>
                <td><span class="badge @if($item->status) badge-success @else badge-danger @endif">@if($item->status) {{__('admin-index.active')}} @else {{__('admin-index.pasive')}} @endif</span></td>
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /basic datatable -->
@endsection
@section('page-level-scripts')
<script>
var DatatableBasic = function() {
var _componentDatatableBasic = function() {
    if (!$().DataTable) {
        console.warn('Warning - datatables.min.js is not loaded.');
        return;
    }
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [ 3 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
    $('.datatable-basic').DataTable();
};

// Select2 for length menu styling
var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });

        // Enable Select2 select for individual column searching
        $('.filter-select').select2();
    };
return {
    init: function() {
        _componentDatatableBasic();
        _componentSelect2();
    }
}
}();
document.addEventListener('DOMContentLoaded', function() {
DatatableBasic.init();
});
</script>
@endsection
