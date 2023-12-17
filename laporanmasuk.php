<?php
$hal = "lapmasuk";
require 'function.php';
require 'cek.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Barang Masuk</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
    require_once('layour/_css.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet">
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
                            <h5 class="mb-4">Laporan Barang Masuk</h5>
                            <form method="post">
                                <label for="start_date">Tanggal Mulai:</label>
                                <input type="date" id="start_date" class="form" name="start_date" value="<?php if (isset($_POST['start_date'])) {
                                                                                                                echo $_POST['start_date'];
                                                                                                            } ?>">

                                <label for="end_date">Tanggal Selesai:</label>
                                <input type="date" id="end_date" class="form
                                    " name="end_date" value="<?php if (isset($_POST['end_date'])) {
                                                                    echo $_POST['end_date'];
                                                                } ?>">

                                <input type="submit" name="filter" value="Filter">
                            </form>

                            <div class="table-responsive">
                                <table table class="table table-bordered" id="mauexportmasuk" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['filter'])) {
                                            $tgl1 = $_POST['start_date'];
                                            $tgl2 = $_POST['end_date'];
                    
                                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM masuk m, stock s WHERE s.idbarang = m.idbarang AND m.tanggal BETWEEN '$tgl1' AND '$tgl2'");
                                        } else {
                                            // Jika filter tidak diterapkan, ambil semua data
                                            $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM masuk m, stock s WHERE s.idbarang = m.idbarang");
                                        }
                    
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idb = $data['idbarang'];
                                            $idm = $data['idmasuk'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $keterangan = $data['keterangan'];
                                        ?>
                                            <tr>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $keterangan; ?></td>
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
    <script>
        function filterData() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            $.ajax({
                type: "POST",
                url: "filter_data.php", // Create a new PHP file to handle the filtering logic
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                }
            });
        }
    </script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#mauexportmasuk').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>