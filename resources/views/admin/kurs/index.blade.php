@extends('layouts.admin')

@section('title', 'Kurs')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
	<h2 class="page-title">
        Kurs
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{\Carbon\Carbon::parse($update)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> WITA</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="{{url('/kurs-store')}}" class="btn btn-tabler d-none d-sm-inline-block" aria-label="Tabler">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
            Perbarui Data
        </a>
        <a href="{{url('/kurs-store')}}" class="btn btn-primary d-sm-none btn-icon">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
		</a>    
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="col-sm-12">
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
                                @foreach($kursData as $kurs)
                                <tr>
                                    <td>{{$kurs['id']}}</td>
                                    <td class="w-1"><span class="flag flag-country-{{$kurs['ikon']}}"></span></td>
                                    <td class="text-muted">{{$kurs['nama_mata_uang']}}</td>
                                    <td class="text-muted">{{$kurs['kode_mata_uang']}}</td>
                                    <td class="w-5">
                                        <div class="row">
                                            <div class="col-auto">Rp.</div>
                                            <div class="col text-end">
                                                {{ number_format(preg_replace('/[^\d]/', '', $kurs['nilai_tukar']), 0, '.', '.') }}
                                            @if(str_starts_with($kurs['nilai_tukar'], '+'))
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="green"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.293 7.293a1 1 0 0 1 1.32 -.083l.094 .083l6 6l.083 .094l.054 .077l.054 .096l.017 .036l.027 .067l.032 .108l.01 .053l.01 .06l.004 .057l.002 .059l-.002 .059l-.005 .058l-.009 .06l-.01 .052l-.032 .108l-.027 .067l-.07 .132l-.065 .09l-.073 .081l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002h-12c-.852 0 -1.297 -.986 -.783 -1.623l.076 -.084l6 -6z" /></svg>
                                            @elseif(str_starts_with($kurs['nilai_tukar'], '-'))
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="red"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" /></svg>
                                            @else
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="red"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/></svg>
                                            @endif

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
<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
<input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" hidden>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection
