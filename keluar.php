<?php
    $hal="keluar";
    require 'function.php';
    require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Barang Keluar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
    require_once('layour/_css.php');
    ?>
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
            <?php
             require_once('layour/navbar.php');
            ?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class=" bg-light rounded align-items-center justify-content-center mx-0">
                <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">                     
                            <h5 class="mb-4">Barang Keluar</h5>
                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Barang</button>
                            <a href="exportkeluar.php" class="btn btn-dark" target="_blank">Data Laporan</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Penerima</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from keluar k, stock s where s.idbarang = k.idbarang");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idk = $data['idkeluar'];
                                            $idb = $data['idbarang'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $penerima = $data['penerima'];

                                            //cek ada gambar atau tidak
                                            $gambar = $data['image']; //ambil gambar
                                            if ($gambar == null) {
                                            //jika tidak ada gambar
                                            $img = 'No Photo';
                                            } else {
                                            //jika ada gambar
                                            $img = '<img src="images/' . $gambar . '" class="zoomable">';
                                            }

                                        ?>
                                            <tr>
                                                <td><?= $tanggal; ?></td>                        
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $penerima; ?></td>
                                                <td>
                                                     <button type="button" class="btn btn-warning rounded-pill m-2"><i class="far fa-edit" data-bs-toggle="modal" data-bs-target="#edit<?= $idk; ?>"></i></button>
                                                    <button type="button" class="btn btn-danger rounded-pill m-2"><i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?= $idk; ?>"></i></button>
                                                </td>
                                            </tr>
                                            
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $idk; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>


                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                    <input type="text" name="penerima" value="<?= $penerima; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="number" name="qty" value="<?= $qty; ?>" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                    <input type="hidden" name="idk" value="<?= $idk; ?>">
                                                    <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
                                                    </div>
                                                </form>

                                                </div>
                                            </div>
                                            </div>


                                             <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $idk; ?>">
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
                                                    <input type="hidden" name="kty" value="<?= $qty; ?>">
                                                    <input type="hidden" name="idk" value="<?= $idk; ?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
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
                            <!-- Modal tambah barang keluar -->
                            <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Barang Keluar</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>


                                <!-- Modal Body -->
                                <form method="post">
                                    <div class="modal-body">
                                    <select name="barangnya" class="form-control">
                                        <?php
                                        $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                                        while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $namabarangnya = $fetcharray['namabarang'];
                                        $idbarangnya = $fetcharray['idbarang'];
                                        ?>


                                        <option value="<?= $idbarangnya; ?>"><?= $namabarangnya; ?></option>


                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" required><br>
                                    <input type="text" name="penerima" placeholder="Penerima" class="form-control" required><br>
                                    <button type="submit" class="btn btn-primary" name="addbarangkeluar">Submit</button>
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
            <?php
            require_once('layour/_footer.php');
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
    require_once('layour/_js.php');
    ?>
</body>

</html>