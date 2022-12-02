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
                    
                    <!-- loop here -->
                    <?php for( $i = 0; $i < Views::$dataSend['page']; $i++ ) : ?>
                        <li class="page-item <?= ( Views::$dataSend['cPage'] == $i + 1 ) ? "active" : "" ?>"><a class="page-link" href="/anime/page/<?= $i + 1; ?>"><?= $i + 1 ?></a></li>
                    <?php endfor;?>
                    
                </ul>
            </nav>
        </div>
    </div>
</div>