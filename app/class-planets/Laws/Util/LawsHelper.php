<?php


namespace Laws\Util;


class LawsHelper
{

    public static function getShortName($objectInstance)
    {
        if (false === is_string($objectInstance)) {
            $objectInstance = get_class($objectInstance);
        }
        $p = explode('\\', $objectInstance);
        return array_pop($p);
    }


}

