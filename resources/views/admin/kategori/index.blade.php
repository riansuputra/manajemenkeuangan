@extends('layouts.admin')

@section('title', 'Category Requests')

@section('page-title')
<div class="col">
    <div class="page-pretitle">
        Categories
    </div>
    <h2 class="page-title">
        Category Requests
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
	<div class="col-12">
		<div class="card">
			<div class="table-responsive">
				<table class="table table-vcenter table-mobile-md card-table">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th >Category Name</th>
							<th  >Type</th>
							<th  >User Id</th>
							<th >Admin Id</th>
							<th >Status</th>
							<th class="w-1"></th>
                        </tr>
					</thead>
					<tbody>
						@foreach($categoryRequestData as $data)
                        <tr>
							<td class="w-1">{{$loop->iteration}}.</td>
                          	<td>
                                <div class="font-weight-medium">{{$data['nama_kategori']}}</div>
                          	</td>
							<td >
								@if($data['category_type'] == 'pengeluaran')
									<div class="text-red text-strong">Expense</div>
								@else
									<div class="text-green text-strong">Income</div>
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
								@if($data['status'] == 'Pending')
									<span class="badge bg-warning me-2"></span>{{$data['status']}}
								@elseif($data['status'] == 'Rejected')
									<span class="badge bg-danger me-2"></span>{{$data['status']}}
								@elseif($data['status'] == 'Approved')
									<span class="badge bg-success me-2"></span>{{$data['status']}}
								@endif
							</td>
							<td class="w-1">
								<div class="btn-list flex-nowrap">
									@if($data['status'] == 'Pending')
									<form action="{{ route('categoryApprove', ['id'=> $data['id_category_request']]) }}" method="post" autocomplete="off">
                						@csrf
										<input type="text" id="id" name="id" value="{{ $data['id_category_request'] }}" hidden>
										<button type="submit" class="btn btn-outline-success btn-icon">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</button>
									</form>
									<form action="{{ route('categoryReject', ['id'=> $data['id_category_request']]) }}" method="post" autocomplete="off">
										@csrf
										<input type="text" id="id" name="id" value="{{ $data['id_category_request'] }}" hidden>
										<button type="submit" class="btn btn-outline-danger btn-icon">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</button>
									</form>
									@elseif($data['status'] == 'Rejected')
										<button href="#" class="btn btn-outline-success btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
										</button>
										<button href="#" class="btn btn-danger btn-icon" disabled>
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
										</button>
									@elseif($data['status'] == 'Approved')
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


@endsection