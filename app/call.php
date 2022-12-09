<?php 

// Auto Load App function
// spl_autoload_register(function($class){
// 	$file = __DIR__ . '\\core\\' . $class . '.php';
// 	if (file_exists($file)) {
// 		require 'core/' . $class . '.php';
// 	}
// });

// Auto Load Logic
// spl_autoload_register(function($class){
// 	$file = __DIR__ . '\\logic\\' . $class . '.php';
// 	if (file_exists($file)) {
// 		require 'logic/' . $class . '.php';
// 	}
// });

// if hosting provider not support autoload
include PATH . "/app/core/App.php";
include PATH . "/app/core/Database.php";
include PATH . "/app/core/Middleware.php";

// logic
// include PATH . "/app/logic/Example.php";
include PATH . "/app/logic/AnimeLogic.php";
include PATH . "/app/logic/AddTrafic.php";
include PATH . "/app/logic/ReloadSitemap.php";

// Load Views (Front End)
include "Views.php";