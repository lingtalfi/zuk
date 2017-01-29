<?php


namespace Module\WebApplicationHooks;


use Module\Application\ApplicationModule;
use Module\WebMaintenanceRouter\WebMaintenanceRouterModule;
use Module\WebStaticRouter\WebStaticRouterModule;

class WebApplicationHooksService
{


    public static function feedRouters(array &$routers)
    {
        WebMaintenanceRouterModule::feedRouters($routers);
        WebStaticRouterModule::feedRouters($routers);
    }


    public static function onExceptionCaughtAfter(\Exception $e)
    {
        ApplicationModule::onExceptionCaughtAfter($e);
    }

}
