@extends('layouts.tabler')

@section('title', 'Statistik')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Statistik
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
    <div class="row row-cards">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="card-title">Pengeluaran</h3>
                    </div>
                    <div id="chart-demo-pie" style="min-height: 201.9px;">
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maryjo Lebarree</td>
                                    <td class="text-muted">
                                        Civil Engineer, Product Management
                                    </td>
                                    <td class="text-muted"><a href="#" class="text-reset">mlebarree5@unc.edu</a></td>
                                </tr>
                                <tr>
                                    <td>Egan Poetz</td>
                                    <td class="text-muted">
                                        Research Nurse, Engineering
                                    </td>
                                    <td class="text-muted"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="card-title">Pemasukan</h3>
                    </div>
                    <div id="chart-demo-pie#2" style="min-height: 201.9px;"></div>
                    <div class="table-responsive mt-3">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maryjo Lebarree</td>
                                    <td class="text-muted">
                                        Civil Engineer, Product Management
                                    </td>
                                    <td class="text-muted"><a href="#" class="text-reset">mlebarree5@unc.edu</a></td>
                                </tr>
                                <tr>
                                    <td>Egan Poetz</td>
                                    <td class="text-muted">
                                        Research Nurse, Engineering
                                    </td>
                                    <td class="text-muted"><a href="#" class="text-reset">epoetz6@free.fr</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          

          <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
      		chart: {
      			type: "donut",
      			fontFamily: 'inherit',
      			height: 240,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: true
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [44, 55, 12, 2],
      		labels: ["Direct", "Affilliate", "E-mail", "Other"],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
      		legend: {
      			show: true,
      			position: 'bottom',
      			offsetY: 12,
      			markers: {
      				width: 10,
      				height: 10,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      				vertical: 8
      			},
      		},
      		tooltip: {
      			fillSeriesColor: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>

<script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#2'), {
      		chart: {
      			type: "donut",
      			fontFamily: 'inherit',
      			height: 240,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: true
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [44, 55, 12, 2],
      		labels: ["Direct", "Affilliate", "E-mail", "Other"],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
      		legend: {
      			show: true,
      			position: 'bottom',
      			offsetY: 12,
      			markers: {
      				width: 10,
      				height: 10,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      				vertical: 8
      			},
      		},
      		tooltip: {
      			fillSeriesColor: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>

@endsection