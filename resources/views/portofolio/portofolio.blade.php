@extends('layouts.user')

@section('title', 'Portofolio')

@section('page-title')
<div class="col">
    <h2 class="page-title">{{ __('portfolio.portfolio') }}</h2>
    <div class="text-muted mt-1">{{ __('portfolio.year') }} {{$selectedYear}}</div>
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
        {{-- <div data-bs-original-title="❌ Transaksi tidak dapat dilakukan karena periode telah ditutup." data-bs-placement="bottom" data-bs-toggle="tooltip"> --}}
            <a class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
			    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                {{-- <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg> --}}
                {{ __('portfolio.transaction') }}
            </a>
        {{-- </div> --}}
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
        <a href="" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
          	    {{ __('portfolio.manage') }}
      	</a>
        <a href="" class="btn btn-secondary d-sm-none btn-icon" data-bs-toggle="dropdown" aria-label="Create new report">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
		</a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal-tutup-buku" aria-label="Create new report">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" /><path d="M19 16h-12a2 2 0 0 0 -2 2" /><path d="M9 8h6" /></svg>
                    {{ __('portfolio.close_book') }}
            </a>	
            <a class="dropdown-item" href="" data-bs-toggle="modal" id="printModalToPdf">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                    {{ __('portfolio.print_pdf') }}
            </a>
        </div>
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
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('portfolio.unit_price') }} :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2" id="hargaUnit">{{ number_format($mutasiDataFilter['harga_unit_saat_ini'] ?? 0, 0, ',', '.' )}}</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">{{ __('portfolio.unit_amount') }} :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2" id="jumlahUnit">{{ number_format($mutasiDataFilter['jumlah_unit_penyertaan'] ?? 0, 0, ',', '.' )}}</h5>
                        </div>
                        <div class="col-4">
                            <a href="" class="bg-teal-lt" data-bs-toggle="modal" data-bs-target="#modal-yield">
                                <div data-bs-original-title="Klik untuk info" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                    <h5 class="mt-0 mb-0 pt-0 pb-2">Yield :</h5>   
                                    <h5 class="mt-0 mb-1 pt-0 pb-2" id="yield">{{ number_format(($sortedHistorisData['yield'] ?? 0), 2, ',', '.') }}%</h5>
                                </div>
                            </a>
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
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <div data-bs-original-title="Klik untuk edit" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                    <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG Start </h5>
                                    <h5 class="mt-0 mb-1 pt-0 pb-2" id="ihsgStart">{{ number_format($sortedHistorisData['ihsg_start'] ?? 0, 0, ',', '.' )}}</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <div data-bs-original-title="Klik untuk edit" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                    <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG End </h5>
                                    <h5 class="mt-0 mb-1 pt-0 pb-2" id="ihsgEnd">{{ number_format($sortedHistorisData['ihsg_end'] ?? 0, 0, ',', '.')}}</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield IHSG :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2" id="yieldIhsg">{{ number_format(($sortedHistorisData['yield_ihsg'] ?? 0) , 2, ',', '.') }}%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="input-icon mb-3">
                    <input type="text" id="searchInput1" class="form-control" placeholder="Cari data saham...">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter" id="dataTable1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center" colspan="2">{{ __('portfolio.stock') }}</th>
                                <th class="text-center">{{ __('portfolio.amount') }}<br>{{ __('portfolio.share') }}</th>
                                <th class="text-center">{{ __('portfolio.price') }}<br>{{ __('portfolio.buy') }}</th>
                                <th class="text-center">{{ __('portfolio.capital') }}</th>
                                <th class="text-center">{{ __('portfolio.price') }}<br>{{ __('portfolio.current') }}</th>
                                <th class="text-center">{{ __('portfolio.valuation') }}</th>
                                <th class="text-center">P/L</th>
                                <th class="text-center">P/L (%)</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="modalTableBody">
                            @if($sortedData->isNotEmpty())
                            @foreach($sortedData as $key => $index)
                            @if ($loop->first)
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center" colspan="2">{{ __('portfolio.cash') }}</td>
                                <td class="text-end " colspan="2">{{number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end ">{{number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end ">{{ number_format($index['modal'], 0, ',', '.')}}</td>
                                <td class="text-end ">{{ number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end ">-</td>
                                <td class="text-end ">0,00%</td>
                                <td style="width:1%" class="text-center">
                                    <a href="" class="text-muted" data-bs-toggle="modal" data-bs-target="#modal-info-{{$index['aset']['id']}}" >
                                        <div data-bs-original-title="Info" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                            <span class="">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                            </span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal Info Kas -->
                            <div class="modal modal-blur fade" id="modal-info-{{$index['aset']['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$index['aset']['nama']}} <span class="text-muted"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-status bg-primary"></div>
                                        <div class="modal-body">
                                            <h4 class="mb-2">{{ __('portfolio.cash_info') }} :</h4>
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">{{ __('portfolio.valuation') }} :</p>
                                                    <h4>{{number_format($index['valuasi'], 0, ',', '.')}}</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">{{ __('portfolio.fund_alloc') }} :</p>
                                                    <h4>{{number_format($index['fund_alloc'], 0, ',', '.')}}%</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-muted">{{ __('portfolio.value_effect') }} :</p>
                                                    <h4>{{number_format($index['value_effect'], 0, ',', '.')}}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Info Kas -->
                            @else
                            <tr class="@if($index['volume'] == 0) bg-muted-lt text-white @endif">
                                <td style="width:1%" class="text-center">{{$loop->iteration - 1}}</td>
                                <td style="width:1%"><span class="avatar avatar-xs" style="background-image: url({{$index['aset']['info']}}); --tblr-avatar-size:1.3rem;"></span></td>
                                <td style="width:6%">{{$index['aset']['nama']}}</td>
                                <td class="text-end">{{ number_format($index['volume'], 0, ',', '.')}}</td>
                                <td class="text-end">
                                    {{ number_format($index['transaksi_pertama']['harga'], 0, ',', '.')}}

                                </td>
                                
                                <td class="text-end">{{ number_format($index['modal'], 0, ',', '.')}}</td>
                                <td class="text-end">
                                    {{ number_format($index['cur_price'], 0, ',', '.')}}

                                    <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#modal-price-{{$index['aset']['id']}}">
                                        <span class="avatar avatar-xs" data-bs-original-title="Klik untuk update harga" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </span>
                                    </a>

                                </td>
                                <td class="text-end">{{ number_format($index['valuasi'] , 0, ',', '.')}}</td>
                                <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{ $index['p/l'] == 0 ? '-' : number_format($index['p/l'] , 0, ',', '.')}}</td>
                                <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l%'] > 0) text-success @endif">{{ number_format($index['p/l%'] , 2, ',', '.')}}%</td>
                                <td style="width:1%" class="text-center">
                                    <a href="" class="text-muted"  data-bs-toggle="modal" data-bs-target="#modal-info-{{$index['aset']['id']}}">
                                        <div data-bs-original-title="Info" data-bs-placement="bottom" data-bs-toggle="tooltip">
                                            <span class="">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                                            </span>
                                        </div>
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
                                                            <label class="form-label required">{{ __('portfolio.date') }}: </label>
                                                            @php
                                                                $tanggalTutup = \Carbon\Carbon::createFromDate($tahunBerikutnya, 1, 1)->format('Y-m-d');
                                                            @endphp
                                                            <input type="date" name="tanggal_harga" id="tanggal_harga" class="form-control" min="{{ $tanggalTutup }}"  value="{{ $tanggalTutup }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label required">{{ __('portfolio.price') }}: </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    Rp.
                                                                </span>
                                                                <input type="text" id="updateHarga-{{ $index['aset']['id'] }}" name="updateHarga" class="form-control text-end" autocomplete="off" placeholder="{{ number_format($index['cur_price'], 0, ',', '.')}}" value="{{ number_format($index['cur_price'], 0, ',', '.')}}" required>
                                                                <input type="text" id="updateHarga1-{{ $index['aset']['id'] }}" name="updateHarga1" class="form-control text-end" autocomplete="off" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                        <a href="{{ route('portofolio.update.harga.terkini', ['id_aset' => $index['aset']['id'], 'nama_aset' => $index['aset']['nama'], 'tipe' => 'price']) }}"  class="btn btn-secondary w-100">
                                                                {{ __('portfolio.use_current_price') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                                    {{ __('portfolio.save') }}
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
                                        <div class="card">
                                            <div class="card-header">
                                                <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                                    <li class="nav-item">
                                                        <a href="#floating-{{$index['aset']['id']}}" class="nav-link active" data-bs-toggle="tab">
                                                            {{ __('portfolio.floating') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#realisasi-{{$index['aset']['id']}}" class="nav-link" data-bs-toggle="tab">
                                                            {{ __('portfolio.realized') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#riwayat-{{$index['aset']['id']}}" class="nav-link" data-bs-toggle="tab">
                                                            {{ __('portfolio.history') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#harga-{{$index['aset']['id']}}" class="nav-link" data-bs-toggle="tab">
                                                            {{ __('portfolio.price') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="floating-{{$index['aset']['id']}}">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.amount') }} {{ __('portfolio.share') }} :</p>
                                                                <h4>{{number_format($index['volume'], 0, ',', '.')}}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.avg_price') }} :</p>
                                                                <h4>{{number_format($index['avg_price'], 0, ',', '.')}}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.cur_price') }} :</p>
                                                                <h4>{{number_format($index['cur_price'], 0, ',', '.')}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.capital') }} :</p>
                                                                <h4>{{number_format($index['modal'], 0, ',', '.')}}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">P/L :</p>
                                                                <h4 class="@if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{number_format($index['p/l'], 0, ',', '.')}}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.fund_alloc') }} :</p>
                                                                <h4>{{number_format($index['fund_alloc'], 0, ',', '.')}}%</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.valuation') }} :</p>
                                                                <h4>{{number_format($index['valuasi'], 0, ',', '.')}}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">P/L(%) :</p>
                                                                <h4 class="@if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{number_format($index['p/l%'], 2, ',', '.')}}%</h4>
                                                            </div>
                                                            
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.value_effect') }} :</p>
                                                                <h4>{{number_format($index['value_effect'], 0, ',', '.')}}%</h4>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="realisasi-{{$index['aset']['id']}}">
                                                        @php 
                                                            $dataExists = isset($filteredDataTranJual[$index['aset']['id']]) && $filteredDataTranJual[$index['aset']['id']]->isNotEmpty();
                                                    
                                                            $totalVolume = $dataExists ? $filteredDataTranJual[$index['aset']['id']]->sum('volume') : 0;
                                                            $totalModal = $dataExists ? $filteredDataTranJual[$index['aset']['id']]->sum('modal') : 0;
                                                            $totalHasilJual = $dataExists ? $filteredDataTranJual[$index['aset']['id']]->sum('hasil_jual') : 0;
                                                            $totalPL = $dataExists ? $filteredDataTranJual[$index['aset']['id']]->sum('p/l') : 0;
                                                            $totalPLPersen = ($totalModal > 0) ? ($totalPL / $totalModal) * 100 : 0;
                                                            $tanggalJualTerakhir = $dataExists ? $filteredDataTranJual[$index['aset']['id']]->max('tanggal') : '-';
                                                        @endphp
                                                    
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.total_sold_shares') }}:</p>
                                                                <h4>{{ number_format($totalVolume, 0, ',', '.') }}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.total_capital') }}:</p>
                                                                <h4>{{ number_format($totalModal, 0, ',', '.') }}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.total_sales') }}:</p>
                                                                <h4>{{ number_format($totalHasilJual, 0, ',', '.') }}</h4>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">{{ __('portfolio.last_sell_date') }}:</p>
                                                                <h4>{{ $tanggalJualTerakhir }}</h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">Total P/L:</p>
                                                                <h4 class="@if($totalPL < 0) text-danger @elseif($totalPL > 0) text-success @endif">
                                                                    {{ number_format($totalPL, 0, ',', '.') }}
                                                                </h4>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="mb-0 text-muted">Total P/L (%):</p>
                                                                <h4 class="@if($totalPLPersen < 0) text-danger @elseif($totalPL > 0) text-success @endif">
                                                                    {{ number_format($totalPLPersen, 2, ',', '.') }}%
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="tab-pane" id="riwayat-{{$index['aset']['id']}}">
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
                                                                                            <p class="mb-0">{{ __('portfolio.type') }} :</p>
                                                                                            <h4>{{strtoupper($k['jenis_transaksi'])}}</h4>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <p class="mb-0">{{ __('portfolio.date') }} :</p>
                                                                                            <h4>{{\Carbon\Carbon::parse($k['tanggal'])->format('d-m-Y')}}</h4>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <p class="mb-0">{{ __('portfolio.security') }} :</p>
                                                                                            <h4>{{$k['sekuritas']['nama_sekuritas'] ?? '-'}}</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <p class="mb-0">Volume :</p>
                                                                                            <h4 class="mb-0">{{number_format($k['volume'], 0, ',', '.')}}</h4>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <p class="mb-0">{{ __('portfolio.price') }} :</p>
                                                                                            <h4 class="mb-0">{{number_format($k['harga'], 0, ',', '.')}}</h4>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <p class="mb-0">Total :</p>
                                                                                            <h4 class="mb-0">{{number_format(($k['harga'] * $k['volume']), 0, ',', '.')}}</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @if($k === $key->last()) 
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <a href="" class="btn @if($k['jenis_transaksi'] == 'beli') btn-outline-success
                                                                                                @elseif($k['jenis_transaksi'] == 'jual') btn-outline-danger
                                                                                                @elseif($k['jenis_transaksi'] == 'dividen') btn-outline-primary
                                                                                                @else btn-outline-secondary
                                                                                                @endif w-100" data-bs-toggle="modal" data-bs-target="#modal-edit-riwayat-{{$k['id']}}" data-transaksi="{{ $k['id']}}" data-aset="{{ $index['aset']['id'] }}">
                                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                                                    {{ __('portfolio.last_edit') }}    
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <a href="" class="btn @if($k['jenis_transaksi'] == 'beli') btn-outline-success
                                                                                                @elseif($k['jenis_transaksi'] == 'jual') btn-outline-danger
                                                                                                @elseif($k['jenis_transaksi'] == 'dividen') btn-outline-primary
                                                                                                @else btn-outline-secondary
                                                                                                @endif w-100" data-bs-toggle="modal" data-bs-target="#modal-delete-riwayat-{{$k['id']}}" data-transaksi="{{ $k['id']}}" data-aset="{{ $index['aset']['id'] }}">
                                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                                                                    {{ __('portfolio.last_delete') }}    
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <a href="" class="btn @if($k['jenis_transaksi'] == 'beli') btn-outline-success
                                                                                                @elseif($k['jenis_transaksi'] == 'jual') btn-outline-danger
                                                                                                @elseif($k['jenis_transaksi'] == 'dividen') btn-outline-primary
                                                                                                @else btn-outline-secondary
                                                                                                @endif w-100" data-bs-toggle="modal" data-bs-target="#modal-edit-riwayat-{{$k['id']}}" data-transaksi="{{ $k['id']}}" data-aset="{{ $index['aset']['id'] }}">
                                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                                                    Edit    
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <a href="" class="btn @if($k['jenis_transaksi'] == 'beli') btn-outline-success
                                                                                                @elseif($k['jenis_transaksi'] == 'jual') btn-outline-danger
                                                                                                @elseif($k['jenis_transaksi'] == 'dividen') btn-outline-primary
                                                                                                @else btn-outline-secondary
                                                                                                @endif w-100" data-bs-toggle="modal" data-bs-target="#modal-delete-riwayat-{{$k['id']}}" data-transaksi="{{ $k['id']}}" data-aset="{{ $index['aset']['id'] }}">
                                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                                                                    {{ __('portfolio.delete') }}    
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>

                                                                            @push('modals')

                                                                            <!-- Modal Edit Riwayat -->
                                                                            <div class="modal modal-blur fade" id="modal-edit-riwayat-{{$k['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">{{ __('portfolio.edit_transaction') }} {{$k['aset']['nama']}}</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <form action="{{ route('portofolio.update', $k['id']) }}" method="post" autocomplete="off">
                                                                                            @csrf
                                                                                            <div class="modal-status bg-warning"></div>
                                                                                            <div class="modal-body">
                                                                                                <input type="text" id="aset_id" name="aset_id" class="form-control text-end" autocomplete="off" placeholder="0" value="{{$k['aset']['id']}}" hidden>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 mb-3">
                                                                                                        <span class="form-control text-strong bg-warning-lt text-warning border-warning" autocomplete="off">
                                                                                                            {{ __('portfolio.confirm_edit_transaction') }}
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-3">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.transaction_type') }}:</label>
                                                                                                            <select name="jenis_transaksi" id="jenis_transaksi" class="form-select" required>
                                                                                                                <option value="" disabled>{{ __('portfolio.select_type') }}</option>
                                                                                                                <option value="beli" @if ($k['jenis_transaksi'] == 'beli') selected @endif>{{ __('portfolio.buy') }}</option>
                                                                                                                <option value="jual" @if ($k['jenis_transaksi'] == 'jual') selected @endif>{{ __('portfolio.sell') }}</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-9">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.select_stock') }}:</label>
                                                                                                            <select name="id_saham_update" type="text" class="form-select" id="select-people" disabled required>
                                                                                                                <option value="" disabled>{{ __('portfolio.select_stock') }}</option>
                                                                                                                @foreach ($filteredAsetData as $saham)
                                                                                                                <option value="{{$saham['id']}}" @if($k['aset_id'] == $saham['id']) selected @endif data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $saham['info'] }})'></span>"> {{$saham['nama']}} - {{$saham['deskripsi']}}</option>
                                                                                                               @endforeach
                                                                                                               
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-3">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.amount') }} {{ __('portfolio.share') }}: </label>
                                                                                                            <div class="input-group">
                                                                                                                <input type="text" id="lembaredit-{{$k['id']}}" name="lembaredit" class="form-control text-end" autocomplete="off" placeholder="0" value="{{number_format($k['volume'], 0, ',', '.')}}" required >
                                                                                                                <input type="text" id="lembaredit1-{{$k['id']}}" name="lembaredit1" class="form-control text-end" autocomplete="off" value="{{$k['volume']}}" hidden>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-3">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.date') }}: </label>
                                                                                                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $k['tanggal'] }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.security') }}: </label>
                                                                                                            <select name="sekuritas" class="form-select" id="sekuritas" value="" required>
                                                                                                                <option value="" disabled>{{ __('portfolio.select_security') }}</option>
                                                                                                                @foreach ($sekuritasData as $data)
                                                                                                                <option value="{{$data['id']}}" @if($k['sekuritas_id'] == $data['id']) selected @endif> {{$data['nama_sekuritas']}} (Fee Beli: {{ $data['fee_beli'] * 100 }}%, Jual: {{ $data['fee_jual'] * 100 }}%)</option>
                                                                                                               @endforeach
                                                                                                               
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label required">{{ __('portfolio.price') }}: </label>
                                                                                                            <div class="row g-2">
                                                                                                                <div class="col">
                                                                                                                    <div class="input-group">
                                                                                                                        <span class="input-group-text">
                                                                                                                            Rp.
                                                                                                                        </span>
                                                                                                                        <input type="text" id="jumlahedit-{{$k['id']}}" name="jumlahedit" class="form-control text-end" autocomplete="off" required placeholder="" value="{{number_format($k['harga'], 0, ',', '.')}}">
                                                                                                                        <input type="text" id="jumlahedit1-{{$k['id']}}" name="jumlahedit1" class="form-control text-end" autocomplete="off" value="{{$k['harga']}}" hidden>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <label class="form-label">Total :</label>
                                                                                                        <div class="input-group">
                                                                                                            <span class="input-group-text">
                                                                                                                Rp.
                                                                                                            </span>
                                                                                                            <input type="text" id="totaledit-{{$k['id']}}" name="totaledit" class="form-control text-end" autocomplete="off" readonly>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('portfolio.cancel') }}</button>
                                                                                                <button type="submit" class="btn btn-warning ms-auto">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                                                                                    {{ __('portfolio.save') }}
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>	
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End of Modal Edit Riwayat -->

                                                                            <!-- Modal Delete Riwayat -->
                                                                            <div class="modal modal-blur fade" id="modal-delete-riwayat-{{$k['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        <div class="modal-status bg-danger"></div>
                                                                                        <div class="modal-body text-center py-4">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                                                                            <h3>{{ __('portfolio.confirm_delete_transaction') }}</h3>
                                                                                            <div class="">{{ __('portfolio.confirm_delete') }}</div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <div class="w-100">
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                                                                            {{ __('settings.cancel') }}
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                        <form method="post" action="{{route('portofolio.delete', $k['id'])}}">
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                                                                                {{ __('settings.delete') }}
                                                                                                            </button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End of Modal Delete Riwayat -->

                                                                            @endpush
                                                                            
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="tab-pane" id="harga-{{$index['aset']['id']}}">
                                                        <div class="row text-end">
                                                            <div class="d-flex align-items-baseline">
                                                                @php
                                                                    $previousHarga = null;
                                                                @endphp
                                                                @foreach($sortHargaData as $hargaData)
                                                                @foreach($hargaData as $harga)
                                                                @if($harga['aset']['id'] == $index['aset']['id'])
                                                                @php
                                                                    // Hitung perubahan harga dalam persen
                                                                    $persentasePerubahan = $previousHarga !== null 
                                                                        ? number_format((($harga['harga'] - $previousHarga) / $previousHarga) * 100, 2)
                                                                        : null; // Tidak ada perubahan untuk data pertama
                                                                    
                                                                    // Simpan harga saat ini untuk iterasi berikutnya
                                                                    $previousHarga = $harga['harga'];
                                                                @endphp
                                                                @if($loop->last)        
                                                                <div class="h1 me-2 ms-auto">{{number_format($previousHarga, 0, ',', '.')}}</div>
                                                                <span class="@if($persentasePerubahan > 0) text-green @else text-red @endif d-inline-flex align-items-center lh-1">
                                                                    @if($persentasePerubahan > 0)
                                                                    {{$persentasePerubahan}}%
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 17l6 -6l4 4l8 -8"></path><path d="M14 7l7 0l0 7"></path></svg>
                                                                    @elseif($persentasePerubahan < 0) 
                                                                    {{$persentasePerubahan}}%
                                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon ms-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 6l4 -4l8 8" /><path d="M21 10l0 7l-7 0" /></svg>
                                                                    @else
                                                                    {{$persentasePerubahan}}
                                                                    @endif
                                                                </span>
                                                                @endif
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div id="chart-harga-{{$index['aset']['id']}}" class="chart-lg mb-2 trigger-modal" style="height: 130px;"></div>
                                                        <hr>
                                                            <h4>{{ __('portfolio.price_history') }} :</h4>
                                                            <div class="divide-y">
                                                                @foreach($sortHargaData as $hargaData)
                                                                @foreach($hargaData as $harga)
                                                                @if($harga['aset']['id'] == $index['aset']['id'])
                                                                <div class="m-0">
                                                                    <div class="row">
                                                                        <div class="col-auto">{{$loop->index + 1}}.</div>
                                                                        <div class="col fw-bold">{{number_format($harga['harga'], 0, ',', '.')}}</div>
                                                                        <div class="col-auto text-muted align-self-center">{{ \Carbon\Carbon::parse($harga['created_at'])->locale(session('locale', config('app.locale')))->timezone('Asia/Makassar')->translatedFormat('d F Y / H:i') }}</div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col">
                                                    <a href="" type="submit" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modal-portofolio" data-jenis="beli" data-aset="{{ $index['aset']['id'] }}">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.586 3l-6.586 6.586a2 2 0 0 0 -.434 2.18l.068 .145a2 2 0 0 0 1.78 1.089h2.586v7a2 2 0 0 0 2 2h4l.15 -.005a2 2 0 0 0 1.85 -1.995l-.001 -7h2.587a2 2 0 0 0 1.414 -3.414l-6.586 -6.586a2 2 0 0 0 -2.828 0z" /></svg>
                                                            {{ __('portfolio.buy') }} {{$index['aset']['nama']}}
                                                    </a>
                                            </div>
                                            <div class="col">
                                                    <a href="" type="submit" class="btn btn-danger w-100 ms-auto" data-bs-toggle="modal" data-bs-target="#modal-portofolio" data-jenis="jual" data-aset="{{ $index['aset']['id'] }}">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 2l-.15 .005a2 2 0 0 0 -1.85 1.995v6.999l-2.586 .001a2 2 0 0 0 -1.414 3.414l6.586 6.586a2 2 0 0 0 2.828 0l6.586 -6.586a2 2 0 0 0 .434 -2.18l-.068 -.145a2 2 0 0 0 -1.78 -1.089l-2.586 -.001v-6.999a2 2 0 0 0 -2 -2h-4z" /></svg>
                                                            {{ __('portfolio.sell') }} {{$index['aset']['nama']}}
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal Info -->

                            

                           @endif
                           @endforeach
                           <tr class="fw-bold">
                                <td colspan="5" class="text-center">TOTAL</td>
                                <td class="text-end">{{ number_format($sortedData->sum('modal'), 0, ',', '.') }}</td>
                                <td class="text-end"></td>
                                <td class="text-end">{{ number_format($sortedData->sum('valuasi'), 0, ',', '.') }}</td>
                                <td class="text-end @if($sortedData->sum('p/l') < 0) text-danger @elseif($sortedData->sum('p/l') > 0) text-success @endif">{{ $sortedData->sum('p/l') == 0 ? '-' : number_format($sortedData->sum('p/l'), 0, ',', '.') }}</td>
                                <td class="text-end"></td>
                                <td></td>
                            </tr>
                           @else
                            <tr>
                                <td colspan="12" class="text-center">{{ __('portfolio.no_data_available') }}</td>
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
                <h5 class="modal-title">{{ __('portfolio.add_transaction') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portofolio.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-status bg-success"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.transaction_type') }}:</label>
                                <select name="jenis_transaksi" id="jenis_transaksi" class="form-select" required>
                                    <option value="" selected >{{ __('portfolio.select_type') }}</option>
                                    <option value="beli">{{ __('portfolio.buy') }}</option>
                                    <option value="jual">{{ __('portfolio.sell') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.select_stock') }}:</label>
                                <select name="id_saham" type="text" class="form-select" id="select-people" value="" required>
                                    <option value="" selected>{{ __('portfolio.select_stock') }}</option>
                                    @foreach ($filteredAsetData as $saham)
                                    <option value="{{$saham['id']}}" data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $saham['info'] }})'></span>"> {{$saham['nama']}} - {{$saham['deskripsi']}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.amount') }} {{ __('portfolio.share') }}: </label>
                                <div class="input-group">
                                    <input type="text" id="jumlahlembar" name="jumlahlembar" class="form-control text-end" autocomplete="off" placeholder="0" required >
                                    <input type="text" id="jumlahlembar1" name="jumlahlembar1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.security') }}: </label>
                                <select name="sekuritas" class="form-select" id="sekuritas" value="" required>
                                    <option value="" selected disabled>{{ __('portfolio.select_security') }}</option>
                                    @foreach ($sekuritasData as $data)
                                    <option value="{{$data['id']}}"> {{$data['nama_sekuritas']}} (Fee Beli: {{ $data['fee_beli'] * 100 }}%, Jual: {{ $data['fee_jual'] * 100 }}%)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.date') }}: </label>
                                @php
                                    $tanggalTutup = \Carbon\Carbon::createFromDate($tahunBerikutnya, 1, 1)->format('Y-m-d');
                                @endphp
                                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{ $tanggalTutup }}"  value="{{ $tanggalTutup }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.price') }}: </label>
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
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('portfolio.cancel') }}</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        {{ __('portfolio.save') }}
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
                <h5 class="modal-title">{{ __('portfolio.manage') }} IHSG {{ \Carbon\Carbon::create(null, $currentMonth, 1)->locale('id')->translatedFormat('F') }} {{$selectedYear}}</h5>
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
                                <label for="ihsgendlabel" class="form-label text-black">IHSG End {{ \Carbon\Carbon::create(null, $currentMonth, 1)->locale('id')->translatedFormat('F') }}                                    :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('portfolio.select_month') }}: </label>
                                <select name="bulan" id="bulan" class="form-select" required>
                                    <option value="" disabled selected>{{ __('portfolio.select_month') }}</option>
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
                                    {{ __('portfolio.cur_price') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('portfolio.cancel') }}</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        {{ __('portfolio.save') }}
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-yield" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info Yield</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-status bg-primary"></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 text-muted">{{ __('portfolio.total_realized_profit') }} :</p>
                        <h4>
                            @if($filteredDataTranJual->isNotEmpty())
                                {{ number_format(($filteredDataTranJual->flatten(1)->where('p/l', '>', 0)->sum('p/l')), 0, ',', '.') }}
                            @else
                                0,00
                            @endif
                        </h4>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 text-muted">{{ __('portfolio.realized_yield') }} :</p>
                        <h4>
                            @if($filteredDataTranJual->isNotEmpty())
                                {{ number_format(($filteredDataTranJual->flatten(1)->sum('p/l') / ($filteredDataTranJual->flatten(1)->sum('modal'))) * 100, 2, ',', '.') }}%
                            @else
                                0,00
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 text-muted">{{ __('portfolio.total_realized_loss') }} :</p>
                        <h4>
                            @if($filteredDataTranJual->isNotEmpty())
                                {{ number_format(($filteredDataTranJual->flatten(1)->where('p/l', '<', 0)->sum('p/l')), 0, ',', '.') }}
                            @else
                                0,00%
                            @endif
                        </h4>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 text-muted">Yield Floating  :</p>
                        <h4>
                            @if(isset($sortedHistorisData['yield']))
                                {{ number_format(($sortedHistorisData['yield']), 2, ',', '.') }}%
                            @else
                                0,00%
                            @endif
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 text-muted">{{ __('portfolio.net_realized') }} :</p>
                        <h4>
                            @if($filteredDataTranJual->isNotEmpty())
                                    {{ number_format(($filteredDataTranJual->flatten(1)->sum('p/l')), 0, ',', '.') }}
                            @else
                                0,00
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tutup Buku -->
<div class="modal modal-blur fade" id="modal-tutup-buku" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-status bg-danger"></div>
			<div class="modal-body text-center py-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
				<h3>{{ __('portfolio.confirm_close_book') }}</h3>
				<div class="">{{ __('portfolio.confirm_close_book_msg') }}</div>
			</div>
			<div class="modal-footer">
				<div class="w-100">
					<div class="row">
						<div class="col">
							<a href="" class="btn w-100" data-bs-dismiss="modal">
								{{ __('settings.cancel') }}
							</a>
						</div>
						<div class="col">
							<form method="post" action="{{route('portofolio.tutupbuku', $selectedYear)}}">
								@csrf
                                <input type="text" id="tahun" name="tahun" class="form-control text-end" autocomplete="off" value="{{$selectedYear}}" hidden>
								<button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
									{{ __('portfolio.sure') }}
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-vcenter" hidden>
    <thead>
        <tr>
            <th class="text-center">Saham</th>
            <th class="text-center">Jumlah Lembar</th>
            <th class="text-center">Harga Saat Ini</th>
            <th class="text-center">Modal</th>
            <th class="text-center">Valuasi</th>
            <th class="text-center">P/L</th>
            <th class="text-center">P/L(%)</th>
        </tr>
    </thead>
    <tbody id="tablePortofolio">
        @if($sortedData->isNotEmpty())
        @foreach($sortedData as $key => $index)
        @if ($loop->first)
        <tr>
            <td class="text-center">KAS</td>
            <td class="text-end ">{{number_format($index['cur_price'], 0, ',', '.')}}</td>
            <td class="text-end ">{{number_format($index['cur_price'], 0, ',', '.')}}</td>
            <td class="text-end ">{{ number_format($index['cur_price'], 0, ',', '.')}}</td>
            <td class="text-end ">{{ number_format($index['modal'], 0, ',', '.')}}</td>
            <td class="text-end ">-</td>
            <td class="text-end ">0,00%</td>
        </tr>
        @else
        <tr>
            <td style="width:6%">{{$index['aset']['nama']}}</td>
            <td class="text-end">{{ number_format($index['volume'], 0, ',', '.')}}</td>
            <td class="text-end">{{ number_format($index['cur_price'], 0, ',', '.')}}</td>
            <td class="text-end">{{ number_format($index['modal'], 0, ',', '.')}}</td>
            <td class="text-end">{{ number_format($index['valuasi'] , 0, ',', '.')}}</td>
            <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l'] > 0) text-success @endif">{{ $index['p/l'] == 0 ? '-' : number_format($index['p/l'] , 0, ',', '.')}}</td>
            <td class="text-end @if($index['p/l'] < 0) text-danger @elseif($index['p/l%'] > 0) text-success @endif">{{ number_format($index['p/l%'] , 2, ',', '.')}}%</td>
        </tr>
        @endif
        @endforeach
        <tr class="fw-bold">
            <td colspan="3" class="text-center">TOTAL</td>
            <td class="text-end">{{ number_format($sortedData->sum('modal'), 0, ',', '.') }}</td>
            <td class="text-end">{{ number_format($sortedData->sum('valuasi'), 0, ',', '.') }}</td>
            <td class="text-end @if($sortedData->sum('p/l') < 0) text-danger @elseif($sortedData->sum('p/l') > 0) text-success @endif">{{ $sortedData->sum('p/l') == 0 ? '-' : number_format($sortedData->sum('p/l'), 0, ',', '.') }}</td>
            <td class="text-end @if(($sortedData->sum('p/l') / $sortedData->sum('modal')) < 0) text-danger @elseif(($sortedData->sum('p/l') / $sortedData->sum('modal')) > 0) text-success @endif">{{ number_format(($sortedData->sum('p/l') / $sortedData->sum('modal')) * 100, 2, ',', '.') }}%</td>
        </tr>
        @else
        <tr>
            <td colspan="7" class="text-center">Tidak ada data yang tersedia.</td>
        </tr>
        @endif
    </tbody>
</table>

<script>
    const selectPeople = document.getElementById('select-people');
    const hargaTerkiniLink = document.getElementById('hargaTerkiniLink');

    selectPeople.addEventListener('change', function() {
        const selectedOption = selectPeople.selectedOptions[0];
        const selectedSahamId = selectedOption.value;
        const selectedSahamName = selectedOption.text;
        const kodeSaham = selectedSahamName.split(" - ")[0];

        if (selectedSahamId) {
            // Correctly replace placeholders with actual values
            const updatedHref = "{{ route('portofolio.update.harga.terkini') }}?id_aset=" + selectedSahamId + "&nama_aset=" + kodeSaham + "&tipe=portofolio";

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
        if (!num) return "";
        const parts = num.toString().split(",");
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        const decimalPart = parts.length > 1 ? "," + parts[1] : "";
        return integerPart + decimalPart;
    }
    
    function updateFormattedNumberPorto(elementId, inputId) {
        var inputElement = document.getElementById(elementId);
        if (!inputElement) return;
        
        var rawValue = inputElement.value.replace(/[^0-9,]/g, ''); // Hanya angka dan koma yang boleh
    
        // Jika ada lebih dari satu koma, hapus koma yang kelebihan
        let commaCount = (rawValue.match(/,/g) || []).length;
        if (commaCount > 1) {
            rawValue = rawValue.replace(/,(?=.*,)/g, '');
        }
    
        var formattedValue = formatNumberPorto(rawValue);
        inputElement.value = formattedValue;
        
        // Simpan versi unformatted di data-value
        var unformatted = rawValue.replace(/\./g, '').replace(',', '.');
        inputElement.setAttribute('data-value', unformatted);
    
        // Set ke input hidden
        var targetInput = document.getElementById(inputId);
        if (targetInput) {
            targetInput.value = unformatted;
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Input spesifik
        const fixedInputs = [
            { field: 'ihsgend', hidden: 'ihsgend1' },
            { field: 'jumlahlembar', hidden: 'jumlahlembar1' },
            { field: 'ihsgstart', hidden: 'ihsgstart1' },
            { field: 'jumlah', hidden: 'jumlah1' },
        ];
    
        fixedInputs.forEach(function(item) {
            const el = document.getElementById(item.field);
            if (el) {
                el.addEventListener('input', function() {
                    updateFormattedNumberPorto(item.field, item.hidden);
                });
            }
        });
    
        // Input dinamis
        const dynamicSelectors = [
            { selector: '[id^="jumlahedit-"]', prefix: 'jumlahedit1-' },
            { selector: '[id^="lembaredit-"]', prefix: 'lembaredit1-' },
            { selector: '[id^="updateHarga-"]', prefix: 'updateHarga1-' }
        ];
    
        dynamicSelectors.forEach(function(group) {
            var inputs = document.querySelectorAll(group.selector);
            inputs.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    var idSuffix = inputElement.id.split('-')[1];
                    var targetId = group.prefix + idSuffix;
                    updateFormattedNumberPorto(inputElement.id, targetId);
                });
            });
        });
    });
</script>
                     
<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>
  
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
            const jumlahLembar = parseFloat(jumlahLembarHidden.value.replace(',', '.')) || 0; // Ganti koma dengan titik
            const jumlah = parseFloat(jumlahHidden.value.replace(',', '.')) || 0; // Ganti koma dengan titik
            const total = jumlahLembar * jumlah;

            // Update nilai total
            // totalInput.value = total.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
             totalInput.value = total.toLocaleString('id-ID', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
        }

        // Tambahkan event listener untuk mendeteksi perubahan nilai
        jumlahLembarInput.addEventListener('input', function () {
            jumlahLembarHidden.value = jumlahLembarInput.value
                .replace(/\./g, '') // Hapus titik ribuan
                .replace(',', '.'); // Ganti koma menjadi titik untuk parsing angka
            calculateTotal();
        });

        jumlahInput.addEventListener('input', function () {
            jumlahHidden.value = jumlahInput.value
                .replace(/\./g, '') // Hapus titik ribuan
                .replace(',', '.'); // Ganti koma menjadi titik untuk parsing angka
            calculateTotal();
        });


        const editModals = document.querySelectorAll('[id^="modal-edit-riwayat-"]');

        editModals.forEach(function(modal) {
            modal.addEventListener('shown.bs.modal', function () {
                const modalId = modal.id.split('modal-edit-riwayat-')[1];

                const lembarEditInput = document.getElementById('lembaredit-' + modalId);
                const jumlaheditInput = document.getElementById('jumlahedit-' + modalId);
                const lembarEditHidden = document.getElementById('lembaredit1-' + modalId);
                const jumlaheditHidden = document.getElementById('jumlahedit1-' + modalId);
                const totalEditInput = document.getElementById('totaledit-' + modalId);

                function calculateTotalEdit() {
                    const jumlahLembar = parseFloat(lembarEditHidden.value) || 0;
                    const jumlah = parseFloat(jumlaheditHidden.value) || 0;
                    const total = jumlahLembar * jumlah;
                    totalEditInput.value = total.toLocaleString('id-ID');
                }

                // Format dan hitung langsung saat modal muncul
                lembarEditHidden.value = lembarEditInput.value.replace(/\./g, '');
                jumlaheditHidden.value = jumlaheditInput.value.replace(/\./g, '');
                calculateTotalEdit();

                // Event input
                lembarEditInput.addEventListener('input', function () {
                    lembarEditHidden.value = lembarEditInput.value.replace(/\./g, '');
                    calculateTotalEdit();
                });

                jumlaheditInput.addEventListener('input', function () {
                    jumlaheditHidden.value = jumlaheditInput.value.replace(/\./g, '');
                    calculateTotalEdit();
                });
            });
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
<script>
    var hargaData = {!! json_encode($sortHargaData) !!};
    // console.log(hargaData);
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modals = document.querySelectorAll('.modal');

        modals.forEach((modal) => {
            modal.addEventListener('shown.bs.modal', function (event) {
                // Cari elemen chart di dalam modal yang sedang terbuka
                const chartElement = modal.querySelector('.trigger-modal');

                if (chartElement) {
                    const asetId = chartElement.getAttribute('id').replace('chart-harga-', '');
                    console.log('Rendering chart for Aset ID:', asetId);

                    // Fungsi untuk menampilkan chart
                    renderChart(asetId, chartElement);
                }
            });
        });

        function renderChart(asetId, element) {
            // Cek apakah asetId ada di hargaData
            if (hargaData.hasOwnProperty(asetId)) {
                // Ambil data harga untuk aset tersebut
                var dataAset = hargaData[asetId];

                // Ambil tanggal dan harga dari setiap objek
                var dates = dataAset.map(item => item.created_at);
                var balances = dataAset.map(item => item.harga);

                console.log('Dates:', dates);
                console.log('Balances:', balances);

                // Render chart menggunakan ApexCharts
                if (window.ApexCharts) {
                    new ApexCharts(element, {
                        chart: {
                            type: 'line',
                            fontFamily: 'inherit',
                            height: 240,
                            parentHeightOffset: 0,
                            toolbar: {
                                show: false
                            },
                            animations: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            opacity: 1,
                            type: 'solid'
                        },
                        stroke: {
                            width: 2,
                            curve: 'straight',
                            lineCap: 'round'
                        },
                        series: [{
                            name: 'Harga',
                            data: balances
                        }],
                        tooltip: {
                            theme: 'dark',
                            y: {
                                    formatter: function(val) {
                                        return formatNumber(val);
                                    },
                                },
                        },
                        grid: {
                            padding: {
                                top: -20,
                                right: 0,
                                left: -4,
                                bottom: -4
                            },
                            strokeDashArray: 4,
                        },
                        xaxis: {
                            labels: {
                                padding: 0,
                            },
                            tooltip: {
                                enabled: false
                            },
                            axisBorder: {
                                show: false,
                            },
                            type: 'datetime',
                            categories: dates
                        },
                        yaxis: {
                            labels: {
                                padding: 4,
                                
                            },
                        },
                        labels: dates,
                        colors: [tabler.getColor("primary")],
                        legend: {
                            show: false,
                        },
                    }).render();
                }
            } else {
                console.error('Data untuk asetId', asetId, 'tidak ditemukan.');
            }
        }
    });

</script>
  
<script>
	document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('printModalToPdf').addEventListener('click', function () {

            const userName = @json($user['name']);
            const userEmail = @json($user['email']);
            const currentDate = @json($date); 
            const selectedYear = @json($selectedYear); 

            const hargaUnit = document.getElementById('hargaUnit').textContent.trim();
            const jumlahUnit = document.getElementById('jumlahUnit').textContent.trim();
            const yieldP = document.getElementById('yield').textContent.trim();
            const ihsgStart = document.getElementById('ihsgStart').textContent.trim();
            const ihsgEnd = document.getElementById('ihsgEnd').textContent.trim();
            const yieldIhsg = document.getElementById('yieldIhsg').textContent.trim();

            console.log('Harga Unit:', hargaUnit);
            console.log('Jumlah Unit:', jumlahUnit);
            console.log('Yield:', yieldP);          
            console.log('ihsgStart:', ihsgStart);          
            console.log('ihsgEnd:', ihsgEnd);          
            console.log('Yield Ihsg:', yieldIhsg);          
            
            const summaryData = [
                ': ' + hargaUnit,
                ': ' + jumlahUnit,
                ': ' + yieldP + '\n\n',
                ': ' + ihsgStart,
                ': ' + ihsgEnd,
                ': ' + yieldIhsg + '\n\n',
            ];
            
            const tableBodyPortofolio = document.getElementById('tablePortofolio');
            const tableRowsPortofolio = Array.from(tableBodyPortofolio.querySelectorAll('tr'));
            console.log('Table Rows Portofolio:', tableRowsPortofolio.length);
            
            const pdfTableBody = [
                [{ text: 'Saham', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Jumlah Lembar', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Harga Saat Ini', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Modal', style: 'tableHeader', alignment: 'center' }, 
                { text: 'Valuasi', style: 'tableHeader', alignment: 'center' }, 
                { text: 'P/L', style: 'tableHeader', alignment: 'center' }, 
                { text: 'P/L(%)', style: 'tableHeader', alignment: 'center' }]
            ];

            tableRowsPortofolio.forEach(row => {
                const cells = row.querySelectorAll('td');
                console.log('Cells:', cells.length);
                if (cells.length === 7) {
                    pdfTableBody.push([
                        {text: cells[0].textContent.trim(), alignment: 'left'},
                        {text: cells[1].textContent.trim(), alignment: 'right'},
                        {text: cells[2].textContent.trim(), alignment: 'right'},
                        {text: cells[3].textContent.trim(), alignment: 'right'},
                        {text: cells[4].textContent.trim(), alignment: 'right'},
                        {text: cells[5].textContent.trim(), alignment: 'right'},
                        {text: cells[6].textContent.trim(), alignment: 'right'},
                    ]);
                } else {
                    console.warn('Baris dilewati karena tidak sesuai format:', row);
                }
            });        
                     
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
                        text: [`\nPortofolio ${selectedYear}\n\n`],
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        columns: [
                            {
                                stack: [
                                    {
                                        ul: [
                                            'Harga Unit',
                                            'Jumlah Unit',
                                            'Yield\n\n',
                                            'IHSG Start',
                                            'IHSG End',
                                            'Yield IHSG\n',
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
                            widths: ['*', '*', '*', '*', '*', '*', '*'], 
                            body: pdfTableBody 
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
                pageOrientation: 'landscape',  

            };
            pdfMake.createPdf(docDefinition).open();
        });
	});
</script>

@endsection