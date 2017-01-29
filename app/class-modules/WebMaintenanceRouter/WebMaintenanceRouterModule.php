<?php


namespace Module\WebMaintenanceRouter;


use Core\Router\Web\WebMaintenanceRouter;

class WebMaintenanceRouterModule
{

    public static function feedRouters(array &$routers)
    {
        $o = new WebMaintenanceRouter();
        $o->maintenanceController = WebMaintenanceRouterConfig::get('maintenance_controller');
        $routers[] = $o;
    }


}