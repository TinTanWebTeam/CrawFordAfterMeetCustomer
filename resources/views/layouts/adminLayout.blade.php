<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>VietName International Adjuster</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('libs/bootstrap/dist/css/bootstrap.min.css') }}">
		<!-- DataTables CSS -->
		<link rel="stylesheet" href="{{ asset('libs/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		@include('partials.admin.header')
		<div class="container" id="page_container">
			@yield('content')
		</div>
		@include('partials.admin.footer')
        <script>
            var url = "{{ asset('admin') }}/";
            var _token = "{{ csrf_token() }}";
        </script>
		<!-- jQuery -->
		<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<!-- DataTables JavaScript -->
		<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
		<!-- DataTables Bootstrap JavaScript -->
		<script src="{{ asset('libs/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
		<!-- jquery validator -->
		<script src="{{ asset('libs/jquery/jquery.validate.min.js') }}"></script>
        <!-- print plugin -->
        <script src="{{ asset('admin/js/printThis.js') }}"></script>
        <!-- Global JavaScript -->
        <script src="{{ asset('admin/js/global.js') }}"></script>
	</body>
</html>