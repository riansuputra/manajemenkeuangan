@extends('layouts.user')

@section('title', 'Informasi Akun')

@section('page-title')
<div class="col">
    <h2 class="page-title">        
		{{ __('messages.informasi_akun') }}
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
						<h3 class="card-title">{{ __('messages.profil_akun') }}</h3>
						<div class="row g-3">
							<div class="col-md">
								<div class="form-label">{{ __('messages.nama') }} : </div>
								<input type="text" class="form-control" value="{{$user['name']}}" readonly disabled>
							</div>
							<div class="col-md">
								<div class="form-label">{{ __('messages.email') }} : </div>
								<input type="text" class="form-control" value="{{$user['email']}}" readonly disabled>
							</div>
							<div class="col-md">
								<div class="form-label">{{ __('messages.alamat') }} :</div>
								<input type="text" id="alamat" name="alamat" class="form-control" value="{{($user['alamat']) ?? ''}}" placeholder="Masukkan Alamat">
							</div>
							
							<div class="col-md">
								<div class="form-label">{{ __('messages.no_telp') }} : </div>
								<input type="tel" id="no_telp" name="no_telp" class="form-control" 
									value="{{ $user['no_telp'] ?? '' }}" 
									pattern="[\+0-9]+"
									placeholder="Masukkan No. Telp" 
									oninput="this.value = this.value.replace(/[^0-9+]/g, '')">
							</div>
						</div>
						<div class="row g-2">
							<div class="col-auto">
								<h3 class="card-title mt-4">{{ __('messages.kategori') }} :</h3>
								<div>
									<a href="{{route('permintaan.kategori')}}" class="btn bg-primary text-white">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
										{{ __('messages.permintaan_kategori') }}
									</a>
								</div>
							</div>
							<div class="col-auto">
								<h3 class="card-title mt-4">{{ __('messages.bantuan_dukungan') }} :</h3>
								<div>
									<a href="mailto:smartfinance.ta.com" class="btn bg-secondary text-white">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
										{{ __('messages.kirim_pesan') }}
									</a>
								</div>
							</div>
						</div>
						
						<h3 class="card-title mt-4">{{ __('messages.data_pribadi') }}</h3>
						<div class="row g-2">
							<div class="col-auto">
								<a href="" class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-keuangan">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('messages.hapus_data_catatan_keuangan_anggaran') }}
								</a>
							</div>
							<div class="col-auto">
								<a href="" class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-catatan">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('messages.hapus_data_catatan_umum') }}
								</a>
							</div>
							<div class="col-auto" >
								<a href="" class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-hapus-portofolio">
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
									{{ __('messages.hapus_data_portofolio') }}
								</a>
							</div>
						</div>
					</div>
					<div class="card-footer bg-transparent mt-auto">
						<div class="btn-list justify-content-end">
							<button type="submit" class="btn btn-success ms-auto">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
								{{ __('messages.simpan_perubahan') }}
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
				<h3>Konfirmasi Penghapusan</h3>
				<div class="">Apakah anda yakin ingin menghapus data catatan dan anggaran?</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								Batal
							</a>
						</div>
						<div class="col">
							<form method="POST" action="{{route('informasi.keuangan.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									Hapus
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
				<h3>Konfirmasi Penghapusan</h3>
				<div class="">Apakah anda yakin ingin menghapus data catatan umum?</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								Batal
							</a>
						</div>
						<div class="col">
							<form method="post" action="{{route('informasi.catatan.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									Hapus
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
				<h3>Konfirmasi Penghapusan</h3>
				<div class="">Apakah anda yakin ingin menghapus data portofolio?</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								Batal
							</a>
						</div>
						<div class="col">
							<form method="post" action="{{route('informasi.portofolio.hapus')}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									Hapus
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