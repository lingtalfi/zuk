<?php


namespace Core\Application;


use Core\Application\Exception\ControllerNotFoundException;
use Bat\FileSystemTool;
use Core\Controller\WebControllerInterface;
use Module\WebApplicationHooks\WebApplicationHooksService;
use Core\Request\HttpRequestInterface;
use Core\Router\Web\WebRouterInterface;

class WebApplication extends Application
{


    public function start(HttpRequestInterface $request)
    {

        try {
            /**
             * @var $routers WebRouterInterface[]
             */
            $routers = [];
            WebApplicationHooksService::feedRouters($routers);
            foreach ($routers as $router) {
                if (is_string($controller = $router->getController($request))) {
                    Application::set('CONTROLLER', $controller);
                    $this->executeController($controller, $request);
                    return;
                }
            }
            throw new ControllerNotFoundException();

        } catch (\Exception $e) {
            WebApplicationHooksService::onExceptionCaughtAfter($e);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function executeController($controller, $request)
    {
        if ('.php' === substr($controller, -4)) {
            $pageDir = APP_ROOT . '/pages';
            $pageFile = $pageDir . '/' . $controller;
            if (true === FileSystemTool::existsUnder($pageFile, $pageDir)) {
                // or maybe should use a generic StaticPageController?
                require $pageFile;
            }
        }
        else{
            /**
             * @var $controller WebControllerInterface
             */
            $controller = new $controller();
            $controller->handleRequest($request);
        }
    }

}