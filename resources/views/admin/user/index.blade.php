@extends('layouts.admin')

@section('title', 'User')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
	<h2 class="page-title">
        Daftar User
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body card-body-scrollable" style="height:35rem;">
                    <div class="mb-3">
                        <input type="text" id="searchInput1" class="form-control" placeholder="Cari data user...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter table-striped table-bordered"  id="dataTable1">
                            <thead>
                                <tr>
                                    <th class="text-center w-1">No.</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No. Telp</th>
                                    <th class="text-center w-1">Terverifikasi</th>
                                    <th class="text-center w-1">Tanggal Pembuatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userData as $loopIndex => $user)
                                <tr>
                                    <td>{{$loopIndex + 1 }}</td>
                                    <td class="">{{$user['name']}}</td>
                                    <td class="">{{$user['email']}}</td>
                                    @if(!empty($user['alamat']))
                                    <td class="">{{$user['alamat']}}</td>
                                    @else
                                    <td class="text-center">-</td>
                                    @endif
                                    @if(!empty($user['no_telp']))
                                    <td class="">{{$user['no_telp']}}</td>
                                    @else
                                    <td class="text-center">-</td>
                                    @endif
                                    <td class="text-center">
                                        @if(!empty($user['email_verified_at']))
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="green"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                        @else
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="red"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ date('Y-m-d', strtotime($user['created_at'])) }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
<input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" hidden>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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
	});
</script>
@endsection
