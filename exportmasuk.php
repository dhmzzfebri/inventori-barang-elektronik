<?php
require 'function.php';
require 'cek.php';
?>

<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <center>
            <h2>Data Barang Masuk</h2>
            <h4>Inventori Elektronik</h4>
        </center>
        <form method="post">
            <label for="start_date">Tanggal Mulai:</label>
            <input type="date" id="start_date" class="form" name="start_date" value="<?php if (isset($_POST['start_date'])) {echo $_POST['start_date'];} ?>">
            <label for="end_date">Tanggal Selesai:</label>
            <input type="date" id="end_date" class="form" name="end_date" value="<?php if (isset($_POST['end_date'])) {echo $_POST['end_date'];} ?>">
            <input type="submit" name="filter" value="Filter">
        </form>
        <div class="data-tables datatable-dark">

            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>