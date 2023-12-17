 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-poll-h"></i>Inventori</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="images/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
         
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION['user']; ?></h6>
                        <span><?=$_SESSION['level']; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <?php if (($_SESSION['level'] == "admin")) { ?>
                        <a href="index.php" class="nav-item nav-link <?php if ($hal=="index"){echo "active";}?>"><i class="fas fa-boxes me-2"></i>Stok Barang</a>
                        <a href="masuk.php" class="nav-item nav-link <?php if ($hal=="masuk"){echo "active";}?>"><i class="fas fa-dolly-flatbed me-2"></i>Barang Masuk</a>
                        <a href="keluar.php" class="nav-item nav-link <?php if ($hal=="keluar"){echo "active";}?>"><i class="fas fa-dolly me-2"></i>Barang Keluar</a>
                    <?php }else { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true"><i class="fa fa-file-alt me-2"></i>Data Laporan</a>
                            <div class="dropdown-menu bg-transparent border-0 show" data-bs-popper="none">
                                <a href="laporanmasuk.php" class="dropdown-item <?php if ($hal=="lapmasuk"){echo "active";}?>">Data Barang Masuk</a>
                                <a href="laporankeluar.php" class="dropdown-item <?php if ($hal=="lapkeluar"){echo "active";}?>">Data Barang keluar</a>
                            </div>
                        </div>
                        <a href="admin.php" class="nav-item nav-link <?php if ($hal=="admin"){echo "active";}?>"><i class="fas fa-dolly-flatbed me-2"></i>Data User</a>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->