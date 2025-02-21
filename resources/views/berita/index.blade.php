@extends('layouts.user')

@section('title', __('info.news'))

@section('page-title')
<div class="col">
	<h2 class="page-title">
		{{ __('info.news') }}
	</h2>
</div>
<div class="text-muted mt-1">{{ __('info.last_updated') }} {{\Carbon\Carbon::parse($update)->locale('id')->translatedFormat('l, d F Y H:i')}} UTC+8</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="row row-cards">
		@foreach($beritaData as $berita)
		<div class="col-md-6 col-lg-6">
			<a href="{{$berita['link']}}" class="card card-link card-link-pop">
				<div class="card">
					<div class="row row-0">
						<div class="col-3">
							<img src="{{$berita['gambar']}}" class="w-100 h-100 object-cover card-img-start" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach">
						</div>
						<div class="col">
							<div class="card-body">
								<p class="text-primary">{{$berita['nama_penerbit']}}  <span class="text-muted">/ {{ \Carbon\Carbon::parse($berita['tanggal_terbit'])->locale('id')->translatedFormat('l, d F Y H:i') }}</span></p>
								<h3 class="card-title text-truncate">{{$berita['judul']}}</h3>
								<p class=" text-truncate" style="max-width:;">{{$berita['deskripsi']}}</p>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
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