<div class="col-auto d-print-none" >
	<form class="row"id="filterForm" action="{{ route('dashboard-filter') }}" method="GET">
		@csrf
		<div class="col-auto d-print-none">
		    <select class="form-select" name="jenisFilter" id="jenisFilter">
                <option value="Range" {{ $jenisFilter == 'Kisaran' ? 'selected' : '' }}>Kisaran</option>
                <option value="Mingguan" {{ $jenisFilter == 'Mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="Bulanan" {{ $jenisFilter == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="Tahunan" {{ $jenisFilter == 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
                <option value="Custom Range" {{ $jenisFilter == 'Range' ? 'selected' : '' }}>Range</option>
            </select>
		</div>
		<div class="col-auto d-print-none" name="pilihanFilter" id="pilihanFilter">
            <select class="form-select" name="filterRange" id="filterRange">
                <option value="semuaHari">Semua</option>
                <option value="iniHari">Hari Ini</option>
                <option value="7Hari">7 Hari</option>
                <option value="30Hari">30 Hari</option>
                <option value="90Hari">90 Hari</option>
                <option value="12Bulan">12 Bulan</option>
            </select>
            <input class="form-control" id="filterCustomRange1" name="filterCustomRange1" type="date">
            <input class="form-control" id="filterCustomRange2" name="filterCustomRange2" type="date">
            <input class="form-control" id="filteMonth" name="filterMonth" type="month">
            <input class="form-control" id="filterWeek" name="filterWeek" type="week">
            <input class="form-control" id="filterYear" name="filterYear" type="number" min="1900" max="2099" step="1" value="2024">
        </div>
		<div class="col-auto d-print-none" name="btnFilter" id="btnFilter">
			<button type="submit" class="btn w-100 btn-icon" aria-label="Tabler">
				<svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" /><path d="M15 19l2 2l4 -4" /></svg>
			</button>
		</div>
	</form>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    	const jenisSelect = document.getElementById("jenisFilter");
    	const pilihanDiv = document.getElementById("pilihanFilter");

	    const spinner = document.getElementById("spinner");
    	const pageContent = document.getElementById("page-content");
    	const pageTitle = document.getElementById("page-title");

	    window.addEventListener("load", function() {
    	    spinner.style.display = "none";
	        pageContent.style.display = "block";
        	pageTitle.style.display = "block";
    	});


        function handleChange() {
            const selectedOption = jenisSelect.value;

            if (selectedOption === "Weeks") {
                const inputWeeks = document.getElementById("filterWeek");
                inputWeeks.style.display = "block";
            } else if (selectedOption === "Months") {
                const inputMonths = document.getElementById("filterMonth");
                inputMonths.style.display = "block";
            } else if (selectedOption === "Years") {
                const inputYears = document.getElementById("filterYear");
                inputYears.style.display = "block";
            } else if (selectedOption === "Range") {
                const selectRange = document.getElementById("filterRange");
                selectRange.style.display("block");
            } else if (selectedOption === "Custom Range") {
                const inputCustomRange1 = document.getElementById("filterCustomRange1");
                const inputCustomRange2 = document.getElementById("filterCustomRange2");
                inputCustomRange1.style.display("block");
                inputCustomRange2.style.display("block");
            }
        }

        function handleSubmit(event) {
            event.preventDefault(); // Prevent form submission

            const selectedOption = jenisSelect.value;

            if (selectedOption === "Weeks") {
                const filterWeeks = document.getElementById("filterWeeks").value;
            } else if (selectedOption === "Months") {
                const filterMonths = document.getElementById("filterMonths").value;
            } else if (selectedOption === "Years") {
                const filterYears = document.getElementById("filterYears").value;
            } else if (selectedOption === "Range") {
                const filterRange = document.getElementById("filterRange").value;
            } else if (selectedOption === "Custom Range") {
                const filterCustomRange = document.getElementById("filterCustomRange").value;
            }
        }

        jenisSelect.addEventListener("change", handleChange);

        const initialEvent = new Event("change");
        jenisSelect.dispatchEvent(initialEvent);
	});
</script>