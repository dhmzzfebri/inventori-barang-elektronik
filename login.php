
<?php 
require 'function.php';
if(isset($_POST['login']))
{
    $email =$_POST['email'];
    $password =$_POST['password'];
    $query ="SELECT * FROM login  where email='$email' and password = '$password'";        //mencari siswa bedasarkan nis
    $hasil = mysqli_query($conn,$query);
    $login = mysqli_fetch_array($hasil);
    if ($password==$login['password']){     //menegecek apakah passwordnya yg di input sama dengan password pd database
        session_start();

        header("Location:index.php");
    }else{
        header("Location:login.php");
    }
}

// ceklogin
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    // cocokin db
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password = '$password'");
    //hitung jumlah data

    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung>0) {
       $_SESSION['log']= 'True';
       header('location:index.php');
    }else { 
        header('location:login.php');
    };
};

 if(!isset($_SESSION['log'])){

    }else { 
        header('location:index.php');
    }


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
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div> -->
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Stock Barang</h3>
                            </a>
                        </div>
                        <form class="mb-3" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address </label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                <label for="Password">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>


    <!-- JavaScript Libraries  -->
    <?php
    require_once('_js.php');
    ?>
</body>

</html>