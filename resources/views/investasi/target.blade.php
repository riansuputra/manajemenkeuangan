@extends('layouts.tabler')

@section('title', 'Investasi')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Investasi
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-lumpsum') }}" class="nav-link" aria-selected="true" role="tab">Lumpsum</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-bulanan') }}" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Bulanan</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="{{ route('investasi-target') }}" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">Target</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">

				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection