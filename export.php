<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Stock Barang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
<div class="container">
        <h2>Stock Bahan</h2>
        <h4>(Inventory)</h4>
        <div class="data-tables datatable-dark">

            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi</th>
                        <th>Stock</th>
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

                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?php echo $namabarang; ?></td>
                            <td><?php echo $deskripsi; ?></td>
                            <td><?php echo $stock; ?></td>
                        </tr>

                    <?php
                    };

                    ?>


                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


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
     
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script> -->

    <!-- Template Javascript -->
    <script src="dashmin-1.0.0/js/main.js"></script>
</body>

</html>