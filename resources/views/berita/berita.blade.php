@extends('layouts.user')

@section('title', 'Pinjaman')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Berita
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
            <div class="row g-4">
              
              <div class="col-md-12">
                <div class="row row-cards">
                  <div class="space-y">
                    @foreach($beritaData as $berita)
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url({{$berita['gambar']}});width: 150px;height: 100px;"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="{{$berita['link']}}">{{$berita['judul']}}</a></h3>
                              </div>
                            <div class="col-md-auto">
                                <h4 class="mb-0">{{ \Carbon\Carbon::parse($berita['tanggal_terbit'])->locale('id')->translatedFormat('d F Y') }}
                                </h4>
                              </div></div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                {{$berita['deskripsi']}}
                                </div>
                              </div>
                              
                            </div>
                          <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                  <h5 class="mb-0">{{$berita['nama_penerbit']}}</h5>
                                </div>
                              </div>
                              
                            </div></div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- End of Modal Detail -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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