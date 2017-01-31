<?php


namespace Core\Application;


use Core\Application\Exception\ApplicationVariableNotFound;
use Core\Logger\Logger;

class Application
{

    private static $config = [];


    public static function create()
    {
        return new static();
    }

    public static function setConfig(array $config)
    {
        self::$config = $config;
    }

    public static function get($key)
    {
        if (array_key_exists($key, self::$config)) {
            return self::$config[$key];
        }
        Logger::log("Key $key not found", 'critical');
        throw new ApplicationVariableNotFound("Key $key not found");
    }

    public static function set($key, $value)
    {
        self::$config[$key] = $value;
    }
}