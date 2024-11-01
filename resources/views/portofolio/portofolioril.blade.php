@extends('layouts.tabler')

@section('title', 'Portofolio')

@section('page-title')
<div class="col">
    <h2 class="page-title">Portofolio</h2>
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
        <a href="" class="btn btn-tabler d-none d-sm-inline-block pe-1" aria-label="Tabler">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
        </a>
        <a href="" class="btn btn-primary d-sm-none btn-icon">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
		</a>    
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Transaksi
      	</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
        <a href="" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Top Up
      	</a>
        <a href="" class="btn btn-danger d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a> 
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row justify-content-between">
        <div class="col-lg-6 text-center">
            <div class="card bg-primary-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Harga Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Jumlah/Unit :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Valuation :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Equity :</h5>   
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>   
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <div class="card bg-teal-lt">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG Start </h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000
                            </h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">IHSG End :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield IHSG :</h5>
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>
                        </div>
                        <div class="col-3">
                            <h5 class="mt-0 mb-0 pt-0 pb-2">Yield :</h5>   
                            <h5 class="mt-0 mb-1 pt-0 pb-2">1000</h5>   
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
                            <tr>
                                <td class="text-center"></td>
                                <td class="fw-bold text-center" colspan="2">KAS</td>
                                <td class="text-end fw-bold" colspan="2">100</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end fw-bold">001</td>
                                <td class="text-end fw-bold">100</td>
                                <td class="text-end fw-bold">10</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end">1</td>
                            </tr>
                            
                            <tr>
                                <td style="width:1%" class="text-center">1</td>
                                <td style="width:1%"><span class="avatar avatar-xs" style="background-image: url(https://s3.goapi.io/logo/ACST.jpg); --tblr-avatar-size:1.3rem;"></span></td>
                                <td style="width:6%">ACST</td>
                                <td class="text-end">1000</td>
                                <td class="text-end"hidden>1</td>
                                <td class="text-end">1000</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end">1000</td>
                                <td class="text-end">1000</td>
                                <td class="text-end">test</td>
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
                <h5 class="modal-title">Tambah Portofolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portofolioStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Pilih Saham:</label>
                                <select name="id_saham" type="text" class="form-select" id="select-people" value="" required>
                                    <option value="" selected>Pilih Saham</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Beli: </label>
                                <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Jumlah Lembar: </label>
                                <div class="input-group">
                                    <input type="number" id="jumlahlembar" name="jumlahlembar" class="form-control text-end" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Avg. Price: </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" oninput="updateFormattedNumberSaham()" name="jumlah" class="form-control text-end" autocomplete="off" required>
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Current Price: </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="avgprice" oninput="updateFormattedNumberAvg()" name="avgprice" class="form-control text-end" autocomplete="off" required>
                                    <input type="text" id="avgprice1" name="avgprice1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
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
                        Tambah Catatan
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>

<script>
    function formatNumberAvg(num) {
        const parts = num.toString().split(".");
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        const decimalPart = parts.length > 1 ? "," + parts[1] : "";
        return integerPart + decimalPart;
    }

    function updateFormattedNumberAvg() {
        var inputElementAvg = document.getElementById('avgprice');
        var rawValueAvg = inputElementAvg.value.replace(/\D/g, ''); // Remove non-numeric characters
        var formattedValueAvg = formatNumberAvg(rawValueAvg); // Format the number
        inputElementAvg.value = formattedValueAvg; // Update the input field with formatted value
        inputElementAvg.setAttribute('data-value', rawValueAvg); // Store unformatted value in a data attribute
        setUnformattedValueToInputAvg(); // Set the unformatted value to the input field jumlah1
    }

    function setUnformattedValueToInputAvg() {
        var unformattedValueAvg = getUnformattedValueAvg(); // Retrieve the unformatted value
        var inputElementAvg = document.getElementById('avgprice1');
        inputElementAvg.value = unformattedValueAvg; // Set the unformatted value to the input field jumlah1
    }
    // Function to get the unformatted value from the data attribute
    function getUnformattedValueAvg() {
        var inputElementAvg = document.getElementById('avgprice');
        var unformattedValueAvg = inputElementAvg.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
        return unformattedValueAvg;
    }
    // Attach event listener to the input field to trigger formatting as the user types
    document.getElementById('avgprice').addEventListener('input', updateFormattedNumberAvg);
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
                    console.log('Custom Properties:', data.customProperties);
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data,escape){
                if( data.customProperties ){
                    console.log('Custom Properties:', data.customProperties);
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