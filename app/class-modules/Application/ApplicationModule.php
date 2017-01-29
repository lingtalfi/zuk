<?php


namespace Module\Application;


class ApplicationModule
{

    public static function feedUri2Controller(array &$uri2Controller)
    {
        $uri2Controller['/home'] = 'home.php';
    }


    public static function onExceptionCaughtAfter(\Exception $e)
    {
        $page404 = APP_ROOT . "/pages/404.php";
        if (file_exists($page404)) {
            header("HTTP/1.0 404 Not Found");
            require $page404;
            exit;
        }
    }

}