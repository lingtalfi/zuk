<?php


namespace Core\Request;

/**
 * This object is meant to be read-only.
 * If you need to set properties, please extend the class.
 */
interface HttpRequestInterface
{
    public function getUri();

    public function get($key, $default = null, $throwException = false);
}