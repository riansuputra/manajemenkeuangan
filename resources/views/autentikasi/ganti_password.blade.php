
<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>{{ __('auth.reset_password') }} - Smart Finance</title>
    <!-- CSS files -->
	<link rel="icon" type="image/png" href="{{ asset('img/logo-2.png') }}"/>
    <link href="{{ asset('dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body  class=" d-flex flex-column bg-primary">
    <script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a class="navbar-brand navbar-brand-autodark">
                    <img class="mb-2" src="{{ asset('img/logo-2.png') }}" height="30" alt="">
                    <h1 class="m-0 text-white">Smart Finance</h1>
                </a>
            </div>
            <form class="card card-md" action="{{ route('password.confirmation') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <h2 class="card-title text-center mb-4">{{ __('auth.reset_password') }}</h2>
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.new_password') }} :</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="{{ __('auth.enter_new_password') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.confirm_new_password') }} :</label>
                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="{{ __('auth.enter_confirm_new_password') }}" required>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">{{ __('auth.reset') }}</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-white mt-3">
                {{ __('auth.return_to_signin') }} <a href="{{ route('login.page') }}" class="fw-bold text-white"><u>{{ __('auth.login') }}</u></a>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/tabler.min.js?1684106062')}}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062')}}" defer></script>
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
		@if (Session::has('warning'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.warning("{{ Session::get('warning') }}",);
		@endif
		@if (Session::has('info'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.info("{{ Session::get('info') }}",);
		@endif
    </script>
</body>

</html>