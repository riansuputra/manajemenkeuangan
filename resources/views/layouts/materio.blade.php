<!DOCTYPE html>

<html lang="en" class="light-style layout-compact  layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/" data-base-url="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5" data-framework="laravel" data-template="horizontal-menu-theme-default-light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Analytics |
    Materio -
    Bootstrap 5 HTML + Laravel Admin Template</title>
  <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 + Laravel HTML Admin Dashboard Template built for developers!" />
  <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="DNH74R62nux0jDvzLKyNRDEe7leZlgate3fJviPa">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://themeselection.com/item/materio-bootstrap-laravel-admin-template/">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/favicon/favicon.ico" />

  
      <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5DDHKGP');</script>
  <!-- End Google Tag Manager -->
    

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/materialdesignicons.css?id=6dcb6840ed1b54e81c4279112d07827e" />
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/flag-icons.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/node-waves/node-waves.css?id=aa72fb97dfa8e932ba88c8a3c04641bc" />
<!-- Core CSS -->
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=844d8848f059310b5530fe2f16a8521a" class="template-customizer-core-css" />
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=52fab3455fdcaff9f4acefe519ec216b" class="template-customizer-theme-css" />
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/css/demo.css?id=e0dd12b480da2fee900cf30c26103f98" />

<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=f83e2378d0545f439cbfea281f4852dd" />
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.css?id=97b6e7a4d886c3d71a065c4b0d0d5f54" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/apex-charts/apex-charts.css" />


<!-- Page Styles -->

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
  <!-- laravel style -->
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/helpers.js"></script>
<!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/js/config.js"></script>

  <script>
    window.templateCustomizer = new TemplateCustomizer({
      cssPath: '',
      themesPath: '',
      defaultStyle: "light",
      defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
      displayCustomizer: "true",
      lang: 'en',
      pathResolver: function(path) {
        var resolvedPaths = {
          // Core stylesheets
                      'core.css': 'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=844d8848f059310b5530fe2f16a8521a',
            'core-dark.css': 'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=e02525be49a99197a4c9d5a84947fc8b',
          
          // Themes
                      'theme-default.css': 'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=52fab3455fdcaff9f4acefe519ec216b',
            'theme-default-dark.css':
            'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=c8fd4937f51751cb21fc1b850985e28d',
                      'theme-bordered.css': 'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=2e360cd4013a77f41e5735180028af47',
            'theme-bordered-dark.css':
            'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=0fd70b0f8c51077b53c94c534b6dea08',
                      'theme-semi-dark.css': 'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=7eb0cf231320db79df76c9cc343a9c64',
            'theme-semi-dark-dark.css':
            'https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=0d086bfea4ae48a5c1384981979967ac',
                  }
        return resolvedPaths[path] || path;
      },
      'controls': ["rtl","style","headerType","contentLayout","layoutCollapsed","layoutNavbarOptions","themes"],
    });
  </script>
</head>

<body>
  
      <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    

  <!-- Layout Content -->
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
  <div class="layout-container">

    <!-- BEGIN: Navbar-->
        <!-- Navbar -->
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
      
      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
            <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <span style="color:#9055FD;">
  <svg width="30" height="20" viewBox="0 0 250 196" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z" fill="currentColor" />
    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black" />
    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z" fill="currentColor" />
    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black" />
    <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd" d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z" fill="currentColor" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z" fill="white" fill-opacity="0.15" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z" fill="currentColor" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z" fill="white" fill-opacity="0.3" />
  </svg>
</span>
          </span>
          <span class="app-brand-text demo menu-text fw-semibold ms-1">Materio</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
      </div>
      
      <!-- ! Not required for layout-without-menu -->
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none  ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="mdi mdi-menu mdi-24px"></i>
        </a>
      </div>
      
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Search -->
          <li class="nav-item navbar-search-wrapper me-1 me-xl-0">
            <a class="nav-link search-toggler" href="javascript:void(0);">
              <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
            </a>
          </li>
          <!-- /Search -->
          
          <!-- Language -->
          <li class="nav-item dropdown-language dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='mdi mdi-translate mdi-24px'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-2">
              <li>
                <a class="dropdown-item active" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/lang/en" data-language="en">
                  <span class="align-middle">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item " href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/lang/fr" data-language="fr">
                  <span class="align-middle">French</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item " href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/lang/de" data-language="de">
                  <span class="align-middle">German</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item " href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/lang/pt" data-language="pt">
                  <span class="align-middle">Portuguese</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ Language -->

                    <!-- Style Switcher -->
          <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='mdi mdi-24px'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                  <span class="align-middle"><i class='mdi mdi-weather-sunny me-2'></i>Light</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                  <span class="align-middle"><i class="mdi mdi-weather-night me-2"></i>Dark</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                  <span class="align-middle"><i class="mdi mdi-monitor me-2"></i>System</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- / Style Switcher-->
          
          <!-- Quick links  -->
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class='mdi mdi-view-grid-outline mdi-24px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="mb-0 me-auto">Shortcuts</h6>
                  <a href="javascript:void(0)" class="dropdown-shortcuts-add text-heading" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="mdi mdi-plus mdi-24px"></i></a>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-calendar-blank mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/calendar" class="stretched-link">Calendar</a>
                    <small>Appointments</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi mdi-content-paste mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/invoice/list" class="stretched-link">Invoice App</a>
                    <small>Manage Accounts</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-account-outline mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/list" class="stretched-link">User App</a>
                    <small>Manage Users</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-shield-check-outline mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/access-roles" class="stretched-link">Role Management</a>
                    <small>Permission</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-monitor mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5" class="stretched-link">Dashboard</a>
                    <small>Analytics</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-cog-outline mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-account" class="stretched-link">Setting</a>
                    <small>Account Settings</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-help-circle-outline mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/faq" class="stretched-link">FAQs</a>
                    <small class="text-muted mb-0">FAQs & Articles</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary text-heading rounded-circle mb-3">
                      <i class="mdi mdi-dock-window mdi-24px"></i>
                    </span>
                    <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/modal-examples" class="stretched-link">Modals</a>
                    <small>Useful Popups</small>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- Quick links -->

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="mdi mdi-bell-outline mdi-24px"></i>
              <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="fw-normal mb-0 me-auto">Notification</h6>
                  <span class="badge rounded-pill bg-label-primary">8 New</span>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Congratulation Lettie 🎉</h6>
                        <small class="text-truncate text-body">Won the monthly best seller gold badge</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">1h ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Charles Franklin</h6>
                        <small class="text-truncate text-body">Accepted your connection</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">12hr ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">New Message ✉️</h6>
                        <small class="text-truncate text-body">You have new message from Natalie</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">1h ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-cart-outline"></i></span>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Whoo! You have new order 🛒 </h6>
                        <small class="text-truncate text-body">ACME Inc. made new order $1,154</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">1 day ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Application has been approved 🚀 </h6>
                        <small class="text-truncate text-body">Your ABC project application has been approved.</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">2 days ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-chart-pie-outline"></i></span>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Monthly report is generated</h6>
                        <small class="text-truncate text-body">July monthly financial report is generated </small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">3 days ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">Send connection request</h6>
                        <small class="text-truncate text-body">Peter sent you connection request</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">4 days ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1 text-truncate">New message from Jane</h6>
                        <small class="text-truncate text-body">Your have new message from Jane</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">5 days ago</small>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex align-items-center gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <span class="avatar-initial rounded-circle bg-label-warning"><i class="mdi mdi-alert-circle-outline"></i></span>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                        <h6 class="mb-1">CPU is running high</h6>
                        <small class="text-truncate text-body">CPU Utilization Percent is currently at 88.63%,</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">5 days ago</small>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown-menu-footer border-top p-3">
                <a href="javascript:void(0);" class="btn btn-primary d-flex justify-content-center">Read all notifications</a>
              </li>
            </ul>
          </li>
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
              <li>
                <a class="dropdown-item pb-2 mb-1" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2 pe-1">
                      <div class="avatar avatar-online">
                        <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">
                                                John Doe
                                              </h6>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider my-0"></div>
              </li>
              <li>
                <a class="dropdown-item" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user">
                  <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
                            <li>
                <a class="dropdown-item" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-billing">
                  <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 mdi mdi-credit-card-outline me-1 mdi-20px"></i>
                    <span class="flex-grow-1 align-middle ms-1">Billing</span>
                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                  </span>
                </a>
              </li>
                            <li>
                <div class="dropdown-divider"></div>
              </li>
                            <li>
                <a class="dropdown-item" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/login-basic">
                  <i class="mdi mdi-logout me-1 mdi-20px"></i>
                  <span class="align-middle">Login</span>
                </a>
              </li>
                          </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
        <input type="text" class="form-control search-input  border-0" placeholder="Search..." aria-label="Search...">
        <i class="mdi mdi-close search-toggler cursor-pointer"></i>
      </div>
      <!--/ Search Small Screens -->
          </div>
      </nav>
  <!-- / Navbar -->
        <!-- END: Navbar-->


    <!-- Layout page -->
    <div class="layout-page">

      
      

      <!-- Content wrapper -->
      <div class="content-wrapper">

                <!-- Horizontal Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
  <div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
      
      
      
      
      <li class="menu-item active">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                    <div>Dashboards</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/dashboard/crm" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-chart-donut"></i>
                    <div>CRM</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item active">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-chart-timeline-variant"></i>
                    <div>Analytics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-cart-outline"></i>
                    <div>eCommerce</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/logistics/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-truck-outline"></i>
                    <div>Logistics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/academy/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-notebook-outline"></i>
                    <div>Academy</div>
        </a>

        
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-window-maximize"></i>
                    <div>Layouts</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/layouts/without-menu" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-page-layout-header-footer"></i>
                    <div>Without menu</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/layouts/vertical" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-dock-left"></i>
                    <div>Vertical</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/layouts/fluid" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-dock-top"></i>
                    <div>Fluid</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/layouts/container" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-dock-window"></i>
                    <div>Container</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/layouts/blank" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-page-layout-body"></i>
                    <div>Blank</div>
        </a>

        
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-apps"></i>
                    <div>Apps</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/email" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Email</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/chat" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-message-outline"></i>
                    <div>Chat</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/calendar" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                    <div>Calendar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/kanban" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-view-grid-outline"></i>
                    <div>Kanban</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-domain"></i>
                    <div>eCommerce</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Products</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/product/list" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Product List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/product/add" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Add Product</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/product/category" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Category List</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Order</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/order/list" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Order List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/order/details" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div> Order Details</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Customer</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/customer/all" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>All Customers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Customer Details</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/customer/details/overview" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Overview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/customer/details/security" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/customer/details/billing" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Address &amp; Billing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/customer/details/notifications" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Notifications</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/manage/reviews" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Manage Reviews</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/referrals" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Referrals</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Settings</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/details" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Store details</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/payments" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Payments</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/checkout" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/shipping" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Shipping &amp; Delivery</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/locations" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Locations</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/ecommerce/settings/notifications" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Notifications</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-notebook-outline"></i>
                    <div>Academy</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/academy/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/academy/course" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>My Course</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/academy/course-details" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Course Details</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-truck-outline"></i>
                    <div>Logistics</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/logistics/dashboard" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/logistics/fleet" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Fleet</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
                    <div>Invoice</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/invoice/list" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/invoice/preview" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Preview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/invoice/edit" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Edit</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/invoice/add" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Add</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                    <div>Users</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/list" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>View</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/view/account" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Account</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/view/security" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/view/billing" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Billing &amp; Plans</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/view/notifications" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Notifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/user/view/connections" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-cog-outline"></i>
                    <div>Roles &amp; Permissions</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/access-roles" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Roles</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/app/access-permission" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Permission</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-language-php"></i>
                    <div>Laravel Example</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/laravel/user-management" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>User Management</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-content-paste"></i>
                    <div>Pages</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                    <div>Front Pages</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/front-pages/landing" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Landing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/front-pages/pricing" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Pricing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/front-pages/payment" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Payments</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/front-pages/checkout" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/front-pages/help-center" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Help Center</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-card-account-details-outline"></i>
                    <div>User Profile</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-user" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Profile</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-teams" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Teams</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-projects" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Projects</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/profile-connections" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-account-cog-outline"></i>
                    <div>Account Settings</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-account" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Account</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-security" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-billing" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Billing &amp; Plans</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-notifications" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Notifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/account-settings-connections" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/faq" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-frequently-asked-questions"></i>
                    <div>FAQ</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/pricing" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-currency-usd"></i>
                    <div>Pricing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-file-outline"></i>
                    <div>Misc</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/misc-error" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Error</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/misc-under-maintenance" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Under Maintenance</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/misc-comingsoon" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Coming Soon</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/misc-not-authorized" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Not Authorized</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/pages/misc-server-error" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Server Error</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-lock-open-outline"></i>
                    <div>Authentications</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Login</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/login-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/login-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Register</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/register-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/register-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/register-multisteps" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Multi-steps</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Verify Email</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/verify-email-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/verify-email-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Reset Password</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/reset-password-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/reset-password-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Forgot Password</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/forgot-password-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/forgot-password-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Two Steps</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/two-steps-basic" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/auth/two-steps-cover" class="menu-link"  target="_blank" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-dots-horizontal"></i>
                    <div>Wizard Examples</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/wizard/ex-checkout" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/wizard/ex-property-listing" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Property Listing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/wizard/ex-create-deal" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Create Deal</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/modal-examples" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-open-in-new"></i>
                    <div>Modal Examples</div>
        </a>

        
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-layers-outline"></i>
                    <div>Components</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
                    <div>Cards</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/basic" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/advance" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Advance</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/statistics" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Statistics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/analytics" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Analytics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/gamifications" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Gamifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/cards/actions" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Actions</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-palette-swatch-outline"></i>
                    <div>User interface</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/accordion" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Accordion</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/alerts" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Alerts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/badges" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Badges</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/buttons" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Buttons</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/carousel" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Carousel</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/collapse" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Collapse</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/dropdowns" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Dropdowns</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/footer" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Footer</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/list-groups" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>List groups</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/modals" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Modals</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/navbar" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Navbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/offcanvas" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Offcanvas</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/pagination-breadcrumbs" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Pagination &amp; Breadcrumbs</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/progress" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Progress</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/spinners" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Spinners</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/tabs-pills" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Tabs &amp; Pills</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/toasts" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Toasts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/tooltips-popovers" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Tooltips &amp; popovers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/ui/typography" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Typography</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-star-outline"></i>
                    <div>Extended UI</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-avatar" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Avatar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-blockui" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>BlockUI</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-drag-and-drop" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Drag &amp; Drop</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-media-player" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Media Player</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-perfect-scrollbar" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Perfect scrollbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-star-ratings" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Star Ratings</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-sweetalert2" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>SweetAlert2</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-text-divider" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Text Divider</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Timeline</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-timeline-basic" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-timeline-fullscreen" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Fullscreen</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-tour" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Tour</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-treeview" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Treeview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/extended/ui-misc" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Miscellaneous</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/icons/icons-mdi" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-google-circles-extended"></i>
                    <div>Icons</div>
        </a>

        
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-checkbox-marked-outline"></i>
                    <div>Forms</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-form-select"></i>
                    <div>Form Elements</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/basic-inputs" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic Inputs</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/input-groups" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Input groups</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/custom-options" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Custom Options</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/editors" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Editors</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/file-upload" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>File Upload</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/pickers" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Pickers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/selects" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Select &amp; Tags</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/sliders" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Sliders</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/switches" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Switches</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/forms/extras" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Extras</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>
                    <div>Form Layouts</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/layouts-vertical" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Vertical Form</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/layouts-horizontal" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Horizontal Form</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/layouts-sticky" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Sticky Actions</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-transit-connection-horizontal"></i>
                    <div>Form Wizard</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/wizard-numbered" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Numbered</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/wizard-icons" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Icons</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/form/validation" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-checkbox-marked-circle-outline"></i>
                    <div>Form Validation</div>
        </a>

        
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-table"></i>
                    <div>Tables</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/tables/basic" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-grid-large"></i>
                    <div>Tables</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-grid"></i>
                    <div>Datatables</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/tables/datatables-basic" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/tables/datatables-advanced" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Advanced</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/tables/datatables-extensions" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Extensions</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
      
      
      
      
      <li class="menu-item ">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-chart-donut"></i>
                    <div>Charts &amp; Maps</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <i class="menu-icon tf-icons mdi mdi-chart-line"></i>
                    <div>Charts</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/charts/apex" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>Apex Charts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/charts/chartjs" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-circle-outline mdi-14px p-1 text-body"></i>
                    <div>ChartJS</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-5/maps/leaflet" class="menu-link" >
                    <i class="menu-icon tf-icons mdi mdi-map-outline"></i>
                    <div>Leaflet Maps</div>
        </a>

        
              </li>
      </ul>
              </li>
          </ul>
  </div>
</aside>
<!--/ Horizontal Menu -->
        
        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <div class="row gy-4">
  <!-- Congratulations card -->
  <div class="col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-1">Congratulations John! 🎉</h4>
        <p class="pb-0">Best seller of the month</p>
        <h4 class="text-primary mb-1">$42.8k</h4>
        <p class="mb-2 pb-1">78% of target 🚀</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
      </div>
      <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/misc/triangle-light.png" class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background" data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
      <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/trophy.png" class="scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-4 pb-2" width="83" alt="view sales">
    </div>
  </div>
  <!--/ Congratulations card -->

  <!-- Transactions -->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transactions</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
        <p class="mt-3"><span class="fw-medium">Total 48.5% growth</span> 😎 this month</p>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-trending-up mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Sales</div>
                <h5 class="mb-0">245k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-account-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Customers</div>
                <h5 class="mb-0">12.5k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow">
                  <i class="mdi mdi-cellphone-link mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Product</div>
                <h5 class="mb-0">1.54k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-info rounded shadow">
                  <i class="mdi mdi-currency-usd mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Revenue</div>
                <h5 class="mb-0">$88k</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->

  <!-- Weekly Overview Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Weekly Overview</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="weeklyOverviewChart"></div>
        <div class="mt-1 mt-md-3">
          <div class="d-flex align-items-center gap-3">
            <h3 class="mb-0">45%</h3>
            <p class="mb-0">Your sales performance is 45% 😎 better compared to last month</p>
          </div>
          <div class="d-grid mt-3 mt-md-4">
            <button class="btn btn-primary" type="button">Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Weekly Overview Chart -->

  <!-- Total Earnings -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Total Earning</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="totalEarnings" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarnings">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="mb-3 mt-md-3 mb-md-5">
          <div class="d-flex align-items-center">
            <h2 class="mb-0">$24,895</h2>
            <span class="text-success ms-2 fw-medium">
              <i class="mdi mdi-menu-up mdi-24px"></i>
              <small>10%</small>
            </span>
          </div>
          <small class="mt-1">Compared to $84,325 last year</small>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-md-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/misc/zipcar.png" alt="zipcar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Zipcar</h6>
                <small>Vuejs, React & HTML</small>
              </div>
              <div>
                <h6 class="mb-2">$24,895.65</h6>
                <div class="progress bg-label-primary" style="height: 4px;">
                  <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-md-2">
            <div class="avatar flex-shrink-0 me-3">
              <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/misc/bitbank.png" alt="bitbank" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Bitbank</h6>
                <small>Sketch, Figma & XD</small>
              </div>
              <div>
                <h6 class="mb-2">$8,6500.20</h6>
                <div class="progress bg-label-info" style="height: 4px;">
                  <div class="progress-bar bg-info" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>
          <li class="d-flex mb-md-3">
            <div class="avatar flex-shrink-0 me-3">
              <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/misc/aviato.png" alt="aviato" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Aviato</h6>
                <small>HTML & Angular</small>
              </div>
              <div>
                <h6 class="mb-2">$1,2450.80</h6>
                <div class="progress bg-label-secondary" style="height: 4px;">
                  <div class="progress-bar bg-secondary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Total Earnings -->

  <!-- Four Cards -->
  <div class="col-xl-4 col-md-6">
    <div class="row gy-4">
      <!-- Total Profit line chart -->
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-header pb-0">
            <h4 class="mb-0">$86.4k</h4>
          </div>
          <div class="card-body">
            <div id="totalProfitLineChart" class="mb-3"></div>
            <h6 class="text-center mb-0">Total Profit</h6>
          </div>
        </div>
      </div>
      <!--/ Total Profit line chart -->
      <!-- Total Profit Weekly Project -->
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="avatar">
              <div class="avatar-initial bg-secondary rounded-circle shadow">
                <i class="mdi mdi-poll mdi-24px"></i>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="totalProfitID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical mdi-24px"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfitID">
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                <a class="dropdown-item" href="javascript:void(0);">Update</a>
              </div>
            </div>
          </div>
          <div class="card-body mt-mg-1">
            <h6 class="mb-2">Total Profit</h6>
            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
              <h4 class="mb-0 me-2">$25.6k</h4>
              <small class="text-success mt-1">+42%</small>
            </div>
            <small>Weekly Project</small>
          </div>
        </div>
      </div>
      <!--/ Total Profit Weekly Project -->
      <!-- New Yearly Project -->
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="avatar">
              <div class="avatar-initial bg-primary rounded-circle shadow-sm">
                <i class="mdi mdi-wallet-travel mdi-24px"></i>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="newProjectID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical mdi-24px"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="newProjectID">
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                <a class="dropdown-item" href="javascript:void(0);">Update</a>
              </div>
            </div>
          </div>
          <div class="card-body mt-mg-1">
            <h6 class="mb-2">New Project</h6>
            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
              <h4 class="mb-0 me-2">862</h4>
              <small class="text-danger mt-1">-18%</small>
            </div>
            <small>Yearly Project</small>
          </div>
        </div>
      </div>
      <!--/ New Yearly Project -->
      <!-- Sessions chart -->
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-header pb-0">
            <h4 class="mb-0">2,856</h4>
          </div>
          <div class="card-body">
            <div id="sessionsColumnChart" class="mb-3"></div>
            <h6 class="text-center mb-0">Sessions</h6>
          </div>
        </div>
      </div>
      <!--/ Sessions chart -->
    </div>
  </div>
  <!--/ Total Earning -->

  <!-- Performance Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Performance</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="performanceDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performanceDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="performanceChart"></div>
      </div>
    </div>
  </div>
  <!--/ Performance Chart -->

  <!-- Deposit / Withdraw -->
  <div class="col-xl-8">
    <div class="card">
      <div class="card-body row g-2">
        <div class="col-12 col-md-6 card-separator pe-0 pe-md-3">
          <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
            <h5 class="m-0 me-2">Deposit</h5>
            <a class="fw-medium" href="javascript:void(0);">View all</a>
          </div>
          <div class="pt-2">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/gumroad.png" class="img-fluid" alt="gumroad" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Gumroad Account</h6>
                    <small>Sell UI Kit</small>
                  </div>
                  <h6 class="text-success mb-0">+$4,650</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/mastercard-2.png" class="img-fluid" alt="mastercard" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Mastercard</h6>
                    <small>Wallet deposit</small>
                  </div>
                  <h6 class="text-success mb-0">+$92,705</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/stripes.png" class="img-fluid" alt="stripes" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Stripe Account</h6>
                    <small>iOS Application</small>
                  </div>
                  <h6 class="text-success mb-0">+$957</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/american-bank.png" class="img-fluid" alt="american" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">American Bank</h6>
                    <small>Bank Transfer</small>
                  </div>
                  <h6 class="text-success mb-0">+$6,837</h6>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/citi.png" class="img-fluid" alt="citi" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Bank Account</h6>
                    <small>Wallet deposit</small>
                  </div>
                  <h6 class="text-success mb-0">+$446</h6>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-md-6 ps-0 ps-md-3 mt-3 mt-md-2">
          <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
            <h5 class="m-0 me-2">Withdraw</h5>
            <a class="fw-medium" href="javascript:void(0);">View all</a>
          </div>
          <div class="pt-2">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/brands/google.png" class="img-fluid" alt="google" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Google Adsense</h6>
                    <small>Paypal deposit</small>
                  </div>
                  <h6 class="text-danger mb-0">-$145</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/brands/github.png" class="img-fluid" alt="github" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Github Enterprise</h6>
                    <small>Security &amp; compliance</small>
                  </div>
                  <h6 class="text-danger mb-0">-$1870</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/brands/slack.png" class="img-fluid" alt="slack" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Upgrade Slack Plan</h6>
                    <small>Debit card deposit</small>
                  </div>
                  <h6 class="text-danger mb-0">$450</h6>
                </div>
              </li>
              <li class="d-flex mb-4 align-items-center pb-2">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/payments/digital-ocean.png" class="img-fluid" alt="digital" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Digital Ocean</h6>
                    <small>Cloud Hosting</small>
                  </div>
                  <h6 class="text-danger mb-0">-$540</h6>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                  <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/icons/brands/aws.png" class="img-fluid" alt="aws" height="30" width="30">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">AWS Account</h6>
                    <small>Choosing a Cloud Platform</small>
                  </div>
                  <h6 class="text-danger mb-0">-$21</h6>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Deposit / Withdraw -->

  <!-- Sales by Countries -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Sales by Countries</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="saleStatus" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="saleStatus">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <div class="avatar-initial bg-label-success rounded-circle">US</div>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">$8,656k</h6>
                <i class="mdi mdi-chevron-up mdi-24px text-success"></i>
                <small class="text-success">25.8%</small>
              </div>
              <small>United states of america</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">894k</h6>
            <small>Sales</small>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-danger rounded-circle">UK</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">$2,415k</h6>
                <i class="mdi mdi-chevron-down mdi-24px text-danger"></i>
                <small class="text-danger">6.2%</small>
              </div>
              <small>United Kingdom</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">645k</h6>
            <small>Sales</small>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-warning rounded-circle">IN</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">865k</h6>
                <i class="mdi mdi-chevron-up mdi-24px text-success"></i>
                <small class="text-success"> 12.4%</small>
              </div>
              <small>India</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">148k</h6>
            <small>Sales</small>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-secondary rounded-circle">JA</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">$745k</h6>
                <i class="mdi mdi-chevron-down mdi-24px text-danger"></i>
                <small class="text-danger">11.9%</small>
              </div>
              <small>Japan</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">86k</h6>
            <small>Sales</small>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-danger rounded-circle">KO</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">$45k</h6>
                <i class="mdi mdi-chevron-up mdi-24px text-success"></i>
                <small class="text-success">16.2%</small>
              </div>
              <small>Korea</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">42k</h6>
            <small>Sales</small>
          </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <span class="avatar-initial bg-label-primary rounded-circle">CH</span>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">$12k</h6>
                <i class="mdi mdi-chevron-up mdi-24px text-success"></i>
                <small class="text-success">14.8%</small>
              </div>
              <small>China</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">8k</h6>
            <small>Sales</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Sales by Countries -->
  <!-- Data Tables -->
  <div class="col-xl-8 col-md-6">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">User</th>
              <th class="text-truncate">Email</th>
              <th class="text-truncate">Role</th>
              <th class="text-truncate">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                    <small class="text-truncate">@amiccoo</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">susanna.Lind57@gmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin</td>
              <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                    <small class="text-truncate">@brossiter15</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">estelle.Bailey10@gmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i> Editor</td>
              <td><span class="badge bg-label-success rounded-pill">Active</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                    <small class="text-truncate">@bemblinf</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">milo86@hotmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-cog-outline text-warning mdi-24px me-1"></i> Author</td>
              <td><span class="badge bg-label-success rounded-pill">Active</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                    <small class="text-truncate">@bbinerh</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">lonnie35@hotmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i> Editor</td>
              <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                    <small class="text-truncate">@bkrabbe1d</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">ahmad_Collins@yahoo.com</td>
              <td class="text-truncate"><i class="mdi mdi-chart-donut mdi-24px text-success me-1"></i> Maintainer</td>
              <td><span class="badge bg-label-success rounded-pill">Active</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                    <small class="text-truncate">@brosebothamz</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i> Editor</td>
              <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                    <small class="text-truncate">@bkildayr</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">otho21@gmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i> Subscriber</td>
              <td><span class="badge bg-label-success rounded-pill">Active</span></td>
            </tr>
            <tr class="border-transparent">
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">Breena Gallemore</h6>
                    <small class="text-truncate">@bgallemore6</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">florencio.Little@hotmail.com</td>
              <td class="text-truncate"><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i> Subscriber</td>
              <td><span class="badge bg-label-secondary rounded-pill">Inactive</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Data Tables -->
</div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
                    <!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
      <div class="text-body mb-2 mb-md-0">
        © <script>
          document.write(new Date().getFullYear())
        </script>, made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">ThemeSelection</a>
      </div>
      <div  class="d-none d-lg-inline-block">
        <a href="https://themeselection.com/license/" class="footer-link me-3" target="_blank">License</a>
        <a href="https://themeselection.com/" target="_blank" class="footer-link me-3">More Themes</a>
        <a href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/documentation/laravel-introduction.html" target="_blank" class="footer-link me-3">Documentation</a>
        <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
                    <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- / Layout Container -->

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
    <!--/ Layout Content -->

  
  <div class="buy-now">
    <a href="https://themeselection.com/item/materio-bootstrap-laravel-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
  </div>
  

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/jquery/jquery.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/popper/popper.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/bootstrap.js?id=4b1a450d7bd34439656711e022110b65"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/node-waves/node-waves.js?id=4fae469a3ded69fb59fce3dcc14cd638"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/hammer/hammer.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/menu.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/js/main.js?id=e46da52cc43e079943fb6810bf346c25"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/js/dashboards-analytics.js"></script>
<!-- END: Page JS-->

</body>

</html>
