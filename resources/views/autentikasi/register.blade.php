@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
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
@endsection