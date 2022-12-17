<?php 

class Sitemap {
    function index(){
        header('Content-type: application/xml');
        $videos = AnimeLogic::getAnime();
        
        // generate sitemap
        $rSitemap = [];
        foreach ( $videos as $row ) {
            $rSitemap[] = [
                'title' => URI . "show/" . str_replace(" ", "_", strtolower($row['video']['title'])),
                'date' => $row['video']['upload_at'] 
            ];
        }
        echo ReloadSitemap::reload($rSitemap);
    }
}