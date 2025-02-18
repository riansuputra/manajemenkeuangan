@extends('layouts.user')

@section('title', 'Portofolio')

@section('page-title')
<div class="col">
    <h2 class="page-title">Portofolio</h2>
    <div class="text-muted mt-1">Tahun {{$selectedYear}}</div>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('portofolio.filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none input-group">
            <select class="form-select" name="jenisFilter" id="jenisFilter">
                @foreach($groupedData as $year => $data)
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
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Transaksi
      	</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
        <a href="" class="btn btn-primary d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
          	Cetak PDF
      	</a>
        <a href="" class="btn btn-primary d-sm-none btn-icon">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row justify-content-between">
        <div class="col-lg-6 text-center">
            <div class="card bg-teal-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($mutasiDataFilter['harga_unit_saat_ini'] ?? 0, 0, ',', '.' )}}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah/Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($mutasiDataFilter['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.' )}}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield :</h5>   
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format(($sortedHistorisData['yield'] ?? 0), 2, ',', '.') }}%
                            </h5>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <div class="card bg-primary-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-4">
                            <a href="" title="click to edit" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG Start </h5>
                                <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($sortedHistorisData['ihsg_start'] ?? 0, 0, ',', '.' )}}</h5>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="" title="click to edit" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG End </h5>
                                <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($sortedHistorisData['ihsg_end'] ?? 0, 0, ',', '.')}}</h5>
                            </a>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield IHSG :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format(($sortedHistorisData['yield_ihsg'] ?? 0) , 2, ',', '.') }}%
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" id="searchInput1" class="form-control" placeholder="Cari data saham...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter" id="dataTable1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center" colspan="2">Saham</th>
                                <th class="text-center">Jumlah<br>Lembar</th>
                                <th class="text-center">Current<br>Price</th>
                                <th class="text-center">Valuation</th>
                                <th class="text-center">P/L</th>
                                <th class="text-center">P/L (%)</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sortedData->isNotEmpty())
                            @foreach($sortedData as $key => $index)
                            @if ($loop->first)
                            <tr>
                                <td class="text-center"></td>
                                <td class="fw-bold text-center" colspan="2">KAS</td>
                                <td class="text-end fw-bold" colspan="2">{{number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end fw-bold">{{ number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end fw-bold">-</td>
                                <td class="text-end fw-bold">0,00%</td>
                                <td style="width:1%" class="text-center">
                                    <a href="" class=""  title="Info" data-bs-toggle="modal" data-bs-target="#modal-info-{{$index['aset']['id']}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal Info Kas -->
                            <div class="modal modal-blur fade" id="modal-info-{{$index['aset']['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$index['aset']['nama']}} <span class="text-muted"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-status bg-primary"></div>
                                        <div class="modal-body">
                                            <h4 class="mb-2">Informasi Kas :</h4>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Valuation :</p>
                                                    <h4>{{number_format($index['valuasi'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Fund Alloc :</p>
                                                    <h4>{{number_format($index['fund_alloc'], 0, ',', '.')}}%</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Value Effect :</p>
                                                    <h4>{{number_format($index['value_effect'], 0, ',', '.')}}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Riwayat Kas :</h4>
                                            @if($filteredData->isNotEmpty())
                                                @foreach($filteredData as $item => $key)
                                                    @if($item == $index['aset']['id'])
                                                        @if($key->isNotEmpty())
                                                            @foreach($key as $k)
                                                                @php
                                                                    $harga = $k['kinerja_portofolio']['transaksi']['harga'];
                                                                @endphp
                                                                <div class="card mb-3 
                                                                    @if($harga > 0) bg-teal-lt
                                                                    @elseif($harga < 0) bg-red-lt
                                                                    @else bg-primary-lt
                                                                    @endif">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Jenis :</p>
                                                                                <h4>{{$k['kinerja_portofolio']['transaksi']['deskripsi']}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Tanggal :</p>
                                                                                <h4>{{\Carbon\Carbon::parse($k['kinerja_portofolio']['transaksi']['tanggal'])->format('d-m-Y')}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Harga :</p>
                                                                                <h4 class="mb-0">{{number_format($k['kinerja_portofolio']['transaksi']['harga'], 0, ',', '.')}}</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Info Kas -->
                            @else
                            <tr class="@if($index['volume'] == 0) bg-muted text-white @endif">
                                <td style="width:1%" class="text-center">{{$loop->iteration - 1}}</td>
                                <td style="width:1%"><span class="avatar avatar-xs" style="background-image: url({{$index['aset']['info']}}); --tblr-avatar-size:1.3rem;"></span></td>
                                <td style="width:6%">{{$index['aset']['nama']}}</td>
                                <td class="text-end">{{ number_format($index['volume'], 0, ',', '.')}}</td>
                                <td class="text-end">
                                    {{ number_format($index['cur_price'], 0, ',', '.')}}

                                    <a href="" class="ms-2"  title="Update Harga" data-bs-toggle="modal" data-bs-target="#modal-price-{{$index['aset']['id']}}">
                                        <span class="avatar avatar-xs">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </span>
                                    </a>

                                </td>
                                <td class="text-end">{{ number_format($index['valuasi'] , 0, ',', '.')}}</td>
                                <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{ $index['p/l'] == 0 ? '-' : number_format($index['p/l'] , 0, ',', '.')}}</td>
                                <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l%'] > 0) text-success @endif">{{ number_format($index['p/l%'] , 2, ',', '.')}}%</td>
                                <td style="width:1%" class="text-center">
                                    <a href="" class=""  title="Info" data-bs-toggle="modal" data-bs-target="#modal-info-{{$index['aset']['id']}}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- Modal Update Price -->
                            <div class="modal modal-blur fade" id="modal-price-{{$index['aset']['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$index['aset']['nama']}} <span class="text-muted"> - Update Harga</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="update-harga-form-{{ $index['aset']['id'] }}" action="{{ route('portofolio.update.harga') }}" method="post" autocomplete="off">
                                            @csrf
                                            <div class="modal-status bg-warning"></div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_aset" value="{{ $index['aset']['id'] }}">
                                                <input type="hidden" name="nama_aset" value="{{ $index['aset']['nama'] }}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Harga: </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    Rp.
                                                                </span>
                                                                <input type="text" id="updateHarga-{{ $index['aset']['id'] }}" name="updateHarga" class="form-control text-end" autocomplete="off" placeholder="{{ number_format($index['cur_price'], 0, ',', '.')}}">
                                                                <input type="text" id="updateHarga1-{{ $index['aset']['id'] }}" name="updateHarga1" class="form-control text-end" autocomplete="off" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                        <a href="{{ route('portofolio.update.harga.terkini', ['id_aset' => $index['aset']['id'], 'nama_aset' => $index['aset']['nama'], 'tipe' => 'price']) }}"  class="btn btn-secondary w-100">
                                                                Gunakan Harga Terkini
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>	
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Update Price -->

                            <!-- Modal Info Aset -->
                            <div class="modal modal-blur fade" id="modal-info-{{$index['aset']['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$index['aset']['nama']}} <span class="text-muted">- {{$index['aset']['deskripsi']}}</span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-status bg-primary"></div>
                                        <div class="modal-body">
                                            <h4 class="mb-2">Informasi Aset :</h4>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Jml Lembar :</p>
                                                    <h4>{{number_format($index['volume'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Avg. Price :</p>
                                                    <h4>{{number_format($index['avg_price'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Cur. Price :</p>
                                                    <h4>{{number_format($index['cur_price'], 0, ',', '.')}}</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Modal :</p>
                                                    <h4>{{number_format($index['modal'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">P/L :</p>
                                                    <h4 class="@if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{number_format($index['p/l'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Fund Alloc :</p>
                                                    <h4>{{number_format($index['fund_alloc'], 0, ',', '.')}}%</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Valuation :</p>
                                                    <h4>{{number_format($index['valuasi'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">P/L(%) :</p>
                                                    <h4 class="@if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{number_format($index['p/l%'], 2, ',', '.')}}%</h4>
                                                </div>
                                                
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">Value Effect :</p>
                                                    <h4>{{number_format($index['value_effect'], 0, ',', '.')}}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Riwayat Transaksi :</h4>
                                            @if($filteredDataTran->isNotEmpty())
                                                @foreach($filteredDataTran as $item => $key)
                                                    @if($item == $index['aset']['id'])
                                                        @if($key->isNotEmpty())
                                                        @foreach($key as $k)
                                                                <div class="card mb-3 
                                                                    @if($k['jenis_transaksi'] == 'beli') bg-teal-lt
                                                                    @elseif($k['jenis_transaksi'] == 'jual') bg-red-lt
                                                                    @elseif($k['jenis_transaksi'] == 'dividen') bg-primary-lt
                                                                    @else bg-primary-lt
                                                                    @endif">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Jenis :</p>
                                                                                <h4>{{strtoupper($k['jenis_transaksi'])}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Tanggal :</p>
                                                                                <h4>{{\Carbon\Carbon::parse($k['tanggal'])->format('d-m-Y')}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Sekuritas :</p>
                                                                                <h4>{{$k['sekuritas']['nama_sekuritas'] ?? '-'}}</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Volume :</p>
                                                                                <h4 class="mb-0">{{number_format($k['volume'], 0, ',', '.')}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Harga :</p>
                                                                                <h4 class="mb-0">{{number_format($k['harga'], 0, ',', '.')}}</h4>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="mb-0">Total :</p>
                                                                                <h4 class="mb-0">{{number_format($k['harga'], 0, ',', '.')}}</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <a href="" type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-portofolio" data-jenis="beli" data-aset="{{ $index['aset']['id'] }}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.586 3l-6.586 6.586a2 2 0 0 0 -.434 2.18l.068 .145a2 2 0 0 0 1.78 1.089h2.586v7a2 2 0 0 0 2 2h4l.15 -.005a2 2 0 0 0 1.85 -1.995l-.001 -7h2.587a2 2 0 0 0 1.414 -3.414l-6.586 -6.586a2 2 0 0 0 -2.828 0z" /></svg>
                                                Beli
                                            </a>
                                            <a href="" type="submit" class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#modal-portofolio" data-jenis="jual" data-aset="{{ $index['aset']['id'] }}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 2l-.15 .005a2 2 0 0 0 -1.85 1.995v6.999l-2.586 .001a2 2 0 0 0 -1.414 3.414l6.586 6.586a2 2 0 0 0 2.828 0l6.586 -6.586a2 2 0 0 0 .434 -2.18l-.068 -.145a2 2 0 0 0 -1.78 -1.089l-2.586 -.001v-6.999a2 2 0 0 0 -2 -2h-4z" /></svg>
                                                Jual
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Info -->
                           @endif
                           @endforeach
                           <tr class="fw-bold">
                                <td colspan="5" class="text-center">TOTAL</td>
                                <td class="text-end">{{ number_format($sortedData->sum('valuasi'), 0, ',', '.') }}</td>
                                <td class="text-end @if($sortedData->sum('p/l') < 0) text-danger @elseif($sortedData->sum('p/l') > 0) text-success @endif">{{ $sortedData->sum('p/l') == 0 ? '-' : number_format($sortedData->sum('p/l'), 0, ',', '.') }}</td>
                                <td class="text-end @if(($sortedData->sum('p/l') / $sortedData->sum('modal')) < 0) text-danger @elseif(($sortedData->sum('p/l') / $sortedData->sum('modal')) > 0) text-success @endif">{{ number_format(($sortedData->sum('p/l') / $sortedData->sum('modal')) * 100, 2, ',', '.') }}%</td>
                                <td></td>
                            </tr>
                           @else
                            <tr>
                                <td colspan="12" class="text-center">Tidak ada data yang tersedia.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-portofolio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portofolio.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-status bg-success"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">Jenis Transaksi:</label>
                                <select name="jenis_transaksi" id="jenis_transaksi" class="form-select" required>
                                    <option value="" selected >Pilih Jenis</option>
                                    <option value="beli">Beli</option>
                                    <option value="jual">Jual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="mb-3">
                                <label class="form-label required">Pilih Saham:</label>
                                <select name="id_saham" type="text" class="form-select" id="select-people" value="" required>
                                    <option value="" selected>Pilih Saham</option>
                                    @foreach ($filteredAsetData as $saham)
                                    <option value="{{$saham['id']}}" data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $saham['info'] }})'></span>"> {{$saham['nama']}} - {{$saham['deskripsi']}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Lembar: </label>
                                <div class="input-group">
                                    <input type="text" id="jumlahlembar" name="jumlahlembar" class="form-control text-end" autocomplete="off" placeholder="0" required >
                                    <input type="text" id="jumlahlembar1" name="jumlahlembar1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Tanggal: </label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Sekuritas: </label>
                                <select name="sekuritas" class="form-select" id="sekuritas" value="" required>
                                    <option value="" selected>Pilih Sekuritas</option>
                                    @foreach ($sekuritasData as $data)
                                    <option value="{{$data['id']}}"> {{$data['nama_sekuritas']}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Harga: </label>
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                Rp.
                                            </span>
                                            <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" required placeholder="0">
                                            <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a id="hargaTerkiniLink" class="btn btn-icon btn-primary" aria-label="Button" title="Gunakan Harga Terkini">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.866 10.45a9 9 0 1 0 -7.815 10.488" /><path d="M12 7v5l1.5 1.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>    
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Total :</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="total" name="total" class="form-control text-end" autocomplete="off" readonly placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Simpan
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-ihsg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kelola IHSG {{ \Carbon\Carbon::create($currentMonth)->locale('id')->translatedFormat('F') }} {{$selectedYear}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('historis.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-status bg-success"></div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="ihsgstartlabel" name="ihsgstartlabel" value="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() ? number_format($filteredHistorisData->first()['ihsg_start'], 0, ',', '.') : '0'  }}" class="form-control text-strong text-warning border-warning mt-2" autocomplete="off" readonly>
                                <label for="ihsgstartlabel" class="form-label text-black">IHSG Start :</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="ihsgendlabel" name="ihsgendlabel" value="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() && !$filteredHistorisData->where('bulan', $currentMonth)->isEmpty() ? number_format($filteredHistorisData->where('bulan', $currentMonth)->first()['ihsg_end'], 0, ',', '.') : '0' }}" class="form-control text-strong text-success border-success mt-2" autocomplete="off" readonly>
                                <label for="ihsgendlabel" class="form-label text-black">IHSG End {{ \Carbon\Carbon::create($currentMonth)->locale('id')->translatedFormat('F') }} :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">Bulan: </label>
                                <select name="bulan" id="bulan" class="form-select" required>
                                    <option value="" disabled selected>Pilih Bulan</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}" {{ $month == $currentMonth ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::createFromFormat('!m', $month)->locale('id')->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="number" id="tahun" name="tahun" value="{{$selectedYear}}" hidden>
                        
                        
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">IHSG Start: </label>
                                <div class="input-group">
                                    <input type="text" id="ihsgstart" name="ihsgstart" class="form-control text-end" autocomplete="off"  placeholder="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() && !$filteredHistorisData->where('bulan', $currentMonth)->isEmpty() ? number_format($filteredHistorisData->where('bulan', $currentMonth)->first()['ihsg_start'], 0, ',', '.') : '0' }}" required>
                                    <input type="text" id="ihsgstart1" name="ihsgstart1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">IHSG End: </label>
                                <div class="input-group">
                                    <input type="text" id="ihsgend" name="ihsgend" class="form-control text-end" autocomplete="off" placeholder="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() && !$filteredHistorisData->where('bulan', $currentMonth)->isEmpty() ? number_format($filteredHistorisData->where('bulan', $currentMonth)->first()['ihsg_end'], 0, ',', '.') : '0' }}" required>
                                    <input type="text" id="ihsgend1" name="ihsgend1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">&nbsp </label>
                                <a href="{{ route('portofolio.update.harga.terkini', ['id_aset' => '0', 'nama_aset' => 'COMPOSITE', 'tipe' => 'ihsg']) }}"   class="btn btn-secondary w-100">
                                    Harga Terkini
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
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
    const selectPeople = document.getElementById('select-people');
    const hargaTerkiniLink = document.getElementById('hargaTerkiniLink');

    selectPeople.addEventListener('change', function() {
        const selectedOption = selectPeople.selectedOptions[0];
        const selectedSahamId = selectedOption.value;
        const selectedSahamName = selectedOption.text;

        if (selectedSahamId) {
            // Correctly replace placeholders with actual values
            const updatedHref = "{{ route('portofolio.update.harga.terkini') }}?id_aset=" + selectedSahamId + "&nama_aset=" + encodeURIComponent(selectedSahamName) + "&tipe=portofolio";

            // Tampilkan di console untuk debugging
            console.log("Selected ID Saham:", selectedSahamId);
            console.log("Selected Nama Saham:", selectedSahamName);
            console.log("Updated URL:", updatedHref);

            hargaTerkiniLink.href = updatedHref;
        } else {
            hargaTerkiniLink.href = "#";
        }
    });
</script>

<script>
    function formatNumberPorto(num) {
        const parts = num.toString().split(".");
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        const decimalPart = parts.length > 1 ? "," + parts[1] : "";
        return integerPart + decimalPart;
    }

    function updateFormattedNumberPorto(elementId, inputId, dataAttribute) {
        var inputElement = document.getElementById(elementId);
        var rawValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
        var formattedValue = formatNumberPorto(rawValue); // Format the number
        inputElement.value = formattedValue; // Update the input field with formatted value
        inputElement.setAttribute('data-value', rawValue); // Store unformatted value in a data attribute
        setUnformattedValueToInputPorto(inputId, dataAttribute); // Set the unformatted value to the input field
    }

    function setUnformattedValueToInputPorto(inputId, dataAttribute) {
        var unformattedValuePorto = getUnformattedValuePorto(dataAttribute); // Retrieve the unformatted value
        var inputElement = document.getElementById(inputId);
        inputElement.value = unformattedValuePorto; // Set the unformatted value to the input field
    }

    function getUnformattedValuePorto(dataAttribute) {
        var inputElement = document.getElementById(dataAttribute);
        return inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    }

    // Attach event listener to the input fields to trigger formatting as the user types
    document.getElementById('ihsgend').addEventListener('input', function() {
        updateFormattedNumberPorto('ihsgend', 'ihsgend1', 'ihsgend');
    });

    document.getElementById('jumlahlembar').addEventListener('input', function() {
        updateFormattedNumberPorto('jumlahlembar', 'jumlahlembar1', 'jumlahlembar');
    });

    document.getElementById('ihsgstart').addEventListener('input', function() {
        updateFormattedNumberPorto('ihsgstart', 'ihsgstart1', 'ihsgstart');
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Menambahkan event listener untuk setiap input yang sesuai
        // Menambahkan event listener input untuk setiap input harga dengan ID dinamis
        var hargaInputs = document.querySelectorAll('[id^="updateHarga-"]');  // Pilih semua elemen input yang ID-nya diawali dengan "updateHarga-"
        
        hargaInputs.forEach(function(inputElement) {
            inputElement.addEventListener('input', function() {
                var elementId = inputElement.id;
                var inputId = 'updateHarga1-' + inputElement.id.split('-')[1];  // Menyesuaikan ID dinamis untuk input lainnya
                var dataAttribute = elementId.split('-')[1];  // Ambil ID aset dari elemen ID
                updateFormattedNumberPorto(elementId, inputId, elementId);
            });
        });
    });

</script>
                     
<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
    });

</script>

  
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('open_modal'))
            var modalId = 'modal-price-{{ session('open_modal') }}';
            var modalElement = document.getElementById(modalId);

            if (modalElement) {
                console.log('Opening modal:', modalId);
                var modal = new bootstrap.Modal(modalElement);
                modal.show();

                // Perbarui input harga dengan data terbaru
                var hargaInput = modalElement.querySelector('#updateHarga-{{ session('open_modal') }}');
                var hargaInput1 = modalElement.querySelector('#updateHarga1-{{ session('open_modal') }}');
                var hargaTerkini = "{{ session('harga_terkini', 0) }}";

                if (hargaInput) {
                    var formattedHarga = "{{ number_format(session('harga_terkini', 0), 0, ',', '.') }}";
                    hargaInput.value = formattedHarga;
                    if (hargaInput1) {
                        hargaInput1.value = hargaTerkini;
                    }
                    hargaInput.addEventListener('input', function() {
                        updateFormattedNumberPorto(
                            'updateHarga-{{ session('open_modal') }}',
                            'updateHarga1-{{ session('open_modal') }}',
                            'updateHarga-{{ session('open_modal') }}'
                        );
                    });
                }
            } 
        @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('open_modal') === 'ihsg')
            var modalElement = document.getElementById('modal-ihsg');
            if (modalElement) {
                var modal = new bootstrap.Modal(modalElement);
                modal.show();

                // Masukkan nilai harga terkini ke input
                var hargaTerkini = "{{ session('harga_terkini', 0) }}";
                var inputIHSGEnd = modalElement.querySelector('#ihsgend');
                var inputIHSGEnd1 = modalElement.querySelector('#ihsgend1');

                if (inputIHSGEnd) {
                    var formattedHarga = "{{ number_format(session('harga_terkini', 0), 0, ',', '.') }}";
                    inputIHSGEnd.value = formattedHarga;
                }
                if (inputIHSGEnd1) {
                    inputIHSGEnd1.value = hargaTerkini;
                }
            }
        @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalPortofolio = document.getElementById('modal-portofolio');
        var tomSelectInstance = null;

        // Inisialisasi TomSelect
        window.TomSelect && (tomSelectInstance = new TomSelect('#select-people', {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                }
            }
        }));

        // Saat modal akan ditampilkan
        modalPortofolio.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang memicu modal
            var jenis = button.getAttribute('data-jenis');
            var aset = button.getAttribute('data-aset');

            // Atur jenis transaksi
            var jenisInput = modalPortofolio.querySelector('#jenis_transaksi');
            if (jenisInput) {
                jenisInput.value = jenis || '';
            }

            // Atur aset menggunakan TomSelect API
            if (tomSelectInstance) {
                if (aset) {
                    tomSelectInstance.setValue(aset); // Pilih aset jika ada
                } else {
                    tomSelectInstance.clear(); // Reset ke placeholder
                }
            }
        });

        @if(session('open_modal') === 'portofolio')
            var modalElement = document.getElementById('modal-portofolio');
            if (modalElement) {
                var modal = new bootstrap.Modal(modalElement);
                modal.show();

                // Masukkan nilai harga terkini ke input
                var hargaTerkini = "{{ session('harga_terkini', 0) }}";
                var inputHarga = modalElement.querySelector('#jumlah');
                var inputHarga1 = modalElement.querySelector('#jumlah1');
                var idAset = "{{ session('id_aset', '') }}";
                console.log(tomSelectInstance);
                if (inputHarga) {
                    var formattedHarga = "{{ number_format(session('harga_terkini', 0), 0, ',', '.') }}";
                    inputHarga.value = formattedHarga;
                }
                if (inputHarga1) {
                    inputHarga1.value = hargaTerkini;
                }
                
                if (tomSelectInstance) {
                    if (idAset) {
                        tomSelectInstance.setValue(idAset); // Pilih aset jika ada
                    } else {
                        tomSelectInstance.clear(); // Reset ke placeholder
                    }
                }
            }
        @endif

        const jumlahLembarInput = document.getElementById('jumlahlembar'); // Input dengan format ribuan
        const jumlahInput = document.getElementById('jumlah'); // Input dengan format ribuan
        const jumlahLembarHidden = document.getElementById('jumlahlembar1'); // Nilai tanpa format
        const jumlahHidden = document.getElementById('jumlah1'); // Nilai tanpa format
        const totalInput = document.getElementById('total'); // Input total yang akan diisi

        // Fungsi untuk menghitung total
        function calculateTotal() {
            const jumlahLembar = parseFloat(jumlahLembarHidden.value) || 0; // Ambil nilai dari input hidden
            const jumlah = parseFloat(jumlahHidden.value) || 0; // Ambil nilai dari input hidden
            const total = jumlahLembar * jumlah;

            // Update nilai total
            totalInput.value = total.toLocaleString('id-ID'); // Format total ke ribuan
        }

        // Tambahkan event listener untuk mendeteksi perubahan nilai
        jumlahLembarInput.addEventListener('input', function () {
            jumlahLembarHidden.value = jumlahLembarInput.value.replace(/\./g, ''); // Sinkronisasi nilai ke hidden input
            calculateTotal();
        });

        jumlahInput.addEventListener('input', function () {
            jumlahHidden.value = jumlahInput.value.replace(/\./g, ''); // Sinkronisasi nilai ke hidden input
            calculateTotal();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const editButtons = document.querySelectorAll('.btn-kategori');
        const pageTitle = document.getElementById("page-title");

        // Hide spinner and show page content when fully loaded
        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const id_kategori_pengeluaran = this.getAttribute('data-id-kategori-pengeluaran');
                const nama = this.getAttribute('data-nama');
                const anggaran = this.getAttribute('data-anggaran');
                const periode = this.getAttribute('data-periode');
                const tersisa = this.getAttribute('data-tersisa');
                const jumlah = this.getAttribute('data-jumlah');
                const overspend = this.getAttribute('data-overspend');

                console.log(nama);
                
                document.getElementById('id_' + id).value = id;
                document.getElementById('id_kategori_pengeluaran_edit_' + id).value = id_kategori_pengeluaran;
                document.getElementById('jumlah1_edit_' + id).value = anggaran;
                document.getElementById('jumlah_edit_' + id).value = formatNumber(anggaran);
                document.getElementById('jumlah_anggaran_' + id).value = 'Rp. ' + formatNumber(jumlah);
                document.getElementById('jumlah_tersisa_' + id).value = 'Rp. ' + formatNumber(tersisa);
                document.getElementById('jumlah_overspend_' + id).value = 'Rp. ' + formatNumber(overspend);
                document.getElementById('periodeedit_' + id).value = periode;
                document.getElementById('modaledittitle_' + id).textContent = ' "' + nama + '" ';
            });
        });
    });
</script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		function searchTable(tableId, inputId) {
			let input = document.getElementById(inputId).value.toLowerCase();  // Get the input value
			let rows = document.querySelectorAll(`#${tableId} tbody tr`);  // Get all rows from the table
			let noDataRow = document.querySelector(`#${tableId} .no-data-row`);  // Get the "no data" row
			let hasVisibleRow = false;

			rows.forEach((row) => {
				let text = row.innerText.toLowerCase();  // Get text content of the row
				let isVisible = text.includes(input);  // Check if the row should be visible

				row.style.display = isVisible ? "" : "none";  // Show or hide the row based on the search

				if (isVisible) {
					hasVisibleRow = true;  // If a visible row is found, set hasVisibleRow to true
				}
			});

			// If no visible rows are found, show the "no data found" row, otherwise hide it
			if (noDataRow) {
				if (!hasVisibleRow && input.trim() !== "") {
					// If there are no matching rows and search input is not empty
					noDataRow.style.display = "";
				} else {
					// Otherwise hide the "no data found" row
					noDataRow.style.display = "none";
				}
			}
		}

		// Event listeners for each search input
		document.getElementById("searchInput1").addEventListener("input", function() {
			searchTable("dataTable1", "searchInput1");
		});
	});
</script>
@endsection