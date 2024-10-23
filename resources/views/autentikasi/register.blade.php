<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Registrasi Akun - Smart Finance</title>
	<link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
	<link rel="icon" type="image/png" href="{{ asset('img\logo_new.png') }}"/>
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
    <div class="page page-center">
		<div class="container container-normal pb-4">
			<div class="row align-items-center">
          		<div class="col-lg">
            		<div class="container container-tight">
						<div class="text-center mb-4">
							<a href="." class="navbar-brand navbar-brand-autodark">
								<img class="mb-2" src="{{ asset('img/logo.png') }}" height="30" alt="">
								<h1 class="m-0">Smart Finance</h1>
							</a>
						</div>
              			<div class="card card-md">
                			<div class="card-body">
                  				<h2 class="h2 text-center mb-4">Registrasi Akun</h2>
                  				<form action="{{ route('register') }}" method="post" autocomplete="off">
									@csrf
									<div class="mb-3">
										  <label class="form-label">Nama</label>
                      					<input name="name" id="name" type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" autocomplete="off" required>
										@if ($errors->has('name'))
											<div class="invalid-feedback">
												{{ $errors->first('name') }}
											</div>
										@endif
                    				</div>
                    				<div class="mb-3">
                      					<label class="form-label">Email</label>
                      					<input name="email" id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Masukkan email" autocomplete="off" required>
										@if ($errors->has('email'))
											<div class="invalid-feedback">
												{{ $errors->first('email') }}
											</div>
										@endif
                    				</div>
                    				<div class="mb-3">
                      					<label class="form-label">Password</label>
                      					<div class="input-group">
											<input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Masukkan password" autocomplete="off" required>
											<span class="input-group-text" id="togglePassword" title="Show password" data-bs-toggle="tooltip">
												<svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
											</span>
											@if ($errors->has('password'))
												<div class="invalid-feedback">
													{{ $errors->first('password') }}
												</div>
											@endif
										</div>
                    				</div>
									<div class="mb-2">
                      					<label class="form-label">
                        					Konfirmasi Password
                      					</label>
                      					<div class="input-group">
											<input type="password" id="konfirmasiPassword" name="konfirmasiPassword" class="form-control {{ $errors->has('konfirmasiPassword') ? 'is-invalid' : '' }}" placeholder="Masukkan konfirmasi password" autocomplete="off" required>
											<span class="input-group-text" id="toggleKonfirmasiPassword" title="Show password" data-bs-toggle="tooltip">
												<svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
											</span>
											@if ($errors->has('konfirmasiPassword'))
												<div class="invalid-feedback">
													{{ $errors->first('konfirmasiPassword') }}
												</div>
											@endif
										</div>
                    				</div>
                    				<div class="form-footer">
                      					<button type="submit" class="btn btn-primary w-100">DAFTAR</button>
                    				</div>
                  				</form>
                			</div>
              			</div>
              			<div class="text-center text-muted mt-3">
                			Sudah punya akun? <a href="{{ url('login') }}" tabindex="-1">Masuk</a>
              			</div>
            		</div>
          		</div>
          		<div class="col-lg d-none d-lg-block">
					<img src="{{ asset('img\logo_new.png') }}" height="400" class="d-block mx-auto" alt="">
          		</div>
        	</div>
      	</div>
	</div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
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
			$('#toggleKonfirmasiPassword').click(function() {
				var passwordInput = $('#konfirmasiPassword');

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