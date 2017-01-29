<?php


namespace Core\Module;


use Core\Module\Exception\KeyNotFoundException;

class ModuleConfig
{

    private static $vars = null;

    public static function get($key)
    {
        self::initVars();
        if (array_key_exists($key, self::$vars)) {
            return self::$vars[$key];
        }
        throw new KeyNotFoundException("Key not found: $key");
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function initVars()
    {
        if (null === self::$vars) {
            self::$vars = [];
            $sub = ModuleHelper::getModuleNameByCalledClass(get_called_class());
            $f = APP_ROOT . '/class-modules/' . $sub . "/config/config.php";
            if (file_exists($f)) {
                $conf = [];
                include $f;
                self::$vars = $conf;
            }
        }
    }
}