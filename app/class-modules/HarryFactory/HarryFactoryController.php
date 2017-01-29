<?php


namespace Module\HarryFactory;

use Core\Controller\WebControllerInterface;
use Core\Request\HttpRequestInterface;

class HarryFactoryController implements WebControllerInterface
{


    public function handleRequest(HttpRequestInterface $request)
    {
        echo "Hi, I'm Harry, welcome to my site. I'm selling awesome shoes!";
        $partners = [];
        HarryFactoryService::getPartners($partners);
        if (count($partners) > 0) {
            echo "<br>";
            echo "Thanks to my partners: " . implode(', ', $partners);
        }
    }


}