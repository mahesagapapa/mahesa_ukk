 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('petugas') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?= base_url('petugas') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->



     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Master Data
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('petugas/kategori') ?>">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Kategori</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('petugas/Masyarakat') ?>">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Masyarakat</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('petugas/petugas') ?>">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Petugas</span></a>
     </li>

     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Panduan
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('petugas/pengadu') ?>">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Pangaduan</span></a>
     </li>



     <hr class="sidebar-divider d-none d-md-block">


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->


 </ul>
 <!-- End of Sidebar -->