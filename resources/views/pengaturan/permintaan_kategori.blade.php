@extends('layouts.user')

@section('title', 'Permintaan Kategori')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Permintaan Kategori
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="col-lg-12">
		<div class="card mb-3">
			<div class="card-body">
				<form action="{{ route('permintaanKategoriStore') }}" method="post" autocomplete="off">
					@csrf
					<h3 class="card-title">Tambah Permintaan Kategori</h3>
					<div class="row">
						<div class="col-lg-3">
							<div class="mb-3">
								<label class="form-label required">Nama Kategori:</label>
								<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="(Contoh : Pakaian)" required>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="mb-3">
								<label class="form-label required">Tipe Kategori:</label>
								<select class="form-select"name="tipe_kategori" id="tipe_kategori" required>
									<option value="" selected disabled>Pilih Tipe Kategori</option>
									<option value="pemasukan">Pemasukan</option>
									<option value="pengeluaran">Pengeluaran</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="mb-3">
								<label class="form-label required">Cakupan Kategori:</label>
								<select class="form-select"name="cakupan_kategori" id="cakupan_kategori" required>
									<option value="" selected disabled>Pilih Cakupan Kategori</option>
									<option value="global">Global</option>
									<option value="personal">Personal</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="mb-3">
								<label class="form-label">&nbsp</label>
								<button type="submit" class="btn btn-primary w-100">
									Submit
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
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
                                <th class="text-center">Pesan</th>
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
								<td class="text-muted " style="width:1%">
									<span class="badge  @if(($kategori['status']) == 'pending') bg-warning @elseif(($kategori['status']) == 'approved') bg-success @elseif(($kategori['status']) == 'rejected') bg-danger @endif me-2"></span>{{ucwords($kategori['status'])}}
								</td>
								<td class="@if (empty($kategori['message'])) text-center @else text @endif" style="width:5%">{{$kategori['message'] ?? '-'}}</td>
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

<script>
  document.addEventListener('DOMContentLoaded', function () {

	const spinner = document.getElementById("spinner");
	const pageContent = document.getElementById("page-content");
	const pageTitle = document.getElementById("page-title");

	// Hide spinner and show page content when fully loaded
	window.addEventListener("load", function() {
		spinner.style.display = "none";
		pageContent.style.display = "block";
		pageTitle.style.display = "block";
	});
  });
</script>
@endsection