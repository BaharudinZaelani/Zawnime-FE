<?php 


class Show extends Views {

    function __construct()
    {
        
        Views::setContentBody(["contents/show-anime"]);
      
    }

    function index($val = []) {

        if ( isset($val[0]) ) {
            $anime = AnimeLogic::getOne(AnimeLogic::removeSpace($val[0], true));
            if ( empty($anime['video']) ) {
                App::redirect("/");
            }

            if ( isset($val[1]) ) {
                $dataEpisode = [];
                foreach( $anime['server'] as $row ) {
                    $ep = explode(" ", $row['title']);
                    $resEp = end($ep);
                    if ( $resEp == $val[1] ) {
                        $dataEpisode = $row;
                        break;
                    }
                }

                Views::sendData([
                    "anime" => $anime,
                    "server" => $dataEpisode,
                    "current_key" => $val[1],
                ]);
                
                

                // download file
                if ( isset($val[2]) AND $val[2] == "download" ) {
                    if ( isset($_POST['download']) ) {
                        $dEp = $_POST['episode'];
                        $link = "";
                        foreach ( $anime['server'] as $row ) {
                            if ( $row['title'] == $dEp ) {
                                $link = $row['link'];
                                break;
                            }
                        }
                        $linkEx = explode("?id=", $link)[1];

                        // google drive
                        $gdrive = "https://drive.google.com/file/d/$linkEx/view";
                        $bypass = "https://upnbox.xyz/login.php?download=http://download.gdriveplayer.us/download.php?link=";
                        $bypassUrl = $bypass . $gdrive;

                        // apis
                        $url = "https://www.googleapis.com/drive/v3/files/";
                        $fileName = $linkEx;
                        $apiKey = "AIzaSyD739-eb6NzS_KbVJq1K8ZAxnrMfkIqPyw";
                        $parameters = "";
                        $requestUrl = $url . $parameters . $fileName . "?alt=media&key=" . $apiKey;

                        // get
                        $ch = curl_init( $requestUrl );
                        # Setup request to send json via POST.
                        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                        # Return response instead of printing.
                        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                        # Send request.
                        $result = curl_exec($ch);
                        curl_close($ch);
                        $ress = json_decode($result, true);

                        if ( !isset($ress) ) {
                            header("Location: " . $requestUrl);
                        }else {
                            $error = $ress['error']['errors'][0]['message'];
                            $_SESSION['download']['error'] = $error;
                        }
                        
                        $red = $_SERVER['PHP_SELF'];
                        $red = explode("/", $red);
                        App::redirect("/".$red[2]. "/" . $red[3] . "/" . $red[4]);
                    }else {
                        App::redirect("/");
                    }
                }

                // cookie remove
                if ( isset($_COOKIE['yourcookie']) ) {
                    unset($_COOKIE['yourcookie']); 
                    setcookie('yourcookie', null, -1, '/');
                }
                
                // set cookie
                $dataCookie = json_encode([
                    "anime" => $anime['video'][0]['title'] . " - " . $dataEpisode['title'],
                    "link" => "/show/" . $anime['video'][0]['title'] . "/" . explode(" ", $dataEpisode['title'])[1]
                ]);
                setcookie('yourcookie', $dataCookie, time() + (10 * 365 * 24 * 60 * 60), "/");

                return;
            }
            Views::sendData([
                "anime" => $anime,
                "server" => [],
                "current_key" => -1,
            ]);

        }
    }

}
