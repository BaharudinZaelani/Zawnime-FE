<?php 

class Home extends Views {

    function __construct()
    {
        Views::setContentBody([
            "contents/home"
        ]);
    }

    function index(){
        $videos = AnimeLogic::getAnime();
        
        // generate sitemap
        $rSitemap = [];
        foreach ( $videos as $row ) {
            $rSitemap[] = URI . "show/" . str_replace(" ", "_", strtolower($row['video']['title']));
        }
        ReloadSitemap::reload($rSitemap);

        if ( isset($videos['error']) ) {
            Views::setContentBody([
                "contents/error"
            ]);
            return;
        }
        $anime = [];
        $movie = [];
        
        foreach( $videos as $key => $row ) {
            if( $row['video']['type_video'] == "anime" ) {
                $anime[] = $row;
            }else if ( $row['video']['type_video'] == "movie") {
                $movie[] = $row;
            }
        }

        $resAnime = [];
        for( $i = 0; $i < 3; $i++ ) {
            if ( !isset($anime[$i]) ) {
                break;
            }
            $resAnime[] = $anime[$i];
        }

        $resMovie = [];
        for( $i = 0; $i < 3; $i++ ) {
            if ( !isset($movie[$i]) ) {
                break;
            }
            $resMovie[] = $movie[$i];
        }

        Views::sendData([
            "anime" => $resAnime,
            "movie" => $resMovie,
            "all" => $videos,
            "latest" => AnimeLogic::getLatest()
        ]);

    }

}