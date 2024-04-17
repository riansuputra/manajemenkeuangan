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
                                <div class="progress-bar bg-primary" id="progressbar-{{$data['id_kategori_pengeluaran']}}"role="progressbar" style="width: 44%" aria-label="Regular"></div>
                            </div>
                            <div class="row">
                                <div class="col-auto d-flex align-items-center">
                                <a href="" class="pe-2 text-yellow btn-kategori" data-bs-toggle="modal" data-bs-target="#modal-anggaran" data-kategori-id="{{$data['id_kategori_pengeluaran']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                                    </a>
                                    <a href="" class="text-red btn-hps-kategori" data-kategori-id="{{$data['id_kategori_pengeluaran']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7h16"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path><path d="M10 12l4 4m0 -4l-4 4"></path></svg>
                                    </a>
                                </div>
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
                                <input type="text" class="form-control" id="jumlah1" autocomplete="off" >
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
    // Retrieve existing anggaran from local storage
    let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
    
    // Your grouped data from the backend
    let groupedPengeluaranData = {!! json_encode($groupedPengeluaranData) !!};

    // Update displayed totalJumlah
    updateTotalJumlah(groupedPengeluaranData, existingAnggaran);

    const kategoriButtons = document.querySelectorAll('.btn-kategori');
    const hpsKategoriButtons = document.querySelectorAll('.btn-hps-kategori');
    const modalKategoriInput = document.querySelector('#kategoriang');
    const modalJumlahInput = document.querySelector('#jumlah1');
    const modalJumlahInput1 = document.querySelector('#jumlah');

    kategoriButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        const kategoriId = event.currentTarget.getAttribute('data-kategori-id');
        
        console.log('Clicked button with kategoriId:', kategoriId);  // Debug line

        const kategoriElement = document.querySelector(`[data-kategori-id="${kategoriId}"]`);
        
        console.log('Selected kategoriElement:', kategoriElement);  // Debug line

        if (!kategoriElement) {
            console.error(`No element found with kategoriId: ${kategoriId}`);  // Error logging
            return;
        }

        // Directly use kategoriElement as jumlahElement
        const jumlah = kategoriElement.textContent.split(' ')[2];

        console.log('Fetched Jumlah:', jumlah);  // Debug line

        modalKategoriInput.value = kategoriId;
        modalJumlahInput.value = jumlah.replace(/\D/g, '');
        modalJumlahInput1.value = jumlah;

        // Update modal title
        document.querySelector('.modal-title').textContent = `Edit Anggaran ${kategoriId}`;

        // No need to call updateTotalJumlah here as it will be updated when the modal is saved
    });
});


    hpsKategoriButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag
            
        const kategoriId = event.currentTarget.getAttribute('data-kategori-id');
            
        console.log('Delete button clicked with kategoriId:', kategoriId);  // Debug line

        // Retrieve existing anggaran from local storage
        let existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');

        // Ensure existingAnggaran is an array
        if (!Array.isArray(existingAnggaran)) {
            existingAnggaran = [];
        }

        // Remove the entry with the matching kategori
        const updatedAnggaran = existingAnggaran.filter(anggaran => anggaran.kategori !== kategoriId);

        // Save updated anggaran array to local storage
        localStorage.setItem('anggaran', JSON.stringify(updatedAnggaran));

        // Update displayed totalJumlah with updatedAnggaran
        updateTotalJumlah(groupedPengeluaranData, updatedAnggaran);
    });
});

});

function saveToLocalStorage() {
    const selectedKategori = document.querySelector('#kategoriang').value;
        const jumlah = parseFloat(document.querySelector('#jumlah1').value); // Parse as float

        // Validate the inputs
        if (!selectedKategori || !jumlah || isNaN(jumlah)) {
            alert('Mohon lengkapi form dengan angka yang valid.');
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
            // Update the existing entry
            existingAnggaran[existingIndex] = anggaran;
        } else {
            // Add the new anggaran to the existing array
            existingAnggaran.push(anggaran);
        }

        // Save updated anggaran array to local storage
        // Save updated anggaran array to local storage
    localStorage.setItem('anggaran', JSON.stringify(existingAnggaran));

// Update displayed totalJumlah
updateTotalJumlah(groupedPengeluaranData, existingAnggaran);

// Clear modal input fields
document.querySelector('#kategoriang').value = ''; // Clear kategoriang
document.querySelector('#jumlah1').value = ''; // Clear jumlah1
document.querySelector('#jumlah').value = ''; // Clear jumlah1

        // Update displayed totalJumlah

        // Print saved values to console
        console.log('Anggaran saved:', anggaran);// ... (same as your code)

    // Save updated anggaran array to local storage
    
}




    function updateTotalJumlah(groupedPengeluaranData, existingAnggaran) {
    //     if (!groupedPengeluaranData || typeof groupedPengeluaranData !== 'object') {
    //     console.warn('groupedPengeluaranData is not an object or is undefined');
    //     return;
    // }
        const kategoriElements = document.querySelectorAll('.kategori-total');

console.log('kategoriElements:', kategoriElements); // Debug line

kategoriElements.forEach(element => {
    const categoryName = element.getAttribute('data-kategori-id');
    
    console.log(`Processing categoryName: ${categoryName}`);

    const progressBar = document.getElementById(`progressbar-${categoryName}`);

    // Check if the categoryName exists in groupedPengeluaranData
    if (!groupedPengeluaranData || typeof groupedPengeluaranData !== 'object') {
            console.warn('groupedPengeluaranData is not an object or is undefined');
            return;
        }

        // Check if the categoryName exists in groupedPengeluaranData
        if (!groupedPengeluaranData.hasOwnProperty(categoryName)) {
            console.warn(`No entry found in groupedPengeluaranData for categoryName: ${categoryName}`); // Warning if the key doesn't exist
            return;
        }

    // Get total jumlah from groupedPengeluaranData
    const totalJumlahEntry = groupedPengeluaranData[categoryName];
    
    console.log(`totalJumlahEntry for ${categoryName}:`, totalJumlahEntry); // Debug line
    
    let totalJumlah = totalJumlahEntry ? parseFloat(totalJumlahEntry.total_jumlah) : 0;

    console.log(`Parsed Total Jumlah for ${categoryName}:`, totalJumlah); // Debug line

        // Get existing jumlah from local storage
        const existingAnggaranEntry = existingAnggaran.find(anggaran => anggaran.kategori === categoryName.toString());
        const existingJumlah = existingAnggaranEntry ? parseFloat(existingAnggaranEntry.jumlah) : 0;

        console.log(`Existing Anggaran Entry for ${categoryName}:`, existingAnggaranEntry);
        console.log(`Existing Jumlah for ${categoryName}:`, existingJumlah);

        // Calculate percentage
        const percentage = existingJumlah !== 0 ? ((totalJumlah / existingJumlah) * 100).toFixed(2) : 0;

        


        // Display as "total jumlah / existing jumlah (percentage%)"
        const displayText = `${formatNumber(totalJumlah)} / ${formatNumber(existingJumlah)} (${percentage}%)`;
        element.textContent = displayText;

        if (percentage > 100) {
        progressBar.style.width = '100%';
        progressBar.classList.remove('bg-primary');
        progressBar.classList.add('bg-danger');
    } else {
        progressBar.style.width = `${percentage}%`;
        progressBar.classList.remove('bg-danger');  // Remove danger class if present
        progressBar.classList.add('bg-primary');   // Add primary class
    }
    });
}


let groupedPengeluaranData;

document.addEventListener("DOMContentLoaded", function() {
    // Retrieve existing anggaran from local storage
    const existingAnggaran = JSON.parse(localStorage.getItem('anggaran') || '[]');
    
    // Your grouped data from the backend
    groupedPengeluaranData = {!! json_encode($groupedPengeluaranData) !!};

    console.log('Grouped Pengeluaran Data:', groupedPengeluaranData);  // Debug line
    console.log('Existing Anggaran:', existingAnggaran);

    // Update displayed totalJumlah if groupedPengeluaranData is initialized
    if (groupedPengeluaranData) {
        updateTotalJumlah(groupedPengeluaranData, existingAnggaran);
    }
});




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