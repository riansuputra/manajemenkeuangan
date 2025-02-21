@extends('layouts.auth')

@section('title', __('auth.register'))

@section('content')
<div class="container container-tight">
	<div class="text-center mb-4">
		<a class="navbar-brand navbar-brand-autodark">
			<img class="mb-2" src="{{ asset('img/logo-2.png') }}" height="30" alt="">
			<h1 class="m-0 text-white">Smart Finance</h1>
		</a>
	</div>
	<div class="card card-md">
		<div class="card-body">
			<h2 class="h2 text-center mb-4">{{ __('auth.register_account') }}</h2>
			<form action="{{ route('register') }}" method="post" autocomplete="off">
				@csrf
				<div class="mb-3">
					<label class="form-label">{{ __('auth.name') }} :</label>
					<input name="name" id="name" type="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ __('auth.enter_name') }}" autocomplete="off" required>
					@if ($errors->has('name'))
						<div class="invalid-feedback">
							{{ $errors->first('name') }}
						</div>
					@endif
				</div>
				<div class="mb-3">
					<label class="form-label">{{ __('auth.email') }} :</label>
					<input name="email" id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('auth.enter_email') }}" autocomplete="off" required>
					@if ($errors->has('email'))
						<div class="invalid-feedback">
							{{ $errors->first('email') }}
						</div>
					@endif
				</div>
				<div class="mb-3">
					<label class="form-label">{{ __('auth.password') }} :</label>
					<div class="input-group">
						<input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="{{ __('auth.enter_password') }}" autocomplete="off" required>
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
						{{ __('auth.confirm_password') }} :
					</label>
					<div class="input-group">
						<input type="password" id="konfirmasiPassword" name="konfirmasiPassword" class="form-control {{ $errors->has('konfirmasiPassword') ? 'is-invalid' : '' }}" placeholder="{{ __('auth.enter_confirm_password') }}" autocomplete="off" required>
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
				<span class="form-label-description mb-3">
					<div class="dropdown">
						<a class="dropdown-toggle text-muted" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							@if((session('locale', config('app.locale'))) == 'en') 
								English
							@elseif((session('locale', config('app.locale'))) == 'id')
							  	Indonesia 
							@endif
						</a>
						<div class="dropdown-menu dropdown-menu-end" style="">
							<a class="dropdown-item" href="{{ route('bahasa.id') }}">Indonesia</a>
							<a class="dropdown-item" href="{{ route('bahasa.en') }}">English</a>
						</div>
					</div>
				</span>
				<div class="form-footer">
					<button type="submit" class="btn btn-primary w-100">{{ __('auth.register') }}</button>
				</div>
			</form>
		</div>
	</div>
	<div class="text-center text-white mt-3">
		{{ __('auth.already_have_account') }} <a href="{{ route('login.page') }}" class="fw-bold text-white" tabindex="-1"><u>{{ __('auth.login') }}</u></a>
	</div>
</div>
@endsection