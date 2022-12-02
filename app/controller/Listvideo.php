<?php 


class Listvideo extends Views{

    function __construct(){
        Views::setContentBody([
            "contents/animelist"
        ]);
    }

    function index () {
        $video = AnimeLogic::getAnime();
        $anime = [];
        $movie = [];
        $alpha = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",];
        for ( $i = 0; $i < count($alpha); $i ++ ) {
            foreach ( $video as $row ) {
                if ( strtolower(substr($row['video']['title'], 0,1 )) == $alpha[$i] ) {
                    if ( $row['video']['type_video'] == "anime") {
                        $anime[] = $row;
                    }else if ( $row['video']['type_video'] == "movie" ) {
                        $movie[] = $row;
                    }
                }
            }
        }
        Views::sendData([
            "anime" => $anime,
            "movie" => $movie
        ]);
    }

}