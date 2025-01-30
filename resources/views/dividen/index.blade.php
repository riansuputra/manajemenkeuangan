@extends('layouts.user')

@section('title', 'Dividen')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Dividen
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{\Carbon\Carbon::parse($lastUpdate)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> UTC+8</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center w-1">No.</th>
                                    <th class="text-center" colspan="2">Emiten</th>
                                    <th class="text-center" style="width:auto;">Dividen</th>
                                    <th class="text-center" style="width:auto;">Cum Date</th>
                                    <th class="text-center" style="width:auto;">Ex Date</th>
                                    <th class="text-center" style="width:auto;">Payment Date</th>
                                    <th class="text-center" style="width:auto;">Recording Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($dividenData))
                                @foreach($dividenData as $dividen)
                                <tr>
                                    <td class="text-center w-1">{{ $loop->index + 1 }}</td>
                                    <td class="w-1"><span class="avatar avatar-xs" style="background-image: url({{ $dividen['aset']['info'] }})"></span></td>
                                    <td class="text-muted">{{$dividen['aset']['deskripsi']}} <span class="fw-bold">({{$dividen['aset']['nama']}})</span></td>
                                    <td class="">
                                        <div class="row">
                                            <div class="col-auto">Rp.</div>
                                            <div class="col text-end">{{ number_format(($dividen['dividen'] ?? 0), 2, ',', '.') }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['cum_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['ex_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['recording_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($dividen['payment_date'])->locale('id')->translatedFormat('d F Y')}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">Belum ada data dividen.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");

		window.addEventListener("load", function() {
			spinner.style.display = "none";
			pageContent.style.display = "block";
			pageTitle.style.display = "block";
		});
    });
</script>
@endsection
