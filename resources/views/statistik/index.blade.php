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
                        <h3 class="card-title">Pemasukan</h3>
                    </div>
                    <div id="chart-demo-pie" style="min-height: 201.9px;">
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="width:30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedPemasukanData as $stat)
                                <tr>
                                    <td>{{ $stat['kategori'] }}</td>
                                    <td class="d-flex justify-content-between">
                                        <span class="text-start text-green">Rp.</span>
                                        <span class="text-end text-green">{{ number_format(floatval($stat['total_jumlah']), 0, ',', '.')}}</span>
                                    </td> 
                                </tr>           
                                @endforeach
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
                        <h3 class="card-title">Pengeluaran</h3>
                    </div>
                    <div id="chart-demo-pie#2" style="min-height: 201.9px;"></div>
                    <div class="table-responsive mt-3">
                        <table class="table table-vcenter card-table table-striped">
                        <thead>
                                <tr>
                                    <th></th>
                                    <th style="width:30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedPengeluaranData as $stat)
                                <tr>
                                    <td>{{ $stat['kategori'] }}</td>
                                    <td class="d-flex justify-content-between">
                                        <span class="text-start text-green">Rp.</span>
                                        <span class="text-end text-green">{{ number_format(floatval($stat['total_jumlah']), 0, ',', '.')}}</span>
                                    </td> 
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
          
<script>
    console.log("Pemasukan Data:", @json($groupedPemasukanData));
    console.log("Pengeluaran Data:", @json($groupedPengeluaranData));
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pemasukanData = @json($groupedPemasukanData);
        
        if (typeof pemasukanData === 'object' && !Array.isArray(pemasukanData)) {
            const seriesData = Object.values(pemasukanData).map(stat => parseFloat(stat['total_jumlah']));
            const labelsData = Object.values(pemasukanData).map(stat => stat['kategori']);
            
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);

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
                series: seriesData,
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: [
                    tabler.getColor("green"),
                    
                ],
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
        } else {
            console.error("Pemasukan data is not an object:", pemasukanData);
        }
    });
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
      		series: [
                44,
                55,
                12,
                2
            ],
      		labels: [
                "Direct",
                "Affilliate",
                "E-mail",
                "Other"
            ],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		colors: [
                tabler.getColor("red"),
                tabler.getColor("primary", 0.8),
                tabler.getColor("primary", 0.6),
                tabler.getColor("gray-300")
            ],
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