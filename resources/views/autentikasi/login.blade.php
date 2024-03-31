<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Masuk - SIMANKEU</title>
    <!-- CSS files -->
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body  class=" d-flex flex-column">
	<script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page page-center">
    	<div class="container container-normal py-4">
        	<div class="row align-items-center g-4">
          		<div class="col-lg">
            		<div class="container-tight">
              			<div class="text-center mb-4">
                			<a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
              			</div>
              			<div class="card card-md">
                			<div class="card-body">
                  				<h2 class="h2 text-center mb-4">Masuk</h2>
								<form action="{{ route('login') }}" method="post" autocomplete="off">
									@csrf
									<div class="mb-3">
										<label class="form-label">Alamat Email</label>
										<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan alamat email" autocomplete="off">
									</div>
									<div class="mb-2">
										<label class="form-label">
											Kata Sandi
											
										</label>
										<div class="input-group input-group-flat">
											<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" autocomplete="off">
											<span class="input-group-text" id="togglePassword" title="Show password" data-bs-toggle="tooltip">
												<svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
													<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
													<path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
												</svg>
											</span>
										</div>
										
									</div>
									<span class="form-label-description">
												<a href="./forgot-password.html">Lupa kata sandi?</a>
											</span>
											<br>
									<div class="form-footer mb-2">
										<button type="submit" class="btn btn-primary w-100">MASUK</button>
									</div>
								</form>
							</div>
              			</div>
              			<div class="text-center text-muted mt-3">
                			Anda belum memiliki akun? <a href="{{ url('register') }}" tabindex="-1">Daftar sekarang</a>
              			</div>
            		</div>
          		</div>
          		<div class="col-lg d-none d-lg-block">
            		<img src="./static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
          		</div>
        	</div>
      	</div>
    </div>
	<script>
		
		$(document).ready(function() {
			// Click event listener for the eye icon
			$('#togglePassword').click(function() {
				// Get the password input element
				var passwordInput = $('#password');

				// Toggle password visibility by changing its type attribute
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

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ ('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ ('js/demo.min.js?1684106062') }}" defer></script>
</body>

</html>