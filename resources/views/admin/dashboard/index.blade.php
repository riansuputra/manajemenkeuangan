@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
    <h2 class="page-title">
        Dashboard
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row row-deck row-cards">
		<div class="col-12">
			<div class="row row-cards">
				<div class="col-sm-6 col-lg-3">
					<div class="card card-sm">
						<div class="card-body">
                        	<div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-primary text-white avatar">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                            		</span>
                          		</div>
                          		<div class="col">
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total User</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">
												</a>
											</div>
										</div>
									</div>
                            		<div class="h2 m-0 text-muted">
										{{$userData}}
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                    </div>
				</div>
				<div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
						<div class="card-body">
                        	<div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-green text-white avatar">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plug-connected"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l-1.5 1.5a3.536 3.536 0 1 1 -5 -5l1.5 -1.5z" /><path d="M17 12l-5 -5l1.5 -1.5a3.536 3.536 0 1 1 5 5l-1.5 1.5z" /><path d="M3 21l2.5 -2.5" /><path d="M18.5 5.5l2.5 -2.5" /><path d="M10 11l-2 2" /><path d="M13 14l-2 2" /></svg>
                            		</span>
                          		</div>
                          		<div class="col">
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total Transaksi Portofolio</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">
													
												</a>
											</div>
										</div>
									</div>
                            		<div class="h2 m-0 text-green">
										{{$transaksiData}}
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                    </div>
				</div>
				<div class="col-sm-6 col-lg-3">
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
										<div class="text-muted">Total Catatan Keuangan</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted"></a>
											</div>
										</div>
									</div>
									<div class="h2 m-0 text-red">
										{{$totalCat[0]['total_catatan']}}
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					</div>
				</div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      	<div class="card-body">
	                        <div class="row align-items-center">
                          		<div class="col-auto">
                            		<span class="bg-yellow text-white avatar">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                            		</span>
									
                          		</div>
                          		<div class="col">
								  	<div class="d-flex align-items-center">
										<div class="text-muted">Total Permintaan Kategori</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted"></a>
											</div>
										</div>
									</div>
									<div class="h2 m-0 text-yellow">
										{{$permintaanData}}
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
					<h3 class="card-title text-muted">Total</h3>
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
		
	</div>
</div>

<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
<input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" hidden>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pemasukanData = @json($groupedDataPemasukan);
        console.log(Array.isArray(pemasukanData));
        if (Array.isArray(pemasukanData) && pemasukanData.length > 0) {
            const seriesData = pemasukanData.map((stat, index) => {
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
            
            const labelsData = pemasukanData.map(stat => stat['kategori']);
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
        const pengeluaranData = @json($groupedDataPengeluaran);
        console.log(Array.isArray(pengeluaranData));
        if (Array.isArray(pengeluaranData) && pengeluaranData.length > 0) {
            const seriesData = pengeluaranData.map((stat, index) => {
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
            
            const labelsData = pengeluaranData.map(stat => stat['kategori']);
            
            console.log("Pengeluaran Series Data:", seriesData);
            console.log("Pengeluaran Labels Data:", labelsData);

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
        const semuaData = @json($groupedData);
        console.log(Array.isArray(semuaData));
        if (Array.isArray(semuaData) && semuaData.length > 0) {
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
            
            const labelsData = semuaData.map(stat => stat['jenis']);
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