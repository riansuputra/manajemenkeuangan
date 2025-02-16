@extends('layouts.user')

@section('title', 'Dividen')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Dividen
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="" id="update">{{\Carbon\Carbon::parse($lastUpdate)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> UTC+8</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="" class="btn btn-primary d-none d-sm-inline-block" id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
          	Cetak PDF
      	</a>
        <a href="" class="btn btn-primary d-sm-none btn-icon" id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" id="searchInput1" class="form-control" placeholder="Cari data dividen...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter table-bordered" id="dataTable1">
                            <thead>
                                <tr>
                                    <th class="text-center w-1">No.</th>
                                    <th class="text-center" colspan="2">Emiten</th>
                                    <th class="text-center" style="width:auto;">Dividen</th>
                                    <th class="text-center" style="width:auto;">Cum Date</th>
                                    <th class="text-center" style="width:auto;">Ex Date</th>
                                    <th class="text-center" style="width:auto;">Payment Date</th>
                                    <th class="text-center" style="width:auto;">Recording Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($dividenData))
                                @foreach($dividenData as $dividen)
                                <tr>
                                    <td class="text-center w-1">{{ $loop->index + 1 }}</td>
                                    <td class="w-1"><span class="avatar avatar-xs" style="background-image: url({{ $dividen['aset']['info'] }})"></span></td>
                                    <td class="text-muted">{{$dividen['aset']['deskripsi']}} <span class="fw-bold">({{$dividen['aset']['nama']}})</span></td>
                                    <td class="">
                                        <div class="row">
                                            <div class="col-auto">Rp.</div>
                                            <div class="col text-end">{{ number_format(($dividen['dividen'] ?? 0), 2, ',', '.') }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['cum_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['ex_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['recording_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['payment_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">Belum ada data dividen.</td>
                                </tr>
                                @endif
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
            <th class="text-center">Emiten</th>
            <th class="text-center" style="width:auto;">Dividen</th>
            <th class="text-center" style="width:auto;">Cum Date</th>
            <th class="text-center" style="width:auto;">Ex Date</th>
            <th class="text-center" style="width:auto;">Payment Date</th>
            <th class="text-center" style="width:auto;">Recording Date</th>
        </tr>
    </thead>
    <tbody id="modalTableBody">
        @if(!empty($dividenData))
        @foreach($dividenData as $dividen)
        <tr>
            <td class="text-center w-1">{{ $loop->index + 1 }}</td>
            <td class="text-muted">{{$dividen['aset']['deskripsi']}} ({{$dividen['aset']['nama']}})</td>
            <td class="">Rp. {{ number_format(($dividen['dividen'] ?? 0), 2, ',', '.') }}</td>
            <td class="text-center">{{\Carbon\Carbon::parse($dividen['cum_date'])->locale('id')->translatedFormat('d/m/Y')}}</td>
            <td class="text-center">{{\Carbon\Carbon::parse($dividen['ex_date'])->locale('id')->translatedFormat('d/m/Y')}}</td>
            <td class="text-center">{{\Carbon\Carbon::parse($dividen['recording_date'])->locale('id')->translatedFormat('d/m/Y')}}</td>
            <td class="text-center">{{\Carbon\Carbon::parse($dividen['payment_date'])->locale('id')->translatedFormat('d/m/Y')}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="7">Belum ada data dividen.</td>
        </tr>
        @endif
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
                { text: 'Emiten', style: 'tableHeader' }, 
                { text: 'Dividen', style: 'tableHeader' }, 
                { text: 'Cum Date', style: 'tableHeader' }, 
                { text: 'Ex Date', style: 'tableHeader' }, 
                { text: 'Payment Date', style: 'tableHeader' }, 
                { text: 'Recording Date', style: 'tableHeader' },]
            ];
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableBody.push([
                    { text: cells[0].textContent, alignment: 'center' }, 
                    { text: cells[1].textContent, alignment: 'left' }, 
                    { text: cells[2].textContent, alignment: 'right' }, 
                    { text: cells[3].textContent, alignment: 'center' }, 
                    { text: cells[4].textContent, alignment: 'center' }, 
                    { text: cells[5].textContent, alignment: 'center' }, 
                    { text: cells[6].textContent, alignment: 'center' }, 
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
                        text: '\Dividen\n\n',
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
                            widths: [50, '*', '*', '*', '*', '*', '*'], 
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
                },
                pageOrientation: 'landscape'  
            };
            pdfMake.createPdf(docDefinition).open();
        });
</script>
@endsection
