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
          	Buat Anggaran
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
    @foreach($kategoriPengeluaranData as $data)
        @php
            $totalJumlah = 0;
        @endphp

        @foreach($existingAnggaran as $anggaran)
            @if($anggaran['kategori'] == $data['id_kategori_pengeluaran'])
                @php
                    $totalJumlah += $anggaran['jumlah'];
                @endphp
            @endif
        @endforeach

        <div>
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <p class="mb-3">{{$data['nama_kategori_pengeluaran']}}</p>
                    <strong class="text-end">{{ $totalJumlah }} MB</strong>
                </div>
                <div class="progress progress-separated mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 44%" aria-label="Regular"></div>
                </div>
                <div class="row">
                    <div class="col-auto d-flex align-items-center pe-2">
                        <span class="legend me-2 bg-primary"></span>
                        <span>Dipakai</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">{{ $totalJumlah }} MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center ps-2">
                        <span class="legend me-2"></span>
                        <span>Tersisa</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                    </div>
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
                <h5 class="modal-title">Buat Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Kategori :</label>
                            <select class="form-select" id="kategori">
                                <option value="" selected>Pilih Kategori</option>
                                @foreach($kategoriPengeluaranData as $data)
                                    <option value="{{$data['id_kategori_pengeluaran']}}">{{$data['nama_kategori_pengeluaran']}}</option>
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
                                <input type="text" class="form-control" id="jumlah" autocomplete="off">
                            </div>
                        </div>
                    </div>			        
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <button class="btn btn-primary ms-auto" onclick="saveToLocalStorage()" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Buat Anggaran
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    function saveToLocalStorage() {
        // Get the selected kategori and jumlah values
        const selectedKategori = document.querySelector('#kategori').value;
        const jumlah = document.querySelector('#jumlah').value;

        // Validate the inputs
        if (!selectedKategori || !jumlah) {
            alert('Mohon lengkapi form.');
            return;
        }

        // Create an object to store the values
        const anggaran = {
            kategori: selectedKategori,
            jumlah: jumlah
        };

        // Retrieve existing anggaran from local storage
        let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');

        // Ensure existingAnggaran is an array
        if (!Array.isArray(existingAnggaran)) {
            existingAnggaran = [];
        }

        // Find index of the existing entry with the same kategori
        const existingIndex = existingAnggaran.findIndex(item => 
            item.kategori === selectedKategori.toString()
        );

        if (existingIndex !== -1) {
            // Remove the existing entry
            existingAnggaran.splice(existingIndex, 1);
        }

        // Add the new anggaran to the existing array
        existingAnggaran.push(anggaran);

        // Save updated anggaran array to local storage
        localStorage.setItem('anggaran', JSON.stringify(existingAnggaran));

        // Print saved values to console
        console.log('Anggaran saved:', anggaran);
    }
</script>


<!-- Hidden input for existingAnggaran -->
<input type="hidden" id="existingAnggaran" name="existingAnggaran" value="{{ json_encode($existingAnggaran) }}">

<!-- Script to populate existingAnggaran -->
<script>
    const existingAnggaran = JSON.stringify(JSON.parse(localStorage.getItem('anggaran') || '[]'));
    console.log(existingAnggaran);
    document.getElementById('existingAnggaran').value = existingAnggaran;
</script>


@endsection