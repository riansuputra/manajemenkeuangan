@extends('layouts.admin')

@section('title', 'Permintaan Kategori Admin')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Admin
    </div>
    <h2 class="page-title">
        Permintaan Kategori
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
			<div class="table-responsive">
				<table class="table table-vcenter table-bordered table-mobile-md">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th>Nama Kategori</th>
							<th>Tipe</th>
							<th>UserId - Email</th>
							<th>AdminId - Email</th>
							<th>Status</th>
							<th class="w-1"></th>
                        </tr>
					</thead>
					<tbody>
						@foreach($permintaan as $data)
                        <tr>
							<td class="w-1">{{$loop->iteration}}.</td>
                          	<td>
                                <div class="font-weight-medium">{{$data['nama_kategori']}}</div>
                          	</td>
							<td >
								@if($data['tipe_kategori'] == 'pengeluaran')
									<div class="text-red text-strong">Pengeluaran</div>
								@else
									<div class="text-green text-strong">Pemasukan</div>
								@endif
							</td>
							<td>
								<div class="d-flex py-1 align-items-center">
									<div class="flex-fill">
										<div class="font-weight-medium">{{\Illuminate\Support\Str::limit($data['user']['name'], 50, '...')}}</div>
										<div class="text-muted"><a href="#" class="text-reset">{{$data['user_id']}} - {{\Illuminate\Support\Str::limit($data['user']['email'], 50, '...')}}</a></div>
									</div>
								</div>
							</td>
							@if(isset($data['admin_id']))
								<td >
									<div class="d-flex py-1 align-items-center">
										<div class="flex-fill">
											<div class="font-weight-medium">{{\Illuminate\Support\Str::limit($data['admin']['name'], 50, '...')}}</div>
											<div class="text-muted"><a href="#" class="text-reset">{{$data['admin_id']}} - {{\Illuminate\Support\Str::limit($data['admin']['email'], 50, '...')}}</a></div>
										</div>
									</div>
								</td>
							@else
								<td class="">
									<div class="d-flex py-1 align-items-center">
										<div class="flex-fill">
											<div class="font-weight-medium">-</div>
											<div class="text-muted"><a href="#" class="text-reset">-</a></div>
										</div>
									</div>
								</td>
							@endif
							<td class="text-muted" >
								@if($data['status'] == 'pending')
									<span class="badge bg-warning me-2"></span>{{ucwords($data['status'])}}
								@elseif($data['status'] == 'rejected')
									<span class="badge bg-danger me-2"></span>{{ucwords($data['status'])}}
								@elseif($data['status'] == 'approved')
									<span class="badge bg-success me-2"></span>{{ucwords($data['status'])}}
								@endif
							</td>
							<td class="w-1">
								<div class="btn-list flex-nowrap">
									@if($data['status'] == 'pending')
									<form action="{{ route('permintaanApprove', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
                						@csrf
										<input type="text" id="id" name="id" value="{{ $data['id'] }}" hidden>
										<button type="submit" class="btn btn-outline-success btn-icon">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</button>
									</form>
									<form action="{{ route('permintaanReject', ['id'=> $data['id']]) }}" method="post" autocomplete="off">
										@csrf
										<input type="text" id="id" name="id" value="{{ $data['id'] }}" hidden>
										<button type="submit" class="btn btn-outline-danger btn-icon">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</button>
									</form>
									@elseif($data['status'] == 'rejected')
										<button href="#" class="btn btn-outline-success btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</button>
										<button href="#" class="btn btn-danger btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</button>
									@elseif($data['status'] == 'approved')
										<button href="#" class="btn btn-success btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</button>
										<button href="#" class="btn btn-outline-danger btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</button>
									@endif
									
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


@endsection