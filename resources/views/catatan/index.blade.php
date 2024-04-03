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
						<a href="#tabs-harian" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Harian</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="#tabs-mingguan" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Mingguan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="#tabs-bulanan" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="#tabs-kalender" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Kalender</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">

					<div class="tab-pane active show" id="tabs-harian" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4>Catatan Harian</h4>
								<div>Berikut ini merupakan daftar catatan keuangan harian yang dapat difilter berdasarkan tanggal yang dipilih.</div>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Pilih Tanggal :</label>
                  					<input id="dateInput" type="date" class="form-control">
                				</div>
              				</div>
						</div>
						

				  		<div class="table-responsive">
                    		<table id="table-harian" class="table card-table table-vcenter text-nowrap datatable">
                      			<thead>
                        			<tr>
                          				<th class="w-1">No.</th>
                          				<th class="text-center">Kategori</th>
                          				<th class="text-center">Jumlah</th>
                          				<th class="text-center">Tanggal</th>
                          				<th class="text-end">Action</th>
                        			</tr>
                      			</thead>
                      			<tbody>
									@foreach($finaldata as $data)
                        			<tr>
                          				<td>{{$loop->iteration}}.</td>
										@if (isset($data['id_pemasukan']))
											<td data-label="Kategori">
                            					<div class="text-green">{{$data['kategori_pemasukan']['nama_kategori_pemasukan']}}</div>
                            					<div>{{$data['catatan']}}</div>
                          					</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-green">+Rp.</span>
												<span class="text-end text-green">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@else
											<td data-label="Kategori">
												<div class="text-red">{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}</div>
												<div>{{$data['catatan']}}</div>
											</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-red">-Rp.</span>
												<span class="text-end text-red">{{$data['jumlah']}}</span>
											</td>
										@endif										
                          				<td class="text-center">{{ date('d F Y', strtotime($data['tanggal'])) }}</td>
                          				<td class="text-end">
                            				<a href="#" class="btn">
	                                			Edit
                              				</a>
							  				<a href="#" class="btn">
	                                			Hapus
                              				</a>
                          				</td>
                        			</tr>
									@endforeach
									{{ $finaldata->links() }}
                      			</tbody>
                    		</table>
                  		</div>
				  		
					</div>


					<div class="tab-pane" id="tabs-mingguan" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4>Catatan Mingguan</h4>
								<div>Berikut ini merupakan daftar catatan keuangan mingguan yang dapat difilter berdasarkan tanggal yang dipilih.</div>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-2">
                  					<label class="form-label">Pilih Tanggal :</label>
                  					<input type="week" class="form-control">
                				</div>
              				</div>
						</div>
						

				  		<div class="table-responsive">
                    		<table id="table-mingguan" class="table card-table table-vcenter text-nowrap datatable">
								<thead>
                        			<tr>
                          				<th class="w-1">No.</th>
                          				<th class="text-center">Kategori</th>
                          				<th class="text-center">Jumlah</th>
                          				<th class="text-center">Tanggal</th>
                          				<th class="text-end">Action</th>
                        			</tr>
                      			</thead>
                      			<tbody>
									@foreach($finaldata as $data)
                        			<tr>
                          				<td>{{$loop->iteration}}.</td>
										@if (isset($data['id_pemasukan']))
											<td data-label="Kategori">
                            					<div class="text-green">{{$data['kategori_pemasukan']['nama_kategori_pemasukan']}}</div>
                            					<div>{{$data['catatan']}}</div>
                          					</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-green">+Rp.</span>
												<span class="text-end text-green">{{ number_format(floatval($data['jumlah']), 0, ',', '.')}}</span>
											</td>
										@else
											<td data-label="Kategori">
												<div class="text-red">{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}</div>
												<div>{{$data['catatan']}}</div>
											</td>
											<td class="d-flex justify-content-between" style="padding: 1.4rem;">
												<span class="text-start text-red">-Rp.</span>
												<span class="text-end text-red">{{$data['jumlah']}}</span>
											</td>
										@endif										
                          				<td class="text-center">{{ date('d F Y', strtotime($data['tanggal'])) }}</td>
                          				<td class="text-end">
                            				<a href="#" class="btn">
	                                			Edit
                              				</a>
							  				<a href="#" class="btn">
	                                			Hapus
                              				</a>
                          				</td>
                        			</tr>
									@endforeach
									{{ $finaldata->links() }}
                      			</tbody>
                    		</table>
                  		</div>
				  		
					</div>

					<div class="tab-pane" id="tabs-bulanan" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4>Activity tab</h4>
								<div >Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet</div>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-2">
                  					<label class="form-label">Pilih Tanggal :</label>
                  					<input type="month" class="form-control">
                				</div>
              				</div>
						</div>
						<div class="card-body border-bottom py-3">
	                    	<div class="d-flex">
                      			<div class="text-muted">
                        			Show
                        			<div class="mx-2 d-inline-block">
                          				<input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        			</div>
                        			entries
                      			</div>
                      			<div class="ms-auto text-muted">
                        			Search:
                        			<div class="ms-2 d-inline-block">
                          				<input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                        			</div>
                      			</div>
                    		</div>
                  		</div>

				  		<div class="table-responsive">
                    		<table class="table card-table table-vcenter text-nowrap datatable">
                      			<thead>
                        			<tr>
                          				<th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 15l6 -6l6 6"></path></svg>
                          				</th>
                          				<th>Invoice Subject</th>
                          				<th>Invoice Subject</th>
                          				<th>Price</th>
                          				<th></th>
                        			</tr>
                      			</thead>
                      			<tbody>
                        			<tr>
                          				<td><span class="text-muted">001402</span></td>
										<td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                          				<td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                          				<td>$1200</td>
                          				<td class="text-end">
                            				<a href="#" class="btn">
	                                			Edit
                              				</a>
							  				<a href="#" class="btn">
	                                			Edit
                              				</a>
                          				</td>
                        			</tr>
                      			</tbody>
                    		</table>
                  		</div>
				  		<div class="card-footer d-flex align-items-center">
                    		<p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
							<ul class="pagination m-0 ms-auto">
                      			<li class="page-item disabled">
                        			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                          				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>
                          					prev
                        			</a>
                      			</li>
                      			<li class="page-item"><a class="page-link" href="#">1</a></li>
                      			<li class="page-item active"><a class="page-link" href="#">2</a></li>
                      			<li class="page-item"><a class="page-link" href="#">3</a></li>
                      			<li class="page-item"><a class="page-link" href="#">4</a></li>
                      			<li class="page-item"><a class="page-link" href="#">5</a></li>
                      			<li class="page-item">
                        			<a class="page-link" href="#">
                          				next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                          				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>
                        			</a>
                      			</li>
                    		</ul>
                  		</div>
					</div>

					<div class="tab-pane" id="tabs-kalender" role="tabpanel">
						<div class="row">
							<div class="col-lg-8">
								<h4>Activity tab</h4>
								<div >Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet</div>
							</div>	
							<div class="col-lg-4">
                				<div class="mb-2">
                  					<label class="form-label">Pilih Tanggal :</label>
                  					<input type="date" class="form-control">
                				</div>
              				</div>
						</div>
						<div class="card-body border-bottom py-3">
	                    	<div class="d-flex">
                      			<div class="text-muted">
                        			Show
                        			<div class="mx-2 d-inline-block">
                          				<input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        			</div>
                        			entries
                      			</div>
                      			<div class="ms-auto text-muted">
                        			Search:
                        			<div class="ms-2 d-inline-block">
                          				<input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                        			</div>
                      			</div>
                    		</div>
                  		</div>

				  		<div class="table-responsive">
                    		<table class="table card-table table-vcenter text-nowrap datatable">
                      			<thead>
                        			<tr>
                          				<th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 15l6 -6l6 6"></path></svg>
                          				</th>
                          				<th>Invoice Subject</th>
                          				<th>Invoice Subject</th>
                          				<th>Price</th>
                          				<th></th>
                        			</tr>
                      			</thead>
                      			<tbody>
                        			<tr>
                          				<td><span class="text-muted">001402</span></td>
										<td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                          				<td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                          				<td>$1200</td>
                          				<td class="text-end">
                            				<a href="#" class="btn">
	                                			Edit</a>
							  				<a href="#" class="btn">
	                                			Edit
                              				</a>
                          				</td>
                        			</tr>
                      			</tbody>
                    		</table>
                  		</div>
				  		<div class="card-footer d-flex align-items-center">
                    		<p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
							<ul class="pagination m-0 ms-auto">
                      			<li class="page-item disabled">
                        			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                          				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>
                          					prev
                        			</a>
                      			</li>
                      			<li class="page-item"><a class="page-link" href="#">1</a></li>
                      			<li class="page-item active"><a class="page-link" href="#">2</a></li>
                      			<li class="page-item"><a class="page-link" href="#">3</a></li>
                      			<li class="page-item"><a class="page-link" href="#">4</a></li>
                      			<li class="page-item"><a class="page-link" href="#">5</a></li>
                      			<li class="page-item">
                        			<a class="page-link" href="#">
                          				next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                          				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>
                        			</a>
                      			</li>
                    		</ul>
                  		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Include DataTables CSS and JS files -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
	$(document).ready(function() {
    // Initialize DataTable
    var table = $('#table-harian').DataTable({
        // DataTable options...
		"lengthMenu": [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ]
		
    });
	$('#dateInput').on('change', function() {
        var selectedDate = $(this).val();
        if (selectedDate) {
            // Filter DataTable based on selected date (column index 3)
            table.column(3).search(moment(selectedDate).format('DD MMMM YYYY')).draw();
        } else {
            // If no date is selected, clear the DataTable filter
            table.column(3).search('').draw();
        }
    });

	$('.dataTables_length select').addClass('form-select form-select-sm mx-2 d-inline-block');
	$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');
	


    // Create wrapper div for card-body
    var cardBodyWrapper = $('<div class="card-body border-top py-3"></div>');

    // Create wrapper div for d-flex
    var dFlexWrapper = $('<div class="d-flex"></div>');

    // Create wrapper div for text-muted
    var textMutedWrapper = $('<div class="text-muted"></div>');

    // Create wrapper div for ms-auto text-muted
    var msAutoTextMutedWrapper = $('<div class="ms-auto text-muted"></div>');

    // Move dataTables_length and dataTables_filter inside d-flex wrapper
    $('.dataTables_length').appendTo(textMutedWrapper);
    $('.dataTables_filter').appendTo(msAutoTextMutedWrapper);

    // Append text-muted wrapper inside d-flex wrapper
    dFlexWrapper.append(textMutedWrapper);

    // Append ms-auto text-muted wrapper inside d-flex wrapper
    dFlexWrapper.append(msAutoTextMutedWrapper);

    // Append d-flex wrapper inside card-body wrapper
    cardBodyWrapper.append(dFlexWrapper);

    // Append card-body wrapper after the DataTable
    $('#table-harian').before(cardBodyWrapper);



	// Select the .dataTables_paginate element
    var paginateContainer = $('#table-harian_paginate');

    // Iterate over each <span> tag within the .dataTables_paginate element
    paginateContainer.find('span').each(function() {
        // Move contents outside the <span> element
        $(this).replaceWith($(this).contents());
		
    });  

	



	$('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');
	table.on('draw.dt', function() {
        $('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');
    });
	$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');


    // Create wrapper div for card-body
    var cardFooterWrapper = $('<div class="card-footer d-flex align-items-center"></div>');

    // Create wrapper div for d-flex
    var dFlexWrapper = $('<div class="d-flex"></div>');

    // Create wrapper div for text-muted
    var textMutedFooterWrapper = $('<p class="m-0 text-muted"></p>');

    // Create wrapper div for ms-auto text-muted
    var msAutoTextMutedFooterWrapperLi = $('<li class="page-item"></li>');
    var msAutoTextMutedFooterWrapper = $('<ul class="pagination dataTables_paginate paging_simple_numbers m-0 ms-auto" id="table-harian_paginate"></ul>');


    // Move dataTables_length and dataTables_filter inside d-flex wrapper
    $('.dataTables_info').appendTo(textMutedFooterWrapper);
    $('.dataTables_paginate').appendTo(msAutoTextMutedFooterWrapper);
    // $('.dataTables_paginate .paginate_button previous').appendTo(msAutoTextMutedFooterWrapperLi);
    // $('.dataTables_paginate .paginate_button next').appendTo(msAutoTextMutedFooterWrapperLi);

    msAutoTextMutedFooterWrapperLi.append(msAutoTextMutedFooterWrapper);

    // Append text-muted wrapper inside d-flex wrapper
    cardFooterWrapper.append(textMutedFooterWrapper);

    // Append ms-auto text-muted wrapper inside d-flex wrapper
    cardFooterWrapper.append(msAutoTextMutedFooterWrapper);

    // Append d-flex wrapper inside card-body wrapper

    // Append card-body wrapper after the DataTable
    $('#table-harian').after(cardFooterWrapper);

	var paginationList = $('<ul class="pagination m-0 ms-auto"></ul>');
    var paginateContainer = $('div.dataTables_paginate');

    // Iterate over each <a> element within the paginateContainer
    paginateContainer.find('a').each(function() {
        // Create a new <li> element and wrap the current <a> element with it
        var liElement = $('<li class="page-item"></li>').append($(this));
        
        // Append the wrapped <li> element to the paginationList
        paginationList.append(liElement);
    });

    // Replace the paginateContainer with the paginationList
    paginateContainer.replaceWith(paginationList);

	


});



// <script>
// 	$(document).ready(function() {
//     // Initialize DataTable
//     var table2 = $('#table-mingguan').DataTable({
//         // DataTable options...
// 		"lengthMenu": [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ]
		
//     });
// 	$('#dateInput').on('change', function() {
//         var selectedDate = $(this).val();
//         if (selectedDate) {
//             // Filter DataTable based on selected date (column index 3)
//             table2.column(3).search(moment(selectedDate).format('DD MMMM YYYY')).draw();
//         } else {
//             // If no date is selected, clear the DataTable filter
//             table2.column(3).search('').draw();
//         }
//     });

// 	$('.dataTables_length select').addClass('form-select form-select-sm mx-2 d-inline-block');
// 	$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');
	


//     // Create wrapper div for card-body
//     var cardBodyWrapper2 = $('<div class="card-body border-top py-3"></div>');

//     // Create wrapper div for d-flex
//     var dFlexWrapper2 = $('<div class="d-flex"></div>');

//     // Create wrapper div for text-muted
//     var textMutedWrapper2 = $('<div class="text-muted"></div>');

//     // Create wrapper div for ms-auto text-muted
//     var msAutoTextMutedWrapper2 = $('<div class="ms-auto text-muted"></div>');

//     // Move dataTables_length and dataTables_filter inside d-flex wrapper
//     $('.dataTables_length').appendTo(textMutedWrapper2);
//     $('.dataTables_filter').appendTo(msAutoTextMutedWrapper2);

//     // Append text-muted wrapper inside d-flex wrapper
//     dFlexWrapper2.append(textMutedWrapper2);

//     // Append ms-auto text-muted wrapper inside d-flex wrapper
//     dFlexWrapper2.append(msAutoTextMutedWrapper2);

//     // Append d-flex wrapper inside card-body wrapper
//     cardBodyWrapper2.append(dFlexWrapper2);

//     // Append card-body wrapper after the DataTable
//     $('#table-mingguan').before(cardBodyWrapper2);



// 	// Select the .dataTables_paginate element
//     var paginateContainer2 = $('#table-mingguan_paginate');

//     // Iterate over each <span> tag within the .dataTables_paginate element
//     paginateContainer2.find('span').each(function() {
//         // Move contents outside the <span> element
//         $(this).replaceWith($(this).contents());
		
//     });  

	



// 	$('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');
// 	table2.on('draw.dt', function() {
//         $('.dataTables_paginate .paginate_button').addClass('page-link').removeClass('disabled');
//     });
// 	$('.dataTables_filter input').addClass('form-control form-control-sm ms-2 d-inline-block');


//     // Create wrapper div for card-body
//     var cardFooterWrapper2 = $('<div class="card-footer d-flex align-items-center"></div>');

//     // Create wrapper div for d-flex
//     var dFlexWrapper2 = $('<div class="d-flex"></div>');

//     // Create wrapper div for text-muted
//     var textMutedFooterWrapper2 = $('<p class="m-0 text-muted"></p>');

//     // Create wrapper div for ms-auto text-muted
//     var msAutoTextMutedFooterWrapperLi2 = $('<li class="page-item"></li>');
//     var msAutoTextMutedFooterWrapper2 = $('<ul class="pagination dataTables_paginate paging_simple_numbers m-0 ms-auto" id="table-harian_paginate"></ul>');


//     // Move dataTables_length and dataTables_filter inside d-flex wrapper
//     $('.dataTables_info').appendTo(textMutedFooterWrapper2);
//     $('.dataTables_paginate').appendTo(msAutoTextMutedFooterWrapper2);
//     // $('.dataTables_paginate .paginate_button previous').appendTo(msAutoTextMutedFooterWrapperLi);
//     // $('.dataTables_paginate .paginate_button next').appendTo(msAutoTextMutedFooterWrapperLi);

//     msAutoTextMutedFooterWrapperLi2.append(msAutoTextMutedFooterWrapper2);

//     // Append text-muted wrapper inside d-flex wrapper
//     cardFooterWrapper2.append(textMutedFooterWrapper2);

//     // Append ms-auto text-muted wrapper inside d-flex wrapper
//     cardFooterWrapper2.append(msAutoTextMutedFooterWrapper2);

//     // Append d-flex wrapper inside card-body wrapper

//     // Append card-body wrapper after the DataTable
//     $('#table-mingguan').after(cardFooterWrapper2);

// 	var paginationList2 = $('<ul class="pagination m-0 ms-auto"></ul>');
//     var paginateContainer2 = $('div.dataTables_paginate');

//     // Iterate over each <a> element within the paginateContainer
//     paginateContainer2.find('a').each(function() {
//         // Create a new <li> element and wrap the current <a> element with it
//         var liElement2 = $('<li class="page-item"></li>').append($(this));
        
//         // Append the wrapped <li> element to the paginationList
//         paginationList2.append(liElement2);
//     });

//     // Replace the paginateContainer with the paginationList
//     paginateContainer2.replaceWith(paginationList2);

	


// });

</script>

<script>
      document.addEventListener("DOMContentLoaded", function() {
      const list = new List('table-default', {
      	sortClass: 'table-sort',
      	listClass: 'table-tbody',
      	valueNames: [ 'sort-name', 'sort-type', 'sort-city', 'sort-score',
      		{ attr: 'data-date', name: 'sort-date' },
      		{ attr: 'data-progress', name: 'sort-progress' },
      		'sort-quantity'
      	]
      });
      })
    </script>
@endsection