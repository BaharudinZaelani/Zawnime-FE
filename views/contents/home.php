
<style>
.genre {
    /* white-space: nowrap; */
    overflow: auto !important;
    /* width: 226px; */
}
.image{
    text-align: center;
}
.image img {
    width: 100%;
}
.d-flex .px-2 {
    width: 100% !important;
}
.image img.imageC {
    display: none;
}
@media screen and ( max-width: 650px ) {
    .genre {
        /* white-space: nowrap; */
        overflow: auto !important;
        width: auto;
    }
    .image {
        text-align: center;
        margin-bottom: 1px;
    }
    .image img.imageL {
        display: none;
    }
    .image img.imageC {
        display: block;
    }
    .d-flex {
        display: block !important;
    }
    svg {
        display: none;
    }
}

.search {
    height: 90vh;
    display: grid;
    justify-content: center;
    align-items: center;
}
.search .s-body {
    width: 100%;
}
.rounded {
    border-radius: 129px !important;
    padding: 22px;
}
.res-search li {
    background-color: transparent !important;
}
.hidden {
    display: none;
}
#inner {
    height: 40vh;
}
</style>

<div>
    <!-- search -->
    <div class="container search">
        <div class="s-body text-light text-center">
            <div class="kata py-4">
                <h1>Selamat datang di <?= APP_NAME ?></h1>    
                <p>Streaming anime/movie/film barat/holywood gratis subtitle Indonesia</p>
            </div>
            <div class="searchA ">
                <input id="search" type="text" class="text-center rounded form-control" placeholder="Cari Judul disini ..">
            </div>

            <div class="res-search mt-4">
                <ul class="list-group list-group-flush scroll" id="inner">
                    <li class="loading list-group-item hidden">
                        <div class="spinner-grow text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- anime -->
    <div class="container mt-3" id="anime">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <div class="d-flex mt-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-play-fill" viewBox="0 0 16 16">
                                <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm6.258-6.437a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                            </svg>
                        </div>
                        <div class="mx-3">Anime</div>
                    </div>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- anime list -->
                    <!-- loop here -->
                    <?php foreach ( Views::$dataSend['anime'] as $row ) : ?>
                        <div class="col-md-4 mt-4">
                            <div class="d-flex shadow">
                                <div class="image px-2">
                                    <a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>">
                                        <img class="imageL" src="<?= $row['video']['image'] ?>" width="80" alt="<?= APP_NAME . " - " . $row['video']['title'] ?>">
                                        <img class="imageC img-fluid" src="<?= $row['video']['cover'] ?>" alt="<?= APP_NAME . " - " . $row['video']['title'] ?>">
                                    </a>
                                </div>
                                <div class="px-2">
                                    <!-- title -->
                                    <div class="title bg-secondary text-light p-1">
                                        <h6><a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>" class="text-light"><?= $row['video']['title'] ?></a>
                                        </h6>
                                    </div>
                                    <!-- properti -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="genre">
                                                        <?php foreach ( AnimeLogic::explodeCategory($row['video']['genre']) as $rowGenre ) : ?>
                                                            <a href="#" class="badge text-bg-primary"><?= $rowGenre?></a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>: <small><?= $row['video']['upload_at'] ?></small></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="col-md-12">
                        <hr>
                        <div class="px-2">
                            <a href="/anime" class="btn btn-primary">
                                <div class="d-flex justify-content-center">
                                    <div>Lihat Semua Anime</div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ads -->
    <div class="container mt-4">
        <div class="card">
            <div class="scroll">
                <!-- Composite Start -->
                <div id="M588820ScriptRootC1345963"></div>
                <script src="https://jsc.adskeeper.com/z/a/zawnime.rf.gd.1345963.js" async></script>
                <!-- Composite End -->
            </div>
        </div>
    </div>


    <!-- Movie -->
    <div class="container mt-4" id="movie">
        <div class="card">
            <div class="card-header">
                <div class="d-flex mt-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-play-fill" viewBox="0 0 16 16">
                            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm6.258-6.437a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                        </svg>
                    </div>
                    <div class="mx-3">Movie</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Movie list -->
                    <!-- loop here -->
                    
                    <?php foreach ( Views::$dataSend['movie'] as $row ) : ?>
                        <div class="col-md-4 mt-4">
                            <div class="d-flex shadow">
                                <div class="image px-2">
                                    <a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>">
                                        <img class="imageL" src="<?= $row['video']['image'] ?>" width="80" alt="<?= APP_NAME . " - " . $row['video']['title'] ?>">
                                        <img class="imageC img-fluid" src="<?= $row['video']['cover'] ?>" alt="<?= APP_NAME . " - " . $row['video']['title'] ?>">
                                    </a>
                                </div>
                                <div class="px-2">
                                    <!-- title -->
                                    <div class="title bg-secondary text-light p-1">
                                        <h6><a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>" class="text-light"><?= $row['video']['title'] ?></a>
                                        </h6>
                                    </div>
                                    <!-- properti -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="genre">
                                                        <?php foreach ( AnimeLogic::explodeCategory($row['video']['genre']) as $rowGenre ) : ?>
                                                            <a href="#" class="badge text-bg-primary"><?= $rowGenre?></a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>: <small><?= $row['video']['upload_at'] ?></small></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    
                    <div class="col-md-12">
                        <hr>
                        <div class="px-2">
                            <a href="/movie" class="btn btn-primary">
                                <div class="d-flex justify-content-center">
                                    <div>Lihat Semua Movie</div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$anime = Views::$dataSend['all'];
?>
<script type="text/javascript">
    const anim = <?php echo json_encode($anime); ?>;
    $(window).ready(() => {
        $("#search").on("keypress", function (e) {
            $(".loading").removeClass("hidden");
            $('.list-group-item').remove();

            let r = $(this).val().toLowerCase();
            if ( e.which == 13 ) {
                $.each(anim, (index, value) => {
                    if ( r.length > 4 ) {
                        let liveS = value.video.title.toLowerCase().indexOf(r);
                        let title = value.video.title.replace(/\s/g, "_").toLowerCase();
                        let list = '<li class="list-group-item"><a class="text-light" href="/show/'+ title +'">'+ value.video.title +'</a></li>';

                        if ( liveS >= 0 ) {
                            
                            $('#inner').append(list);
                        }
                        if ( typeof value.video !== "undefined" && value.video ) {
                            $(".loading").addClass("hidden");
                        }
                    }
                });
            }
            
        });
    });
</script>