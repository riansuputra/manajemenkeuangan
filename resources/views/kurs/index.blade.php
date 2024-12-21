@extends('layouts.user')

@section('title', 'Kurs')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Kurs
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{$update}}</span> WITA</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-portofolio">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
          	Cetak PDF
      	</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-portofolio" aria-label="Create new report">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                <div class="mb-3">
    <label class="form-label">Konversi Kurs</label>
    @php
        function toRawValue($nilaiTukar) {
            // Hapus simbol +, -, Rp., dan karakter lain yang bukan angka
            return (int) preg_replace('/[^\d]/', '', $nilaiTukar);
        }
    @endphp

    <div class="input-group mb-2">
        <input type="text" class="form-control" id="input1" placeholder="Masukkan nilai" aria-label="Input nilai">
        <select class="form-select" id="select1" required>
            <option value="1" data-name="Indonesian Rupiah (IDR)">Indonesian Rupiah (IDR)</option>
            @foreach ($kursData as $kurs)
            <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}">
                {{ $kurs['mata_uang'] }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" id="input2" placeholder="Hasil konversi" aria-label="Hasil konversi" readonly>
        <select class="form-select" id="select2" required>
            <option value="1" data-name="Indonesian Rupiah (IDR)">Indonesian Rupiah (IDR)</option>
            @foreach ($kursData as $kurs)
            <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}">
                {{ $kurs['mata_uang'] }}
            </option>
            @endforeach
        </select>
    </div>
</div>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center w-1">No.</th>
                                <th class="text-center" colspan="2">Mata Uang</th>
                                <th class="text-center w-2">Kode</th>
                                <th class="text-center">Nilai Dalam Rupiah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kursData as $kurs)
                            <tr>
                                <td>{{$kurs['id']}}</td>
                                <td class="w-1"><span class="flag flag-country-{{$kurs['ikon']}}"></span></td>
                                <td class="text-muted">{{$kurs['nama_mata_uang']}}</td>
                                <td class="text-muted">{{$kurs['kode_mata_uang']}}</td>
                                <td class="w-5">
                                    <div class="row">
                                        <div class="col-auto">Rp.</div>
                                        <div class="col text-end">
                                            {{ number_format(preg_replace('/[^\d]/', '', $kurs['nilai_tukar']), 0, '.', '.') }}
                                        @if(str_starts_with($kurs['nilai_tukar'], '+'))
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="green"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.293 7.293a1 1 0 0 1 1.32 -.083l.094 .083l6 6l.083 .094l.054 .077l.054 .096l.017 .036l.027 .067l.032 .108l.01 .053l.01 .06l.004 .057l.002 .059l-.002 .059l-.005 .058l-.009 .06l-.01 .052l-.032 .108l-.027 .067l-.07 .132l-.065 .09l-.073 .081l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002h-12c-.852 0 -1.297 -.986 -.783 -1.623l.076 -.084l6 -6z" /></svg>
                                        @elseif(str_starts_with($kurs['nilai_tukar'], '-'))
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="red"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" /></svg>
                                        @else
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="red"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/></svg>
                                        @endif

                                        </div>
                                    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");

		window.addEventListener("load", function() {
			spinner.style.display = "none";
			pageContent.style.display = "block";
			pageTitle.style.display = "block";
		});
    });


</script>
<script>
    // Ambil elemen input dan dropdown
    const input1 = document.getElementById('input1'); // Input untuk nilai awal
    const input2 = document.getElementById('input2'); // Input untuk hasil konversi
    const select1 = document.getElementById('select1'); // Dropdown mata uang awal
    const select2 = document.getElementById('select2'); // Dropdown mata uang tujuan

    // Fungsi untuk format angka dengan pemisah ribuan titik dan desimal koma
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".").replace(".", ",");
    }

    // Menghapus format angka dan mengubah kembali ke angka mentah
    function unformatNumber(value) {
        return parseFloat(value.replace(/\./g, '').replace(',', '.')) || 0;
    }

    // Fungsi untuk menghitung konversi
    function calculateConversion() {
        const value1 = unformatNumber(input1.value); // Nilai input awal tanpa format
        const rate1 = parseFloat(select1.value); // Rate mata uang awal
        const rate2 = parseFloat(select2.value); // Rate mata uang tujuan

        if (rate1 && rate2) {
            const convertedValue = (value1 * rate1) / rate2;
            input2.value = formatNumber(convertedValue.toFixed(2)); // Tampilkan hasil konversi
        }
    }

    // Fungsi untuk menonaktifkan opsi yang dipilih
    function disableSameCurrency() {
        const selectedCurrency1 = select1.options[select1.selectedIndex].value; // Mata uang dipilih di select1
        const selectedCurrency2 = select2.options[select2.selectedIndex].value; // Mata uang dipilih di select2

        // Aktifkan semua opsi terlebih dahulu
        Array.from(select1.options).forEach(option => option.disabled = false);
        Array.from(select2.options).forEach(option => option.disabled = false);

        // Nonaktifkan opsi yang dipilih di select1 dari select2, dan sebaliknya
        Array.from(select2.options).forEach(option => {
            if (option.value === selectedCurrency1) option.disabled = true;
        });
        Array.from(select1.options).forEach(option => {
            if (option.value === selectedCurrency2) option.disabled = true;
        });
    }

    // Fungsi untuk menangani input dan melakukan format angka
    function updateFormattedNumKurs(event) {
        const inputElement = event.target;
        const rawValue = inputElement.value.replace(/\D/g, ''); // Hanya angka
        const formattedValue = formatNumber(rawValue); // Format angka
        inputElement.value = formattedValue;
        inputElement.setAttribute('data-value', rawValue); // Simpan nilai mentah untuk perhitungan
    }

    // Tambahkan event listener untuk input nilai
    input1.addEventListener('input', (event) => {
        updateFormattedNumKurs(event); // Format angka input1
        calculateConversion(); // Hitung konversi
    });

    input2.addEventListener('input', (event) => {
        updateFormattedNumKurs(event); // Format angka input2
    });

    // Tambahkan event listener untuk perubahan dropdown
    select1.addEventListener('change', () => {
        disableSameCurrency(); // Update status opsi dropdown
        calculateConversion(); // Hitung ulang nilai konversi
    });

    select2.addEventListener('change', () => {
        disableSameCurrency(); // Update status opsi dropdown
        calculateConversion(); // Hitung ulang nilai konversi
    });

    // Panggil disableSameCurrency saat halaman pertama kali dimuat
    window.onload = () => {
        select1.selectedIndex = 1; // Default mata uang awal adalah IDR
        select2.value = "1"; // Default mata uang kedua adalah mata uang lain selain IDR
        disableSameCurrency(); // Jalankan fungsi disable opsi yang sama
        calculateConversion(); // Lakukan konversi awal
    };

    
</script>



@endsection
