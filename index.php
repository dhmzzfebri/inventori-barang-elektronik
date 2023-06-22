<?php
    require 'function.php';
    require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="dashmin-1.0.0/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="dashmin-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="dashmin-1.0.0/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="dashmin-1.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="dashmin-1.0.0/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <?php
         require_once('layour/sidebar.php');
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
             <?php
             require_once('layour/navbar.php');
            ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class=" bg-light rounded align-items-center justify-content-center mx-0">
                <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">                     
                            <h5 class="mb-4">Stok Barang</h5>
                            <button type="button" class="btn btn-primary m-2">Tambah Barang</button>
                            <a href="export.php" class="btn btn-dark">Export Data</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                      $namabarang = $data['namabarang'];
                                      $deskripsi = $data['deskripsi'];
                                      $stock = $data['stock'];
                                      $idb = $data['idbarang'];
              
                                      //cek ada gambar atau tidak
                                      $gambar = $data['image']; //ambil gambar
                                      if ($gambar == null) {
                                        //jika tidak ada gambar
                                        $img = 'No Photo';
                                      } else {
                                        //jika ada gambar
                                        $img = '<img src="images/' . $gambar . '" class="zoomable">';
                                      } ?>
                                        <tr>
                                            <td>><?= $i++; ?></td>
                                            <td>><?= $img; ?></td>
                                            <td>><?= $namabarang; ?></td>
                                            <td>><?= $deskripsi; ?></td>
                                            <td>><?= $stock; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning rounded-pill m-2"><i class="fa fa-home" data-bs-toggle="modal" data-bs-target="#edit<?= $idb; ?>"></i></button>
                                                <button type="button" class="btn btn-danger rounded-pill m-2"><i class="fa fa-home" data-bs-toggle="modal" data-bs-target="#delete<?= $idb; ?>"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                          };
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dashmin-1.0.0/lib/chart/chart.min.js"></script>
    <script src="dashmin-1.0.0/lib/easing/easing.min.js"></script>
    <script src="dashmin-1.0.0/lib/waypoints/waypoints.min.js"></script>
    <script src="dashmin-1.0.0/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="dashmin-1.0.0/lib/tempusdominus/js/moment.min.js"></script>
    <script src="dashmin-1.0.0/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="dashmin-1.0.0/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="dashmin-1.0.0/js/main.js"></script>
</body>

</html>