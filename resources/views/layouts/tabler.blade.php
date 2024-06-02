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

	
</head>

<body>

	<div class="page">



	<div class="sticky-top">
        <header class="navbar navbar-expand-md sticky-top d-print-none">
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark text-muted d-none-navbar-horizontal pe-0 pe-md-3">
						<a href=".">
							<img src="{{ asset('img\logo_new.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image pe-1">
						</a>
						Smart Finance
            		</h1>
            <div class="navbar-nav flex-row order-md-last">
              
              <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                  <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
                </a>
                <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
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
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
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
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
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
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
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
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
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
                    				<div>test</div>
                    				<div class="mt-1 small text-muted">test</div>
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
								  <li class="nav-item {{ url()->current() == url('/catatan-harian') ? 'active' : '' }} {{ url()->current() == url('/catatan-mingguan') ? 'active' : '' }} {{ url()->current() == url('/catatan-bulanan') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ url('./catatan-harian') }}">
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M9 7l6 0"></path><path d="M9 11l6 0"></path><path d="M9 15l4 0"></path></svg>
										</span>
                      					<span class="nav-link-title">
                        					Catatan
                      					</span>
                    				</a>
                  				</li>
								  <!-- <li class="nav-item {{ url()->current() == url('/anggaran') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/anggaran">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M5 15v1m0 -8v1"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Anggaran
                      					</span>
									</a>
                  				</li> -->
								  <li class="nav-item {{ url()->current() == url('/anggaran-week') ? 'active' : '' }} {{ url()->current() == url('/anggaran-month') ? 'active' : '' }} {{ url()->current() == url('/anggaran-year') ? 'active' : '' }}" >
                    				<a class="nav-link" href="/anggaran-week">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M5 15v1m0 -8v1"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
                        					Anggaran
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
				  <li class="nav-item dropdown {{ url()->current() == url('/pinjaman') ? 'active' : '' }}" >
                    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
					  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path></svg>

                      </span>
                      <span class="nav-link-title">
                        Pinjaman
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      
                          <a class="dropdown-item" href="{{ url('/pinjaman') }}">
                            Simulasi Bunga Anuitas
                          </a>
						  <a class="dropdown-item" href="{{ url('/pinjaman-bunga-efektif') }}">
							  Simulasi Bunga Efektif
							</a>
							<a class="dropdown-item" href="{{ url('/pinjaman-bunga-floating') }}">
								Simulasi Bunga Floating
							</a>
							<a class="dropdown-item" href="{{ url('/pinjaman-bunga-tetap') }}">
							  Simulasi Bunga Tetap
							</a>
                          
                        
                    </div>
                  </li>
				  <li class="nav-item dropdown {{ url()->current() == url('/investasi-lumpsum') ? 'active' : '' }} {{ url()->current() == url('/investasi-bulanan') ? 'active' : '' }} {{ url()->current() == url('/investasi-target') ? 'active' : '' }}" >
                    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
					  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 3v18h18"></path><path d="M20 18v3"></path><path d="M16 16v5"></path><path d="M12 13v8"></path><path d="M8 16v5"></path><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path></svg>


                      </span>
                      <span class="nav-link-title">
                        Investasi
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      
						<a class="dropdown-item" href="{{ url('/investasi-bulanan') }}">
						  Bulanan
						</a>
                          <a class="dropdown-item" href="{{ url('/investasi-Lumpsum') }}">
                            Lumpsum
                          </a>
                          <a class="dropdown-item" href="{{ url('/investasi-Target') }}">
                            Target
                          </a>
                          
                        
                    </div>
                  </li>

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
					<a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('img\logo_new.png') }}" height="100" alt=""></a>
				</div>
				<div class="text-muted mb-3">Loading . . . . . </div>
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
									<input type="radio" id="pemasukan" name="jenis" value="1" class="form-selectgroup-input pemasukan-radio" onchange="updateSelectOptions1(this)" required>
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
									<input type="radio" id="pengeluaran" name="jenis" value="2" class="form-selectgroup-input pengeluaran-radio" onchange="updateSelectOptions1(this)" required>
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
                              			<input type="text" id="jumlah" oninput="updateFormattedNumber()" name="jumlah" class="form-control text-end" autocomplete="off" required>
                              			<input type="text" id="jumlah1" name="jumlah1" class="form-control text-end" autocomplete="off" hidden>
                            		</div>
                				</div>
              				</div>
              				<div class="col-lg-4">
                				<div class="mb-3">
                  					<label class="form-label">Kategori :</label>
                  					
									
									<select id="kategoriadd" name="kategoriadd" class="form-select kategoriadd">
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
    <!-- Tabler Core -->
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
		document.addEventListener("DOMContentLoaded", function() {
    const kategoriPemasukanData = @json($kategoriPemasukanData ?? []);
    const kategoriPengeluaranData = @json($kategoriPengeluaranData ?? []);

    function updateSelectOptions1(radioElement) {
        // Find the closest modal and its select element
        var modal = radioElement.closest('.modal');
        var selectElement = modal.querySelector('.kategoriadd');

        // Clear existing options
        selectElement.innerHTML = '';

        // Add appropriate options based on the selected radio button
        if (radioElement.classList.contains('pemasukan-radio')) {
            kategoriPemasukanData.forEach(function(item) {
                selectElement.innerHTML += `<option value="${item.id_kategori_pemasukan}">${item.nama_kategori_pemasukan}</option>`;
            });
        } else if (radioElement.classList.contains('pengeluaran-radio')) {
            kategoriPengeluaranData.forEach(function(item) {
                selectElement.innerHTML += `<option value="${item.id_kategori_pengeluaran}">${item.nama_kategori_pengeluaran}</option>`;
            });
        }

        selectElement.disabled = false;
    }

    // Add event listeners to the radio buttons in the modal
    document.querySelectorAll('.pemasukan-radio, .pengeluaran-radio').forEach(function(radio) {
        radio.addEventListener('change', function() {
            updateSelectOptions1(this);
        });
    });

    // Clear modal fields when the modal is hidden
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function() {
            // Clear the form fields
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }

            // Clear the select element
            const selectElement = this.querySelector('.kategoriadd');
            if (selectElement) {
                selectElement.innerHTML = '<option value="" disabled selected>Pilih Kategori</option>';
                selectElement.disabled = true;
            }

            // Clear radio buttons
            const radioButtons = this.querySelectorAll('.pemasukan-radio, .pengeluaran-radio');
            radioButtons.forEach(function(radio) {
                radio.checked = false;
            });
        });
    });
});

    </script>
	</script>
    
  </body>
</html>