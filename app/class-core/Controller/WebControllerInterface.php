<?php


namespace Core\Controller;


use Core\Request\HttpRequestInterface;

interface WebControllerInterface
{
    public function handleRequest(HttpRequestInterface $request);
}