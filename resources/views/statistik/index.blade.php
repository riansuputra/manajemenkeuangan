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
                <div class="card-status-top bg-green"></div>
                <div class="card-header">
                    <h3 class="card-title">Pemasukan</h3>
                </div>
                <div class="card-body">
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
                <div class="card-status-top bg-red"></div>
                <div class="card-header">
                    <h3 class="card-title">Pengeluaran</h3>
                </div>
                <div class="card-body">
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
                                        <span class="text-start text-red">Rp.</span>
                                        <span class="text-end text-red">{{ number_format(floatval($stat['total_jumlah']), 0, ',', '.')}}</span>
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
            const seriesData = Object.values(pemasukanData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const greenShades = [
                    "rgb(0, 255, 0)",       // Lime Green
                    "rgb(50, 205, 50)",     // Lime Green
                    "rgb(0, 128, 0)",       // Green
                    "rgb(34, 139, 34)",     // Forest Green
                    "rgb(0, 100, 0)",       // Dark Green
                ];
                const color = greenShades[index % greenShades.length]; // Cycle through shades
                
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
                    height: 240,
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
                colors: seriesData.map(data => data.color), // Use colors with reduced opacity
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
    document.addEventListener("DOMContentLoaded", function () {
        const pengeluaranData = @json($groupedPengeluaranData);
        
        if (typeof pengeluaranData === 'object' && !Array.isArray(pengeluaranData)) {
            const seriesData = Object.values(pengeluaranData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const redShades = [
                    "rgb(255, 0, 0)",       // Red
                    "rgb(220, 20, 60)",     // Crimson
                    "rgb(178, 34, 34)",     // Firebrick
                    "rgb(139, 0, 0)",       // Dark Red
                    "rgb(205, 92, 92)",     // Indian Red
                ];
                const color = redShades[index % redShades.length]; // Cycle through shades
                
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
                    height: 240,
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
                colors: seriesData.map(data => data.color), // Use colors with reduced opacity
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
            console.error("Pemasukan data is not an object:", pengeluaranData);
        }
    });
</script>



@endsection