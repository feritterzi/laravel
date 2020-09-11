<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" src="{{asset('favicon.ico')}}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Css -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ mix('backend/themes/limitless/assets/css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- Js -->
    <script src="{{ mix('backend/themes/limitless/assets/js/app.js') }}"></script>


    @yield('page-level-scripts')


</head>
<body>
    @include('backend/views/partials/nav')
    <!-- Page content -->
	<div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                @yield('content')
            </div>
			<!-- /content area -->


			@include('backend/views/partials/footer')

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    </div>
</body>
</html>
