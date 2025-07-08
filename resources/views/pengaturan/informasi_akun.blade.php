@extends('layouts.user')

@section('title', __('settings.account_information'))

@section('page-title')
<div class="col">
    <h2 class="page-title">        
		{{ __('settings.account_information') }}
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="card">
		<div class="row">
			<div class="col d-flex flex-column">
				<div class="card-body">
				<form action="{{route('user.update')}}" method="post" autocomplete="off">
					@csrf
						<h3 class="card-title">{{ __('settings.account_profile') }}</h3>
						<div class="row g-3">
							<div class="col-md">
								<div class="form-label">{{ __('settings.name') }} : </div>
								<input type="text" class="form-control" value="{{$user['name']}}" readonly disabled>
							</div>
							<div class="col-md">
								<div class="form-label">{{ __('settings.email') }} : </div>
								<input type="text" class="form-control" value="{{$user['email']}}" readonly disabled>
							</div>
							<div class="col-md">
								<div class="form-label">{{ __('settings.address') }} :</div>
								<input type="text" id="alamat" name="alamat" class="form-control" value="{{($user['alamat']) ?? ''}}" placeholder="{{ __('settings.enter_address') }}">
							</div>
							
							<div class="col-md">
								<div class="form-label">{{ __('settings.phone_number') }} : </div>
								<input type="tel" id="no_telp" name="no_telp" class="form-control" 
									value="{{ $user['no_telp'] ?? '' }}" 
									pattern="[\+0-9]+"
									placeholder="{{ __('settings.enter_phone_number') }}" 
									oninput="this.value = this.value.replace(/[^0-9+]/g, '')">
							</div>
						</div>
						<div class="row g-2">
							<div class="col-md">
								<h3 class="card-title mt-4">{{ __('settings.category') }}</h3>
								<div>
									<a href="{{route('permintaan.kategori')}}" class="btn w-100 bg-primary text-white">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
										{{ __('settings.category_request') }}
									</a>
								</div>
							</div>
							<div class="col-md">
								<h3 class="card-title mt-4">{{ __('settings.language') }}</h3>
								<div class="btn-group w-100" role="group">
									
									<a class="btn" href="{{ route('bahasa.en') }}">
										<span class="flag flag-country-gb"></span>
									&nbsp English
									</a>
									<a class="btn" href="{{ route('bahasa.id') }}">
									
											<span class="flag flag-country-id"></span>
									&nbsp Indonesia
									</a>
                              	</div>
							</div>
							<div class="col-md">
								<h3 class="card-title mt-4">{{ __('settings.theme') }}</h3>
								<div class="btn-group w-100" role="group">
										<a class="btn" href="{{ url()->current() }}?theme=dark">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-yellow"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 1.992a10 10 0 1 0 9.236 13.838c.341 -.82 -.476 -1.644 -1.298 -1.31a6.5 6.5 0 0 1 -6.864 -10.787l.077 -.08c.551 -.63 .113 -1.653 -.758 -1.653h-.266l-.068 -.006l-.06 -.002z" /></svg>
									&nbsp {{ __('layout.dark') }}
									</a>
									<a class="btn" href="{{ url()->current() }}?theme=light">
									
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-warning"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M18.313 16.91l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.218 -1.567l.102 .07z" /><path d="M7.007 16.993a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M6.213 4.81l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.217 -1.567l.102 .07z" /><path d="M19.107 4.893a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z" /></svg>

									&nbsp {{ __('layout.light') }}
									</a>
                              	</div>
							</div>
							<div class="col-md">
								<h3 class="card-title mt-4">{{ __('settings.help_support') }}</h3>
								<div>
									<a href="mailto:smartfinance.ta.com" class="btn w-100 bg-secondary text-white">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
										{{ __('settings.send_message') }}
									</a>
								</div>
							</div>
						</div>
						
						<h3 class="card-title mt-4">{{ __('settings.personal_data') }}</h3>
						<div class="row g-2">
							<div class="col-sm-12 col-lg-4">
								<a href="" class="btn w-100 bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-keuangan">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('settings.delete_financial_budget_records') }}
								</a>
							</div>
							<div class="col-sm-12 col-lg-4">
								<a href="" class="btn w-100 bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-catatan">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('settings.delete_general_notes') }}
								</a>
							</div>
							<div class="col-sm-12 col-lg-4" >
								<a href="" class="btn w-100 bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-portofolio">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('settings.delete_portfolio_data') }}
								</a>
							</div>
						</div>
					</div>
					<div class="card-footer bg-transparent mt-auto">
						<div class="btn-list justify-content-end">
							<button type="submit" class="btn btn-success ms-auto">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
								{{ __('settings.save') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hapus Keuangan -->
<div class="modal modal-blur fade" id="modal-hapus-keuangan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
				<h3>{{ __('settings.delete_confirmation') }}</h3>
				<div class="">{{ __('settings.delete_financial_budget_records') }}?</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								{{ __('settings.cancel') }}
							</a>
						</div>
						<div class="col">
							<form method="POST" action="{{route('informasi.keuangan.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									{{ __('settings.delete') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hapus Catatan -->
<div class="modal modal-blur fade" id="modal-hapus-catatan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
				<h3>{{ __('settings.delete_confirmation') }}</h3>
				<div class="">{{ __('settings.delete_general_notes') }}?</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								{{ __('settings.cancel') }}
							</a>
						</div>
						<div class="col">
							<form method="post" action="{{route('informasi.catatan.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									{{ __('settings.delete') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Hapus Portofolio -->
<div class="modal modal-blur fade" id="modal-hapus-portofolio" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
				<h3>{{ __('settings.delete_confirmation') }}</h3>
				<div class="">{{ __('settings.delete_portfolio') }}</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								{{ __('settings.cancel') }}
							</a>
						</div>
						<div class="col">
							<form method="post" action="{{route('informasi.portofolio.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									{{ __('settings.delete') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  	document.addEventListener('DOMContentLoaded', function () {
		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");
		window.addEventListener("load", function() {
    		spinner.style.display = "none";
    		pageContent.style.display = "block";
    		pageTitle.style.display = "block";
		});
  	});
</script>
@endsection