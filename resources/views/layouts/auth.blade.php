<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') - Smart Finance</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo-2.png') }}"/>
	<link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
    <style>
    	@import url('https://rsms.me/inter/inter.css');
      	:root {
      		--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      	}
      	body {
      		font-feature-settings: "cv03", "cv04", "cv11";
      	}
    </style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class=" d-flex flex-column">
	<script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
    <div class="row g-0 align-items-center flex-fill">
		<div class="bg-primary min-vh-100 col-12 col-lg-6 col-xl-6 d-flex flex-column justify-content-center">
			@yield('content')
		</div>
		<div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
			<img src="{{ asset('img\logo_new.png') }}" height="400" class="d-block mx-auto" alt="">
		</div>
    </div>

	<script>
		$(document).ready(function() {
			$('#togglePassword').click(function() {
				var passwordInput = $('#password');
				if (passwordInput.attr('type') === 'password') {
					passwordInput.attr('type', 'text');
				} else {
					passwordInput.attr('type', 'password');
				}
			});
		});
	</script>
	<script>
		@if (Session::has('success'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.success("{{ Session::get('success') }}");
		@endif
		@if (Session::has('error'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.error("{{ Session::get('error') }}",);
		@endif
    </script>
    <script src="{{ ('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ ('js/demo.min.js?1684106062') }}" defer></script>
</body>

</html>