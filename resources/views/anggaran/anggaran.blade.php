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
          	Tambah Catatan
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
            <div class="card" style="height: 38rem">
                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                    <div class="divide-y">
                    @foreach($combinedDataAnggaran as $data)
                        <div>
                            <div class="row">
                                <div class="col d-flex justify-content-between">
                                   
                                        <p class="mb-3">{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}</p>
                                    <span class="">
                                        <strong>sdfsdf</strong>
                                        <strong>/</strong>
                                        <strong class="text-end kategori-total" data-kategori-id="{{$data['id_kategori_pengeluaran']}}">Rp. {{ number_format(floatval($data['anggaran']), 0, ',', '.')}}</strong>

                                    </span>
                                </div>
                                <div class=""></div>
                                
                            </div>
                            <div class="progress progress-separated mb-3">
                                <div class="progress-bar bg-primary" id="progressbar-{{$data['id_kategori_pengeluaran']}}"role="progressbar" style="width: 0%" aria-label="Regular"></div>
                            </div>
                            <div class="row">
                                <!-- "Tersisa" at the start -->
                                <div class="col-auto d-flex align-items-center pe-2">
                                    <span class="legend me-2 bg-primary"></span>
                                    <span id="dipakai-{{$data['id_kategori_pengeluaran']}}">ss</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted dipakai"></span>
                                </div>

                                <!-- "Dipakai" in the middle -->
                                <div class="col-auto d-flex align-items-center ps-2">
                                    <span class="legend me-2"></span>
                                    <span id="tersisa-{{$data['id_kategori_pengeluaran']}}">ss</span>
                                    <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted tersisa"></span>
                                </div>

                                <div class="col-auto d-flex align-items-center ps-2 overspend" >
                                    <span class="legend me-2 bg-danger" id="overspendDiv-{{$data['id_kategori_pengeluaran']}}" style=""></span>
                                    <span id="overspend-{{$data['id_kategori_pengeluaran']}}" style="">Overspend</span>
                                    
                                </div>

                                <div class="col-auto d-flex align-items-center ps-2 terpenuhi" >
                                    <span class="legend me-2 bg-green" id="terpenuhiDiv-{{$data['id_kategori_pengeluaran']}}" style=""></span>
                                    <span id="terpenuhi-{{$data['id_kategori_pengeluaran']}}" style="">Terpenuhi</span>
                                    
                                </div>
                                
                                <!-- Buttons at the end -->
                                <div class="col d-flex justify-content-end align-items-center">
                                    <a href="" class="pe-2 text-yellow btn-kategori" data-bs-toggle="modal" data-bs-target="#modal-anggaran" data-kategori-id="{{$data['id_kategori_pengeluaran']}}" data-kategori-nama="{{$data['kategori_pengeluaran']['nama_kategori_pengeluaran']}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>


                                    </a>
                                    <a href="" class="text-red btn-hps-kategori" data-kategori-id="{{$data['id_kategori_pengeluaran']}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7h16"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path><path d="M10 12l4 4m0 -4l-4 4"></path></svg>

                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

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
                                        @foreach($kategoriPengeluaranData as $kategori)
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
                              			<input type="text" id="jumlah" oninput="updateFormattedNumber()" name="jumlah" class="form-control text-end" autocomplete="off" required>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
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