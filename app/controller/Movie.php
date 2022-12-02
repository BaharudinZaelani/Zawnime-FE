<?php 


class Movie extends Views {

    private $anime = [];

    function __construct()
    {
        $videos = AnimeLogic::getAnime();
        foreach( $videos as $row ) {
            if( $row['video']['type_video'] == "movie" ) {
                $this->anime[] = $row;
            }
        }

        Views::setContentBody(["contents/show-movie"]);
    }

    function index ($val = []) {
        // var_dump($val);
        $page = 1;
        if ( isset($val[0]) AND $val[0] == "page" ) {
            if ( isset($val[1]) ) {
                $page = $val[1];
            }
        }

        $anime = AnimeLogic::pageShow($this->anime, 6, $page);
        if ( $anime['pageCount'] < $page ) {
            App::redirect("/movie");
        }

        Views::sendData([
            "video" => $anime['video'],
            "page" => $anime['pageCount'],
            "cPage" => $page
        ]);
    }
}