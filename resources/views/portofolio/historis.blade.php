@extends('layouts.user')

@section('title', 'Historis')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Historis
    </h2>
</div>

@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body card-body-scrollable" style="max-height: 400px">
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                    <thead>
                            <tr>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Yield</th>
                                <th class="text-center">IHSG</th>
                                <th class="text-center">LQ45</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                                <td style="width:5%"  class="text-center" colspan="2">2024</td>
                                                <td class="text-center" >10%</td>
                                            <td class="text-center" >
                                                    10%
                                                   
                                            </td>
                                            <td class="text-center" >10%</td>
                                           
                                            <td class="text-center" style="width:1%">
                                                
                                            </td>
                                        </tr>
                            
                                        <tr>
                                                <td style="width:5%"  class="text-center">2024</td>
                                                <td   class="text-center">Oktober</td>
                                                <td class="text-center" >10%</td>
                                            <td class="text-center" >
                                                    1%
                                                   
                                            </td>
                                            <td class="text-center" >3%</td>
                                           
                                            <td class="text-center" style="width:1%">
                                                <span class="btn-group" role="group">
                                                    <a href="" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                    <a href="" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td style="width:5%"  class="text-center">2024</td>
                                                <td   class="text-center">November</td>
                                                <td class="text-center" >20%</td>
                                            <td class="text-center" >
                                                    3%
                                                   
                                            </td>
                                            <td class="text-center" >5%</td>
                                           
                                            <td class="text-center" style="width:1%">
                                                <span class="btn-group" role="group">
                                                    <a href="" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                    <a href="" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td style="width:5%"  class="text-center">2024</td>
                                                <td   class="text-center">Desember</td>
                                                <td class="text-center" >5%</td>
                                            <td class="text-center" >
                                                    5%
                                                   
                                            </td>
                                            <td class="text-center" >7%</td>
                                           
                                            <td class="text-center" style="width:1%">
                                                <span class="btn-group" role="group">
                                                    <a href="" class="btn btn-sm btn-warning w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    </a>
                                                    <a href="" class="btn btn-sm btn-danger w-100 btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Sell">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        
                                        
                                        

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title"></h3>
                      <div class="ms-auto">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">2024</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-social-referrals"></div>
                  </div>
                </div>
              </div>


    </div>
</div>

<script>
    function formatNumberAvg(num) {
        const parts = num.toString().split(".");
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        const decimalPart = parts.length > 1 ? "," + parts[1] : "";
        return integerPart + decimalPart;
    }

    function updateFormattedNumberAvg() {
        var inputElementAvg = document.getElementById('avgprice');
        var rawValueAvg = inputElementAvg.value.replace(/\D/g, ''); // Remove non-numeric characters
        var formattedValueAvg = formatNumberAvg(rawValueAvg); // Format the number
        inputElementAvg.value = formattedValueAvg; // Update the input field with formatted value
        inputElementAvg.setAttribute('data-value', rawValueAvg); // Store unformatted value in a data attribute
        setUnformattedValueToInputAvg(); // Set the unformatted value to the input field jumlah1
    }

    function setUnformattedValueToInputAvg() {
        var unformattedValueAvg = getUnformattedValueAvg(); // Retrieve the unformatted value
        var inputElementAvg = document.getElementById('avgprice1');
        inputElementAvg.value = unformattedValueAvg; // Set the unformatted value to the input field jumlah1
    }
    // Function to get the unformatted value from the data attribute
    function getUnformattedValueAvg() {
        var inputElementAvg = document.getElementById('avgprice');
        var unformattedValueAvg = inputElementAvg.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
        return unformattedValueAvg;
    }
    // Attach event listener to the input field to trigger formatting as the user types
    document.getElementById('avgprice').addEventListener('input', updateFormattedNumberAvg);
</script>                     
                          
<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>
  
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
    });
</script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-social-referrals'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 288,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "straight",
            },
            series: [{
                name: "YIELD",
                data: [10, 20, 5],
            },{
                name: "IHSG",
                data: [1, 3, 5],
            },{
                name: "LQ45",
                data: [3, 5, 7],
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4,
                    formatter: function (value) {
                        return value + '%'; // Add the % sign to the Y-axis labels
                    }
                },
            },
            labels: [
                '2024-10', '2024-11', '2024-12'
            ],
            colors: [tabler.getColor("facebook"), tabler.getColor("twitter"), tabler.getColor("dribbble")],
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
        })).render();
    });
    // @formatter:on
</script>

@endsection