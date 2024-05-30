@extends('layouts.tabler')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Pengaturan
    </h2>
</div>
@endsection

@section('content')

<div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                  <div class="card-body">
                    <h4 class="subheader">General settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="./settings.html" class="list-group-item list-group-item-action d-flex align-items-center">My Account</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">Categories</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Help</a>
                      <a href="./settings-plan.html" class="list-group-item list-group-item-action d-flex align-items-center">Give Feedback</a>
                    </div>
                    
                  </div>
                </div>
                <div class="col d-flex flex-column">
                  <div class="card-body" style="height:35rem;">
                    <h2 class="mb-4">Categories</h2>
                    <form action="{{ route('categoryStore') }}" method="post" autocomplete="off">
                @csrf
                    <h3 class="card-title mt-4">Request Add New Category</h3>
                    <div class="row g-3">
                      <div class="col-md">
                        <div class="form-label">Name</div>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Type</div>
                        <select class="form-select"name="category_type" id="category_type">
                            <option value="pengeluaran">Expense</option>
                            <option value="pemasukan">Income</option>
                        </select>
                      </div>
                      <div class="col-md">
                        <div class="form-label">&nbsp</div>
                        <button type="submit" class="btn btn-primary">
                        Submit
</button>
                      </div>
                    </div>
</form>
                    <h3 class="card-title mt-4">Category Requests</h3>
                        <div class="col-md">
                          <div class="card" style="height:18rem;">
                            <div class="card-body card-body-scrollable card-body-scrollable-shadow" >
                              <div class="divide-y">
                              @foreach($categoryRequestData as $data)
                              <div>
                            <div class="row">
                              
                              <div class="col">
                                <div class="text-truncate">
                                  <strong>{{$data['nama_kategori']}}</strong>
                                </div>
                                <div class="text-muted">{{$data['category_type']}}</div>
                              </div>

                              <div class="col-auto align-self-center">
                              @if($data['status'] == 'Pending')
                            <div class="badge bg-warning me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @elseif($data['status'] == 'Approved')
                            <div class="badge bg-success me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @elseif($data['status'] == 'Rejected')
                            <div class="badge bg-danger me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @endif
                              </div>
                              <div class="col-auto align-self-center">
                              @if($data['status'] == 'Pending')
                            <div class="badge bg-warning me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @elseif($data['status'] == 'Approved')
                            <div class="badge bg-success me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @elseif($data['status'] == 'Rejected')
                            <div class="badge bg-danger me-1"></div>
                            <span class="">{{$data['status']}}</span>

                            @endif
                              </div>
                            </div>
                          </div>
                          @endforeach
                        
                  </div>
                  </div>
                  </div>
                      </div>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

<script>
  document.addEventListener('DOMContentLoaded', function () {

const spinner = document.getElementById("spinner");
const pageContent = document.getElementById("page-content");
const pageTitle = document.getElementById("page-title");

// Hide spinner and show page content when fully loaded
window.addEventListener("load", function() {
    spinner.style.display = "none";
    pageContent.style.display = "block";
    pageTitle.style.display = "block";
});
  });
</script>

@endsection