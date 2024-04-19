@extends('layouts.tabler')

@section('title', 'Investasi')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Rancangan Investasi
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
						<a href="{{ route('investasi-lumpsum') }}" class="nav-link active" aria-selected="true" role="tab">Lumpsum</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-bulanan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-target') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Target</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">

                    <div class="tab-pane active show" id="tabs-lumpsum" role="tabpanel">

                        <div class="row row-cards">
                            <div class="col-md">
                            <div class="card">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">


                                        

                                        <div class="mb-3">
                                            <label class="form-label">Dana Investasi Awal : </label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                                <input type="text" id="awaldana" name="awaldana" class="form-control text-end" autocomplete="off">
                                                <input type="text" id="awaldana1" name="awaldana1" class="form-control text-end" autocomplete="off" hidden>
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
                                                <button type="button" class="btn btn-primary w-100">
                                                    Detail
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </div>
                                </div>

                            </div>

                            <div class="col-md">
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
                                                            <td style="width:40%;">Dana Investasi Awal</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="awaldana2">0</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:40%;">Jangka Waktu</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="jmhtahun2">0</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:40%;">Persentase Bunga</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="persentasebunga1">0</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:40%;">Nilai Investasi</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="nilai">0</td>
                                                        </tr>
                                                        <tr style="height:2.93rem;">
                                                            <td style="width:40%;">Total Nilai Investasi</td>
                                                            <td style="width:5%;">:</td>
                                                            <td style="width:%" class="text-end" id="totalnilai">0</td>
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
                                

                              
                        </div>


                    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Selecting the elements
    const awaldanaInput = document.getElementById('awaldana');
    const jmhtahunInput = document.getElementById('jmhtahun');
    const persentasebungaInput = document.getElementById('persentasebunga');
    const hitungButton = document.querySelector('.btn-success');
    const resetButton = document.querySelector('.btn-secondary');
    const detailButton = document.querySelector('.btn-primary');

    // Function to calculate the nilai
    function calculateNilai() {
        const awaldana = parseFloat(awaldanaInput.value);
        const jmhtahun = parseFloat(jmhtahunInput.value);
        const persentasebunga = parseFloat(persentasebungaInput.value);

        if (!isNaN(awaldana) && !isNaN(jmhtahun) && !isNaN(persentasebunga)) {
            const nilai = awaldana * Math.pow((1 + persentasebunga / 100), jmhtahun);
            return nilai.toFixed(2); // Round to 2 decimal places
        } else {
            return 'Invalid input';
        }
    }

    // Function to update the table
    function updateTable() {
        const awaldana = parseFloat(awaldanaInput.value);
        const jmhtahun = jmhtahunInput.value;

        document.getElementById('awaldana2').textContent = awaldanaInput.value;
        document.getElementById('jmhtahun2').textContent = `${jmhtahun} Tahun`;
        document.getElementById('persentasebunga1').textContent = persentasebungaInput.value + '%';
        document.getElementById('nilai').textContent = calculateNilai();

        const nilai = parseFloat(calculateNilai());
        const totalnilai = awaldana + nilai;
        
        document.getElementById('totalnilai').textContent = totalnilai.toFixed(2);
    }

    // Event listener for the Hitung button
    hitungButton.addEventListener('click', function() {
        updateTable();
    });

    // Event listener for the Reset button
    resetButton.addEventListener('click', function() {
        awaldanaInput.value = '';
        jmhtahunInput.value = '';
        persentasebungaInput.value = '';
        document.getElementById('awaldana2').textContent = '';
        document.getElementById('jmhtahun2').textContent = '';
        document.getElementById('persentasebunga1').textContent = '';
        document.getElementById('nilai').textContent = '';
        document.getElementById('totalnilai').textContent = '';
    });

    // Event listener for the Detail button (You can add functionality here if needed)
    detailButton.addEventListener('click', function() {
        // Add detail functionality here if needed
    });
});


</script>
@endsection