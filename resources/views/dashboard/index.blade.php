@extends('layouts.tabler')

@section('title', 'Dashboard')

@section('page-title')
<div class="col-auto me-auto d-print-none">
    <h2 class="page-title">
        Dashboard
    </h2>
</div>
<div class="col-auto d-print-none" >
    <select class="form-select" name="jenisFilter" id="jenisFilter">
    	<option value="Kisaran" selected>Kisaran</option>
      	<option value="Mingguan">Mingguan</option>
      	<option value="Bulanan">Bulanan</option>
      	<option value="Tahunan">Tahunan</option>
    </select>
</div>
<div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter"></div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
    	<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
				Tambah Catatan
			</a>
		<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>    
    </div>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row row-deck row-cards">
	<div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              Total Catatan
                            </div>
                            <div class="text-muted">
                              12 Catatan
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              Pendapatan
                            </div>
                            <div class="text-muted">
                              32 Catatan
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              Pengeluaran
                            </div>
                            <div class="text-muted">
                              16 Catatan
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center mb-3">
						<div class="subheader">Sales</div>
                      	<div class="ms-auto lh-1">
							<a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last e7 days</a>
                      	</div>
                    </div>
					<div class="d-flex align-items-center mb-3">
						<div class="lh-1">
						  <a class="text-black" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
						</div>
						<div class="h1 ms-auto" style="margin-bottom:0;">75%</div>
						
                    </div>
					<div class="d-flex align-items-center mb-3">
						<div class="lh-1">
						  <a class="text-black" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
						</div>
						<div class="h1 ms-auto" style="margin-bottom:0;">75%</div>
						
                    </div>
					<div class="d-flex align-items-center">
						<div class="lh-1">
						  <a class="text-black" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
						</div>
						<div class="h1 ms-auto" style="margin-bottom:0;">75%</div>
						
                    </div>
                    
				</div>
			</div>
		</div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Sales</div>
                      <div class="ms-auto lh-1">
                          <a class="text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                      </div>
                    </div>
                    <div class="h1 mb-3">75%</div>
                    <div class="d-flex mb-2">
                      <div>Conversion rate</div>
                      <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 17l6 -6l4 4l8 -8"></path><path d="M14 7l7 0l0 7"></path></svg>
                        </span>
                      </div>
                    </div>
                    <div class="progress progress-lg mb-3">
                      <div class="progress-bar bg-green" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                        <span class="visually-hidden">75% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex mb-2">
                      <div>Conversion rate</div>
                      <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                          7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 17l6 -6l4 4l8 -8"></path><path d="M14 7l7 0l0 7"></path></svg>
                        </span>
                      </div>
                    </div>
                    <div class="progress progress-lg mb-2">
                      <div class="progress-bar bg-red" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                        <span class="visually-hidden">75% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Traffic summary</h3>
                    <div id="chart-mentions" class="chart-lg" style="min-height: 240px;"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Locations</h3>
                    <div class="ratio ratio-21x9">
                      
                    </div>
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
    

    jenisSelect.addEventListener("change", function() {
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

            const option1 = document.createElement("option");
            option1.text = "Hari Ini";
            option1.value = "iniHari";
            selectKisaran.add(option1);

            const option2 = document.createElement("option");
            option2.text = "7 Hari";
            option2.value = "7Hari";
            selectKisaran.add(option2);

            const option3 = document.createElement("option");
            option3.text = "30 Hari";
            option3.value = "30Hari";
            selectKisaran.add(option3);

            const option4 = document.createElement("option");
            option4.text = "90 Hari";
            option4.value = "60Hari";
            selectKisaran.add(option4);

            const option5 = document.createElement("option");
            option5.text = "12 Bulan";
            option5.value = "12Bulan";
            selectKisaran.add(option5);

            const option6 = document.createElement("option");
            option6.text = "Semua";
            option6.value = "semuaHari";
            selectKisaran.add(option6);

            // Set "Semua" option selected by default
            option6.selected = true;

            pilihanDiv.appendChild(selectKisaran);

            // Trigger change event to select "Semua" by default
            const changeEvent = new Event("change");
            jenisSelect.dispatchEvent(changeEvent);
        }
    });

    // Trigger change event on page load
    const initialEvent = new Event("change");
    jenisSelect.dispatchEvent(initialEvent);
});






</script>

@endsection