@extends('layouts.admin')

@section('title', 'Permintaan Kategori')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
    <h2 class="page-title">
        Permintaan Kategori
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-kategori">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Tambah Kategori
		</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-kategori">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col-12">
		<div class="card mb-3">
			<div class="card-body card-body-scrollable" style="max-height:400px;">
				<h3>Daftar Permintaan Kategori</h3>
				<div class="mb-3">
    				<input type="text" id="searchInput1" class="form-control" placeholder="Cari data permintaan...">
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-scrollable" id="dataTable1" style="max-height:2px;">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Kategori</th>
								<th>Tipe</th>
								<th>User</th>
								<th>Admin</th>
								<th>Cakupan</th>
								<th>Status</th>
								<th class="w-1"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($permintaan as $data)
							<tr>
								<td class="w-1 text-center">{{$loop->iteration}}.</td>
								<td>{{$data['nama_kategori']}}</td>
								<td>
									@if($data['tipe_kategori'] == 'pengeluaran')
										<div class="text-red text-strong">Pengeluaran</div>
									@else
										<div class="text-green text-strong">Pemasukan</div>
									@endif
								</td>
								<td>
									<div class="font-weight-medium">{{\Illuminate\Support\Str::limit($data['user']['name'], 50, '...')}}</div>
									<div class="text-muted"><a href="" class="text-reset">{{$data['user_id']}} - {{\Illuminate\Support\Str::limit($data['user']['email'], 50, '...')}}</a></div>
								</td>
								@if(isset($data['admin_id']))
									<td>
										<div class="font-weight-medium">{{\Illuminate\Support\Str::limit($data['admin']['name'], 50, '...')}}</div>
										<div class="text-muted"><a href="" class="text-reset">{{$data['admin_id']}} - {{\Illuminate\Support\Str::limit($data['admin']['email'], 50, '...')}}</a></div>
									</td>
								@else
									<td class="">
										<div class="font-weight-medium">-</div>
										<div class="text-muted"><a href="" class="text-reset">-</a></div>
									</td>
								@endif
								<td class="text-muted">
									<span class="badge @if($data['scope'] == 'global') bg-primary 
										@elseif($data['scope'] == 'personal') bg-black @endif me-2"></span>{{ucwords($data['scope'])}}
								</td>
								<td class="text-muted" >
									<span class="badge @if($data['status'] == 'pending') bg-warning
										@elseif($data['status'] == 'rejected') bg-danger
										@elseif($data['status'] == 'approved') bg-success @endif me-2"></span>{{ucwords($data['status'])}}
									@if(!empty($data['message']))
										<div class="text-muted text-truncate">{{$data['message']}}</div>
									@endif
								</td>
								<td class="w-1">
									<div class="btn-list flex-nowrap">
										@if($data['status'] == 'pending')
										<a href="" class="btn btn-outline-success btn-icon" data-bs-toggle="modal" data-bs-target="#modal-approve-{{$data['id']}}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</a>
										<a href="" class="btn btn-outline-danger btn-icon" data-bs-toggle="modal" data-bs-target="#modal-message-{{$data['id']}}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</a>
										@elseif($data['status'] == 'rejected')
											<button href="" class="btn btn-outline-success btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
											</button>
											<button href="" class="btn btn-danger btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
											</button>
										@elseif($data['status'] == 'approved')
											<button href="" class="btn btn-success btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
											</button>
											<button href="" class="btn btn-outline-danger btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
											</button>
										@endif
									</div>
								</td>
							</tr>

							<!-- Modal Approve Message -->
                            <div class="modal modal-blur fade" id="modal-approve-{{$data['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail - {{$data['nama_kategori']}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.permintaan.approve', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $data['id'] }}">
														<div class="mb-3">
															<label class="form-label required">{{ __('settings.category_name') }}:</label>
															<div class="row">
																	<div class="input-group">
															<span class="input-group-text">
																ID
															</span>
															<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{$data['nama_kategori']}}" required>

															</div>
																
															</div>
														</div>
														<div class="mb-3">
															<div class="row">
																	<div class="input-group">
															<span class="input-group-text">
																EN
															</span>
															<input type="text" class="form-control" id="nama_kategori_en" name="nama_kategori_en" value="{{$data['nama_kategori']}}" required>

															</div>
																
															</div>
														</div>
														
                                                <div class="row">
													<div class="col-lg-12">
														<div class="mb-3">
															<label class="form-label required">Cakupan Approve:</label>
															<select class="form-select" name="scope" id="scope" required>
																<option value="global" @if($data['scope'] == 'global') selected @endif>Global</option>
																<option value="personal" @if($data['scope'] == 'personal') selected @endif>Personal</option>
															</select>
														</div>
													</div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Pesan: </label>
                                                            <div class="input-group">
                                                                <input type="text" id="message" name="message" class="form-control" autocomplete="off" placeholder="Ketik Pesan..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success ms-auto">
													<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                                    Terima
                                                </button>
                                            </div>
                                        </form>	
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Approve Message -->
							 <!-- Modal Reject Message -->
							 <div class="modal modal-blur fade" id="modal-message-{{$data['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$data['nama_kategori']}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.permintaan.reject', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Pesan : </label>
                                                            <div class="input-group">
                                                                <input type="text" id="message" name="message" class="form-control" autocomplete="off" placeholder="Ketik Pesan..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger ms-auto">
													<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                                    Tolak
                                                </button>
                                            </div>
                                        </form>	
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Reject Message -->
							@endforeach
							<tr id="noDataRow" class="no-data-row" style="display: none;">
								<td class="text-center" colspan="8">Tidak ada hasil yang ditemukan.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body card-body-scrollable" style="max-height:400px;">
				<h3>Daftar Kategori</h3>
				<div class="mb-3">
    				<input type="text" id="searchInput2" class="form-control" placeholder="Cari data kategori...">
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-scrollable" id="dataTable2" style="max-height:2px;">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Kategori</th>
								<th>Tipe</th>
								<th>Cakupan</th>
								<th>Tanggal Ditambahkan</th>
								<th class="w-1"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($allKategori as $kategori)
							<tr>
								<td class="w-1 text-center">{{$loop->iteration}}.</td>
								<td>{{ucwords($kategori['nama_kategori'])}}</td>
								<td>
									@if($kategori['tipe'] == 'pengeluaran')
										<div class="text-red text-strong">Pengeluaran</div>
									@else
										<div class="text-green text-strong">Pemasukan</div>
									@endif
								</td>
								<td class="text-muted">
									<span class="badge @if($kategori['cakupan'] == 'global') bg-primary 
										@elseif($kategori['cakupan'] == 'personal') bg-black @endif me-2"></span>{{ucwords($kategori['cakupan'])}}
								</td>
								<td>{{\Carbon\Carbon::parse($kategori['created_at'])->locale('id')->translatedFormat(' d F Y | H:i')}}</td>
								<td style="width:1%" class="text-center">
                                    <a href="" class=""  title="Info" data-bs-toggle="modal" data-bs-target="#modal-info-">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                        </span>
                                    </a>
                                </td>
							</tr>
							@endforeach
							<tr id="noDataRow" class="no-data-row" style="display: none;">
								<td class="text-center" colspan="8">Tidak ada hasil yang ditemukan.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Approve Message -->
<div class="modal modal-blur fade" id="modal-kategori" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Kategori</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('admin.kategori.store') }}" method="post" autocomplete="off">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-3">
								<label class="form-label required">Nama Kategori: </label>
								<div class="input-group">
									<input type="text" id="nama_kategori" name="nama_kategori" class="form-control" autocomplete="off" placeholder="Masukkan Nama Kategori..." required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label class="form-label required">Pilih Jenis:</label>
								<select class="form-select" name="tipe" id="tipe" required>
									<option value="" selected disabled>Pilih Jenis</option>
									<option value="pengeluaran">Pengeluaran</option>
									<option value="pemasukan">Pemasukan</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success ms-auto">
						<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
						Simpan
					</button>
				</div>
			</form>	
		</div>
	</div>
</div>
<!-- End of Modal Approve Message -->

<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
<input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" hidden>

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
		
		document.getElementById("searchInput2").addEventListener("input", function() {
			searchTable("dataTable2", "searchInput2");
		});
	});
</script>

@endsection