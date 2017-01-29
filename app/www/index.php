<?php


use Core\Application\WebApplication;
use Core\Request\HttpRequest;

require_once __DIR__ . "/../init.php";


WebApplication::create()->start(HttpRequest::createFromEnv());