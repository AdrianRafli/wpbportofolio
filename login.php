<?php 
session_start();

require_once __DIR__ . "/koneksi.php";

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
 
     $data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
     $r = mysqli_fetch_assoc($data_akses);
     $username = $r['username'];
     $password = $r['password'];
     if( mysqli_num_rows($data_akses) === 1 ){
         $_SESSION["login"] = true;
         $_SESSION['username'] = $username;
         header('location:edit/index.php?id_identitas=1');
     }
    $error = true;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="styles/styles.css">

    <!-- Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    
    <div class="container">
        <section class="login">
            <div class="row justify-content-center align-items-center">
                <div class="col-6 login-card shadow">
                    <h1 class="text-center mb-5">LOGIN</h1>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Login Gagal, mungkin Username atau Password Salah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form action="" method="POST">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Adrian">
                            <label for="username">Username</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <!-- <div class="col mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->
                        <div class="col text-center mb-4">
                            <button type="submit" class="btn btn-dark" name="login" style="width: 100%;">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>