<?php 
require 'function.php';
if(isset($_POST['login']))
{
    $user =$_POST['user'];
    $password =md5($_POST['password']);
    $query ="SELECT * FROM login  where user='$user' and password = '$password'";        //mencari siswa bedasarkan nis
    $hasil = mysqli_query($conn,$query);
    $login = mysqli_fetch_array($hasil);
    if ($login == NULL){
        echo"
            <script> 
            alert('Username tidak di temukan');
            window.location.replace('login.php');
            </script>";
    }else if ($password <> $login['password']){
        echo"
            <script>
            alert('Password Salah');
            window.location.replace('login.php');
            </script>";
    }else{
        $_SESSION['log']= 'True';
        session_start();
        $_SESSION['iduser']=$Login['iduser'];
        $_SESSION['user']=$login['user'];
        $_SESSION['password']=$login['password'];
        $_SESSION['level'] = $login['level'];
        header("Location: index.php");
    }
}
 if(!isset($_SESSION['log'])){

    }else { 
        header('location:index.php');
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- css -->
        <?php
        require_once('layour/_css.php');
        ?>
    </head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3  ">
                        <div class="d-flex align-items-text-center justify-content-between mb-3 ">
                            <a href=" class="">
                                <h3 class="text-primary text-center"><i class="fas fa-poll-h"></i> Inventori Barang Elektronik</h3>
                                
                            </a>
                        </div>
                        <form class="mb-3" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="user" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Username</label>
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
    require_once('layour/_js.php');
    ?>
</body>

</html>