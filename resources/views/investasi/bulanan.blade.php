@extends('layouts.tabler')

@section('title', 'Investasi Bulanan')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Simulasi
    </div>
    <h2 class="page-title">
        Investasi Bulanan
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
			
                        <div class="row row-cards">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Dana Investasi Bulanan : </label>
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
                                                        <input type="number" id="jmhtahun" name="jmhtahun" class="form-control text-end" autocomplete="off">
                                                        <span class="input-group-text">
                                                            Tahun
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Persentase Bunga :</label>
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

                <button type="button" id="printModalToPdf" class="btn btn-primary">Cetak ke PDF</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="min-height: 342px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <h3 class="text-center text-bold">Hasil Perhitungan</h3>
                                                    <div class="table-responsive">
                                                        <table class="table table-vcenter card-table table-borderless">
                                                            <thead>
                                                                <tr hidden>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="height:2.93rem;">
                                                                    <td style="width:45%;">Total Dana</td>
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
                                                                    <td style="width:45%;"><strong>Total Nilai</strong></td>
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

<!-- Modal Detail -->
<div class="modal modal-blur fade" id="modal-scrollable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Investasi Bulanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header">
                <div class="table-responsive">
                    <table class="table table-vcenter table-borderless card-table">
                        
                        <tbody>
                            <tr >
                                <td >Dana Bulanan</td>
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
                                <td >Total Dana</td>
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
                                <td  class="text-end" id="nilaitotal">0</td>
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
                                    <th class="text-center">Bulan</th>
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
        const spinner = document.getElementById("spinner");
    const pageContent = document.getElementById("page-content");
    const pageTitle = document.getElementById("page-title");

    // Hide spinner and show page content when fully loaded
    window.addEventListener("load", function() {
        spinner.style.display = "none";
        pageContent.style.display = "block";
        pageTitle.style.display = "block";
    });

        
        let chart = null; 

        function createOrUpdateChart() {
            let awaldana = parseFloat(document.getElementById('awaldana').value);
            const nilai = parseFloat(calculateNilai());
            const danaInvestasiAwal = !isNaN(awaldana) && !isNaN(parseFloat(document.getElementById('jmhtahun').value)) ? awaldana * 12 * parseFloat(document.getElementById('jmhtahun').value) : 0;

            // Calculate nilaiInvestasi
            const nilaiInvestasi = !isNaN(nilai) && !isNaN(danaInvestasiAwal) ? nilai - danaInvestasiAwal : 0;

            // Convert to 0 if NaN
            awaldana = isNaN(awaldana) ? 0 : awaldana;


            document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(danaInvestasiAwal);
            document.getElementById('awaldana3').textContent = awaldana;
            document.getElementById('jmhtahun2').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga1').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai').innerHTML = '<strong>Rp. ' + formatNumber(nilaiInvestasi.toFixed(0)) + '</strong>';
            document.getElementById('totalnilai').innerHTML = '<strong>Rp. ' + formatNumber(nilai.toFixed(0)) + '</strong>';

            document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(awaldana);
            document.getElementById('jmhtahun4').textContent = document.getElementById('jmhtahun').value + ' Tahun';
            document.getElementById('persentasebunga4').textContent = document.getElementById('persentasebunga').value + '%';
            document.getElementById('nilai1').textContent = 'Rp. ' + formatNumber(nilaiInvestasi.toFixed(0));
            document.getElementById('nilaitotal').textContent = 'Rp. ' + formatNumber(danaInvestasiAwal.toFixed(0));
            document.getElementById('totalnilai1').textContent = 'Rp. ' + formatNumber(nilai.toFixed(0));

            const chartData = [nilaiInvestasi, danaInvestasiAwal]; 

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

            chart.render(); // Render the chart

            const investasiBulananData = {
                awaldana: awaldana || '',
                jmhtahun: document.getElementById('jmhtahun').value,
                persentasebunga: document.getElementById('persentasebunga').value,
                danaInvestasiAwal: danaInvestasiAwal,
                nilaiInvestasi: nilaiInvestasi
            };

            localStorage.setItem('investasi-bulanan', JSON.stringify(investasiBulananData));
        }

        function calculateNilai() {
            const awaldana = parseFloat(document.getElementById('awaldana').value);
            const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
            const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);

            if (!isNaN(awaldana) && !isNaN(jmhtahun) && !isNaN(persentasebunga)) {
				const tingkatBungaPerBulan = persentasebunga / 100 / 12; // Tingkat bunga per bulan
				const totalSetoran = 12 * jmhtahun;
                const nilai = awaldana * ((Math.pow((1 + tingkatBungaPerBulan), totalSetoran) - 1) / tingkatBungaPerBulan) * (1 + tingkatBungaPerBulan);
                return nilai.toFixed(0);
            } else {
                return 0;
            }
        }

        function populateModalTable() {
            const awaldana = parseFloat(document.getElementById('awaldana').value);
            const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
            const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);
            
            document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(awaldana);
            
            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';

            const totalYears = 12 * jmhtahun;
            const tahunValues = Array.from({ length: totalYears }, (_, i) => i + 1);
            
            tahunValues.forEach(tahun => {
				const totalSetoran = tahun;
                const row = document.createElement('tr');
                
                const tahunCell = document.createElement('td');
                tahunCell.textContent = tahun;
                tahunCell.classList.add('text-center');
                row.appendChild(tahunCell);
                
                const investasiCell = document.createElement('td');
				const investasiNilai = awaldana * totalSetoran;
                investasiCell.textContent = formatNumber(investasiNilai);
                investasiCell.classList.add('text-center');
                row.appendChild(investasiCell);
                
                const nilaiInvestasiCell = document.createElement('td');
				const tingkatBungaPerBulan = persentasebunga / 100 / 12;
                const nilaiTahun = awaldana * ((Math.pow((1 + tingkatBungaPerBulan), totalSetoran) - 1) / tingkatBungaPerBulan) * (1 + tingkatBungaPerBulan);
                nilaiInvestasiCell.textContent = 'Rp. ' + formatNumber(nilaiTahun.toFixed(0));
                nilaiInvestasiCell.classList.add('text-center');
                row.appendChild(nilaiInvestasiCell);
                
                modalTableBody.appendChild(row);
            });
        }

        function populateFromLocalStorage() {
            const investasiBulananData = JSON.parse(localStorage.getItem('investasi-bulanan'));
            if (investasiBulananData) {
                document.getElementById('awaldana').value = investasiBulananData.awaldana || '';
                document.getElementById('awaldana4').textContent = 'Rp. ' + formatNumber(investasiBulananData.awaldana) || '';
                document.getElementById('awaldana1').value = formatNumber(investasiBulananData.awaldana) || '';
                document.getElementById('jmhtahun').value = investasiBulananData.jmhtahun || '';
                document.getElementById('persentasebunga').value = investasiBulananData.persentasebunga || '';
                document.getElementById('awaldana2').textContent = 'Rp. ' + formatNumber(investasiBulananData.awaldana || '');

                createOrUpdateChart();
                populateModalTable();
            }
        }

        if (localStorage.getItem('investasi-bulanan')) {
            populateFromLocalStorage();
        }

        document.querySelector('.btn-success').addEventListener('click', function() {
            createOrUpdateChart();
            populateModalTable();
        });

        document.querySelector('.btn-secondary').addEventListener('click', function() {
            localStorage.removeItem('investasi-bulanan');
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
            document.getElementById('nilaitotal').textContent = 'Rp. 0';
            document.getElementById('totalnilai1').textContent = 'Rp. 0';

            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';
        }

        document.getElementById('printModalToPdf').addEventListener('click', function () {
            console.log("Button clicked");

            const awaldana4 = document.getElementById('awaldana4').textContent.trim();
            const jmhtahun4 = document.getElementById('jmhtahun4').textContent.trim();
            const persentasebunga4 = document.getElementById('persentasebunga4').textContent.trim();
            const nilai1 = document.getElementById('nilai1').textContent.trim();
            const nilaitotal = document.getElementById('nilaitotal').textContent.trim();
            const totalnilai1 = document.getElementById('totalnilai1').textContent.trim();

            const summaryData = [
                ': ' + awaldana4,
                ': ' + jmhtahun4,
                ': ' + persentasebunga4,
                ': ' + nilaitotal,
                ': ' + nilai1,
                ': ' + totalnilai1 + '\n\n',
            ];
            
            const modalTableBody = document.getElementById('modalTableBody');
            const tableRows = Array.from(modalTableBody.querySelectorAll('tr'));
            
            const pdfTableBody = [
                [{ text: 'Bulan', style: 'tableHeader' }, { text: 'Investasi', style: 'tableHeader' }, { text: 'Nilai Investasi', style: 'tableHeader' }]
            ];
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                pdfTableBody.push([
                    cells[0].textContent, // Tahun
                    cells[1].textContent, // Investasi
                    cells[2].textContent  // Nilai Investasi
                ]);
            });
            
            const docDefinition = {
                content: [
                    {
                        alignment: 'justify',
                        columns: [
                            {
                                text: ['Rian Suputra\n', { text: 'rian@gmail.com', bold: false, color: 'gray' }],
                                bold: true
                            },
                            {
                                text: ['10/11/2024\nSmart Finance'],
                                style: ['alignRight'],
                                color: 'gray',
                            }
                        ]
                    },
                    {
                        text: '\nSimulasi Investasi Bulanan\n\n',
                        style: 'header',
                        alignment: 'center'
                    },
                    {
                        columns: [
                            {
                                stack: [
                                    {
                                        ul: [
                                            'Dana Bulanan',
                                            'Jangka Waktu',
                                            'Persentase Bunga',
                                            'Total Dana',
                                            'Nilai Investasi',
                                            'Total Nilai',
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
                            widths: [50, '*', '*'], // Adjust column widths
                            body: pdfTableBody // Use the dynamically generated rows
                        },
                        alignment: 'center',
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
            
            // Generate and open the PDF
            pdfMake.createPdf(docDefinition).open();
        });

        createOrUpdateChart();
    });
</script>

@endsection