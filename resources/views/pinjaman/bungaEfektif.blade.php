@extends('layouts.tabler')

@section('title', 'Pinjaman')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Simulasi
    </div>
    <h2 class="page-title">
        Pinjaman Bunga Efektif
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col">
		<div class="card">
			<div class="card-body">
                <div class="row row-cards">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Pinjaman : </label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                                <input type="text" id="pinjamandana" name="pinjamandana" class="form-control text-end" autocomplete="off" hidden>
                                                <input type="text" id="pinjamandana1" name="pinjamandana1" class="form-control text-end" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jangka Waktu : </label>
                                            <div class="input-group">
                                                <input type="number" id="jmhtahun" name="jmhtahun" class="form-control text-end" autocomplete="off">
                                                <span class="input-group-text">
                                                    Bulan
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Persentase Bunga :</label>
                                                <div class="input-group">
    
                                                    <input type="number" id="persentasebunga" name="persentasebunga" class="form-control text-end" autocomplete="off">
                                                    <span class="input-group-text">
                                                        %/Tahun
                                                    </span>
                                                </div>
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
                        <div class="card-status-bottom bg-grey"></div>
                            <div class="card-body">
                                test
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
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
                                                            <td style="width:49%;">Jumlah Pinjaman</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="pinjamandana2">Rp. 0</td>
                                                        </tr>
                                                        <td style="width:%" class="text-end" id="pinjamandana3" hidden>0</td>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:49%;">Jangka Waktu</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="jmhtahun2">0 Bulan</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:49%;">Bunga per tahun</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="persentasebunga1">0%</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:49%;"><strong>Total Bunga</strong></td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="nilai"><strong>Rp. 0</strong></td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:49%;"><strong>Total Angsuran</strong></td>
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
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal modal-blur fade" id="modal-scrollable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Angsuran Bunga</th>
                                    <th class="text-center">Angsuran Pokok</th>
                                    <th class="text-center">Total Angsuran</th>
                                    <th class="text-center">Sisa Pinjaman</th>
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
        var inputElement = document.getElementById('pinjamandana1');
        var rawValue = inputElement.value.replace(/\D/g, '');
        var formattedValue = formatNumber(rawValue);
        inputElement.value = formattedValue;
        inputElement.setAttribute('data-value', rawValue);
        setUnformattedValueToInput3();
    }

    function setUnformattedValueToInput3() {
        var unformattedValue = getUnformattedValue3();
        var inputElement = document.getElementById('pinjamandana');
        inputElement.value = unformattedValue;
    }

    function getUnformattedValue3() {
        var inputElement = document.getElementById('pinjamandana1');
        var unformattedValue = inputElement.getAttribute('data-value') || '';
        return unformattedValue;
    }

    document.getElementById('pinjamandana1').addEventListener('input', updateFormattedNumber3);
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
            const pinjamandana = parseFloat(document.getElementById('pinjamandana').value);
            const nilai = calculateNilai();
            const totalPayment = nilai.total_payment;
            const totalInterest = nilai.total_payment - pinjamandana;

            if (nilai && nilai.monthly_payments && nilai.monthly_payments.length && nilai.total_payment !== null) { // Check if nilai is not null
        const monthlyPayment = totalPayment - pinjamandana;

        document.getElementById('pinjamandana2').textContent = 'Rp. ' + formatNumber(pinjamandana);
            document.getElementById('pinjamandana3').textContent = pinjamandana;
            document.getElementById('jmhtahun2').textContent = document.getElementById('jmhtahun').value + ' Bulan';
            document.getElementById('persentasebunga1').textContent = document.getElementById('persentasebunga').value + '%';
            // document.getElementById('nilai').innerHTML = '<strong>Rp. ' + nilai.toFixed(0) + '</strong>';
            document.getElementById('nilai').innerHTML = '<strong>Rp. ' + formatNumber(monthlyPayment.toFixed(2)) + '</strong>';
            document.getElementById('totalnilai').innerHTML = '<strong>Rp. ' + formatNumber(nilai.total_payment.toFixed(2)) + '</strong>';
        
        // Proceed with chart creation or update
        const chartData = [totalInterest, pinjamandana]; 
            


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
                labels: ["Total Angsuran Bunga", "Total Angsuran Pokok"], // Switched the order
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val.toFixed(2));
                        },
                    },
                    fillSeriesColor: false
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: 0,
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
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

            const rancanganPinjamanBungaEfektifData = {
                pinjamandana: pinjamandana || '',
                jmhtahun: document.getElementById('jmhtahun').value,
                persentasebunga: document.getElementById('persentasebunga').value,
            };

            localStorage.setItem('rancangan-pinjaman-bunga-efektif', JSON.stringify(rancanganPinjamanBungaEfektifData));
    } else {
        console.error("Error calculating nilai.");
        // Handle the case where nilai is null
    }
            
            // const monthlyPayment = nilai.monthly_payments[1].monthly_payment;
            // const totalPayment = nilai.total_payment
            // const totalInterest = nilai.total_payment - pinjamandana
            // console.log(nilai.total_payment);


            
        }

        function calculateNilai() {
    const pinjamandana = parseFloat(document.getElementById('pinjamandana').value);
    const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
    const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);

    if (!isNaN(pinjamandana) && !isNaN(jmhtahun) && !isNaN(persentasebunga)) {
        const tingkatBungaPerBulan = persentasebunga / 100 / 12; // Tingkat bunga per bulan
        let remainingLoan = pinjamandana;
        const monthlyPayments = [];
        let totalPayment = 0;

        for (let i = 1; i <= jmhtahun; i++) {
            const interestPayment = remainingLoan * tingkatBungaPerBulan;
            const principalPayment = (pinjamandana / jmhtahun);
            const monthlyPayment = interestPayment + principalPayment;
            remainingLoan -= principalPayment;
            totalPayment += monthlyPayment;

            monthlyPayments.push({
                'month': i,
                'monthly_payment': monthlyPayment,
                'interest_payment': interestPayment,
                'principal_payment': principalPayment,
                'remaining_loan': remainingLoan,
            });
        }

        return {
            'monthly_payments': monthlyPayments,
            'total_payment': totalPayment,
        };
    } else {
        return 'Invalid input';
    }
}



        function populateModalTable() {
    const pinjamandana = parseFloat(document.getElementById('pinjamandana').value);
    const persentasebunga = parseFloat(document.getElementById('persentasebunga').value);
    const jmhtahun = parseFloat(document.getElementById('jmhtahun').value);
    
    const modalTableBody = document.getElementById('modalTableBody');
    modalTableBody.innerHTML = '';

    const tingkatBungaPerBulan = persentasebunga / 100 / 12; // Tingkat bunga per bulan
    let remainingLoan = pinjamandana;
    const totalBulan = jmhtahun; // Total bulan



    // Create a row for index 0 with sisa pinjaman value from pinjamandana
    const firstRow = document.createElement('tr');
    
    const bulanCellFirstRow = document.createElement('td');
    bulanCellFirstRow.textContent = 0;
    bulanCellFirstRow.classList.add('text-center');
    firstRow.appendChild(bulanCellFirstRow);

    const angsuranBungaFirstRow = document.createElement('td');
    angsuranBungaFirstRow.textContent = 'Rp. 0,00';
    angsuranBungaFirstRow.classList.add('text-end'); // Apply CSS classes
    firstRow.appendChild(angsuranBungaFirstRow);

    const angsuranPokokFirstRow = document.createElement('td');
    angsuranPokokFirstRow.textContent = 'Rp. 0,00';;
    angsuranPokokFirstRow.classList.add('text-end'); // Apply CSS classes
    firstRow.appendChild(angsuranPokokFirstRow);

    const totalAngsuranTdFirstRow = document.createElement('td');
    totalAngsuranTdFirstRow.textContent = 'Rp. 0,00';;
    totalAngsuranTdFirstRow.classList.add('text-end'); // Apply CSS classes
    firstRow.appendChild(totalAngsuranTdFirstRow);

    const sisaPinjamanFirstRow = document.createElement('td');
    sisaPinjamanFirstRow.textContent = 'Rp. ' + formatNumber(remainingLoan.toFixed(2));
    sisaPinjamanFirstRow.classList.add('text-end'); // Apply CSS classes
    firstRow.appendChild(sisaPinjamanFirstRow);

    modalTableBody.appendChild(firstRow);

    let totalAngsuranBunga = 0;
    let totalAngsuranPokok = 0;
    let totalTotalAngsuran = 0;
    let totalSisaPinjaman = remainingLoan;

    // Main loop for remaining rows
    for (let i = 1; i <= jmhtahun; i++) {
        const interestPayment = remainingLoan * tingkatBungaPerBulan;
        const principalPayment = (pinjamandana / jmhtahun);
        const nilai = interestPayment + principalPayment;

        remainingLoan -= principalPayment;

        totalAngsuranBunga += interestPayment;
        totalAngsuranPokok += principalPayment;
        totalTotalAngsuran += nilai;

        const row = document.createElement('tr');
        
        const bulanCell = document.createElement('td');
        bulanCell.textContent = i; // Display the number of months
        bulanCell.classList.add('text-center');
        row.appendChild(bulanCell);
        
        const angsuranBunga = document.createElement('td');
        angsuranBunga.textContent ='Rp. ' +  formatNumber(interestPayment.toFixed(2));
        angsuranBunga.classList.add('text-end'); // Apply CSS classes
        row.appendChild(angsuranBunga);

        const angsuranPokok = document.createElement('td');
        angsuranPokok.textContent = 'Rp. ' + formatNumber(principalPayment.toFixed(2));
        angsuranPokok.classList.add('text-end'); // Apply CSS classes
        row.appendChild(angsuranPokok);

        const totalAngsuranTd = document.createElement('td');
        totalAngsuranTd.textContent ='Rp. ' +  formatNumber(nilai.toFixed(2));
        totalAngsuranTd.classList.add('text-end'); // Apply CSS classes
        row.appendChild(totalAngsuranTd);
        
        const sisaPinjaman = document.createElement('td');
        sisaPinjaman.textContent = 'Rp. ' + formatNumber(remainingLoan.toFixed(2));
        sisaPinjaman.classList.add('text-end'); // Apply CSS classes
        row.appendChild(sisaPinjaman);
        
        modalTableBody.appendChild(row);
    }

    // Create the last row with totals
    const lastRow = document.createElement('tr');
    lastRow.classList.add('font-weight-bold');

    const bulanCellLastRow = document.createElement('td');
    bulanCellLastRow.textContent = 'Total';
    bulanCellLastRow.classList.add('text-center');
    lastRow.appendChild(bulanCellLastRow);

    const totalAngsuranBungaCell = document.createElement('td');
    totalAngsuranBungaCell.textContent = 'Rp. ' + formatNumber(totalAngsuranBunga.toFixed(2));
    totalAngsuranBungaCell.classList.add('text-end'); // Apply CSS classes
    lastRow.appendChild(totalAngsuranBungaCell);

    const totalAngsuranPokokCell = document.createElement('td');
    totalAngsuranPokokCell.textContent = 'Rp. ' + formatNumber(totalAngsuranPokok.toFixed(2));
    totalAngsuranPokokCell.classList.add('text-end'); // Apply CSS classes
    lastRow.appendChild(totalAngsuranPokokCell);

    const totalTotalAngsuranCell = document.createElement('td');
    totalTotalAngsuranCell.textContent ='Rp. ' +  formatNumber(totalTotalAngsuran.toFixed(2));
    totalTotalAngsuranCell.classList.add('text-end'); // Apply CSS classes
    lastRow.appendChild(totalTotalAngsuranCell);

    const totalSisaPinjamanCell = document.createElement('td');
    totalSisaPinjamanCell.textContent = 'Rp. 0,00';
    totalSisaPinjamanCell.classList.add('text-end'); // Apply CSS classes
    lastRow.appendChild(totalSisaPinjamanCell);

    modalTableBody.appendChild(lastRow);
}





        function populateFromLocalStorage() {
            const rancanganPinjamanBungaEfektifData = JSON.parse(localStorage.getItem('rancangan-pinjaman-bunga-efektif'));
            if (rancanganPinjamanBungaEfektifData) {
                document.getElementById('pinjamandana').value = rancanganPinjamanBungaEfektifData.pinjamandana || '';
                document.getElementById('pinjamandana1').value = formatNumber(rancanganPinjamanBungaEfektifData.pinjamandana) || '';
                document.getElementById('jmhtahun').value = rancanganPinjamanBungaEfektifData.jmhtahun || '';
                document.getElementById('persentasebunga').value = rancanganPinjamanBungaEfektifData.persentasebunga || '';
                document.getElementById('pinjamandana2').textContent = 'Rp. ' + rancanganPinjamanBungaEfektifData.pinjamandana || '';

                createOrUpdateChart();
                populateModalTable();
            }
        }

        if (localStorage.getItem('rancangan-pinjaman-bunga-efektif')) {
            populateFromLocalStorage();
        }

        document.querySelector('.btn-success').addEventListener('click', function() {
            createOrUpdateChart();
            populateModalTable();
        });

        document.querySelector('.btn-secondary').addEventListener('click', function() {
            localStorage.removeItem('rancangan-pinjaman-bunga-efektif');
            const pinjamandanaInput = document.getElementById('pinjamandana');
            const pinjamandanaInput1 = document.getElementById('pinjamandana1');
            const jmhtahunInput = document.getElementById('jmhtahun');
            const persentasebungaInput = document.getElementById('persentasebunga');
            pinjamandanaInput.value = '';
            pinjamandanaInput1.value = '';
            jmhtahunInput.value = '';
            persentasebungaInput.value = '';
            document.getElementById('pinjamandana2').textContent = 'Rp. 0';
            document.getElementById('pinjamandana3').textContent = '';
            document.getElementById('jmhtahun2').textContent = '0 Bulan';
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
            

            const modalTableBody = document.getElementById('modalTableBody');
            modalTableBody.innerHTML = '';
        }

        document.getElementById('printModalToPdf').addEventListener('click', function() {
            console.log("Button clicked");
                const docDefinition = {
                    content: [
                        'Investasi Bulanan Detail',
                        { text: 'Dana Awal: Rp. 100,000', margin: [0, 10] },
                        { text: 'Jangka Waktu: 5 Tahun', margin: [0, 10] },
                        { text: 'Persentase Bunga: 10%', margin: [0, 10] },
                        { text: 'Nilai Investasi: Rp. 150,000', margin: [0, 10] },
                        { text: 'Total Nilai: Rp. 250,000', margin: [0, 10] }
                    ]
                };

                pdfMake.createPdf(docDefinition).download('rancangan-pinjaman-bunga-efektif.pdf');
            });

        createOrUpdateChart();
    });
</script>

@endsection