@extends('layouts.tabler')

@section('title', 'Portofolio')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Portofolio
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Tambah Catatan
      	</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>   
		    
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row justify-content-between">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body pb-0 mb-0">
                    <div class="row">
                        <div class="col-7">
                            <h4>Valuasi Saat Ini :</h4>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control pb-0 pt-0" style="padding-left:0.25rem; padding-right:0.25rem" autocomplete="off" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <h4>Jumlah Unit Penyertaan :</h4>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control pb-0 pt-0" style="padding-left:0.25rem; padding-right:0.25rem" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <h4>Harga Unit :</h4>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control pb-0 pt-0" style="padding-left:0.25rem; padding-right:0.25rem" autocomplete="off" disabled>
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
                                <td class="fw-bold" colspan="2">KAS</td>
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
                            @foreach($portoData as $porto)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td style="width:1%"><span class="avatar avatar-xs" style="background-image: url({{$porto['saham']['pic']}}); --tblr-avatar-size:1.3rem;"></span></td>
                                <td>&nbsp{{$porto['saham']['nama_saham']}}</td>
                                <td class="text-end">{{$porto['volume_beli']}}</td>
                                <td class="text-end"hidden>1</td>
                                <td class="text-end">{{ number_format(floatval($porto['pembelian']), 0, ',', '.')}}</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end">{{ number_format(floatval($porto['pembelian']), 0, ',', '.')}}</td>
                                <td class="text-end">{{ number_format(floatval($porto['pembelian']), 0, ',', '.')}}</td>
                                <td class="text-end">test</td>
                                <td class="text-end" hidden>1</td>
                                <td class="text-end" hidden>1</td>
                                <td style="width:1%" class="text-center">
                                    <span class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-green w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-yellow w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-red w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
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
                                <select name="saham" type="text" class="form-select" id="select-people" value="">
                                    <option value="" selected>Pilih Saham</option>
                                    @foreach($sahamData as $saham)
                                    <option value="{{$saham['id_saham']}}" data-custom-properties="&lt;span class=&quot;avatar avatar-xs&quot; style=&quot;background-image: url({{$saham['pic']}})&quot;&gt;&lt;/span&gt;">{{$saham['nama_saham']}} - {{$saham['nama_perusahaan']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Beli: </label>
                                <input type="date" name="tanggalbeli" id="tanggalbeli" class="form-control" value="{{ now()->format('Y-m-d') }}">
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
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off">
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
                                    <input type="text" id="avgprice1" name="avgprice1" class="form-control text-end" autocomplete="off">
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
                          
<script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062" defer></script>
  
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