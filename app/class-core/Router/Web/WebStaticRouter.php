<?php


namespace Core\Router\Web;



use Core\Request\HttpRequest;
use Module\WebStaticRouter\WebStaticRouterService;

class WebStaticRouter implements WebRouterInterface
{


    public function getController(HttpRequest $request)
    {
        $uri = $request->getUri();


        $uri2Controller = [];
        WebStaticRouterService::feedUri2Controller($uri2Controller);

        if (array_key_exists($uri, $uri2Controller)) {
            return $uri2Controller[$uri];
        }
        return false;
    }


}