@extends('layouts.admin')

@section('title', 'Dividen')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
	<h2 class="page-title">
        Dividen
    </h2>
    <div class="text-muted mt-1">Terakhir diperbarui pada <span class="text-black">{{\Carbon\Carbon::parse($lastUpdate)->locale('id')->translatedFormat('l, d F Y H:i')}}</span> UTC+8</div>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-dividen">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          	Kelola Dividen
      	</a>
        <a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-dividen" aria-label="Create new report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards justify-content-center">
        <div class="card">
        <div class="col-sm-12">
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

<div class="modal modal-blur fade" id="modal-dividen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah/Update Dividen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.dividen.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Pilih Saham:</label>
                                <select name="id_saham" type="text" class="form-select" id="select-people" value="" required>
                                    <option value="" selected>Pilih Saham</option>
                                    @foreach ($asetData as $saham)
                                    <option value="{{$saham['id']}}" data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $saham['info'] }})'></span>"> {{$saham['nama']}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Dividen: </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" required placeholder="0">
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Cum Date: </label>
                                <input type="date" name="cum_date" id="cum_date" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Ex Date: </label>
                                <input type="date" name="ex_date" id="ex_date" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Payment Date: </label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">Recording Date: </label>
                                <input type="date" name="recording_date" id="recording_date" class="form-control" min="{{ now()->format('Y-m-d') }}"  value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tomSelectInstance = null;

        
        window.TomSelect && (tomSelectInstance = new TomSelect('#select-people', {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                }
            }
        }));
    });
</script>
@endsection
