
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ __('auth.verification_email') }} - Smart Finance</title>
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
  
<body  class="bg-primary d-flex flex-column">
    <script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
    @php
        $input = session('input');
    @endphp
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a class="navbar-brand navbar-brand-autodark">
                    <img class="mb-2" src="{{ asset('img/logo-2.png') }}" height="30" alt="">
                    <h1 class="m-0 text-white">Smart Finance</h1>
                </a>
            </div>
            <div class="text-center">
                <div class="my-5">
                    <h2 class="h1 text-white">{{ __('auth.check_inbox') }}</h2>
                    <p class="fs-h3 text-white">
                        {{ __('auth.verification_link_sent') }} <strong>{{ $input['email'] ?? old('email') }}</strong>.<br />
                        {{ __('auth.click_to_confirm') }}
                    </p>
                </div>
                <div class="text-center text-white mt-3">
                    {{ __('auth.check_spam') }} 
                    <br />
                    {{ __('auth.wrong_email') }} <a href="{{ route('register.page') }}" class="text-white"><u>{{ __('auth.re_enter_email') }}</u></a>
                </div>
                <div class="form-footer mb-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                            <form id="resend-form" action="{{ route('resend.verification') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $input['email'] ?? old('email') }}">
                                <button type="submit" class="btn text-primary">{{ __('auth.resend_email') }}</button>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                            <a href="{{ route('login.page') }}" class="btn text-primary">{{ __('auth.back_to_login') }}</a>
                        </div>
                    </div>
				</div>
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
			toastr.error("{{ Session::get('error') }}");
		@endif
		@if (Session::has('warning'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.warning("{{ Session::get('warning') }}");
		@endif
		@if (Session::has('info'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.info("{{ Session::get('info') }}");
		@endif
    </script>
</body>

</html>