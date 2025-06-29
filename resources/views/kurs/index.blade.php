@extends('layouts.user')

@section('title', __('info.exchange_rate'))

@section('page-title')
<div class="col">
	<h2 class="page-title">
        {{ __('info.exchange_rate') }}
    </h2>
    <div class="text-muted mt-1">{{ __('info.last_updated') }} <span class="" id="update">{{\Carbon\Carbon::parse($update)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> UTC+8</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a class="btn btn-primary" id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                {{ __('info.print_pdf') }}
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
                    <h3>{{ __('info.exchange_calculator') }}</h3>
                    <div class="mb-3">
                        @php
                            function toRawValue($nilaiTukar) {
                                return (int) preg_replace('/[^\d]/', '', $nilaiTukar);
                            }
                        @endphp
                        
                        <label class="form-label">{{ __('info.amount') }} :</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" style="width:60%;" id="input1" placeholder="{{ __('info.enter_amount') }}" aria-label="Input nilai">
                            <select class="form-select" id="select1"  required>
                                <option value="1" data-name="Indonesian Rupiah (IDR)">IDR</option>
                                @foreach ($kursData as $kurs)
                                <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}" data-kode="{{ $kurs['kode_mata_uang'] }}" data-simbol="{{ $kurs['simbol'] }}">
                                    {{ $kurs['kode_mata_uang'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label mt-3">{{ __('info.converted_to') }} :</label>
                        <div class="input-group">
                            <input type="text" class="form-control" style="width:60%;" id="input2" placeholder="Hasil konversi" aria-label="Hasil konversi" readonly>
                            <select class="form-select" id="select2" required>
                                <option value="1" data-name="Indonesian Rupiah (IDR)">IDR</option>
                                @foreach ($kursData as $kurs)
                                <option value="{{ toRawValue($kurs['nilai_tukar']) }}" data-name="{{ $kurs['mata_uang'] }}" data-kode="{{ $kurs['kode_mata_uang'] }}" data-simbol="{{ $kurs['simbol'] }}">
                                    {{ $kurs['kode_mata_uang'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="form-label mt-3">
                            <span id="currencyFrom"></span>
                            <span class="text-muted">=</span>
                            <span id="currencyTo"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="input-icon mb-3">
                        <input type="text" id="searchInput1" class="form-control" placeholder="{{ __('info.search_exchange_data') }}">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter table-bordered" id="dataTable1">
                            <thead>
                                <tr>
                                    <th class="text-center w-1">No.</th>
                                    <th class="text-center" colspan="2">{{ __('info.currency') }}</th>
                                    <th class="text-center w-2">{{ __('info.currency_code') }}</th>
                                    <th class="text-center">{{ __('info.value_in_idr') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kursData as $kurs)
                                <tr>
                                    <td>{{$kurs['id']}}</td>
                                    <td class="w-1"><span class="flag flag-country-{{$kurs['ikon']}}"></span></td>
                                    <td class="">{{$kurs['nama_mata_uang']}}</td>
                                    <td class="text-center">{{$kurs['kode_mata_uang']}}</td>
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
</div>

<table class="table table-vcenter table-bordered" hidden>
    <thead>
        <tr>
            <th class="text-center w-1">No.</th>
            <th class="text-center" colspan="2">{{ __('info.currency') }}</th>
            <th class="text-center w-2">{{ __('info.currency_code') }}</th>
            <th class="text-center">{{ __('info.value_in_idr') }}</th>
        </tr>
    </thead>
    <tbody id="modalTableBody">
        @foreach($kursData as $kurs)
        <tr>
            <td>{{$kurs['id']}}</td>
            <td class="text-muted">{{$kurs['nama_mata_uang']}}</td>
            <td class="text-muted">{{$kurs['simbol']}}</td>
            <td class="text-muted">{{$kurs['kode_mata_uang']}}</td>
            <td class="w-5">Rp. {{ number_format(preg_replace('/[^\d]/', '', $kurs['nilai_tukar']), 0, '.', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

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

    function updateExchangeRateLabel() {
        const selectedOption1 = select1.options[select1.selectedIndex];
        const selectedOption2 = select2.options[select2.selectedIndex];

        
        const currencyFrom = selectedOption1.dataset.kode || "IDR";
        const symbolFrom = selectedOption1.dataset.simbol || "Rp.";
        const currencyTo = selectedOption2.dataset.kode || "IDR";
        const symbolTo = selectedOption2.dataset.simbol || "Rp.";
        const rate1 = parseFloat(select1.value);
        const rate2 = parseFloat(select2.value);

        if (rate1 && rate2) {
            const conversionRate = (1 * rate1) / rate2;
            document.getElementById('currencyFrom').textContent = `${symbolFrom} 1 ${currencyFrom}`;
            document.getElementById('currencyTo').textContent = `${symbolTo} ${formatNumber(conversionRate.toFixed(2))} ${currencyTo}`;
        }
    }


    
    select1.addEventListener('change', updateExchangeRateLabel);
    select2.addEventListener('change', updateExchangeRateLabel);

    
    window.onload = () => {
        select1.selectedIndex = 1;
        select2.value = "1";
        disableSameCurrency();
        calculateConversion();
        updateExchangeRateLabel();
    };

</script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		function searchTable(tableId, inputId) {
			let input = document.getElementById(inputId).value.toLowerCase();  
			let rows = document.querySelectorAll(`#${tableId} tbody tr`);  
			let noDataRow = document.querySelector(`#${tableId} .no-data-row`);  
			let hasVisibleRow = false;

			rows.forEach((row) => {
				let text = row.innerText.toLowerCase();  
				let isVisible = text.includes(input);  

				row.style.display = isVisible ? "" : "none";  

				if (isVisible) {
					hasVisibleRow = true;  
				}
			});

			
			if (noDataRow) {
				if (!hasVisibleRow && input.trim() !== "") {
					
					noDataRow.style.display = "";
				} else {
					
					noDataRow.style.display = "none";
				}
			}
		}

		
		document.getElementById("searchInput1").addEventListener("input", function() {
			searchTable("dataTable1", "searchInput1");
		});
	});
</script>

<script>
    document.getElementById('printModalToPdf').addEventListener('click', function () {
            const userName = @json($user['name']);
            const userEmail = @json($user['email']);
            const currentDate = @json($date); 

            const update = document.getElementById('update').textContent.trim();

            const Data = [
                ': ' + update,
            ];
            
            const modalTableBody = document.getElementById('modalTableBody');
            const tableRows = Array.from(modalTableBody.querySelectorAll('tr'));
            
            const pdfTableBody = [
                [{ text: 'No', style: 'tableHeader' }, 
                { text: 'Mata Uang', style: 'tableHeader' }, 
                { text: 'Simbol', style: 'tableHeader' }, 
                { text: 'Kode', style: 'tableHeader' }, 
                { text: 'Nilai Dalam Rupiah', style: 'tableHeader' },]
            ];
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableBody.push([
                    { text: cells[0].textContent, alignment: 'center' }, 
                    { text: cells[1].textContent, alignment: 'left' }, 
                    { text: cells[2].textContent, alignment: 'center' }, 
                    { text: cells[3].textContent, alignment: 'center' }, 
                    { text: cells[4].textContent, alignment: 'right' }, 
                ]);
            });
            
            const docDefinition = {
                content: [
                    {
                        alignment: 'justify',
                        columns: [
                            {
                                text: [`${userName}\n`, { text: userEmail, bold: false, color: 'gray' }],
                                bold: true
                            },
                            {
                                text: [`${currentDate}\nSmart Finance`],
                                style: ['alignRight'],
                                color: 'gray',
                            }
                        ]
                    },
                    {
                        text: '\nKurs\n\n',
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        text: 'Terakhir Diperbarui ' + Data + ' UTC+8\n',
                    },
                    {
                        style: 'tableExample',
                        table: {
                            headerRows: 1,
                            widths: [50, '*', 50, 50, '*'], 
                            body: pdfTableBody 
                        },
                        alignment: 'center',
                        layout: {
				fillColor: function (rowIndex, node, columnIndex) {
					return (rowIndex % 2 === 0) ? '#CEEFFD' : null;
				}
			}
                    },
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        alignment: 'justify',
                    },
                    alignRight: {
                        alignment: 'right'
                    },
                    tableExample: {
                        margin: [0, 5, 0, 15]
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 12,
                        color: 'black'
                    }
                },
                defaultStyle: {
                    columnGap: 20
                }
            };
            pdfMake.createPdf(docDefinition).open();
        });
</script>
@endsection
