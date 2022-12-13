<style>
    .card {
        position: relative;
    }
    .floating-title {
        padding: 5px;
        position: absolute;
        top: 12px;
        width: 80%;
        opacity: 0.6;
        border-bottom-right-radius: 42px;
        border-top-right-radius: 42px;
    }
    a:hover .floating-title {
        opacity: 1 !important;
    }
    .z-row {
        display: grid;
    }
</style>
<?php 

$video = Views::$dataSend['video'];

?>
<div class="container">
    <div class="row">
        <!-- loop here -->
        <?php foreach( $video as $row) : ?>
            <div class="col-md-4 mt-2 z-row">
                <div class="card">
                    <a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>" class="text-dark">
                        <div class="image text-center">
                            <img src="<?= $row['video']['cover'] ?>" class="img-fluid">
                        </div>
                        <div class="floating-title bg-primary text-light">
                            <h5 class="card-title"><?= $row['video']['title'] ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="mx-2">
                                <?php $d = new DateTime($row['video']['upload_at']); 
                                    echo $d->format("d/M/Y"); ?>
                            </div>
                            <div class="mx-2">
                                <div class="genre">
                                    <?php foreach ( AnimeLogic::explodeCategory($row['video']['genre']) as $rowGenre ) : ?>
                                        <a href="#" class="badge text-bg-primary"><?= $rowGenre?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="card mt-3">
        
        <div class="justify-content-center d-flex mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ( Views::$dataSend['cPage'] > 1 ) : ?>
                        <li class="page-item pp">
                            <a class="page-link" href="/anime/page/<?= Views::$dataSend['cPage'] - 1; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </a>
                        </li>
                    <?php endif?>
                    <!-- loop here -->
                    <?php for( $i = 0; $i < Views::$dataSend['page']; $i++ ) : ?>
                        <li class="page-item <?= ( Views::$dataSend['cPage'] == $i + 1 ) ? "active" : "" ?>"><a class="page-link" href="/anime/page/<?= $i + 1; ?>"><?= $i + 1 ?></a></li>
                    <?php endfor;?>
                    <?php if ( Views::$dataSend['cPage'] < Views::$dataSend['page'] ) : ?>
                        <li class="page-item pp">
                            <a class="page-link" href="/anime/page/<?= Views::$dataSend['cPage'] + 1; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </li>
                    <?php endif?>

                </ul>
            </nav>
        </div>
    </div>
</div>