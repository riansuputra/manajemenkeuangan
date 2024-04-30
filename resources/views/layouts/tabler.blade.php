<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') - SIMANKEU</title>
    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/demo.min.css?1684106062') }}" rel="stylesheet"/>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

	
</head>

<body>

    <script src="{{ asset('js/demo-theme.min.js?1684106062') }}"></script>
	<div class="page">
		<div class="sticky-top">
			<header class="navbar navbar-expand-md sticky-top d-print-none" >
          		<div class="container-xl">
            		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              			<span class="navbar-toggler-icon"></span>
            		</button>
            		<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              			<a href=".">
                			<img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
              			</a>
            		</h1>
            		<div class="navbar-nav flex-row order-md-last">
              			<div class="d-none d-md-flex">
                			<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"data-bs-placement="bottom">
                  				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                			</a>
                			<a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                  				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                			</a>
                			<div class="nav-item dropdown d-none d-md-flex me-3">
                  				<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                    				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    				<span class="badge bg-red"></span>
                  				</a>
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
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                                							<svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                    				<div>{{$user['name']}}</div>
                    				<div class="mt-1 small text-muted">{{$user['email']}}</div>
                  				</div>
                			</a>
                			<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<a class="dropdown-item" href="#sidebar-error" >
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
                              		Tentang
                            	</a>
								<a class="dropdown-item" href="{{ url('/profil') }}" >
							  		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path></svg>
                              		Pengaturan
                            	</a>
								<form id="logoutForm" action="{{ route('logout') }}" method="POST">
    								@csrf
    								@method('POST')
    								<button type="submit" class="dropdown-item">
        								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            								<path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
            								<path d="M9 12h12l-3 -3"></path>
            								<path d="M18 15l3 -3"></path>
        								</svg>
										Keluar
    								</button>
								</form>
                			</div>
              			</div>
            		</div>
            		<div class="collapse navbar-collapse" id="navbar-menu">
            			<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
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
                  				<li class="nav-item {{ url()->current() == url('/catatan-harian') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ url('./catatan-harian') }}">
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M9 7l6 0"></path><path d="M9 11l6 0"></path><path d="M9 15l4 0"></path></svg>
										</span>
                      					<span class="nav-link-title">
                        					Catatan
                      					</span>
                    				</a>
                  				</li>
								<li class="nav-item {{ url()->current() == url('/statistik') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ url('./statistik') }}" >
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M4 20l14 0"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Statistik
                      					</span>
                    				</a>
                  				</li>
                  				<li class="nav-item {{ url()->current() == url('/anggaran') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/anggaran">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M5 15v1m0 -8v1"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Anggaran
                      					</span>
									</a>
                  				</li>
								<li class="nav-item {{ url()->current() == url('/investasi-lumpsum') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/investasi-lumpsum">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 3v18h18"></path><path d="M20 18v3"></path><path d="M16 16v5"></path><path d="M12 13v8"></path><path d="M8 16v5"></path><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Investasi
                      					</span>
									</a>
                  				</li>
								  <li class="nav-item {{ url()->current() == url('/pinjaman') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/pinjaman">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Pinjaman
                      					</span>
									</a>
                  				</li>
								  <li class="nav-item {{ url()->current() == url('/saham') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/saham">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M9 17v-5"></path><path d="M12 17v-1"></path><path d="M15 17v-3"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Saham
                      					</span>
									</a>
                  				</li>
	                		</ul>
            			</div>
          			</div>
          		</div>
        	</header>
      	</div>
		
      	<div class="page-wrapper">
			
			<div class="container container-slim my-auto" id="spinner" style="display:block;">
				<div class="text-center">
				<div class="mb-3">
					<a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo-small.svg" height="36" alt=""></a>
				</div>
				<div class="text-muted mb-3">Preparing application</div>
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
            			<label class="form-label">Pilih Jenis :</label>
            			<div class="form-selectgroup-boxes row mb-3">
							<div class="col-lg-6">
								<label class="form-selectgroup-item">
									<input type="radio" id="pemasukan" name="jenis" value="1" class="form-selectgroup-input" onchange="updateSelectOptions()">
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
									<input type="radio" id="pengeluaran" name="jenis" value="2" class="form-selectgroup-input" onchange="updateSelectOptions()">
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
                  					<label class="form-label">Jumlah : </label>
				  					<div class="input-group">
                              			<span class="input-group-text">
                                			Rp.
                              			</span>
                              			<input type="text" id="jumlah" oninput="updateFormattedNumber()" name="jumlah" class="form-control text-end" autocomplete="off">
                              			<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                            		</div>
                				</div>
              				</div>
              				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Kategori :</label>
                  					<select id="kategori" name="kategori" class="form-select">
									  <option value="" disabled selected>Pilih Kategori</option>
                    					
                  					</select>
                				</div>
              				</div>
			  				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Tanggal :</label>
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
						<button type="submit" class="btn btn-primary ms-auto">
              				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              				Tambah Catatan
						</button>
          			</div>
				</form>	
        	</div>
      	</div>
    </div>
	<!-- End of Modal Tambah Catatan -->

	
	<!-- End of Modal Edit Catatan -->
    <!-- Libs JS -->
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
    <script src="{{ asset('libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>
	<script src="{{ asset('libs/list.js/dist/list.min.js?1684106062')  }}" defer=""></script>
    <!-- Tabler Core -->
    <script src="{{ ('js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ ('js/demo.min.js?1684106062') }}" defer></script>
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
    </script>

<script>
// Function to format the number with thousands separator
function formatNumber(num) {
    // Convert number to string and split into integer and decimal parts
    const parts = num.toString().split(".");
    const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    
    // Check if decimal part exists
    const decimalPart = parts.length > 1 ? "," + parts[1] : "";
    
    // Return formatted number
    return integerPart + decimalPart;
}


// Function to update the value of the input field with formatted number
function updateFormattedNumber() {
    var inputElement = document.getElementById('jumlah');
    var rawValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    var formattedValue = formatNumber(rawValue); // Format the number
    inputElement.value = formattedValue; // Update the input field with formatted value
    inputElement.setAttribute('data-value', rawValue); // Store unformatted value in a data attribute
    setUnformattedValueToInput(); // Set the unformatted value to the input field jumlah1
}

function setUnformattedValueToInput() {
    var unformattedValue = getUnformattedValue(); // Retrieve the unformatted value
    var inputElement = document.getElementById('jumlah1');
    inputElement.value = unformattedValue; // Set the unformatted value to the input field jumlah1
}

// Function to get the unformatted value from the data attribute
function getUnformattedValue() {
    var inputElement = document.getElementById('jumlah');
    var unformattedValue = inputElement.getAttribute('data-value') || ''; // Retrieve unformatted value from data attribute
    return unformattedValue;
}

// Attach event listener to the input field to trigger formatting as the user types
document.getElementById('jumlah').addEventListener('input', updateFormattedNumber);
</script>

	<script>
		function updateSelectOptions() {
			var pemasukanRadio = document.getElementById('pemasukan');
			var pengeluaranRadio = document.getElementById('pengeluaran');
			var selectElement = document.getElementById('kategori');

			var defaultOption = selectElement.querySelector('option[value=""]');
        if (defaultOption) {
            selectElement.removeChild(defaultOption);
        }

			if (pemasukanRadio.checked) {
				// If "Pemasukan" radio button is checked
				selectElement.innerHTML = ''; // Clear existing options
				selectElement.innerHTML += '<option value="1">Uang Saku</option>';
				selectElement.innerHTML += '<option value="2">Upah</option>';
				selectElement.innerHTML += '<option value="3">Bonus</option>';
				selectElement.innerHTML += '<option value="3">Lainnya</option>';
			} else if (pengeluaranRadio.checked) {
				// If "Pengeluaran" radio button is checked
				selectElement.innerHTML = ''; // Clear existing options
				selectElement.innerHTML += '<option value="1">Makanan</option>';
				selectElement.innerHTML += '<option value="2">Minuman</option>';
				selectElement.innerHTML += '<option value="3">Tagihan</option>';
				selectElement.innerHTML += '<option value="4">Shopping</option>';
				selectElement.innerHTML += '<option value="5>Kesehatan & Olahraga</option>';
				selectElement.innerHTML += '<option value="6">Lainnya</option>';
			
		} else {
            // If neither radio button is checked, show "Pilih jenis" option
            selectElement.innerHTML += '<option value="" disabled selected>Pilih Kategori</option>';
        }

			selectElement.disabled = false;
		}
		updateSelectOptions();

	</script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: [2, 1],
      			dashArray: [0, 3],
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "May",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      		},{
      			name: "April",
      			data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 40.0,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Profits",
      			data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 240,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      			stacked: true,
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Web",
      			data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
      		},{
      			name: "Social",
      			data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
      		},{
      			name: "Other",
      			data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
      		],
      		colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:on
      document.addEventListener("DOMContentLoaded", function() {
      	const map = new jsVectorMap({
      		selector: '#map-world',
      		map: 'world',
      		backgroundColor: 'transparent',
      		regionStyle: {
      			initial: {
      				fill: tabler.getColor('body-bg'),
      				stroke: tabler.getColor('border-color'),
      				strokeWidth: 2,
      			}
      		},
      		zoomOnScroll: false,
      		zoomButtons: false,
      		// -------- Series --------
      		visualizeData: {
      			scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
      			values: { "AF": 16, "AL": 11, "DZ": 158, "AO": 85, "AG": 1, "AR": 351, "AM": 8, "AU": 1219, "AT": 366, "AZ": 52, "BS": 7, "BH": 21, "BD": 105, "BB": 3, "BY": 52, "BE": 461, "BZ": 1, "BJ": 6, "BT": 1, "BO": 19, "BA": 16, "BW": 12, "BR": 2023, "BN": 11, "BG": 44, "BF": 8, "BI": 1, "KH": 11, "CM": 21, "CA": 1563, "CV": 1, "CF": 2, "TD": 7, "CL": 199, "CN": 5745, "CO": 283, "KM": 0, "CD": 12, "CG": 11, "CR": 35, "CI": 22, "HR": 59, "CY": 22, "CZ": 195, "DK": 304, "DJ": 1, "DM": 0, "DO": 50, "EC": 61, "EG": 216, "SV": 21, "GQ": 14, "ER": 2, "EE": 19, "ET": 30, "FJ": 3, "FI": 231, "FR": 2555, "GA": 12, "GM": 1, "GE": 11, "DE": 3305, "GH": 18, "GR": 305, "GD": 0, "GT": 40, "GN": 4, "GW": 0, "GY": 2, "HT": 6, "HN": 15, "HK": 226, "HU": 132, "IS": 12, "IN": 1430, "ID": 695, "IR": 337, "IQ": 84, "IE": 204, "IL": 201, "IT": 2036, "JM": 13, "JP": 5390, "JO": 27, "KZ": 129, "KE": 32, "KI": 0, "KR": 986, "KW": 117, "KG": 4, "LA": 6, "LV": 23, "LB": 39, "LS": 1, "LR": 0, "LY": 77, "LT": 35, "LU": 52, "MK": 9, "MG": 8, "MW": 5, "MY": 218, "MV": 1, "ML": 9, "MT": 7, "MR": 3, "MU": 9, "MX": 1004, "MD": 5, "MN": 5, "ME": 3, "MA": 91, "MZ": 10, "MM": 35, "NA": 11, "NP": 15, "NL": 770, "NZ": 138, "NI": 6, "NE": 5, "NG": 206, "NO": 413, "OM": 53, "PK": 174, "PA": 27, "PG": 8, "PY": 17, "PE": 153, "PH": 189, "PL": 438, "PT": 223, "QA": 126, "RO": 158, "RU": 1476, "RW": 5, "WS": 0, "ST": 0, "SA": 434, "SN": 12, "RS": 38, "SC": 0, "SL": 1, "SG": 217, "SK": 86, "SI": 46, "SB": 0, "ZA": 354, "ES": 1374, "LK": 48, "KN": 0, "LC": 1, "VC": 0, "SD": 65, "SR": 3, "SZ": 3, "SE": 444, "CH": 522, "SY": 59, "TW": 426, "TJ": 5, "TZ": 22, "TH": 312, "TL": 0, "TG": 3, "TO": 0, "TT": 21, "TN": 43, "TR": 729, "TM": 0, "UG": 17, "UA": 136, "AE": 239, "GB": 2258, "US": 4624, "UY": 40, "UZ": 37, "VU": 0, "VE": 285, "VN": 101, "YE": 30, "ZM": 15, "ZW": 5 },
      		},
      	});
      	window.addEventListener("resize", () => {
      		map.updateSize();
      	});
      });
      // @formatter:off
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: [tabler.getColor("blue")],
      		series: [35],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      		chart: {
      			type: "area",
      			fontFamily: 'inherit',
      			height: 192,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: .16,
      			type: 'solid'
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "smooth",
      		},
      		series: [{
      			name: "Purchases",
      			data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      		],
      		colors: [tabler.getColor("primary")],
      		legend: {
      			show: false,
      		},
      		point: {
      			show: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
      		chart: {
      			type: "line",
      			fontFamily: 'inherit',
      			height: 24,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      		},
      		series: [{
      			color: tabler.getColor("primary"),
      			data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
      		}],
      	})).render();
      });
      // @formatter:on
    </script>
  </body>
</html>