<?php 
require_once __DIR__ . "/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adrian Maulana Rafli | Portofolio</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="styles/styles.css">

    <!-- Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light mt-2 mx-5">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-bold me-4" href="#">Adrian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="#about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="#projects">Projects</a>
                    </li>
        <!-- Select tbl_identitas -->
        <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM tbl_identitas WHERE id_identitas='1'");
            while ($identitas = mysqli_fetch_array($query)) {
        ?>
                    </ul>
                    <a href="edit/index.php?id_identitas=<?=$identitas['id_identitas']?>" class="btn btn-dark">Edit</a>
                </div>
            </div>
        </nav>

        <!-- Hero -->
        <section class="hero mx-5" id="hero">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 hero-col">
                    <h1 class="text-center fw-bolder name mb-2">Hello, I'm <?= $identitas["nama"] ?>.</h1>
                    <h3 class="text-center title">A <?= $identitas["title"] ?></h3>
                </div>
            </div>
        </section>

        <hr class="garis-hero">
        <img src="assets/svg/dots.svg" class="dots" alt="">

        <!-- About Me -->
        <section class="about-me mx-5" id="about-me">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 mb-4 about-me-content">
                    <h2 class="text-center fw-bold title-section">About Me</h2>
                    <p><?= $identitas["tentang"] ?></p>
                </div>
            </div>
        </section>

        <?php } ?>

        <hr>

        <!-- Education Timeline -->
        <section class="edu m-5" id="education">
            <h2 class="text-center fw-bold title-section">Education</h2>
            <div class="timeline-items">
                 <!-- Select tbl_pendidikan -->
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pendidikan");
                    while ($pendidikan = mysqli_fetch_array($query)) {
                ?>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date"><?= $pendidikan["tahun"] ?></div>
                    <div class="timeline-content">
                        <h3><?= $pendidikan["tingkat"] ?></h3>
                        <p><?= $pendidikan["deskripsi"] ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <hr>

        <section class="project" id="projects">
            <h2 class="text-center fw-bold title-section">Portofolio</h2>
            <div class="row row-cols-md-2 g-4">
                <!-- Select tbl_project -->
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_project");
                    while ($project = mysqli_fetch_array($query)) {
                ?>
                <div class="col-md-6 col-sm-12">
                    <div class="card h-100 shadow">
                        <img src="assets/project/<?= $project["image"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $project["judul"] ?></h5>
                            <p class="card-text"><?= $project["deskripsi"] ?></p>
                            <div class="button-link d-flex">
                                <a href="<?= $project["website"] ?>" target="_blank">
                                    <button type="button" class="btn btn-dark me-2">Kunjungi Website</button>
                                </a>
                                <a href="<?= $project["github"] ?>" target="_blank">
                                    <button type="button" class="btn btn-dark">Github</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
            </div>    
        </section>
    </div>

    <!-- Footer -->
    <footer class="container-fluid bg-dark">
        <div class="row pt-3 align-items-center">
            <div class="col-md-6 col-sm-12">
                <p class="text-center copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script> Adrian Maulana Rafli
                </p>
            </div>
            <div class="col-md-6 col-sm-12">
                <ul class="d-flex justify-content-center footer-list">
                    <li class="list-inline-item me-4">
                        <a href="https://www.linkedin.com/in/adrianrafli/" target="_blank" class="footer-social"><i class="bi bi-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a href="https://www.instagram.com/adrianrafly_/" target="_blank" class="footer-social"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li class="list-inline-item me-4">
                        <a href="https://twitter.com/ianxven" target="_blank" class="footer-social"><i class="bi bi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/AdrianRafli" target="_blank" class="footer-social"><i class="bi bi-github"></i></a>
                    </li>
                </ul>
            </div>
        </div>        
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>