@extends('layouts.tabler')

@section('title', 'Investasi')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Rancangan Investasi Target
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-lumpsum') }}" class="nav-link" aria-selected="true" role="tab">Lumpsum</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-bulanan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-target') }}" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">Target</a>
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
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Target Dana Investasi : </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            Rp.
                                                        </span>
                                                        <input type="text" id="awaldana" name="awaldana" class="form-control text-end" autocomplete="off" hidden>
                                                        <input type="text" id="awaldana1" name="awaldana1" class="form-control text-end" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jangka Waktu Investasi : </label>
                                                    <div class="input-group">
                                                        <input type="text" id="jmhtahun" name="jmhtahun" class="form-control text-end" autocomplete="off">
                                                        <span class="input-group-text">
                                                            /Tahun
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Persentase Bunga :</label>
                                                    <div class="input-group">

                                                        <input type="text" id="persentasebunga" name="persentasebunga" class="form-control text-end" autocomplete="off">
                                                        <span class="input-group-text">
                                                            %
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-success w-100">
                                                            Hitung
                                                        </button>
                                                    </div>
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-secondary w-100">
                                                            Reset
                                                        </button>
                                                    </div>
                                                    <div class="col mt-3">
                                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-scrollable">
                                                            Detail
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
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <h3 class="text-center text-bold">Hasil Perhitungan</h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-vcenter card-table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">Target Dana</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="awaldana2">Rp. 0</td>
                                                                </tr>
                                                                <td style="width:%" class="text-end" id="awaldana3" hidden>0</td>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">Jangka Waktu</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="jmhtahun2">0 Tahun</td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">Persentase Bunga</td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="persentasebunga1">0%</td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;"><strong>Nilai Investasi</strong></td>
                                                                    <td style="width:5%;">:</td>
                                                                    <td style="width:%" class="text-end" id="nilai"><strong>Rp. 0</strong></td>
                                                                </tr>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;"><strong>Investasi Bulanan</strong></td>
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
                                            <div class="col-md-6 col-xl-12">
                                                <div class="mb-3">
                                                    <h3 class="text-center text-bold">Statistik</h3>
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
                <h5 class="modal-title">Detail Investasi Target</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header">
                <div class="table-responsive">
                    <table class="table table-vcenter table-borderless card-table">
                        
                        <tbody>
                            <tr >
                                <td >Investasi Bulanan</td>
                                <td >:</td>
                            </tr>
                            <td style="width:%" class="text-end" id="awaldana3" hidden></td>
                            <tr >
                                <td >Jangka Waktu</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >Persentase Bunga</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >Nilai Investasi</td>
                                <td >:</td>
                            </tr>
                            <tr >
                                <td >Total Nilai</td>
                                <td >:</td>
                            </tr>
							<tr >
                                <td >Target Dana</td>
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
            <div class="modal-body">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Investasi</th>
                                    <th class="text-center">Nilai Investasi</th>
                                </tr>
                            </thead>
                            <tbody id="modalTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="me-auto btn" data-bs-dismiss="modal">Tutup</button>
                <button type="button" id="printModalToPdf" class="btn btn-primary">Cetak ke PDF</button>
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
        let chart = null; 

        function createOrUpdateChart() {
            const awaldana = parseFloat(document.getElementById('awaldana').value);
			const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
            const nilai = parseFloat(calculateNilai());
			const months = jmhtahun * 12;
            const danaInvestasiAwal = awaldana;
            const nilaiInvestasi = nilai;
			const totalInvestment = nilai * months;
    		const estimatedReturn = awaldana - totalInvestment;

            document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(awaldana);
            document.getElementById('awaldana3').textContent = awaldana;
            document.getElementById('jmhtahun2').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga1').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai').innerHTML = '<strong>Rp. ' + formatNumber(estimatedReturn.toFixed(0)) + '</strong>';
            document.getElementById('totalnilai').innerHTML = '<strong>Rp. ' + formatNumber(nilai.toFixed(0)) + '</strong>';

            document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(nilaiInvestasi);
            document.getElementById('jmhtahun4').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga4').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai1').textContent = 'Rp. ' + formatNumber(estimatedReturn.toFixed(0));
            document.getElementById('totalnilai1').textContent = 'Rp. ' + formatNumber(totalInvestment.toFixed(0));
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
                labels: ["Nilai Investasi", "Dana Investasi Awal"], // Switched the order
                tooltip: {
                    theme: 'dark'
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
                tooltip: {
                    fillSeriesColor: false
                },
            });

            chart.render(); // Render the chart

            const investasiTargetData = {
                awaldana: awaldana,
                jmhtahun: document.getElementById('jmhtahun').value,
                persentasebunga: document.getElementById('persentasebunga').value,
                danaInvestasiAwal: danaInvestasiAwal,
                nilaiInvestasi: nilaiInvestasi,
				totalInvestment: totalInvestment,
				estimatedReturn: estimatedReturn
            };

            localStorage.setItem('investasi-target', JSON.stringify(investasiTargetData));
        }

        function calculateNilai() {
			const awaldana = parseFloat(document.getElementById('awaldana').value);
			const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
			const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);

			let totalMultiplier = 1.0;

			const monthlyInterestRate = persentasebunga / 100 / 12; // Tingkat bunga per bulan
			const months = jmhtahun * 12; // Jumlah total bulan

			for (let i = 0; i < months; i++) {
				totalMultiplier *= (1 + monthlyInterestRate);
			}

			if (!isNaN(awaldana) && !isNaN(jmhtahun) && !isNaN(persentasebunga)) {
				const nilai = awaldana / ((((totalMultiplier - 1) / monthlyInterestRate)) * (1 + monthlyInterestRate));
				return nilai.toFixed(0); // Mengembalikan nilai dengan format tanpa desimal
			} else {
				return 'Invalid input';
			}

			const totalInvestment = nilai * months;
			const estimatedReturn = totalInvestment - awaldana;
			return totalInvestment.toFixed(0);
			return estimatedReturn.toFixed(0);
		}


		


        function populateModalTable() {
			const awaldana = parseFloat(document.getElementById('awaldana').value);
			const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
			const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);
            const nilai = parseFloat(calculateNilai());
			const months = jmhtahun * 12;
            const danaInvestasiAwal = awaldana;
            const nilaiInvestasi = nilai;
			const totalInvestment = nilai * months;
    		const estimatedReturn = awaldana - totalInvestment;
            
            document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(nilai);
            
            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';

            const tahunValues = [5, 8, 10, 12, 15, 18, 20, 22, 25, 28, 30, 35];
            
            tahunValues.forEach(tahun => {
                const row = document.createElement('tr');
				const months = tahun * 12;
				const investasiValue = nilai * months;

                
                const tahunCell = document.createElement('td');
                tahunCell.textContent = tahun;
                tahunCell.classList.add('text-center');
                row.appendChild(tahunCell);
                
                const investasiCell = document.createElement('td');
                investasiCell.textContent = formatNumber(investasiValue);
                investasiCell.classList.add('text-center');
                row.appendChild(investasiCell);
                
                const nilaiInvestasiCell = document.createElement('td');
				let totalMultiplier = 1.0;
				const monthlyInterestRate = persentasebunga / 100 / 12;
				for (let i = 0; i < months; i++) {
        			totalMultiplier *= (1 + monthlyInterestRate);
    			}
                const nilaiTahun = nilai * ((((totalMultiplier - 1) / monthlyInterestRate)) * (1 + monthlyInterestRate));
                nilaiInvestasiCell.textContent = 'Rp. ' + formatNumber(nilaiTahun.toFixed(0));
                nilaiInvestasiCell.classList.add('text-center');
                row.appendChild(nilaiInvestasiCell);
                
                modalTableBody.appendChild(row);
            });
        }

        function populateFromLocalStorage() {
            const investasiTargetData = JSON.parse(localStorage.getItem('investasi-target'));
            if (investasiTargetData) {
                document.getElementById('awaldana').value = investasiTargetData.awaldana || '';
                document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(investasiTargetData.awaldana) || '';
                document.getElementById('awaldana1').value = formatNumber(investasiTargetData.awaldana) || '';
                document.getElementById('jmhtahun').value = investasiTargetData.jmhtahun || '';
                document.getElementById('persentasebunga').value = investasiTargetData.persentasebunga || '';
                document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(investasiTargetData.awaldana || '');

                createOrUpdateChart();
                populateModalTable();
            }
        }

        if (localStorage.getItem('investasi-target')) {
            populateFromLocalStorage();
        }

        document.querySelector('.btn-success').addEventListener('click', function() {
            createOrUpdateChart();
            populateModalTable();
        });

        document.querySelector('.btn-secondary').addEventListener('click', function() {
            localStorage.removeItem('investasi-target');
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

            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';
        }

        document.getElementById('printModalToPdf').addEventListener('click', function() {
            console.log("Button clicked");
                const docDefinition = {
                    content: [
                        'Investasi Lumpsum Detail',
                        { text: 'Dana Awal: Rp. 100,000', margin: [0, 10] },
                        { text: 'Jangka Waktu: 5 Tahun', margin: [0, 10] },
                        { text: 'Persentase Bunga: 10%', margin: [0, 10] },
                        { text: 'Nilai Investasi: Rp. 150,000', margin: [0, 10] },
                        { text: 'Total Nilai: Rp. 250,000', margin: [0, 10] }
                    ]
                };

                pdfMake.createPdf(docDefinition).download('investasi-target.pdf');
            });

        createOrUpdateChart();
    });
</script>

@endsection