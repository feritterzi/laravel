<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.views.partials.head')
    @yield('page-level-scripts')
</head>
<body>
    @include('frontend/views/partials/nav')
    <!-- Page content -->
	<div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
    <!-- /page content -->
    @include('frontend/views/partials/footer')
    </div>
</body>
</html>
