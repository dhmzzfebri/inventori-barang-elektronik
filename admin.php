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
            <div class="container-fluid pt-4 px-4">
                <div class=" bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-12">
                        <div class="bd-example">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email Admin</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $dataadmin = mysqli_query($conn, "select * from login");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($dataadmin)) {
                                            $email = $data['email'];
                                            $iduser = $data['iduser'];
                                    ?>
                                    <tr>
                                    <th ><?= $i++ ?></th>
                                    <td ><?=$email ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning rounded-pill m-2"><i class="far fa-edit" data-bs-toggle="modal" data-bs-target="#edit<?= $iduser; ?>"></i></button>
                                        <button type="button" class="btn btn-danger rounded-pill m-2"><i class="fas fa-trash" data-bs-toggle="modal" data-bs-target="#delete<?= $iduser; ?>"></i></button>
                                    </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $iduser; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Admin</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>


                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="email" name="emailadmin" value="<?= $email; ?>" class="form-control" placeholder="Email" required>
                                                        <br>
                                                        <input type="password" name="passwordbaru" class="form-control" placeholder="Password">
                                                        <br>
                                                        <input type="hidden" name="id" value="<?= $iduser; ?>">
                                                        <button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $iduser; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>


                                                <!-- Modal Body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <b> <?= $email; ?> </b>
                                                        <input type="hidden" name="id" value="<?= $iduser; ?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapusadmin">Hapus</button>
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
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah Admin
                </button>
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Admin</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>


                            <!-- Modal Body -->
                            <form method="post">
                                <div class="modal-body">
                                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                                    <br>
                                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="addadmin">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </div>
</div>

    <!-- JavaScript Libraries  -->
    <?php
    require_once('_js.php');
    ?>
</body>

</html>