@extends('layouts.user')

@section('title', 'Historis')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Historis
    </h2>
    <div class="text-muted mt-1">Tahun {{$selectedYear}}</div>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('historis-filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none input-group">
            <select class="form-select" name="jenisFilter" id="jenisFilter">
            @foreach ($uniqueYears as $year)
				<option value="{{$year}}" {{ $year == $selectedYear ? 'selected' : '' }}>{{$year}}</option>
            @endforeach
			</select>
            <div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
                <button type="submit" class="btn pe-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                </button>
            </div>
        </div>
	</form>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-body card-body-scrollable" style="max-height: 400px">
                    <div class="row">
                        <div class="col-6">
                            <h4>Riwayat Tahunan</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                            <thead>
                                <tr>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Yield</th>
                                    <th class="text-center">Yield IHSG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($historisByYear->toArray()))
                                @foreach($historisByYear as $tahun => $data)
                                <tr>
                                    <td style="width:5%" class="text-center">{{ $tahun }}</td>
                                    <td class="text-center">{{ $data['yield'] !== null ? number_format($data['yield'], 2) . '%' : '-' }}</td>
                                    <td class="text-center">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2) . '%' : '-' }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="3">Belum ada riwayat tahunan.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-body card-body-scrollable" style="max-height: 400px">
                    <div class="row">
                        <div class="col-6">
                            <h4>Riwayat Bulanan</h4>
                        </div>
                        <div class="col-6 text-muted text-end">
                            <h4>{{$selectedYear}}</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                            <thead>
                                <tr>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Yield</th>
                                    <th class="text-center">Yield IHSG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($historisByYear->toArray()))
                                @foreach($groupedByMonth as $bulan => $data)
                                <tr>
                                    <td style="width:5%">{{ \Carbon\Carbon::create()->month($bulan)->locale('id')->translatedFormat('F') }}</td>
                                    <td class="text-center">{{ $data['yield'] !== null ? number_format($data['yield'], 2) . '%' : '-' }}</td>
                                    <td class="text-center">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2) . '%' : '-' }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="3">Belum ada riwayat bulanan.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="d-flex align-items-center">
                        
                      <div class="ms-auto lh-1 text-muted">
                        <h4>{{$selectedYear}}</h4>
                      </div>
                    </div>
                    <div id="chart-social-referrals"></div>
                </div>
            </div>
        </div>
    </div>
</div>    

<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>
  
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");

        // Hide spinner and show page content when fully loaded
        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Data dari server yang telah diproses
        const groupedByMonth = @json($groupedByMonth);
        const seriesData = {
            labels: [],
            yield: [],
            yield_ihsg: [],
        };
        console.log('@json($selectedYear)');
        // Proses data dari PHP
        for (const [month, data] of Object.entries(groupedByMonth)) {
            const year = @json($selectedYear); // Sesuaikan dengan tahun yang Anda gunakan
            const monthFormatted = month.padStart(2, '0'); // Pastikan bulan memiliki format dua digit
            seriesData.labels.push(`${year}-${monthFormatted}`);
            seriesData.yield.push(parseFloat(data.yield));
            seriesData.yield_ihsg.push(data.yield_ihsg !== null ? parseFloat(data.yield_ihsg) : null);
        }

        // Konfigurasi ApexCharts
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 288,
                parentHeightOffset: 0,
                toolbar: { show: false },
                animations: { enabled: false }
            },
            fill: { opacity: 1 },
            stroke: { width: 2, lineCap: "round", curve: "straight" },
            series: [
                { name: "YIELD", data: seriesData.yield },
                { name: "YIELD IHSG", data: seriesData.yield_ihsg },
            ],
            tooltip: { theme: 'dark' },
            grid: {
                padding: { top: -20, right: 0, left: -4, bottom: -4 },
                strokeDashArray: 4,
                xaxis: { lines: { show: true } }
            },
            xaxis: {
                labels: { padding: 0 },
                tooltip: { enabled: false },
                categories: seriesData.labels, // Labels untuk x-axis
                type: 'datetime'
            },
            yaxis: {
                labels: {
                    padding: 4,
                    formatter: function (value) {
                        return value !== null ? value.toFixed(2) + '%' : '-';
                    }
                },
            },
            colors: [
                tabler.getColor("facebook"), 
                tabler.getColor("youtube"), 
            ],
            legend: {
                show: true,
                position: 'bottom',
                offsetY: 12,
                markers: { width: 10, height: 10, radius: 100 },
                itemMargin: { horizontal: 8, vertical: 8 }
            }
        })).render();
    });
</script>


@endsection