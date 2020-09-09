<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
<img src="<?= BASEURL; ?>/img/logotrp.jpg" alt="Logo" style="width:40px;">
  <div class="sidebar-brand-text mx-3">PT. TRP</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= BASEURL; ?>/home">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Data Utama
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa fa-fw fa-archive"></i>
    <span>Data</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Data Master:</h6>
      <a class="collapse-item" href="<?= BASEURL; ?>/bahanbantu">Bahan Bantu</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/kayu">Kayu Log</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/vinir">Vinir</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/jeniskayu">Jenis Kayu</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/supplier">Supplier</a>
    <h6 class="collapse-header">Barang Masuk:</h6>
      <a class="collapse-item" href="<?= BASEURL; ?>/bahanmasuk">Bahan Bantu</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/kayumasuk">Kayu Log</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/vinirmasuk">Vinir</a>
    <h6 class="collapse-header">Barang Keluar:</h6>
      <a class="collapse-item" href="<?= BASEURL; ?>/gluemix">Gluemix</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/vinirkeluar">Vinir</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fa fa-fw fa-file"></i>
    <span>Laporan</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Barang Masuk:</h6>
      <a class="collapse-item" href="<?= BASEURL; ?>/laporan/bahanmasuk">Bahan Bantu</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/laporan/kayumasuk">Kayu Log</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/laporan/vinirmasuk">Vinir</a>
    <h6 class="collapse-header">Barang Keluar:</h6>
      <a class="collapse-item" href="<?= BASEURL; ?>/laporan/gluemix">Gluemix</a>
      <a class="collapse-item" href="<?= BASEURL; ?>/laporan/vinirkeluar">Vinir</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  PENGATURAN
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pengaturan</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?= BASEURL; ?>/user">List User</a>
      <div class="collapse-divider"></div>
      <a class="collapse-item" href="<?= BASEURL; ?>/kategori">Kategori</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->