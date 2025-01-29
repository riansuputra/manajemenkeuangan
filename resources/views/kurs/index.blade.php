@extends('layouts.user')

@section('title', 'Kurs')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Kurs
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{\Carbon\Carbon::parse($update)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> UTC+8</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3>Kalkulator Kurs</h3>
                    <div class="mb-3">
                        @php
                            function toRawValue($nilaiTukar) {
                                return (int) preg_replace('/[^\d]/', '', $nilaiTukar);
                            }
                        @endphp
                        
                        <label class="form-label">Jumlah :</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" style="width:60%;" id="input1" placeholder="Masukkan jumlah" aria-label="Input nilai">
                            <select class="form-select" id="select1"  required>
                                <option value="1" data-name="Indonesian Rupiah (IDR)">IDR</option>
                                @foreach ($kursData as $kurs)
                                <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}">
                                    {{ $kurs['kode_mata_uang'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label mt-3">Dikonversi menjadi :</label>
                        <div class="input-group">
                            <input type="text" class="form-control" style="width:60%;" id="input2" placeholder="Hasil konversi" aria-label="Hasil konversi" readonly>
                            <select class="form-select" id="select2" required>
                                <option value="1" data-name="Indonesian Rupiah (IDR)">IDR</option>
                                @foreach ($kursData as $kurs)
                                <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}">
                                    {{ $kurs['kode_mata_uang'] }}
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
    const input1 = document.getElementById('input1'); 
    const input2 = document.getElementById('input2'); 
    const select1 = document.getElementById('select1'); 
    const select2 = document.getElementById('select2'); 
    
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".").replace(".", ",");
    }

    function unformatNumber(value) {
        return parseFloat(value.replace(/\./g, '').replace(',', '.')) || 0;
    }
    
    function calculateConversion() {
        const value1 = unformatNumber(input1.value); 
        const rate1 = parseFloat(select1.value); 
        const rate2 = parseFloat(select2.value); 

        if (rate1 && rate2) {
            const convertedValue = (value1 * rate1) / rate2;
            input2.value = formatNumber(convertedValue.toFixed(2)); 
        }
    }
    
    function disableSameCurrency() {
        const selectedCurrency1 = select1.options[select1.selectedIndex].value; 
        const selectedCurrency2 = select2.options[select2.selectedIndex].value; 
        
        Array.from(select1.options).forEach(option => option.disabled = false);
        Array.from(select2.options).forEach(option => option.disabled = false);

        Array.from(select2.options).forEach(option => {
            if (option.value === selectedCurrency1) option.disabled = true;
        });
        Array.from(select1.options).forEach(option => {
            if (option.value === selectedCurrency2) option.disabled = true;
        });
    }
    
    function updateFormattedNumKurs(event) {
        const inputElement = event.target;
        const rawValue = inputElement.value.replace(/\D/g, ''); 
        const formattedValue = formatNumber(rawValue); 
        inputElement.value = formattedValue;
        inputElement.setAttribute('data-value', rawValue); 
    }
    
    input1.addEventListener('input', (event) => {
        updateFormattedNumKurs(event); 
        calculateConversion(); 
    });

    input2.addEventListener('input', (event) => {
        updateFormattedNumKurs(event); 
    });
    
    select1.addEventListener('change', () => {
        disableSameCurrency(); 
        calculateConversion(); 
    });

    select2.addEventListener('change', () => {
        disableSameCurrency(); 
        calculateConversion(); 
    });
    
    window.onload = () => {
        select1.selectedIndex = 1; 
        select2.value = "1"; 
        disableSameCurrency(); 
        calculateConversion(); 
    };
</script>
@endsection
