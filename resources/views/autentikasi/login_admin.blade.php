@extends('layouts.auth')

@section('title', 'Masuk Admin')

@section('content')
<div class="container-tight">
	<div class="card card-md">
		<div class="card-body">
			<h2 class="h2 text-center mb-4">Masuk Admin</h2>
			<form action="{{ route('login.admin') }}" method="post" autocomplete="off">
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
							<a href="">Lupa kata sandi?</a>
						</span>
						<br>
				<div class="form-footer mb-2">
					<button type="submit" class="btn btn-primary w-100">MASUK</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection