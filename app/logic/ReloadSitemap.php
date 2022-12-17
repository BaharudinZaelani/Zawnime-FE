<?php 
class ReloadSitemap {
    public static function reload( $anime = [] )
    {
        $top = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">!data</urlset>';
        $string = "<url><loc>!link</loc><lastmod>!time</lastmod><priority>1.00</priority></url>";
        $res = "";
        foreach ( $anime as $row ) {
            $replace = str_replace("!link", $row['title'], $string);
            $replace = str_replace("!time", $row['date'], $replace);
            $res .= $replace;
        }
        
        $result = str_replace("!data", $res, $top);

        file_put_contents( "./sitemap.xml", $result);
        return $result;

    }
}