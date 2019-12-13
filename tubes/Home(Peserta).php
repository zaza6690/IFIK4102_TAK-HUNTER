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

    $er1 = $conn->prepare('SELECT * FROM events ORDER BY Dates LIMIT 0, 1');
    $er1->bindParam(':id', $_SESSION['userid']);
    $er1->execute();
    $r1 = $er1->fetch(PDO::FETCH_ASSOC);
    $e1 = NULL;
    if( count($r1) > 0){
        $e1 = $r1;
    }

    $er2 = $conn->prepare('SELECT * FROM events ORDER BY Dates LIMIT 1, 1');
    $er2->bindParam(':id', $_SESSION['userid']);
    $er2->execute();
    $r2 = $er2->fetch(PDO::FETCH_ASSOC);
    $e2 = NULL;
    if( count($r2) > 0){
        $e2 = $r2;
    }

    $er3 = $conn->prepare('SELECT * FROM events ORDER BY Dates LIMIT 2, 1');
    $er3->bindParam(':id', $_SESSION['userid']);
    $er3->execute();
    $r3 = $er3->fetch(PDO::FETCH_ASSOC);
    $e3 = NULL;
    if( count($r3) > 0){
        $e3 = $r3;
    }

    $er4 = $conn->prepare('SELECT * FROM events ORDER BY Dates LIMIT 3, 1');
    $er4->bindParam(':id', $_SESSION['userid']);
    $er4->execute();
    $r4 = $er4->fetch(PDO::FETCH_ASSOC);
    $e4 = NULL;
    if( count($r4) > 0){
        $e4 = $r4;
    }

    $er5 = $conn->prepare('SELECT * FROM events ORDER BY Dates LIMIT 4, 1');
    $er5->bindParam(':id', $_SESSION['userid']);
    $er5->execute();
    $r5 = $er5->fetch(PDO::FETCH_ASSOC);
    $e5 = NULL;
    if( count($r5) > 0){
        $e5 = $r5;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IMPAL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
</head>

<body style="background-color: #66d7d7;">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="SignIn.php" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #f4476b;border-radius: 20px;margin-top: 5px;margin-bottom: 5px;color: #ffffff;">&nbsp;
                    <?php if( !empty($user) ): ?>
                        <?= $user['FullName']; ?>
                    <?php else: ?>
                        peserta
                    <?php endif; ?>
                    &nbsp;  </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="Home(Peserta).php">Peserta</a>
                            <a class="dropdown-item" role="presentation" href="Home(EO).php">Event Organizer</a></div>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="Profil.php">&nbsp;<i class="fas fa-user-alt" style="font-size: 30px;"></i></a></li>
                <li class="nav-item" role="presentation"><a href="logout.php" class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 32px;color: #000000;"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid jumbotron-main" style="background-image: url(&quot;assets/img/2.jpg&quot;);background-size: cover;background-position: center;margin-top: 100px;">
        <div class="container center-vertically-holder" style="margin-top: -20px;">
            <div class="row center-vertically">
                <div class="col-md-8 offset-sm-0 offset-md-2 text-center" style="margin-top: 100px;margin-bottom: 100px;background-color: rgba(244,71,107,0.53);">
                    <h1>Welcome to TAK<i class="fas fa-eye"></i>Hunter Website<br><br></h1>
                    <hr style="border-top:1px;color:rgba(255,255,255,0.9);width:60%;margin:0px;margin-top:-50px;margin-bottom:10px;margin-left:20%;">
                    <p style="color: #fafafa;">Selamat datang di Website TAK Hunter, disini kalian bisa menemukan banyak event menarik dengan TAK yang melimpah, sekaligus mempromosikan acara yang kalian punya.</p>
                    <p><a class="btn btn-primary" role="button" href="#" style="background-color: #f4476b;">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-light">
        <div class="container">
            <div class="row" style="margin-top: 0px;">
                <div class="col-md-8">
                    <div class="row" style="background-color: rgba(102,215,215,0);border-radius: 10px;margin-top: -30px;margin-bottom: -37px;">
                        <div class="col-md-12 col-lg-2">
                            <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="margin-top: 40px;background-color: #f4476b;">Jenis Event</button>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Jenis Event 1</a><a class="dropdown-item" role="presentation" href="#">Jenis Event 2</a><a class="dropdown-item" role="presentation" href="#">Jenis Event 3</a></div>
                            </div><a href="#"></a></div>
                        <div class="col">
                            <form class="search-form">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" style="padding-top: -4px;"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="I am looking for..">
                                    <div class="input-group-append"><button class="btn btn-light" type="button">Search </button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 5px;margin-bottom: 5px;">
                        <div class="col-md-12 col-lg-5"><img class="img-fluid" src="assets/img/6.jpg" style="margin-top: 10px;margin-bottom: 10px;"></div>
                        <div class="col text-center m-auto">
                            <h3 class="text-left name">
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['NamaEvent']; ?>
                            <?php endif; ?>   
                            </h3>
                            <h5 class="text-left name">
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['Dates']; ?>
                            <?php endif; ?>   
                            </h5>
                            <p class="text-left description">
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['Deskripsi']; ?>
                            <?php endif; ?>
                            </p>
                                <a class="btn btn-primary" role="button" style="background-color: #f4476b;" href="\tubes\Countdown(Peserta).php?id=<?= $e1['idEvent']; ?>">Daftar Event</a></div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 5px;margin-bottom: 5px;">
                        <div class="col-md-12 col-lg-5"><img class="img-fluid" src="assets/img/6.jpg" style="margin-top: 10px;margin-bottom: 10px;"></div>
                        <div class="col text-center m-auto">
                            <h3 class="text-left name">
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['NamaEvent']; ?>
                            <?php endif; ?>   
                            </h3>
                            <h5 class="text-left name">
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['Dates']; ?>
                            <?php endif; ?>   
                            </h5>
                            <p class="text-left description">
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['Deskripsi']; ?>
                            <?php endif; ?>
                            </p><a class="btn btn-primary" role="button" style="background-color: #f4476b;" href="\tubes\Countdown(Peserta).php?id=<?= $e2['idEvent']; ?>">Daftar Event</a></div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 5px;margin-bottom: 5px;">
                        <div class="col-md-12 col-lg-5"><img class="img-fluid" src="assets/img/6.jpg" style="margin-top: 10px;margin-bottom: 10px;"></div>
                        <div class="col text-center m-auto">
                            <h3 class="text-left name">
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['NamaEvent']; ?>
                            <?php endif; ?>   
                            </h3>
                            <h5 class="text-left name">
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['Dates']; ?>
                            <?php endif; ?>   
                            </h5>
                            <p class="text-left description">
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['Deskripsi']; ?>
                            <?php endif; ?>
                            </p><a class="btn btn-primary" role="button" style="background-color: #f4476b;" href="\tubes\Countdown(Peserta).php?id=<?= $e3['idEvent']; ?>">Daftar Event</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="text-center"></h1>
                     <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <h2 class="text-center">Kalender Acara</h1>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12 col-lg-5"><a href="#"></a>
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['Dates']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                        <div class="col text-center m-auto">
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['NamaEvent']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);/*border-radius: 10px;*/margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12 col-lg-5"><a href="#"></a>
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['Dates']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                        <div class="col text-center m-auto">
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['NamaEvent']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12 col-lg-5"><a href="#"></a>
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['Dates']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                        <div class="col text-center m-auto">
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['NamaEvent']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);/*border-radius: 10px;*/margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12 col-lg-5"><a href="#"></a>
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e4) ): ?>
                                <?= $e4['Dates']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                        <div class="col text-center m-auto">
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e4) ): ?>
                                <?= $e4['NamaEvent']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                    <div class="row" style="background-color: rgba(245,241,216,0.77);border-radius: 10px;margin-top: 0px;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-12 col-lg-5"><a href="#"></a>
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e5) ): ?>
                                <?= $e5['Dates']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                        <div class="col text-center m-auto">
                            <h3 class="text-center name" style="font-size: 20px;">
                            <?php if( !empty($e5) ): ?>
                                <?= $e5['NamaEvent']; ?>
                            <?php endif; ?> 
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="padding-top: 0px;padding-bottom: 24px;margin-top: 10px;">
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