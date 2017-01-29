<?php


namespace Module\HarryFactory;

class HarryFactoryService
{

    public static function getPartners(array &$partners)
    {
        \Module\TonyFactory\TonyFactoryModule::getPartners($partners);
        \Module\LucyFactory\LucyFactoryModule::getPartners($partners);
    }
}