<?php

session_start();

require 'koneksi.php';

if( isset($_SESSION['userid']) ){

    $records = $conn->prepare('SELECT UserId, NIM, Password, Email, FullName FROM users WHERE UserId = :id');
    $records->bindParam(':id', $_SESSION['userid']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if( count($results) > 0){
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
</head>

<body style="background-color: #66d7d7;">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="Home(Peserta).php" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #f4476b;border-radius: 20px;margin-top: 5px;margin-bottom: 5px;color: #ffffff;">&nbsp;Peserta&nbsp;</a>
                        <div class="dropdown-menu"
                            role="menu"><a class="dropdown-item" role="presentation" href="Home(Peserta).php">Peserta</a><a class="dropdown-item" role="presentation" href="Home(EO).php">Event Organizer</a></div>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="Profil.php">&nbsp;<i class="fas fa-user-alt" style="font-size: 30px;"></i></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 32px;color: #000000;"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="col-sm-12 item" data-aos="fade" style="background-color: #f4476b;margin-top: 130px;margin-right: 0px;">
        <div class="row">
            <div class="col-md-12 col-lg-6 text-center m-auto" style="padding-bottom: 20px;"><a href="#"><img class="rounded-circle img-fluid m-auto" src="assets/img/3.png" style="width: 325px;"></a></div>
            <div class="col" style="padding-bottom: 10px;">
                <h3 class="text-center name" style="color: rgb(255,255,255);"></h3>
                <h1 class="text-center" style="color: rgb(255,255,255);">Profil</h1>
                <p class="text-center description" style="color: rgb(228,228,228);">Nama<br>
                    <input type="text" value="<?= $user['FullName']; ?>" style="width: 400px;" disabled>
                <br>NIM<br>
                    <input type="text" value="<?= $user['NIM']; ?>" style="width: 400px;" disabled>
                <br>Email<br>
                    <input type="text" value="<?= $user['Email']; ?>" style="width: 400px;" disabled><br>
                <!-- <br>Created<br>
                    <input type="text" value="<?= $user['CreatedAt']; ?>" style="width: 400px;"><br> -->
                <!-- <br>Jurusan<br>
                    <input type="text" style="width: 400px;"><br> -->
                <br><button class="btn btn-primary" type="button">Simpan</button><br></p>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="padding-top: 0px;padding-bottom: 24px;margin-top: 70px;">
        <footer>
            <div class="container">
                <p class="copyright"><strong>Copyright @ 2019. All Right Reserved. TAK Hunter is a registered treademark</strong><br></p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>