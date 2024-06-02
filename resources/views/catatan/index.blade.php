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
			<form action="./" method="get" autocomplete="off" novalidate="" class="sticky-top">
				<div class="form-label">Job Types</div>
				<div class="mb-4">
                    <label class="form-check">
						<input type="checkbox" class="form-check-input" name="form-type[]" value="1" checked="">
                      	<span class="form-check-label">Programming</span>
                    </label>
                    <label class="form-check">
						<input type="checkbox" class="form-check-input" name="form-type[]" value="2" checked="">
                      	<span class="form-check-label">Design</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="3">
                      <span class="form-check-label">Management / Finance</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="4">
                      <span class="form-check-label">Customer Support</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="5">
                      <span class="form-check-label">Sales / Marketing</span>
                    </label>
                  </div>
                  <div class="form-label">Remote</div>
                  <div class="mb-4">
                    <label class="form-check form-switch">
                      <input class="form-check-input" type="checkbox">
                      <span class="form-check-label form-check-label-on">On</span>
                      <span class="form-check-label form-check-label-off">Off</span>
                    </label>
                  </div>
                  <div class="form-label">Salary Range</div>
                  <div class="mb-4">
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="1" checked="">
                      <span class="form-check-label">$20K - $50K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="2" checked="">
                      <span class="form-check-label">$50K - $100K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="3">
                      <span class="form-check-label">&gt; $100K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="4">
                      <span class="form-check-label">Drawing / Painting</span>
                    </label>
                  </div>
                  <div class="form-label">Immigration</div>
                  <div class="mb-4">
                    <label class="form-check form-switch">
                      <input class="form-check-input" type="checkbox">
                      <span class="form-check-label form-check-label-on">On</span>
                      <span class="form-check-label form-check-label-off">Off</span>
                    </label>
                    <div class="small text-muted">Only show companies that can sponsor a visa</div>
                  </div>
                  <div class="form-label">Location</div>
                  <div class="mb-4">
                    <select class="form-select">
                      <option>Anywhere</option>
                      <option>London</option>
                      <option>San Francisco</option>
                      <option>New York</option>
                      <option>Berlin</option>
                    </select>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-primary w-100">
                      Confirm changes
                    </button>
                    <a href="#" class="btn btn-link w-100">
                      Reset to defaults
                    </a>
                  </div>
                </form>
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
					<div class="h3 text-muted">Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Total Period Expenses</div>
					</div>
					<div class="h3 text-red">- Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-1">
						<div class="subheader">Total Period Income</div>
					</div>
					<div class="h3 text-green">+ Rp. {{ number_format(floatval(1000000), 0, ',', '.')}}</div>
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
										<div class="row  mt-2 text-muted">
											<div class="col">
											<strong>{{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}</strong>

											</div>
											<div class="col-auto me-2">
											@if ($item['total_jumlah'] < 0)
        <strong class="">- Rp. {{ number_format(abs(floatval($item['total_jumlah'])), 0, ',', '.') }}</strong>
    @else
        <strong class="">+ Rp. {{ number_format(floatval($item['total_jumlah']), 0, ',', '.') }}</strong>
    @endif
											</div>
										</div>
</td>
</tr>
										@php $first = false; @endphp <!-- Update the flag after displaying the date -->
        @endif
										
		<tr>
									<td class="p-0">

								<div class="card mb-0">
									<div class="row g-0">
										
										<div class="col">
											<div class="card-body">
												@if(isset($item['id_pemasukan']))
												<div class="row">
													<div class="col-md">
														<div class="list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
																<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#00ff00"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
																
																{{$item['kategori_pemasukan']['nama_kategori_pemasukan']}}
																



															</div>
															@if(isset($item['catatan']))
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
															{{ \Illuminate\Support\Str::limit($item['catatan'], 50, '...') }}
															</div>
															@else
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
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
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
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
                      Documentation
                    </a>
                    <a class="dropdown-item" href="./changelog.html">
                      Changelog
                    </a>
                  </div>


														</div>
													</div>
												</div>
												@else
												<div class="row">
													<div class="col-md">
														<div class="list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
															
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
															<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#ff0000"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar icon-inline"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M13 17h-7v-14h-2" /><path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
																{{$item['kategori_pengeluaran']['nama_kategori_pengeluaran']}}
															</div>
															@if(isset($item['catatan']))
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
															{{ \Illuminate\Support\Str::limit($item['catatan'], 50, '...') }}
															</div>
															@else
															<div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
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
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
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
                      Documentation
                    </a>
                    <a class="dropdown-item" href="./changelog.html">
                      Changelog
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




<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<!-- <script>
		document.addEventListener('DOMContentLoaded', function() {
    // Attach event listeners to all radio buttons with the class 'pemasukan-radio' and 'pengeluaran-radio'
    document.querySelectorAll('.pemasukan-radio, .pengeluaran-radio').forEach(radio => {
        radio.addEventListener('change', function() {
            updateSelectOptions1(this);
        });
    });

    function updateSelectOptions1(radioElement) {
        // Find the closest modal and its select element
        var modal = radioElement.closest('.modal');
        var selectElement = modal.querySelector('.kategoriedit');

        // Clear existing options
        selectElement.innerHTML = ''; 

        // Add appropriate options based on the selected radio button
        if (radioElement.classList.contains('pemasukan-radio')) {
            selectElement.innerHTML += '<option value="1">Uang Saku</option>';
            selectElement.innerHTML += '<option value="2">Upah</option>';
            selectElement.innerHTML += '<option value="3">Bonus</option>';
            selectElement.innerHTML += '<option value="3">Lainnya</option>';
        } else if (radioElement.classList.contains('pengeluaran-radio')) {
            selectElement.innerHTML += '<option value="1">Makanan</option>';
            selectElement.innerHTML += '<option value="2">Minuman</option>';
            selectElement.innerHTML += '<option value="3">Tagihan</option>';
            selectElement.innerHTML += '<option value="4">Shopping</option>';
            selectElement.innerHTML += '<option value="5">Kesehatan & Olahraga</option>';
            selectElement.innerHTML += '<option value="6">Lainnya</option>';
        }

        selectElement.disabled = false;
    }
});

	</script> -->
	
<script>
// Function to format the number with thousands separator
// Function to format number with dots as thousand separators
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
    setUnformattedValueToInput1(inputElement); // Pass the input element directly
}

// Function to set the unformatted value to the hidden input field jumlah1
function setUnformattedValueToInput1(inputElement) {
    var unformattedValue = inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    var jumlah1Input = inputElement.parentElement.querySelector('#jumlah1edit');
    if (jumlah1Input) { // Ensure the hidden input exists
        jumlah1Input.value = unformattedValue; // Set the unformatted value to the input field jumlah1
    }
}

// Function to get the unformatted value from the data attribute
function getUnformattedValue1() {
    var inputElement = document.getElementById('jumlahedit');
    var unformattedValue = inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    return unformattedValue;
}

// Attach event listeners to the input fields to trigger formatting as the user types
document.querySelectorAll('.form-control.text-end').forEach(input => {
    input.addEventListener('input', updateFormattedNumber1);
});

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

            console.log(id, jenis, jumlah, kategori, tanggal, catatan, createdat); // Log the extracted data

            // Find the corresponding modal by ID
            const modal = document.getElementById(`modal-edit${id}`);
            
            if (!modal) {
                console.error(`Modal not found for ID: ${id}`);
                return;
            }

            // Populate input fields in the modal
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
		$('#loadingIndicator').hide();
		
    	
		var table = $('#table-harian').DataTable({
			"lengthMenu": [ [5, 10, 25, 50, 100], [5, 10, 25, 50, 100] ],
			"pageLength": 100,
			"ordering": false,  // Disable sorting
        "lengthChange": false,  // Hide the length menu
        "searching": false,  // Hide the search box
        "paging": false,  // Hide the search box
        "info": false,  // Hide the search box
			initComplete: function(settings, json) {
            $('#table-harian').css('display', 'table');
			$('#table-harian th.sorting_disabled').remove();
        },
        "drawCallback": function(settings) {
			$('#table-harian th.sorting_disabled').remove();
        }
    	});
	
		
	});
</script>

@endsection
