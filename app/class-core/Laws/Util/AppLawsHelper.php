<?php


namespace Core\Laws\Util;


class AppLawsHelper
{


    /**
     * @return false|string
     */
    public static function getModuleName($objectInstance)
    {
        $class = get_class($objectInstance);
        $p = explode('\\', $class);
        $moduleComponent = array_shift($p);
        if ('Module' === $moduleComponent && count($p) > 0) {
            return array_shift($p);
        }
        return false;
    }
}