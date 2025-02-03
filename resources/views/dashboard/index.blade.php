@extends('layouts.user')

@section('title', 'Dashboard')

@section('page-title')
<div class="col-auto me-auto d-print-none">
    <h2 class="page-title">
        {{ __('messages.welcome') }}
        {{ session('locale', config('app.locale')) }}
        <p>Locale saat ini: {{ session('locale') }}</p>

    </h2>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('dashboard-filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none input-group">
            <select class="form-select" name="jenisFilter" id="jenisFilter">
				<option value="Kisaran" {{ $jenisFilter == 'Kisaran' ? 'selected' : '' }}>Kisaran</option>
				<option value="Mingguan" {{ $jenisFilter == 'Mingguan' ? 'selected' : '' }}>Mingguan</option>
				<option value="Bulanan" {{ $jenisFilter == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
				<option value="Tahunan" {{ $jenisFilter == 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
				<option value="Custom" {{ $jenisFilter == 'Custom' ? 'selected' : '' }}>Custom Range</option>
			</select>
		    <div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter"></div>
            <input type="date" class="form-control" name="startdate-filter" id="startdate-filter" hidden>
            <input type="date" class="form-control" name="enddate-filter" id="enddate-filter" hidden>
            <div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
                <button type="submit" class="btn pe-1" aria-label="Tabler">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                </button>
            </div>
        </div>
	</form>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
    	<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
				Tambah Catatan
		</a>
		<a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
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
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total Saldo</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">
													{{$summary['catTotal']}} Catatan
												</a>
											</div>
										</div>
									</div>
                            		<div class="h2 m-0 text-muted">
										Rp. {{ number_format(floatval($summary['saldo']), 0, ',', '.')}}
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
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total Pemasukan</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">
													{{$summary['catPemasukan']}} Catatan
												</a>
											</div>
										</div>
									</div>
                            		<div class="h2 m-0 text-green">
										+Rp. {{ number_format(floatval($summary['totalPemasukan']), 0, ',', '.')}}
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
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total Pengeluaran</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">{{$summary['catPengeluaran']}} Catatan</a>
											</div>
										</div>
									</div>
									<div class="h2 m-0 text-red">
										-Rp. {{ number_format(floatval($summary['totalPengeluaran']), 0, ',', '.')}}
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
					<h3 class="card-title text-muted">All Record</h3>
					<div id="chart-demo-pie#3" class="chart-lg mb-2" style="height: 130px;"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
					<div class="card-body">
					<h3 class="card-title text-muted">Pemasukan</h3>
					<div id="chart-demo-pie" class="chart-lg mb-2" style="height: 130px;"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
					<div class="card-body">
					<h3 class="card-title text-muted">Pengeluaran</h3>
					<div id="chart-demo-pie#2" class="chart-lg mb-2" style="height: 130px;"></div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="card">
					<div class="card-body">
					<h3 class="card-title text-muted mb-5">Tren Saldo</h3>
					<div id="chart-completion-tasks-3" class="chart-lg" style="min-height: 240px;"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body" style="flex:0;">

					<h3 class="card-title text-muted">Catatan Terakhir</h3>
				</div>
				<div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      	<tbody>
							@foreach ($sortedData->take(4) as $catatan)
							@if (isset($catatan['kategori_pemasukan_id']))
							<tr style="height:70px">
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
										(Tanpa catatan)
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
							@elseif (isset($catatan['kategori_pengeluaran_id']))
							<tr style="height:70px">
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
                                        (Tanpa catatan)
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
		const inputStartDate = document.getElementById("startdate-filter");
		const inputEndDate = document.getElementById("enddate-filter");
		const filterValue = '{{ $filterValue }}';
		const startDate = '{{ $startDate }}';
		const endDate = '{{ $endDate }}';

	    const spinner = document.getElementById("spinner");
    	const pageContent = document.getElementById("page-content");
    	const pageTitle = document.getElementById("page-title");

	    window.addEventListener("load", function() {
    	    spinner.style.display = "none";
	        pageContent.style.display = "block";
        	pageTitle.style.display = "block";
    	});

        function handleChange() {
            const selectedOption = jenisSelect.value;
            pilihanDiv.innerHTML = "";

            if (selectedOption === "Mingguan") {
                const inputWeek = document.createElement("input");
                inputWeek.type = "week";
                inputWeek.classList.add("form-control");
                inputWeek.setAttribute("name", "filterMingguan");
                inputWeek.setAttribute("id", "filterMingguan");
                inputWeek.setAttribute("required", "required");
                pilihanDiv.appendChild(inputWeek);
                if (filterValue) {
                    inputWeek.value = filterValue;
                    
                }
                pilihanDiv.hidden = false;
                inputStartDate.hidden = true;
                inputEndDate.hidden = true;
            } else if (selectedOption === "Bulanan") {
                const inputMonth = document.createElement("input");
                inputMonth.type = "month";
                inputMonth.classList.add("form-control");
                inputMonth.setAttribute("name", "filterBulanan");
                inputMonth.setAttribute("id", "filterBulanan");
                inputMonth.setAttribute("required", "required");
                pilihanDiv.appendChild(inputMonth);
                if (filterValue) {
                    inputMonth.value = filterValue;
                    
                }
                pilihanDiv.hidden = false;
                inputStartDate.hidden = true;
                inputEndDate.hidden = true;
            } else if (selectedOption === "Tahunan") {
                const inputYear = document.createElement("input");
                inputYear.type = "number";
                inputYear.min = "1900";
                inputYear.max = "2099";
                inputYear.step = "1";
                inputYear.classList.add("form-control");
                inputYear.setAttribute("name", "filterTahunan");
                inputYear.setAttribute("id", "filterTahunan");
                inputYear.setAttribute("required", "required");
                inputYear.setAttribute("placeholder", "2024");
                pilihanDiv.appendChild(inputYear);
                if (filterValue) {
                    inputYear.value = filterValue;
                    
                } else {
                    inputYear.value = "2024";
                }
                pilihanDiv.hidden = false;
                inputStartDate.hidden = true;
                inputEndDate.hidden = true;
            } else if (selectedOption === "Custom") {
                pilihanDiv.hidden = true;
                inputStartDate.hidden = false;
                inputEndDate.hidden = false;
                if (filterValue) {
                    inputStartDate.value = startDate;
                    inputEndDate.value = endDate;
                }
            } else if (selectedOption === "Kisaran") {
                const selectKisaran = document.createElement("select");
                selectKisaran.classList.add("form-select");
                selectKisaran.setAttribute("name", "filterKisaran");
                selectKisaran.setAttribute("id", "filterKisaran");
                selectKisaran.setAttribute("required", "required");

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

                    if (option.value === filterValue) {
                        option.selected = true;
                        
                    }
                    selectKisaran.add(option);
                });

                pilihanDiv.appendChild(selectKisaran);
                pilihanDiv.hidden = false;
                inputStartDate.hidden = true;
                inputEndDate.hidden = true;
            }
        }

        function handleSubmit(event) {
            event.preventDefault();
            const selectedOption = jenisSelect.value;
            if (selectedOption === "Mingguan") {
                const filterMingguan = document.getElementById("filterMingguan").value;
            } else if (selectedOption === "Bulanan") {
                const filterBulanan = document.getElementById("filterBulanan").value;
            } else if (selectedOption === "Tahunan") {
                const filterTahunan = document.getElementById("filterTahunan").value;
            } else if (selectedOption === "Kisaran") {
                const filterKisaran = document.getElementById("filterKisaran").value;
            }
        }

        jenisSelect.addEventListener("change", handleChange);
        const initialEvent = new Event("change");
        jenisSelect.dispatchEvent(initialEvent);
    });
</script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var dates = {!! json_encode(array_keys($summary['saldoHarian'])) !!};
        var balances = {!! json_encode(array_values($summary['cumulativeSaldoHarian'])) !!};

        if (dates.length === 0 || balances.length === 0) {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-3'), {
                chart: {
                    type: "line",
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
                series: [], // Kosongkan data
                noData: {
                    text: "Tidak ada data.",
                    align: 'center',
                    verticalAlign: 'middle',
                    style: {
                        color: '#999',
                        fontSize: '14px',
                        fontFamily: 'inherit'
                    }
                }
            })).render();

        } else {
            // Jika ada data, buat chart seperti biasa
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-3'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    }
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
                    opacity: 1,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "straight",
                },
                series: [{
                    name: "Jumlah",
                    data: balances
                }],
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val);
                        },
                    },
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
                    categories: dates
                },
                yaxis: {
                    labels: {
                        padding: 4,
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val);
                        },
                    },
                },
                labels: dates,
                colors: [tabler.getColor("primary")],
                legend: {
                    show: false,
                },
            })).render();
        }
    });
    // @formatter:on
</script>

<script>
    console.log("Pemasukan Data:", @json($groupedPemasukanData));
    console.log("Pengeluaran Data:", @json($groupedPengeluaranData));
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pemasukanData = @json($groupedPemasukanData);
        if (typeof pemasukanData === 'object' && !Array.isArray(pemasukanData)) {
            const seriesData = Object.values(pemasukanData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const greenShades = [
                    "rgb(0, 255, 0)",       
                    "rgb(50, 205, 50)",     
                    "rgb(0, 128, 0)",       
                    "rgb(34, 139, 34)",     
                    "rgb(0, 100, 0)",       
                ];
                const color = greenShades[index % greenShades.length];                 
                const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
                return {
                    value: value,
                    color: rgbaColor
                };
            });
            
            const labelsData = Object.values(pemasukanData).map(stat => stat['kategori']);
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: seriesData.map(data => data.value),
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: seriesData.map(data => data.color),
                legend: {
                    show: true,
                    position: 'right',
                    offsetY: 0,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 2,
                        vertical: 2
                    },
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val);
                        },
                    },
                    fillSeriesColor: false
                },
            })).render();
        } else {
            console.error("Pemasukan data is not an object:", pemasukanData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: [], // Empty series
                labels: [], // No labels
                noData: {
                    text: "Tidak ada data.",
                    align: 'center',
                    verticalAlign: 'middle',
                    style: {
                        color: '#999',
                        fontSize: '14px',
                        fontFamily: 'inherit'
                    }
                }
            })).render();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pengeluaranData = @json($groupedPengeluaranData);
        
        if (typeof pengeluaranData === 'object' && !Array.isArray(pengeluaranData)) {
            const seriesData = Object.values(pengeluaranData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const redShades = [
                    "rgb(255, 0, 0)",      
                    "rgb(220, 20, 60)",    
                    "rgb(178, 34, 34)",    
                    "rgb(139, 0, 0)",      
                    "rgb(205, 92, 92)",    
                ];
                const color = redShades[index % redShades.length];
                
                const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
                
                return {
                    value: value,
                    color: rgbaColor
                };
            });
            
            const labelsData = Object.values(pengeluaranData).map(stat => stat['kategori']);
            
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#2'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: seriesData.map(data => data.value),
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: seriesData.map(data => data.color), 
                legend: {
                    show: true,
                    position: 'right',
                    offsetY: 0,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 2,
                        vertical: 2
                    },
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val);
                        },
                    },
                    fillSeriesColor: false
                },
            })).render();
        } else {
            console.error("Pemasukan data is not an object:", pengeluaranData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#2'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: [], // Empty series
                labels: [], // No labels
                noData: {
                    text: "Tidak ada data.",
                    align: 'center',
                    verticalAlign: 'middle',
                    style: {
                        color: '#999',
                        fontSize: '14px',
                        fontFamily: 'inherit'
                    }
                }
            })).render();
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const semuaData = @json($groupedSemuaData);
        if (typeof semuaData === 'object' && !Array.isArray(semuaData)) {
            const seriesData = Object.values(semuaData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const redShades = [
                    "rgb(0, 255, 0)",     
                    "rgb(255, 0, 0)",     
                ];
                const color = redShades[index % redShades.length]; 
                
                const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
                
                return {
                    value: value,
                    color: rgbaColor
                };
            });
            
            const labelsData = Object.values(semuaData).map(stat => stat['jenis']);
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#3'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: seriesData.map(data => data.value),
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: seriesData.map(data => data.color), 
                legend: {
                    show: true,
                    position: 'right',
                    offsetY: 0,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 2,
                        vertical: 2
                    },
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val);
                        },
                    },
                    fillSeriesColor: false
                },
            })).render();
        } else {
            console.error("Pemasukan data is not an object:", semuaData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#3'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 150,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: [], // Empty series
                labels: [], // No labels
                noData: {
                    text: "Tidak ada data.",
                    align: 'center',
                    verticalAlign: 'middle',
                    style: {
                        color: '#999',
                        fontSize: '14px',
                        fontFamily: 'inherit'
                    }
                }
            })).render();
        }
    });
</script>

@endsection