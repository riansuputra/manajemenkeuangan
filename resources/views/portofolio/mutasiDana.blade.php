@extends('layouts.user')

@section('title', 'Mutasi Dana')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Mutasi Dana
    </h2>
    <div class="text-muted mt-1">Tahun {{$selectedYear}}</div>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('mutasi-filter') }}" method="POST">
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
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-saldo">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Kelola Dana
		</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-saldo">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
        <a href="{{ route('portofolio') }}" class="btn btn-warning d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
          	Riwayat Transaksi
      	</a>
        <a href="{{ route('portofolio') }}" class="btn btn-warning d-sm-none btn-icon" aria-label="Create new report">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
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
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Valuasi Awal</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['modal'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit Awal</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['harga_unit'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah Unit Awal</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($firstMutasiDana['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.') }}</h5>
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
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Valuasi Saat Ini</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($saldo ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit Saat Ini</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($lastMutasiDana['harga_unit_saat_ini'] ?? 0, 0, ',', '.') }}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah Unit Saat Ini</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($lastMutasiDana['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.') }}</h5>
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
                        <h4>Mutasi Dana</h4>
                    </div>
                    <div class="col-6 text-muted text-end">
                        <h4>{{$selectedYear}}</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped">
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
                                                            Masuk
                                                        </a>
                                                    @elseif ($item['alur_dana'] < 0)
                                                        <a class="btn btn-sm btn-danger btn-pill ms-auto">
                                                            Keluar
                                                        </a>
                                                    @else
                                                        <a class="btn btn-sm btn-primary btn-pill ms-auto">
                                                            Dividen
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span>Rp.</span>
                                                        </div>
                                                        <div class="col text-end">
                                                            <span>{{ number_format($item['alur_dana'], 0, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
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
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body card-body-scrollable" style="max-height: 400px">
                <div class="row">
                    <div class="col-6">
                        <h4>Riwayat Dana</h4>
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
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Jumlah</th>
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
                                                    <a class="btn btn-sm btn-success btn-pill ms-auto">Masuk</a>
                                                @elseif ($data['saldo'] < 0)
                                                    <a class="btn btn-sm btn-danger btn-pill ms-auto">Keluar</a>
                                                @else
                                                    <a class="btn btn-sm btn-primary btn-pill ms-auto">Dividen</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <span>Rp.</span>
                                                    </div>
                                                    <div class="col text-end">
                                                        <span>{{ number_format($data['saldo'], 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </td>
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
                <h5 class="modal-title">Kelola Dana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('saldoStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Pilih Jenis:</label>
                                <select class="form-select" value="" name="tipe_saldo" id="tipe_saldo" required>
                                    <option class="text-muted" value="" selected>Pilih Jenis</option>
                                    <option value="masuk">Top Up</option>
                                    <option value="dividen">Top Up Dividen</option>
                                    <option value="keluar">Withdraw</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Tanggal: </label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" id="saham-field" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label required">Pilih Saham:</label>
                                <select name="id_saham" class="form-select" id="select-people" required>
                                    <option value="" selected disabled>Pilih Saham</option>
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
                                    <option value="" disabled>Belum terdapat data saham</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" id="jumlah-field">
                            <div class="mb-3">
                                <label class="form-label required">Jumlah </label>
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
                    <a href="" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Simpan
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>
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
@endsection