@extends('layouts.user')

@section('title', __('budget.budget'))

@section('page-title')
<div class="col">
    <h2 class="page-title">
        {{ __('budget.budget') }}
    </h2>
</div>
<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
		<a href="" class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-anggaran">
        	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            {{ __('budget.add_budget') }}
      	</a>
		<a href="" class="btn btn-success d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-anggaran" aria-label="Create new report">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
		</a>       
	</div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card" style="height: 31.2rem">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaran.week') }}" class="nav-link active" aria-selected="true" role="tab">{{ __('budget.weekly') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaran.month') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">{{ __('budget.monthly') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('anggaran.year') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">{{ __('budget.yearly') }}</a>
                        </li>
                        <li class="nav-item ms-auto">
                            <a class="nav-link disabled text-muted" href="">
                                {{$formattedDateWeek}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                    <div class="divide-y">
                        @if(isset($combinedAnggaranData['Mingguan']))
                            @foreach($combinedAnggaranData['Mingguan'] as $data)
                                @php
                                    $totalJumlah = floatval($data['total_jumlah']);
                                    $anggaran = floatval($data['anggaran']);
                                    $overspend = ($totalJumlah > $anggaran) ? ($totalJumlah - $anggaran) : 0;
                                    $remaining = ($anggaran > $totalJumlah) ? ($anggaran - $totalJumlah) : 0;
                                @endphp
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-3">{{$data['nama_kategori_pengeluaran']}}</p>
                                        </div>
                                        <div class="col-auto">
                                            <span>
                                                @if($data['kategori_pengeluaran']->isNotEmpty())
                                                    <strong>Rp. {{ number_format(floatval($data['total_jumlah']), 0, ',', '.') }}</strong>
                                                @else
                                                    <strong>Rp. 0</strong>
                                                @endif
                                                <strong>/</strong>
                                                <strong class="text-end kategori-total me-1" >Rp. {{ number_format(floatval($data['anggaran']), 0, ',', '.')}}</strong>
                                                @php
                                                    $progressPercentage = ($data['anggaran'] > 0) ? ($data['total_jumlah'] / $data['anggaran']) * 100 : 0;
                                                @endphp
                                                <strong class="text-end kategori-total text-muted d-none d-sm-inline-block">({{ number_format($progressPercentage, 2) }}%)</strong>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="badges">
                                                <a class="nav-link"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item btn-kategori" href="" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modal-edit-anggaran{{$data['id']}}"
                                                        data-id="{{ $data['id'] }}"
                                                        data-id-kategori-pengeluaran="{{ $data['kategori_pengeluaran_id'] }}"
                                                        data-nama="{{ $data['nama_kategori_pengeluaran'] }}"
                                                        data-anggaran="{{ $data['anggaran'] }}"
                                                        data-jumlah="{{ $data['total_jumlah'] }}"
                                                        data-tersisa="{{ $remaining }}"
                                                        data-overspend="{{ $overspend }}"
                                                        data-periode="{{ $data['periode'] }}">
                                                        {{ __('budget.edit') }}
                                                    </a>
                                                    <a class="dropdown-item btn-delete" href=""
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modal-danger{{$data['id']}}" 
                                                        data-nama="{{ $data['nama_kategori_pengeluaran'] }}" 
                                                        data-id="{{$data['id']}}">
                                                        {{ __('budget.delete') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        @php
                                            $progressPercentage = ($data['anggaran'] > 0) ? ($data['total_jumlah'] / $data['anggaran']) * 100 : 0;
                                            $progressClass = $data['total_jumlah'] > $data['anggaran'] ? 'bg-danger' : 'bg-primary';
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }}" id="progressbar" role="progressbar" style="width: {{ $progressPercentage }}%" aria-label="Regular"></div>
                                    </div>
                                </div>
                                <!-- Modal Edit Budget -->
                                <div class="modal modal-blur fade" id="modal-edit-anggaran{{$data['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ __('budget.edit_budget') }}<span id="modaledittitle_{{$data['id']}}" name="modaledittitle"> </span>{{ __('budget.weekly') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('anggaran.update', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
                                                @csrf
                                                <div class="modal-status bg-warning"></div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_anggaran_{{$data['id']}}" name="jumlahanggaran" class="form-control text-strong text-warning border-warning mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_anggaran_{{$data['id']}}" class="form-label text-black">{{ __('budget.used') }} :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_tersisa_{{$data['id']}}" name="jumlahtersisa" class="form-control text-strong text-success border-success mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_tersisa_{{$data['id']}}" class="form-label text-black">{{ __('budget.remaining') }} :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" id="jumlah_overspend_{{$data['id']}}" name="jumlahoverspend" class="form-control text-strong text-danger border-danger mt-2" autocomplete="off" readonly>
                                                                <label for="jumlah_overspend_{{$data['id']}}" class="form-label text-black">{{ __('budget.overspend') }} :</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <input type="text" id="id_{{$data['id']}}" name="id" value="{{$data['id']}}" class="form-control text-end" autocomplete="off" hidden>
                                                            <div class="mb-3">
                                                                <label class="form-label required">{{ __('budget.expense_category') }}:</label>
                                                                <select id="id_kategori_pengeluaran_edit_{{$data['id']}}" name="id_kategori_pengeluaran_edit" class="form-select">
                                                                    <option value="" selected disabled>{{ __('budget.select_category') }}</option>
                                                                    @foreach($kategoriData as $kategori)
                                                                        <option value="{{$kategori['id']}}">{{$kategori['nama_kategori_pengeluaran']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label required">{{ __('budget.amount') }} : </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Rp.</span>
                                                                    <input type="text" id="jumlah_edit_{{$data['id']}}" oninput="updateFormattedNumberAnggaran({{$data['id']}})" name="jumlahedit" class="form-control text-end" autocomplete="off" placeholder="0" required>
                                                                    <input type="text" id="jumlah1_edit_{{$data['id']}}" name="jumlah1edit" class="form-control text-end" autocomplete="off" hidden>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label required">{{ __('budget.period') }} :</label>
                                                                <select id="periodeedit_{{$data['id']}}" name="periodeedit" class="form-select">
                                                                    <option value="" selected disabled>{{ __('budget.select_period') }}</option>
                                                                    <option value="Mingguan">{{ __('budget.weekly') }}</option>
                                                                    <option value="Tahunan">{{ __('budget.yearly') }}</option>
                                                                    <option value="Bulanan">{{ __('budget.monthly') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning ms-auto">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                                        {{ __('budget.save') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Edit Budget -->
                                <!-- Modal Delete Budget -->
                                <div class="modal modal-blur fade" id="modal-danger{{$data['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-status bg-danger"></div>
                                            <div class="modal-body text-center py-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                                                <h3>{{ __('budget.confirm_delete') }}</h3>
                                                <div class="">{{ __('budget.delete_question') }}?</div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="w-100">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="" class="btn w-100" data-bs-dismiss="modal">
                                                                {{ __('budget.cancel') }}
                                                            </a>
                                                        </div>
                                                        <div class="col">
                                                            <form method="POST" action="{{route('anggaran.hapus', ['id' => $data['id']] )}}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                                    {{ __('budget.delete') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Delete Budget -->
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center pe-2">
                            <span class="legend me-2 bg-primary"></span>
                            <span id="inlimit">{{ __('budget.in_limit') }}</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"></span>
                        </div>
                        <div class="col-auto d-flex align-items-center ps-2" >
                            <span class="legend me-2 bg-danger" id="overspend"></span>
                            <span id="overspend">{{ __('budget.overspend') }}</span>
                            <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Budget -->
<div class="modal modal-blur fade" id="modal-anggaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('budget.add_budget') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('anggaran.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-status bg-success"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('budget.expense_category') }}:</label>
                                <select id="id_kategori_pengeluaran" name="id_kategori_pengeluaran" class="form-select" required>
                                    <option value="" selected disabled>{{ __('budget.select_category') }}</option>
                                    @foreach($kategoriData as $kategori)
                                    <option value="{{$kategori['id']}}">{{$kategori['nama_kategori_pengeluaran']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('budget.amount') }} : </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" required>
                                    <input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('budget.period') }} :</label>
                                <select id="periode" name="periode" class="form-select" required>
                                    <option value="" selected disabled>{{ __('budget.select_period') }}</option>
                                    <option value="Mingguan" >{{ __('budget.weekly') }}</option>
                                    <option value="Tahunan">{{ __('budget.yearly') }}</option>
                                    <option value="Bulanan">{{ __('budget.monthly') }}</option>
                                </select>
                            </div>
                        </div>				  				
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="me-auto btn" data-bs-dismiss="modal">{{ __('budget.cancel') }}</button>
                    <button type="submit" class="btn btn-success ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        {{ __('budget.save') }}
                    </button>
                </div>
            </form>	
        </div>
    </div>
</div>
<!-- End of Modal Add Budget -->

<script>
    function updateFormattedNumberAnggaran(id) {
        var inputElement = document.getElementById('jumlah_edit_' + id);
        var rawValue = inputElement.value.replace(/\D/g, ''); 
        var formattedValue = formatNumber(rawValue); 
        inputElement.value = formattedValue; 
        inputElement.setAttribute('data-value', rawValue); 
        setUnformattedValueToInputAnggaran(id); 
    }

    function setUnformattedValueToInputAnggaran(id) {
        var unformattedValue = getUnformattedValueAnggaran(id); 
        var inputElement = document.getElementById('jumlah1_edit_' + id);
        inputElement.value = unformattedValue; 
    }
    
    function getUnformattedValueAnggaran(id) {
        var inputElement = document.getElementById('jumlah_edit_' + id);
        var unformattedValue = inputElement.getAttribute('data-value') || ''; 
        return unformattedValue;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const spinner = document.getElementById("spinner");
        const pageContent = document.getElementById("page-content");
        const pageTitle = document.getElementById("page-title");
        const editButtons = document.querySelectorAll('.btn-kategori');
        
        window.addEventListener("load", function() {
            spinner.style.display = "none";
            pageContent.style.display = "block";
            pageTitle.style.display = "block";
        });

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const id_kategori_pengeluaran = this.getAttribute('data-id-kategori-pengeluaran');
                const nama = this.getAttribute('data-nama');
                const anggaran = this.getAttribute('data-anggaran');
                const periode = this.getAttribute('data-periode');
                const tersisa = this.getAttribute('data-tersisa');
                const jumlah = this.getAttribute('data-jumlah');
                const overspend = this.getAttribute('data-overspend');

                document.getElementById('id_' + id).value = id;
                document.getElementById('id_kategori_pengeluaran_edit_' + id).value = id_kategori_pengeluaran;
                document.getElementById('jumlah1_edit_' + id).value = anggaran;
                document.getElementById('jumlah_edit_' + id).value = formatNumber(anggaran);
                document.getElementById('jumlah_anggaran_' + id).value = 'Rp. ' + formatNumber(jumlah);
                document.getElementById('jumlah_tersisa_' + id).value = 'Rp. ' + formatNumber(tersisa);
                document.getElementById('jumlah_overspend_' + id).value = 'Rp. ' + formatNumber(overspend);
                document.getElementById('periodeedit_' + id).value = periode;
                document.getElementById('modaledittitle_' + id).textContent = ' "' + nama + '" ';

                const expenseCategorySelectEdit = document.getElementById('id_kategori_pengeluaran_edit_' + id);
        
                if (expenseCategorySelectEdit) {
                    new TomSelect(expenseCategorySelectEdit, {
                        copyClassesToDropdown: false,
                        render: {
                            item: function (data, escape) {
                                return `<div>${escape(data.text)}</div>`;
                            },
                            option: function (data, escape) {
                                return `<div>${escape(data.text)}</div>`;
                            }
                        }
                    });
                }
            });
        });
        const expenseCategorySelect = document.getElementById('id_kategori_pengeluaran');
        
        if (expenseCategorySelect) {
            new TomSelect(expenseCategorySelect, {
                copyClassesToDropdown: false,
                render: {
                    item: function (data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    },
                    option: function (data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    }
                }
            });
        }
    });
</script>
@endsection