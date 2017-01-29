<?php


namespace Module\HarryFactory;

class HarryFactoryModule
{

    public static function feedUri2Controller(array &$uri2Controller)
    {
        $uri2Controller['/harry'] = '\Module\HarryFactory\HarryFactoryController';
    }
}