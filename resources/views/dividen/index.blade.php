@extends('layouts.user')

@section('title', 'Kurs')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Dividen
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black"></span> UTC+8</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center w-1">No.</th>
                                <th class="text-center" colspan="2">Mata Uang</th>
                                <th class="text-center w-2">Kode</th>
                                <th class="text-center">Nilai Dalam Rupiah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dividenData as $dividen)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="w-1"><span class="flag flag-country-{{$dividen['emiten']}}"></span></td>
                                <td class="text-muted">{{$dividen['emiten']}}</td>
                                <td class="text-muted">{{$dividen['emiten']}}</td>
                                <td class="w-5">
                                    <div class="row">
                                        <div class="col-auto">Rp.</div>
                                        <div class="col text-end">
                                            {{ $dividen['emiten'] }}
                                        
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="green"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.293 7.293a1 1 0 0 1 1.32 -.083l.094 .083l6 6l.083 .094l.054 .077l.054 .096l.017 .036l.027 .067l.032 .108l.01 .053l.01 .06l.004 .057l.002 .059l-.002 .059l-.005 .058l-.009 .06l-.01 .052l-.032 .108l-.027 .067l-.07 .132l-.065 .09l-.073 .081l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002h-12c-.852 0 -1.297 -.986 -.783 -1.623l.076 -.084l6 -6z" /></svg>
                                        
                                        
                                        </div>
                                    </div>
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
