<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') - Smart Finance</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
	<link href="{{ asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
	<link href="{{asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
	<link rel="icon" type="image/png" href="{{ asset('img\logo_new.png') }}">

    <style>
		@import url('https://rsms.me/inter/inter.css');
		:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}
		body {
      		font-feature-settings: "cv03", "cv04", "cv11";
      	}
    </style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/pdfmake.min.js" integrity="sha512-axXaF5grZBaYl7qiM6OMHgsgVXdSLxqq0w7F4CQxuFyrcPmn0JfnqsOtYHUun80g6mRRdvJDrTCyL8LQqBOt/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/vfs_fonts.js" integrity="sha512-nNkHPz+lD0Wf0eFGO0ZDxr+lWiFalFutgVeGkPdVgrG4eXDYUnhfEj9Zmg1QkrJFLC0tGs8ZExyU/1mjs4j93w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
	<div class="page">
		<div class="sticky-top">

        	<header class="navbar navbar-expand-md sticky-top d-print-none bg-primary">
          		<div class="container-xl">
            		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              			<span class="navbar-toggler-icon"></span>
            		</button>
            		<h1 class="navbar-brand navbar-brand-autodark text-white d-none-navbar-horizontal pe-0 pe-md-3">
						<a href=".">
							<img src="{{ asset('img/logo-2.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image pe-1">
						</a>
						Smart Finance
            		</h1>

            		<div class="navbar-nav flex-row order-md-last">
              			<div class="d-none d-md-flex">
                			<a href="?theme=dark" class="nav-link px-0 hide-theme-dark text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                  				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
                			</a>
                			<a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                  				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
                			</a>
                			<div class="nav-item dropdown d-none d-md-flex me-3">
	                  			<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                    				<div class="card">
                      					<div class="card-header">
                        					<h3 class="card-title">Last updates</h3>
                      					</div>
                      					<div class="list-group list-group-flush list-group-hoverable">
                        					<div class="list-group-item">
                          						<div class="row align-items-center">
                            						<div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                            						<div class="col text-truncate">
                              							<a href="#" class="text-body d-block">Example 1</a>
														<div class="d-block text-muted text-truncate mt-n1">
															Change deprecated html tags to text decoration classes (#29604)
														</div>
													</div>
                            						<div class="col-auto">
                              							<a href="#" class="list-group-item-actions">
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                              							</a>
                            						</div>
                          						</div>
                        					</div>
                        					<div class="list-group-item">
												<div class="row align-items-center">
													<div class="col-auto"><span class="status-dot d-block"></span></div>
													<div class="col text-truncate">
														<a href="#" class="text-body d-block">Example 2</a>
														<div class="d-block text-muted text-truncate mt-n1">
															justify-content:between ⇒ justify-content:space-between (#29734)
														</div>
													</div>
                            						<div class="col-auto">
                              							<a href="#" class="list-group-item-actions show">
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                              							</a>
                            						</div>
                          						</div>
                        					</div>
                        					<div class="list-group-item">
                          						<div class="row align-items-center">
                            						<div class="col-auto"><span class="status-dot d-block"></span></div>
                            						<div class="col text-truncate">
                              							<a href="#" class="text-body d-block">Example 3</a>
                              							<div class="d-block text-muted text-truncate mt-n1">
                                							Update change-version.js (#29736)
                              							</div>
                            						</div>
                            						<div class="col-auto">
                              							<a href="#" class="list-group-item-actions">
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                              							</a>
                            						</div>
                          						</div>
                        					</div>
											<div class="list-group-item">
                          						<div class="row align-items-center">
													<div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                            						<div class="col text-truncate">
                              							<a href="#" class="text-body d-block">Example 4</a>
                              							<div class="d-block text-muted text-truncate mt-n1">
                                							Regenerate package-lock.json (#29730)
                              							</div>
                            						</div>
                            						<div class="col-auto">
                              							<a href="#" class="list-group-item-actions">
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                              							</a>
                            						</div>
                          						</div>
                        					</div>
                      					</div>
                    				</div>
                  				</div>
                			</div>
              			</div>
              			<div class="nav-item dropdown">
                			<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                  				<span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                  				<div class="d-none d-xl-block ps-2">
									<div class="text-white">{{$user['name']}}</div>
								  	<div class="mt-1 small text-white">{{$user['email']}}</div>
                  				</div>
                			</a>
                			<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<a class="dropdown-item" href="{{ url('/profil') }}" >
							  		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path></svg>
                              			Informasi Akun
                            	</a>	
								<a class="dropdown-item" href="#sidebar-error" >
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
                              			Tentang
                            	</a>
								<a class="dropdown-item" href="{{ url('/logout') }}" >
									<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 17l0 .01" /><path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" /></svg>
										Bantuan & Dukungan
      							</a>
                              	<a class="dropdown-item" href="{{ url('/logout') }}" >
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M9 12h12l-3 -3"></path><path d="M18 15l3 -3"></path></svg>
										Keluar
      							</a>
                			</div>
              			</div>
            		</div>
          		</div>
        	</header>

        	<header class="navbar-expand-md">
          		<div class="navbar-collapse collapse" id="navbar-menu" style="">
            		<div class="navbar">
              			<div class="container-xl">
                			<ul class="navbar-nav">
								<li class="nav-item {{ url()->current() == url('/dashboard') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ url('/dashboard') }}" >
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
                        					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
										</span>
                      					<span class="nav-link-title">
                        					Dashboard
                      					</span>
									</a>
                  				</li>
								<li class="nav-item dropdown {{ url()->current() == url('/catatan-keuangan') ? 'active' : '' }} {{ url()->current() == url('/catatan-umum') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M9 7l6 0"></path><path d="M9 11l6 0"></path><path d="M9 15l4 0"></path></svg>
										</span>
                      					<span class="nav-link-title">
                        					Catatan
                      					</span>
                    				</a>
                            		<div class="dropdown-menu">
              							<a class="dropdown-item" href="{{ url('/catatan-keuangan') }}">
                            				Keuangan
                          				</a>
						  				<a class="dropdown-item" href="{{ url('/catatan-umum') }}">
                            				Umum
                          				</a>
                  				</li>
								<li class="nav-item {{ url()->current() == url('/anggaran-mingguan') ? 'active' : '' }} {{ url()->current() == url('/anggaran-bulanan') ? 'active' : '' }} {{ url()->current() == url('/anggaran-tahunan') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/anggaran-mingguan">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M5 15v1m0 -8v1"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Anggaran
                      					</span>
									</a>
                  				</li>
								<li class="nav-item dropdown {{ url()->current() == url('/kurs') ? 'active' : '' }} {{ url()->current() == url('/berita') ? 'active' : '' }} {{ url()->current() == url('/dividen') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-info"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M11 14h1v4h1" /><path d="M12 11h.01" /></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Info
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ url('/berita') }}">
						  					Berita
										</a>
                          				<a class="dropdown-item" href="{{ url('/kurs') }}">
                            				Kurs
                          				</a>
										  <a class="dropdown-item" href="{{ url('/dividen') }}">
                            				Dividen
                          				</a>
                    				</div>
								</li>
				  				<li class="nav-item dropdown {{ url()->current() == url('/pinjaman-bunga-efektif') ? 'active' : '' }} {{ url()->current() == url('/pinjaman-bunga-tetap') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Simulasi Pinjaman
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
						  				<a class="dropdown-item" href="{{ url('/pinjaman-bunga-efektif') }}">
							  				Bunga Efektif
										</a>
										<a class="dropdown-item" href="{{ url('/pinjaman-bunga-tetap') }}">
							  				Bunga Tetap
										</a>
                    				</div>
                  				</li>
				  				<li class="nav-item dropdown {{ url()->current() == url('/investasi-lumpsum') ? 'active' : '' }} {{ url()->current() == url('/investasi-bulanan') ? 'active' : '' }} {{ url()->current() == url('/investasi-target-bulanan') ? 'active' : '' }} {{ url()->current() == url('/investasi-target-lumpsum') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 3v18h18"></path><path d="M20 18v3"></path><path d="M16 16v5"></path><path d="M12 13v8"></path><path d="M8 16v5"></path><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Simulasi Investasi
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ url('/investasi-bulanan') }}">
						  					Bulanan
										</a>
                          				<a class="dropdown-item" href="{{ url('/investasi-lumpsum') }}">
                            				Lumpsum
                          				</a>
                    				</div>
								</li>
				  				<li class="nav-item dropdown {{ url()->current() == url('/portofolio') ? 'active' : '' }} {{ url()->current() == url('/portofolio-mutasi-dana') ? 'active' : '' }} {{ url()->current() == url('/portofolio-historis') ? 'active' : '' }} " >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Simulasi Portofolio
                      					</span>
                    				</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ url('/portofolio') }}">
						  					Portofolio
										</a>
                          				<a class="dropdown-item" href="{{ url('/portofolio-mutasi-dana') }}">
                            				Mutasi Dana
                          				</a>
                          				<a class="dropdown-item" href="{{ url('/portofolio-historis') }}">
                            				Historis
                          				</a>
                    				</div>
                  				</li>
							</ul>
							<div class="my-md-0 flex-grow-1 flex-md-grow-0 order-last order-md-last">
              					<ul class="navbar-nav" style="min-height: 0rem">
                					<li class="nav-item dropdown">
                  						<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    						<span class="nav-link-icon d-md-none d-lg-inline-block">
                      							<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-language"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 5h7" /><path d="M9 3v2c0 4.418 -2.239 8 -5 8" /><path d="M5 9c0 2.144 2.952 3.908 6.7 4" /><path d="M12 20l4 -9l4 9" /><path d="M19.1 18h-6.2" /></svg>
                    						</span>
                    						<span class="nav-link-title">
                      							Bahasa
                    						</span>
                  						</a>
                  						<div class="dropdown-menu">
                    						<a class="dropdown-item" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
					  							<span class="flag flag-country-us"></span>
												&nbsp English
                    						</a>
											<a class="dropdown-item" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
					  							<span class="flag flag-country-id"></span>
                      							&nbsp Indonesia
                    						</a>
                  						</div>
                					</li>
              					</ul>
							</div>
              			</div>
            		</div>
          		</div>
        	</header>
      	</div>
		
      	<div class="page-wrapper">
			<div class="container container-slim my-auto" id="spinner" style="display:block;">
				<div class="text-center">
					<div class="text-muted mb-3">Loading</div>
					<div class="progress progress-sm">
						<div class="progress-bar progress-bar-indeterminate"></div>
					</div>
				</div>
			</div>
        	<div class="page-header d-print-none" id="page-title" style="display:none;">
          		<div class="container-xl">
            		<div class="row g-2 align-items-center">
              			@yield('page-title')
            		</div>
          		</div>
			</div>
			<div class="page-body" id="page-content" style="display:none;">
          		@yield('content')
			</div>        
      	</div>
    </div>

	<!-- Modal Tambah Catatan -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        	<div class="modal-content">
          		<div class="modal-header">
            		<h5 class="modal-title">Tambah Catatan</h5>
            		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          		</div>
		  		<form action="{{ route('catatan') }}" method="post" autocomplete="off">
					@csrf
          			<div class="modal-body">
            			<label class="form-label required">Pilih Jenis :</label>
            			<div class="form-selectgroup-boxes row mb-3">
							<div class="col-lg-6">
								<label class="form-selectgroup-item">
									<input type="radio" id="pemasukan" name="jenis" value="1" class="form-selectgroup-input pemasukan-radio" required>
									<span class="form-selectgroup-label d-flex align-items-center p-2">
										<span class="me-3">
											<span class="form-selectgroup-check"></span>
										</span>
										<span class="form-selectgroup-label-content">
											<div class="card-status-top bg-green"></div>
											<span class="form-selectgroup-title mb-1">Pemasukan</span>
										</span>
									</span>
								</label>
							</div>		
							<div class="col-lg-6">
								<label class="form-selectgroup-item">
									<input type="radio" id="pengeluaran" name="jenis" value="2" class="form-selectgroup-input pengeluaran-radio" required>
									<span class="form-selectgroup-label d-flex align-items-center p-2">
										<span class="me-3">
											<span class="form-selectgroup-check"></span>
										</span>
										<span class="form-selectgroup-label-content">
											<div class="card-status-top bg-red"></div>
											<span class="form-selectgroup-title mb-1">Pengeluaran</span>
										</span>
									</span>
								</label>
							</div>
            			</div>
            			<div class="row">
              				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label required">Jumlah : </label>
				  					<div class="input-group">
                              			<span class="input-group-text">
                                			Rp.
                              			</span>
                              			<input type="text" id="jumlah" oninput="updateFormattedNumber()" name="jumlah" class="form-control text-end" autocomplete="off" required>
                              			<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                            		</div>
                				</div>
              				</div>
              				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label required">Kategori :</label>
                  					
									
									<select id="kategori" name="kategori" class="form-select kategoriadd">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                    </select>
                				</div>
              				</div>
			  				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label required">Tanggal :</label>
                  					<input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ now()->format('Y-m-d') }}">
                				</div>
              				</div>
							<div class="col-lg-12">
                				<div class="mb-2">
                  					<label class="form-label">Catatan :</label>
                  					<textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
                				</div>
              				</div>
            			</div>
          			</div>
          			<div class="modal-footer">
	            		<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              				Batal
            			</a>
						<button type="submit" class="btn btn-success ms-auto">
              				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              				Simpan Catatan
						</button>
          			</div>
				</form>	
        	</div>
      	</div>
    </div>
	<!-- End of Modal Tambah Catatan -->
     
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
	<script>
		@if (Session::has('success'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.success("{{ Session::get('success') }}");
		@endif
		@if (Session::has('error'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.error("{{ Session::get('error') }}",);
		@endif
		@if (Session::has('warning'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.warning("{{ Session::get('warning') }}",);
		@endif
		@if (Session::has('info'))
			toastr.options = {
				"closeButton" : true,
				"progressBar" : true,
			}
			toastr.info("{{ Session::get('info') }}",);
		@endif
    </script>

	<script>
		function formatNumber(num) {
    		const parts = num.toString().split(".");
    		const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    		const decimalPart = parts.length > 1 ? "," + parts[1] : "";
    		return integerPart + decimalPart;
		}

		function updateFormattedNumber() {
			var inputElement = document.getElementById('jumlah');
			var rawValue = inputElement.value.replace(/\D/g, ''); 
			var formattedValue = formatNumber(rawValue); 
			inputElement.value = formattedValue; 
			inputElement.setAttribute('data-value', rawValue); 
			setUnformattedValueToInput(); 
		}

		function setUnformattedValueToInput() {
			var unformattedValue = getUnformattedValue(); 
			var inputElement = document.getElementById('jumlah1');
			inputElement.value = unformattedValue; 
		}
		
		function getUnformattedValue() {
			var inputElement = document.getElementById('jumlah');
			var unformattedValue = inputElement.getAttribute('data-value') || ''; 
			return unformattedValue;
		}

		document.getElementById('jumlah').addEventListener('input', updateFormattedNumber);
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
    		const kategoriPemasukanData = @json($kategoriPemasukanData ?? []);
    		const kategoriPengeluaranData = @json($kategoriPengeluaranData ?? []);

			function updateSelectOptions1(radioElement) {
				var modal = radioElement.closest('.modal');
				var selectElement = modal.querySelector('.kategoriadd');
				while (selectElement.options.length > 0) {
					selectElement.remove(0);
				}

				let dataToUse = [];
				if (radioElement.classList.contains('pemasukan-radio')) {
					dataToUse = kategoriPemasukanData;
				} else if (radioElement.classList.contains('pengeluaran-radio')) {
					dataToUse = kategoriPengeluaranData;
				} else {
					return;
				}

				if (dataToUse.length > 0) {
					dataToUse.forEach(function(item) {
						let option = new Option(item.nama_kategori_pemasukan || item.nama_kategori_pengeluaran, item.id);
						selectElement.add(option);
					});
				}
				selectElement.disabled = false;
			}

			document.querySelectorAll('.pemasukan-radio, .pengeluaran-radio').forEach(function(radio) {
				radio.addEventListener('change', function() {
					updateSelectOptions1(this);
				});
			});

			const modals = document.querySelectorAll('.modal');
			modals.forEach(modal => {
				modal.addEventListener('hidden.bs.modal', function() {
					const form = this.querySelector('form');
					if (form) {
						form.reset();
					}
					const selectElement = this.querySelector('.kategoriadd');
					if (selectElement) {
						selectElement.innerHTML = '<option value="" disabled selected>Pilih Kategori</option>';
						selectElement.disabled = true;
					}
					const radioButtons = this.querySelectorAll('.pemasukan-radio, .pengeluaran-radio');
					radioButtons.forEach(function(radio) {
						radio.checked = false;
					});
				});
			});    
		});
	</script>
</body>

</html>