<div class="container">
    

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Anime List</h5>
        </div>
        <div class="card-body text-center">
            <?php foreach ( Views::$dataSend['anime'] as $row ) : ?>
                <a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>" class="text-dark m-1 btn btn-sm btn-outline-danger"><?= $row['video']['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>


    
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="card-title">Movie List</h5>
        </div>
        <div class="card-body text-center">
            <?php foreach ( Views::$dataSend['movie'] as $row ) : ?>
                <a href="/show/<?= AnimeLogic::removeSpace($row['video']['title']); ?>" class="text-dark m-1 btn btn-sm btn-outline-danger"><?= $row['video']['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>