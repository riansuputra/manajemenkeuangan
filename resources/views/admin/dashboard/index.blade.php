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
										11
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
										<div class="text-muted">User Online</div>
										<div class="ms-auto lh-1">
											<div class="dropdown">
												<a class="text-muted">
													
												</a>
											</div>
										</div>
									</div>
                            		<div class="h2 m-0 text-green">
										3
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
										52
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
										2
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
		
		<div class="col-lg-6">
			<div class="card">
					<div class="card-body">
					<h3 class="card-title text-muted mb-5">Tren Saldo</h3>
					<div id="chart-tren-saldo" class="chart-lg" style="min-height: 240px;"></div>
				</div>
			</div>
		</div>

        <div class="col-lg-6">
			<div class="card">
					<div class="card-body">
					<h3 class="card-title text-muted mb-5">User Online</h3>
					<div id="chart-jumlah-pengguna-online" class="chart-lg" style="min-height: 240px;"></div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dummy data for pemasukan (income)
        const pemasukanData = [
            { kategori: "Gaji", total_jumlah: 5000000 },
            { kategori: "Uang Saku", total_jumlah: 2000000 },
            { kategori: "Bonus", total_jumlah: 1000000 },
            { kategori: "Investasi", total_jumlah: 3000000 },
        ];

        const seriesData = pemasukanData.map((stat, index) => {
            const value = parseFloat(stat.total_jumlah);
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
                color: rgbaColor,
            };
        });

        const labelsData = pemasukanData.map(stat => stat.kategori);

        window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
            chart: {
                type: "donut",
                fontFamily: 'inherit',
                height: 150,
                sparkline: { enabled: true },
                animations: { enabled: true },
            },
            series: seriesData.map(data => data.value),
            labels: labelsData,
            fill: { opacity: 1 },
            colors: seriesData.map(data => data.color),
            legend: {
                show: true,
                position: 'right',
                markers: { width: 10, height: 10, radius: 100 },
                itemMargin: { horizontal: 2, vertical: 2 },
            },
            tooltip: {
                theme: 'dark',
                y: { formatter: function(val) { return 'Rp. ' + formatNumber(val); } },
                fillSeriesColor: false,
            },
        })).render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dummy data for pengeluaran (expenses)
        const pengeluaranData = [
            { kategori: "Makanan", total_jumlah: 2000000 },
            { kategori: "Kesehatan & Olahraga", total_jumlah: 1500000 },
            { kategori: "Tagihan", total_jumlah: 2500000 },
            { kategori: "Minuman", total_jumlah: 1800000 },
        ];

        const seriesData = pengeluaranData.map((stat, index) => {
            const value = parseFloat(stat.total_jumlah);
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
                color: rgbaColor,
            };
        });

        const labelsData = pengeluaranData.map(stat => stat.kategori);

        window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#2'), {
            chart: {
                type: "donut",
                fontFamily: 'inherit',
                height: 150,
                sparkline: { enabled: true },
                animations: { enabled: true },
            },
            series: seriesData.map(data => data.value),
            labels: labelsData,
            fill: { opacity: 1 },
            colors: seriesData.map(data => data.color),
            legend: {
                show: true,
                position: 'right',
                markers: { width: 10, height: 10, radius: 100 },
                itemMargin: { horizontal: 2, vertical: 2 },
            },
            tooltip: {
                theme: 'dark',
                y: { formatter: function(val) { return 'Rp. ' + formatNumber(val); } },
                fillSeriesColor: false,
            },
        })).render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dummy data for semua data (all data: pemasukan vs pengeluaran)
        const semuaData = [
            { jenis: "Pemasukan", total_jumlah: 10000000 },
            { jenis: "Pengeluaran", total_jumlah: 7800000 },
        ];

        const seriesData = semuaData.map((stat, index) => {
            const value = parseFloat(stat.total_jumlah);
            const redShades = [
                "rgb(0, 255, 0)", // Green for income
                "rgb(255, 0, 0)", // Red for expenses
            ];
            const color = redShades[index % redShades.length];
            const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
            return {
                value: value,
                color: rgbaColor,
            };
        });

        const labelsData = semuaData.map(stat => stat.jenis);

        window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#3'), {
            chart: {
                type: "donut",
                fontFamily: 'inherit',
                height: 150,
                sparkline: { enabled: true },
                animations: { enabled: true },
            },
            series: seriesData.map(data => data.value),
            labels: labelsData,
            fill: { opacity: 1 },
            colors: seriesData.map(data => data.color),
            legend: {
                show: true,
                position: 'right',
                markers: { width: 10, height: 10, radius: 100 },
                itemMargin: { horizontal: 2, vertical: 2 },
            },
            tooltip: {
                theme: 'dark',
                y: { formatter: function(val) { return 'Rp. ' + formatNumber(val); } },
                fillSeriesColor: false,
            },
        })).render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dummy untuk jumlah pengguna online
        var dates = ["2024-11-15", "2024-11-16", "2024-11-17", "2024-11-18", "2024-11-19", "2024-11-20", "2024-11-21"];
        var usersOnline = [5, 7, 1, 0, 3, 2, 4];

        window.ApexCharts && (new ApexCharts(document.getElementById('chart-jumlah-pengguna-online'), {
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
            stroke: {
                width: 2,
                curve: "smooth",
            },
            series: [{
                name: "Pengguna Online",
                data: usersOnline
            }],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val + ' pengguna';
                    },
                },
            },
            xaxis: {
                type: 'datetime',
                categories: dates,
                labels: {
                    format: 'dd MMM',
                },
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val + ' pengguna';
                    },
                },
            },
            colors: ["#1e90ff"],
            grid: {
                strokeDashArray: 4,
            },
        })).render();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dummy untuk tren saldo
        var dates = ["2024-11-15", "2024-11-16", "2024-11-17", "2024-11-18", "2024-11-19", "2024-11-20", "2024-11-21"];
        var balances = [150000, 175000, 200000, 180000, 220000, 250000, 1000000];

        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tren-saldo'), {
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
                }
            },
            stroke: {
                width: 2,
                curve: "smooth",
            },
            series: [{
                name: "Jumlah Saldo",
                data: balances
            }],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return 'Rp. ' + val.toLocaleString("id-ID");
                    },
                },
            },
            xaxis: {
                type: 'datetime',
                categories: dates,
                labels: {
                    format: 'dd MMM',
                },
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return 'Rp. ' + val.toLocaleString("id-ID");
                    },
                },
            },
            colors: ["#34a853"],
            grid: {
                strokeDashArray: 4,
            },
        })).render();
    });
</script>



@endsection