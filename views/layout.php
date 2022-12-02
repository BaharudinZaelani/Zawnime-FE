<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= Views::assets("img/icon.png"); ?>">

    <!-- style -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= Views::assets("css/style.css"); ?>">
    <link href='<?= URI ?>' hreflang='x-default' rel='alternate'/>

    <!-- meta tag -->
    <meta content='<?= URI . substr($_SERVER['REQUEST_URI'], 1); ?>' property='og:url'/>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <meta content='Indonesia' name='geo.placename'/>
    <meta content='id' name='geo.country'/>
    <meta content='en_US' property='og:locale'/>
    <meta content='en_GB' property='og:locale:alternate'/>
    <meta content='id_ID' property='og:locale:alternate'/>
    <meta content='all' name='robots'/>
    <meta content='index, follow' name='robots'/>
    <meta content='<?= APP_NAME ?>' name='Author'/>
    <!-- <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content"> -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <!-- video page -->
    <?php if ( !empty(substr($_SERVER['REQUEST_URI'], 1)) ) { ?>
    <meta content='https://i.ibb.co/9vMpknd/androzaw.jpg' property='og:image'/>
    <meta content='Tempat lengkap nonton streaming & download anime subtitle indonesia update cepat dan lengkap tanpa iklan pop-up yang mengganggu.' name='description'/>
    <meta content='Tempat lengkap nonton streaming & download anime subtitle indonesia update cepat dan lengkap tanpa iklan pop-up yang mengganggu.' name='og:description'/>
    <?php if ( !isset(Views::$dataSend['anime']['video'][0]['title']) ) { ?>
    <title><?= APP_NAME ?> - Nonton Streaming & Download Anime Subtitle Indonesia</title>        
    <?php }else { ?>
    <meta content='<?= "Streaming anime " . Views::$dataSend['anime']['video'][0]['title'] . " Sub Indo"?>' property='og:type'/>
    <title><?= APP_NAME . " - " . Views::$dataSend['anime']['video'][0]['title'] ?></title>
    <meta content='<?= Views::$dataSend['anime']['video'][0]['image']; ?>' property='og:image'/>
    <?php }?>
    <meta content='pageName' property='og:title'/>
    <meta content='<?= URI . substr($_SERVER['REQUEST_URI'], 1); ?>' property='og:url'/>
    <!-- home page -->
    <?php }else{ ?>
    <title><?= APP_NAME ?> - Nonton Streaming & Download Anime Subtitle Indonesia</title>        
    <meta content='pageName' property='og:title'/>
    <meta content='<?= URI . substr($_SERVER['REQUEST_URI'], 1); ?>' property='og:url'/>
    <meta content='<?= Views::$dataSend['anime'][3]['video']['image']; ?>' property='og:image'/>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <style>
        .navbar-nav li {
            transition: 0.5s !important;
            margin-left: 12px;
        }
        .navbar-nav li:hover {
            background-color: #5C527F !important;
        }
    </style>

</head>
<?php 
?>
<body>

    <div class="wrp">
        <!-- navbar -->
        <nav class="navbar bg-dark shadow-md navbar-expand-lg ">
            <div class="container">
                <a href="/" class="navbar-brand text-light">ZStream App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- search form -->
                    <form class="d-flex mx-auto" role="search">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button> -->
                    </form>

                    <!-- list -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/anime">Anime</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/listvideo">List All video</a>
                        </li>
                        <li class="nav-item">
                                
                            <a class="nav-link text-light" href="/movie">Movie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light bg-danger" href="#">Lapor Error</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        
        
        <!--
        <div class="mt-3">
            <div class="container">
                <div class="alert alert-warning">
                    <strong>Hallo !</strong> Untuk beberapa video(anime), episode yang ditampilkan akan tidak sesuai, mohon maaf atas tidak nyamanannya, ini akan segera diperbaiki dalam waktu dekat X_X
                </div>
            </div>
        </div>
        -->

        <div class="mt-3">

            <!-- tidak mengerti ? jangan ubah ini ! -->
            
            <?php 
                if( isset(AnimeLogic::getAnime()["error"] ) ) {
                    Views::setContentBody(["contents/error"]);
                }
            ?>
            <?php foreach( Views::getContentBody() as $row ) : ?>
                <?php include $row;?>
            <?php endforeach; ?>

            <!-- pemberitahuan -->
            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <p>Karena server kami selalu pindah-pindah, kalian bisa kunjungi halaman facebook <a
                                href="https://www.facebook.com/Zawnime-101332101577328/" target="_blank">ZawNime</a>, agar kami
                            bisa memberitahun nama domain yang sedang aktif :). website yang asli selalu dimunculkan di halaman
                            facebook kami ya ^^</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
    <!-- footer -->
    <div class="container-fluid bg-dark mt-3">
        <div class="container">
            <div class="row text-light">
                <div class="col-md mt-4 p-3">
                    <div class="title">
                        <h6>About ZStream App</h6>
                    </div>
                    <small>ZStream App Adalah situs streaming/download anime bersubtitle indonesia, semua proses pembuatan
                        website upload anime di lakukan oleh dua orang. Jadi harap mengerti jika anime tidak komplit :).
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="<?= Views::assets("js/app.js"); ?>"></script>
</body>
</html>