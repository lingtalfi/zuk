<?php


namespace Core\Router\Web;



use Core\Application\Application;
use Core\Request\HttpRequest;


class WebMaintenanceRouter implements WebRouterInterface
{

    public $maintenanceController;



    public function getController(HttpRequest $request)
    {

        if (true===Application::get('MAINTENANCE_MODE')) {
            return $this->maintenanceController;
        }
        return false;
    }


}