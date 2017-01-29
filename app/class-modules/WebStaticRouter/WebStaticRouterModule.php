<?php


namespace Module\WebStaticRouter;



use Core\Router\Web\WebStaticRouter;

class WebStaticRouterModule
{

    public static function feedRouters(array &$routers)
    {
        $routers[] = new WebStaticRouter();
    }


}