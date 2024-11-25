@extends('layouts.user')

@section('title', 'Saldo')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Saldo
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="#" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-saldo">
            Top Up
		</a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
		</a>    
		<a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-withdraw">
          	Withdraw
      	</a>
        <a href="#" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-saldo" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a> 
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h3>Riwayat Saldo</h3>
                    </div>
                    <div class="col-6 text-end">
                        <h3>Jumlah : Rp. 35.000.000 </h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:1%" class="text-center">1</td>
                                <td style="width:15%">11 September 2024</td>
                                <td class="text-center" style="width:5%">
                                    <a href="#" class="btn btn-sm btn-success btn-pill ms-auto">
                                        Saldo
                                    </a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
Rp. 
                                        </div>
                                        <div class="col-6 text-end">
                                    Rp 50.000.000        
                                        </div>
                                    </div>
                                    
                                </td>
                                <td style="width:10%" class="text-center">-</td>
                                <td style="width:1%" class="text-center">
                                    <span class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:1%" class="text-center">2</td>
                                <td style="width:15%">11 September 2024</td>
                                <td class="text-center" style="width:5%">
                                    <a href="#" class="btn btn-sm btn-danger btn-pill ms-auto">
                                        Withdraw
                                    </a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
Rp. 
                                        </div>
                                        <div class="col-6 text-end">
                                    Rp 15.000.000        
                                        </div>
                                    </div>
                                    
                                </td>
                                <td style="width:10%" class="text-center">-</td>
                                <td style="width:1%" class="text-center">
                                    <span class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
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
<!-- Modal Saldo -->
<div class="modal modal-blur fade" id="modal-saldo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Top Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portofolioStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Pilih Jenis Top Up:</label>
                                <select class="form-select" value="" required>
                                    <option value="" selected>Pilih Jenis</option>
                                    <option value="masuk">Top Up Saldo</option>
                                    <option value="dividen">Top Up Dividen</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal: </label>
                                <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Jumlah </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" required>
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="1Jt" class="btn btn-secondary ms-auto">
                                    1Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="5Jt" class="btn btn-secondary ms-auto">
                                    5Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="10Jt" class="btn btn-secondary ms-auto">
                                    10Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="15Jt" class="btn btn-secondary ms-auto">
                                    15Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="20Jt" class="btn btn-secondary ms-auto">
                                    20Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="50Jt" class="btn btn-secondary ms-auto">
                                    50Jt
                                </button>
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

<!-- Modal Saldo -->
<div class="modal modal-blur fade" id="modal-withdraw" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Withdraw</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('portofolioStore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Jumlah </label>
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
                    <div class="row">
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="1Jt" class="btn btn-secondary ms-auto">
                                    1Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="5Jt" class="btn btn-secondary ms-auto">
                                    5Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="10Jt" class="btn btn-secondary ms-auto">
                                    10Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="15Jt" class="btn btn-secondary ms-auto">
                                    15Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="20Jt" class="btn btn-secondary ms-auto">
                                    20Jt
                                </button>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <button id="50Jt" class="btn btn-secondary ms-auto">
                                    50Jt
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-danger ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Simpan
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