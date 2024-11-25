@extends('layouts.user')

@section('title', 'Pinjaman')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Dividen Saham
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
<div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-vcenter table-striped" style="--tblr-table-striped-bg: #f6f8fb;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Emiten</th>
                                <th class="text-center">Dividen</th>
                                <th class="text-center">Dividen Yield</th>
                                <th class="text-center">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dividenData as $dividen)
                            <tr>
                                <td style="width:1%" class="text-center">{{$loop->iteration}}</td>
                                <td style="width:6%">{{$dividen['saham']}}</td>
                                <td class="text-end">{{$dividen['dividen']}}</td>
                                <td class="text-end">{{$dividen['dividen_yield']}}</td>
                                <td class="text-end">{{ \Carbon\Carbon::parse($dividen['tanggal'])->locale('id')->translatedFormat('d F Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Detail -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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
@endsection