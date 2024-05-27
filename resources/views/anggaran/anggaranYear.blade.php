@extends('layouts.tabler')

@section('title', 'Anggaran')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Anggaran
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-anggaran">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Create Budget
      	</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-anggaran" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>       
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card" style="height: 31.2rem">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaranWeek') }}" class="nav-link" aria-selected="true" role="tab">Week</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaranMonth') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Month</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaranYear') }}" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">Year</a>
                        </li>
                        <li class="nav-item ms-auto">
                            <a class="nav-link disabled text-muted" href="#">
                                {{$dateYear}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                    <div class="divide-y">
                        @if(isset($combinedAnggaranData['Tahunan']))
                            @foreach($combinedAnggaranData['Tahunan'] as $data)
                                @php
                                    // Calculate overspend and remaining values
                                    $totalJumlah = floatval($data['total_jumlah']);
                                    $anggaran = floatval($data['anggaran']);
                                    $overspend = ($totalJumlah > $anggaran) ? ($totalJumlah - $anggaran) : 0;
                                    $remaining = ($anggaran > $totalJumlah) ? ($anggaran - $totalJumlah) : 0;
                                @endphp
                                <div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-3">{{$data['nama_kategori_pengeluaran']}}</p>
                                                <a href="#" class="ps-2 text-green btn-kategori" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-edit-anggaran{{$data['id_anggaran']}}"
                                                    data-id="{{ $data['id_anggaran'] }}"
                                                    data-id-kategori-pengeluaran="{{ $data['id_kategori_pengeluaran'] }}"
                                                    data-nama="{{ $data['nama_kategori_pengeluaran'] }}"
                                                    data-anggaran="{{ $data['anggaran'] }}"
                                                    data-jumlah="{{ $data['total_jumlah'] }}"
                                                    data-tersisa="{{ $remaining }}"
                                                    data-overspend="{{ $overspend }}"
                                                    data-periode="{{ $data['periode'] }}">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-info-square"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9h.01" /><path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" /><path d="M11 12h1v4h1" /></svg>
                                                </a>
                                                <a class="ps-2 text-red btn-delete" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-danger{{$data['id_anggaran']}}" 
                                                    data-nama="{{ $data['nama_kategori_pengeluaran'] }}" 
                                                    data-id="{{$data['id_anggaran']}}">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </a>
                                            </div>
                                            <span>
                                                @if($data['kategori_pengeluaran']->isNotEmpty())
                                                    <strong>Rp. {{ number_format(floatval($data['total_jumlah']), 0, ',', '.') }}</strong>
                                                @else
                                                    <strong>Rp. 0</strong>
                                                @endif
                                                <strong>/</strong>
                                                <strong class="text-end kategori-total me-1" >Rp. {{ number_format(floatval($data['anggaran']), 0, ',', '.')}}</strong>
                                                @php
                                                    $progressPercentage = ($data['anggaran'] > 0) ? ($data['total_jumlah'] / $data['anggaran']) * 100 : 0;
                                                @endphp
                                                <strong class="text-end kategori-total text-muted">({{ number_format($progressPercentage, 2) }}%)</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        @php
                                            $progressPercentage = ($data['anggaran'] > 0) ? ($data['total_jumlah'] / $data['anggaran']) * 100 : 0;
                                            $progressClass = $data['total_jumlah'] > $data['anggaran'] ? 'bg-danger' : 'bg-primary';
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }}" id="progressbar" role="progressbar" style="width: {{ $progressPercentage }}%" aria-label="Regular"></div>
                                    </div>
                                </div>
                                <!-- Modal Edit Budget -->
                                <div class="modal modal-blur fade" id="modal-edit-anggaran{{$data['id_anggaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Budget<span id="modaledittitle_{{$data['id_anggaran']}}" name="modaledittitle"> </span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('updateAnggaran', ['id'=> $data['id_anggaran']]) }}" method="post" autocomplete="off">
                                                @csrf
                                                
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_anggaran_{{$data['id_anggaran']}}" name="jumlahanggaran" class="form-control text-strong text-warning border-warning mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_anggaran_{{$data['id_anggaran']}}" class="form-label text-black">Used :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_tersisa_{{$data['id_anggaran']}}" name="jumlahtersisa" class="form-control text-strong text-success border-success mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_tersisa_{{$data['id_anggaran']}}" class="form-label text-black">Remaining :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_overspend_{{$data['id_anggaran']}}" name="jumlahoverspend" class="form-control text-strong text-danger border-danger mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_overspend_{{$data['id_anggaran']}}" class="form-label text-black">Overspend :</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <input type="text" id="id_{{$data['id_anggaran']}}" name="id" value="{{$data['id_anggaran']}}" class="form-control text-end" autocomplete="off" hidden>
                                                            <div class="mb-3">
                                                                <label class="form-label">Kategori Pengeluaran:</label>
                                                                <select id="id_kategori_pengeluaran_edit_{{$data['id_anggaran']}}" name="id_kategori_pengeluaran_edit" class="form-select">
                                                                    <option value="" selected>Pilih Kategori</option>
                                                                    @foreach($kategoriData as $kategori)
                                                                        <option value="{{$kategori['id_kategori_pengeluaran']}}">{{$kategori['nama_kategori_pengeluaran']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Jumlah : </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Rp.</span>
                                                                    <input type="text" id="jumlah_edit_{{$data['id_anggaran']}}" oninput="updateFormattedNumberAnggaran({{$data['id_anggaran']}})" name="jumlahedit" class="form-control text-end" autocomplete="off" required>
                                                                    <input type="text" id="jumlah1_edit_{{$data['id_anggaran']}}" name="jumlah1edit" class="form-control text-end" autocomplete="off" hidden>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Periode :</label>
                                                                <select id="periodeedit_{{$data['id_anggaran']}}" name="periodeedit" class="form-select">
                                                                    <option value="" selected>Pilih Periode</option>
                                                                    <option value="Mingguan">Mingguan</option>
                                                                    <option value="Tahunan">Tahunan</option>
                                                                    <option value="Bulanan">Bulanan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary ms-auto">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Edit Budget -->
                                <!-- Modal Delete Budget -->
                                <div class="modal modal-blur fade" id="modal-danger{{$data['id_anggaran']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-status bg-danger"></div>
                                            <div class="modal-body text-center py-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                                <h3>Apakah anda yakin?</h3>
                                                <div class="text-muted">Apakah anda  catatan ini?<span >{{$data['nama_kategori_pengeluaran']}}</span></div>
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
                                                            <form method="POST" action="{{route('hapusAnggaran', ['id' => $data['id_anggaran']] )}}">
                                                                @csrf
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
                                <!-- End of Modal Delete Budget -->
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center pe-2">
                            <span class="legend me-2 bg-primary"></span>
                            <span id="inlimit">In limit</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"></span>
                        </div>

                        <div class="col-auto d-flex align-items-center ps-2" >
                            <span class="legend me-2 bg-danger" id="overspend"></span>
                            <span id="overspend">Overspend</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Budget -->
<div class="modal modal-blur fade" id="modal-anggaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('anggaranstore') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori Pengeluaran:</label>
                                <select id="id_kategori_pengeluaran" name="id_kategori_pengeluaran" class="form-select">
                                    <option value="" selected>Pilih Kategori</option>
                                    @foreach($kategoriData as $kategori)
                                    <option value="{{$kategori['id_kategori_pengeluaran']}}">{{$kategori['nama_kategori_pengeluaran']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Jumlah : </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" oninput="updateFormattedNumberAnggaran()" name="jumlah" class="form-control text-end" autocomplete="off" required>
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Periode :</label>
                                <select id="periode" name="periode" class="form-select">
                                    <option value="" selected>Pilih Periode</option>
                                    <option value="Mingguan" >Mingguan</option>
                                    <option value="Tahunan">Tahunan</option>
                                    <option value="Bulanan">Bulanan</option>
                                </select>
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
<!-- End of Modal Add Budget -->

<script>
    function updateFormattedNumberAnggaran(id) {
        var inputElement = document.getElementById('jumlah_edit_' + id);
        var rawValue = inputElement.value.replace(/\D/g, ''); 
        var formattedValue = formatNumber(rawValue); 
        inputElement.value = formattedValue; 
        inputElement.setAttribute('data-value', rawValue); 
        setUnformattedValueToInputAnggaran(id); 
    }

    function setUnformattedValueToInputAnggaran(id) {
        var unformattedValue = getUnformattedValueAnggaran(id); 
        var inputElement = document.getElementById('jumlah1_edit_' + id);
        inputElement.value = unformattedValue; 
    }
    
    function getUnformattedValueAnggaran(id) {
        var inputElement = document.getElementById('jumlah_edit_' + id);
        var unformattedValue = inputElement.getAttribute('data-value') || ''; 
        return unformattedValue;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");
        const editButtons = document.querySelectorAll('.btn-kategori');
        
        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const id_kategori_pengeluaran = this.getAttribute('data-id-kategori-pengeluaran');
                const nama = this.getAttribute('data-nama');
                const anggaran = this.getAttribute('data-anggaran');
                const periode = this.getAttribute('data-periode');
                const tersisa = this.getAttribute('data-tersisa');
                const jumlah = this.getAttribute('data-jumlah');
                const overspend = this.getAttribute('data-overspend');

                console.log(nama);
                
                document.getElementById('id_' + id).value = id;
                document.getElementById('id_kategori_pengeluaran_edit_' + id).value = id_kategori_pengeluaran;
                document.getElementById('jumlah1_edit_' + id).value = anggaran;
                document.getElementById('jumlah_edit_' + id).value = formatNumber(anggaran);
                document.getElementById('jumlah_anggaran_' + id).value = 'Rp. ' + formatNumber(jumlah);
                document.getElementById('jumlah_tersisa_' + id).value = 'Rp. ' + formatNumber(tersisa);
                document.getElementById('jumlah_overspend_' + id).value = 'Rp. ' + formatNumber(overspend);
                document.getElementById('periodeedit_' + id).value = periode;
                document.getElementById('modaledittitle_' + id).textContent = ' "' + nama + '"';
            });
        });
    });
</script>
@endsection