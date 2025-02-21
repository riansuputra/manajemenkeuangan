@extends('layouts.user')

@section('title', __('simulation.monthly_investment'))

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        {{ __('simulation.simulation') }}
    </div>
    <h2 class="page-title">
        {{ __('simulation.monthly_investment') }}
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="" class="btn btn-primary" id="printModalToPdf">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                {{ __('simulation.print_pdf') }}
      	</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi.bulanan') }}" class="nav-link" aria-selected="true" role="tab">{{ __('simulation.monthly') }}</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi.target.bulanan') }}" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">{{ __('simulation.monthly_target') }}</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
                    <div class="tab-pane active show" id="tabs-lumpsum" role="tabpanel">
                        <div class="row row-cards">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('simulation.investment_target_fund') }} : </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            Rp.
                                                        </span>
                                                        <input type="text" id="awaldana" name="awaldana" class="form-control text-end" autocomplete="off" hidden>
                                                        <input type="text" id="awaldana1" name="awaldana1" class="form-control text-end" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('simulation.investment_duration') }} : </label>
                                                    <div class="input-group">
                                                        <input type="number" id="jmhtahun" name="jmhtahun" class="form-control text-end" autocomplete="off">
                                                        <span class="input-group-text">
                                                            {{ __('simulation.years') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('simulation.interest_rate') }} :</label>
                                                    <div class="input-group">

                                                        <input type="number" id="persentasebunga" name="persentasebunga" class="form-control text-end" autocomplete="off">
                                                        <span class="input-group-text">
                                                            %
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-success w-100">
                                                            {{ __('simulation.calculate') }}
                                                        </button>
                                                    </div>
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-secondary w-100">
                                                            {{ __('simulation.reset') }}
                                                        </button>
                                                    </div>
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                                                            {{ __('simulation.details') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <h3 class="text-center text-bold">{{ __('simulation.calculation_result') }}</h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-vcenter table-borderless card-table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">{{ __('simulation.target_fund') }}</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="awaldana2">Rp. 0</td>
                                                                </tr>
                                                                <td style="width:%" class="text-end" id="awaldana3" hidden>0</td>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">{{ __('simulation.duration') }}</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="jmhtahun2">0 {{ __('simulation.years') }}</td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">{{ __('simulation.interest_rate') }}</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="persentasebunga1">0%</td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;"><strong>{{ __('simulation.investment_value') }}</strong></td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="nilai"><strong>Rp. 0</strong></td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;"><strong>{{ __('simulation.monthly_investment') }}</strong></td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="totalnilai"><strong>Rp. 0</strong></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <h3 class="text-center text-bold">{{ __('simulation.statistics') }}</h3>
                                                </div>
                                                <div id="chart-demo-pie#3" style="min-height: 267px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal modal-blur fade" id="modal-scrollable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('simulation.monthly_investment_details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header">
                <div class="table-responsive">
                    <table class="table table-vcenter table-borderless card-table">
                        <tbody>
                            <tr >
                                <td >{{ __('simulation.monthly_investment') }}</td>
                                <td >:</td>
                            </tr>
                            <td style="width:%" class="text-end" id="awaldana3" hidden></td>
                            <tr >
                                <td >{{ __('simulation.duration') }}</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >{{ __('simulation.interest_rate') }}</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >{{ __('simulation.investment_value') }}</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >{{ __('simulation.total_value') }}</td>
                                <td >:</td>
                            </tr>
							<tr >
                                <td >{{ __('simulation.target_fund') }}</td>
                                <td >:</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table table-vcenter table-borderless card-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td ></td>
                                <td ></td>
                                <td  class="text-end" id="awaldana4">0</td>
                            </tr>
                            <td style="width:%" class="text-end" id="awaldana3" hidden>0</td>
                            <tr >
                                <td ></td>
                                <td ></td>
                                <td  class="text-end" id="jmhtahun4">0</td>
                            </tr>
                            <tr >
                                <td ></td>
                                <td ></td>
                                <td  class="text-end" id="persentasebunga4">0</td>
                            </tr>
                            <tr >
                                <td >&nbsp</td>
                                <td ></td>
                                <td  class="text-end" id="nilai1">0</td>
                            </tr>
                            <tr >
                                <td >&nbsp</td>
                                <td ></td>
                                <td  class="text-end" id="totalnilai1">0</td>
                            </tr>
							<tr >
                                <td >&nbsp</td>
                                <td ></td>
                                <td  class="text-end" id="totalnilai2">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-status bg-primary"></div>
            <div class="modal-body">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('simulation.month') }}</th>
                                    <th class="text-center">{{ __('simulation.investment') }}</th>
                                    <th class="text-center">{{ __('simulation.investment_value') }}</th>
                                </tr>
                            </thead>
                            <tbody id="modalTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('simulation.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Detail -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    function updateFormattedNumber3() {
        var inputElement = document.getElementById('awaldana1');
        var rawValue = inputElement.value.replace(/\D/g, '');
        var formattedValue = formatNumber(rawValue);
        inputElement.value = formattedValue;
        inputElement.setAttribute('data-value', rawValue);
        setUnformattedValueToInput3();
    }
    function setUnformattedValueToInput3() {
        var unformattedValue = getUnformattedValue3();
        var inputElement = document.getElementById('awaldana');
        inputElement.value = unformattedValue;
    }
    function getUnformattedValue3() {
        var inputElement = document.getElementById('awaldana1');
        var unformattedValue = inputElement.getAttribute('data-value') || '';
        return unformattedValue;
    }
    document.getElementById('awaldana1').addEventListener('input', updateFormattedNumber3);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");

        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        let chart = null; 

        function createOrUpdateChart() {
            let awaldana = parseFloat(document.getElementById('awaldana').value);
			const jmhtahun = !isNaN(parseFloat(document.getElementById('jmhtahun').value)) ? parseFloat(document.getElementById('jmhtahun').value) : 0;
            const nilai = parseFloat(calculateNilai());
            awaldana = isNaN(awaldana) ? 0 : awaldana;

			const months = jmhtahun * 12;
            const danaInvestasiAwal = awaldana;
            const nilaiInvestasi = nilai;
			const totalInvestment = nilai * months;
    		const estimatedReturn = awaldana - totalInvestment;

            document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(awaldana);
            document.getElementById('awaldana3').textContent = awaldana;
            document.getElementById('jmhtahun2').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga1').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai').innerHTML = '<strong>Rp. ' + formatNumber(estimatedReturn.toFixed(2)) + '</strong>';
            document.getElementById('totalnilai').innerHTML = '<strong>Rp. ' + formatNumber(nilai.toFixed(2)) + '</strong>';

            document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(nilaiInvestasi);
            document.getElementById('jmhtahun4').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga4').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai1').textContent = 'Rp. ' + formatNumber(estimatedReturn.toFixed(2));
            document.getElementById('totalnilai1').textContent = 'Rp. ' + formatNumber(totalInvestment.toFixed(2));
            document.getElementById('totalnilai2').textContent = 'Rp. ' + formatNumber(awaldana.toFixed(0));

            const chartData = [estimatedReturn, totalInvestment]; 

            if (chart) {
                chart.destroy();
            }

            chart = new ApexCharts(document.getElementById('chart-demo-pie#3'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 305,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: chartData,
                labels: ["{{ __('simulation.investment_value') }}", "{{ __('simulation.total_value') }}"], 
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val.toFixed(2));
                        },
                    },
                    fillSeriesColor: false
                },
                grid: {
                    strokeDashArray: 4,
                },
                colors: [tabler.getColor("azure"), tabler.getColor("indigo")],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 12,
                    markers: {
                        width: 10,
                        height: 10,
                        radius: 100,
                    },
                    itemMargin: {
                        horizontal: 8,
                        vertical: 8
                    },
                },
                
            });

            chart.render(); 

            const investasiTargetDataBulanan = {
                awaldana: awaldana || '',
                jmhtahun: document.getElementById('jmhtahun').value,
                persentasebunga: document.getElementById('persentasebunga').value,
                danaInvestasiAwal: danaInvestasiAwal,
                nilaiInvestasi: nilaiInvestasi,
				totalInvestment: totalInvestment,
				estimatedReturn: estimatedReturn
            };

            localStorage.setItem('investasi-target-bulanan', JSON.stringify(investasiTargetDataBulanan));
        }

        function calculateNilai() {
    const targetValue = parseFloat(document.getElementById('awaldana').value); // Target investasi (FV)
    const jmhtahun = parseFloat(document.getElementById('jmhtahun').value); // Lama investasi dalam tahun
    const persentasebunga = parseFloat(document.getElementById('persentasebunga').value); // Suku bunga tahunan (%)


    if (!isNaN(targetValue) && !isNaN(jmhtahun) && !isNaN(persentasebunga) && targetValue > 0 && jmhtahun > 0) {
        const months = jmhtahun * 12; // Konversi tahun ke bulan
        const monthlyInterestRate = persentasebunga / 100 / 12; // Bunga bulanan dalam desimal

        

        // Rumus yang diperbaiki
        const numerator = targetValue * monthlyInterestRate;
        const denominator = (Math.pow(1 + monthlyInterestRate, months) - 1) * (1 + monthlyInterestRate);
        const pmt = numerator / denominator;


        return pmt.toFixed(2); // Format hasil ke dua desimal
    } else {
        return "Input tidak valid";
    }
}


function populateModalTable() {
    const targetValue = parseFloat(document.getElementById('awaldana').value);
    const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
    const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);
    const nilai = parseFloat(calculateNilai());
    const months = jmhtahun * 12;
    const monthlyInterestRate = persentasebunga / 100 / 12;

    document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(nilai);

    const modalTableBody = document.getElementById('modalTableBody');
    modalTableBody.innerHTML = '';

    let totalSetoran = 0; // Menyimpan total setoran tanpa bunga
    let saldoAkhir = 0; // Menyimpan saldo setelah bunga

    for (let month = 1; month <= months; month++) {
        const row = document.createElement('tr');

        // Kolom Bulan
        const monthCell = document.createElement('td');
        monthCell.textContent = month;
        monthCell.classList.add('text-center');
        row.appendChild(monthCell);

        // Hitung total setoran sebelum bunga
        totalSetoran += nilai;
        const investasiCell = document.createElement('td');
        investasiCell.textContent = 'Rp. ' + formatNumber(totalSetoran.toFixed(2));
        investasiCell.classList.add('text-center');
        row.appendChild(investasiCell);

        // Hitung saldo setelah bunga
        saldoAkhir = (saldoAkhir + nilai) * (1 + monthlyInterestRate);
        const nilaiInvestasiCell = document.createElement('td');
        nilaiInvestasiCell.textContent = 'Rp. ' + formatNumber(saldoAkhir.toFixed(2));
        nilaiInvestasiCell.classList.add('text-center');
        row.appendChild(nilaiInvestasiCell);

        modalTableBody.appendChild(row);
    }
}


        function populateFromLocalStorage() {
            const investasiTargetDataBulanan = JSON.parse(localStorage.getItem('investasi-target-bulanan'));
            if (investasiTargetDataBulanan) {
                document.getElementById('awaldana').value = investasiTargetDataBulanan.awaldana || '';
                document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(investasiTargetDataBulanan.awaldana) || '';
                document.getElementById('awaldana1').value = formatNumber(investasiTargetDataBulanan.awaldana) || '';
                document.getElementById('jmhtahun').value = investasiTargetDataBulanan.jmhtahun || '';
                document.getElementById('persentasebunga').value = investasiTargetDataBulanan.persentasebunga || '';
                document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(investasiTargetDataBulanan.awaldana || '');

                createOrUpdateChart();
                populateModalTable();
            }
        }

        if (localStorage.getItem('investasi-target-bulanan')) {
            populateFromLocalStorage();
        }

        document.querySelector('.btn-success').addEventListener('click', function() {
            createOrUpdateChart();
            populateModalTable();
        });

        document.querySelector('.btn-secondary').addEventListener('click', function() {
            localStorage.removeItem('investasi-target-bulanan');
            const awaldanaInput = document.getElementById('awaldana');
            const awaldanaInput1 = document.getElementById('awaldana1');
            const jmhtahunInput = document.getElementById('jmhtahun');
            const persentasebungaInput = document.getElementById('persentasebunga');
            awaldanaInput.value = '';
            awaldanaInput1.value = '';
            jmhtahunInput.value = '';
            persentasebungaInput.value = '';
            document.getElementById('awaldana2').textContent = 'Rp. 0';
            document.getElementById('awaldana3').textContent = '';
            document.getElementById('jmhtahun2').textContent = '0 Tahun';
            document.getElementById('persentasebunga1').textContent = '0%';
            document.getElementById('nilai').textContent = 'Rp. 0';
            document.getElementById('totalnilai').textContent = 'Rp. 0';

            if (chart) {
                chart.updateOptions({
                    series: [0, 0]
                });
            }
            resetModalValues();
        });

        function resetModalValues() {
            document.getElementById('awaldana4').textContent = 'Rp. 0';
            document.getElementById('jmhtahun4').textContent = '0 Tahun';
            document.getElementById('persentasebunga4').textContent = '0%';
            document.getElementById('nilai1').textContent = 'Rp. 0';
            document.getElementById('totalnilai1').textContent = 'Rp. 0';
            document.getElementById('totalnilai2').textContent = 'Rp. 0';

            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';
        }

        document.getElementById('printModalToPdf').addEventListener('click', function () {
            const userName = @json($user['name']);
            const userEmail = @json($user['email']);
            const currentDate = @json($date); 

            const awaldana4 = document.getElementById('awaldana4').textContent.trim();
            const jmhtahun4 = document.getElementById('jmhtahun4').textContent.trim();
            const persentasebunga4 = document.getElementById('persentasebunga4').textContent.trim();
            const nilai1 = document.getElementById('nilai1').textContent.trim();
            const totalnilai1 = document.getElementById('totalnilai1').textContent.trim();
            const totalnilai2 = document.getElementById('totalnilai2').textContent.trim();

            const summaryData = [
                ': ' + awaldana4,
                ': ' + jmhtahun4,
                ': ' + persentasebunga4,
                ': ' + nilai1,
                ': ' + totalnilai1,
                ': ' + totalnilai2 + '\n\n',
            ];
            
            const modalTableBody = document.getElementById('modalTableBody');
            const tableRows = Array.from(modalTableBody.querySelectorAll('tr'));
            
            const pdfTableBody = [
                [{ text: 'Tahun', style: 'tableHeader' }, { text: 'Investasi', style: 'tableHeader' }, { text: 'Nilai Investasi', style: 'tableHeader' }]
            ];
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableBody.push([
                    cells[0].textContent, 
                    cells[1].textContent, 
                    cells[2].textContent  
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
                        text: '\nSimulasi Investasi Target Bulanan\n\n',
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        columns: [
                            {
                                stack: [
                                    {
                                        ul: [
                                            'Investasi Bulanan',
                                            'Jangka Waktu',
                                            'Persentase Bunga',
                                            'Nilai Investasi',
                                            'Total Nilai',
                                            'Target Dana',
                                        ]
                                    },
                                ]
                            },
                            {
                                stack: summaryData,
                            },
                            '',
                            '',
                        ]
                    },
                    {
                        style: 'tableExample',
                        table: {
                            headerRows: 1,
                            widths: [50, '*', '*'], 
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
        createOrUpdateChart();
    });
</script>

@endsection