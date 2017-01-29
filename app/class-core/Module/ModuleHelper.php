<?php


namespace Core\Module;


class ModuleHelper
{
    public static function getModuleNameByCalledClass($calledClass)
    {
        $p = explode('\\', $calledClass);
        $p = array_filter($p);
        array_shift($p);
        return array_shift($p);
    }
}