 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('User')?>">
         <div class="sidebar-brand-icon rotate-n-15">
         <img src="<?= base_url('assets/img/uploads/banyak.jpg')?>" class="img-thumbnail">
         </div>
         <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?=base_url('User')?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->



     <hr class="sidebar-divider">

    
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('User/pengaduan')?>">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Pengaduan</span></a>
     </li>
     

     <hr class="sidebar-divider">

     

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->


 </ul>
 <!-- End of Sidebar -->