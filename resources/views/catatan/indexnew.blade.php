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
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row row-deck row-cards">
		
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<div class="d-flex align-items-center">
								<div class="subheader">Total Period Income</div>
							</div>
							<div class="h2 text-green mb-0">+ Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
						</div>
						<div class="col-lg-3">
							<div class="d-flex align-items-center">
								<div class="subheader">Total Period Income</div>
							</div>
							<div class="h2 text-green mb-0">+ Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
						</div>
						<div class="col-lg-3">
							<div class="d-flex align-items-center">
								<div class="subheader">Total Period Income</div>
							</div>
							<div class="h2 text-green mb-0">+ Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
						</div>
						<div class="col-lg-3">
							<div class="d-flex align-items-center">
								<div class="subheader">Total Period Income</div>
							</div>
							<div class="h2 text-green mb-0">+ Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Current Wallet Balance</div>
					</div>
					<div class="h2 text-muted">Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Total Period Change</div>
					</div>
					<div class="h2 text-green">+Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Total Period Expenses</div>
					</div>
					<div class="h2 text-red">- Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Total Period Income</div>
					</div>
					<div class="h2 text-green">+ Rp. {{ number_format(floatval(1000000), 2, ',', '.')}}</div>
				</div>
			</div>
		</div>

		

	</div>
	<div class="col mt-2">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a href="{{ route('catatanHarian') }}" class="nav-link active" aria-selected="true" role="tab">Harian</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('catatanMingguan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Mingguan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('catatanBulanan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">

					<div class="tab-pane active show" id="tabs-harian" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4 class="text-muted" id="totalpemasukan">Total Pemasukan&nbsp&nbsp    : <span class="text-green">+Rp.</span> </h4>
								<h4 class="text-muted" id="totalpengeluaran">Total Pengeluaran :&nbsp<span class="text-red">- Rp.</span> </h4>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Pilih Tanggal :</label>
                  					<input id="dateInput" type="date" class="form-control">
                				</div>
              				</div>
						</div>

						<div class="card" id="loadingIndicator">
                      		<ul class="list-group list-group-flush placeholder-glow">
                        		<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
                            			</div>
                          			</div>
                        		</li>
                        		<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
                            			</div>
                          			</div>
                        		</li>
                        		<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
                            			</div>
                          			</div>
                        		</li>
                        		<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
                            			</div>
                          			</div>
                        		</li>
								<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
                            			</div>
                          			</div>
                        		</li>
								<li class="list-group-item">
                          			<div class="row align-items-center">
                            			<div class="col-auto">
                              				<div class="avatar avatar-rounded placeholder"></div>
                            			</div>
                            			<div class="col-7">
                              				<div class="placeholder placeholder-xs col-9"></div>
                              				<div class="placeholder placeholder-xs col-7"></div>
                            			</div>
                            			<div class="col-2 ms-auto text-end">
                              				<div class="placeholder placeholder-xs col-8"></div>
                              				<div class="placeholder placeholder-xs col-10"></div>
										</div>
                          			</div>
                        		</li>
                      		</ul>
						</div>
				  		<div class="table-responsive">
                    		<table id="table-harian" class="table card-table table-vcenter text-nowrap datatable" style="display: none;">
                      			<thead>
                        			<tr>
                          				<th class="text-center" style="width:5%">No.</th>
                          				<th class="text-center" style="width:40%">Kategori</th>
                          				<th class="text-center" style="width:20%">Jumlah</th>
                          				<th class="text-center" style="width:20%">Tanggal</th>
                          				<th class="text-center" style="width:15%">Action</th>
                        			</tr>
                      			</thead>
                      			<tbody>
									@foreach($combinedData as $data)
                        			<tr>
                          				<td style="width:5%">{{$loop->iteration}}.</td>
										@if (isset($data['id_pemasukan']))
											<td class="td-truncate"style="width:40%" data-label="Kategori">
                            					<div class="text-green">{{$data['kategori_pemasukan']['nama_kategori_pemasukan']}}</div>
                            					@if (isset($data['catatan']))
												<div class="text-truncate">{{$data['catatan']}}</div>
												@else
												<div class="text-truncate">-</div>
												@endif
                          					</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-green">+Rp.</span>
												<span class="text-end text-green">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@else
											<td class="td-truncate"style="width:40%" data-label="Kategori">
												<div class="text-red">{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}</div>
												@if (isset($data['catatan']))
												<div class="text-truncate">{{$data['catatan']}}</div>
												@else
												<div class="text-truncate">-</div>
												@endif
											</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-red">-Rp.</span>
												<span class="text-end text-red">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@endif		
										<td style="width:20%" class="text-center">{{ date('d F Y', strtotime($data['tanggal'])) }}</td>								
                          				<td style="width:15%" class="text-end">
										  	@if (isset($data['id_pemasukan']))
                            					<a data-bs-toggle="modal" data-bs-target="#modal-edit{{$data['id_pemasukan']}}" data-id="{{$data['id_pemasukan']}}" data-jenis="1" data-jumlah="{{$data['jumlah']}}" data-kategori="{{$data['kategori_pemasukan']['id_kategori_pemasukan']}}" data-tanggal="{{$data['tanggal']}}" data-catatan="{{$data['catatan']}}" class="btn btn-warning edit-btn">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
													Edit
												</a>
												<a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#modal-danger{{$data['id_pemasukan']}}" data-id="{{$data['id_pemasukan']}}" data-jenis="1">
											  		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
	                                				Hapus
                              					</a>
											@else
                            					<a data-bs-toggle="modal" data-bs-target="#modal-edit{{$data['id_pengeluaran']}}" data-id="{{$data['id_pengeluaran']}}" data-jenis="2" data-jumlah="{{$data['jumlah']}}" data-kategori="{{$data['kategori_pengeluaran']['id_kategori_pengeluaran']}}" data-tanggal="{{$data['tanggal']}}" data-catatan="{{$data['catatan']}}" class="btn btn-warning edit-btn">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
	                                				Edit
                              					</a>
												<a href="#" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#modal-danger{{$data['id_pengeluaran']}}" data-id="{{$data['id_pengeluaran']}}" data-jenis="2">
											  		<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
	                                				Hapus
                              					</a>
											@endif
                          				</td>
                        			</tr>
									<!-- Modal Edit Catatan -->
									@if (isset($data['id_pemasukan']))
										<div class="modal modal-blur fade" id="modal-edit{{$data['id_pemasukan']}}" tabindex="-1" role="dialog" aria-hidden="true">
									@else
										<div class="modal modal-blur fade" id="modal-edit{{$data['id_pengeluaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
									@endif
    										<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        										<div class="modal-content">
          											<div class="modal-header">
														<h5 class="modal-title">Edit Catatan</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													@if (isset($data['id_pemasukan']))
														<form action="{{route('updateCatatan', ['id'=> $data['id_pemasukan']])}}" method="post" autocomplete="off">
															@csrf
															<input type="text" id="id" name="id" class="form-control text-end" autocomplete="off" hidden>
															<input type="text" id="jenisedit" name="jenisedit" class="form-control text-end" autocomplete="off" hidden>
													@else
														<form action="{{route('updateCatatan', ['id'=> $data['id_pengeluaran']])}}" method="post" autocomplete="off">
															@csrf
															<input type="text" id="id" name="id" class="form-control text-end" autocomplete="off" hidden>
															<input type="text" id="jenisedit" name="jenisedit" class="form-control text-end" autocomplete="off" hidden>

													@endif
															<div class="modal-body">
																<label class="form-label">Pilih Jenis :</label>
																<div class="form-selectgroup-boxes row mb-3">
																	<div class="col-lg-6">
																		<label class="form-selectgroup-item">
																			<input type="radio" id="pemasukanedit" name="jenisedit" value="1" class="form-selectgroup-input" disabled>
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
																<input type="radio" id="pengeluaranedit" name="jenisedit" value="2" class="form-selectgroup-input" disabled>
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
																	<input type="text" id="jumlahedit" name="jumlahedit" class="form-control text-end" autocomplete="off">
																	<input type="text" id="jumlah1edit" name="jumlah1edit" class="form-control text-end" autocomplete="off" hidden>
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="mb-3">
																<label class="form-label">Kategori :</label>
																<select id="kategoriedit" name="kategoriedit" class="form-select">
																	@if (isset($data['id_pemasukan']))
																	<option value="1">Uang Saku</option>
																	<option value="2">Upah</option>
																	<option value="3">Bonus</option>
																	<option value="3">Lainnya</option>
																	@else
																	<option value="1">Makanan</option>
																	<option value="2">Minuman</option>
																	<option value="3">Tagihan</option>
																	<option value="4">Shopping</option>
																	<option value="5">Kesehatan & Olahraga</option>
																	<option value="6">Lainnya</option>
																	@endif
																</select>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="mb-3">
																<label class="form-label">Tanggal :</label>
																<input type="date" id="tanggaledit" name="tanggaledit" class="form-control" value="{{ now()->format('Y-m-d') }}">
															</div>
														</div>
														<div class="col-lg-12">
															<div class="mb-2">
																<label class="form-label">Catatan :</label>
																<textarea id="catatanedit" name="catatanedit" class="form-control" rows="3"></textarea>
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
								<!-- End of Modal Edit Catatan -->



	@if (isset($data['id_pemasukan']))

	<div class="modal modal-blur fade" id="modal-danger{{$data['id_pemasukan']}}" tabindex="-1" role="dialog" aria-hidden="true">
		@else
	<div class="modal modal-blur fade" id="modal-danger{{$data['id_pengeluaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Batal
                  </a></div>
                <div class="col">
				@if (isset($data['id_pemasukan']))
					<form method="POST" action="{{route('hapusCatatan', ['id' => $data['id_pemasukan']] )}}">
						@csrf
						<input type="text" id="jenishapus" name="jenishapus" class="form-control text-end" autocomplete="off" hidden>

						@else
					<form method="POST" action="{{route('hapusCatatan', ['id' => $data['id_pengeluaran']])}}">
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
// Function to format the number with thousands separator
function formatNumber1(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Function to update the value of the input field with formatted number
function updateFormattedNumber1(event) {
        console.log("updateFormattedNumber called"); // Debug statement
        var inputElement = event.target;
        var rawValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
        var formattedValue = formatNumber1(rawValue); // Format the number
        inputElement.value = formattedValue; // Update the input field with formatted value
        inputElement.setAttribute('data-value', rawValue); // Store unformatted value in a data attribute
		setUnformattedValueToInput1(); // Set the unformatted value to the input field jumlah1
    }

const jumlahInputs = document.querySelectorAll('.form-control.text-end');
    jumlahInputs.forEach(input => {
        input.addEventListener('input', updateFormattedNumber1);
		input.addEventListener('input', setUnformattedValueToInput1);
    });

function setUnformattedValueToInput1(event) {
    var inputElement = event.target;
    var unformattedValue = inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    var jumlah1Input = inputElement.parentElement.querySelector('#jumlah1edit');
    jumlah1Input.value = unformattedValue; // Set the unformatted value to the input field jumlah1
}

// Function to get the unformatted value from the data attribute
function getUnformattedValue1() {
    var inputElement = document.getElementById('jumlahedit');
    var unformattedValue = inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    return unformattedValue;
}

// Attach event listener to the input field to trigger formatting as the user types
document.getElementById('jumlahedit').addEventListener('input', updateFormattedNumber1);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

		const spinner = document.getElementById("spinner");
    const pageContent = document.getElementById("page-content");
    const pageTitle = document.getElementById("page-title");

    // Hide spinner and show page content when fully loaded
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


                // Set data-id and data-jenis attributes for the delete confirmation button
                confirmButton.setAttribute('data-id', itemId);
				confirmButton.setAttribute('data-jenis', itemType);
            });
        });
    });
</script>


<script>
	document.addEventListener("DOMContentLoaded", function() {

		
    const editButtons = document.querySelectorAll('.edit-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const id = this.getAttribute('data-id');
            const jenis = this.getAttribute('data-jenis');
			const jumlah = this.getAttribute('data-jumlah');
            const kategori = this.getAttribute('data-kategori');
            const tanggal = this.getAttribute('data-tanggal');
            const catatan = this.getAttribute('data-catatan');

            console.log(id, jenis, jumlah, kategori, tanggal, catatan); // Log the extracted data

            // Find the corresponding modal by ID
            const modal = document.getElementById(`modal-edit${id}`);
            
            if (!modal) {
                console.error(`Modal not found for ID: ${id}`);
                return;
            }

            // Populate input fields in the modal
			const idInput = modal.querySelector('#id');
            const jenisRadio = modal.querySelector(`#${jenis === '1' ? 'pemasukanedit' : 'pengeluaranedit'}`);
			const jenisInput = modal.querySelector('#jenisedit');
			const jumlahInput = modal.querySelector('#jumlahedit');
			const jumlah1Input = modal.querySelector('#jumlah1edit');
            const kategoriSelect = modal.querySelector('#kategoriedit');
            const tanggalInput = modal.querySelector('#tanggaledit');
            const catatanTextarea = modal.querySelector('#catatanedit');

			if (idInput) {
                idInput.value = id;
            }

			if (jenisInput) {
                jenisInput.value = jenis;
            }

            if (jenisRadio) {
                jenisRadio.checked = true;
            }

			if (jumlahInput) {
    const rawValue = jumlah.replace(/\D/g, ''); // Extract only digits
    console.log('Raw Value:', rawValue); // Debug log

    const formattedValue = formatNumber1(rawValue); // Format the raw value
    console.log('Formatted Value:', formattedValue); // Debug log

    jumlahInput.value = formattedValue; // Set the formatted value to jumlahInput
    jumlahInput.dispatchEvent(new Event('input')); // Trigger input event

    if (jumlah1Input) {
        jumlah1Input.value = rawValue; // Set the raw value to jumlah1Input
        console.log('jumlah1edit Value:', jumlah1Input.value); // Debug log
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

    // Clear modal fields when the modal is hidden
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function() {
            const form = this.querySelector('form');
            form.reset();
        });
    });
});




</script>



<script>
    $(document).ready(function() {
        // Event handler for edit button click
        $('.edit-btn').click(function() {
            // Get the data from the row
            var rowData = $(this).closest('tr').find('td').map(function() {
                return $(this).text();
            }).get();

            // Populate the edit modal fields with the data
            $('#edit_id').val(rowData[0]); // Assuming the first column contains the ID
            // Populate other fields similarly based on their position in the row

            // Show the edit modal
            $('#modal-edit').modal('show');
        });
    });
</script>

<script>
	$(document).ready(function() {
		$('#loadingIndicator').show();
    	
		var table = $('#table-harian').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ],
			initComplete: function(settings, json) {
            	$('#loadingIndicator').hide();
            	$('#table-harian').css('display', 'table');
        	}
    	});
	
		$('#dateInput').on('change', function() {
			var selectedDate = $(this).val();
		
			if (selectedDate) {
				var date = new Date(selectedDate);
				var formattedDate = (date.getDate() < 10 ? '0' : '') + date.getDate() + ' ' +
								['January', 'February', 'March', 'April', 'May', 'June', 'July',
								'August', 'September', 'October', 'November', 'December'][date.getMonth()] +
								' ' + date.getFullYear();
				table.column(3).search('').draw();
				table.column(3).search('^' + formattedDate + '$', true, false).draw();

				var totalPemasukan = 0;
				var totalPengeluaran = 0;	
		
				$('#table-harian tbody tr').each(function() {
					var rowDate = $(this).find('td:eq(3)').text().trim(); 
					var rowAmountText = $(this).find('td:eq(2)').text().trim();
				
				
					var amountParts = rowAmountText.split('.');
				
					var rowAmount = parseFloat(amountParts.map(part => part.replace(/[^\d]/g, '')).join(''));
				
					if (rowDate === formattedDate) {
						if (rowAmountText.startsWith('+')) {
							totalPemasukan += rowAmount;
						} else if (rowAmountText.startsWith('-')) {
							totalPengeluaran += rowAmount;
						}
					}
				});

			
				$('#totalpemasukan').html('<h4 id="totalpemasukan">Total Pemasukan&nbsp&nbsp    : <span class="text-green">+Rp. ' + formatNumber1(totalPemasukan) + '</span>');
				$('#totalpengeluaran').html('<h4 id="totalpengeluaran">Total Pengeluaran :<span class="text-red">&nbsp- Rp. ' + formatNumber1(totalPengeluaran) + '</span>');
			} else {
				table.column(3).search('').draw();
				$('#totalpemasukan').html('<h4 id="totalpemasukan">Total Pemasukan&nbsp&nbsp    : <span class="text-green">+Rp.</span> ');
				$('#totalpengeluaran').html('<h4 id="totalpengeluaran">Total Pengeluaran :<span class="text-red">&nbsp- Rp.</span> ');
			}
		});

		function formatNumber1(num) {
			return num.toLocaleString('id-ID-u-nu-latn');
		}

		$('.dataTables_length select').addClass('form-select form-select-sm mx-2 d-inline-block');
		$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');
		
		var cardBodyWrapper = $('<div class="card-body border-top py-3"></div>');
		var dFlexWrapper = $('<div class="d-flex"></div>');
		var textMutedWrapper = $('<div class="text-muted"></div>');
		var msAutoTextMutedWrapper = $('<div class="ms-auto text-muted"></div>');

		$('.dataTables_length').appendTo(textMutedWrapper);
		$('.dataTables_filter').appendTo(msAutoTextMutedWrapper);

		dFlexWrapper.append(textMutedWrapper);
		dFlexWrapper.append(msAutoTextMutedWrapper);
		cardBodyWrapper.append(dFlexWrapper);

		$('#table-harian').before(cardBodyWrapper);

		var paginateContainer = $('#table-harian_paginate');

		paginateContainer.find('span').each(function() {
			$(this).replaceWith($(this).contents());
		});  

		$('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');

		table.on('draw.dt', function() {
			$('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');
		});

		$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');

		var cardFooterWrapper = $('<div class="card-body d-flex align-items-center"></div>');
		var dFlexWrapper = $('<div class="d-flex"></div>');
		var textMutedFooterWrapper = $('<p class="m-0 text-muted"></p>');
		var msAutoTextMutedFooterWrapperLi = $('<li class="page-item"></li>');
		var msAutoTextMutedFooterWrapper = $('<ul class="pagination dataTables_paginate paging_simple_numbers m-0 ms-auto" id="table-harian_paginate"></ul>');

		$('.dataTables_info').appendTo(textMutedFooterWrapper);
		$('.dataTables_paginate').appendTo(msAutoTextMutedFooterWrapper);

		msAutoTextMutedFooterWrapperLi.append(msAutoTextMutedFooterWrapper);
		cardFooterWrapper.append(textMutedFooterWrapper);
		cardFooterWrapper.append(msAutoTextMutedFooterWrapper);

		$('#table-harian').after(cardFooterWrapper);

		var paginationList = $('<ul class="pagination m-0 ms-auto"></ul>');
		var paginateContainer = $('div.dataTables_paginate');

		paginateContainer.find('a').each(function() {
			var liElement = $('<li class="page-item"></li>').append($(this));
			paginationList.append(liElement);
		});

		paginateContainer.replaceWith(paginationList);
	});
</script>

@endsection
