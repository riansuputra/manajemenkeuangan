@extends('layouts.user')

@section('title', 'Portofolio')

@section('page-title')
<div class="col">
    <h2 class="page-title">Portofolio</h2>
    <div class="text-muted mt-1">Tahun {{$selectedYear}}</div>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('portofolio-filter') }}" method="POST">
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
        <a href="{{ route('portofolio-mutasi-dana') }}" class="btn btn-warning d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
          	Mutasi Dana
      	</a>
        <a href="{{ route('portofolio-mutasi-dana') }}" class="btn btn-warning d-sm-none btn-icon" aria-label="Create new report">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
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
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1.000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah/Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">15.000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Valuasi :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">15.000.000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Modal :</h5>   
                            <h5 class="mt-0 mb-1 pt-0 pb-2">15.000.000</h5>   
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <div class="card bg-primary-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield :</h5>   
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ $sortedHistorisData['yield'] ?? '0.00'}}%</h5>   
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield IHSG :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">{{ $sortedHistorisData['yield_ihsg'] ?? 0}}%</h5>
                        </div>
                       
                        <div class="col-3">
                            <a href="" title="click to edit" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG Start </h5>
                                <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($sortedHistorisData['ihsg_start'] ?? 0, 0, ',', '.' )}}</h5>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="" title="click to edit" data-bs-toggle="modal" data-bs-target="#modal-ihsg">
                                <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG End </h5>
                                <h5 class="mt-0 mb-1 pt-0 pb-2">{{ number_format($sortedHistorisData['ihsg_end'] ?? 0, 0, ',', '.')}}</h5>
                            </a>
                        </div>
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center" colspan="2">Emiten</th>
                                <th class="text-center">Jumlah<br>Lembar</th>
                                <th class="text-center" hidden>Avg.<br>Price</th>
                                <th class="text-center">Current<br>Price</th>
                                <th class="text-center" hidden>Cost<br>Modal</th>
                                <th class="text-center">Valuation</th>
                                <th class="text-center">P/L</th>
                                <th class="text-center">P/L (%)</th>
                                <th class="text-center" hidden>Fund<br>Alloc</th>
                                <th class="text-center" hidden>Value<br>Effect</th>
                                <th class="text-center">Action</th>
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
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end fw-bold">{{ number_format($index['kinerja_portofolio']['valuasi_saat_ini'], 0, ',', '.')}}</td>
                                <td class="text-end fw-bold">-</td>
                                <td class="text-end fw-bold">0.00%</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td style="width:1%" class="text-center">
                                    <span class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-secondary w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="History">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-success w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td style="width:1%" class="text-center">{{$loop->iteration - 1}}</td>
                                <td style="width:1%"><span class="avatar avatar-xs" style="background-image: url({{$index['aset']['info']}}); --tblr-avatar-size:1.3rem;"></span></td>
                                <td style="width:6%">{{$index['aset']['nama']}}</td>
                                <td class="text-end">{{ number_format($index['volume'], 0, ',', '.')}}</td>
                                <td class="text-end"hidden>{{ number_format($index['avg_price'], 0, ',', '.')}}</td>
                                <td class="text-end">{{ number_format($index['cur_price'], 0, ',', '.')}}</td>
                                <td class="text-end" hidden>{{ number_format($index['volume'] * $index['cur_price'] , 0, ',', '.')}}</td>
                                <td class="text-end">{{ number_format($index['kinerja_portofolio']['valuasi_saat_ini'], 0, ',', '.')}}</td>
                                <td class="text-end">-</td>
                                <td class="text-end">0.00%</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td style="width:1%" class="text-center">
                                    <span class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-secondary w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="History">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-success w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                           @endif
                           @endforeach
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
            <form action="{{ route('portofolioStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">Jenis Transaksi:</label>
                                <select name="jenis_transaksi" class="form-select" required>
                                    <option value="" selected disabled>Pilih Jenis</option>
                                    <option value="beli">Beli</option>
                                    <option value="jual">Jual</option>
                                    <option value="dividen">Dividen</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Pilih Saham:</label>
                                <select name="id_saham" type="text" class="form-select" id="select-people" value="" required>
                                    <option value="" selected>Pilih Saham</option>
                                    @foreach ($filteredAsetData as $saham)
                                    <option value="{{$saham['nama']}}" data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $saham['info'] }})'></span>"> {{$saham['nama']}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label required">Tanggal: </label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Jumlah Lembar: </label>
                                <div class="input-group">
                                    <input type="text" id="jumlahlembar" name="jumlahlembar" class="form-control text-end" autocomplete="off" placeholder="0" required >
                                    <input type="text" id="jumlahlembar1" name="jumlahlembar1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Harga: </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" required placeholder="0">
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
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

<div class="modal modal-blur fade" id="modal-ihsg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kelola IHSG {{ \Carbon\Carbon::create($currentMonth)->locale('id')->translatedFormat('F') }} {{$selectedYear}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('historisStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="ihsgstartlabel" name="ihsgstartlabel" value="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() ? number_format($filteredHistorisData->first()['ihsg_start'], 0, ',', '.') : '0'  }}" class="form-control text-strong text-warning border-warning mt-2" autocomplete="off" readonly>
                                <label for="ihsgstartlabel" class="form-label text-black">IHSG Start Sebelumnya :</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="ihsgendlabel" name="ihsgendlabel" value="{{ $filteredHistorisData && !$filteredHistorisData->isEmpty() ? number_format($filteredHistorisData->where('bulan', $currentMonth)->first()['ihsg_end'], 0, ',', '.') : '0' }}" class="form-control text-strong text-success border-success mt-2" autocomplete="off" readonly>
                                <label for="ihsgendlabel" class="form-label text-black">IHSG End {{ \Carbon\Carbon::create($currentMonth)->locale('id')->translatedFormat('F') }} :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
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
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">IHSG Start: </label>
                                <div class="input-group">
                                    <input type="text" id="ihsgstart" name="ihsgstart" class="form-control text-end" autocomplete="off" placeholder="0" required>
                                    <input type="text" id="ihsgstart1" name="ihsgstart1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">IHSG End: </label>
                                <div class="input-group">
                                    <input type="text" id="ihsgend" name="ihsgend" class="form-control text-end" autocomplete="off" placeholder="0" required>
                                    <input type="text" id="ihsgend1" name="ihsgend1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        SImpan
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>
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

    document.getElementById('ihsgstart').addEventListener('input', function() {
        updateFormattedNumberPorto('ihsgstart', 'ihsgstart1', 'ihsgstart');
    });

    document.getElementById('jumlahlembar').addEventListener('input', function() {
        updateFormattedNumberPorto('jumlahlembar', 'jumlahlembar1', 'jumlahlembar');
    });
</script>
                     
<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>
  
<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
    var el;
    var modal;
    window.TomSelect && (new TomSelect(el = document.getElementById('select-people'), {
        copyClassesToDropdown: false,
        dropdownParent: modal,
        controlInput: '<input>',
        render:{
            item: function(data,escape) {
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data,escape){
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
        },
    }));
});
// @formatter:on
</script>
  
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