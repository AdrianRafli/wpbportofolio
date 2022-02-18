<?php 
require_once __DIR__ . "/../koneksi.php";

// Update Hero
if (isset($_POST["submit"])) {
    $ttahun = $_POST["tahun"];
    $ttingkat = $_POST["tingkat"];
    $tdeskripsi = $_POST["deskripsi"];

    $result = mysqli_query($koneksi, "INSERT INTO tbl_identitas (tahun,tingkat,deskripsi) VALUES ('$ttahun','$ttingkat','$tdeskripsi')");

    if ($result == true) {
        header("Location: index.php?id_identitas=1");
    } else {
        echo "<script>alert('Update gagal')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pendidikan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../styles/styles.css">

    <!-- Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <section class="edu-edit">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 form-update shadow">
                    <h2 class="text-center mb-5">Education Section</h2>
                    <form action="" method="POST">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Adrian" required>
                            <label for="tahun">Tahun</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="title" required>
                            <label for="tingkat">Tingkat</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <textarea class="form-control" placeholder="Description" id="deskripsi" name="deskripsi" required></textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                        <div class="col mb-4">
                            <button type="submit" class="btn btn-success" name="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>