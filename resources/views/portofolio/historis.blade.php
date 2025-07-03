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
	<form class="row"id="filterForm" action="{{ route('historis.filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none input-group">
            <select class="form-select" name="jenisFilter" id="jenisFilter">
            @foreach ($uniqueYears as $year)
				<option value="{{$year}}" {{ $year == $selectedYear ? 'selected' : '' }}>{{$year}}</option>
            @endforeach
			</select>
            <div class="col-auto d-print-none" name="btnFilter" id="btnFilter" data-bs-original-title="Filter" data-bs-placement="bottom" data-bs-toggle="tooltip">
                <button type="submit" class="btn pe-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                </button>
            </div>
        </div>
	</form>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a class="btn btn-primary"  id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
          	Cetak PDF
      	</a>
	</div>
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
                            <h4>Riwayat Bulanan</h4>
                        </div>
                        <div class="col-6 text-muted text-end">
                            <h4>{{$selectedYear}}</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center col-2">Yield Floating</th>
                                    <th class="text-center col-2">Yield IHSG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($historisByYear->toArray()))
                                @foreach($groupedByMonth as $bulan => $data)
                                <tr>
                                    <td style="width:5%">{{ \Carbon\Carbon::create()->month($bulan)->locale('id')->translatedFormat('F') }}</td>
                                    <td class="text-center @if($data['yield'] < 0) text-red @elseif($data['yield'] > 0) text-green @endif">{{ $data['yield'] !== null ? number_format($data['yield'], 2, ',', '.') . '%' : '-' }}</td>
                                    <td class="text-center @if($data['yield_ihsg'] < 0) text-red @elseif($data['yield_ihsg'] > 0) text-green @endif">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2, ',', '.') . '%' : '-' }}</td>
                                </tr>
                                @endforeach
                                {{-- Baris Total --}}
                                <tr class="fw-bold">
                                    <td>Total</td>
                                    <td class="text-center">{{ number_format($totalYieldMonth, 2, ',', '.') }}%</td>
                                    <td class="text-center">{{ number_format($totalYieldIhsgMonth, 2, ',', '.') }}%</td>
                                </tr>

                                {{-- Baris Rata-rata --}}
                                <tr class="fw-bold">
                                    <td>Rata-rata</td>
                                    <td class="text-center">{{ number_format($averageYieldMonth, 2, ',', '.') }}%</td>
                                    <td class="text-center">{{ number_format($averageYieldIhsgMonth, 2, ',', '.') }}%</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada riwayat bulanan.</td>
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
                <div class="card-body">
                     <div class="d-flex align-items-center">
                    <h4>Grafik Bulanan</h4>
                      <div class="ms-auto lh-1 text-muted">
                        <h4>{{$selectedYear}}</h4>
                      </div>
                    </div>
                    <div id="chart-bulanan"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-body card-body-scrollable" style="max-height: 400px">
                    <div class="row">
                        <div class="col-6">
                            <h4>Riwayat Tahunan</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center col-2">Yield Floating</th>
                                    <th class="text-center col-2">Yield IHSG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($historisByYear->toArray()))
                                @foreach($historisByYear as $tahun => $data)
                                <tr>
                                    <td style="width:5%">{{ $tahun }}</td>
                                    <td class="text-center @if($data['yield'] < 0) text-red @elseif($data['yield'] > 0) text-green @endif">{{ $data['yield'] !== null ? number_format($data['yield'], 2, ',', '.') . '%' : '-' }}</td>
                                    <td class="text-center @if($data['yield_ihsg'] < 0) text-red @elseif($data['yield_ihsg'] > 0) text-green @endif">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2, ',', '.') . '%' : '-' }}</td>
                                </tr>
                                @endforeach
                                {{-- Baris Total --}}
                                <tr class="fw-bold">
                                    <td>Total</td>
                                    <td class="text-center">{{ number_format($totalYieldYear, 2, ',', '.') }}%</td>
                                    <td class="text-center">{{ number_format($totalYieldIhsgYear, 2, ',', '.') }}%</td>
                                </tr>

                                {{-- Baris Rata-rata --}}
                                <tr class="fw-bold">
                                    <td>Rata-rata</td>
                                    <td class="text-center">{{ number_format($averageYieldYear, 2, ',', '.') }}%</td>
                                    <td class="text-center">{{ number_format($averageYieldIhsgYear, 2, ',', '.') }}%</td>
                                </tr>
                                @else
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada riwayat tahunan.</td>
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
                <div class="card-body">
                    <div class="d-flex align-items-center">
                         <h4>Grafik Tahunan</h4>
                      
                    </div>
                    <div id="chart-tahunan"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>    

<table class="table table-bordered table-vcenter" hidden>
    <thead>
        <tr>
            <th class="text-center">Tahun</th>
            <th class="text-center">Yield</th>
            <th class="text-center">Yield IHSG</th>
        </tr>
    </thead>
    <tbody id="tableTahun">
        @if(!empty($historisByYear->toArray()))
        @foreach($historisByYear as $tahun => $data)
        <tr>
            <td style="width:5%" class="text-center">{{ $tahun }}</td>
            <td class="text-center">{{ $data['yield'] !== null ? number_format($data['yield'], 2, ',', '.') . '%' : '-' }}</td>
            <td class="text-center">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2, ',', '.') . '%' : '-' }}</td>
        </tr>
        @endforeach
        {{-- Baris Total --}}
        <tr class="fw-bold">
            <td>Total</td>
            <td class="text-center">{{ number_format($totalYieldYear, 2, ',', '.') }}%</td>
            <td class="text-center">{{ number_format($totalYieldIhsgYear, 2, ',', '.') }}%</td>
        </tr>

        {{-- Baris Rata-rata --}}
        <tr class="fw-bold">
            <td>Rata-rata</td>
            <td class="text-center">{{ number_format($averageYieldYear, 2, ',', '.') }}%</td>
            <td class="text-center">{{ number_format($averageYieldIhsgYear, 2, ',', '.') }}%</td>
        </tr>
        @else
        <tr>
            <td class="text-center" colspan="3">Belum ada riwayat tahunan.</td>
        </tr>
        @endif
    </tbody>
</table>

<table class="table table-bordered table-vcenter" hidden>
    <thead>
        <tr>
            <th class="text-center">Bulan</th>
            <th class="text-center">Yield</th>
            <th class="text-center">Yield IHSG</th>
        </tr>
    </thead>
    <tbody id="tableBulan">
        @if(!empty($historisByYear->toArray()))
        @foreach($groupedByMonth as $bulan => $data)
        <tr>
            <td style="width:5%">{{ \Carbon\Carbon::create()->month($bulan)->locale('id')->translatedFormat('F') }}</td>
            <td class="text-center">{{ $data['yield'] !== null ? number_format($data['yield'], 2, ',', '.') . '%' : '-' }}</td>
            <td class="text-center">{{ $data['yield_ihsg'] !== null ? number_format($data['yield_ihsg'], 2, ',', '.') . '%' : '-' }}</td>
        </tr>
        @endforeach
        {{-- Baris Total --}}
        <tr class="fw-bold">
            <td>Total</td>
            <td class="text-center">{{ number_format($totalYieldMonth, 2, ',', '.') }}%</td>
            <td class="text-center">{{ number_format($totalYieldIhsgMonth, 2, ',', '.') }}%</td>
        </tr>

        {{-- Baris Rata-rata --}}
        <tr class="fw-bold">
            <td>Rata-rata</td>
            <td class="text-center">{{ number_format($averageYieldMonth, 2, ',', '.') }}%</td>
            <td class="text-center">{{ number_format($averageYieldIhsgMonth, 2, ',', '.') }}%</td>
        </tr>
        @else
        <tr>
            <td class="text-center" colspan="3">Belum ada riwayat bulanan.</td>
        </tr>
        @endif
    </tbody>
</table>

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
        const groupedByYear = @json($groupedByYear); // Ambil data dari controller
        console.log(groupedByYear);

        const seriesData = {
            labels: [],
            yield: [],
            yield_ihsg: [],
        };

        for (const [year, dataArray] of Object.entries(groupedByYear)) {
            const data = dataArray[0]; // Ambil objek pertama dari array

            seriesData.labels.push(year);

            const yieldValue = parseFloat(data.yield);
            seriesData.yield.push(yieldValue);

            const yieldIhsgValue = data.yield_ihsg !== null ? parseFloat(data.yield_ihsg) : null;
            seriesData.yield_ihsg.push(yieldIhsgValue);
        }


        // Konfigurasi ApexCharts
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tahunan'), {
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
                categories: seriesData.labels, // Tahun sebagai label X
                labels: {
                    padding: 4,
                    style: { fontSize: "12px" }
                }
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


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const groupedByMonth = @json($groupedByMonth);

    const selectedLocale = @json(app()->getLocale()); // Ambil bahasa dari aplikasi

    const formatter = new Intl.DateTimeFormat(selectedLocale, { month: "long" });

    const seriesData = {
        labels: [],
        yield: [],
        yield_ihsg: [],
    };

    for (const [month, data] of Object.entries(groupedByMonth)) {
        const monthIndex = parseInt(month) - 1; // Konversi ke index (0-11)
        const monthName = formatter.format(new Date(2000, monthIndex, 1)); // Format bulan berdasarkan locale
        seriesData.labels.push(monthName);

        // Format nilai yield tanpa pembulatan
        const yieldValue = parseFloat(data.yield); // Konversi ke persen
        seriesData.yield.push(yieldValue);

        // Format nilai yield_ihsg tanpa pembulatan
        const yieldIhsgValue = data.yield_ihsg !== null ? parseFloat(data.yield_ihsg) : null;
        seriesData.yield_ihsg.push(yieldIhsgValue);
    }

    // Konfigurasi ApexCharts
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-bulanan'), {
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
            categories: seriesData.labels, // Nama bulan dinamis
            labels: {
                padding: 4,
                style: { fontSize: "12px" }
            }
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

<script>
    document.getElementById('printModalToPdf').addEventListener('click', function () {

            const userName = @json($user['name']);
            const userEmail = @json($user['email']);
            const currentDate = @json($date); 
            const selectedYear = @json($selectedYear); 

            const modalTableTahun = document.getElementById('tableTahun');
            const modalTableBulan = document.getElementById('tableBulan');
            const tableRowsTahun = Array.from(modalTableTahun.querySelectorAll('tr'));
            const tableRowsBulan = Array.from(modalTableBulan.querySelectorAll('tr'));
            
            const pdfTableTahun = [
                [{ text: 'Bulan', style: 'tableHeader' }, 
                { text: 'Yield', style: 'tableHeader' },
                { text: 'Yield IHSG', style: 'tableHeader' },]
            ];

            const pdfTableBulan = [
                [{ text: 'Bulan', style: 'tableHeader' }, 
                { text: 'Yield', style: 'tableHeader' }, 
                { text: 'Yield IHSG', style: 'tableHeader' },]
            ];
            
            tableRowsTahun.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableTahun.push([
                    cells[0].textContent, 
                    cells[1].textContent, 
                    cells[2].textContent,  
                ]);
            });

            tableRowsBulan.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableBulan.push([
                    cells[0].textContent, 
                    cells[1].textContent, 
                    cells[2].textContent,  
                ]);
            });

            
            const docDefinition = {
            content: [
                // First row with two tables
                {
                                alignment: 'justify',
                                columns: [
                                    {
                                        text: [`${userName}\n`, { text: userEmail, bold: false, color: 'gray' }],
                                        bold: true
                                    },
                                    {
                                        text: [`${currentDate}\nSmart Finance`],
                                        style: ['alignRight'],
                                        color: 'gray',
                                    }
                                ]
                            },
                            {
                                text: [`\nHistoris ${selectedYear}\n\n`],
                                style: 'header',
                                alignment: 'center'
                            },
                {
                    columns: [
                        // First Table (adjust widths to fit in page)
                        {
                            style: 'tableExample',
                            table: {
                                headerRows: 1,
                                widths: ['*', '*', '*'],  // Use '*' for flexible widths
                                body: pdfTableTahun,
                            },
                        },
                        // Second Table (next to the first table in the same row)
                        {
                            style: 'tableExample',
                            table: {
                                headerRows: 1,
                                widths: ['*', '*', '*'],  // Use '*' for flexible widths
                                body: pdfTableBulan,
                            },
                        }
                    ]
                }
            ],
            styles: {
                tableExample: {
                    margin: [0, 5, 0, 15]  // Adds margin between tables
                },
                header: {
                                fontSize: 18,
                                bold: true,
                                alignment: 'justify',
                            },
                            alignRight: {
                                alignment: 'right'
                            },
                            tableExample: {
                                margin: [0, 5, 0, 15]
                            },
                            tableHeader: {
                                bold: true,
                                fontSize: 12,
                                color: 'black',
                                fillColor: '#CEEFFD',
                            },
            },
            defaultStyle: {
                columnGap: 20
            },
            pageOrientation: 'landscape'  // Optional: Set page orientation to landscape for more space
        };


        // Create and open the PDF
        pdfMake.createPdf(docDefinition).open();


        });
</script>


@endsection