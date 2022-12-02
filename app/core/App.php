<?php 

class App {
    // controller
    private $controller = "Home";
    private $method = "index";
    private $params = [];

    function __construct()// priority
    {
        session_start();
        
        $this->pretty($this->url(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    }

    function pretty($url)// priority
    {
        if ( $url[1] !== "" ){
            $this->controller = ucfirst($url[1]);
            unset($url[1]);
        }
        
        if( !file_exists( $_SERVER['DOCUMENT_ROOT'] .  "/app/controller/" . $this->controller . ".php") ){
            App::redirect("/");
            return false;
        }

        include  $_SERVER['DOCUMENT_ROOT'] . "/app/controller/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        if ( isset($url[2]) ){
            $url[2] = str_replace("-", "", $url[2]);
            if( method_exists($this->controller, $url[2]) ){
                $this->method = $url[2];
                unset($url[2]);
            }
        }
        
        
        if( !empty($url) ){
            $this->params = array_values($url);
        }

        unset($url);
        
        call_user_func_array([$this->controller, $this->method], [$this->params]);
    
        
    }

    function url()// priority
    {
        // pisahkan "/"
        $url = $_SERVER['REQUEST_URI'];
        $url = explode("/", $url);
        
        // unset index 0
        unset($url[0]);
        return $url;
    }
    
    // Helper
    public static function date ()// priority
    {
        date_default_timezone_set("Asia/Jakarta");
        return date('Y-m-d H:i:s');
    }

    public static function redirect($uri, $message = "")// priority
    {
        header("Location: " . $uri);
    }

    static function encrypt($str){
        $url = $str;
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "zawnime";
        $encryption = openssl_encrypt($url, $ciphering,$encryption_key, $options, $encryption_iv);
        return $encryption;
    }
}