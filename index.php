<?php
    require_once 'app/configs/routes.php';
    require_once 'app/configs/db.php';
    require_once 'app/core/BaseController.php';
    require_once 'app/core/Route.php';
    require_once 'app/App.php';
    require_once 'app/models/dao/BaseDAO.php';
    session_start();

    // Xử lý http root
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $web_root = 'https://'.$_SERVER['HTTP_HOST'];
    }else{
        $web_root = 'http://'.$_SERVER['HTTP_HOST']; 
    }
    if ($_ENV['enviroment'] == 'docker') {
        $web_root .= str_replace('\\', '/', substr(__DIR__, strpos(__DIR__, '/var/www/html') + strlen('/var/www/html')));
    }else {
        $web_root .= str_replace('\\', '/', substr(__DIR__, strpos(__DIR__, 'htdocs') + strlen('htdocs')));
    }
    define('ROOT', $web_root);
    $app = new App();
?>