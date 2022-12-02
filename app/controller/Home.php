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
        for( $i = 0; $i < 6; $i++ ) {
            if ( !isset($anime[$i]) ) {
                break;
            }
            $resAnime[] = $anime[$i];
        }

        $resMovie = [];
        for( $i = 0; $i < 6; $i++ ) {
            if ( !isset($movie[$i]) ) {
                break;
            }
            $resMovie[] = $movie[$i];
        }

        Views::sendData([
            "anime" => $resAnime,
            "movie" => $resMovie,
            "all" => $videos
        ]);

    }

}