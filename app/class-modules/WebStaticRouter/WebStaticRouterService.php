<?php


namespace Module\WebStaticRouter;


use Module\Application\ApplicationModule;
use Module\HarryFactory\HarryFactoryModule;

class WebStaticRouterService
{

    public static function feedUri2Controller(array &$uri2Controller)
    {
        ApplicationModule::feedUri2Controller($uri2Controller);
        HarryFactoryModule::feedUri2Controller($uri2Controller);
    }


}