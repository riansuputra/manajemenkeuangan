@extends('layouts.admin')

@section('title', 'Permintaan Kategori Admin')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
    <h2 class="page-title">
        Permintaan Kategori
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col-12">
		<div class="card">
			<div class="card-body card-body-scrollable" style="max-height:500px;">
				<div class="mb-3">
    				<input type="text" id="searchInput1" class="form-control" placeholder="Cari data...">
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
									<div class="text-muted"><a href="#" class="text-reset">{{$data['user_id']}} - {{\Illuminate\Support\Str::limit($data['user']['email'], 50, '...')}}</a></div>
								</td>
								@if(isset($data['admin_id']))
									<td>
										<div class="font-weight-medium">{{\Illuminate\Support\Str::limit($data['admin']['name'], 50, '...')}}</div>
										<div class="text-muted"><a href="#" class="text-reset">{{$data['admin_id']}} - {{\Illuminate\Support\Str::limit($data['admin']['email'], 50, '...')}}</a></div>
									</td>
								@else
									<td class="">
										<div class="font-weight-medium">-</div>
										<div class="text-muted"><a href="#" class="text-reset">-</a></div>
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
								</td>
								<td class="w-1">
									<div class="btn-list flex-nowrap">
										@if($data['status'] == 'pending')
										<form action="{{ route('permintaanApprove', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
											@csrf
											<input type="text" id="id" name="id" value="{{ $data['id'] }}" hidden>
											<button type="submit" class="btn btn-outline-success btn-icon">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
											</button>
										</form>
										<form action="{{ route('permintaanReject', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
											@csrf
											<input type="text" id="id" name="id" value="{{ $data['id'] }}" hidden>
											<button type="submit" class="btn btn-outline-danger btn-icon">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
											</button>
										</form>
										@elseif($data['status'] == 'rejected')
											<button href="#" class="btn btn-outline-success btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
											</button>
											<button href="#" class="btn btn-danger btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
											</button>
										@elseif($data['status'] == 'approved')
											<button href="#" class="btn btn-success btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
											</button>
											<button href="#" class="btn btn-outline-danger btn-icon" disabled>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
											</button>
										@endif
									</div>
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
<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
<input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" hidden>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		function searchTable(tableId, inputId) {
			let input = document.getElementById(inputId).value.toLowerCase();  // Get the input value
			let rows = document.querySelectorAll(`#${tableId} tbody tr`);  // Get all rows from the table
			let noDataRow = document.querySelector(`#${tableId} .no-data-row`);  // Get the "no data" row
			let hasVisibleRow = false;

			rows.forEach((row) => {
				let text = row.innerText.toLowerCase();  // Get text content of the row
				let isVisible = text.includes(input);  // Check if the row should be visible

				row.style.display = isVisible ? "" : "none";  // Show or hide the row based on the search

				if (isVisible) {
					hasVisibleRow = true;  // If a visible row is found, set hasVisibleRow to true
				}
			});

			// If no visible rows are found, show the "no data found" row, otherwise hide it
			if (noDataRow) {
				if (!hasVisibleRow && input.trim() !== "") {
					// If there are no matching rows and search input is not empty
					noDataRow.style.display = "";
				} else {
					// Otherwise hide the "no data found" row
					noDataRow.style.display = "none";
				}
			}
		}

		// Event listeners for each search input
		document.getElementById("searchInput1").addEventListener("input", function() {
			searchTable("dataTable1", "searchInput1");
		});
		
		document.getElementById("searchInput2").addEventListener("input", function() {
			searchTable("dataTable2", "searchInput2");
		});
	});
</script>

@endsection