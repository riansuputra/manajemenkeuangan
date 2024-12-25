@extends('layouts.user')

@section('title', 'Mutasi Dana')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Mutasi Dana
    </h2>
    <div class="text-muted mt-1">Tahun 2024</div>

</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('dashboard-filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none input-group">
            <select class="form-select" name="jenisFilter" id="jenisFilter">
				<option value="Kisaran" {{ 'test' == 'Kisaran' ? 'selected' : '' }}>2024</option>
			</select>
            <div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
                <button type="submit" class="btn pe-1">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" /><path d="M15 19l2 2l4 -4" /></svg>
                </button>
            </div>
        </div>
	</form>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="" class="btn btn-warning d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-saldo">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
            Kelola Dana
		</a>
        <a href="" class="btn btn-warning d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-saldo">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
		</a>    
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="col-lg-12 text-center">
        <div class="card bg-primary-lt">
            <div class="card-body pb-0 mb-0">
                <div class="row">
                    <div class="col-4">
                        <h5 class="mt-0 mb-0 pt-0 pb-2">Valuasi Awal :</h5>
                        <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format(array_key_exists(2024, $mutasidana) ? $mutasidana[2024]['modal'] : 0, 0, ',', '.') }}</h5>
                    </div>
                    <div class="col-4">
                        <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit :</h5>
                        <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format(array_key_exists(2024, $mutasidana) ? $mutasidana[2024]['harga_unit'] : 0, 0, ',', '.') }}</h5>
                    </div>
                    <div class="col-4">
                        <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah Unit :</h5>
                        <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format(array_key_exists(2024, $mutasidana) ? $mutasidana[2024]['jumlah_unit_penyertaan'] : 0, 0, ',', '.') }}</h5>
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
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Alur Dana</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga Unit</th>
                                <th class="text-center">Jumlah Unit</th>
                                <th class="text-center">Action</th>
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
                                            <a href="" class="btn btn-sm btn-success btn-pill ms-auto">
                                                Masuk
                                            </a>
                                            @elseif ($item['alur_dana'] < 0)
                                            <a href="" class="btn btn-sm btn-danger btn-pill ms-auto">
                                                Keluar
                                            </a>
                                            @else
                                            <a href="" class="btn btn-sm btn-primary btn-pill ms-auto">
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

                                        <td style="width:1%" class="text-center">
                                            <span class="btn-group" role="group">
                                                <a href="" class="btn btn-sm btn-warning w-100 btn-icon"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                </a>
                                                <a href="" class="btn btn-sm btn-danger w-100 btn-icon"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </a>
                                            </span>
                                        </td>
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
                    <div class="col-6 text-end">
                        <h4>Total : Rp. {{ number_format($saldo, 0, ',', '.') }} </h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                    <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($saldoData))
                                @php
                                    $groupedSaldoData = collect($saldoData)->groupBy('tanggal'); // Mengelompokkan data berdasarkan tanggal
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
                                                @if ($data['tipe_saldo'] === 'masuk')
                                                    <a href="" class="btn btn-sm btn-success btn-pill ms-auto">Masuk</a>
                                                @elseif ($data['tipe_saldo'] === 'keluar')
                                                    <a href="" class="btn btn-sm btn-danger btn-pill ms-auto">Keluar</a>
                                                @else
                                                    <a href="" class="btn btn-sm btn-primary btn-pill ms-auto">Dividen</a>
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
                                            <td class="text-center" style="width:1%">
                                                <span class="btn-group" role="group">
                                                    <a href="" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                    <a href="" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </a>
                                                </span>
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
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label required">Jumlah </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" required>
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
@endsection