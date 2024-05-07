@extends('layouts.tabler')

@section('title', 'Statistik')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Statistik
    </h2>
</div>
<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('statistik-filter') }}" method="POST">
		@csrf
		<div class="col-auto d-print-none">
		<select class="form-select" name="jenisFilter" id="jenisFilter">
    <option value="Kisaran" {{ $jenisFilter == 'Kisaran' ? 'selected' : '' }}>Kisaran</option>
    <option value="Mingguan" {{ $jenisFilter == 'Mingguan' ? 'selected' : '' }}>Mingguan</option>
    <option value="Bulanan" {{ $jenisFilter == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
    <option value="Tahunan" {{ $jenisFilter == 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
</select>

		</div>
		<div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter"></div>
		<div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
			<button type="submit" class="btn w-100 btn-icon" aria-label="Tabler">
				<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" /><path d="M15 19l2 2l4 -4" /></svg>
			</button>
		</div>
	</form>
</div>
@endsection

@section('content')

<div class="container-xl">
    <div class="row row-cards">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-status-top bg-green"></div>
                <div class="card-header">
                    <h3 class="card-title">Pemasukan</h3>
                </div>
                <div class="card-body">
                    <div id="chart-demo-pie" style="min-height: 201.9px;"></div>
                    
                </div>
                <div class="card-table table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th style="width:30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedPemasukanData as $stat)
                                <tr>
                                    <td>{{ $stat['kategori'] }}</td>
                                    <td>{{ $stat['jumlah_catatan'] }} Catatan</td>
                                    <td class="d-flex justify-content-between">
                                        <span class="text-start text-green">Rp.</span>
                                        <span class="text-end text-green">{{ number_format(floatval($stat['total_jumlah']), 0, ',', '.')}}</span>
                                    </td> 
                                </tr>           
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-status-top bg-red"></div>
                <div class="card-header">
                    <h3 class="card-title">Pengeluaran</h3>
                </div>
                <div class="card-body">
                    <div id="chart-demo-pie#2" style="min-height: 201.9px;"></div>
                    
                </div>
                <div class="card-table table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                        <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th style="width:30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedPengeluaranData as $stat)
                                <tr>
                                    <td>{{ $stat['kategori'] }}</td>
                                    <td>{{ $stat['jumlah_catatan'] }} Catatan</td>
                                    <td class="d-flex justify-content-between">
                                        <span class="text-start text-red">Rp.</span>
                                        <span class="text-end text-red">{{ number_format(floatval($stat['total_jumlah']), 0, ',', '.')}}</span>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
    	const jenisSelect = document.getElementById("jenisFilter");
    	const pilihanDiv = document.getElementById("pilihanFilter");

	    const spinner = document.getElementById("spinner");
    	const pageContent = document.getElementById("page-content");
    	const pageTitle = document.getElementById("page-title");

    // Hide spinner and show page content when fully loaded
	    window.addEventListener("load", function() {
    	    spinner.style.display = "none";
	        pageContent.style.display = "block";
        	pageTitle.style.display = "block";
    	});

    // Function to show spinner
    

		function handleChange() {
    const selectedOption = jenisSelect.value;
    // Clear existing content
    pilihanDiv.innerHTML = "";

    if (selectedOption === "Mingguan") {
        // Create input type week
        const inputWeek = document.createElement("input");
        inputWeek.type = "week";
        inputWeek.classList.add("form-control");
        inputWeek.setAttribute("name", "filterMingguan");
        inputWeek.setAttribute("id", "filterMingguan");
        pilihanDiv.appendChild(inputWeek);
    } else if (selectedOption === "Bulanan") {
        // Create input type month
        const inputMonth = document.createElement("input");
        inputMonth.type = "month";
        inputMonth.classList.add("form-control");
        inputMonth.setAttribute("name", "filterBulanan");
        inputMonth.setAttribute("id", "filterBulanan");
        pilihanDiv.appendChild(inputMonth);
    } else if (selectedOption === "Tahunan") {
        // Create input type number for year
        const inputYear = document.createElement("input");
        inputYear.type = "number";
        inputYear.min = "1900";
        inputYear.max = "2099";
        inputYear.step = "1";
        inputYear.value = "2024";
        inputYear.classList.add("form-control");
        inputYear.setAttribute("name", "filterTahunan");
        inputYear.setAttribute("id", "filterTahunan");
        pilihanDiv.appendChild(inputYear);
    } else if (selectedOption === "Kisaran") {
        // Create select with options for Kisaran
        const selectKisaran = document.createElement("select");
        selectKisaran.classList.add("form-select");
        selectKisaran.setAttribute("name", "filterKisaran");
        selectKisaran.setAttribute("id", "filterKisaran");

        const options = [
            { text: "Semua", value: "semuaHari" },
            { text: "Hari Ini", value: "iniHari" },
            { text: "7 Hari", value: "7Hari" },
            { text: "30 Hari", value: "30Hari" },
            { text: "90 Hari", value: "90Hari" },
            { text: "12 Bulan", value: "12Bulan" },
        ];

        options.forEach(optionData => {
            const option = document.createElement("option");
            option.text = optionData.text;
            option.value = optionData.value;

            // Check if option value matches the passed value
            if (option.value === '{{ $filterValue }}') {
                option.selected = true;
            }

            selectKisaran.add(option);
        });

        pilihanDiv.appendChild(selectKisaran);
    }
}

function handleSubmit(event) {
    event.preventDefault(); // Prevent form submission

    const selectedOption = jenisSelect.value;

    if (selectedOption === "Mingguan") {
        const filterMingguan = document.getElementById("filterMingguan").value;
        // Now you have the value of the selected week, you can do whatever you need with it
    } else if (selectedOption === "Bulanan") {
        const filterBulanan = document.getElementById("filterBulanan").value;
        // Now you have the value of the selected month, you can do whatever you need with it
    } else if (selectedOption === "Tahunan") {
        const filterTahunan = document.getElementById("filterTahunan").value;
        // Now you have the value of the selected year, you can do whatever you need with it
    } else if (selectedOption === "Kisaran") {
        const filterKisaran = document.getElementById("filterKisaran").value;
        // Now you have the value of the selected Kisaran option, you can do whatever you need with it
    }

    // Now you can submit the form data, or perform any other action based on the selected option
}



		// Add event listener for change event
		jenisSelect.addEventListener("change", handleChange);

		// Trigger change event on page load
		const initialEvent = new Event("change");
		jenisSelect.dispatchEvent(initialEvent);
	});

	
</script>
</script>
          
<script>
    console.log("Pemasukan Data:", @json($groupedPemasukanData));
    console.log("Pengeluaran Data:", @json($groupedPengeluaranData));
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        
        const pemasukanData = @json($groupedPemasukanData);
        
        if (typeof pemasukanData === 'object' && !Array.isArray(pemasukanData)) {
            const seriesData = Object.values(pemasukanData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const greenShades = [
                    "rgb(0, 255, 0)",       // Lime Green
                    "rgb(50, 205, 50)",     // Lime Green
                    "rgb(0, 128, 0)",       // Green
                    "rgb(34, 139, 34)",     // Forest Green
                    "rgb(0, 100, 0)",       // Dark Green
                ];
                const color = greenShades[index % greenShades.length]; // Cycle through shades
                
                const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
                
                return {
                    value: value,
                    color: rgbaColor
                };
            });
            
            const labelsData = Object.values(pemasukanData).map(stat => stat['kategori']);
            
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: seriesData.map(data => data.value),
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: seriesData.map(data => data.color), // Use colors with reduced opacity
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
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val.toFixed(2));
                        },
                    },
                    fillSeriesColor: false
                },
            })).render();
        } else {
            console.error("Pemasukan data is not an object:", pemasukanData);
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pengeluaranData = @json($groupedPengeluaranData);
        
        if (typeof pengeluaranData === 'object' && !Array.isArray(pengeluaranData)) {
            const seriesData = Object.values(pengeluaranData).map((stat, index) => {
                const value = parseFloat(stat['total_jumlah']);
                const redShades = [
                    "rgb(255, 0, 0)",       // Red
                    "rgb(220, 20, 60)",     // Crimson
                    "rgb(178, 34, 34)",     // Firebrick
                    "rgb(139, 0, 0)",       // Dark Red
                    "rgb(205, 92, 92)",     // Indian Red
                ];
                const color = redShades[index % redShades.length]; // Cycle through shades
                
                const rgbaColor = color.replace(')', ', 0.8)').replace('rgb', 'rgba');
                
                return {
                    value: value,
                    color: rgbaColor
                };
            });
            
            const labelsData = Object.values(pengeluaranData).map(stat => stat['kategori']);
            
            console.log("Pemasukan Series Data:", seriesData);
            console.log("Pemasukan Labels Data:", labelsData);

            window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie#2'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 240,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                series: seriesData.map(data => data.value),
                labels: labelsData,
                fill: {
                    opacity: 1,
                },
                colors: seriesData.map(data => data.color), // Use colors with reduced opacity
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
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return 'Rp. ' + formatNumber(val.toFixed(2));
                        },
                    },
                    fillSeriesColor: false
                },
            })).render();
        } else {
            console.error("Pemasukan data is not an object:", pengeluaranData);
        }
    });
</script>



@endsection