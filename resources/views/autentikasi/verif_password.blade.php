
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ __('auth.confirmation_email') }} - Smart Finance</title>
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
</head>
  
<body  class="bg-primary d-flex flex-column">
    <script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
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
                        {{ __('auth.reset_link_sent') }} <strong>support@tabler.io</strong>.<br />
                        {{ __('auth.click_to_reset') }}
                    </p>
                </div>
                <div class="text-center text-white mt-3">
                    {{ __('auth.check_spam') }}<br />
                    {{ __('auth.wrong_email') }} <a href="#" class="text-white"><u>{{ __('auth.re_enter_email') }}</u></a>
                </div>
                <div class="form-footer mb-2">
					<a href="{{ route('login.page') }}" class="btn text-primary">{{ __('auth.back_to_login') }}</a>
				</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/tabler.min.js?1684106062')}}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062')}}" defer></script>
</body>

</html>