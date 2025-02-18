<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">

<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>@yield('title') - Smart Finance</title>
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
	<link href="{{ asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
	<link href="{{asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
	<link rel="icon" type="image/png" href="{{ asset('img\logo_new.png') }}">
    <style>
		@import url('https://rsms.me/inter/inter.css');
		:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		} body {
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
            		<h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3">
						<a>
							<img src="{{ asset('img/logo-2.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image pe-1">
						</a>
						<span class="text-white">Smart Finance</span>
            		</h1>
            		<div class="navbar-nav flex-row order-md-last">
              			<div class="nav-item dropdown">
                			<a href="" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                   				<span class="avatar avatar-sm text-primary">
								  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" /></svg>
								</span>
                  				<div class="d-none d-xl-block ps-2">
									<div class="text-white">{{$user['name']}}</div>
								  	<div class="mt-1 small text-white">{{$user['email']}}</div>
                  				</div>
								<span class="icon text-white ps-1">
								  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" /></svg>
								</span>
                			</a>
                			<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<a class="dropdown-item" href="{{ url('/informasi-akun') }}" >
							  		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path></svg>
                              			Informasi Akun
                            	</a>	
								<a class="dropdown-item" href="{{ url('/tentang') }}" >
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
                              			Tentang Aplikasi
                            	</a>
								<a class="dropdown-item" href="mailto:smartfinance.ta.com" >
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
								<li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ route('dashboard') }}" >
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
                        					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
										</span>
                      					<span class="nav-link-title">
										  	{{ __('messages.dashboard') }}
                      					</span>
									</a>
                  				</li>
								<li class="nav-item dropdown {{ request()->routeIs('catatan.keuangan') ? 'active' : '' }} {{ request()->routeIs('catatan.umum') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<span class="nav-link-icon d-md-none d-lg-inline-block">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M9 7l6 0"></path><path d="M9 11l6 0"></path><path d="M9 15l4 0"></path></svg>
										</span>
                      					<span class="nav-link-title">
										  	{{ __('messages.catatan') }}
                      					</span>
                    				</a>
                            		<div class="dropdown-menu">
              							<a class="dropdown-item" href="{{ route('catatan.keuangan') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
                            					Keuangan
                          				</a>
						  				<a class="dropdown-item" href="{{ route('catatan.umum') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" /><path d="M13 8l2 0" /><path d="M13 12l2 0" /></svg>
                            					Umum
                          				</a>
									</div>
                  				</li>
								<li class="nav-item {{ request()->routeIs('anggaran.week') ? 'active' : '' }} {{ request()->routeIs('anggaran.month') ? 'active' : '' }} {{ request()->routeIs('anggaran.year') ? 'active' : '' }}" >
                    				<a class="nav-link" href="{{ route('anggaran.week') }}">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
					  						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0"></path><path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path><path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path><path d="M5 15v1m0 -8v1"></path></svg>
                      					</span>
                      					<span class="nav-link-title">
										  	{{ __('messages.anggaran') }}
                      					</span>
									</a>
                  				</li>
								<li class="nav-item dropdown {{ request()->routeIs('kurs') ? 'active' : '' }} {{ request()->routeIs('berita') ? 'active' : '' }} {{ request()->routeIs('dividen') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-info"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M11 14h1v4h1" /><path d="M12 11h.01" /></svg>
                      					</span>
										<span class="nav-link-title">
										  	{{ __('messages.informasi') }}
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('berita') }}">
											<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
						  						Berita
										</a>
                          				<a class="dropdown-item" href="{{ route('kurs') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3" /><path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3" /></svg>
	                            				Kurs
                          				</a>
										<a class="dropdown-item" href="{{ route('dividen') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M3 10l18 0" /><path d="M5 6l7 -3l7 3" /><path d="M4 10l0 11" /><path d="M20 10l0 11" /><path d="M8 14l0 3" /><path d="M12 14l0 3" /><path d="M16 14l0 3" /></svg>
                            					Dividen
                          				</a>
                    				</div>
								</li>
				  				<li class="nav-item dropdown 
									{{ request()->routeIs('investasi.lumpsum') ? 'active' : '' }} 
									{{ request()->routeIs('investasi.bulanan') ? 'active' : '' }} 
									{{ request()->routeIs('investasi.target.bulanan') ? 'active' : '' }}
									{{ request()->routeIs('investasi.target.lumpsum') ? 'active' : '' }}
									{{ request()->routeIs('pinjaman.bunga.efektif') ? 'active' : '' }} 
									{{ request()->routeIs('pinjaman.bunga.tetap') ? 'active' : '' }}">
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 4h6v6h-6z" /><path d="M4 14h6v6h-6z" /><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                      					</span>
                      					<span class="nav-link-title">
										  	{{ __('messages.simulasi') }}
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
										<div class="dropend">
											<a class="dropdown-item dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
												<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 3v18h18"></path><path d="M20 18v3"></path><path d="M16 16v5"></path><path d="M12 13v8"></path><path d="M8 16v5"></path><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path></svg>
													Investasi
											</a>
											<div class="dropdown-menu">
												<a href="{{ route('investasi.bulanan') }}" class="dropdown-item">
													Bulanan
												</a>
												<a href="{{ route('investasi.lumpsum') }}" class="dropdown-item">
													Lumpsum
												</a>
											</div>
										</div>
										<div class="dropend">
											<a class="dropdown-item dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
												<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path></svg>
													Pinjaman
											</a>
											<div class="dropdown-menu">
												<a href="{{ route('pinjaman.bunga.efektif') }}" class="dropdown-item">
													Bunga Efektif (Anuitas)
												</a>
												<a href="{{ route('pinjaman.bunga.tetap') }}" class="dropdown-item">
													Bunga Tetap (Flat)
												</a>
											</div>
										</div>
                    				</div>
								</li>
								<li class="nav-item dropdown {{ request()->routeIs('portofolio.mutasi.dana') ? 'active' : '' }} {{ request()->routeIs('portofolio') ? 'active' : '' }} {{ request()->routeIs('portofolio.historis') ? 'active' : '' }}" >
                    				<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                      					<span class="nav-link-icon d-md-none d-lg-inline-block">
										  	<svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
                      					</span>
                      					<span class="nav-link-title">
										  	{{ __('messages.portofolio') }}
                      					</span>
                    				</a>
                    				<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('portofolio') }}">
											<svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M8 11h8v7h-8z" /><path d="M8 15h8" /><path d="M11 11v7" /></svg>
							  					Portofolio
										</a>
                          				<a class="dropdown-item" href="{{ route('portofolio.mutasi.dana') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
                            					Mutasi Dana
                          				</a>
										  <a class="dropdown-item" href="{{ route('portofolio.historis') }}">
										  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-inline me-1"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20.866 10.45a9 9 0 1 0 -7.815 10.488" /><path d="M12 7v5l1.5 1.5" /><path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M19 21v1m0 -8v1" /></svg>
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
												<span class="flag @if((session('locale', config('app.locale'))) == 'en') flag-country-us
													@elseif((session('locale', config('app.locale'))) == 'id')  flag-country-id @endif nav-link-icon d-md-none d-lg-inline-block">
												</span>
                    						</span>
                    						<span class="nav-link-title">
												{{ __('messages.bahasa') }}
                    						</span>
                  						</a>
                  						<div class="dropdown-menu">
                    						<a class="dropdown-item" href="{{ route('bahasa.en') }}">
					  							<span class="flag flag-country-us"></span>
													&nbsp English
                    						</a>
											<a class="dropdown-item" href="{{ route('bahasa.id') }}">
					  							<span class="flag flag-country-id"></span>
                      								&nbsp Indonesia
                    						</a>
                  						</div>
                					</li>
									<li class="nav-item dropdown">
                  						<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                    						<span class="nav-link-icon d-md-none d-lg-inline-block">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-yellow hide-theme-light"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 1.992a10 10 0 1 0 9.236 13.838c.341 -.82 -.476 -1.644 -1.298 -1.31a6.5 6.5 0 0 1 -6.864 -10.787l.077 -.08c.551 -.63 .113 -1.653 -.758 -1.653h-.266l-.068 -.006l-.06 -.002z" /></svg>
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-warning hide-theme-dark"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M18.313 16.91l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.218 -1.567l.102 .07z" /><path d="M7.007 16.993a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M6.213 4.81l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.217 -1.567l.102 .07z" /><path d="M19.107 4.893a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z" /></svg>
                    						</span>
                    						<span class="nav-link-title">
												{{ __('messages.tema') }}
                    						</span>
                  						</a>
                  						<div class="dropdown-menu">
										  	<a href="{{ url()->current() }}?theme=dark" class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
											  	<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-yellow"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 1.992a10 10 0 1 0 9.236 13.838c.341 -.82 -.476 -1.644 -1.298 -1.31a6.5 6.5 0 0 1 -6.864 -10.787l.077 -.08c.551 -.63 .113 -1.653 -.758 -1.653h-.266l-.068 -.006l-.06 -.002z" /></svg>
													&nbsp Dark
											</a>
											<a href="{{ url()->current() }}?theme=light" class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon text-warning"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M18.313 16.91l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.218 -1.567l.102 .07z" /><path d="M7.007 16.993a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" /><path d="M6.213 4.81l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.217 -1.567l.102 .07z" /><path d="M19.107 4.893a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z" /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" /><path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z" /></svg>
													&nbsp Light
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
					<div class=" mb-3">Loading</div>
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
	{{-- Modal tambah catatan --}}
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        	<div class="modal-content">
          		<div class="modal-header">
            		<h5 class="modal-title">Tambah Catatan</h5>
            		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          		</div>
		  		<form action="{{ route('catatan.keuangan.store') }}" method="post" autocomplete="off">
					@csrf
					<div class="modal-status bg-success"></div>
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
                              			<input type="text" id="jumlah" oninput="updateFormattedNumber()" name="jumlah" class="form-control text-end" autocomplete="off" placeholder="0" required>
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
                  					<textarea id="catatan" name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan disini..."></textarea>
                				</div>
              				</div>
            			</div>
          			</div>
          			<div class="modal-footer">
						<button type="button" class="me-auto btn" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-success ms-auto">
              				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              					Simpan
						</button>
          			</div>
				</form>	
        	</div>
      	</div>
    </div>
	{{-- Modal tambah catatan --}}
     
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('js/tabler.min.js?1684106062') }}" defer></script>
	<script src="{{url('dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062')}}" defer></script>

	{{-- Script untuk toast --}}
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

	{{-- Script untuk format angka ribuan --}}
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

	{{-- Script untuk load kategori --}}
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			let tomSelectInstances = {};

			function initTomSelect(selectElement) {
				if (!selectElement) return;

				let id = selectElement.id;
				if (!id) return;

				// Hapus instance Tom Select sebelumnya jika ada
				if (tomSelectInstances[id]) {
					tomSelectInstances[id].destroy();
				}

				// Inisialisasi Tom Select baru
				tomSelectInstances[id] = new TomSelect(selectElement, {
					copyClassesToDropdown: false,
					render: {
						item: function (data, escape) {
							return `<div>${escape(data.text)}</div>`;
						},
						option: function (data, escape) {
							return `<div>${escape(data.text)}</div>`;
						}
					}
				});
			}
    		const kategoriPemasukanData = @json($kategoriPemasukanData ?? []);
    		const kategoriPengeluaranData = @json($kategoriPengeluaranData ?? []);

			function updateSelectOptions1(radioElement) {
				let modal = radioElement.closest('.modal');
				let selectElement = modal.querySelector('.kategoriadd');

				if (!selectElement) return;
				let id = selectElement.id;

				if (!tomSelectInstances[id]) {
					initTomSelect(selectElement);
				}

				let tomSelectInstance = tomSelectInstances[id];

				// Hapus semua opsi sebelumnya
				tomSelectInstance.clear();
				tomSelectInstance.clearOptions();

				let dataToUse = radioElement.classList.contains('pemasukan-radio')
					? kategoriPemasukanData
					: kategoriPengeluaranData;

				dataToUse.forEach(function (item) {
					tomSelectInstance.addOption({
						value: item.id,
						text: item.nama_kategori_pemasukan || item.nama_kategori_pengeluaran
					});
				});

				tomSelectInstance.refreshOptions(false);
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