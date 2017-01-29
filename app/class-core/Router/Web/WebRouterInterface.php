<?php


namespace Core\Router\Web;


use Core\Request\HttpRequest;

interface WebRouterInterface
{
    /**
     * @param HttpRequest $request
     * @return false|string
     *              If it's false, it means there is no Controller able to handle the request.
     *              If it's a string, the string identifies the Controller. What Controller is identified is defined elsewhere.
     *
     */
    public function getController(HttpRequest $request);
}