@extends('layouts.tabler')

@section('title', 'Tambah Catatan Umum')

@section('page-title')
<div class="col">
	<h2 class="page-title">
        Tambah Catatan
    </h2>
</div>

@endsection

@section('content')
<div class="container-xl">
	<div class="card">
		<div class="card-body">
			<form action="{{route('simpanCatatanUmum')}}" method="post" autocomplete="off">
				@csrf
				<div class="mb-3">
					<label class="form-label required">Judul</label>
					<input name="judul" id="judul" type="text" class="form-control required" placeholder="Judul" required>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label required">Tipe</label>
						<select name="tipe" id="tipe"class="form-select" required>
							<option value="" selected>Pilih Tipe</option>
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
					<div class="mt-3 text-end">
						<button type="submit" class="btn btn-success">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
							Simpan Catatan
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="{{ asset('dist/libs/tinymce/tinymce.min.js?1684106062')}}" defer></script>

<script>
	// @formatter:off
	document.addEventListener("DOMContentLoaded", function () {
        let options = {
			selector: '#tinymce-mytextarea',
			height: 300,
			menubar: false,
			statusbar: false,
				license_key: 'gpl',
			plugins: [
				'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
				'searchreplace', 'visualblocks', 'code', 'fullscreen',
				'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
			],
			toolbar: 'undo redo | formatselect | ' +
				'bold italic backcolor | alignleft aligncenter ' +
				'alignright alignjustify | bullist numlist outdent indent | ' +
				'removeformat',
			content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
          	options.skin = 'oxide-dark';
          	options.content_css = 'dark';
        }
        tinyMCE.init(options);

		const spinner = document.getElementById("spinner");
		const pageContent = document.getElementById("page-content");
		const pageTitle = document.getElementById("page-title");

		window.addEventListener("load", function() {
			spinner.style.display = "none";
			pageContent.style.display = "block";
			pageTitle.style.display = "block";
		});
	})
	// @formatter:on
</script>

<div class="tox tox-silver-sink tox-tinymce-aux" style="position: relative;"></div>

@endsection
