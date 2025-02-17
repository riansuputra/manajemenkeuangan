@extends('layouts.user')

@section('title', 'Permintaan Kategori')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Permintaan Kategori
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-kategori">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Tambah
      	</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-kategori" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
		<div class="col-lg-12">
			<div class="card mb-3">
				<div class="card-body card-body-scrollable" style="max-height: 400px;">
					<h3 class="card-title">Daftar Permintaan Kategori</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-vcenter table-striped">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Tipe Kategori</th>
									<th class="text-center">Nama Kategori</th>
									<th class="text-center">Cakupan</th>
									<th class="text-center">Status</th>
									<th class="text-center"></th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($permintaan))
								@foreach($permintaan as $kategori)
								<tr>
									<td class="text-center" style="width:1%">{{ $loop->index + 1 }}</td>
									<td class=" fw-bold @if(($kategori['tipe_kategori']) == 'pengeluaran') text-danger @else text-success @endif" style="width:1%">{{ucwords($kategori['tipe_kategori'])}}</td>
									<td class="" style="width:5%">{{$kategori['nama_kategori']}}</td>
									<td class=" fw-bold" style="width:1%">{{ucwords($kategori['scope'])}}</td>
									<td class=" " style="width:1%">
										<span class="badge  @if(($kategori['status']) == 'pending') bg-warning @elseif(($kategori['status']) == 'approved') bg-success @elseif(($kategori['status']) == 'rejected') bg-danger @endif me-2"></span>{{ucwords($kategori['status'])}}
									</td>
									<td style="width:1%" class="text-center">
										<a href="" class=""  title="Info" data-bs-toggle="modal" data-bs-target="#modal-info-{{$kategori['id']}}">
											<span class="nav-link-icon d-md-none d-lg-inline-block">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
											</span>
										</a>
									</td>
								</tr>

								<!-- Modal Info Kas -->
								<div class="modal modal-blur fade" id="modal-info-{{$kategori['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Detail Permintaan Kategori</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-6">
														<p class="mb-0 text-muted">Nama Kategori :</p>
														<h4>{{$kategori['nama_kategori']}}</h4>
													</div>
													<div class="col-6">
														<p class="mb-0 text-muted">Tipe Kategori :</p>
														<h4 class="@if(($kategori['tipe_kategori']) == 'pengeluaran') text-danger @else text-success @endif">{{ucwords($kategori['tipe_kategori'])}}</h4>
													</div>
												</div>
												<div class="row">
													<div class="col-6">
														<p class="mb-0 text-muted">Cakupan :</p>
														<h4>{{ucwords($kategori['scope'])}}</h4>
													</div>
													<div class="col-6">
														<p class="mb-0 text-muted">Status :</p>
														<h4 class="@if(($kategori['status']) == 'pending') text-warning 
															@elseif(($kategori['status']) == 'rejected') text-danger
															@else text-success @endif">{{ucwords($kategori['status'])}}</h4>
													</div>
												</div>
												<div class="row">
													<div class="col-6">
														<p class="mb-0 text-muted">Tanggal Pengajuan :</p>
														<h4>{{ \Carbon\Carbon::parse($kategori['created_at'])->format('d/m/Y') ?? '-' }}</h4>
													</div>
													<div class="col-6">
														<p class="mb-0 text-muted">Tanggal @if(($kategori['status']) == 'rejected') Ditolak 
															@else Diterima @endif :</p>
														<h4>{{ \Carbon\Carbon::parse($kategori['updated_at'])->format('d/m/Y') ?? '-' }}</h4>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<p class="mb-0 text-muted">Pesan :</p>
														<h4>{{$kategori['message'] ?? '-'}}</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@else
								<tr>
									<td class="text-center" colspan="8">Belum ada data permintaan.</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body card-body-scrollable" style="max-height: 400px;">
					<h3 class="card-title">Daftar Kategori</h3>
					<div class="mb-3">
						<input type="text" id="searchInput1" class="form-control" placeholder="Cari data kategori...">
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-vcenter table-striped" id="dataTable1">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Kategori</th>
									<th class="text-center">Nama Kategori</th>
									<th class="text-center">Cakupan</th>
									<th class="text-center">Tanggal Ditambahkan</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($allKategori))
								@foreach($allKategori as $kat)
								<tr>
									<td class="text-center" style="width:1%">{{ $loop->index + 1 }}</td>
									<td class=" fw-bold @if(($kat['tipe']) == 'pengeluaran') text-danger @else text-success @endif" style="width:1%">{{ucwords($kat['tipe'])}}</td>
									<td class="" style="width:5%">{{$kat['nama_kategori']}}</td>
									<td class=" fw-bold" style="width:1%">{{ucwords($kat['cakupan'])}}</td>
									<td class="text-center" style="width:1%">{{ \Carbon\Carbon::parse($kat['created_at'])->format('d/m/Y') ?? '-' }}</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td class="text-center" colspan="7">Belum ada data permintaan.</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-blur fade" id="modal-kategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Permintaan Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('permintaan.kategori.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
						<div class="mb-3">
							<label class="form-label required">Nama Kategori:</label>
							<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="(Contoh : Pakaian)" required>
						</div>
						<div class="mb-3">
							<label class="form-label required">Tipe Kategori:</label>
							<select class="form-select"name="tipe_kategori" id="tipe_kategori" required>
								<option value="" selected disabled>Pilih Tipe Kategori</option>
								<option value="pemasukan">Pemasukan</option>
								<option value="pengeluaran">Pengeluaran</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label required">Cakupan Kategori:</label>
							<select class="form-select"name="cakupan_kategori" id="cakupan_kategori" required>
								<option value="" selected disabled>Pilih Cakupan Kategori</option>
								<option value="global">Global</option>
								<option value="personal">Personal</option>
							</select>
						</div>

                </div>
                <div class="modal-footer">
					<button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Simpan
                    </button>
                </div>
            </form>	
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
<script>
	document.addEventListener('DOMContentLoaded', function () {
		function searchTable(tableId, inputId) {
			let input = document.getElementById(inputId).value.toLowerCase();  
			let rows = document.querySelectorAll(`#${tableId} tbody tr`);  
			let noDataRow = document.querySelector(`#${tableId} .no-data-row`);  
			let hasVisibleRow = false;

			rows.forEach((row) => {
				let text = row.innerText.toLowerCase();  
				let isVisible = text.includes(input);  

				row.style.display = isVisible ? "" : "none";  

				if (isVisible) {
					hasVisibleRow = true;  
				}
			});

			
			if (noDataRow) {
				if (!hasVisibleRow && input.trim() !== "") {
					
					noDataRow.style.display = "";
				} else {
					
					noDataRow.style.display = "none";
				}
			}
		}

		
		document.getElementById("searchInput1").addEventListener("input", function() {
			searchTable("dataTable1", "searchInput1");
		});
	});
</script>
@endsection