@extends('layouts.tabler')

@section('title', 'Catatan Bulanan')

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
						<a href="{{ route('catatanHarian') }}" class="nav-link" aria-selected="true" role="tab">Harian</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('catatanMingguan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Mingguan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('catatanBulanan') }}" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active show" id="tabs-bulanan" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4>Catatan Bulanan</h4>
								<div>Berikut ini merupakan daftar catatan keuangan bulanan yang dapat difilter berdasarkan bulan yang dipilih.</div>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Pilih Bulan :</label>
                  					<input id="dateInput" type="month" class="form-control">
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
                    		<table id="table-bulanan" class="table card-table table-vcenter text-nowrap datatable" style="display: none;">
							<thead>
                        			<tr>
                          				<th class="text-center" style="width:5%">No.</th>
                          				<th class="text-center" style="width:40%">Bulan</th>
                          				<th class="text-center" style="width:20%">Pemasukan</th>
                          				<th class="text-center" style="width:20%">Pengeluaran</th>
                        			</tr>
                      			</thead>
                      			<tbody>
								  	@foreach($sortedData as $data)
									<tr>
										<td style="width:5%">{{$loop->iteration}}.</td>
										<td style="width:40%">{{$data['bulan']}} {{$data['tahun']}}</td>
										<td class="text-end" style="width:20%">
											<span class="d-flex justify-content-between">
												<span class="text-green">Rp.</span>
												<span class="text-green">{{ number_format(floatval($data['jumlah_pemasukan']), 0, ',', '.') }}</span>
											</span>
										</td>
										<td class="text-end" style="width:20%">
											<span class="d-flex justify-content-between">
												<span class="text-red">Rp.</span>
												<span class="text-red">{{ number_format(floatval($data['jumlah_pengeluaran']), 0, ',', '.') }}</span>
											</span>
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

		const spinner = document.getElementById("spinner");
    const pageContent = document.getElementById("page-content");
    const pageTitle = document.getElementById("page-title");

    // Hide spinner and show page content when fully loaded
    window.addEventListener("load", function() {
        spinner.style.display = "none";
        pageContent.style.display = "block";
        pageTitle.style.display = "block";
    });

		$('#loadingIndicator').show();
    	
		var table = $('#table-bulanan').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ],
			initComplete: function(settings, json) {
            	$('#loadingIndicator').hide();
            	$('#table-bulanan').css('display', 'table');
        	}
    	});
	
		$('#dateInput').on('change', function() {
			var selectedMonth = $(this).val();
			console.log(selectedMonth);
		
			if (selectedMonth) {
				// Extract the year and week number from the selected week
				var year = selectedMonth.split('-')[0]; // Extract year
        var month = selectedMonth.split('-')[1]; // Extract month

        var formattedMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'][parseInt(month) - 1] + ' ' + year;
      
				
				table.column(1).search('').draw(); // Assuming the week data is in the second column
				table.column(1).search('^' + formattedMonth + '$', true, false).draw();
			} else {
				table.column(1).search('').draw(); // Assuming the week data is in the second column
			}
		});

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

		$('#table-bulanan').before(cardBodyWrapper);

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

		$('#table-bulanan').after(cardFooterWrapper);

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
