@extends('layouts.user')

@section('title', 'Mutasi Dana')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        {{ __('mutation.fund_mutation') }}
    </h2>
    <div class="text-muted mt-1">{{ __('mutation.year') }} {{$selectedYear}}</div>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('mutasi.filter') }}" method="POST">
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
        <a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-saldo">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            {{ __('mutation.manage_funds') }}
		</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-saldo">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
        <a class="btn btn-primary" id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
          	{{ __('mutation.print_pdf') }}
        </a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row justify-content-between">
        <div class="col-lg-6 text-center">
            <div class="card bg-primary-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.initial_valuation') }}</h5>
                            <h5 id="valuasi_awal" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['modal'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.initial_unit_price') }}</h5>
                            <h5 id="unit_awal" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['harga_unit'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.initial_unit_amount') }}</h5>
                            <h5 id="jumlah_awal" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <div class="card bg-teal-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.current_valuation') }}</h5>
                            <h5 id="valuasi_saatini" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($saldo ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.current_unit_price') }}</h5>
                            <h5 id="unit_saatini" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($lastMutasiDana['harga_unit_saat_ini'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('mutation.current_unit_amount') }}</h5>
                            <h5 id="jumlah_saatini" class="mt-0 mb-1 pt-0 pb-2">{{ number_format($lastMutasiDana['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body card-body-scrollable" style="max-height: 400px">
                <div class="row">
                    <div class="col-6">
                        <h4>{{ __('mutation.fund_mutation') }}</h4>
                    </div>
                    <div class="col-6 text-muted text-end">
                        <h4>{{$selectedYear}}</h4>
                    </div>
                </div>
               
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" >
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">{{ __('mutation.month') }}</th>
                                <th class="text-center">{{ __('mutation.fund_flow') }}</th>
                                <th class="text-center">{{ __('mutation.amount') }}</th>
                                <th class="text-center">{{ __('mutation.unit_price') }}</th>
                                <th class="text-center">{{ __('mutation.initial_unit_amount') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($mutasiDataGrup->toArray()))
                                @foreach($mutasiDataGrup as $tahun => $bulanData)
                                    @foreach($bulanData as $bulan => $data)
                                        @php
                                            $rowCount = count($data); // Menghitung jumlah item untuk bulan tersebut
                                        @endphp
                                        @foreach($data as $index => $item)
                                            <tr>
                                                @if($index == 0)
                                                    <td class="text-center" rowspan="{{ $rowCount }}">{{ $loop->parent->index + 1 }}</td>
                                                    <td class="text-center" rowspan="{{ $rowCount }}">
                                                        {{ \Carbon\Carbon::create($tahun, $bulan, 1)->locale('id')->translatedFormat('F') }}
                                                    </td>
                                                @endif
                                                <td class="text-center" style="width:5%">
                                                    @if($item['alur_dana'] > 0)
                                                        <a class="btn btn-sm btn-success btn-pill ms-auto">
                                                            {{ __('mutation.in') }}
                                                        </a>
                                                    @elseif ($item['alur_dana'] < 0)
                                                        <a class="btn btn-sm btn-danger btn-pill ms-auto">
                                                            {{ __('mutation.out') }}
                                                        </a>
                                                    @else
                                                        <a class="btn btn-sm btn-primary btn-pill ms-auto">
                                                            {{ __('mutation.dividend') }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-end">{{ number_format($item['alur_dana'], 0, ',', '.') }}</td>
                                                <td class="text-center">{{number_format($item['harga_unit_saat_ini'], 0, ',', '.')}}</td>
                                                <td class="text-center">{{number_format($item['jumlah_unit_penyertaan'], 0, ',', '.')}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="7">{{ __('mutation.no_fund_mutation') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body card-body-scrollable" style="max-height: 400px">
                <div class="row">
                    <div class="col-6">
                        <h4>{{ __('mutation.fund_history') }}</h4>
                    </div>
                    <div class="col-6 text-muted text-end">
                        <h4>Total : <span class="text-black">Rp. {{ number_format($saldo, 0, ',', '.') }}</span> </h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">{{ __('mutation.date') }}</th>
                                <th class="text-center">{{ __('mutation.type') }}</th>
                                <th class="text-center">{{ __('mutation.amount') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($saldoData))
                                @php
                                    $sortedGroupedSaldoData = collect($saldoData)->groupBy('tanggal'); // Mengelompokkan data berdasarkan tanggal
                                    $groupedSaldoData = $sortedGroupedSaldoData;
                                @endphp
                                @foreach ($groupedSaldoData as $tanggal => $dataGroup)
                                    @php
                                        $rowCount = count($dataGroup); // Menghitung jumlah item per tanggal
                                    @endphp
                                    @foreach ($dataGroup as $index => $data)
                                        <tr>
                                            @if ($index == 0)
                                                <td  rowspan="{{ $rowCount }}" class="text-center">{{ $loop->parent->index + 1 }}</td>
                                                <td  rowspan="{{ $rowCount }}">{{ \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y') }}</td>
                                            @endif
                                            <td class="text-center" style="width:5%">
                                                @if ($data['saldo'] > 0)
                                                    <a class="btn btn-sm btn-success btn-pill ms-auto">{{ __('mutation.in') }}</a>
                                                @elseif ($data['saldo'] < 0)
                                                    <a class="btn btn-sm btn-danger btn-pill ms-auto">{{ __('mutation.out') }}</a>
                                                @else
                                                    <a class="btn btn-sm btn-primary btn-pill ms-auto">{{ __('mutation.dividend') }}</a>
                                                @endif
                                            </td>
                                            <td class="text-end">{{ number_format($data['saldo'], 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">{{ __('mutation.no_fund_mutation') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Saldo -->
<div class="modal modal-blur fade" id="modal-saldo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('mutation.manage_funds') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('saldo.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-status bg-success"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('mutation.select_type') }}:</label>
                                <select class="form-select" value="" name="tipe_saldo" id="tipe_saldo" required>
                                    <option class="text-muted" value="" selected>{{ __('mutation.select_type') }}</option>
                                    <option value="masuk">{{ __('mutation.top_up') }}</option>
                                    <option value="dividen">{{ __('mutation.top_up_dividend') }}</option>
                                    <option value="keluar">{{ __('mutation.withdraw') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('mutation.date') }}: </label>
                                @php
                                    $tanggalTutup = \Carbon\Carbon::createFromDate($tahunBerikutnya, 1, 1)->format('Y-m-d');
                                @endphp
                                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{ $tanggalTutup }}" value="{{ $tanggalTutup }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" id="saham-field" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('mutation.select_stock') }}:</label>
                                <select name="id_saham" class="form-select" id="select-people" required>
                                    <option value="" selected disabled>{{ __('mutation.select_stock') }}</option>
                                    @if($sortData->isNotEmpty())
                                        @foreach($sortData as $key => $index)
                                            @foreach($index as $dex)
                                                @if ($loop->first)
                                                @else
                                                    <option value="{{$dex['aset']['id']}}">{{$dex['aset']['nama']}} - {{$dex['aset']['deskripsi']}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @else
                                    <option value="" disabled>{{ __('mutation.no_stock_data') }}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" id="jumlah-field">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('mutation.amount') }} </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" required>
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('mutation.cancel') }}</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        {{ __('mutation.save') }}
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>

<table class="table table-bordered table-vcenter table-striped" hidden>
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Bulan</th>
            <th class="text-center">Alur Dana</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Harga Unit</th>
            <th class="text-center">Jumlah Unit</th>
        </tr>
    </thead>
    <tbody id="tableMutasi">
        @if (!empty($mutasiDataGrup->toArray()))
            @foreach($mutasiDataGrup as $tahun => $bulanData)
                @foreach($bulanData as $bulan => $data)
                    @foreach($data as $index => $item)
                        <tr>
                                <td class="text-center"">{{ $loop->parent->index + 1 }}</td>
                                <td class="">{{ \Carbon\Carbon::create($tahun, $bulan, 1)->locale('id')->translatedFormat('F') }}</td>
                                @if($item['alur_dana'] > 0)
                                <td class="text-center">Masuk</td>
                                @elseif ($item['alur_dana'] < 0)
                                <td class="text-center">Keluar</td>                                     
                                @else
                                <td class="text-center">Dividen</td>
                                @endif
                            <td>Rp.<span>{{ number_format($item['alur_dana'], 0, ',', '.') }}</span></td>
                            <td class="text-center">{{number_format($item['harga_unit_saat_ini'], 0, ',', '.')}}</td>
                            <td class="text-center">{{number_format($item['jumlah_unit_penyertaan'], 0, ',', '.')}}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="7">Belum ada mutasi dana.</td>
            </tr>
        @endif
    </tbody>
</table>

<table class="table table-bordered table-vcenter table-striped" hidden>
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Jumlah</th>
        </tr>
    </thead>
    <tbody id="tableRiwayat">
        @if (!empty($saldoData))
            @php
                $sortedGroupedSaldoData = collect($saldoData)->groupBy('tanggal'); // Mengelompokkan data berdasarkan tanggal
                $groupedSaldoData = $sortedGroupedSaldoData;
            @endphp
            @foreach ($groupedSaldoData as $tanggal => $dataGroup)
                @foreach ($dataGroup as $index => $data)
                    <tr>
                        <td class="text-center"">{{ $loop->parent->index + 1 }}</td>
                        <td >{{ \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y') }}</td>
                        @if ($data['saldo'] > 0)
                        <td class="text-center">Masuk</td>
                        @elseif ($data['saldo'] < 0)
                        <td class="text-center">Keluar</td>
                        @else
                        <td class="text-center">Dividen</td>
                        @endif
                        <td>Rp. {{ number_format($data['saldo'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Belum ada riwayat dana.</td>
            </tr>
        @endif
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const spinner = document.getElementById('spinner');
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");

        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        let tipeSaldo = document.getElementById("tipe_saldo");
        let sahamField = document.getElementById("saham-field");
        let jumlahField = document.getElementById("jumlah-field");
        let selectSaham = document.getElementById("select-people");

        tipeSaldo.addEventListener("change", function() {
            if (this.value === "dividen") {
                sahamField.style.display = "block";  // Show "Pilih Saham"
                selectSaham.removeAttribute("disabled"); // Enable field
                selectSaham.setAttribute("required", "true"); // Make required
                
                jumlahField.classList.remove("col-lg-12");
                jumlahField.classList.add("col-lg-6");  // Change to col-lg-6
            } else {
                sahamField.style.display = "none";  // Hide "Pilih Saham"
                selectSaham.setAttribute("disabled", "true"); // Disable field
                selectSaham.removeAttribute("required"); // Remove required
                
                jumlahField.classList.remove("col-lg-6");
                jumlahField.classList.add("col-lg-12");  // Change to col-lg-12
            }
        });
    });
</script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('printModalToPdf').addEventListener('click', function () {

            const userName = @json($user['name']);
            const userEmail = @json($user['email']);
            const currentDate = @json($date); 
            const selectedYear = @json($selectedYear); 

            const valuasiAwal = document.getElementById('valuasi_awal').textContent.trim();
            const unitAwal = document.getElementById('unit_awal').textContent.trim();
            const jumlahAwal = document.getElementById('jumlah_awal').textContent.trim();
            const valuasiSaatIni = document.getElementById('valuasi_saatini').textContent.trim();
            const unitSaatIni = document.getElementById('unit_saatini').textContent.trim();
            const jumlahSaatIni = document.getElementById('jumlah_saatini').textContent.trim();
            const summaryData = [
                ': ' + valuasiAwal,
                ': ' + unitAwal,
                ': ' + jumlahAwal + '\n\n',
                ': ' + valuasiSaatIni,
                ': ' + unitSaatIni,
                ': ' + jumlahSaatIni + '\n\n',
            ];
            
            const tableBodyMutasi = document.getElementById('tableMutasi');
            const tableBodyRiwayat = document.getElementById('tableRiwayat');
            const tableRowsMutasi = Array.from(tableBodyMutasi.querySelectorAll('tr'));
            const tableRowsRiwayat = Array.from(tableBodyRiwayat.querySelectorAll('tr'));


            
            const pdfTableBody = [
                [{ text: 'Bulan', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Alur Dana', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Jumlah', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Harga Unit', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Jumlah Unit', style: 'tableHeader', alignment: 'center' }]
            ];

            const pdfTableBodyRiwayat = [
                [{ text: 'Tanggal', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Jenis', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Jumlah', style: 'tableHeader', alignment: 'center' }]
            ];
            

            // Track the previous values to simulate rowspan
          
            let lastMonth = null;

            tableRowsMutasi.forEach(row => {
                const cells = row.querySelectorAll('td');
                const currentMonth = cells[1].textContent.trim(); // kolom 1 = Bulan

                pdfTableBody.push([
                    
                    lastMonth === currentMonth ? '' : { text: currentMonth, alignment: 'left' },  // Merge "Bulan"
                    { text: cells[2].textContent, alignment: 'center' },  // "Alur Dana" aligned left
                    { text: cells[3].textContent, alignment: 'right' },  // "Jumlah" aligned right
                    { text: cells[4].textContent, alignment: 'right' },  // "Harga Unit" aligned right
                    { text: cells[5].textContent, alignment: 'right' },  // "Jumlah Unit" aligned right
                ]);

                lastMonth = currentMonth;
            });

            tableRowsRiwayat.forEach(row => {
                const cells = row.querySelectorAll('td');
                const currentDate = cells[1].textContent.trim(); // kolom 1 = Tanggal

                pdfTableBodyRiwayat.push([
                    
                    lastMonth === currentDate ? '' : { text: currentDate, alignment: 'left' },  // Merge "Bulan"
                    { text: cells[2].textContent, alignment: 'center' },  // "Alur Dana" aligned left
                    { text: cells[3].textContent, alignment: 'right' },  // "Jumlah" aligned right
                ]);

                lastMonth = currentDate;
            });

            const mergedRows = [];
            const mergedCols = [];

            // Loop through `pdfTableBody` and identify merged rows & columns
            for (let rowIndex = 1; rowIndex < pdfTableBody.length; rowIndex++) {
                // Check for merged rows based on duplicate values in the first column
                if (pdfTableBody[rowIndex][0] === pdfTableBody[rowIndex - 1][0]) {
                    mergedRows.push(rowIndex);
                }
                // Check for merged columns based on duplicate values in the second column
                if (pdfTableBody[rowIndex][1] === pdfTableBody[rowIndex - 1][1]) {
                    mergedCols.push(rowIndex);
                }
            }

            for (let rowIndex = 1; rowIndex < pdfTableBodyRiwayat.length; rowIndex++) {
                // Check for merged rows based on duplicate values in the first column
                if (pdfTableBodyRiwayat[rowIndex][0] === pdfTableBodyRiwayat[rowIndex - 1][0]) {
                    mergedRows.push(rowIndex);
                }
                // Check for merged columns based on duplicate values in the second column
                if (pdfTableBodyRiwayat[rowIndex][1] === pdfTableBodyRiwayat[rowIndex - 1][1]) {
                    mergedCols.push(rowIndex);
                }
            }

            
            const docDefinition = {
                content: [
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
                        text: [`\nMutasi Dana ${selectedYear}\n\n`],
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        columns: [
                            {
                                stack: [
                                    {
                                        ul: [
                                            'Valuasi Awal',
                                            'Harga Unit Awal',
                                            'Jml Unit Awal\n\n',
                                            'Valuasi Saat Ini',
                                            'Harga Unit Saat Ini',
                                            'Jml Unit Saat Ini\n',
                                        ]
                                    },
                                ]
                            },
                            {
                                stack: summaryData,
                            },
                            '',
                            '',
                        ]
                    },
                    {
                        style: 'tableExample',
                        table: {
                            headerRows: 1,
                            widths: ['*', '*', '*', '*', '*'], 
                            body: pdfTableBody 
                        },
                        alignment: 'center',

                    },

                    {
                        text: [`\nRiwayat Dana ${selectedYear}\n\n`],
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        style: 'tableExample',
                        table: {
                            headerRows: 1,
                            widths: ['*', '*', '*'], 
                            body: pdfTableBodyRiwayat 
                        },
                        alignment: 'center',

                    },
                ],
                styles: {
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
                    }
                },
                defaultStyle: {
                    columnGap: 20
                },
                pageOrientation: 'landscape',  // Optional: Set page orientation to landscape for more space
            };
            pdfMake.createPdf(docDefinition).open();
        });
	});
</script>
@endsection