<?php 
session_start();

require_once __DIR__ . "/../koneksi.php";

// cek login
if($_SESSION['login']!=true){
    header("location:../login.php");
}

// Get id from GET
$id_iden = $_GET['id_identitas'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_identitas WHERE id_identitas='$id_iden'");
while($data = mysqli_fetch_array($hasil))
{
    $vnama = $data["nama"];
    $vtitle = $data["title"];
    $vtentang = $data["tentang"];
}

// Update Hero
if (isset($_POST["update"])) {
    $tnama = $_POST["nama"];
    $ttitle = $_POST["title"];
    $ttentang = $_POST["tentang"];

    $result = mysqli_query($koneksi, "UPDATE tbl_identitas SET nama='$tnama', title='$ttitle', tentang='$ttentang' WHERE id_identitas='$id_iden'");

    if ($result == true) {
        $berhasil = true;
        header("Location: index.php?id_identitas=$id_iden");
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portofolio</title>

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
        <section class="hero-edit">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 mb-5 d-flex justify-content-between">
                    <h2>Selamat Datang <?= $_SESSION['username']; ?></h2>
                    <a class="btn btn-dark" href="logout.php">LOGOUT</a>
                </div>
                <div class="col-10 form-update shadow">
                    <h2 class="text-center mb-5">Hero Section</h2>
                    <?php if (isset($berhasil)) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Berhasil Diupdate
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } else if (isset($error)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data gagal Diupdate
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Adrian" value="<?=$vnama?>">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?=$vtitle?>">
                            <label for="title">Title</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <textarea class="form-control" placeholder="Description" id="tentang" name="tentang" rows="4" style="height: auto;"><?=$vtentang?></textarea>
                            <label for="tentang">About Me</label>
                        </div>
                        <div class="col mb-4">
                            <button type="submit" name="update" class="btn btn-dark">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="edu-edit">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 form-update shadow">
                    <h2 class="text-center mb-5">Education Section</h2>
                    <a href="add-education.php">
                        <button type="button" class="btn btn-success mb-5">Tambah Pendidikan</button>
                    </a>
                    <div class="row">
                        <!-- Select tbl_project -->
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_pendidikan");
                            while ($pendidikan = mysqli_fetch_array($query)) {
                        ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="card h-100 shadow">
                                <div class="card-body">
                                    <h6 class="card-title fw-light"><?= $pendidikan["tahun"] ?></h6>
                                    <h5 class="card-title fw-bold"><?= $pendidikan["tingkat"] ?></h5>
                                    <p class="card-text"><?= $pendidikan["deskripsi"] ?></p>
                                    <div class="button-link d-flex">
                                        <a href="edit-education.php?id_pendidikan=<?= $pendidikan['id_pendidikan'] ?>">
                                            <button type="button" class="btn btn-dark me-2">Edit</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </section>
        <section class="project-edit mb-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-10 form-update shadow">
                    <h2 class="text-center mb-5">Project Section</h2>
                    <a href="add-project.php">
                        <button type="button" class="btn btn-success mb-5">Tambah Project</button>
                    </a>
                    <div class="row">
                        <!-- Select tbl_project -->
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_project");
                            while ($project = mysqli_fetch_array($query)) {
                        ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="card h-100 shadow">
                                <img src="../assets/project/<?= $project["image"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?= $project["judul"] ?></h5>
                                    <p class="card-text"><?= $project["deskripsi"] ?></p>
                                    <div class="button-link d-flex">
                                        <a href="edit-project.php?id_project=<?= $project["id_project"] ?>">
                                            <button type="button" class="btn btn-dark me-2">Edit</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>