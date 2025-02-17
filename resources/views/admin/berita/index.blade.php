@extends('layouts.admin')

@section('title', 'Berita')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
	<h2 class="page-title">
        Berita
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{\Carbon\Carbon::parse($update)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> WITA</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="{{route('admin.berita.store')}}" class="btn btn-tabler d-none d-sm-inline-block" aria-label="Tabler">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
            Perbarui Data
        </a>
        <a href="{{route('admin.berita.store')}}" class="btn btn-primary d-sm-none btn-icon">
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
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Tanggal Terbit</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Nama Penerbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beritaData as $berita)
                                <tr>
                                    <td class="text-center">{{$loop->index + 1}}</td>
                                    <td class="text-muted">{{$berita['judul']}}</td>
                                    <td class="text-muted">{{\Carbon\Carbon::parse($berita['tanggal_terbit'])->locale('id')->translatedFormat('l, d F Y H:i')}}</td>
                                    <td class="text-muted">{{$berita['deskripsi']}}</td>
                                    <td class="text-muted">{{$berita['nama_penerbit']}}</td>
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
