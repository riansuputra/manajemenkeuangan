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
	<div class="col">
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
									@foreach($alldata as $data)
                        			<tr>
                          				<td style="width:5%">{{$loop->iteration}}.</td>
										@if (isset($data['id_pemasukan']))
											<td style="width:40%" data-label="Kategori">
                            					<div class="text-green">{{$data['kategori_pemasukan']['nama_kategori_pemasukan']}}</div>
                            					<div>{{$data['catatan']}}</div>
                          					</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-green">+Rp.</span>
												<span class="text-end text-green">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@else
											<td style="width:40% data-label="Kategori">
												<div class="text-red">{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}</div>
												<div>{{$data['catatan']}}</div>
											</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-red">-Rp.</span>
												<span class="text-end text-red">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@endif		
										<td style="width:20%" class="text-center">{{ date('d F Y', strtotime($data['tanggal'])) }}</td>								
                          				<td style="width:15%" class="text-end">
                            				<a href="#" class="btn">
	                                			Edit
                              				</a>
							  				<a href="#" class="btn">
	                                			Hapus
                              				</a>
                          				</td>
                        			</tr>
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

			
				$('#totalpemasukan').html('<h4 id="totalpemasukan">Total Pemasukan&nbsp&nbsp    : <span class="text-green">+Rp. ' + formatNumber(totalPemasukan) + '</span>');
				$('#totalpengeluaran').html('<h4 id="totalpengeluaran">Total Pengeluaran :<span class="text-red">&nbsp- Rp. ' + formatNumber(totalPengeluaran) + '</span>');
			} else {
				table.column(3).search('').draw();
				$('#totalpemasukan').html('<h4 id="totalpemasukan">Total Pemasukan&nbsp&nbsp    : <span class="text-green">+Rp.</span> ');
				$('#totalpengeluaran').html('<h4 id="totalpengeluaran">Total Pengeluaran :<span class="text-red">&nbsp- Rp.</span> ');
			}
		});

		function formatNumber(num) {
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
