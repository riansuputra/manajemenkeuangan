
<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>{{ __('auth.forgot_password') }} - Smart Finance</title>
    <!-- CSS files -->
	<link rel="icon" type="image/png" href="{{ asset('img/logo-2.png') }}"/>
    <link href="{{ asset('dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet"/>
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
            <form class="card card-md" action="{{ route('password') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ __('auth.forgot_password') }}</h2>
                    <p class="text-muted mb-4">{{ __('auth.enter_emailP') }}</p>
                    <div class="mb-3">
                        <label class="form-label">{{ __('auth.email') }} :</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('auth.enter_email') }}" required>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary text-white w-100">{{ __('auth.send_new_password') }}</button>
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
</body>

</html>