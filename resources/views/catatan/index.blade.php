@extends('layouts.tabler')

@section('title', 'Catatan')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Catatan
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Tambah Catatan
      	</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>   
		<a href="#" class="btn btn-primary d-none d-sm-inline-block">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Category Request
      	</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" >
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>       
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row g-4">
		<div class="col-md-3">

		<div class="input-icon mb-4">
			<input type="text" value="" class="form-control" id="searchRecord" name="searchRecord" placeholder="Search…">
			<span class="input-icon-addon">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
			</span>
			</div>

		<div class="form-label mt-1 mb-2">Record Types</div>
			<div class="mb-4">
				<label class="form-check">
					<input type="radio" class="form-check-input" name="record-type" value="1" checked>
					<span class="form-check-label">All Record Types</span>
				</label>
				<label class="form-check">
					<input type="radio" class="form-check-input" name="record-type" value="2">
					<span class="form-check-label">Income</span>
				</label>
				<div class="ms-4">
					<div class="mb-2">
						<select class="form-select category-select income-category" disabled>
							<option value="" class="text-muted">Select Category</option>
							@foreach($kategoriPemasukanData as $incomeCategory)
							<option value="{{$incomeCategory['nama_kategori_pemasukan']}}income">{{$incomeCategory['nama_kategori_pemasukan']}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<label class="form-check">
					<input type="radio" class="form-check-input" name="record-type" value="3">
					<span class="form-check-label">Expense</span>
				</label>
				<div class="ms-4">
					<div class="">
						<select class="form-select category-select expense-category" disabled>
							<option value="" class="text-muted">Select Category</option>
							@foreach($kategoriPengeluaranData as $expenseCategory)
							<option value="{{$expenseCategory['nama_kategori_pengeluaran']}}expense">{{$expenseCategory['nama_kategori_pengeluaran']}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		<div class="form-label mt-1 mb-2">
		<a href="#" class="w-100 btn-resetfilter">
                      Reset to defaults
                    </a>
		</div>

			
			
		

			
			


				<hr>

				<div class="form-label">Date Filter</div>
			


			<div class="col-auto d-print-none" >
				<form class="row"id="filterForm" action="{{ route('catatan-filter') }}" method="POST">
					@csrf
					<div class="col-auto d-print-none input-group">
						<select class="form-select" name="jenisFilter" id="jenisFilter">
							<option value="Kisaran" {{ $jenisFilter == 'Kisaran' ? 'selected' : '' }}>Range</option>
							<option value="Mingguan" {{ $jenisFilter == 'Mingguan' ? 'selected' : '' }}>Weeks</option>
							<option value="Bulanan" {{ $jenisFilter == 'Bulanan' ? 'selected' : '' }}>Months</option>
							<option value="Tahunan" {{ $jenisFilter == 'Tahunan' ? 'selected' : '' }}>Years</option>
							<option value="Custom" {{ $jenisFilter == 'Custom' ? 'selected' : '' }}>Custom Range</option>
						</select>
						<div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter"></div>
					</div>
					<div class="mt-4 mb-2 input-group">
						<div class="form-label mt-2 me-1">Start Date &nbsp:</div>
						<input type="date" class="ms-2 form-control" name="startdate-filter" id="startdate-filter" disabled>
					</div>
					<div class="mt-2 input-group">
						<div class="form-label mt-2 me-1">End Date &nbsp&nbsp&nbsp:</div>
						<input type="date" class="ms-2 form-control" name="enddate-filter" id="enddate-filter" disabled>
					</div>
					<div class="col-auto d-print-none mt-5 w-100" name="btnFilter" id="btnFilter">
						<button type="submit" class="btn btn-primary w-100">
							<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" /><path d="M15 19l2 2l4 -4" /></svg>
							Confirm changes
						</button>
					</div>
				</form>
			</div>

			
			
			
		</div>

		<div class="col-md-9">
			<div class="row row-cards">
				<div class="space-y">
					<div class="col-lg-12">
						<div class="row row-cards">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex align-items-center mb-1">
											<div class="subheader">Current Wallet Balance</div>
										</div>
										<div id ="current-balance" class="h3 text-strong">Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex align-items-center mb-1">
											<div class="subheader">Total Period Income</div>
										</div>
										<div id="total-income" class="h3 text-green">+ Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex align-items-center mb-1">
											<div class="subheader">Total Period Expenses</div>
										</div>
										<div id="total-expenses" class="h3 text-red">- Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="card-body card-body-scrollable card-body-scrollable-shadow" style="height:35rem;">
						<div class="table-responsive">
                    		<table id="table-harian" class="table card-table table-vcenter text-nowrap table-borderless datatable" style="display: none;">
                      			<thead>
                        			<tr>
                          				<th class="text-center" style="width:5%"></th>
                        			</tr>
                      			</thead>
                      			<tbody>
									@foreach($summedData as $tanggal => $group)
								  		@php $first = true; @endphp
										@foreach($group as $item)
											@if($first)
												<tr>
													<td class="p-2">
														<span class="item-data" data-date="{{ \Carbon\Carbon::parse($item['tanggal'])->format('d F Y') }}" data-amount="{{ $item['total_jumlah'] }}" hidden>
														@foreach($group as $headerItem)
                            {{ \Carbon\Carbon::parse($headerItem['tanggal'])->translatedFormat('d F Y') }}
                            {{$headerItem['jumlah']}}
                            {{$headerItem['catatan']}}
                            {{$headerItem['total_jumlah']}} 
                            {{$headerItem['tanggal']}} 
                            @if(isset($headerItem['id_pemasukan']))
                                {{$headerItem['kategori_pemasukan']['nama_kategori_pemasukan']}}income income incomes pemasukan
                            @else
                                {{$headerItem['kategori_pengeluaran']['nama_kategori_pengeluaran']}}expense
                                {{$headerItem['id_kategori_pengeluaran']}} expense expenses pengeluaran
                            @endif
							@if ($item['total_jumlah'] < 0)
																	<strong class="amount">- Rp. {{ number_format(abs(floatval($item['total_jumlah'])), 0, ',', '.') }}</strong>
																@else
																	<strong class="amount">+ Rp. {{ number_format(floatval($item['total_jumlah']), 0, ',', '.') }}</strong>
																@endif
                        @endforeach
														</span>
														<div class="row  mt-2">
															<div class="col">
																<strong>{{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}</strong>
															</div>
															<div class="col-auto me-2">
															<strong class="header-total"></strong>
															</div>
														</div>
													</td>
												</tr>
												@php $first = false; @endphp
											@endif
											<tr>
												
												<td class="p-0">
													
													<div class="card mb-0">
														<div class="row g-0">
															<div class="col">
																<div class="card-body">
																	@if(isset($item['id_pemasukan']))
																	<span class="item-data" data-date="{{ \Carbon\Carbon::parse($item['tanggal'])->format('d F Y') }}" data-amount="{{ $item['jumlah'] }}" data-id-pemasukan="{{ $item['id_pemasukan'] }}" hidden>
													{{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}
													{{$item['jumlah']}}
													{{$item['catatan']}}
													{{$item['tanggal']}}
													{{$item['total_jumlah']}} 
													{{$item['id_kategori_pemasukan']}}
													{{$item['kategori_pemasukan']['nama_kategori_pemasukan']}}income income incomes pemasukan
													
													</span>
																		<div class="row">
																			<div class="col-md">
																				<div class="list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
																					<div class="list-inline-item">
																						<svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#00ff00"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
																							{{$item['kategori_pemasukan']['nama_kategori_pemasukan']}}
																					</div>
																					@if(isset($item['catatan']))
																						<div class="list-inline-item">
																							{{ \Illuminate\Support\Str::limit($item['catatan'], 50, '...') }}
																						</div>
																					@else
																						<div class="list-inline-item">
																							-
																						</div>
																					@endif
																				</div>
																			</div>	
																			<div class="col-md-auto">
																				<div class="badges">
																					<a href="#" class="text-green fw-bold">+ Rp. {{ number_format(floatval($item['jumlah']), 0, ',', '.') }}</a>
																				</div>
																			</div>
																			<div class="col-md-auto">
																				<div class="badges">
																					<a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
																						<span class="nav-link-icon d-md-none d-lg-inline-block">
																							<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
																						</span>
																					</a>
																					<div class="dropdown-menu">
																						<a class="dropdown-item edit-btn" href="https://tabler.io/docs" 
																							data-bs-toggle="modal" 
																							data-bs-target="#modal-edit{{$item['id_pemasukan']}}"
																							data-id="{{$item['id_pemasukan']}}" 
																							data-jenis="1" data-jumlah="{{$item['jumlah']}}" 
																							data-kategori="{{$item['kategori_pemasukan']['id_kategori_pemasukan']}}" 
																							data-tanggal="{{$item['tanggal']}}" 
																							data-createdat="{{$item['created_at']}}" 
																							data-catatan="{{$item['catatan']}}">
																							Edit
																						</a>
																						<a class="dropdown-item delete-btn" href="./changelog.html"
																							data-bs-toggle="modal"
																							data-bs-target="#modal-danger{{$item['id_pemasukan']}}" 
																							data-id="{{$item['id_pemasukan']}}" 
																							data-jenis="1">
																							Delete
																						</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	@else
																	<span class="item-data" data-date="{{ \Carbon\Carbon::parse($item['tanggal'])->format('d F Y') }}" data-amount="{{ -abs($item['jumlah']) }}" hidden>
													{{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}
													{{$item['jumlah']}}
													{{$item['catatan']}}
													{{$item['total_jumlah']}} 
													{{$item['tanggal']}} 
													
													{{$item['kategori_pengeluaran']['nama_kategori_pengeluaran']}}expense
													{{$item['id_kategori_pengeluaran']}} expense expenses pengeluaran
													
													</span>
																		<div class="row">
																			<div class="col-md">
																				<div class="list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
																					<div class="list-inline-item">
																						<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#ff0000"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M13 17h-7v-14h-2" /><path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
																							{{$item['kategori_pengeluaran']['nama_kategori_pengeluaran']}}
																					</div>
																					@if(isset($item['catatan']))
																						<div class="list-inline-item">
																							{{ \Illuminate\Support\Str::limit($item['catatan'], 50, '...') }}
																						</div>
																					@else
																						<div class="list-inline-item">
																							-
																						</div>
																					@endif
																				</div>
																			</div>	
																			<div class="col-md-auto">
																				<div class="badges">
																					<a href="#" class="text-red fw-bold">- Rp. {{ number_format(abs(floatval($item['jumlah'])), 0, ',', '.') }}</a>
																				</div>
																			</div>
																			<div class="col-md-auto">
																				<div class="badges">
																					<a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
																						<span class="nav-link-icon d-md-none d-lg-inline-block">
																							<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>

																						</span>
																					</a>
																					<div class="dropdown-menu">
																						<a class="dropdown-item edit-btn" href="https://tabler.io/docs" 
																							data-bs-toggle="modal" 
																							data-bs-target="#modal-edit{{$item['id_pengeluaran']}}"
																							data-id="{{$item['id_pengeluaran']}}" 
																							data-jenis="2" data-jumlah="{{$item['jumlah']}}" 
																							data-kategori="{{$item['kategori_pengeluaran']['id_kategori_pengeluaran']}}" 
																							data-tanggal="{{$item['tanggal']}}" 
																							data-createdat="{{$item['created_at']}}" 
																							data-catatan="{{$item['catatan']}}">
																							Edit
																						</a>
																						<a class="dropdown-item delete-btn" href="./changelog.html"
																							data-bs-toggle="modal"
																							data-bs-target="#modal-danger{{$item['id_pengeluaran']}}" 
																							data-id="{{$item['id_pengeluaran']}}" 
																							data-jenis="2">
																							Delete
																						</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	@endif
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											@if (isset($item['id_pemasukan']))
												<div class="modal modal-blur fade" id="modal-edit{{$item['id_pemasukan']}}" tabindex="-1" role="dialog" aria-hidden="true">
											@else
												<div class="modal modal-blur fade" id="modal-edit{{$item['id_pengeluaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
											@endif
												<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Edit Catatan</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														@if (isset($item['id_pemasukan']))
															<form action="{{route('updateCatatan', ['id'=> $item['id_pemasukan']])}}" method="post" autocomplete="off">
																@csrf
																<input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
																<input type="text" name="jenisedit" id="jenisedit"class="form-control text-end jenisedit" autocomplete="off" hidden>
																<input type="text" name="created_at" id="created_at{{$item['id_pemasukan']}}" class="form-control text-end created_at" autocomplete="off" hidden>

														@else
															<form action="{{route('updateCatatan', ['id'=> $item['id_pengeluaran']])}}" method="post" autocomplete="off">
																@csrf
																<input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
																<input type="text" name="jenisedit" id="jenisedit"class="form-control text-end jenisedit" autocomplete="off" hidden>
																<input type="text" name="created_at" id="created_at{{$item['id_pengeluaran']}}" class="form-control text-end created_at" autocomplete="off" hidden>
														@endif
															<div class="modal-body">
																<label class="form-label">Pilih Jenis :</label>
																<div class="form-selectgroup-boxes row mb-3">
																	<div class="col-lg-6">
																		<label class="form-selectgroup-item">
																			<input type="radio" class="form-selectgroup-input pemasukan-radio" name="jenisedit2{{$item['id_pemasukan'] ?? $item['id_pengeluaran']}}" value="1">
																			<span class="form-selectgroup-label d-flex align-items-center p-2">
																				<span class="me-3">
																					<span class="form-selectgroup-check"></span>
																				</span>
																				<span class="form-selectgroup-label-content">
																					<div class="card-status-top bg-green"></div>
																					<span class="form-selectgroup-title mb-1">Pemasukan</span>
																				</span>
																			</span>
																		</label>
																	</div>
																	<div class="col-lg-6">
																		<label class="form-selectgroup-item">
																			<input type="radio" class="form-selectgroup-input pengeluaran-radio" name="jenisedit2{{$item['id_pemasukan'] ?? $item['id_pengeluaran']}}" value="2">
																			<span class="form-selectgroup-label d-flex align-items-center p-2">
																				<span class="me-3">
																					<span class="form-selectgroup-check"></span>
																				</span>
																				<span class="form-selectgroup-label-content">
																					<div class="card-status-top bg-red"></div>
																					<span class="form-selectgroup-title mb-1">Pengeluaran</span>
																				</span>
																			</span>
																		</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-4">
																		<div class="mb-3">
																			<label class="form-label">Jumlah : </label>
																			<div class="input-group">
																				<span class="input-group-text">
																					Rp.
																				</span>
																				<input type="text" id="jumlahedit" name="jumlahedit"class="form-control text-end jumlahedit" autocomplete="off">
																				<input type="text" id="jumlah1edit" name="jumlah1edit"class="form-control text-end jumlah1edit" autocomplete="off" hidden>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="mb-3">
																			<label class="form-label">Kategori :</label>
																			<select name="kategoriedit" id="kategoriedit"class="form-select kategoriedit">
																				<option value="" disabled selected>Pilih Kategori</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="mb-3">
																			<label class="form-label">Tanggal :</label>
																			<input type="date" name="tanggaledit" id="tanggaledit" class="form-control tanggaledit" value="{{ now()->format('Y-m-d') }}">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="mb-2">
																			<label class="form-label">Catatan :</label>
																			<textarea name="catatanedit" id="catatanedit" class="form-control catatanedit" rows="3"></textarea>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
																	Batal
																</a>
																<button type="submit" class="btn btn-primary ms-auto">
																	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
																		Edit Catatan
																</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											@if (isset($item['id_pemasukan']))
												<div class="modal modal-blur fade" id="modal-danger{{$item['id_pemasukan']}}" tabindex="-1" role="dialog" aria-hidden="true">
											@else
												<div class="modal modal-blur fade" id="modal-danger{{$item['id_pengeluaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
											@endif
												<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
													<div class="modal-content">
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														<div class="modal-status bg-danger"></div>
														<div class="modal-body text-center py-4">
															<svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
															<h3>Apakah anda yakin?</h3>
														<div class="text-muted">Apakah anda yakin menghapus catatan ini?</div>
													</div>
													<div class="modal-footer">
														<div class="w-100">
															<div class="row">
																<div class="col">
																	<a href="#" class="btn w-100" data-bs-dismiss="modal">
																		Batal
																	</a>
																</div>
																<div class="col">
																	@if (isset($item['id_pemasukan']))
																		<form method="POST" action="{{route('hapusCatatan', ['id' => $item['id_pemasukan']] )}}">
																			@csrf
																			<input type="text" id="jenishapus" name="jenishapus" class="form-control text-end" autocomplete="off" hidden>
																	@else
																		<form method="POST" action="{{route('hapusCatatan', ['id' => $item['id_pengeluaran']])}}">
																			@csrf
																			<input type="text" id="jenishapus" name="jenishapus" class="form-control text-end" autocomplete="off" hidden>
																	@endif
																			<button type="submit" class="btn btn-dangers w-100" data-bs-dismiss="modal">
																				Hapus
																			</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									@endforeach
								</tbody>
							</table>
						</div>
                  	</div>
                </div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
	function formatNumber1(num) {
		return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	function updateFormattedNumber1(event) {
		console.log("updateFormattedNumber called"); 
		var inputElement = event.target;
		var rawValue = inputElement.value.replace(/\D/g, ''); 
		var formattedValue = formatNumber1(rawValue); 
		inputElement.value = formattedValue; 
		inputElement.setAttribute('data-value', rawValue); 
		setUnformattedValueToInput1(inputElement); 
	}
	
	function setUnformattedValueToInput1(inputElement) {
		var unformattedValue = inputElement.getAttribute('data-value') || ''; 
		var jumlah1Input = inputElement.parentElement.querySelector('#jumlah1edit');
		if (jumlah1Input) { 
			jumlah1Input.value = unformattedValue; 
		}
	}
	
	function getUnformattedValue1() {
		var inputElement = document.getElementById('jumlahedit');
		var unformattedValue = inputElement.getAttribute('data-value') || ''; 
		return unformattedValue;
	}

	document.querySelectorAll('.form-control.text-end').forEach(input => {
		input.addEventListener('input', updateFormattedNumber1);
	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    	const jenisSelect = document.getElementById("jenisFilter");
    	const pilihanDiv = document.getElementById("pilihanFilter");
		const inputStartDate = document.getElementById("startdate-filter");
		const inputEndDate = document.getElementById("enddate-filter");
		const filterValue = '{{ $filterValue }}';
		const startDate = '{{ $startDate }}';
		const endDate = '{{ $endDate }}';

    

		function handleChange() {
    const selectedOption = jenisSelect.value;
    // Clear existing content
    pilihanDiv.innerHTML = "";

    if (selectedOption === "Mingguan") {
        // Create input type week
        const inputWeek = document.createElement("input");
        inputWeek.type = "week";
        inputWeek.classList.add("form-control");
        inputWeek.setAttribute("name", "filterMingguan");
        inputWeek.setAttribute("id", "filterMingguan");
        inputWeek.setAttribute("required", "required");
		pilihanDiv.appendChild(inputWeek);
		if (filterValue) {
			inputWeek.value = filterValue;
			inputStartDate.value = startDate;
			inputEndDate.value = endDate;
		}
    } else if (selectedOption === "Bulanan") {
        // Create input type month
        const inputMonth = document.createElement("input");
        inputMonth.type = "month";
        inputMonth.classList.add("form-control");
        inputMonth.setAttribute("name", "filterBulanan");
        inputMonth.setAttribute("id", "filterBulanan");
        inputMonth.setAttribute("required", "required");
        pilihanDiv.appendChild(inputMonth);
		if (filterValue) {
			inputMonth.value = filterValue;
			inputStartDate.value = startDate;
			inputEndDate.value = endDate;
		}
    } else if (selectedOption === "Tahunan") {
        // Create input type number for year
        const inputYear = document.createElement("input");
        inputYear.type = "number";
        inputYear.min = "1900";
        inputYear.max = "2099";
        inputYear.step = "1";
        inputYear.classList.add("form-control");
        inputYear.setAttribute("name", "filterTahunan");
        inputYear.setAttribute("id", "filterTahunan");
        inputYear.setAttribute("required", "required");
		inputYear.setAttribute("placeholder", "2024");
		pilihanDiv.appendChild(inputYear);
		if (filterValue) {
			inputYear.value = filterValue;
			inputStartDate.value = startDate;
			inputEndDate.value = endDate;
		} else {
			inputYear.value = "2024";
		}
	} else if (selectedOption === "Custom") {
		

		// Enable the start and end date inputs
		inputStartDate.disabled = false;
		inputEndDate.disabled = false;
		if (filterValue) {
			inputStartDate.value = startDate;
			inputEndDate.value = endDate;
		}

			
	} else if (selectedOption === "Kisaran") {
        // Create select with options for Kisaran
        const selectKisaran = document.createElement("select");
        selectKisaran.classList.add("form-select");
        selectKisaran.setAttribute("name", "filterKisaran");
        selectKisaran.setAttribute("id", "filterKisaran");
        selectKisaran.setAttribute("required", "required");

        const options = [
            { text: "Semua", value: "semuaHari" },
            { text: "Hari Ini", value: "iniHari" },
            { text: "7 Hari", value: "7Hari" },
            { text: "30 Hari", value: "30Hari" },
            { text: "90 Hari", value: "90Hari" },
            { text: "12 Bulan", value: "12Bulan" },
        ];

        options.forEach(optionData => {
            const option = document.createElement("option");
            option.text = optionData.text;
            option.value = optionData.value;

            // Check if option value matches the passed value
            if (option.value === filterValue) {
                option.selected = true;
				inputStartDate.value = startDate;
				inputEndDate.value = endDate;
            }

            selectKisaran.add(option);
        });

        pilihanDiv.appendChild(selectKisaran);
    }
}

function handleSubmit(event) {
    event.preventDefault(); // Prevent form submission

    const selectedOption = jenisSelect.value;

    if (selectedOption === "Mingguan") {
        const filterMingguan = document.getElementById("filterMingguan").value;
        // Now you have the value of the selected week, you can do whatever you need with it
    } else if (selectedOption === "Bulanan") {
        const filterBulanan = document.getElementById("filterBulanan").value;
        // Now you have the value of the selected month, you can do whatever you need with it
    } else if (selectedOption === "Tahunan") {
        const filterTahunan = document.getElementById("filterTahunan").value;
        // Now you have the value of the selected year, you can do whatever you need with it
    } else if (selectedOption === "Kisaran") {
        const filterKisaran = document.getElementById("filterKisaran").value;
        // Now you have the value of the selected Kisaran option, you can do whatever you need with it
    }

    // Now you can submit the form data, or perform any other action based on the selected option
}



		// Add event listener for change event
		jenisSelect.addEventListener("change", handleChange);

		// Trigger change event on page load
		const initialEvent = new Event("change");
		jenisSelect.dispatchEvent(initialEvent);
	});

	
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");

		window.addEventListener("load", function() {
			spinner.style.display = "none";
			pageContent.style.display = "block";
			pageTitle.style.display = "block";
		});

        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach((button) => {
            button.addEventListener('click', function () {
                const modal = document.querySelector(button.getAttribute('data-bs-target'));
                const confirmButton = modal.querySelector('.btn-dangers');

                const itemId = button.getAttribute('data-id');
				const itemType = button.getAttribute('data-jenis');
				console.log('Item ID:', itemId);
				console.log('Item type:', itemType);
				const jenisHapus = modal.querySelector('#jenishapus');

				if (jenisHapus) {
                	jenisHapus.value = itemType;
            	}

                confirmButton.setAttribute('data-id', itemId);
				confirmButton.setAttribute('data-jenis', itemType);
            });
        });
    });
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    	const editButtons = document.querySelectorAll('.edit-btn');

		document.querySelectorAll('.pemasukan-radio, .pengeluaran-radio').forEach(radio => {
			radio.addEventListener('change', function() {
				updateSelectOptions1(this);
			});
		});

		const kategoriPengeluaranData = @json($kategoriPengeluaranData);
        const kategoriPemasukanData = @json($kategoriPemasukanData);

		function updateSelectOptions1(radioElement) {
			// Find the closest modal and its select element
			var modal = radioElement.closest('.modal');
			var selectElement = modal.querySelector('.kategoriedit');

			// Clear existing options
			selectElement.innerHTML = ''; 

			// Add appropriate options based on the selected radio button
			if (radioElement.classList.contains('pemasukan-radio')) {
				kategoriPemasukanData.forEach(function(item) {
				selectElement.innerHTML += `<option value="${item.id_kategori_pemasukan}">${item.nama_kategori_pemasukan}</option>`;
			});
			} else if (radioElement.classList.contains('pengeluaran-radio')) {
				kategoriPengeluaranData.forEach(function(item) {
				selectElement.innerHTML += `<option value="${item.id_kategori_pengeluaran}">${item.nama_kategori_pengeluaran}</option>`;
			});
			}

			selectElement.disabled = false;
		}

		editButtons.forEach(button => {
			button.addEventListener('click', function(e) {
				e.preventDefault();

				const id = this.getAttribute('data-id');
				const jenis = this.getAttribute('data-jenis');
				const jumlah = this.getAttribute('data-jumlah');
				const kategori = this.getAttribute('data-kategori');
				const tanggal = this.getAttribute('data-tanggal');
				const catatan = this.getAttribute('data-catatan');
				const createdat = this.getAttribute('data-createdat');

				const modal = document.getElementById(`modal-edit${id}`);
				
				const idInput = modal.querySelector('.id-input');
				const jenisRadioPemasukan = modal.querySelector('.pemasukan-radio');
				const jenisRadioPengeluaran = modal.querySelector('.pengeluaran-radio');
				const jumlahInput = modal.querySelector('.jumlahedit');
				const jenisEdit = modal.querySelector('.jenisedit');
				const createdatInput = modal.querySelector(`#created_at${id}`);
				const jumlah1Input = modal.querySelector('.jumlah1edit');
				const kategoriSelect = modal.querySelector('.kategoriedit');
				const tanggalInput = modal.querySelector('.tanggaledit');
				const catatanTextarea = modal.querySelector('.catatanedit');
				
				if (createdatInput) createdatInput.value = createdat;

				if (idInput) {
					idInput.value = id;
				}

				if (jenisEdit) {
					jenisEdit.value = jenis;
				}

				if (jenis === '1' && jenisRadioPemasukan) {
					jenisRadioPemasukan.checked = true;
					updateSelectOptions1(jenisRadioPemasukan);
				} else if (jenis === '2' && jenisRadioPengeluaran) {
					jenisRadioPengeluaran.checked = true;
					updateSelectOptions1(jenisRadioPengeluaran);
				}

				if (jumlahInput) {
					const rawValue = jumlah.replace(/\D/g, ''); 
					console.log('Raw Value:', rawValue); 

					const formattedValue = formatNumber1(rawValue); 
					console.log('Formatted Value:', formattedValue); 

					jumlahInput.value = formattedValue; 
					jumlahInput.dispatchEvent(new Event('input')); 

					if (jumlah1Input) {
						jumlah1Input.value = rawValue; 
						console.log('jumlah1edit Value:', jumlah1Input.value); 
					}
				}

				if (kategoriSelect) {
					kategoriSelect.value = kategori;
				}

				if (tanggalInput) {
					tanggalInput.value = tanggal;
				}

				if (catatanTextarea) {
					catatanTextarea.value = catatan;
				}
			});
		});
    
		const modals = document.querySelectorAll('.modal');
		modals.forEach(modal => {
			modal.addEventListener('hidden.bs.modal', function() {
				const form = this.querySelector('form');
				if (form) {
					form.reset();
				}
			});
		});
		document.querySelectorAll('.pemasukan-radio, .pengeluaran-radio').forEach(function(radio) {
			radio.addEventListener('change', function() {
				updateSelectOptions1(this);
			});
		});
	});
</script>

<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var rowData = $(this).closest('tr').find('td').map(function() {
                return $(this).text();
            }).get();
            $('#edit_id').val(rowData[0]); 
            $('#modal-edit').modal('show');
        });
    });
</script>

<script>
	$(document).ready(function() {
    var table = $('#table-harian').DataTable({
        "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        "pageLength": 100,
        "ordering": false,
        "lengthChange": false,
        "paging": false,
        "info": false,
        initComplete: function(settings, json) {
            $('#table-harian').css('display', 'table');
            $('#table-harian th.sorting_disabled').remove();
        },
        "drawCallback": function(settings) {
            $('#table-harian th.sorting_disabled').remove();
        }
    });

	// Hide all elements with class .dataTables_filter
// Hide all elements with class .dataTables_filter
$('.dataTables_filter').each(function() {
    $(this).attr("hidden", "hidden");
});

// Event listener for input change in searchRecord




	
	function updateHeaderTotals() {
    console.log('Updating header totals...');

    // Clear previous totals
    $('.header-total').each(function() {
        $(this).text('');
    });

    var totals = {};
    var totalIncome = 0;
    var totalExpense = 0;

    table.rows({ search: 'applied' }).every(function(rowIdx, tableLoop, rowLoop) {
        var data = this.data();
        var date = $(data[0]).find('.item-data').data('date');
        var amount = parseFloat($(data[0]).find('.item-data').data('amount'));

        console.log('Processing row:', data, 'Date:', date, 'Amount:', amount);

        if (!totals[date]) {
            totals[date] = { income: 0, expense: 0 };
        }
        if ($(data[0]).find('.item-data').data('amount') !== undefined && !isNaN(amount)) {
            if ($(data[0]).find('.item-data').data('id-pemasukan') !== undefined) {
                totals[date].income += amount;
                totalIncome += amount;
            } else {
                totals[date].expense += amount;
                totalExpense += amount;
            }
        }
    });

    console.log('Totals:', totals);
    console.log('Total income:', totalIncome);
    console.log('Total expense:', totalExpense);

    $('.header-total').each(function() {
        var date = $(this).closest('tr').find('.item-data').data('date');
        if (totals[date] !== undefined) {
            var netTotal = totals[date].income - Math.abs(totals[date].expense);
            if (!isNaN(netTotal)) {
                if (netTotal < 0) {
                    $(this).text(`- Rp. ${new Intl.NumberFormat('id-ID').format(Math.abs(netTotal))}`).addClass('text-red').removeClass('text-green');
                } else {
                    $(this).text(`+ Rp. ${new Intl.NumberFormat('id-ID').format(netTotal)}`).addClass('text-green').removeClass('text-red');
                }
            }
        }
    });

    // Update the current balance
    $('#current-balance').text(`Rp. ${new Intl.NumberFormat('id-ID').format(totalIncome - Math.abs(totalExpense))}`);

    // Update the total period expenses
    $('#total-expenses').text(`- Rp. ${new Intl.NumberFormat('id-ID').format(Math.abs(totalExpense))}`).addClass('text-red');

    // Update the total period income
    $('#total-income').text(`+ Rp. ${new Intl.NumberFormat('id-ID').format(totalIncome)}`).addClass('text-green');
}

// Call the function initially to set the totals
updateHeaderTotals();

// Update totals whenever the table is searched
table.on('search.dt', function() {
    console.log('Table search event triggered...');
    updateHeaderTotals();
});

$('#searchRecord').on('input', function() {
    // Get the value from searchRecord input
    var searchValue = $(this).val();
    
    // Clear the DataTables filter input if searchValue is empty
    if (searchValue === '') {
        $('.dataTables_filter input[type="search"]').val('').trigger('input');
		// Set the radio button with the value '1' to be checked
        $('input[name="record-type"][value="1"]').prop('checked', true);

        // Optionally, you can also disable the category selects
        $('.category-select').prop('disabled', true);
		updateHeaderTotals();

        return; // Exit the function early
    }
    
    // Get the value of the existing search input
    var existingSearchValue = $('.dataTables_filter input[type="search"]').val();
    
    // Concatenate space and searchValue if existing value is not empty
    var updatedValue = existingSearchValue ? existingSearchValue + ' ' + searchValue : searchValue;
    
    // Set the updated value to all elements with class .dataTables_filter
    $('.dataTables_filter input[type="search"]').val(updatedValue).trigger('input');
updateHeaderTotals();

});

$('.btn-resetfilter').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Reset searchRecord input value to an empty string
        $('#searchRecord').val('');

        // Set the radio button with the value '1' to be checked
        $('input[name="record-type"][value="1"]').prop('checked', true);

        // Optionally, you can also disable the category selects
        $('.category-select').prop('disabled', true);

        // Trigger the input event on searchRecord to update DataTables filter
        $('#searchRecord').trigger('input');
	updateHeaderTotals();

    });

// Add event listener to radio buttons
$('input[type="radio"][name="record-type"]').change(function() {
    var value = $(this).val();
    console.log('Radio button value changed:', value);

    // Reset category select options
    $('.category-select').val('');

    if (value === "1") {
        // Disable both select elements
        $('.category-select').prop('disabled', true);
        table.search('').draw();
    } else if (value === "2") {
        // Enable income select and disable expense select
        $('.income-category').prop('disabled', false);
        $('.expense-category').prop('disabled', true);
        table.search('Income').draw();
    } else if (value === "3") {
        // Enable expense select and disable income select
        $('.income-category').prop('disabled', true);
        $('.expense-category').prop('disabled', false);
        table.search('Expense').draw();
    }

    // Call updateHeaderTotals after changing radio buttons
    updateHeaderTotals();
});

// Add event listener to select elements
$('.category-select').change(function() {
    var recordType = $('input[type="radio"][name="record-type"]:checked').val();
    var category = $(this).val();
    console.log('Select element value changed:', category);

    table.search(category).draw();
	updateHeaderTotals();
});

// Add event listener to date filter

    // Custom search function
    
});


</script>

@endsection
