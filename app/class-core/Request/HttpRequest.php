<?php


namespace Core\Request;

use Core\Request\Exception\RequestKeyNotFoundException;

/**
 * This object is meant to be read-only.
 * If you need to set properties, please extend the class.
 */
class HttpRequest extends Request implements HttpRequestInterface
{


    private $uri; // uri without query string
    private $vars;


    public function __construct(array $params)
    {
        foreach ($params as $k => $v) {
            $this->$k = $v;
        }
        $this->vars = [];
    }


    public static function createFromEnv()
    {


        $uri = $_SERVER['REQUEST_URI'];
        if (false !== ($pos = strpos($uri, '?'))) {
            $uri = substr($uri, 0, $pos);
        }
        $params = [
            'uri' => $uri,
        ];
        return new static($params);
    }


    public function getUri()
    {
        return $this->uri;
    }

    public function get($key, $default = null, $throwException = false)
    {
        if (array_key_exists($key, $this->vars)) {
            return $this->vars[$key];
        }
        if (true === $throwException) {
            throw new RequestKeyNotFoundException("key not found: $key");
        }
        return $default;
    }

}