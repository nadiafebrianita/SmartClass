<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Smart Class
  </title>
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard" />
  <!--  Social tags      -->
  <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
  <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
  <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
  <meta property="og:site_name" content="Creative Tim" />
  <!-- Favicon -->
  <link href="<?php echo base_url('assets/img/brand/favicon.png') ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url('assets/js/plugins/nucleo/css/nucleo.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/argon-dashboard.min.css?v=1.1.0') ?>" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0">
        <img src="<?php echo base_url('assets/img/brand/undip.png') ?>" class="navbar-brand-img" alt="...">
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="<?php echo base_url('index.html')?>">
                <img src="<?php echo base_url('assets/img/brand/blue.png')?>">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
                <!-- Navigation -->
                <ul class="navbar-nav">
          <li class="nav-item  class=" active" ">
          <a class=" nav-link active " href="<?php echo base_url(); ?>"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-kuliah" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-kuliah">
              <i class="ni ni-bullet-list-67 text-green"></i> 
              <span class="nav-link-text">Pengaturan Kuliah</span>
            </a>
            <div class="collapse" id="navbar-kuliah">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo site_url('smt'); ?>" class="nav-link">Pengaturan Semester</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('matkul/aturmatkul'); ?>" class="nav-link">Pengaturan Mata Kuliah</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('jadwal/aturjadwal'); ?>" class="nav-link">Pengaturan Jadwal</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('mhsmatkul'); ?>" class="nav-link">Pengaturan Mahasiswa Mata Kuliah</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('kls/show_kls'); ?>" class="nav-link">Pengaturan Kelas</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('prodi'); ?>" class="nav-link">Pengaturan Program Studi</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('fkl'); ?>" class="nav-link">Pengaturan Fakultas</a>
                  </li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-laporan" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-laporan">
              <i class="ni ni-ungroup text-orange"></i> 
              <span class="nav-link-text">Laporan</span>
            </a>
            <div class="collapse" id="navbar-laporan">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo site_url('presensimhs'); ?>" class="nav-link">Presensi Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">Data Mahasiswa per Mata Kuliah</a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">Data Mata Kuliah per Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('jadwal/show_jadwal'); ?>" class="nav-link">Jadwal Kuliah</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('kls'); ?>" class="nav-link">Daftar Kelas</a>
                  </li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-akademisi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-akademisi">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Data Akademisi</span>
            </a>
            <div class="collapse" id="navbar-akademisi">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?php echo site_url('dosen'); ?>" class="nav-link">Data Dosen</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('mhs'); ?>" class="nav-link">Data Mahasiswa</a>
                  </li>
                </ul>
              </div>
          </li>
        </ul>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Smart Class</div>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url('assets/img/theme/team-4-800x800.jpg')?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url('examples/profile.html')?>" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->