<?php


class AnimeLogic {

    static function getAnime($key = ""){
        if ( !empty($key) ) {
            $url = API . "api/video/" . $key;
        }else {
            $url = API . "api/video";
        }

        $result = file_get_contents($url);
        $anime = json_decode($result, true);
        // var_export($response);

        if ( is_null($anime) ) {
            return [
                "error" => true
            ];
        }

        return $anime;
    }
    
    static function explodeCategory($string){
        return explode(",", $string);
    }

    static function getOne($key){
        return AnimeLogic::getAnime($key);
    }

    static function removeSpace($string, $reverse = false) {
        if ( $reverse ) {
            $str = str_replace('_', '%20', $string);
            return $str;
        }
        $str = str_replace(' ', '_', $string);
        return strtolower($str);
    }

    // pagenation
    static function pageShow($video = [], $show, $page) {

        $dataCount = count($video);
        $pageCount = ceil($dataCount / $show);
        
        $startPage = ( $show * $page ) - $show;
        
        
        $result = [];
        // var_dump();
        // var_dump($startPage );
        for( $i = $startPage; $i < $startPage + $show; $i++  ) {
            if ( !isset($video[$i]) ) {
                break;
            }
            $result[] = $video[$i];
        }
        
       
        return [
            "video" => $result,
            "pageCount" => $pageCount
        ];
    }

}