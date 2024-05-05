@extends('layouts.tabler')

@section('title', 'Dashboard')

@section('page-title')
<div class="col-auto me-auto d-print-none">
    <h2 class="page-title">
        Dashboard
    </h2>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('dashboard-filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none">
		<select class="form-select" name="jenisFilter" id="jenisFilter">
    <option value="Kisaran" {{ $jenisFilter == 'Kisaran' ? 'selected' : '' }}>Kisaran</option>
    <option value="Mingguan" {{ $jenisFilter == 'Mingguan' ? 'selected' : '' }}>Mingguan</option>
    <option value="Bulanan" {{ $jenisFilter == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
    <option value="Tahunan" {{ $jenisFilter == 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
</select>

		</div>
		<div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter"></div>
		<div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
			<button type="submit" class="btn w-100 btn-icon" aria-label="Tabler">
				<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" /><path d="M15 19l2 2l4 -4" /></svg>
			</button>
		</div>
	</form>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
    	<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
				Tambah Catatan
		</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>    
    </div>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row row-deck row-cards">
		<div class="col-12">
			<div class="row row-cards">
				<div class="col-sm-6 col-lg-4">
					<div class="card card-sm">
						<div class="card-body">
                        	<div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-primary text-white avatar">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M9 7l6 0"></path><path d="M9 11l6 0"></path><path d="M9 15l4 0"></path></svg>
                            		</span>
                          		</div>
                          		<div class="col">
                            		<div class="subheader mb-1">
                              			Total Catatan
                            		</div>
                            		<div class="text-muted">
                              			{{$catTotal}} Catatan
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                    </div>
				</div>
				<div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
						<div class="card-body">
                        	<div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-green text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1"></path><path d="M12 7v10"></path></svg>
                            			
                            		</span>
                          		</div>
                          		<div class="col">
                            		<div class="subheader mb-1">
                              			Pemasukan
                            		</div>
                            		<div class="text-muted">
                              			{{$catPemasukan}} Catatan
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                    </div>
				</div>
				<div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                      	<div class="card-body">
	                        <div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-red text-white avatar">
                            			<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M13 17h-7v-14h-2" /><path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
                            		</span>
                          		</div>
                          		<div class="col">
                            		<div class="subheader mb-1">
                              			Pengeluaran
                            		</div>
									<div class="text-muted">
                              			{{$catPengeluaran}} Catatan
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-2">
						<div class="subheader">Saldo</div>
					</div>
					<div class="h1">Rp. {{ number_format(floatval($saldo), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-2">
						<div class="subheader">Total Pemasukan</div>
					</div>
					<div class="h1 text-green">+Rp. {{ number_format(floatval($totalPemasukan), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-2">
						<div class="subheader">Total Pengeluaran</div>
					</div>
					<div class="h1 text-red">-Rp. {{ number_format(floatval($totalPengeluaran), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title subheader">Tren Saldo</h3>
					<div id="chart-completion-tasks-3" class="chart-lg" style="min-height: 240px;"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<h3 class="card-title subheader mt-3 ms-4">Catatan Terakhir</h3>
				<div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      	<tbody>
							@foreach ($catatanTerakhir as $catatan)
							@if (isset($catatan['id_pemasukan']))
							<tr>
								<td class="w-1">
									<span class="bg-green text-white avatar">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1"></path><path d="M12 7v10"></path></svg>
									</span>
								</td>
								<td class="td-truncate">
									<div class="text-truncate text-green">
										{{$catatan['kategori_pemasukan']['nama_kategori_pemasukan']}}
									</div>
									<div class="text-truncate text-muted">
									@if (isset($catatan['catatan']))
										{{$catatan['catatan']}}
									@else
										-
									@endif
									</div>
								</td>
								<td class="text-nowrap text-muted">
									<div class="text-end text-green">
										+Rp. {{ number_format(floatval($catatan['jumlah']), 0, ',', '.')}}
									</div>
									<div class="text-end text-muted">
										{{ date('d/m/Y', strtotime($catatan['tanggal'])) }}
									</div>
								</td>
							</tr>
							@else
							<tr>
								<td class="w-1">
									<span class="bg-red text-white avatar">
										<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M13 17h-7v-14h-2" /><path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
									</span>
								</td>
								<td class="td-truncate">
									<div class="text-truncate text-red">
										{{$catatan['kategori_pengeluaran']['nama_kategori_pengeluaran']}}
									</div>
									<div class="text-truncate text-muted">
									@if (isset($catatan['catatan']))
										{{$catatan['catatan']}}
									@else
										-
									@endif
									</div>
								</td>
								<td class="text-nowrap text-muted">
									<div class="text-end text-red">
										-Rp. {{ number_format(floatval($catatan['jumlah']), 0, ',', '.')}}
									</div>
									<div class="text-end text-muted">
										{{ date('d/m/Y', strtotime($catatan['tanggal'])) }}
									</div>
								</td>
							</tr>
							@endif
                        	@endforeach
						</tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    	const jenisSelect = document.getElementById("jenisFilter");
    	const pilihanDiv = document.getElementById("pilihanFilter");

	    const spinner = document.getElementById("spinner");
    	const pageContent = document.getElementById("page-content");
    	const pageTitle = document.getElementById("page-title");

    // Hide spinner and show page content when fully loaded
	    window.addEventListener("load", function() {
    	    spinner.style.display = "none";
	        pageContent.style.display = "block";
        	pageTitle.style.display = "block";
    	});

    // Function to show spinner
    

		function handleChange() {
    const selectedOption = jenisSelect.value;
    // Clear existing content
    pilihanDiv.innerHTML = "";

    if (selectedOption === "Mingguan") {
        // Create input type week
        const inputWeek = document.createElement("input");
        inputWeek.type = "week";
        inputWeek.classList.add("form-control");
        inputWeek.setAttribute("name", "filterMingguan");
        inputWeek.setAttribute("id", "filterMingguan");
        pilihanDiv.appendChild(inputWeek);
    } else if (selectedOption === "Bulanan") {
        // Create input type month
        const inputMonth = document.createElement("input");
        inputMonth.type = "month";
        inputMonth.classList.add("form-control");
        inputMonth.setAttribute("name", "filterBulanan");
        inputMonth.setAttribute("id", "filterBulanan");
        pilihanDiv.appendChild(inputMonth);
    } else if (selectedOption === "Tahunan") {
        // Create input type number for year
        const inputYear = document.createElement("input");
        inputYear.type = "number";
        inputYear.min = "1900";
        inputYear.max = "2099";
        inputYear.step = "1";
        inputYear.value = "2024";
        inputYear.classList.add("form-control");
        inputYear.setAttribute("name", "filterTahunan");
        inputYear.setAttribute("id", "filterTahunan");
        pilihanDiv.appendChild(inputYear);
    } else if (selectedOption === "Kisaran") {
        // Create select with options for Kisaran
        const selectKisaran = document.createElement("select");
        selectKisaran.classList.add("form-select");
        selectKisaran.setAttribute("name", "filterKisaran");
        selectKisaran.setAttribute("id", "filterKisaran");

        const options = [
            { text: "Semua", value: "semuaHari" },
            { text: "Hari Ini", value: "iniHari" },
            { text: "7 Hari", value: "7Hari" },
            { text: "30 Hari", value: "30Hari" },
            { text: "90 Hari", value: "90Hari" },
            { text: "12 Bulan", value: "12Bulan" },
        ];

        options.forEach(optionData => {
            const option = document.createElement("option");
            option.text = optionData.text;
            option.value = optionData.value;

            // Check if option value matches the passed value
            if (option.value === '{{ $filterValue }}') {
                option.selected = true;
            }

            selectKisaran.add(option);
        });

        pilihanDiv.appendChild(selectKisaran);
    }
}

function handleSubmit(event) {
    event.preventDefault(); // Prevent form submission

    const selectedOption = jenisSelect.value;

    if (selectedOption === "Mingguan") {
        const filterMingguan = document.getElementById("filterMingguan").value;
        // Now you have the value of the selected week, you can do whatever you need with it
    } else if (selectedOption === "Bulanan") {
        const filterBulanan = document.getElementById("filterBulanan").value;
        // Now you have the value of the selected month, you can do whatever you need with it
    } else if (selectedOption === "Tahunan") {
        const filterTahunan = document.getElementById("filterTahunan").value;
        // Now you have the value of the selected year, you can do whatever you need with it
    } else if (selectedOption === "Kisaran") {
        const filterKisaran = document.getElementById("filterKisaran").value;
        // Now you have the value of the selected Kisaran option, you can do whatever you need with it
    }

    // Now you can submit the form data, or perform any other action based on the selected option
}



		// Add event listener for change event
		jenisSelect.addEventListener("change", handleChange);

		// Trigger change event on page load
		const initialEvent = new Event("change");
		jenisSelect.dispatchEvent(initialEvent);
	});
</script>

<script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-3'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      		},
          plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Tasks completion",
      			data: [155, 65, 465, 265, 225, 325, 80]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>

@endsection