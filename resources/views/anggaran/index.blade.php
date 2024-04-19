@extends('layouts.tabler')

@section('title', 'Anggaran')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Anggaran
    </h2>
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
                                    <span class="">
                                        <strong class="text-end kategori-total" data-kategori-id="{{$data['id_kategori_pengeluaran']}}">{{ $totalJumlah }}</strong>
                                        <strong></strong>

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
        <span id="dipakai-{{$data['id_kategori_pengeluaran']}}"></span>
        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted dipakai"></span>
    </div>

    <!-- "Dipakai" in the middle -->
    <div class="col-auto d-flex align-items-center ps-2">
        <span class="legend me-2"></span>
        <span id="tersisa-{{$data['id_kategori_pengeluaran']}}"></span>
        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted tersisa"></span>
    </div>

    <div class="col-auto d-flex align-items-center ps-2 overspend" >
        <span class="legend me-2 bg-danger" id="overspendDiv-{{$data['id_kategori_pengeluaran']}}" style="display:none;"></span>
        <span id="overspend-{{$data['id_kategori_pengeluaran']}}" style="display:none;">Overspend</span>
        
    </div>

    <div class="col-auto d-flex align-items-center ps-2 terpenuhi" >
        <span class="legend me-2 bg-green" id="terpenuhiDiv-{{$data['id_kategori_pengeluaran']}}" style="display:none;"></span>
        <span id="terpenuhi-{{$data['id_kategori_pengeluaran']}}" style="display:none;">Terpenuhi</span>
        
    </div>
    
    <!-- Buttons at the end -->
    <div class="col d-flex justify-content-end align-items-center">
        <a href="" class="pe-2 text-yellow btn-kategori" data-bs-toggle="modal" data-bs-target="#modal-anggaran" data-kategori-id="{{$data['id_kategori_pengeluaran']}}" data-kategori-nama="{{$data['nama_kategori_pengeluaran']}}">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                            <select class="form-select" id="kategoriang" hidden>
                                @foreach($kategoriPengeluaranData as $data)
                                    <option value="{{$data['id_kategori_pengeluaran']}}">{{$data['nama_kategori_pengeluaran']}}</option>
                                @endforeach
                            </select>
                            <label class="form-label">Jumlah : </label>
				            <div class="input-group">
                                <span class="input-group-text">
                                    Rp.
                                </span>
                                <input type="text" class="form-control" id="jumlah" autocomplete="off">
                                <input type="text" class="form-control" id="jumlah1" autocomplete="off" hidden>
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
document.addEventListener("DOMContentLoaded", function() {
    let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
    let groupedPengeluaranData = {!! json_encode($groupedPengeluaranData) !!};

    updateTotalJumlah(groupedPengeluaranData, existingAnggaran);

    const kategoriButtons = document.querySelectorAll('.btn-kategori');
    const hpsKategoriButtons = document.querySelectorAll('.btn-hps-kategori');
    const modalKategoriInput = document.querySelector('#kategoriang');
    const modalJumlahInput = document.querySelector('#jumlah1');
    const modalJumlahInput1 = document.querySelector('#jumlah');

    kategoriButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const kategoriId = event.currentTarget.getAttribute('data-kategori-id');
            const kategoriNama = event.currentTarget.getAttribute('data-kategori-nama');
            const kategoriElement = document.querySelector(`[data-kategori-id="${kategoriId}"]`);
            if (!kategoriElement) return;

            const jumlah = kategoriElement.textContent.split(' ')[4];
            modalKategoriInput.value = kategoriId;
            modalJumlahInput.value = jumlah.replace(/\D/g, '');
            modalJumlahInput1.value = jumlah;
            document.querySelector('.modal-title').textContent = `Buat Anggaran ${kategoriNama}`;
        });
    });

    hpsKategoriButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const kategoriId = event.currentTarget.getAttribute('data-kategori-id');
            let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
            existingAnggaran = existingAnggaran.filter(anggaran => anggaran.kategori !== kategoriId);
            localStorage.setItem('anggaran', JSON.stringify(existingAnggaran));
            updateTotalJumlah(groupedPengeluaranData, existingAnggaran);
        });
    });
});

function saveToLocalStorage() {
    const selectedKategori = document.querySelector('#kategoriang').value;
    const jumlah = parseFloat(document.querySelector('#jumlah1').value);
    if (!selectedKategori || !jumlah || isNaN(jumlah)) {
        alert('Mohon lengkapi form dengan angka yang valid.');
        return;
    }
    const anggaran = { kategori: selectedKategori, jumlah: jumlah };
    let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
    existingAnggaran = Array.isArray(existingAnggaran) ? existingAnggaran : [];
    const existingIndex = existingAnggaran.findIndex(item => item.kategori === selectedKategori.toString());
    if (existingIndex !== -1) existingAnggaran[existingIndex] = anggaran;
    else existingAnggaran.push(anggaran);
    localStorage.setItem('anggaran', JSON.stringify(existingAnggaran));
    updateTotalJumlah(groupedPengeluaranData, existingAnggaran);
    document.querySelector('#kategoriang').value = '';
    document.querySelector('#jumlah1').value = '';
    document.querySelector('#jumlah').value = '';
}

function updateTotalJumlah(groupedPengeluaranData, existingAnggaran) {
    const kategoriElements = document.querySelectorAll('.kategori-total');
    kategoriElements.forEach(element => {
        const categoryName = element.getAttribute('data-kategori-id');
        const dipakaiElement = document.getElementById(`dipakai-${categoryName}`);
        const tersisaElement = document.getElementById(`tersisa-${categoryName}`);
        const progressBar = document.getElementById(`progressbar-${categoryName}`);

        if (!groupedPengeluaranData || typeof groupedPengeluaranData !== 'object' || !groupedPengeluaranData.hasOwnProperty(categoryName)) {
            return;
        }

        const totalJumlah = parseFloat(groupedPengeluaranData[categoryName]?.total_jumlah || 0);
        const existingAnggaranEntry = existingAnggaran.find(anggaran => anggaran.kategori === categoryName.toString());
        const existingJumlah = parseFloat(existingAnggaranEntry?.jumlah || 0);
        const percentage = existingJumlah !== 0 ? ((totalJumlah / existingJumlah) * 100).toFixed(2) : 0;

        const displayText = `Rp. ${formatNumber(totalJumlah)} / Rp. ${formatNumber(existingJumlah)} (${percentage}%)`;
        element.textContent = displayText;

        if (totalJumlah > existingJumlah && existingJumlah !== 0) {
            progressBar.style.width = '100%';
            progressBar.classList.remove('bg-primary', 'bg-green'); // Remove both classes
            progressBar.classList.add('bg-danger');
        } else if (totalJumlah === existingJumlah) {
            progressBar.style.width = `${percentage}%`;
            progressBar.classList.remove('bg-danger', 'bg-primary'); // Remove both classes
            progressBar.classList.add('bg-green'); // Add bg-green class
        } else {
            progressBar.style.width = `${percentage}%`;
            progressBar.classList.remove('bg-danger', 'bg-green'); // Remove both classes
            progressBar.classList.add('bg-primary'); // Add bg-primary class
        }

        const dipakaiValue = totalJumlah;
        const tersisaValue = existingJumlah - totalJumlah;
        const displayTersisaValue = tersisaValue < 0 ? 0 : tersisaValue;

        dipakaiElement.innerHTML = `Dipakai <span class="text-muted">Rp. ${formatNumber(dipakaiValue)}</span>`;
        tersisaElement.innerHTML = `Tersisa <span class="text-muted">Rp. ${formatNumber(displayTersisaValue)}</span>`;

        const overspendDiv = document.getElementById(`overspendDiv-${categoryName}`);
        const overspend = document.getElementById(`overspend-${categoryName}`);
        const terpenuhiDiv = document.getElementById(`terpenuhiDiv-${categoryName}`);
        const terpenuhi = document.getElementById(`terpenuhi-${categoryName}`);

        if (totalJumlah > existingJumlah && existingJumlah !== 0) {
            const overspendValue = totalJumlah - existingJumlah;
            overspendDiv.style.display = 'block';
            overspend.style.display = 'block';
            overspend.innerHTML = `Overspend <span class="text-muted">Rp. ${formatNumber(overspendValue)}</span>`;
        } else if (totalJumlah === existingJumlah) {
            terpenuhiDiv.style.display = 'block';
            terpenuhi.style.display = 'block';
        } else {
            overspendDiv.style.display = 'none';
            overspend.style.display = 'none';
            terpenuhiDiv.style.display = 'none';
            terpenuhi.style.display = 'none';
        }
    });
}

let groupedPengeluaranData;
document.addEventListener("DOMContentLoaded", function() {
    const existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
    groupedPengeluaranData = {!! json_encode($groupedPengeluaranData) !!};
    if (groupedPengeluaranData) {
        updateTotalJumlah(groupedPengeluaranData, existingAnggaran);
    }
});

</script>


@endsection