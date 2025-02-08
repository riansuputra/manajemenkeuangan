@extends('layouts.user')

@section('title', 'Tentang Aplikasi')

@section('page-title')
<div class="col">
    <h2 class="page-title">
        Tentang Aplikasi
    </h2>
</div>
@endsection

@section('content')
<div class="container-xl">
	<div class="card">
		<div class="card-body">
			<div class="space-y-4">
				<div>
                    <h2 class="mb-3 text-center">Smart Finance</h2>
                    <div id="faq-1" class="accordion" role="tablist" aria-multiselectable="true">
						<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq-1-1">Selamat datang di Smart Finance!</button>
                        	</div>
                        	<div id="faq-1-1" class="accordion-collapse collapse show" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>Aplikasi Smart Finance dikembangkan untuk membantu pengguna mencatat pemasukan dan pengeluaran, melakukan simulasi investasi, simulasi pinjaman, serta mengelola portofolio investasi. Dengan fitur yang user-friendly dan efisien, aplikasi ini diharapkan dapat mempermudah pengelolaan keuangan dan pengambilan keputusan investasi.</p>
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                      	<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-2">Latar Belakang</button>
                        	</div>
                        	<div id="faq-1-2" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>Latar belakang aplikasi Smart Finance ini adalah kebutuhan akan solusi praktis dalam manajemen keuangan dan investasi di era digital. Banyak individu maupun organisasi masih mengalami kesulitan dalam mencatat keuangan dan pengambilan keputusan investasi mereka secara efektif. Oleh karena itu, aplikasi ini dikembangkan untuk membantu pengguna dalam mempermudah pengelolaan keuangan serta pengambilan keputusan investasi.</p>
                            		</div>
                          		</div>
                        	</div>
                      	</div>
                      	<div class="accordion-item">
                        	<div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-3">Fitur Utama</button>
                        	</div>
                        	<div id="faq-1-3" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
										<ul>
                      						<li>Pencatatan Keuangan</li>
											<li>Pencatatan Umum</li>
											<li>Anggaran</li>
											<li>Simulasi :
												<ul>
													<li>Investasi</li>
													<li>Pinjaman</li>
													<li>Portofolio</li>
												</ul>
											</li>
										</ul>	
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					  	<div class="accordion-item">
	                        <div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-4">Teknologi yang Digunakan</button>
							</div>
                        	<div id="faq-1-4" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
										<ul>
											<li>Backend : Laravel (PHP)</li>
											<li>Frontend :
												<ul>
													<li>Blade Template</li>
													<li>Bootstrap</li>
													<li>Javascript</li>
												</ul>
											</li>
											<li>Database : MySQL</li>
											<li>API :
												<ul>
													<li>GOAPI, untuk mendapatkan data harga saham</li>
													<li>FreecurrencyAPI, untuk mendapatkan data kurs</li>
												</ul>
											</li>
										</ul>	
                            		</div>
                          		</div>
                        	</div>
                      	</div>
					  	<div class="accordion-item">
	                        <div class="accordion-header" role="tab">
                          		<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-5">Pengembang</button>
                        	</div>
                        	<div id="faq-1-5" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                          		<div class="accordion-body pt-0">
                            		<div>
                              			<p>Aplikasi ini dikembangkan oleh I Made Rian Suputra sebagai bagian dari penelitian skripsi dengan judul "Rancang Bangun Aplikasi Pencatatan Keuangan dan Simulasi Investasi Berbasis Web" dalam konsentrasi Sistem Informasi, Program Studi Teknologi Informasi, Fakultas Teknik, Universitas Udayana.</p>
										<p class="fw-bold">Dosen Pembimbing</p>
										<ul>
											<li>Prof. Dr. I Made Sukarsa, S.T., M.T. - Fakultas Teknologi Informasi, Universitas Udayana</li>
											<li>Anak Agung Ketut Agung Cahyawan Wiranatha, S.T., M.T. - Fakultas Teknologi Informasi, Universitas Udayana</li>
										</ul>	
                            		</div>
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
		
		window.addEventListener("load", function() {
    		spinner.style.display = "none";
    		pageContent.style.display = "block";
    		pageTitle.style.display = "block";
		});
  	});
</script>
@endsection