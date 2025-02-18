@extends('layouts.user')

@section('title', 'Catatan Umum')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Catatan Umum
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-catatan">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	    Tambah Catatan
      	</a>
		<a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-catatan" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>   
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-12 col-md-6 col-lg">
            <h3 class="mb-0 ">Belum Dikerjakan</h3>
            <hr class="mt-2 mb-3">
            <div class="mb-4">
                <div class="row row-cards">
                @php
                    $todoItems = array_filter($catatanData, fn($catatan) => $catatan['tipe'] === 'todo');
                @endphp
                @if (count($todoItems) > 0)
                    @foreach ($todoItems as $catatan)
                    <div class="col-12">
                        <div class="card card-sm">
                            @if(isset($catatan['warna']))
                            <div class="card-status-top" style="background-color: {{$catatan['warna']}};"></div>
                            @else
                            <div class="card-status-top bg-primary"></div>
                            @endif
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{$catatan['judul']}}</h3>
                                <hr class="mt-1 mb-2">
                                <div>{!! $catatan['catatan'] !!}</div>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col ">
                                            <h5>
                                                {{\Carbon\Carbon::parse($catatan['updated_at'])->locale('id')->translatedFormat('d/m/Y H:i')}}
                                            </h5>
                                        </div>
                                        <div class="col-auto ">
                                            <a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit-btn" href="" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-edit{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}"
                                                    data-judul="{{$catatan['judul']}}"
                                                    data-tipe="{{$catatan['tipe']}}"
                                                    data-warna="{{$catatan['warna']}}"
                                                    data-catatan="{{$catatan['catatan']}}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item delete-btn" href=""
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-delete{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal hapus catatan --}}
                        <div class="modal modal-blur fade" id="modal-delete{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                        <h3>Konfirmasi Penghapusan</h3>
                                        <div class="">Apakah anda yakin ingin menghapus catatan ini?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                        Batal
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" action="{{route('catatan.umum.hapus', ['id' => $catatan['id']])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal edit catatan --}}
                        <div class="modal modal-blur fade" id="modal-edit{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Catatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-status bg-warning"></div>
                                    <div class="modal-body">
                                        <form action="{{route('catatan.umum.update', ['id'=> $catatan['id']])}}" method="post" autocomplete="off">
                                        @csrf
                                        <input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
                                        <div class="mb-3">
                                            <label class="form-label required">Judul</label>
                                            <input name="juduledit" id="juduledit" type="text" class="form-control juduledit required" placeholder="Judul" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label required">Tipe</label>
                                                <select name="tipeedit" id="tipeedit" class="form-select tipeedit" required>
                                                    <option value="" selected disabled>Pilih Tipe</option>
                                                    <option value="todo">Belum dikerjakan</option>
                                                    <option value="inprogress">Sedang dikerjakan</option>
                                                    <option value="complete">Selesai</option>
                                                    <option value="other">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Warna</label>
                                                <input name="warnaedit" id="warnaedit" type="color" class="form-control form-control-color warnaedit" style="width:100%" value="#206bc4" title="Choose your color">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label required">Catatan</label>
                                            <textarea class="catatanedit" name="catatanedit" id="tinymce-mytextarea-{{$catatan['id']}}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 ">Tidak ada catatan.</div>
                @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg">
            <h3 class="mb-0 ">Sedang Dikerjakan</h3>
            <hr class="mt-2 mb-3">
            <div class="mb-4">
                <div class="row row-cards">
                @php
                    $inprogressItems = array_filter($catatanData, fn($catatan) => $catatan['tipe'] === 'inprogress');
                @endphp
                @if (count($inprogressItems) > 0)
                    @foreach ($inprogressItems as $catatan)
                    <div class="col-12">
                        <div class="card card-sm">
                            @if(isset($catatan['warna']))
                            <div class="card-status-top" style="background-color: {{$catatan['warna']}};"></div>
                            @else
                            <div class="card-status-top bg-primary"></div>
                            @endif
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{$catatan['judul']}}</h3>
                                <hr class="mt-1 mb-2">
                                <div>{!! $catatan['catatan'] !!}</div>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col ">
                                            <h5>
                                                {{\Carbon\Carbon::parse($catatan['updated_at'])->locale('id')->translatedFormat('d/m/Y H:i')}}
                                            </h5>
                                        </div>
                                        <div class="col-auto ">
                                            <a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit-btn" href="" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-edit{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}"
                                                    data-judul="{{$catatan['judul']}}"
                                                    data-tipe="{{$catatan['tipe']}}"
                                                    data-warna="{{$catatan['warna']}}"
                                                    data-catatan="{{$catatan['catatan']}}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item delete-btn" href=""
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-delete{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal hapus catatan --}}
                        <div class="modal modal-blur fade" id="modal-delete{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                        <h3>Konfirmasi Penghapusan</h3>
                                        <div class="">Apakah anda yakin ingin menghapus catatan ini?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                        Batal
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" action="{{route('catatan.umum.hapus', ['id' => $catatan['id']])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal edit catatan --}}
                        <div class="modal modal-blur fade" id="modal-edit{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Catatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-status bg-warning"></div>
                                    <div class="modal-body">
                                        <form action="{{route('catatan.umum.update', ['id'=> $catatan['id']])}}" method="post" autocomplete="off">
                                        @csrf
                                        <input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
                                        <div class="mb-3">
                                            <label class="form-label required">Judul</label>
                                            <input name="juduledit" id="juduledit" type="text" class="form-control juduledit required" placeholder="Judul" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label required">Tipe</label>
                                                <select name="tipeedit" id="tipeedit" class="form-select tipeedit" required>
                                                    <option value="" selected disabled>Pilih Tipe</option>
                                                    <option value="todo">Belum dikerjakan</option>
                                                    <option value="inprogress">Sedang dikerjakan</option>
                                                    <option value="complete">Selesai</option>
                                                    <option value="other">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Warna</label>
                                                <input name="warnaedit" id="warnaedit" type="color" class="form-control form-control-color warnaedit" style="width:100%" value="#206bc4" title="Choose your color">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label required">Catatan</label>
                                            <textarea class="catatanedit" name="catatanedit" id="tinymce-mytextarea-{{$catatan['id']}}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                            Simpan
                                        </button>
                                    </div>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 ">Tidak ada catatan.</div>
                @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg">
            <h3 class="mb-0 ">Selesai</h3>
            <hr class="mt-2 mb-3">
            <div class="mb-4">
                <div class="row row-cards">
                @php
                    $completeItems = array_filter($catatanData, fn($catatan) => $catatan['tipe'] === 'complete');
                @endphp
                @if (count($completeItems) > 0)
                    @foreach ($completeItems as $catatan)
                    <div class="col-12">
                        <div class="card card-sm">
                            @if(isset($catatan['warna']))
                            <div class="card-status-top" style="background-color: {{$catatan['warna']}};"></div>
                            @else
                            <div class="card-status-top bg-primary"></div>
                            @endif
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{$catatan['judul']}}</h3>
                                <hr class="mt-1 mb-2">
                                <div>{!! $catatan['catatan'] !!}</div>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col ">
                                            <h5>
                                                {{\Carbon\Carbon::parse($catatan['updated_at'])->locale('id')->translatedFormat('d/m/Y H:i')}}
                                            </h5>
                                        </div>
                                        <div class="col-auto ">
                                            <a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit-btn" href="" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-edit{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}"
                                                    data-judul="{{$catatan['judul']}}"
                                                    data-tipe="{{$catatan['tipe']}}"
                                                    data-warna="{{$catatan['warna']}}"
                                                    data-catatan="{{$catatan['catatan']}}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item delete-btn" href=""
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-delete{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal hapus catatan --}}
                        <div class="modal modal-blur fade" id="modal-delete{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                        <h3>Konfirmasi Penghapusan</h3>
                                        <div class="">Apakah anda yakin ingin menghapus catatan ini?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                        Batal
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" action="{{route('catatan.umum.hapus', ['id' => $catatan['id']])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal edit catatan --}}
                        <div class="modal modal-blur fade" id="modal-edit{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Catatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-status bg-warning"></div>
                                    <div class="modal-body">
                                        <form action="{{route('catatan.umum.update', ['id'=> $catatan['id']])}}" method="post" autocomplete="off">
                                        @csrf
                                        <input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
                                        <div class="mb-3">
                                            <label class="form-label required">Judul</label>
                                            <input name="juduledit" id="juduledit" type="text" class="form-control juduledit required" placeholder="Judul" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label required">Tipe</label>
                                                <select name="tipeedit" id="tipeedit" class="form-select tipeedit" required>
                                                    <option value="" selected disabled>Pilih Tipe</option>
                                                    <option value="todo">Belum dikerjakan</option>
                                                    <option value="inprogress">Sedang dikerjakan</option>
                                                    <option value="complete">Selesai</option>
                                                    <option value="other">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Warna</label>
                                                <input name="warnaedit" id="warnaedit" type="color" class="form-control form-control-color warnaedit" style="width:100%" value="#206bc4" title="Choose your color">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label required">Catatan</label>
                                            <textarea class="catatanedit" name="catatanedit" id="tinymce-mytextarea-{{$catatan['id']}}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                            Simpan 
                                        </button>
                                    </div>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 ">Tidak ada catatan.</div>
                @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg">
            <h3 class="mb-0 ">Lainnya</h3>
            <hr class="mt-2 mb-3">
            <div class="mb-4">
                <div class="row row-cards">
                @php
                    $otherItems = array_filter($catatanData, fn($catatan) => $catatan['tipe'] === 'other');
                @endphp
                @if (count($otherItems) > 0)
                    @foreach ($otherItems as $catatan)
                    <div class="col-12">
                        <div class="card card-sm">
                            @if(isset($catatan['warna']))
                            <div class="card-status-top" style="background-color: {{$catatan['warna']}};"></div>
                            @else
                            <div class="card-status-top bg-primary"></div>
                            @endif
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{$catatan['judul']}}</h3>
                                <hr class="mt-1 mb-2">
                                <div>{!! $catatan['catatan'] !!}</div>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col ">
                                            <h5>
                                                {{\Carbon\Carbon::parse($catatan['updated_at'])->locale('id')->translatedFormat('d/m/Y H:i')}}
                                            </h5>
                                        </div>
                                        <div class="col-auto ">
                                            <a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit-btn" href="" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-edit{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}"
                                                    data-judul="{{$catatan['judul']}}"
                                                    data-tipe="{{$catatan['tipe']}}"
                                                    data-warna="{{$catatan['warna']}}"
                                                    data-catatan="{{$catatan['catatan']}}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item delete-btn" href=""
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modal-delete{{$catatan['id']}}"
                                                    data-id="{{$catatan['id']}}">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal hapus catatan --}}
                        <div class="modal modal-blur fade" id="modal-delete{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                        <h3>Konfirmasi Penghapusan</h3>
                                        <div class="">Apakah anda yakin ingin menghapus catatan ini?</div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                        Batal
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" action="{{route('catatan.umum.hapus', ['id' => $catatan['id']])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal edit catatan --}}
                        <div class="modal modal-blur fade" id="modal-edit{{$catatan['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Catatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-status bg-warning"></div>
                                    <div class="modal-body">
                                        <form action="{{route('catatan.umum.update', ['id'=> $catatan['id']])}}" method="post" autocomplete="off">
                                        @csrf
                                        <input type="text" name="id" id="id" class="form-control text-end id-input" autocomplete="off" hidden>
                                        <div class="mb-3">
                                            <label class="form-label required">Judul</label>
                                            <input name="juduledit" id="juduledit" type="text" class="form-control juduledit required" placeholder="Judul" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label required">Tipe</label>
                                                <select name="tipeedit" id="tipeedit" class="form-select tipeedit" required>
                                                    <option value="" selected disabled>Pilih Tipe</option>
                                                    <option value="todo">Belum dikerjakan</option>
                                                    <option value="inprogress">Sedang dikerjakan</option>
                                                    <option value="complete">Selesai</option>
                                                    <option value="other">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Warna</label>
                                                <input name="warnaedit" id="warnaedit" type="color" class="form-control form-control-color warnaedit" style="width:100%" value="#206bc4" title="Choose your color">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label required">Catatan</label>
                                            <textarea class="catatanedit" name="catatanedit" id="tinymce-mytextarea-{{$catatan['id']}}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning ms-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                            Simpan
                                        </button>
                                    </div>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 ">Tidak ada catatan.</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal tambah catatan --}}
<div class="modal modal-blur fade" id="modal-catatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Catatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-status bg-success"></div>
            <div class="modal-body">
                <form action="{{route('catatan.umum.store')}}" method="post" autocomplete="off">
				@csrf
				<div class="mb-3">
					<label class="form-label required">Judul</label>
					<input name="judul" id="judul" type="text" class="form-control required" placeholder="Judul" required>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label required">Tipe</label>
						<select name="tipe" id="tipe"class="form-select" required>
							<option value="" selected disabled>Pilih Tipe</option>
							<option value="todo">Belum dikerjakan</option>
							<option value="inprogress">Sedang dikerjakan</option>
							<option value="complete">Selesai</option>
							<option value="other">Lainnya</option>
						</select>
					</div>
					<div class="col">
						<label class="form-label">Warna</label>
						<input name="warna" id="warna" type="color" class="form-control form-control-color" style="width:100%" value="#206bc4" title="Choose your color">
					</div>
				</div>
				<div>
					<label class="form-label required">Catatan</label>
					<textarea name="catatan" id="tinymce-mytextarea" required><b>Tuliskan isi catatan di sini !</b></textarea>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Simpan
                </button>
                </div>
            </form>	
        </div>
    </div>
</div>

<script src="{{ asset('dist/libs/tinymce/tinymce.min.js?1684106062')}}" defer></script>

<script>
	document.addEventListener("DOMContentLoaded", function () {
        function initializeTinyMCE(selector) {
            if (tinyMCE.get(selector)) {
                tinyMCE.get(selector).remove();
            }

            tinyMCE.init({
                selector: `#${selector}`,
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter ' +
                         'alignright alignjustify | bullist numlist outdent indent | removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            });
        }

        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");

        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach((button) => {
            button.addEventListener('click', function () {
                const modal = document.querySelector(button.getAttribute('data-bs-target'));
                const confirmButton = modal.querySelector('.btn-danger');

                const itemId = button.getAttribute('data-id');
                const itemType = button.getAttribute('data-jenis');

                confirmButton.setAttribute('data-id', itemId);
            });
        });


        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                const judul = this.getAttribute('data-judul');
                const tipe = this.getAttribute('data-tipe');
                const warna = this.getAttribute('data-warna');
                const catatan = this.getAttribute('data-catatan');

                const modal = document.getElementById(`modal-edit${id}`);
                const idInput = modal.querySelector('.id-input');
                const judulInput = modal.querySelector('.juduledit');
                const tipeEdit = modal.querySelector('.tipeedit');
                const warnaInput = modal.querySelector('.warnaedit');
                const catatanTextarea = modal.querySelector('.catatanedit');

                if (idInput) {
                    idInput.value = id;
                }
                if (judulInput) {
                    judulInput.value = judul;
                }
                if (tipeEdit) {
                    tipeEdit.value = tipe;
                }
                if (warnaInput) {
                    warnaInput.value = warna;
                }

                if (catatanTextarea) {
                    catatanTextarea.value = catatan;
                }

                initializeTinyMCE(catatanTextarea.id);
            });
        });

        const addModal = document.getElementById('modal-catatan');
        addModal.addEventListener('show.bs.modal', function () {
            const textarea = document.getElementById('tinymce-mytextarea');
            if (textarea) {
                initializeTinyMCE(textarea.id);
            }
        });
    });
</script>

<div class="tox tox-silver-sink tox-tinymce-aux" style="position: relative;"></div>

@endsection
