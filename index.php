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
    <!-- css -->
    <?php
        require_once('_css.php');
        ?>
    </head>
     <style>
        td {
            width: 100px;
            height: 100px;
            padding: 0px;
        }

        img {
            max-width: 100%;
            max-height: 200%;
            object-fit: contain;
        }
    </style>
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
                            <h4 class="mb-4">Stok Barang</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Barang
                            </button>
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
                                            <td><?= $i++; ?></td>
                                            <td><?= $img; ?></td>
                                            <td><?= $namabarang; ?></td>
                                            <td><?= $deskripsi; ?></td>
                                            <td><?= $stock; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning rounded-pill m-2"><i class="far fa-edit" data-bs-toggle="modal" data-bs-target="#edit<?= $idb; ?>"></i></button>
                                                <button type="button" class="btn btn-danger rounded-pill m-2"><i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?= $idb; ?>"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $idb; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>


                                                <!-- Modal Body -->
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                    <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="text" name="deskripsi" value="<?= $deskripsi; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="file" name="file" class="form-control">
                                                    <br>
                                                    <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                                    </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $idb; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Barang?</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>


                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <?= $namabarang; ?>?
                                                    <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                                
                                            </div>
                                        <?php
                                          };
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Barang</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>


                                    <!-- Modal Body -->
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                                        <br>
                                        <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                                        <br>
                                        <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                                        <br>
                                        <input type="file" name="file" class="form-control">
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                                        </div>
                                    </form>

                                    </div>
                                </div>
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
    <?php
    require_once('_js.php');
    ?>
</body>

</html>