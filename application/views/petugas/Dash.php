
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Pengaduan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $selesai?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div >

                        

                       
                    <div>


                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Info</h6>
                                    </div>
                                    <div class="card-body">

                                        <table class="table">

                                            <tr>
                                                <td>
                                                    <h6>Nama</h6>
                                                </td>
                                                <td>
                                                    <h6>: <?= $user['nama_petugas'] ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Nomor Telepon</h6>
                                                </td>
                                                <td>
                                                    <h6>: <?= $user['telp'] ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Level</h6>
                                                </td>
                                                <td>
                                                    <h6>: <?= $user['level'] ?></h6>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>



                            </div>


                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            </div>
            <!-- End of Main Content -->

          