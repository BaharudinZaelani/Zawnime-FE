<?php 
// <url>
//     <loc>https://androzaw.blogspot.com/2022/11/draw-cartoons-2-create-your-own.html</loc>
//     <lastmod>2022-12-07T07:22:11Z</lastmod>
// </url>

class ReloadSitemap {
    public static function reload( $anime = [] )
    {
        $top = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">!data</urlset>';
        $string = "<url> <loc>!link</loc> <lastmod>". date('Y-m-d h:i:s') ."</lastmod> </url>";
        $res = "";
        foreach ( $anime as $row ) {
            $replace = str_replace("!link", $row, $string);
            $res .= $replace;
        }
        
        $result = str_replace("!data", $res, $top);

        $file = file_put_contents( "./sitemap.xml", $result);

    }
}