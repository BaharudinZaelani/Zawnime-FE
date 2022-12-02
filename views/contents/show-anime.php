

<style>
    .sinopsis {
        border: none;
        background-color: transparent !important;
        padding: 0;
        outline: none !important;
        box-shadow: none !important;
    }
    .sinopsis:focus {
        outline: none !important;
        border-color: transparent !important;
    }
    .dlSc .btn {
        white-space: nowrap;
    }
    .table {
        white-space: nowrap;
    }
    .key{
        height: 50px;
    }
    .key a {
        color: #000;
    }
    .image img {
        width: 100%;
    }
    #M588820ScriptRootC1340300{
      width: 100%;
    }
</style>
<?php 

$title = md5(Views::$dataSend['anime']['video'][0]['title']);

if ( !empty(Views::$dataSend['server']) ) {
    // extension check
    $episodeExplode = explode(".", Views::$dataSend['server']['link']);
    $resExplo = end($episodeExplode);

    // web check
    $episodeExplode = explode("/", Views::$dataSend['server']['link']);
    $webCheck = $episodeExplode;
    
    // $episode = md5(Views::$dataSend['server']['title']);
    // $vplayer = "?a=$title&e=$episode";


    if ( $resExplo == "mp4") {
        $link = Z_PLAYER . App::encrypt(Views::$dataSend['server']['link']);
    }
    else if ( $webCheck[2] == "www.blogger.com" ) {
        $link = Views::$dataSend['server']['link'];
    }
    else {
        $link = Views::$dataSend['server']['link'];
        $id = explode("id=", $link);
        $id = $id[1];
        $link = App::encrypt($id);
        $link = "http://zstreamplayer.rf.gd/?id=" . $link;
    }
    
    new AddTrafic("streaming_".AnimeLogic::removeSpace(Views::$dataSend['anime']['video'][0]['title']). ": " . Views::$dataSend['server']['title']);
}

?>
<div class="container mt-3">
    <div class="row">
      
      
      
      
        <div class="mb-3 col-md-12">
            <div class="card scroll p-1">
                <!-- Composite Start --> 
                <div id="M588820ScriptRootC1341238"> 
                </div> 
                <script src="https://jsc.adskeeper.com/z/a/zawnime.rf.gd.1341238.js" async> 
                </script> 
                <!-- Composite End --> 
                
                
            </div>
        </div>
        
      
      
        <!-- streaming -->
        <?php 
        if ( isset($_POST['clearSession']) ) {
            unset($_SESSION['download']);
        }
        ?>
        <?php if ( isset($_SESSION['download']['error']) ) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['download']['error'] ?>
                    <form method="post">
                        <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close" name="clearSession"></button>
                    </form>
                </div>
            </div>
        <?php endif;?>

        <div class="col-md-12 mb-3 shadow">
                 
            <div class="ratio ratio-16x9">
                <?php if ( !empty(Views::$dataSend['server']) ) { ?>
                    <iframe src="<?= $link; ?>" title="Anime Video" allowfullscreen></iframe>
                <?php }else{ ?>
                    <img class="img-fluid img-thumbnail" alt="<?= APP_NAME . " - " . Views::$dataSend['anime']['video'][0]['title'] ?>" src="<?= Views::$dataSend['anime']['video'][0]['cover']; ?>" class="img-fluid">
                <?php } ?>
            </div>


            <div class="d-flex mb-3 mt-2" style="justify-content: space-between;">
                <?php 
                    
                $episodeCount = count(Views::$dataSend['anime']['server']) - 1;
                // var_dump(Views::$dataSend['anime']['server']);
                foreach ( Views::$dataSend['anime']['server'] as $row ) {
                    $epE = explode(" ", $row['title']);
                    $resEp = intval(end($epE));
                    // check if is string or ova episode
                    if ( $resEp == 0 ) {
                        $episodeCount -= 1;
                    }
                }
                
                if( Views::$dataSend['anime']['video'][0]['type_video'] == "anime" ) : ?>
                    <?php if ( Views::$dataSend['current_key'] >= 1 ) : ?>
                        <div>
                            <?php if ( Views::$dataSend['current_key'] > 1 ) : ?>
                                <!-- prev -->
                                <a href="/show/<?= AnimeLogic::removeSpace(Views::$dataSend['anime']['video'][0]['title']) . "/" . (Views::$dataSend['current_key'] - 1); ?>" class="btn btn-secondary btn-sm mx-5"><< Prev</a>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <?php if ( Views::$dataSend['current_key'] <= $episodeCount ) : ?>
                                <!-- next -->
                                <a href="/show/<?= AnimeLogic::removeSpace(Views::$dataSend['anime']['video'][0]['title']) . "/" . (Views::$dataSend['current_key'] + 1); ?>" class="btn btn-secondary btn-sm mx-5">Next >></a>
                            <?php endif;?>
                        </div>

                    <?php endif;?>
                <?php endif; ?>
            </div>

            

            <!-- episode list -->
            <div class="mb-1">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Choose Episode / Server </h6>
                    </div>
                    <div class="card-body scroll" style="max-height: 30vh">
                        <!-- loop episode -->
                        <?php foreach ( Views::$dataSend['anime']['server'] as $key => $row ) : ?>
                            <?php 
                                $ep = explode(" ", Views::$dataSend['anime']['server'][$key]['title']);
                                $resEp = end($ep);
                            ?>
                            <a class="m-1 btn btn-sm btn-outline-primary <?= (Views::$dataSend['current_key'] == $resEp) ? "active" : ""?>" href="/show/<?= AnimeLogic::removeSpace(Views::$dataSend['anime']['video'][0]['title']) . "/$resEp"; ?>" class="list-group-item list-group-item-action"><?= $row['title'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- download list -->
            <div class="download-list mb-1">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Download Video </h6>
                    </div>
                    <div class="card-body d-flex scroll dlSc">
                        <?php if( !empty(Views::$dataSend['server']['download']) ) : ?>
                            <?php foreach ( Views::$dataSend['server']['download'] as $key => $row ) : ?>
                                <?php 
                                    if ( isset($_POST['download' . $row['title']]) ) {
                                        $dl = "https://androzaw.blogspot.com/p/jomblo-itu-nggak-mau-apa-apa-cuma-mau.html?url=" . $row['link'];
                                        echo "<script>window.location.replace('$dl')</script>";
                                    }    
                                ?>
                                <form method="post">
                                    <button style="height: 30px;" name="download<?= $row['title']?>" class="btn mx-1 btn-sm btn-success mb-1" data-bs-toggle="modal" data-bs-target="#download">Google Drive : <?= $key; ?></button>
                                </form>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>
        

        <div class="col-md-3 image">
            <img alt="<?= APP_NAME . " - " . Views::$dataSend['anime']['video'][0]['title'] ?>" src="<?= Views::$dataSend['anime']['video'][0]['image'] ?>" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= Views::$dataSend['anime']['video'][0]['title'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="scroll">

                        <table class="table">
                            <tr>
                                <th>Genre</th>
                                <td><?= Views::$dataSend['anime']['video'][0]['genre'] ?></td>
                            </tr>
                            <tr>
                                <th>Upload By</th>
                                <td><?= Views::$dataSend['anime']['video'][0]['uploaded_by'] ?></td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>
                    <div class="p-2">

                        <div><b>Sinopsis</b></div>
                        <div><textarea class="form-control sinopsis" readonly style="height: 280px;"><?= Views::$dataSend['anime']['video'][0]['sinopsis'] ?></textarea></div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card shadow-sm">
                <div class="key scroll card-body"> 
                    <strong>Kata Kunci: </strong> 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="nonton <?= Views::$dataSend['anime']['video'][0]['title'] ?>">nonton <?= Views::$dataSend['anime']['video'][0]['title'] ?></a>, 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="<?= Views::$dataSend['anime']['video'][0]['title'] ?> subtitle indonesia"><?= Views::$dataSend['anime']['video'][0]['title'] ?> subtitle indonesia</a>, 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="<?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo"><?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo</a>, 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="download <?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo">download <?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo</a>, 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="streaming <?= Views::$dataSend['anime']['video'][0]['title'] ?>">streaming <?= Views::$dataSend['anime']['video'][0]['title'] ?></a>, 
                    <a href="<?= URI . substr($_SERVER['REQUEST_URI'], 1) ?>" title="nonton <?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo">nonton <?= Views::$dataSend['anime']['video'][0]['title'] ?> sub indo</a>.
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="download" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="downloadLabel" aria-hidden="true">
  <div class="modal-dialog show">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="downloadLabel">Link download sedang diproses :)</h5>
      </div>
      <div class="modal-body">
        <div class="card-body text-center">
            <h4>
                Please Wait ...
            </h4>
            <div class="spinner-grow" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="text-center">
            <!-- <img src="https://64.media.tumblr.com/05fbbb653203b79686370459f8dabcd3/tumblr_p016xnrisk1tydz8to1_540.gifv" class="img-fluid"> -->
        </div>
      </div>
    </div>
  </div>
</div>
